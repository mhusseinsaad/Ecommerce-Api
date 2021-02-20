<?php

namespace App\Exceptions;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
trait ExceptionTrait {
    public function apiException ($request, $e) {
        if($e instanceof ModelNotFoundException) {
            return response()->json([
                "erros" => "Product Model Not Found"
            ], 404);
        }
        if($e instanceof NotFoundHttpException) {
            return response()->json([
                "erros" => "Incorrect Route"
            ], 404);
        }
    }
}
