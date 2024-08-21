<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Country\StoreCountryRequest;
use App\Http\Requests\Backend\Country\UpdateCountryRequest;
use App\Repositories\Interfaces\CountryRepositoryInterface as CountryRepository;
use App\Services\Interfaces\CountryServiceInterface as CountryService;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    protected $countryService;
    protected $countryRepository;
    public function __construct(
        CountryService $countryService,
        CountryRepository $countryRepository
    ) {
        $this->countryService       = $countryService;
        $this->countryRepository    = $countryRepository;
    }

    public function index(Request $request)
    {
        $config['model']    = 'country';
        $config['seo']      = config('apps.messages.country');
        $countries          = $this->countryService->paginate($request);

        return view('backend.country.index', compact('config', 'countries'));
    }

    public function create()
    {
        $config['model']    = 'country';
        $config['seo']      = config('apps.messages.country');
        return view('backend.country.create', compact('config'));
    }


    public function store(StoreCountryRequest $request)
    {
        if ($this->countryService->create($request)) {
            return redirect()->route('country.index')->with('success', 'Thêm mới bản ghi thành công');
        }
        return redirect()->route('country.index')->with('error', 'Thêm mới bản ghi không thành công. Hãy thử lại');
    }


    public function edit($id)
    {
        $config['model'] = 'country';
        $config['seo'] = config('apps.messages.country');
        $country = $this->countryRepository->findById($id);
        return view('backend.country.edit', compact('country', 'config'));
    }

    public function update(UpdateCountryRequest $request, $id)
    {
        if ($this->countryService->update($id, $request)) {
            return redirect()->route('country.index')->with('success', 'Cập nhật bản ghi thành công');
        }
        return redirect()->route('country.index')->with('error', 'Cập nhật bản ghi không thành công. Hãy thử lại');
    }


    public function delete($id)
    {
        // $this->authorize('modules', 'user.delete');
        $config['seo'] = config('apps.messages.country');
        $country = $this->countryRepository->findById($id);
        return view('backend.country.delete', compact('country', 'config', ));
    }

    public function destroy($id)
    {
        if ($this->countryService->destroy($id)) {
            return redirect()->route('country.index')->with('success', 'Xóa bản ghi thành công');
        }
        return redirect()->route('country.index')->with('error', 'Xóa bản ghi không thành công. Hãy thử lại');
    }

}
