<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class websiteController extends Controller
{
    public function index(){
        $data['route']='index_page';
        $data['categories'] = Category::where('is_popular',1)->select('id','meta_title','meta_description','image','slug')->get();
        $data['products'] = Product::where('trend',1)->select('id','meta_title','meta_description','price','selling_price','image','slug','category_id')->get();
        return view('website.index',$data);
    }
    public function getCategories(){
        $data['route']='categories_page';
        $data['categories'] = Category::where('is_showing',1)->get();
        return view('website.categories',$data);
    }

    public function getCategoryBySlug($slug){

        if (Category::where('slug',$slug)->exists()){
            $data['route']='categories_page';
            $data['category'] = Category::with('products')->where('slug',$slug)->where('is_showing',1)->first();
            return view('website.category',$data);

        }else{
            return redirect('/')->with('error','there is wrong slug');
        }

    }

    public function getProductBySlug($category_slug , $product_slug){

        if (Category::where('slug',$category_slug)->exists()){

            if (Product::where('slug',$product_slug)->exists()){
                $data['route']='categories_page';
                $data['product'] = Product::with('category')->where('slug',$product_slug)->first();
                $data['keywords'] = explode(',', $data['product']->meta_keywords);
                return view('website.product',$data);

            }else{
                return redirect('/')->with('error','there is no product');
            }

        }else{
            return redirect('/')->with('error','there is no category');
        }

    }
}
