<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddToCartController extends Controller
{
    public function index(){
        $data['route']='cart_page';
        $data['cart_products']= Cart::where('user_id',Auth::id())->get();
        return view('website.cart.index',$data);
    }

    public function addToCart(Request $request){
       $product_id = $request->product_id;
       $qty = $request->qty;
       $user_id = Auth::id();

       if(Auth::check()){

           $product =Product::where('id',$product_id)->exists();
           if($product){

               if (Cart::where('product_id',$product_id)->where('user_id',$user_id)->exists()){
                   return response()->json(['msg'=>'product in your cart already']);


               }else{
                   Cart::create([
                       'user_id'=>$user_id,
                       'product_id'=>$product_id,
                       'qty'=>$qty
                   ]);

                   $product_name = Product::findOrFail($product_id);
                   return response()->json(['msg'=>$product_name->name ." successfully added to your cart"]);
               }

           }else{
               return response()->json(['msg'=>'product not found']);
           }

       }else{
           return response()->json(['msg'=>'login first']);
       }
    }

    public function destroy($id){
        $cart = Cart::where(['id'=>$id,'user_id'=>Auth::id()])->first();
        $cart->delete();
        return redirect()->back()->with('success',trans("messages_trans.success_delete"));
    }

    public  function update(Request $request){
        if (Auth::check()){
            if (Cart::where('id',$request->id)->exists()){
                $cart = Cart::where('id',$request->id)->first();
                $cart->update([
                    'qty'=>$request->qty
                ]);

            }
            return response()->json(['msg'=>'cart updated']);
        }
    }

}
