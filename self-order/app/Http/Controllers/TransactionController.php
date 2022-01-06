<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use App\Models\Detailtrx;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function keloladaftar()
    {
        $detail = Detailtrx::orderBy('created_at', 'DESC')->get();
        $notas = Transaction::all();
        $menus = Menu::all();
        // $transactions = Transaction::orderBy('kode_trx', 'desc')->groupBy('kode_trx')->get();
        DB::statement("SET SQL_MODE=''");

        // dd($transactions);

        return view('admin/kelolaDaftarTrx', [

            "detail" => $detail,
            "notas" => $notas,
            "menus" => $menus,
            "title" => "trx",
            "page" => "Kelola Daftar Transaksi"
        ]);
    }

    public function history()
    {


        $notas = Transaction::all();
        $userId = Auth::id();
        $menus = Menu::all();
        $detail = Detailtrx::where('user_id', $userId)->orderBy('created_at', 'DESC')->get();
        // $transactions = Transaction::orderBy('kode_trx', 'desc')->groupBy('kode_trx')->get();
        DB::statement("SET SQL_MODE=''");
        $transactions = Detailtrx::where('user_id', $userId)->groupBy('kode_trx')->orderBy('kode_trx', 'desc')->get();
        // dd($transactions);

        return view('customers/history', [
            "transactions" => $transactions,
            "notas" => $notas,
            "detail" => $detail,
            "menus" => $menus,
            "title" => "history",
            "page" => "HISTORY"
        ]);
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
        $userId = Auth::id();
        $carts = Cart::where('user_id', $userId)->get();
        $maxkodenew = "TRX00000";
        $count = Detailtrx::count();
        if ($count > 0) {
            $maxkode = Detailtrx::select('kode_trx')->orderBy('kode_trx', 'desc')->first();
            $maxkodenew = $maxkode->kode_trx;
        }


        $urutan = (int) substr($maxkodenew, 5, 5);
        // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
        $urutan++;
        // // membentuk kode barang baru
        // // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
        // // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
        // // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
        $huruf = "TRX";
        $kode_cart = $huruf . sprintf("%05s", $urutan);



        if (Cart::where('user_id', '=', $userId)->exists()) {
            // user found
            $detail = new Detailtrx();
            $detail->kode_trx = $kode_cart;
            $detail->user_id = $carts[0]->user_id;
            $detail->harga_trx = $carts->sum('total_harga');
            $detail->total_bayar = 0;
            $detail->kembalian = 0;
            $detail->status = 'menunggu pembayaran';
            $detail->save();
            foreach ($carts as $cart) {
                // $menu_id = $cart["id_produk"];
                // $jumlah_beli = $cart["jumlah_beli"];

                // $query         = "CALL insert_transaksi('$id_produk','$jumlah_beli','$kode_cart','$id_user')";
                // mysqli_query($db_con, $query);


                $trx = new Transaction();
                $trx->kode_trx = $kode_cart;
                $trx->menu_id = $cart->menu_id;

                $trx->jml_beli = $cart->jml_beli;
                $trx->total_harga = $cart->total_harga;

                $trx->save();
            }



            $carts->each->delete();

            return redirect("/history")->with('success', 'Pesanan telah dibuat silahkan melakukan pembayaran dikasir terdekat!');
        }
        return redirect("/menu/cart")->with('warning', 'Keranjang anda masih kosong :(');
    }

    public function updateStatus(Request $request, Detailtrx $trx)
    {
        $trxs = Detailtrx::where('kode_trx', $trx->kode_trx)->get();


        $trx->status = $request->status;
        $trx->save();

        return redirect("/homeAdmin/keloladaftar")->with('toast_success', 'Status berhasil diupdate');
        // $trx->status = $request->status;
        // $trx->save();
    }

    public function updateStatusCus(Request $request, Detailtrx $trx)
    {

        $trxs = Detailtrx::where('kode_trx', $trx->kode_trx)->first();

        $trxs->status = $request->status;
        $trxs->save();
        return redirect("/history")->with('toast_success', 'Terimakasih!');
        // $trx->status = $request->status;
        // $trx->save();
    }

    public function updateBayar(Request $request, Detailtrx $trx)
    {


        $trx = Detailtrx::where('kode_trx', $trx->kode_trx)->first();
        $harga = $request->total_harga;
        $trx->kembalian = ($request->total_bayar) - $harga;
        $trx->status = "diproses";
        $trx->total_bayar = $request->total_bayar;

        $trx->save();

        return redirect("/homeAdmin/keloladaftar")->with('success', 'Pembayaran telah selesai :)');

        // $trx->status = $request->status;
        // $trx->save();
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($trx)
    {
        $data = Transaction::where('kode_trx', $trx);
        $data->delete();
        $detail = Detailtrx::where('kode_trx', $trx);
        $detail->delete();



        return redirect('/homeAdmin/keloladaftar')->with('success', 'Transaksi Berhasil Dihapus!');
    }
}