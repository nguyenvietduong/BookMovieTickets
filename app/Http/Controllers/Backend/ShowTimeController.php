<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ShowTime\StoreShowTimeRequest;
use App\Http\Requests\Backend\ShowTime\UpdateShowTimeRequest;
use App\Repositories\Interfaces\ShowTimeRepositoryInterface as ShowTimeRepository;
use App\Services\Interfaces\ShowTimeServiceInterface as ShowTimeService;
use App\Repositories\Interfaces\MovieRepositoryInterface as MovieRepository;
use App\Repositories\Interfaces\ScreenRepositoryInterface as ScreenRepository;
use Illuminate\Http\Request;

class ShowTimeController extends Controller
{
    protected $showtimeService;
    protected $showtimeRepository;
    protected $movieRepository;
    protected $screenRepository;


    public function __construct(
        ShowTimeService $showtimeService,
        ShowTimeRepository $showtimeRepository,
        MovieRepository     $movieRepository,
        ScreenRepository $screenRepository,
    ) {
        $this->showtimeService       = $showtimeService;
        $this->showtimeRepository    = $showtimeRepository;
        $this->movieRepository      = $movieRepository;
        $this->screenRepository    = $screenRepository;
    }

    public function index(Request $request)
    {
        $config['model']        = 'showtime';
        $config['seo']          = config('apps.messages.showtime');
        $showtimes              = $this->showtimeService->paginate($request);

        return view('backend.showtime.index', compact('config', 'showtimes'));
    }

    public function create()
    {
        $config['model']    = 'showtime';
        $config['seo']      = config('apps.messages.showtime');
        $movies             = $this->movieRepository->getFields(['id', 'name']);
        $screens            = $this->screenRepository->getFields(['id', 'name']);

        return view('backend.showtime.create', compact('config', 'movies', 'screens'));
    }


    public function store(StoreShowTimeRequest $request)
    {
        if ($this->showtimeService->create($request)) {
            return redirect()->route('showtime.index')->with('success', 'Thêm mới bản ghi thành công');
        }
        return redirect()->route('showtime.index')->with('error', 'Thêm mới bản ghi không thành công. Hãy thử lại');
    }


    public function edit($id)
    {
        $config['model']    = 'showtime';
        $config['seo']      = config('apps.messages.showtime');
        $showtime           = $this->showtimeRepository->findById($id);
        $movies             = $this->movieRepository->getFields(['id', 'name']);
        $screens            = $this->screenRepository->getFields(['id', 'name']);

        return view('backend.showtime.edit', compact('showtime', 'config', 'movies', 'screens'));
    }

    public function update(UpdateShowTimeRequest $request, $id)
    {
        if ($this->showtimeService->update($id, $request)) {
            return redirect()->route('showtime.index')->with('success', 'Cập nhật bản ghi thành công');
        }
        return redirect()->route('showtime.index')->with('error', 'Cập nhật bản ghi không thành công. Hãy thử lại');
    }


    public function delete($id)
    {
        // $this->authorize('modules', 'user.delete');
        $config['seo']  = config('apps.messages.showtime');
        $showtime         = $this->showtimeRepository->findById($id);
        return view('backend.showtime.delete', compact('showtime', 'config',));
    }

    public function destroy($id)
    {
        if ($this->showtimeService->destroy($id)) {
            return redirect()->route('showtime.index')->with('success', 'Xóa bản ghi thành công');
        }
        return redirect()->route('showtime.index')->with('error', 'Xóa bản ghi không thành công. Hãy thử lại');
    }
}
