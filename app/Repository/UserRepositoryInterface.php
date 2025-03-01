<?php

namespace App\Repository;

use App\Http\Resources\PaginateResource;

interface UserRepositoryInterface
{
    public function get(): PaginateResource;
}
