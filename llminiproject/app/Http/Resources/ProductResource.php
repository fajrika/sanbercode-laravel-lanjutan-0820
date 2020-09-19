<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductResource extends ResourceCollection
{
    public function toArray($request)
    {
        // return parent::toArray($request);

        try {
            return [
                'message' => [
                    'text' => $this->collection['message']??'success',
                    'type' => 'success',
                    'code' => 1
                ],
                'metadata' => $this->collection['metadata'],
            ];
        } catch (\Throwable $th) {
            return [
                'message' => [
                    'text' => 'Failed',
                    'type' => 'error',
                    'code' => 0
                ]
            ];
        }
    }
}
