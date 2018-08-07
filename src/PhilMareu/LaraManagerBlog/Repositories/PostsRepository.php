<?php

namespace PhilMareu\LaramanagerBlog\Repositories;


use Doctrine\DBAL\Query\QueryBuilder;
use Illuminate\Database\Eloquent\Collection;
use PhilMareu\LaramanagerBlog\Contracts\PostsRepositoryInterface;
use PhilMareu\LaramanagerBlog\Models\Post;

class PostsRepository implements PostsRepositoryInterface
{
    /**
     * @var Post
     */
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Get a set of published recent posts
     *
     * @param int $limit
     * @return Collection
     */
    public function getRecent($limit = 5)
    {
        return $this->getPublishedQuery()
            ->orderBy('published_at', 'desc')
            ->limit($limit)
            ->get();
    }

    /**
     * Get a paginated set of published posts
     *
     * @param int $limit
     * @return Collection
     */
    public function getPaginated($limit = 10)
    {
        return $this->getPublishedQuery()
            ->orderBy('published_at', 'desc')
            ->paginate($limit);
    }

    /**
     * Get a single published post
     *
     * @param $year
     * @param $month
     * @param $day
     * @param $slug
     *
     * @return Post
     */
    public function getPostForPage($year, $month, $day, $slug)
    {
        return $this->getPublishedQuery()
            ->where('published_at', 'LIKE', "$year-$month-$day%")
            ->whereSlug($slug)
            ->first();
    }

    /**
     * Get the query that represents a published and
     * publicly available posts.
     *
     * @return QueryBuilder
     */
    protected function getPublishedQuery()
    {
        return $this->post
            ->wherePublished(1)
            ->where('published_at', '<', now());
    }
}