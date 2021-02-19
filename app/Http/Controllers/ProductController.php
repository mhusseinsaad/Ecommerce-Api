<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Product\ProductCollection;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('index', 'show');
    }
    public function index()
    {
        return ProductCollection::collection(Product::paginate(20));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'detail' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'discount' => $request->discount,
        ]);

        return response([
            'data' => new ProductResource($product)
        ], 201);
    }

    public function show(Product $product)
    {
        return new ProductResource($product);
    }
    public function edit(Product $product)
    {

    }

    public function update(Request $request, Product $product)
    {
        $product->update([
            'name' => $request->name,
            'detail' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'discount' => $request->discount,
        ]);
        return response([
            'data' => new ProductResource($product)
        ], 201);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response(null, 204);
    }
}
