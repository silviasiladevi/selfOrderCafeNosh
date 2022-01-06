<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::id();
        $carts = Cart::where('user_id', $userId)->get();
        $userId = Auth::id();
        $menus = Menu::all();
        if (Cart::where('user_id', '=', $userId)->exists()) {

            return view('customers/cart', [

                "carts" => $carts,
                "menus" => $menus,
                "userId" => $userId,
                "title" => "Keranjang",
                "page" => "CART"
            ]);
        } else {
            return view('customers/cart', [
                "carts" => $carts,
                "menus" => $menus,
                "userId" => $userId,
                "title" => "Keranjang",
                "page" => "CART"
            ])->with('InfoAlert', 'Keranjang anda masih kosong :<');
        }
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
    public function store(Request $request)
    {
        $cart = new Cart();


        if (Cart::where('menu_id', '=', $request->menu_id)->where('user_id', '=', $request->user_id)->exists()) {
            $cart = Cart::where('menu_id', '=', $request->menu_id)->where('user_id', '=', $request->user_id)->get();
            $dtjml_beli = Cart::select('jml_beli')->where('menu_id', '=', $request->menu_id)->where('user_id', '=', $request->user_id)->get();
            $jml_beli = $dtjml_beli[0]->jml_beli;
            $jml_belinew = $jml_beli + 1;

            $cart->toQuery()->update([
                'jml_beli' => $jml_belinew,
                'total_harga' => ($jml_belinew) * ($request->price)
            ]);
            return redirect("/dashboard")->with('toast_success', 'Berhasil ditambahkan!');
        } else {
            $cart = new Cart();
            $cart->menu_id = $request->menu_id;
            $cart->user_id = $request->user_id;
            $cart->jml_beli = 1;
            $cart->total_harga = ($cart->jml_beli) * ($request->price);
            $cart->save();
            return redirect("/dashboard")->with('toast_success', 'Menu berhasil ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        $request->validate([
            'jml_beli' => 'required'

        ]);
        $cart = Cart::find($request->id);

        $cart->jml_beli = $request->jml_beli;
        $cart->total_harga = ($cart->jml_beli) * ($request->price);

        $cart->save();
        return redirect('/menu/cart')->with('toast_success', 'Cart Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Cart::findOrFail($id);
        $data->delete();

        // // $order = Order::where('catalog_id', $id);
        // // $order->delete();
        // Menu::destroy($menu->id_menu);
        return redirect('/menu/cart')->with('toast_success', 'Menu Berhasil Dihapus!');
    }
}