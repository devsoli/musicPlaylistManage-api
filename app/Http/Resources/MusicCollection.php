<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MusicCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data'=>MusicResource::collection($this->collection),
            'meta'=>[
                'count'=>$this->total(),
                'total_page'=>$this->lastPage(),
                'current_page'=>$this->currentPage(),
                'per_page'=>$this->perPage()
            ]
        ];
    }
}
