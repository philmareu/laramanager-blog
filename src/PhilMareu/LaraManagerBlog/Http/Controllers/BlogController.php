<?php

namespace PhilMareu\LaraManagerBlog\Http\Controllers;


use PhilMareu\LaraManagerBlog\Repositories\PostsRepository;

abstract class BlogController extends Controller
{
    protected $postsRepository;

    public function __construct(PostsRepository $postsRepository)
    {
        $this->postsRepository = $postsRepository;
    }

    public function index()
    {
        return view('laramanager-blog::posts.list.default')
            ->with('posts', $this->postsRepository->getPaginated());
    }

    public function show($year, $month, $day, $slug)
    {
        return view('laramanager-blog::posts.show.default')
            ->with('post', $this->postsRepository->getPostForPage($year, $month, $day, $slug));
    }
}