<?php

namespace App\DTO;

use JsonSerializable;

class UserDto implements JsonSerializable
{
    private $statusCode;
    private $message;
    private $data;

    public function __construct($statusCode, $data, $message)
    {
        $this->statusCode = $statusCode;
        $this->message = $message;
        $this->data = $data;
    }

    public function jsonSerialize()
    {
        return [
            'status' => $this->statusCode,
            'data' => $this->data,
            'message' => $this->message
        ];
    }
}
