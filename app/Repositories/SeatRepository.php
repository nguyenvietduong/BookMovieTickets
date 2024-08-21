<?php

namespace App\Repositories;

use App\Models\Seat;
use App\Repositories\Interfaces\SeatRepositoryInterface;
use App\Repositories\BaseRepository;

/**
 * Class UserService
 * @package App\Services
 */
class SeatRepository extends BaseRepository implements SeatRepositoryInterface
{
    protected $model;

    public function __construct(
        Seat $model
    ) {
        $this->model = $model;
    }

}
