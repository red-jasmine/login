<?php

namespace RedJasmine\Login\Commands;

use Illuminate\Console\Command;

class LoginCommand extends Command
{
    public $signature = 'login';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
