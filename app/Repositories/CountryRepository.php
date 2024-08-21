<?php

namespace App\Repositories;

use App\Models\Country;
use App\Repositories\Interfaces\CountryRepositoryInterface;
use App\Repositories\BaseRepository;

/**
 * Class UserService
 * @package App\Services
 */
class CountryRepository extends BaseRepository implements CountryRepositoryInterface
{
    protected $model;

    public function __construct(
        Country $model
    ) {
        $this->model = $model;
    }

}
