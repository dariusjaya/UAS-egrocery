<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    //
    public function buy($id){

        $exist_cart = Cart::all()->where('account_id','=', Auth::id())->where('item_id','=',$id) ->first();

        if($exist_cart == null){
            $cart = new Cart([
                'account_id' => Auth::id(),
                'item_id' => $id
            ]);

            $cart->save();
            return Redirect::back()->with(['message' => "Item successfully added to cart"]);
        }

        return Redirect::back()->with(['message' => "Item already on Cart"]);

    }

    public function cart_page(){

        $cart_items = Cart::all()->where('account_id','=', Auth::id());
        return view('cart',['cart_items' => $cart_items,
            'img' => ["https://www.akc.org/wp-content/uploads/2017/11/Pembroke-Welsh-Corgi-standing-outdoors-in-the-fall.jpg",
            'https://www.scotsman.com/webimg/b25lY21zOmU5ZGRiMzIyLTFhYzQtNGM5My04ZWUyLWNhOGQyYjc1NzljMjo5ZjJiZGI4OS05OTE5LTQyY2UtYjI3My1mMDkyN2UxMjQ2MWM=.jpg?width=640&quality=65&smart&enable=upscale',
            'https://www.rd.com/wp-content/uploads/2021/01/GettyImages-512536165.jpg',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR9xP-HvowVI9bA3cFpLGW8eMYUiWqDJbhugw&usqp=CAU']]);
    }

    public function delete($id){
        $cart_item = Cart::all()->where('id', '=', $id)->first();
        $cart_item->delete();

        return Redirect::back()->with(['message' => "Item on Cart has been removed"]);
    }

    public function checkout(){
        Cart::where('account_id', '=', Auth::id())->delete();

        return view('message')->with(['message' => 'Success! We will contact you in 1x24 hours']);
    }


}
