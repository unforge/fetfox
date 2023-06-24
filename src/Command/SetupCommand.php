<?php

namespace FE\Command;

use FE\Db;
use S3\FS;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SetupCommand extends Command
{
    protected static $defaultName = 'setup:start';

    protected function configure()
    {
        $this->setName($this::getDefaultName())
            ->setDescription('Команда для структуры таблиц');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            /** @var \RecursiveDirectoryIterator $it */
            $it = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator(APP_DIR . '/setup'));

            while ($it->valid()) {
                if (!$it->isDot()) {
                    $query = file_get_contents($it->getRealPath());
                    Db::getDb()->raw($query);
                }
                $it->next();
            }
        } catch (\Throwable $e) {
            $output->writeln($e->getMessage());
            return Command::FAILURE;
        }

        $output->writeln("Таблицы базы успешно инициализированы!");

        return Command::SUCCESS;
    }
}
