<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Screen\StoreScreenRequest;
use App\Http\Requests\Backend\Screen\UpdateScreenRequest;
use App\Repositories\Interfaces\ScreenRepositoryInterface as ScreenRepository;
use App\Services\Interfaces\ScreenServiceInterface as ScreenService;
use Illuminate\Http\Request;

class ScreenController extends Controller
{
    protected $screenService;
    protected $screenRepository;
    public function __construct(
        ScreenService $screenService,
        ScreenRepository $screenRepository
    ) {
        $this->screenService       = $screenService;
        $this->screenRepository    = $screenRepository;
    }

    public function index(Request $request)
    {
        $config['model']    = 'screen';
        $config['seo']      = config('apps.messages.screen');
        $screens           = $this->screenService->paginate($request);

        return view('backend.screen.index', compact('config', 'screens'));
    }

    public function create()
    {
        $config['model']    = 'screen';
        $config['seo']      = config('apps.messages.screen');
        return view('backend.screen.create', compact('config'));
    }


    public function store(StoreScreenRequest $request)
    {
        if ($this->screenService->create($request)) {
            return redirect()->route('screen.index')->with('success', 'Thêm mới bản ghi thành công');
        }
        return redirect()->route('screen.index')->with('error', 'Thêm mới bản ghi không thành công. Hãy thử lại');
    }


    public function edit($id)
    {
        $config['model']    = 'screen';
        $config['seo']      = config('apps.messages.screen');
        $screen             = $this->screenRepository->findById($id);
        return view('backend.screen.edit', compact('screen', 'config'));
    }

    public function update(UpdateScreenRequest $request, $id)
    {
        if ($this->screenService->update($id, $request)) {
            return redirect()->route('screen.index')->with('success', 'Cập nhật bản ghi thành công');
        }
        return redirect()->route('screen.index')->with('error', 'Cập nhật bản ghi không thành công. Hãy thử lại');
    }


    public function delete($id)
    {
        // $this->authorize('modules', 'user.delete');
        $config['seo']  = config('apps.messages.screen');
        $screen         = $this->screenRepository->findById($id);
        return view('backend.screen.delete', compact('screen', 'config', ));
    }

    public function destroy($id)
    {
        if ($this->screenService->destroy($id)) {
            return redirect()->route('screen.index')->with('success', 'Xóa bản ghi thành công');
        }
        return redirect()->route('screen.index')->with('error', 'Xóa bản ghi không thành công. Hãy thử lại');
    }

}
