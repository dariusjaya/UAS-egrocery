<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ItemController extends Controller
{
    //
    public function index(){
        return Item::all();
    }

    public function home_page(Request $request){
        $items = Item::paginate(10);

        return view('home',[
            'items' => $items,
            'img' => ["https://www.akc.org/wp-content/uploads/2017/11/Pembroke-Welsh-Corgi-standing-outdoors-in-the-fall.jpg",
               'https://www.scotsman.com/webimg/b25lY21zOmU5ZGRiMzIyLTFhYzQtNGM5My04ZWUyLWNhOGQyYjc1NzljMjo5ZjJiZGI4OS05OTE5LTQyY2UtYjI3My1mMDkyN2UxMjQ2MWM=.jpg?width=640&quality=65&smart&enable=upscale',
                'https://www.rd.com/wp-content/uploads/2021/01/GettyImages-512536165.jpg',
                'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR9xP-HvowVI9bA3cFpLGW8eMYUiWqDJbhugw&usqp=CAU']
        ]);
    }

    public function detail_page($id){
        $item = Item::where('item_id','=', $id)->first();

        return view('detail',[
            'item' => $item,
            'img' => ["https://www.akc.org/wp-content/uploads/2017/11/Pembroke-Welsh-Corgi-standing-outdoors-in-the-fall.jpg",
                'https://www.scotsman.com/webimg/b25lY21zOmU5ZGRiMzIyLTFhYzQtNGM5My04ZWUyLWNhOGQyYjc1NzljMjo5ZjJiZGI4OS05OTE5LTQyY2UtYjI3My1mMDkyN2UxMjQ2MWM=.jpg?width=640&quality=65&smart&enable=upscale',
                'https://www.rd.com/wp-content/uploads/2021/01/GettyImages-512536165.jpg',
                'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR9xP-HvowVI9bA3cFpLGW8eMYUiWqDJbhugw&usqp=CAU']
        ]);
    }
}
