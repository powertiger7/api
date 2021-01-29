<?php

namespace App\Exceptions;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait ExceptionTrait{

    public function apiException(Request $request, $e){
        if ($e instanceof ModelNotFoundException) {
            return response()->json('Model Not FOund',404);
        }
    
        if ($e instanceof NotFoundHttpException) {
            return response()->json('Page Not FOund',404);
        }
    }

}