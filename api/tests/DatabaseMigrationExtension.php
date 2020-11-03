<?php

declare(strict_types=1);

namespace App\Tests;

use Codeception\Events;
use Codeception\Extension;
use Codeception\Module\Cli;
use Exception;

class DatabaseMigrationExtension extends Extension
{
    public static $events = [
        Events::SUITE_BEFORE => 'beforeSuite',
    ];

    public function beforeSuite()
    {
        try {
            /** @var Cli $cli */
            $cli = $this->getModule('Cli');

            $cli->runShellCommand('bin/console doctrine:migrations:migrate --env=test --no-interaction');

            $this->writeln('Test database recreated');
        } catch (Exception $e) {
            $this->writeln(
                sprintf(
                    'An error occurred whilst rebuilding the test database: %s',
                    $e->getMessage()
                )
            );
        }
    }
}

