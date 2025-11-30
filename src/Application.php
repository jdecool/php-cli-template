<?php

declare(strict_types=1);

namespace JDecool\MyProject;

use Symfony\Component\Console\Application as BaseApplication;
use Symfony\Component\Console\Command\Command;

final class Application extends BaseApplication
{
    public const NAME = 'MyProject';
    public const VERSION = '@dev';

    /**
     * @param iterable<Command> $commands
     */
    public function __construct(iterable $commands)
    {
        parent::__construct(self::NAME, self::VERSION);

        foreach ($commands as $command) {
            $this->addCommand($command);
        }
    }
}
