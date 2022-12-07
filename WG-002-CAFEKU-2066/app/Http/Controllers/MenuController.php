<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Menu::all(); //deklrasai variabel data yang mengambil dari model Menu
        return view('menu.tampil', compact('data')); //menampilkan ke page tampil dengan membawa isi dari variabel data
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all(); //deklrasai variabel kategori yang mengambil dari model kategori
        return view('menu.tambah', compact('kategori')); //menampilkan ke page tambah dengan membawa isi dari variabel kategori
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all(); // deklrasai isi variabel data dengan menggunakan request all

        $data['foto'] = Storage::put('artikel/foto', $request->file('foto')); //menghubungkan penyimpanan foto ke storage di artikel/foto

        Menu::create($data); //menggunakan fungsi create dari model menu untuk mengirimkan data baru

        return redirect('menu'); //redirecting ke menu
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::all(); // deklrasi variabel kategori yang berisi dari data model kategori
        $menu = Menu::find($id); //deklrasai variabel menu yang berisi model menu dengan mengambil sesuai id
        return view('menu.edit', compact('menu','kategori')); //tampilkan ke page edit dengan membawa data variabel menu dan kategori
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all(); // deklrasi variabel data dengan mengambil semua melalui request al
        $menu= Menu::find($id); // deklrasi variabel menu dengan memanggil sesuai id

        try{//penggunaan try catch untuk pembaruan data
            $data['foto'] = Storage::put('artikel/foto', $request->file('foto'));
            $menu-> update($data);
        }catch (\Throwable $th){
            $data ['foto']= $menu->foto;

            $menu->update($data);//penggunaan fungsi update
        }

        return redirect('menu'); //redirecting ke routing menu
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete(); // menggunakan fungsi delete untuk menghapus data
        return redirect('menu'); //redirecting ke routing menu
    }

    public function berandadepan()
    {
        $menu = Menu::all();// deklarasi variabel menu yang berisi data menu untuk dapat ditampilkan di page beranda
        return view('beranda', compact('menu')); //ditampilkan di page beranda dengna membawa data di variabel menu
    }
}
