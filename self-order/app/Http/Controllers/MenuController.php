<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

use App\Models\Menu;
use App\Models\Transaction;


use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        $foods = Menu::where('type', 'makanan')->get();
        $drinks = Menu::where('type', 'minuman')->get();
        $desserts = Menu::where('type', 'dessert')->get();
        return view('customers/menu', [
            "foods" => $foods,
            "drinks" => $drinks,
            "desserts" => $desserts,
            "menus" => $menus,
            "title" => "Menu"
        ]);
    }

    public function create()
    {
        return view('admin/formTambahMenu', [
            "page" => "Form Tambah Menu",

            "title" => "Form"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_menu' => 'required',
            'type' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'pic' => 'required|mimes:jpg,jpeg,png|max:2000',
            'pic.*' => 'mimes:jpg,jpeg,png|max:2000'

        ]);
        // $menu = new Menu;
        // $menu->nama_menu = $request->nama_menu;
        // $menu->type = $request->type;
        // $menu->desc = $request->desc;
        // $menu->price = $request->price;
        $data = $request->all();
        if ($request->hasfile('pic')) {
            $data['pic'] = $request->file('pic')->store('assets/images', 'public');
        }
        // $nama_file_baru = $request->pic['foto_produk']['name'];
        // $lokasi_ambil_file = $request->pic['foto_produk']['tmp_name'];
        // $lokasi_simpan_file = "../images/" . $nama_file_baru;
        // move_uploaded_file($lokasi_ambil_file, $lokasi_simpan_file);
        // $menu->pic = $nama_file_baru;

        Menu::create($data);
        return redirect('/homeAdmin/kelolamenu')->with('success', 'Menu berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('admin/formEditMenu', compact('menu'), [

            "page" => "Form Edit Menu",
            "title" => "FormEdit"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'nama_menu' => 'required',
            'type' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'pic' => 'required|mimes:jpg,jpeg,png|max:2000',
            'pic.*' => 'mimes:jpg,jpeg,png|max:2000'

        ]);

        $att = $request->all();
        $data =  Menu::findOrFail($menu->id_menu);
        if ($request->file('pic')) {
            Storage::disk('local')->delete('public/' . $data->pic);
            $att['pic'] =  $request->file('pic')->store('assets/images', 'public');
        }
        $data->update($att);
        return redirect('/homeAdmin/kelolamenu')->with('success', 'Menu Berhasil Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $data = Menu::findOrFail($id);
        $cart = Cart::where('menu_id', $id);
        $cart->delete();
        //Storage::disk('local')->delete('public/' . $data->pic);
        $data->delete();

        // // $order = Order::where('catalog_id', $id);
        // // $order->delete();
        // Menu::destroy($menu->id_menu);
        return redirect('/homeAdmin/kelolamenu')->with('success', 'Menu Berhasil Dihapus!');
    }
}