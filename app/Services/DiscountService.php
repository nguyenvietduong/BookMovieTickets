<?php

namespace App\Services;

use App\Services\Interfaces\DiscountServiceInterface;
use App\Repositories\Interfaces\DiscountRepositoryInterface as DiscountRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

/**
 * Class DiscountService
 * @package App\Services
 */
class DiscountService extends BaseService implements DiscountServiceInterface
{
    protected $discountRepository;


    public function __construct(
        DiscountRepository $discountRepository
    ) {
        $this->discountRepository = $discountRepository;
    }



    public function paginate($request)
    {
        $condition = [
            'keyword'           => addslashes($request->input('keyword')),
            'searchColumns'     => ['code', 'amount', 'max_uses', 'used_count'],
            // 'where'             => [
            //     ['role', '=', 'member'],
            // ],
        ];

        $perPage                = ($request->integer('perpage') > 0) ? $request->integer('perpage') : 5;
        $discounts                  = $this->discountRepository->pagination(
            $this->paginateSelect(),
            $condition,
            $perPage,
            ['path' => '/admin/discount/index'],
        );


        return $discounts;
    }

    public function create($request)
    {
        DB::beginTransaction();
        try {
            // dd($request->all());
            $payload                    = $request->except(['_token', 'send', 're_password']);

            if ($payload['valid_from'] != null) {
                $payload['valid_from']    = $this->convertDate($payload['valid_from']);
            }

            if ($payload['valid_to'] != null) {
                $payload['valid_to']    = $this->convertDate($payload['valid_to']);
            }

            // dd($payload);

            $discount                       = $this->discountRepository->create($payload);
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

            if ($payload['valid_from'] != null) {
                $payload['valid_from']    = $this->convertDate($payload['valid_from']);
            }

            if ($payload['valid_to'] != null) {
                $payload['valid_to']    = $this->convertDate($payload['valid_to']);
            }

            // dd($payload);

            // Cập nhật dữ liệu người dùng
            $this->discountRepository->update($id, $payload);

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
            $this->discountRepository->delete($id);
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

    private function convertDate($date = '')
    {
        $carbonDate = Carbon::createFromFormat('Y-m-d', $date);
        $date = $carbonDate->format('Y-m-d H:i:s');
        return $date;
    }

    private function paginateSelect()
    {
        return [
            'id',
            'code',
            'amount',
            'valid_from',
            'valid_to',
            'max_uses',
            'used_count',
        ];
    }
}
