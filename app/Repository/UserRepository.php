<?php

namespace App\Repository;

use App\Http\Resources\PaginateResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Spatie\QueryBuilder\QueryBuilder;

class UserRepository implements UserRepositoryInterface
{
    public function get(): PaginateResource
    {
        $users = QueryBuilder::for(User::class)
            ->allowedFilters('name')
            ->defaultSort('name')
            ->allowedSorts(['name', 'id'])
            ->jsonPaginate();

        return new PaginateResource($users, UserResource::class);
    }
}
