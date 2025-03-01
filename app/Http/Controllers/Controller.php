<?php

namespace App\Http\Controllers;

use App\dto\BaseApiInterface;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function JsonResponse(BaseApiInterface $dto): JsonResponse
    {
        return response()->json($dto->getData());
    }
}
