<?php

namespace Inn20\Blog\Console;

use Illuminate\Console\Command;

class UninstallCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'blog:uninstall';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Uninstall the blog package';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        if (!$this->confirm('Are you sure to uninstall blog?')) {
            return;
        }

        $this->removeFilesAndDirectories();

        $this->line('<info>Uninstalling blog!</info>');
    }

    /**
     * Remove files and directories.
     *
     * @return void
     */
    protected function removeFilesAndDirectories()
    {
        $this->laravel['files']->deleteDirectory(public_path('vendor/inn-blog/'));
        $this->laravel['files']->deleteDirectory(public_path('vendor/laravel-admin/'));
        $this->laravel['files']->deleteDirectory(public_path('vendor/laravel-admin-ext/'));
        $this->laravel['files']->delete(config_path('admin.php'));
        $this->laravel['files']->delete(config_path('blog.php'));
    }

}
