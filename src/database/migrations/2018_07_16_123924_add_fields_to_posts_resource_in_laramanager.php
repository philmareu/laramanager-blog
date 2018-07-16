<?php

use Illuminate\Support\Collection;
use Illuminate\Database\Migrations\Migration;
use Philsquare\LaraManager\Models\LaramanagerResource;
use Philsquare\LaraManager\Models\LaramanagerResourceField;

class AddFieldsToPostsResourceInLaramanager extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $postResource = $this->getPostsResource();

        $this->getPostFields()->each(function($field) use ($postResource) {
            $postResource->fields->save($field);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        LaramanagerResourceField::where('resource_id', $this->getPostsResource()->id)->delete();
    }

    private function getPostFields() : Collection
    {
        return collect([
            [
                'title' => 'Published At',
                'slug' => 'published_at',
                'type' => 'date',
                'validation' => 'required',
                'list' => 1
            ],
            [
                'title' => 'Title',
                'slug' => 'title',
                'type' => 'text',
                'validation' => 'required|max:255',
                'list' => 1
            ],
            [
                'title' => 'Slug',
                'slug' => 'slug',
                'type' => 'text',
                'validation' => 'required|max:255',
                'data' => json_encode(['target' => 'title'])
            ],
            [
                'title' => 'Summary',
                'slug' => 'summary',
                'type' => 'textarea',
                'validation' => 'required|max:255'
            ],
            [
                'title' => 'Published',
                'slug' => 'published',
                'type' => 'checkbox',
                'validation' => 'boolean',
                'list' => 1
            ],
            [
                'title' => 'Author',
                'slug' => 'author_id',
                'type' => 'relational',
                'validation' => 'required',
                'list' => 1,
                'data' => json_encode([
                    'method' => 'author',
                    'model' => config('auth.providers.users.model'),
                    'title' => 'name',
                    'key' => 'id'
                ])
            ]
        ]);
    }

    /**
     * @return mixed
     */
    private function getPostsResource()
    {
        $postResource = LaramanagerResource::where('slug', 'posts')->where('namespace', 'LaraManagerBlog')->first();
        return $postResource;
    }
}