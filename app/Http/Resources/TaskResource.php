<?php

namespace App\Http\Resources;

use App\Services\DateServiceInterface;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $dateService = resolve(DateServiceInterface::class);
        return [
            'id' => $this->resource->id,
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'expiration_at' => $dateService->format($this->expiration_at),
            'created_at' => $dateService->format($this->created_at),
            'updated_at' => $dateService->format($this->updated_at),
        ];
    }
}
