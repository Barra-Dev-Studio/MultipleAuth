<?php
/*
 * This file is part of the Multiple Auth package.
 *
 * (c) Khoerul Umam <id.khoerulumam@gmail.com>
 *
 */

namespace BarraDev\MultipleAuth;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MultipleAuthPublishCommand extends Command
{
    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'multipleauth:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish Multiple Auth from vendor packages';

    /**
     * Compatiblity for Lumen 5.5.
     *
     * @return void
     */
    public function handle()
    {
        $this->fire();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $this->publishMiddleware();

        $this->info("Publishing Multiple Auth complete");
    }


    /**
     * Publish the directory to the given directory.
     *
     * @param  string  $from
     * @param  string  $to
     * @return void
     */
    protected function publishDirectory($from, $to)
    {
        $exclude = array('..', '.', '.DS_Store');
        $source = array_diff(scandir($from), $exclude);

        foreach ($source as $item) {
            $this->info("Copying file: " . $to . $item);
            File::copy($from . $item, $to . $item);
        }
    }

    /**
     * Publish middleware.
     *
     * @return void
     */
    protected function publishMiddleware()
    {
        $this->publishDirectory(__DIR__ . '/app/Http/Middleware/', app()->path() . "/Http/Middleware/");
    }
}
