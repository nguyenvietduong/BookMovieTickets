<?php

namespace App\Services;

use App\Services\Interfaces\CountryServiceInterface;
use App\Repositories\Interfaces\CountryRepositoryInterface as CountryRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

/**
 * Class CountryService
 * @package App\Services
 */
class CountryService extends BaseService implements CountryServiceInterface
{
    protected $countryRepository;


    public function __construct(
        CountryRepository $countryRepository
    ) {
        $this->countryRepository = $countryRepository;
    }

    public function paginate($request)
    {
        $condition = [
            'keyword'           => addslashes($request->input('keyword')),
            'searchColumns'     => ['name'],
            // 'publish'   => $request->integer('publish'),
            // 'where'     => [
            //     ['role', '=', 'member'],
            // ],
        ];

        $perPage        = ($request->integer('perpage') > 0) ? $request->integer('perpage') : 5;
        $categories     = $this->countryRepository->pagination(
            $this->paginateSelect(),
            $condition,
            $perPage,
            ['path' => '/admin/country/index'],
            ['movies'],
        );

        return $categories;
    }


    public function create($request)
    {
        DB::beginTransaction();
        try {
            $payload = $request->except(['_token', 'send']);
            //Except nhận một mảng các khóa muốn loại bỏ khỏi dữ liệu yêu cầu, ở đây là _token và send
            $this->countryRepository->create($payload);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();
            die();
            return false;
        }
    }


    public function update($id, $request)
    {
        DB::beginTransaction();
        try {

            $payload = $request->except(['_token', 'send']);
            // dd($payload);
            $this->countryRepository->update($id, $payload);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();
            die();
            return false;
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $this->countryRepository->delete($id);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();
            die();
            return false;
        }
    }
    private function paginateSelect()
    {
        return [
            'id',
            'name',
            'slug',
        ];
    }
}
