<?php

namespace App\Services;

use App\Enums\CategoryTypes;
use App\Models\Categories;
use App\Models\CategoryType;
use App\Models\Evaluates;
use App\Models\Product;
use App\Models\Tag;
use App\Models\Number_Of_Search;
use Cart;

class SearchProductService {

    /**
     * Search Product.
     *
     * @param $param
     * @param $numberPaginate
     * @return Response
     */
    public function search($param, $numberPaginate)
    {
        # Search Product
        $products = Product::searchName($param['keyword']);
        # Set param Category
        if ($param['slug'] === strtolower(CategoryTypes::getKey(1))) {
            $param['category'] = CategoryTypes::FOOD;
        }
        else if ($param['slug'] === strtolower(CategoryTypes::getKey(2))) {
            $param['category'] = CategoryTypes::DRINK;
        }

        # Filter by Category Type
        if ($param['slug'] != "" &&  $param['slug'] != strtolower(CategoryTypes::getKey(1))
          && $param['slug'] != strtolower(CategoryTypes::getKey(2))) {
            $products = $this->getProductByCategorySlug($param['slug']);
        } else if ($param['category'] == CategoryTypes::FOOD || $param['category'] == CategoryTypes::DRINK
            || ($param['category'] != 0 && $param['category'] != 3)) {
            $products = $this->getProductByCategory($param['category'], $param['keyword']);
        }

        # Sort Price is the value
        if (($param['minPrice'] != 0 || $param['maxPrice'] != 0) && ($param['minPrice'] < $param['maxPrice'])) {
          $products = $this->getProductByPrice($param['keyword'], $param['category'],
                $param['minPrice'], $param['maxPrice'], $param['slug']);
        }

        # Sort Alphabet Category Type
        if ($param['sortCategory'] != 0) {
            $products = $this->getProductBySortCategory($products, $param['sortCategory']);
        }

        # Sort Price
        if ($param['sortPrice'] != 0) {
            $products = $this->getProductBySortPrice($products, $param['sortPrice']);
        }

        # Filter Rating
        if ($param['rating'] != 0) {
            $this->getProductByRating($products, $param['rating']);
        }

        # Paginate page
        $products = $products->paginate($numberPaginate);

        # Set old category param
        if ($param['slug'] != ""  &&  $param['slug'] != strtolower(CategoryTypes::getKey(1))
          && $param['slug'] != strtolower(CategoryTypes::getKey(2))) {
            $param['category'] = $this->getCategoryTypeId($param['slug']);
        }

        return view('web.search-products.search-products', compact(['products', 'param']));
    }

    /**
     * Get Product by Category Type.
     */
    private function getProductByCategory($categoryId, $keyword) {
        return CategoryType::find($categoryId)->products()->searchName($keyword);
    }

    /**
     * Get Product by 2 Price.
     */
    private function getProductByPrice($keyword, $category, $minPrice, $maxPrice, $slug){
        if ($slug != "") {
            $product = $this->getProductByCategorySlug($slug);
            return $product->whereBetween('price', [$minPrice, $maxPrice]);
        }

        # Filter by Category
        if ($category) {
            return CategoryType::find($category)->products()
                ->where('products.name', 'like', '%' . $keyword . '%')
                ->whereBetween('price', [$minPrice, $maxPrice]);
        }

        # Sort Price
        return Product::searchName($keyword)->whereBetween('price', [$minPrice, $maxPrice]);
    }

    /**
     * Get Product by sort alphabet Category Type.
     */
    private function getProductBySortCategory($products, $sortCategory) {
        if ($sortCategory == CategoryTypes::FOOD) {
            return $products->orderBy('name');
        }
        if ($sortCategory == CategoryTypes::DRINK) {
            return $products->orderBy('name', 'DESC');
        }
        return $products;
    }

    /**
     * Get Product by sort price.
     */
    private function getProductBySortPrice($products, $sortPrice) {
        if ($sortPrice == 1) {
            return $products->orderBy('price');
        }
        if ($sortPrice == 2) {
            return $products->orderBy('price', 'DESC');
        }
        return $products;
    }

    /**
     * Get Product by Rating.
     */
    private function getProductByRating($products, $rating) {
        $arr_products =  Evaluates::getWithProducts($rating)->get();
        return $products->whereIn('products.id', $arr_products)->orderBy('price', 'DESC');
    }

    /**
     * Get Product by Category Slug.
     */
    private function getProductByCategorySlug($slug) {
        $products = $this->getProductBySlug($slug);
        return $products->products();
    }

    /**
     * Get Products by Category Types or Categories.
     */
    private function getProductBySlug($slug)
    {
        $products = CategoryType::slug($slug)->first();
        if (!$products)
        {
            $products = Categories::slug($slug)->first();
        }
        return $products;
    }

    /**
     * Get Category Type Id.
     */
    private function getCategoryTypeId($slug) {
        if ($slug === CategoryTypes::getKey(1)){
            return CategoryTypes::FOOD;
        }
        if ($slug === CategoryTypes::getKey(2)){
            return CategoryTypes::DRINK;
        }
        return Categories::slug($slug)->first()->category_types_id;
    }

    public function numberOfSearchTag($slug)
    {
        $today = date("Y-m-d");
        $tag = Tag::Slug($slug)->first();
        $count = Number_Of_Search::where('tag_id',$tag->id)->where('created_at','like','%'.$today.'%')->count();

        $number_of_search = Number_Of_Search::where('tag_id',$tag->id)->where('created_at','like','%'.$today.'%')->first();
        if($count == 0){
            $number_of_search = new Number_Of_Search();
            $number_of_search->tag_id = $tag->id;
            $number_of_search->number_of_search = 1;
            $number_of_search->save();
        }
        else{
            $number_of_search->number_of_search = ($number_of_search->number_of_search) + 1;
            $number_of_search->save();
        }
    }
}
