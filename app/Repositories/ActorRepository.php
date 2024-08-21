<?php

namespace App\Repositories;

use App\Models\Actor;
use App\Repositories\Interfaces\ActorRepositoryInterface;
use App\Repositories\BaseRepository;

/**
 * Class UserService
 * @package App\Services
 */
class ActorRepository extends BaseRepository implements ActorRepositoryInterface
{
    protected $model;

    public function __construct(
        Actor $model
    ) {
        $this->model = $model;
    }

}
