@extends('layouts.app')

@section('content')
<div clas="container">
    <div class="row">
        <div class= "col-md-10">

            <h1> Kategori</h1>
            <a href ="{{ url('user/create') }}" class="btn btn-primary">Tambah user</a>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope = "col">No</th>
                        <th scope = "col">Nama</th>
                        <th scope = "col">email</th>
                        <th scope = "col">Password</th>
                        <th scope = "col">role</th>
                        <th scope = "col">action</th>

                    </tr>
                </thead>
                <tbody>

                @foreach ($data as $d)
                <tr>
                    <th scope="row"> {{$loop->iteration}}</th>
                    <td> {{$d->name}} </td>
                    <td> {{$d->email}} </td>
                    <td>****</td>
                    <td> {{$d->role}} </td>
                    <td>
                        <div class="d-flex align-items-center list-user-action">
                            <a href="{{ route('user.edit', $d->id) }}" class="btn btn-primary">edit</a>
                                &nbsp;|&nbsp;
                                        <a>
                                            <form action="{{ route('user.destroy', $d->id) }}" method="POST">
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
