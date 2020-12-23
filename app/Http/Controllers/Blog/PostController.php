<?php

namespace App\Http\Controllers\Blog;

use App\Repositories\BlogCategoryRepository;
use App\Repositories\BlogPostRepository;

class PostController extends BaseController
{
    /**
     * @var BlogPostRepository
     */
    private $blogPostRepository;

    /**
     * @var BlogCategoryRepository
     */
    private $blogCategoryRepository;

    public function __construct() {
        parent::__construct();

        $this->blogPostRepository = app(BlogPostRepository::class);
        $this->blogCategoryRepository = app(BlogCategoryRepository::class);
    }

    /**
     * Вывод всех постов
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->blogPostRepository->getAllForIndexPage();
        return view('blog.posts.index', compact('paginator'));
    }

    /**
     * Вывод одного поста
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $item = $this->blogPostRepository->getOnePost($slug);
        if (empty($item)) {
            abort(404);
        }

        $key = 'blog_' . $item->id;
        if (!session()->has($key)) {
            $item->increment('view_count');
            $item->save();
            session()->put($key, 1);
        }

        return view('blog.posts.detail', compact('item'));
    }
}
