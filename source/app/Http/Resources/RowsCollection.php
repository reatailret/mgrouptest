<?php

namespace App\Http\Resources;

use App\Models\Row;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RowsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $array = $this->collection->toArray();
        $newarray = [];
        foreach ($array as $key => $value) {
            if(!isset($newarray[$value['fdate']])){
                $newarray[$value['fdate']]=[];
            }
            $newarray[$value['fdate']][] = $value;
        }
        return $newarray;
    }
}
