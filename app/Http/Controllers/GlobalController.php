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
                $tmp_array = array();
                $tmp_array['Product'] = $product->title;
                $tmp_array['sku'] = $product->sku;
                $tmp_array['Category'] = $category->title;
                $tmp_array['CategoryDescr'] = $category->description;


                array_push($output, $tmp_array);
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

                $tmp_array = array();
                $tmp_array['Product'] = $product->title;
                $tmp_array['sku'] = $product->sku;
                $tmp_array['Category'] = $category->title;
                $tmp_array['CategoryDescr'] = $category->description;


                array_push($output, $tmp_array);
            }
        }

        return $output;
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
