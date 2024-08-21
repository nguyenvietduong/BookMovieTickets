<?php

namespace App\Repositories;

use App\Models\Screen;
use App\Repositories\Interfaces\ScreenRepositoryInterface;
use App\Repositories\BaseRepository;

/**
 * Class UserService
 * @package App\Services
 */
class ScreenRepository extends BaseRepository implements ScreenRepositoryInterface
{
    protected $model;

    public function __construct(
        Screen $model
    ) {
        $this->model = $model;
    }

}
