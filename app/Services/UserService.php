<?php

namespace App\Services;

use App\Services\Interfaces\UserServiceInterface;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

/**
 * Class UserService
 * @package App\Services
 */
class UserService extends BaseService implements UserServiceInterface
{
    protected $userRepository;


    public function __construct(
        UserRepository $userRepository
    ) {
        $this->userRepository = $userRepository;
    }



    public function paginate($request)
    {
        $condition = [
            'keyword'           => addslashes($request->input('keyword')),
            'searchColumns'     => ['name', 'email', 'phone', 'address'],
            'where'             => [
                ['role', '=', 'member'],
            ],
        ];

        $perPage                = ($request->integer('perpage') > 0) ? $request->integer('perpage') : 5;
        $users                  = $this->userRepository->pagination(
            $this->paginateSelect(),
            $condition,
            $perPage,
            ['path' => '/admin/user/index'],
        );


        return $users;
    }

    public function create($request)
    {
        DB::beginTransaction();
        try {
            // dd($request->all());
            $payload                    = $request->except(['_token', 'send', 're_password']);

            if ($payload['birthday'] != null) {
                $payload['birthday']    = $this->convertBirthdayDate($payload['birthday']);
            }

            $payload['password']        = Hash::make($payload['password']);

            if ($request->hasFile('image')) {
                $payload['image']       = $this->storage_put('account_files/image', $request->image);
            }

            // dd($payload);

            $user                       = $this->userRepository->create($payload);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();

            // Nếu xảy ra lỗi, xóa ảnh mới nếu đã lưu và không dùng nữa
            if (isset($payload['image'])) {
                Storage::delete($payload['image']);
            }
            
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

            // Lưu lại ảnh cũ để xóa sau nếu cần
            $user = $this->userRepository->findById($id);
            $oldImagePath = $user->image;

            if ($payload['birthday'] != null) {
                $payload['birthday'] = $this->convertBirthdayDate($payload['birthday']);
            }

            if ($request->hasFile('image')) {
                $payload['image']       = $this->storage_put('account_files/image', $request->image);
            }

            // dd($payload);

            // Cập nhật dữ liệu người dùng
            $this->userRepository->update($id, $payload);

            DB::commit();

            // Xóa ảnh cũ sau khi commit thành công
            if ($request->hasFile('image') && $oldImagePath) {
                Storage::delete($oldImagePath);
            }

            return true;
        } catch (\Exception $e) {
            DB::rollBack();

            // Nếu xảy ra lỗi, xóa ảnh mới nếu đã lưu và không dùng nữa
            if (isset($payload['image'])) {
                Storage::delete($payload['image']);
            }

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
            $this->userRepository->delete($id);
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

    private function storage_put($image, $url_path)
    {

        $image_url = Storage::put($image, $url_path);

        return $image_url;
    }

    private function convertBirthdayDate($birthday = '')
    {
        $carbonDate = Carbon::createFromFormat('Y-m-d', $birthday);
        $birthday = $carbonDate->format('Y-m-d H:i:s');
        return $birthday;
    }

    private function paginateSelect()
    {
        return [
            'id',
            'phone',
            'email',
            'address',
            'name',
            'image',
            'birthday',
        ];
    }
}
