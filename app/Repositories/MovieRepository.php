<?php

namespace App\Repositories;

use App\Models\Movie;
use App\Repositories\Interfaces\MovieRepositoryInterface;
use App\Repositories\BaseRepository;

/**
 * Class UserService
 * @package App\Services
 */
class MovieRepository extends BaseRepository implements MovieRepositoryInterface
{
    protected $model;

    public function __construct(
        Movie $model
    ) {
        $this->model = $model;
    }

}
