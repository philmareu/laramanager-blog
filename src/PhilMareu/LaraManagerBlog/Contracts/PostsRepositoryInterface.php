<?php

namespace PhilMareu\LaraManagerBlog\Contracts;


interface PostsRepositoryInterface
{
    public function getRecent($limit = 4);

    public function getPaginated($limit = 10);

    public function getPostForPage($year, $month, $day, $slug);
}