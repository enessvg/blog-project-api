<?php

namespace App\Http\Resources\Portfolio;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
      	$url = config('app.url');
        return [
            'name'  => $this->name,
            'image' => $url . '/storage/' . $this->image,
            'button_text' => $this->button_text,
            'button_link' => $this->button_link,
        ];
    }
}
