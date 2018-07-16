<?php

use Illuminate\Database\Migrations\Migration;
use Philsquare\LaraManager\Models\LaramanagerResource;

class AddPostsResourceInLaramanager extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        LaramanagerResource::create([
            'title' => 'Posts',
            'slug' => 'posts',
            'namespace' => 'LaraManagerBlog',
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
        LaramanagerResource::where('namespace', 'LaraManagerBlog')->delete();
    }
}
