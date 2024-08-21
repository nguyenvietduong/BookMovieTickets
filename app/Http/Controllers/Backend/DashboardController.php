<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\ArticleRepositoryInterface      as ArticleRepository;
use App\Repositories\Interfaces\CategoryRepositoryInterface     as CategoryRepository;
use App\Repositories\Interfaces\TagRepositoryInterface          as TagRepository;
use App\Repositories\Interfaces\UserRepositoryInterface         as UserRepository;

class DashboardController extends Controller
{
    protected $articleRepository;
    protected $categoryRepository;
    protected $tagRepository;
    protected $userRepository;

    public function __construct(
        ArticleRepository $articleRepository,
        CategoryRepository $categoryRepository,
        TagRepository $tagRepository,
        UserRepository $userRepository,
    ) {
        $this->articleRepository        = $articleRepository;
        $this->categoryRepository       = $categoryRepository;
        $this->tagRepository            = $tagRepository;
        $this->userRepository           = $userRepository;
    }
    public function index()
    {
        $countArticles                  = $this->articleRepository->count();
        $countCategory                  = $this->categoryRepository->count();
        $countTag                       = $this->tagRepository->count();
        $countUser                      = $this->userRepository->count();

        return view('backend.dashboard.index', compact('countArticles', 'countCategory', 'countTag', 'countUser'));
    }
}
