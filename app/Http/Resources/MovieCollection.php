<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MovieCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    private $statusCode;
    private $message;

    public function __construct($resource, $statusCode, $message)
    {
        parent::__construct($resource);
        $this->resource = $this->collectResource($resource);
        $this->statusCode = $statusCode;
        $this->message = $message;
    }

    public function toArray(Request $request)
    {
        return [
            'message' => $this->message,
            'statusCode' => $this->statusCode,
            'data' => $this->collection
        ];
    }
}
