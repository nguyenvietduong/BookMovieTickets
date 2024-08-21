<?php

namespace App\Repositories;

use App\Models\Showtime;
use App\Repositories\Interfaces\ShowTimeRepositoryInterface;
use App\Repositories\BaseRepository;

/**
 * Class UserService
 * @package App\Services
 */
class ShowTimeRepository extends BaseRepository implements ShowTimeRepositoryInterface
{
    protected $model;

    public function __construct(
        Showtime $model
    ) {
        $this->model = $model;
    }

}
