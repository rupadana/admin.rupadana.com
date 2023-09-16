<?php

namespace App\Filament\Resources\LearnSerieResource\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class LearnSerieTransformer extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            ...$this->resource->toArray(),
            'image' => $this->image,
        ];
    }
}
