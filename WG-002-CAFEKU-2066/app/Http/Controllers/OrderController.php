<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function hitung(Request $request)
    {

        $jumlah_order = 0; //deklarasi variabel jumlah order di awal dengan nilainya
        if($request->orderan != null){ //penggunaan if untuk variabel orderan dan jumlah order
            $orderan = $request->orderan;//deklarasi variabel order
            $jumlah_order = count($orderan);//deklrasi jumlah order yang didapat dari menghitung jumlah data dalam array orderan
        }

        $status = 'member'; //deklarasi status dengan memberi value member karena diminta outputnya 'member'
        $total_order = $jumlah_order*50000; //deklrasi variable total order yang didapat dari variabel jumlah order dikali 50000
        $order = new Pembayaran($status,$total_order); //deklarasi objek dari order dari class pembayaran dengan 2 parameter
        $totalbayar = $order->bayar();//deklarasi total bayar dari objek order dengan fungsi bayar yang inheritance kelas hitung
        $data = [ //menampung data di dalam array yang nantinya akan dilempar ke view dashboard
            'nama' => $request->nama, //mengambil dari variabel nama
            'jumlah_order' =>$jumlah_order, //mengambil dari variabel jumlah order
            'total_order' => $total_order, //mengambil dari deklrasi variabel total order
            'status'=>$status, //mengambil dari deklrasi variabel status
            'diskon'=>$order->diskon($status,$total_order), //mengambil dari objek order dengan menggunakan class diskon yang mengimplemen interface potonganharga
            'total_pembayaran'=>$totalbayar//mengambil dari variabel total bayar yang menginheritance kelas kelas diskon


        ];

        return view('dashboard', compact('data'));
    }

}

interface potonganharga{ //membuat interface potongan harga
    public function diskon(); //menambahkan method diskon
}

class Diskon implements potonganharga{ //deklarasi class diskon yang implement dari interface potongan harga
    public $status; //pemanggilan variabel status agar bisa digunakan di dalam class
    public $total_order; // pemanggilan variabel total order untuk digunakan dalam class
    public function __construct($status,$total_order) //membuat method constructor dengan 2 parameter yaitu status dan total order
    {
        $this->status = $status; //menyiapkan variabel untuk digunakan yang akan digunakan
        $this->total_order = $total_order; //menyiapkan/menunjuk variabel ketika akan digunakan dalam class
    }

    public function diskon()
    {
        if($this->status == 'member' && $this->total_order >=100000){ //pengkondisian if sesuai ketentuan dengan menggunakan variabel status dan total order
            return $this->total_order * (20/100);
        }elseif($this->status == 'member' && $this->total_order < 100000){ //ketentuan if else kedua
            return $this->total_order * (10/100);
        }else{
            return $this->total_order * (0/100); //ketentuan ifelse ketiga dan penutup
        }
    }


}

class Pembayaran extends Diskon{ //membuat class Pembayaran yg inherict dari clas Diskon
    public function bayar() //fungsi bayar dengan return total pesanan - diskon
    {
        return (int) $this->total_order - (int)$this->diskon($this->status,$this->total_order);
    }


}
