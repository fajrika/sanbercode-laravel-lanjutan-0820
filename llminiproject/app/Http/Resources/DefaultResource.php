<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DefaultResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        try {
            return [
                'message' => [
                    'text' => $this->collection['message']??'success',
                    'type' => $this->collection['type']??'success',
                    'code' => $this->collection['code']??1
                ],
                'metadata' => $this->collection['metadata']??'Nothing',
            ];
        } catch (\Throwable $th) {
            return [
                'message' => [
                    'text' => 'Failed',
                    'type' => $this->collection['type']??'error',
                    'code' => $this->collection['message']??0
                ]
            ];
        }
    }
}
