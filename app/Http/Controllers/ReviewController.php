<?php

namespace App\Http\Controllers;

use App\Model\Review;
use App\Model\Product;
use App\Http\Resources\ReviewResource;
use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function index(Product $product)
    {
        // product $product route binding
        return ReviewResource::collection($product->reviews);
    }


    public function create()
    {
        //
    }


    public function store(ReviewRequest $request, Product $product)
    {
        $review = Review::create([
            "product_id" => $product->id,
            "customer" => $request->customer,
            "review" => $request->review,
            "star" => $request->star
        ]);
        return response([
            "data" => new ReviewResource($review)
        ], 201);
    }

    public function show(Review $review)
    {
        //
    }

    public function edit(Review $review)
    {
        //
    }

    public function update(Request $request,Product $product, Review $review)
    {
        $updated_review = $review->update([
            "product_id" => $product->id,
            "customer" => $request->customer,
            "review" => $request->review,
            "star" => $request->star
        ]);
        return response([
            "msg" => "data updated successfully"
        ], 201);
    }

    public function destroy(Product $product, Review $review)
    {
        $review->delete();
        return response(null , 204);
    }
}
