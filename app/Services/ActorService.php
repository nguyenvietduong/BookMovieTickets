<?php

namespace App\Services;

use App\Services\Interfaces\ActorServiceInterface;
use App\Repositories\Interfaces\ActorRepositoryInterface as ActorRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

/**
 * Class ActorService
 * @package App\Services
 */
class ActorService extends BaseService implements ActorServiceInterface
{
    protected $actorRepository;


    public function __construct(
        ActorRepository $actorRepository
    ) {
        $this->actorRepository = $actorRepository;
    }



    public function paginate($request)
    {
        $condition = [
            'keyword'           => addslashes($request->input('keyword')),
            'searchColumns'     => ['name'],
        ];

        $perPage                = ($request->integer('perpage') > 0) ? $request->integer('perpage') : 5;
        $actors                  = $this->actorRepository->pagination(
            $this->paginateSelect(),
            $condition,
            $perPage,
            ['path' => '/admin/actor/index'],
            ['movies'],
        );


        return $actors;
    }

    public function create($request)
    {
        DB::beginTransaction();
        try {
            // dd($request->all());
            $payload                    = $request->except(['_token', 'send', 're_password']);

            if ($request->hasFile('image')) {
                $payload['image']       = $this->storage_put('actor_files/image', $request->image);
            }

            // dd($payload);

            $actor                      = $this->actorRepository->create($payload);
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
            $actor          = $this->actorRepository->findById($id);
            $oldImagePath   = $actor->image;

            if ($request->hasFile('image')) {
                $payload['image']       = $this->storage_put('actor_files/image', $request->image);
            }

            // dd($payload);

            // Cập nhật dữ liệu người dùng
            $this->actorRepository->update($id, $payload);

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
            $this->actorRepository->delete($id);
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
            'name',
            'image',
        ];
    }
}
