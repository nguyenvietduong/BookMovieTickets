<?php

namespace App\Services;

use App\Services\Interfaces\ReviewServiceInterface;
use App\Repositories\Interfaces\ReviewRepositoryInterface as ReviewRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

/**
 * Class ReviewService
 * @package App\Services
 */
class ReviewService extends BaseService implements ReviewServiceInterface
{
    protected $reviewRepository;

    public function __construct(
        ReviewRepository $reviewRepository
    ) {
        $this->reviewRepository = $reviewRepository;
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
        $categories     = $this->reviewRepository->pagination(
            $this->paginateSelect(),
            $condition,
            $perPage,
            ['path' => '/admin/review/index'],
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
            $this->reviewRepository->create($payload);
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
            $this->reviewRepository->update($id, $payload);
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
            $this->reviewRepository->delete($id);

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
            'user_id',
            'movie_id',
            'rating',
            'comment',
        ];
    }
}
