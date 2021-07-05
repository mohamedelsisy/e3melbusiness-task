<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
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
            'id'        => $this->id,
            'name'      => $this->name,
            'category'  =>$this->category->name,
            'hours'     => $this->hours,
            'views'     => $this->views,
            'active'    => $this->active,
            'description'   => $this->description,
            'levels'        => $this->levels,

        ];
    }
}
