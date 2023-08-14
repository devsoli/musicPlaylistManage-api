<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MusicResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'name'=>$this->name,
            'singer'=>$this->singer,
            'image'=>$this->image,
            'spotify'=>$this->soptifyUrl
        ];
    }
}
