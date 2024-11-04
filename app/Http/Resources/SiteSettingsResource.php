<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SiteSettingsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title ? $this->title : 'ES-BLOG',
            'favicon' => $this->favicon ? env('APP_URL').'/storage/'.$this->favicon : env('APP_URL').'/storage/'.env('DEFAULT_IMAGE'),
            'icon' => $this->icon ? env('APP_URL').'/storage/'.$this->icon : env('APP_URL').'/storage/'.env('DEFAULT_IMAGE'),
            'description' => $this->description ? $this->description : 'ES-BLOG Description',
            'keywords' => $this->keywords ? $this->keywords : 'laravel, ES-BLOG, php, developer, backend',
        ];
    }
}
