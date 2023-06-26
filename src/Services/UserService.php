<?php

namespace FE\Services;

use FE\Db;
use FE\Models\User;

class UserService
{
    public static function parseFromApiFormat(array $item): User
    {
        $user = new User();
        $user->setGender($item['gender'])
            ->setTitle($item['name']['title'])
            ->setFirst($item['name']['first'])
            ->setLast($item['name']['last'])
            ->setEmail($item['email'])
            ->setPhone($item['phone'])
            ->setCell($item['cell'])
            ->setNat($item['nat'])
            ->setId(json_encode($item['id'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->setPicture($item['picture']['large'])
            ->setPostcode(intval($item['location']['postcode']))
            ->setStreet(json_encode($item['location']['street'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->setCoordinates(json_encode($item['location']['coordinates'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->setTimezone(json_encode($item['location']['timezone'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->setDob(date('Y-m-d H:i:s', strtotime($item['dob']['date'])))
            ->setRegistered(date('Y-m-d H:i:s', strtotime($item['registered']['date'])))
            // fixme - setCountry - but puts the city
            ->setCountry($item['location']['city'])
            ->setState($item['location']['state'])
            // fixme - setCity - but puts the country!
            ->setCity($item['location']['country'])
            ->setUuid($item['login']['uuid'])
            ->setUsername($item['login']['username'])
            ->setPassword($item['login']['password'])
            ->setSalt($item['login']['salt'])
            ->setMd5($item['login']['md5'])
            ->setSha1($item['login']['sha1'])
            ->setSha256($item['login']['sha256']);

        return $user;
    }

    public static function saveInDb(User $user): bool
    {
        try {
            Db::getDb()->raw('START TRANSACTION');

            $query = sprintf(
                "INSERT IGNORE INTO cities (country, country_crc, state, state_crc, city, city_crc) VALUES ('%s', %d, '%s', %d, '%s', %d)",
                Db::getDb()->escape($user->getCountry()),
                crc32($user->getCountry()),
                Db::getDb()->escape($user->getState()),
                crc32($user->getState()),
                Db::getDb()->escape($user->getCity()),
                crc32($user->getCity())
            );
            Db::getDb()->raw($query);

            $query = sprintf(
                "SELECT city_id FROM cities WHERE country_crc = %d AND state_crc = %d AND city_crc = %d",
                crc32($user->getCountry()),
                crc32($user->getState()),
                crc32($user->getCity())
            );

            $city_id = Db::getDb()->raw($query)->current()->__get('city_id');

            $query = sprintf(
                "INSERT INTO users (gender, title, first, last, last_crc, enail, phone, cell, nat, id, picture, postcode, street, coordinates, timezone, dob, registered, city_id, uuid, username, password, salt, md5, sha1, sha256)"
                . " VALUES ('%s', '%s', '%s', '%s', '%d', '%s', '%s', '%s', '%s', '%s', '%s', '%d', '%s', '%s', '%s', '%s', '%s', '%d', '%s', '%s', '%s', '%s', '%s', '%s', '%s')",
                Db::getDb()->escape($user->getGender()),
                Db::getDb()->escape($user->getTitle()),
                Db::getDb()->escape($user->getFirst()),
                Db::getDb()->escape($user->getLast()),
                crc32($user->getLast()),
                Db::getDb()->escape($user->getEmail()),
                Db::getDb()->escape($user->getPhone()),
                Db::getDb()->escape($user->getCell()),
                Db::getDb()->escape($user->getNat()),
                Db::getDb()->escape($user->getId()),
                Db::getDb()->escape($user->getPicture()),
                $user->getPostcode(),
                Db::getDb()->escape($user->getStreet()),
                Db::getDb()->escape($user->getCoordinates()),
                Db::getDb()->escape($user->getTimezone()),
                $user->getDob(),
                $user->getRegistered(),
                $city_id,
                Db::getDb()->escape($user->getUuid()),
                Db::getDb()->escape($user->getUsername()),
                Db::getDb()->escape($user->getPassword()),
                Db::getDb()->escape($user->getSalt()),
                Db::getDb()->escape($user->getMd5()),
                Db::getDb()->escape($user->getSha1()),
                Db::getDb()->escape($user->getSha256()),
            );
            Db::getDb()->raw($query);


            // fixme - the purpose of links table is not clear
            $query = sprintf(
                "INSERT INTO links (last_crc, city_id, items) VALUES (%d, %d, 1)  ON DUPLICATE KEY UPDATE items = items +1",
                crc32($user->getLast()),
                $city_id
            );
            Db::getDb()->raw($query);

            Db::getDb()->raw('COMMIT');
        } catch (\Throwable $e) {
            Db::getDb()->raw('ROLLBACK');
            throw $e;
        }

        return true;
    }

    public static function getUsersCount(): int
    {
        return Db::getDb()->raw("SELECT COUNT(*) AS c FROM users")->current()->__get('c');
    }

    public static function getUserList(int $start, int $offset): array
    {
        // fixme - the goal of the task is not reached: amount of relatives is incorrect
        // and is counted in a suboptimal way.
        // recommendation to use an aggregation to count people
        $query = sprintf(
            "SELECT u.*, c.country, c.state, c.city, l.items 
                FROM users u
                LEFT JOIN cities c ON (c.city_id = u.city_id)
                LEFT JOIN links l ON (l.last_crc = u.last_crc AND l.city_id = c.city_id )
            WHERE u.user_id >= %d AND u.user_id < %d",
            $start,
            $offset
        );

        return Db::getDb()->raw($query)->__toArray();
    }
}
