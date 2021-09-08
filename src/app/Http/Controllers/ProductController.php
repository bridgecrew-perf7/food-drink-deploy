<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Enums\Status;

class ProductController extends Controller
{
    /**
     * Display Product detail.
     *
     * @param $slug
     * @return Response
     */
    public function getProductDetail($slug)
    {
        $product = Product::productDetail($slug)->first();
        if ($product)
        {
            $product_recommends = Product::conditionProduct()->inRandomOrder()->take(18)->get();
            $reviews = $product->evaluates()->orderBy('created_at', 'DESC')->paginate(5);
            $images = $product->images()->orderBy('created_at', 'DESC')->get();

            return view('web.products.product-detail')->with([
                'product' => $product,
                'reviews' => $reviews,
                'arr_images'  => $images->chunk(3),
                'recommend_products' => $product_recommends->chunk(3),
            ]);
        }
        return abort(404);
    }
}
