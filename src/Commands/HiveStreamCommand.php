<?php

namespace Sixincode\HiveStream\Commands;

use Illuminate\Console\Command;

class HiveStreamCommand extends Command
{
    public $signature = 'hive-stream';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
