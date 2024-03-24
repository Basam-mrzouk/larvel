<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{

    public function toArray($request)
    {
        return [

            "id"=>$this->id,
            "title in English"=>$this->title_en,
            "title in Arabic"=>$this->title_ar,
            "Description in English"=>$this->description_en,
            "Description in Arabic"=>$this->description_ar,
            "parent_id"=>$this->parent_id,
            "url_image"=>$this->cate_image,

        ];
    }
}
