<?php

namespace FE\Command;

use FE\Services\UserService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class LoaderCommand extends Command
{
    // Лимит сгенеренных пользователей, после которого нужно остановиться
    private const MAX_USERS = 100000;

    // Таймаут на случай, если ничего не получили
    private const ERROR_TIMEOUT = 5;

    // Таймаут между запросами к апи, что бы не забанили
    private const QUERY_TIMEOUT = 1;

    // Количество пользователей, получаемых в одном запросе
    private const QUERY_MAX_ITEMS = 500;

    protected static $defaultName = 'loader:start';

    protected function configure()
    {
        $this->setName($this::getDefaultName())
            ->setDescription('Команда для наполнения базы тестовыми данными');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $time = microtime(true);
        $output->writeln("Запуск команды наполнения базы");
        $counter = 0;

        while ($counter < self::MAX_USERS) {
            $res = file_get_contents('https://randomuser.me/api/?results=' . self::QUERY_MAX_ITEMS);
            $res = @json_decode($res, true);
            if (!$res) {
                sleep(self::ERROR_TIMEOUT);
                continue;
            } else {
                sleep(self::QUERY_TIMEOUT);
            }

            foreach ($res['results'] as $item) {
                $user = UserService::parseFromApiFormat($item);
                UserService::saveInDb($user);
                $counter++;
            }
        }

        $output->writeln("Запуск тестовых данных завершена! Продолжительность работы составила " . microtime(true) - $time . " секунд");

        return Command::SUCCESS;
    }
}
