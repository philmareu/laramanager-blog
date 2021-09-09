<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddPostsResourceInLaramanager extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('laramanager_resources')
        ->insert([
            'title' => 'Posts',
            'slug' => 'posts',
            'namespace' => 'PhilMareu\LaramanagerBlog',
            'model' => 'Models\Post',
            'order_column' => 1,
            'order_direction' => 'desc',
            'icon' => 'n/a'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('laramanager_resources')
            ->where('namespace', 'PhilMareu\LaramanagerBlog')
            ->delete();
    }
}
