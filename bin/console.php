#!/usr/bin/env php
<?php

require_once __DIR__ . '/../root.php';

use Symfony\Component\Console\Application;
use FE\Command\CleanerCommand;
use FE\Command\LoaderCommand;
use FE\Command\SetupCommand;

$application = new Application();
$application->add(new CleanerCommand());
$application->add(new LoaderCommand());
$application->add(new SetupCommand());
$application->run();
