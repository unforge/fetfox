<?php

namespace FE\Models;

class User
{
    private string $gender;
    private string $title;
    private string $first;
    private string $last;
    private string $email;
    private string $phone;
    private string $cell;
    private string $nat;
    private string $id;
    private string $picture;
    private int $postcode;
    private string $street;
    private string $coordinates;
    private string $timezone;
    private string $dob;
    private string $registered;
    private string $country;
    private string $state;
    private string $city;
    private string $uuid;
    private string $username;
    private string $password;
    private string $salt;
    private string $md5;
    private string $sha1;
    private string $sha256;

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): User
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function setGender(string $gender): User
    {
        $this->gender = $gender;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): User
    {
        $this->title = $title;
        return $this;
    }

    public function getFirst(): string
    {
        return $this->first;
    }

    public function setFirst(string $first): User
    {
        $this->first = $first;
        return $this;
    }

    public function getLast(): string
    {
        return $this->last;
    }

    public function setLast(string $last): User
    {
        $this->last = $last;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): User
    {
        $this->phone = $phone;
        return $this;
    }

    public function getCell(): string
    {
        return $this->cell;
    }

    public function setCell(string $cell): User
    {
        $this->cell = $cell;
        return $this;
    }

    public function getNat(): string
    {
        return $this->nat;
    }

    public function setNat(string $nat): User
    {
        $this->nat = $nat;
        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): User
    {
        $this->id = $id;
        return $this;
    }

    public function getPicture(): string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): User
    {
        $this->picture = $picture;
        return $this;
    }

    public function getPostcode(): int
    {
        return $this->postcode;
    }

    public function setPostcode(int $postcode): User
    {
        $this->postcode = $postcode;
        return $this;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function setStreet(string $street): User
    {
        $this->street = $street;
        return $this;
    }

    public function getCoordinates(): string
    {
        return $this->coordinates;
    }

    public function setCoordinates(string $coordinates): User
    {
        $this->coordinates = $coordinates;
        return $this;
    }

    public function getTimezone(): string
    {
        return $this->timezone;
    }

    public function setTimezone(string $timezone): User
    {
        $this->timezone = $timezone;
        return $this;
    }

    public function getDob(): string
    {
        return $this->dob;
    }

    public function setDob(string $dob): User
    {
        $this->dob = $dob;
        return $this;
    }

    public function getRegistered(): string
    {
        return $this->registered;
    }

    public function setRegistered(string $registered): User
    {
        $this->registered = $registered;
        return $this;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): User
    {
        $this->country = $country;
        return $this;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function setState(string $state): User
    {
        $this->state = $state;
        return $this;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): User
    {
        $this->city = $city;
        return $this;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function setUuid(string $uuid): User
    {
        $this->uuid = $uuid;
        return $this;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): User
    {
        $this->username = $username;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }

    public function getSalt(): string
    {
        return $this->salt;
    }

    public function setSalt(string $salt): User
    {
        $this->salt = $salt;
        return $this;
    }

    public function getMd5(): string
    {
        return $this->md5;
    }

    public function setMd5(string $md5): User
    {
        $this->md5 = $md5;
        return $this;
    }

    public function getSha1(): string
    {
        return $this->sha1;
    }

    public function setSha1(string $sha1): User
    {
        $this->sha1 = $sha1;
        return $this;
    }

    public function getSha256(): string
    {
        return $this->sha256;
    }

    public function setSha256(string $sha256): User
    {
        $this->sha256 = $sha256;
        return $this;
    }
}




