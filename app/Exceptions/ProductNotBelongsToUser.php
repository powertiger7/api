<?php

namespace App\Exceptions;

use Exception;

class ProductNotBelongsToUser extends Exception
{
    public function render(){
        return response()->json('This Product Dont Belongs TO This User',404);
    }
}
