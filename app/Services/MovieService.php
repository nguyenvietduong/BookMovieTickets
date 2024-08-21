<?php

namespace App\Services;

use App\Services\Interfaces\MovieServiceInterface;
use App\Repositories\Interfaces\MovieRepositoryInterface    as MovieRepository;
use App\Repositories\Interfaces\CategoryRepositoryInterface as CategoryRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

/**
 * Class MovieService
 * @package App\Services
 */
class MovieService extends BaseService implements MovieServiceInterface
{
    protected $movieRepository;
    protected $categoryRepository;


    public function __construct(
        MovieRepository     $movieRepository,
        CategoryRepository  $categoryRepository,
    ) {
        $this->movieRepository      = $movieRepository;
        $this->categoryRepository   = $categoryRepository;
    }

    public function paginate($request)
    {
        $condition = [
            'keyword'           => addslashes($request->input('keyword')),
            'searchColumns'     => ['name', 'type', 'director', 'year', 'time'],
            'type'              => $request->input('type'),
            // 'where'     => [
            //     ['role', '=', 'member'],
            // ],
        ];

        $perPage        = ($request->integer('perpage') > 0) ? $request->integer('perpage') : 5;
        $showtimes      = $this->movieRepository->pagination(
            $this->paginateSelect(),
            $condition,
            $perPage,
            ['path' => '/admin/movie/index'],
            ['movies'],
        );

        return $showtimes;
    }


    public function create($request)
    {
        DB::beginTransaction();
        try {
            $payload = $request->except([
                '_token',
                'send',
                'poster_url_text',
                'poster_url_file',
                'thumb_url_file',
                'thumb_url_text',
                'trailer_url_file',
                'trailer_url_text',
                'category_id',
                'country_id',
                'actor_id'
            ]);

            if ($request->hasFile('poster_url_file')) {
                $payload['poster_url']  = $this->storage_put('movie/poster_url/', $request->poster_url_file);
            } else {
                $payload['poster_url']  = $request->poster_url_text;
            }

            if ($request->hasFile('thumb_url_file')) {
                $payload['thumb_url']   = $this->storage_put('movie/thumb_url/', $request->thumb_url_file);
            } else {
                $payload['thumb_url']   = $request->thumb_url_text;
            }

            if ($request->hasFile('trailer_url_file')) {
                $payload['trailer_url'] = $this->storage_put('movie/trailer_url/', $request->trailer_url_file);
            } else {
                $payload['trailer_url'] = $request->trailer_url_text;
            }

            $movie = $this->movieRepository->create($payload);

            // dd($movie); // Loại bỏ dòng này trong môi trường sản xuất

            // $data_category = $request->category_id;

            // dd($request->actor_id); // Loại bỏ dòng này trong môi trường sản xuất

            if ($movie) {
                try {
                    $this->movieRepository->attach($movie, 'showtimes', $request->category_id);
                    $this->movieRepository->attach($movie, 'countries', $request->country_id);
                    $this->movieRepository->attach($movie, 'actors', $request->actor_id);
                } catch (\Exception $e) {
                    DB::rollBack();
                    return redirect()->route('movie.index')->withErrors([
                        'error' => 'Có lỗi xảy ra khi đính kèm dữ liệu: ' . $e->getMessage()
                    ]);
                }
            }

            DB::commit();
            return true; // Trả về movie object
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return false;
        }
    }



    public function update($id, $request)
    {
        DB::beginTransaction();
        try {

            $payload = $request->except([
                '_token',
                'send',
                'poster_url_text',
                'poster_url_file',
                'thumb_url_file',
                'thumb_url_text',
                'trailer_url_file',
                'trailer_url_text',
                'category_id',
                'country_id',
                'actor_id'
            ]);

            if ($request->hasFile('poster_url_file')) {
                $payload['poster_url']  = $this->storage_put('movie/poster_url/', $request->poster_url_file);
            } else {
                $payload['poster_url']  = $request->poster_url_text;
            }

            if ($request->hasFile('thumb_url_file')) {
                $payload['thumb_url']   = $this->storage_put('movie/thumb_url/', $request->thumb_url_file);
            } else {
                $payload['thumb_url']   = $request->thumb_url_text;
            }

            if ($request->hasFile('trailer_url_file')) {
                $payload['trailer_url'] = $this->storage_put('movie/trailer_url/', $request->trailer_url_file);
            } else {
                $payload['trailer_url'] = $request->trailer_url_text;
            }

            $movie =    $this->movieRepository->update($id, $payload);

            // dd($movie); // Loại bỏ dòng này trong môi trường sản xuất

            // $data_category = $request->category_id;

            // dd($request->actor_id); // Loại bỏ dòng này trong môi trường sản xuất

            if ($movie) {
                try {
                    $this->movieRepository->sync($movie, 'showtimes', $request->category_id);
                    $this->movieRepository->sync($movie, 'countries', $request->country_id);
                    $this->movieRepository->sync($movie, 'actors', $request->actor_id);
                } catch (\Exception $e) {
                    DB::rollBack();
                    return redirect()->route('movie.index')->withErrors([
                        'error' => 'Có lỗi xảy ra khi đính kèm dữ liệu: ' . $e->getMessage()
                    ]);
                }
            }
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
            $this->movieRepository->delete($id);

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

    private function paginateSelect()
    {
        return [
            'id',
            'name',
            'slug',
            'origin_name',
            'content',
            'type',
            'status',
            'director',
            'poster_url',
            'thumb_url',
            'album_url',
            'is_copyright',
            'sub_docquyen',
            'chieurap',
            'trailer_url',
            'time',
            'episode_current',
            'episode_total',
            'quality',
            'lang',
            'year',
            'view',
        ];
    }
}
