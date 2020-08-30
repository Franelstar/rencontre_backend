<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class RechercheCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            //'id' => $this->id,
            //'nom' => $this->information_personnelles,
            'data2' => $this->collection,
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }
}
