<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
        // return[
        //     'hi' => $this->collection,
        //     'id' => $this->id,
        //     'user_id' => $this->user_id,
        //     'description' => $this->description,
        //     'title' => $this->title,
        //     'price' => $this->price,
        //     'url' => $this->url,
        //     'logo' => $this->logo,
        //     'created_at' => $this->created_at,
        //     'updated_at' => $this->updated_at,
        //     'user' => $this->user
        // ];
    }
}
