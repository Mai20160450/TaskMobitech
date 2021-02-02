<?php

namespace App\Http\Resources;

use App\ArticaleTranslation;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticaleResource extends JsonResource
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
            'id'=>$this->id,
            'articaleTranslation' => ArticaleTranslationResource::collection($this->articaletranslation),
            'created_at' => $this->created_at->diffForHumans(),
          ];
    }
}
