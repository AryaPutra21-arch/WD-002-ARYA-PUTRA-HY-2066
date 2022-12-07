@extends('layouts.app')

@section('content')

<div clas="container">
    <div class="row">
        <div class= "col-md-10">

            <h1> MENU KAMI</h1>
            <a href ="{{ url('menu/create') }}" class="btn btn-primary">Tambah Kategori</a>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope = "col">No</th>
                        <th scope = "col">Nama</th>
                        <th scope = "col">foto</th>
                        <th scope = "col">harga</th>
                        <th scope = "col">Keterangan</th>
                        <th scope = "col">Kategori</th>
                        <th scope = "col">Action</th>




                    </tr>
                </thead>
                <tbody>

                @foreach ($data as $d)
                <tr>
                    <th scope="row"> {{$loop->iteration}}</th>
                    <td> {{$d->nama}} </td>
                    <td>
                        <img src="{{asset('storage/' .$d->foto)}}" alt="" width="100px">
                    </td>
                    <td> {{$d->foto}} </td>
                    <td> {{$d->harga}} </td>
                    <td> {{$d->keterangan}} </td>
                    <td> {{$d->kategori->nama}} </td>



                    <td>
                        <div class="d-flex align-items-center list-user-action">
                            <a href="{{ route('menu.edit', $d->id) }}" class="btn btn-primary">edit</a>
                                &nbsp;|&nbsp;
                                        <a>
                                            <form action="{{ route('menu.destroy', $d->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger text-light" onclick="return confirm('Are you sure you want to delete this item ?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </a>
                            </div>
                        </td>
                    </tr>

                @endforeach
            </div>
        </div>
    </div>
@endsection
