<?php

namespace PhilMareu\LaraManagerBlog\Http\Controllers;


use PhilMareu\LaraManagerBlog\Repositories\PostsRepository;

abstract class BlogController extends Controller
{
    protected $postsRepository;

    protected $listView = 'laramanager-blog::posts.list.default';

    protected $showView = 'laramanager-blog::posts.show.default';

    public function __construct(PostsRepository $postsRepository)
    {
        $this->postsRepository = $postsRepository;
    }

    public function index()
    {
        return view($this->listView)
            ->with('posts', $this->postsRepository->getPaginated());
    }

    public function show($year, $month, $day, $slug)
    {
        return view($this->showView)
            ->with('post', $this->postsRepository->getPostForPage($year, $month, $day, $slug));
    }
}