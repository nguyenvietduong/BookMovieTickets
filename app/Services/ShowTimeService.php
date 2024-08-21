<?php

namespace App\Services;

use App\Services\Interfaces\ShowTimeServiceInterface;
use App\Repositories\Interfaces\ShowTimeRepositoryInterface as ShowTimeRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

/**
 * Class ShowTimeService
 * @package App\Services
 */
class ShowTimeService extends BaseService implements ShowTimeServiceInterface
{
    protected $showtimeRepository;

    public function __construct(
        ShowTimeRepository $showtimeRepository
    ) {
        $this->showtimeRepository = $showtimeRepository;
    }

    public function paginate($request)
    {
        $condition = [
            'keyword'           => addslashes($request->input('keyword')),
            'searchColumns'     => ['start_timestamp', 'end_time', 'price'],
            // 'publish'   => $request->integer('publish'),
            // 'where'     => [
            //     ['role', '=', 'member'],
            // ],
        ];

        $perPage        = ($request->integer('perpage') > 0) ? $request->integer('perpage') : 5;
        $categories     = $this->showtimeRepository->pagination(
            $this->paginateSelect(),
            $condition,
            $perPage,
            ['path' => '/admin/showtime/index'],
        );

        return $categories;
    }


    public function create($request)
    {
        DB::beginTransaction();
        try {
            $payload = $request->except(['_token', 'send']);

            // dd($payload);
            //Except nhận một mảng các khóa muốn loại bỏ khỏi dữ liệu yêu cầu, ở đây là _token và send
            $this->showtimeRepository->create($payload);
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
            $this->showtimeRepository->update($id, $payload);
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
            $this->showtimeRepository->delete($id);

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
            'movie_id',
            'screen_id',
            'start_timestamp',
            'end_time',
            'price',
        ];
    }
}
