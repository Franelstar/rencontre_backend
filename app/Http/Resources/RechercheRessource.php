<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RechercheRessource extends JsonResource
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
            'id' => $this->name,
            //'nom' => $this->information_personnelles,
            //'data2' => $this->collection,
        ];
    }
}
