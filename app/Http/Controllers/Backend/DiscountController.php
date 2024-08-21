<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Http\Requests\Backend\Discount\StoreDiscountRequest;
use App\Http\Requests\Backend\Discount\UpdateDiscountRequest;

use App\Repositories\Interfaces\DiscountRepositoryInterface as DiscountRepository;
use \Illuminate\Http\Request;
use App\Services\Interfaces\DiscountServiceInterface as DiscountService;

class DiscountController extends Controller
{
    protected $discountService;
    protected $discountRepository;

    public function __construct(
        DiscountService $discountService,
        DiscountRepository $discountRepository,
    ) {
        $this->discountService = $discountService;
        $this->discountRepository = $discountRepository;
    }


    public function index(Request $request)
    {
        $role               = 'discount';
        $discounts          = $this->discountService->paginate($request, $role);
        $config['model']    = 'discount';
        $config['seo']      = config('apps.messages.discount');

        // dd($discounts);
        return view('backend.discount.index', compact('discounts', 'config'));
    }



    public function create()
    {
        $config['model']    = 'discount';
        $config['seo']      = config('apps.messages.discount');
        return view('backend.discount.create', compact('config'));
    }


    public function store(StoreDiscountRequest $request)
    {
        if ($this->discountService->create($request)) {
            return redirect()->route('discount.index')->with('success', 'Thêm mới bản ghi thành công');
        }
        return redirect()->route('backend.discount.index')->with('error', 'Thêm mới bản ghi không thành công. Hãy thử lại');
    }



    public function edit($id)
    {
        $discount       = $this->discountRepository->findById($id);
        $config['seo']  = config('apps.messages.discount');
        return view('backend.discount.update', compact('discount', 'config'));
    }


    public function update($id, UpdateDiscountRequest $request)
    {
        // dd($request->all());
        if ($this->discountService->update($id, $request)) {
            return redirect()->route('discount.index')->with('success', 'Cập nhật bản ghi thành công');
        }
        return redirect()->route('discount.index')->with('error', 'Cập nhật bản ghi không thành công. Hãy thử lại');
    }

    public function delete($id)
    {
        // $this->authorize('modules', 'discount.delete');
        $config['seo'] = config('apps.messages.discount');
        $discount = $this->discountRepository->findById($id);
        return view('backend.discount.delete', compact('discount', 'config', ));
    }

    public function destroy($id)
    {
        if ($this->discountService->destroy($id)) {
            return redirect()->route('discount.index')->with('success', 'Xóa bản ghi thành công');
        }
        return redirect()->route('discount.index')->with('error', 'Xóa bản ghi không thành công. Hãy thử lại');
    }

}
