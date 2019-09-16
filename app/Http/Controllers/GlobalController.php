<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class GlobalController extends Controller
{
    public function getProducts_foreach()
    {

        $products = Product::with('categories')->get();

        $output = array();
        foreach($products as $product)
        {
            foreach($product->categories as $category){
                $product_array = array();
                $product_array['id'] = $product->id;
                $product_array['sku'] = $product->sku;
                $product_array['title'] = $product->title;
                $product_array['description'] = $product->description;
                $product_array['price'] = $product->price;
                $product_array['Category'] = $category->title;
                $product_array['CategoryDescr'] = $category->description;

                array_push($output, $product_array);
            }
        }

        return $output;
    }

    public function getProducts_leftJoin()
    {
        $products = Product::leftJoin('product_category','product_id','=','id')
                        ->leftJoin('categories','categories.id','=','category_id')
                        ->get();

        return $products;
    }

    public function getProducts_foreach_category_1()
    {
        $products = Product::with('categories')->get();

        $output = array();
        foreach($products as $product)
        {
            foreach($product->categories as $category){
                if($category->id != 1) continue;

                $product_array = array();
                $product_array['id'] = $product->id;
                $product_array['sku'] = $product->sku;
                $product_array['title'] = $product->title;
                $product_array['description'] = $product->description;
                $product_array['price'] = $product->price;
                $product_array['Category'] = $category->title;
                $product_array['CategoryDescr'] = $category->description;

                array_push($output, $product_array);
            }
        }

        return $output;
    }

    public function getProducts_eager_load_category_1()
    {
        $products = Product::with(['categories'=>function($query){
            $query->where('id', '=', '1');
        }])->get();

        $output = array();
        foreach($products as $product)
        {

            if(is_null($product->categories)) continue;
            foreach($product->categories as $category){

                $product_array = array();
                $product_array['id'] = $product->id;
                $product_array['sku'] = $product->sku;
                $product_array['title'] = $product->title;
                $product_array['description'] = $product->description;
                $product_array['price'] = $product->price;
                $product_array['Category'] = $category->title;
                $product_array['CategoryDescr'] = $category->description;

                array_push($output, $product_array);
            }
        }

        return $output;

        return $products;
    }

    public function getProducts_leftjoin_category_1()
    {
        $products = Product::leftJoin('product_category','product_id','=','id')
        ->leftJoin('categories','categories.id','=','category_id')
        ->where('category_id','=','1')
        ->get();

        return $products;
    }
}
