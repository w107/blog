<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(get_full_table('posts'), function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('title');
            $table->text('content');
            $table->integer('order')->default(0)->comment('排序');
            $table->tinyInteger('type')->comment('类型');
            $table->tinyInteger('published')->default(0)->comment('已发布');
            $table->unsignedInteger('view_count')->default(0)->comment('浏览次数');
            $table->unsignedInteger('comment_count')->default(0)->comment('评论数');
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create(get_full_table('navigations'), function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('url');
            $table->string('description');
            $table->integer('order')->default(0)->comment('排序');
            $table->tinyInteger('out_link')->default(0)->comment('外链');
            $table->timestamps();
        });
        Schema::create(get_full_table('categories'), function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->timestamps();
        });
        Schema::create(get_full_table('tags'), function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
        });
        Schema::create(get_full_table('post_tag'), function (Blueprint $table) {
            $table->integer('post_id');
            $table->integer('tag_id');
        });
        Schema::create(get_full_table('settings'), function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->text('type');
            $table->string('comment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(get_full_table('posts'));
        Schema::dropIfExists(get_full_table('navigations'));
        Schema::dropIfExists(get_full_table('categories'));
        Schema::dropIfExists(get_full_table('tags'));
        Schema::dropIfExists(get_full_table('post_tag'));
        Schema::dropIfExists(get_full_table('settings'));
    }
}
