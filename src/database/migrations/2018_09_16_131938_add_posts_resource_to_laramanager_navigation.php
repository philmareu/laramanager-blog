<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddPostsResourceToLaramanagerNavigation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('laramanager_navigation_links')
            ->insert([
            'laramanager_navigation_section_id' => 2,
            'title' => 'Posts',
            'ordinal' => 100,
            'uri' => 'admin/posts'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('laramanager_navigation_links')
            ->where('title', 'Posts')
            ->delete();
    }
}
