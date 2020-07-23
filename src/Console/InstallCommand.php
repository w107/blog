<?php

namespace Inn20\Blog\Console;

use Illuminate\Console\Command;
use Inn20\Blog\Models\Post;
use Inn20\Blog\Seeds\BlogSeeder;
use Inn20\Blog\Seeds\AdminSeeder;
use Inn20\Blog\Seeds\SettingSeeder;

class InstallCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'blog:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the blog package';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->initDatabase();
    }

    public function initDatabase()
    {
        $this->call('migrate');

        $userModel = config('admin.database.users_model');

        if ($userModel::count() == 0) {
            $this->call('db:seed', ['--class' => AdminSeeder::class]);
        }
        if (Post::count() == 0) {
            $this->call('db:seed', ['--class' => BlogSeeder::class]);
        }
        $this->call('db:seed', ['--class' => SettingSeeder::class]);
    }

}
