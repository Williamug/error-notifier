<?php

namespace Williamug\ErrorNotifier\Commands;

use Illuminate\Console\Command;

class ErrorNotifierCommand extends Command
{
    public $signature = 'error-notifier';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
