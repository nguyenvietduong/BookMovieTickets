<?php

namespace App\Repositories;

use App\Models\Discount;
use App\Repositories\Interfaces\DiscountRepositoryInterface;
use App\Repositories\BaseRepository;

/**
 * Class UserService
 * @package App\Services
 */
class DiscountRepository extends BaseRepository implements DiscountRepositoryInterface
{
    protected $model;

    public function __construct(
        Discount $model
    ) {
        $this->model = $model;
    }

}
