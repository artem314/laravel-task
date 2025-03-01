<?php

namespace App\Http\Controllers;

use App\dto\BaseApiRequest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\PaginateResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repository\UserRepositoryInterface;
use App\UserService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function index(UserRepositoryInterface $repository): JsonResponse
    {
        $users = $repository->get();

        $data = new BaseApiRequest(
            __('base.success'),
            '',
            new PaginateResource($users, UserResource::class));

        return $this->JsonResponse($data);
    }

    public function create(UserRequest $request, UserService $service)
    {
        $user = $service->create($request->validated());

        $data = new BaseApiRequest(
            __('base.success'),
            __('base.created'),
            new UserResource($user));

        return $this->JsonResponse($data);
    }

    public function show(User $user): JsonResponse
    {
        $data = new BaseApiRequest(
            __('base.success'),
            '',
            new UserResource($user));

        return $this->JsonResponse($data);
    }

    public function update(UserUpdateRequest $request, UserService $service, User $user): JsonResponse
    {
        $service->update($user, $request->validated());

        $data = new BaseApiRequest(
            __('base.success'),
            __('base.updated'),
            new UserResource($user));

        return $this->JsonResponse($data);
    }

    public function destroy(UserService $service, User $user)
    {
        $service->delete($user);

        $data = new BaseApiRequest(
            __('base.success'),
            __('base.updated'),
            null);

        return $this->JsonResponse($data);
    }
}
