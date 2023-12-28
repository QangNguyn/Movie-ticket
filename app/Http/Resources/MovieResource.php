<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'duration' => $this->duration,
            'description'=>$this->description,
            'banner' => url('/') . $this->banner,
            'link_trailer' => $this->link_trailer,
            'director' => $this->whenLoaded('director'),
            'categories' => $this->whenLoaded('categories'),
            'performers' => PerformerResource::collection($this->whenLoaded('performers'))
        ];
    }
}
