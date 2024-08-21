<?php

namespace App\Services;

use App\Services\Interfaces\SeatServiceInterface;
use App\Repositories\Interfaces\SeatRepositoryInterface as SeatRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

/**
 * Class SeatService
 * @package App\Services
 */
class SeatService extends BaseService implements SeatServiceInterface
{
    protected $seatRepository;


    public function __construct(
        SeatRepository $seatRepository
    ) {
        $this->seatRepository = $seatRepository;
    }

    public function paginate($screen_id, $request)
    {
        $screen_id              = $this->seatRepository->findById($screen_id, ['screen_id']);
        $screen_id              = $screen_id->screen_id;

        // dd($screen_id);

        $condition              = [
            'keyword'           => addslashes($request->input('keyword')),
            'searchColumns'     => ['seat_number'],
            // 'publish'   => $request->integer('publish'),
            'where'     => [
                ['screen_id', '=', $screen_id],
            ],
        ];

        $perPage                = ($request->integer('perpage') > 0) ? $request->integer('perpage') : 64;
        $seats                  = $this->seatRepository->pagination(
            $this->paginateSelect(),
            $condition,
            $perPage,
            ['path' => '/admin/seat/index'],
            ['screen'],
        );

        return $seats;
    }


    public function create($request)
    {
        DB::beginTransaction();
        try {
            $payload = $request->except(['_token', 'send']);
            //Except nhận một mảng các khóa muốn loại bỏ khỏi dữ liệu yêu cầu, ở đây là _token và send
            $this->seatRepository->create($payload);
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
            $this->seatRepository->update($id, $payload);
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
            $this->seatRepository->delete($id);

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
            'seat_number',
            'seat_type',
            'screen_id',
        ];
    }
}
