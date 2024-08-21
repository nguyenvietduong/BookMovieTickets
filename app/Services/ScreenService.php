<?php

namespace App\Services;

use App\Services\Interfaces\ScreenServiceInterface;
use App\Repositories\Interfaces\ScreenRepositoryInterface as ScreenRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

/**
 * Class ScreenService
 * @package App\Services
 */
class ScreenService extends BaseService implements ScreenServiceInterface
{
    protected $screenRepository;


    public function __construct(
        ScreenRepository $screenRepository
    ) {
        $this->screenRepository = $screenRepository;
    }

    public function paginate($request)
    {
        $condition = [
            'keyword'           => addslashes($request->input('keyword')),
            'searchColumns'     => ['name', 'seat_capacity', 'screen_type'],
            // 'publish'   => $request->integer('publish'),
            // 'where'     => [
            //     ['role', '=', 'member'],
            // ],
        ];

        $perPage        = ($request->integer('perpage') > 0) ? $request->integer('perpage') : 5;
        $categories     = $this->screenRepository->pagination(
            $this->paginateSelect(),
            $condition,
            $perPage,
            ['path' => '/admin/screen/index'],
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
            $this->screenRepository->create($payload);
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
            $this->screenRepository->update($id, $payload);
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
            $this->screenRepository->delete($id);

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
            'seat_capacity',
            'screen_type',
        ];
    }
}
