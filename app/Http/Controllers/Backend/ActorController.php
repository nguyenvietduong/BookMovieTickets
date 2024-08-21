<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Http\Requests\Backend\Actor\StoreActorRequest;
use App\Http\Requests\Backend\Actor\UpdateActorRequest;

use App\Repositories\Interfaces\ActorRepositoryInterface as ActorRepository;
use \Illuminate\Http\Request;
use App\Services\Interfaces\ActorServiceInterface as ActorService;

class ActorController extends Controller
{
    protected $actorService;
    protected $actorRepository;

    public function __construct(
        ActorService        $actorService,
        ActorRepository     $actorRepository,
    ) {
        $this->actorService     = $actorService;
        $this->actorRepository  = $actorRepository;
    }


    public function index(Request $request)
    {
        $role               = 'actor';
        $actors             = $this->actorService->paginate($request, $role);
        $config['model']    = 'actor';
        $config['seo']      = config('apps.messages.actor');

        // dd($actors);
        return view('backend.actor.index', compact('actors', 'config'));
    }



    public function create()
    {
        $config['model']    = 'actor';
        $config['seo']      = config('apps.messages.actor');
        return view('backend.actor.create', compact('config'));
    }


    public function store(StoreActorRequest $request)
    {
        if ($this->actorService->create($request)) {
            return redirect()->route('actor.index')->with('success', 'Thêm mới bản ghi thành công');
        }
        return redirect()->route('backend.actor.index')->with('error', 'Thêm mới bản ghi không thành công. Hãy thử lại');
    }



    public function edit($id)
    {
        $actor          = $this->actorRepository->findById($id);
        $config['seo']  = config('apps.messages.actor');
        return view('backend.actor.update', compact('actor', 'config'));
    }


    public function update($id, UpdateActorRequest $request)
    {
        // dd($request->all());
        if ($this->actorService->update($id, $request)) {
            return redirect()->route('actor.index')->with('success', 'Cập nhật bản ghi thành công');
        }
        return redirect()->route('actor.index')->with('error', 'Cập nhật bản ghi không thành công. Hãy thử lại');
    }

    public function delete($id)
    {
        // $this->authorize('modules', 'actor.delete');
        $config['seo'] = config('apps.messages.actor');
        $actor = $this->actorRepository->findById($id);
        return view('backend.actor.delete', compact('actor', 'config', ));
    }

    public function destroy($id)
    {
        if ($this->actorService->destroy($id)) {
            return redirect()->route('actor.index')->with('success', 'Xóa bản ghi thành công');
        }
        return redirect()->route('actor.index')->with('error', 'Xóa bản ghi không thành công. Hãy thử lại');
    }

}
