<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Seat\StoreSeatRequest;
use App\Http\Requests\Backend\Seat\UpdateSeatRequest;
use App\Repositories\Interfaces\SeatRepositoryInterface as SeatRepository;
use App\Services\Interfaces\SeatServiceInterface as SeatService;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    protected $seatService;
    protected $seatRepository;
    public function __construct(
        SeatService $seatService,
        SeatRepository $seatRepository
    ) {
        $this->seatService       = $seatService;
        $this->seatRepository    = $seatRepository;
    }

    public function index(Request $request, $id)
    {
        $config['model']    = 'seat';
        $config['seo']      = config('apps.messages.seat');

        $screen_id          = $this->seatRepository->findById($id, ['screen_id']);
        if ($screen_id) {
            $screen_id          = $screen_id->screen_id;
        }

        $seats              = $this->seatService->paginate($screen_id, $request);

        return view('backend.seat.index', compact('config', 'seats', 'screen_id'));
    }

    public function create(Request $request, $id)
    {
        $config['model']    = 'seat';
        $config['seo']      = config('apps.messages.seat');

        // dd($id);

        $screen_id          = $this->seatRepository->findById($id, ['screen_id']);
        $screen_id          = $screen_id->screen_id;

        return view('backend.seat.create', compact('config', 'screen_id'));
    }


    public function store(StoreSeatRequest $request)
    {
        $screen_id          = $this->seatRepository->findById($request->screen_id, ['screen_id']);
        $screen_id          = $screen_id->screen_id;

        if ($this->seatService->create($request)) {
            return redirect()->route('seat.index', $screen_id)->with('success', 'Thêm mới bản ghi thành công');
        }

        return redirect()->route('seat.index', $screen_id)->with('error', 'Thêm mới bản ghi không thành công. Hãy thử lại');
    }


    public function edit($id)
    {
        $config['model']    = 'seat';
        $config['seo']      = config('apps.messages.seat');
        $seat               = $this->seatRepository->findById($id);

        return view('backend.seat.edit', compact('seat', 'config'));
    }

    public function update(UpdateSeatRequest $request, $id)
    {
        // $screen_id = $request->screen_id;
        $screen_id          = $this->seatRepository->findById($request->screen_id, ['screen_id']);
        $screen_id          = $screen_id->screen_id;

        if ($this->seatService->update($id, $request)) {
            return redirect()->route('seat.index', $screen_id)->with('success', 'Cập nhật bản ghi thành công');
        }
        return redirect()->route('seat.index', $screen_id)->with('error', 'Cập nhật bản ghi không thành công. Hãy thử lại');
    }


    public function delete($id)
    {
        // $this->authorize('modules', 'user.delete');
        $config['seo']      = config('apps.messages.seat');
        $seat               = $this->seatRepository->findById($id);
        return view('backend.seat.delete', compact('seat', 'config',));
    }

    public function destroy(Request $request, $id)
    {
        // dd($request->screen_id);
        $screen_id          = $this->seatRepository->findById($request->screen_id, ['screen_id']);
        $screen_id          = $screen_id->screen_id;
        
        if ($this->seatService->destroy($id)) {
            return redirect()->route('seat.index', $screen_id)->with('success', 'Xóa bản ghi thành công');
        }
        return redirect()->route('seat.index', $screen_id)->with('error', 'Xóa bản ghi không thành công. Hãy thử lại');
    }
}
