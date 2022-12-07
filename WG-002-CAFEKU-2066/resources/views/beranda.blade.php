@extends('layouts.app')

@section('content')

<div class="container">
    <main class="py-4" style="min-height: 80vh">
        <div class="row ms-2 me-2">
        @foreach ($menu as $p)
            <div class="col-6">
                <div class="card" style="width: 18rem;">

                    <div class="card-header">
                    Menu CAFEKU
                    </div>

                    <img src="{{asset('storage/').'/'.$p->foto}}" class="card-img-top" alt="...">
                    <div class="card-body">

                        <h5 class="card-title">Menu : {{ $p->nama}}</h5>
                        <h6 class="card-text">Harga : {{$p->harga}}</h6>
                        <p class="card-text"> Ket : {{$p->keterangan}}</p>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
    </main>

    <footer class="bg-dark text-center">
        <h3 class="text-light">CAFEKU</h3>
        <p class="text-light">Alamat : jl. Sikatan No 37 - Kec. Sukun - Malang Jawa Timur</p>
    </footer>
</div>
@endsection
