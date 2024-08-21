<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Review\StoreReviewRequest;
use App\Http\Requests\Backend\Review\UpdateReviewRequest;
use App\Repositories\Interfaces\ReviewRepositoryInterface as ReviewRepository;
use App\Services\Interfaces\ReviewServiceInterface as ReviewService;
use App\Repositories\Interfaces\MovieRepositoryInterface as MovieRepository;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    protected $reviewService;
    protected $reviewRepository;
    protected $movieRepository;
    protected $userRepository;

    public function __construct(
        ReviewService       $reviewService,
        ReviewRepository    $reviewRepository,
        MovieRepository     $movieRepository,
        UserRepository      $userRepository,
    ) {
        $this->reviewService            = $reviewService;
        $this->reviewRepository         = $reviewRepository;
        $this->movieRepository          = $movieRepository;
        $this->userRepository           = $userRepository;
    }

    public function index(Request $request)
    {
        $config['model']        = 'review';
        $config['seo']          = config('apps.messages.review');
        $reviews              = $this->reviewService->paginate($request);

        return view('backend.review.index', compact('config', 'reviews'));
    }

    public function create()
    {
        $config['model']    = 'review';
        $config['seo']      = config('apps.messages.review');
        $movies             = $this->movieRepository->getFields(['id', 'name']);
        $users              = $this->userRepository->getFields(['id', 'name']);

        return view('backend.review.create', compact('config', 'movies', 'users'));
    }


    public function store(StoreReviewRequest $request)
    {
        if ($this->reviewService->create($request)) {
            return redirect()->route('review.index')->with('success', 'Thêm mới bản ghi thành công');
        }
        return redirect()->route('review.index')->with('error', 'Thêm mới bản ghi không thành công. Hãy thử lại');
    }


    public function edit($id)
    {
        $config['model']    = 'review';
        $config['seo']      = config('apps.messages.review');
        $review             = $this->reviewRepository->findById($id);
        $movies             = $this->movieRepository->getFields(['id', 'name']);
        $users              = $this->userRepository->getFields(['id', 'name']);

        return view('backend.review.edit', compact('review', 'config', 'movies', 'users'));
    }

    public function update(UpdateReviewRequest $request, $id)
    {
        if ($this->reviewService->update($id, $request)) {
            return redirect()->route('review.index')->with('success', 'Cập nhật bản ghi thành công');
        }
        return redirect()->route('review.index')->with('error', 'Cập nhật bản ghi không thành công. Hãy thử lại');
    }


    public function delete($id)
    {
        // $this->authorize('modules', 'user.delete');
        $config['seo']  = config('apps.messages.review');
        $review         = $this->reviewRepository->findById($id);
        return view('backend.review.delete', compact('review', 'config',));
    }

    public function destroy($id)
    {
        if ($this->reviewService->destroy($id)) {
            return redirect()->route('review.index')->with('success', 'Xóa bản ghi thành công');
        }
        return redirect()->route('review.index')->with('error', 'Xóa bản ghi không thành công. Hãy thử lại');
    }
}
