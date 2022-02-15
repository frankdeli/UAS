<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart(){
        $find = Cart::where('account_id', Auth::user()->id)->get();
        return view('cart', ['find' => $find]);
    }

    public function rent($id){
        $rent = new Cart();
        $rent->ebook_id = $id;
        $rent->account_id = Auth::user()->id;
        $rent->save();
        return redirect('cart');
    }

    public function delete($id){
        $find = Cart::find($id);
        $find->delete();
        return redirect('cart');
    }

    public function checkout(){
        $find = Cart::all();
        foreach($find as $f){
            $f->delete();
        }
        return view('submit_success');
    }
}
