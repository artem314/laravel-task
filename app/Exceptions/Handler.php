<?php

namespace App\Exceptions;

use App\dto\BaseApiRequest;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Handler extends ExceptionHandler
{
    /**
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * @return void
     */
    public function register()
    {
        $this->renderable(function (HttpException $e) {
            return response()->json(
                (new BaseApiRequest(
                    __('base.error'),
                    __('base.exception'),
                    [$e->getMessage()]
                ))->getData()
            );
        });
    }
}
