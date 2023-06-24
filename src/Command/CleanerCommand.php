<?php

namespace FE\Command;

use FE\Db;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CleanerCommand extends Command
{
    protected static $defaultName = 'cleaner:start';

    protected function configure()
    {
        $this->setName($this::getDefaultName())
            ->setDescription('Команда для очистки базы');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("Запуск команды наполнения базы в " . date('Y-m-d H:i:s', strtotime('now')));

        foreach (['cities', 'users', 'links'] as $table) {
            try {
                Db::getDb()->raw("TRUNCATE TABLE $table");
            } catch (\Throwable $e) {
                $output->writeln("Ошибка выполнения очистки таблицы $table: " . $e->getMessage());
            }
        }

        $output->writeln("Очистка завершена!");

        return Command::SUCCESS;
    }
}
