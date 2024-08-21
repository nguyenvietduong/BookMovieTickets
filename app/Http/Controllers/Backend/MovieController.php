<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Movie\StoreMovieRequest;
use App\Http\Requests\Backend\Movie\UpdateMovieRequest;
use App\Repositories\Interfaces\MovieRepositoryInterface as MovieRepository;
use App\Services\Interfaces\MovieServiceInterface as MovieService;
use App\Repositories\Interfaces\CategoryRepositoryInterface as CategoryRepository;
use App\Repositories\Interfaces\ActorRepositoryInterface as ActorRepository;
use App\Repositories\Interfaces\CountryRepositoryInterface as CountryRepository;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    protected $movieService;
    protected $movieRepository;
    protected $categoryRepository;
    protected $actorRepository;
    protected $countryRepository;

    public function __construct(
        MovieService        $movieService,
        MovieRepository     $movieRepository,
        CategoryRepository  $categoryRepository,
        ActorRepository     $actorRepository,
        CountryRepository   $countryRepository,

    ) {
        $this->movieService         = $movieService;
        $this->movieRepository      = $movieRepository;
        $this->categoryRepository   = $categoryRepository;
        $this->actorRepository      = $actorRepository;
        $this->countryRepository    = $countryRepository;
    }

    public function index(Request $request)
    {
        $config['model']    = 'movie';
        $config['seo']      = config('apps.messages.movie');
        $movies             = $this->movieService->paginate($request);

        return view('backend.movie.index', compact('config', 'movies'));
    }

    public function create()
    {
        $config['model']    = 'movie';
        $config['seo']      = config('apps.messages.movie');
        $categories         = $this->categoryRepository->all();
        $actors             = $this->actorRepository->all();
        $countries          = $this->countryRepository->all();


        return view('backend.movie.create', compact('config', 'categories', 'actors', 'countries'));
    }


    public function store(StoreMovieRequest $request)
    {
        // dd($request->all());
        if ($this->movieService->create($request)) {
            return redirect()->route('movie.index')->with('success', 'Thêm mới bản ghi thành công');
        }
        return redirect()->route('movie.index')->with('error', 'Thêm mới bản ghi không thành công. Hãy thử lại');
    }


    public function edit($id)
    {
        $config['model']    = 'movie';
        $config['seo']      = config('apps.messages.movie');
        $movie              = $this->movieRepository->findById($id);
        $categories         = $this->categoryRepository->all();
        $actors             = $this->actorRepository->all();
        $countries          = $this->countryRepository->all();
        return view('backend.movie.edit', compact('movie', 'config', 'categories', 'actors', 'countries'));
    }

    public function update(UpdateMovieRequest $request, $id)
    {
        if ($this->movieService->update($id, $request)) {
            return redirect()->route('movie.index')->with('success', 'Cập nhật bản ghi thành công');
        }
        return redirect()->route('movie.index')->with('error', 'Cập nhật bản ghi không thành công. Hãy thử lại');
    }


    public function delete($id)
    {
        // $this->authorize('modules', 'user.delete');
        $config['seo'] = config('apps.messages.movie');
        $movie = $this->movieRepository->findById($id);
        return view('backend.movie.delete', compact('movie', 'config',));
    }

    public function destroy($id)
    {
        if ($this->movieService->destroy($id)) {
            return redirect()->route('movie.index')->with('success', 'Xóa bản ghi thành công');
        }
        return redirect()->route('movie.index')->with('error', 'Xóa bản ghi không thành công. Hãy thử lại');
    }
}
