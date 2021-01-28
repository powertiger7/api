<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductCollection extends JsonResource
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
            'name' => $this->name,
            'discount' => $this->discount,
            'total_price' => round(( 1 - ($this->discount / 100) ) * $this->price, 1),
            'rating' => $this->reviews->count() > 0 ? round($this->reviews->sum('star') / $this->reviews->count(),1) : '',
            'href' => [
                'reviews' => route('reviews.index', $this->id)
            ] 
        ];

        // return parent::toArray($request);
        // return $this->collection->map(function ($product) {
        //     return [
        //         'id' => $product->id,
        //         'name' => $product->name,
        //         'description' => $product->details
        //     ];
        // });
        // return [
        //     'name' => $this->collection[0]->name,
        //     'meta' => ['song_count' => $this->collection->count()],
        // ];
    }
}
