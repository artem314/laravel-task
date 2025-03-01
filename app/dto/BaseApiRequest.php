<?php

namespace App\dto;

class BaseApiRequest implements BaseApiInterface
{
    public function __construct(protected string $status,
                                protected string $message,
                                protected mixed $data)
    {
    }

    public function getData(): array
    {
        return [
            'status' => $this->status,
            'message' => $this->message,
            'data' => $this->data,
        ];
    }
}
