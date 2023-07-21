<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'description' => $this->description,
            'credits' => $this->credits,
            
            // Format price 
            'price' => number_format($this->price, 2),

            // Date formatting  
            'created_at' => $this->created_at->format('Y-m-d'),

            // Resource relationship
            'students' => StudentResource::collection($this->students),
        ];
    }
}
