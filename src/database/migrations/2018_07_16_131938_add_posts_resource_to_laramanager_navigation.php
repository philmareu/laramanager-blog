<?php

use Illuminate\Database\Migrations\Migration;
use Philsquare\LaraManager\Models\LaramanagerNavigationLink;

class AddPostsResourceToLaramanagerNavigation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        LaramanagerNavigationLink::create([
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
        LaramanagerNavigationLink::where('title', 'Posts')->delete();
    }
}
