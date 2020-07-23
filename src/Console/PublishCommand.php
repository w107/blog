<?php

namespace Inn20\Blog\Console;

use Illuminate\Console\Command;

class PublishCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'blog:publish {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "re-publish blog assets, configuration, language and migration files. If you want overwrite the existing files, you can add the `--force` option";

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $force = $this->option('force');
        $this->publishByTag('laravel-admin-lang', $force);
        $this->publishByTag('laravel-admin-assets', $force);
        $this->publishByTag('laravel-admin-simplemde', $force);
        $this->publishByTag('inn-blog-assets', $force);
        $this->publishByTag('inn-blog-lang', $force);
        $this->publishByTag('inn-blog-config', $force);
        $this->call('view:clear');
    }

    protected function publishByTag($tag, $force)
    {
        $options = ['--tag' => $tag];
        if ($force == true) {
            $options['--force'] = true;
        }
        $this->call('vendor:publish', $options);
    }

}
