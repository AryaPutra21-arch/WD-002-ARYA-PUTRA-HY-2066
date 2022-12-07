@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form action="{{ route('menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label class="form-label">Nama menu</label>
                    <input type="text" class="form-control" name="nama" value="{{ $menu->nama}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">foto</label>
                    <input type="file" class="form-control" name="foto" value="{{ $menu->foto }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">harga</label>
                    <input type="number" class="form-control" name="harga" value="{{ $menu->harga }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" value="{{ $menu->keterangan }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select class="form-select" aria-label="Default select example" name="kategori_id">
                        <option selected>Open this select menu</option>
                        @foreach ($kategori as $k)
                        <option value="{{ $k->id }}" @selected($menu->kategori_id==$k->id)>{{ $k->nama }}</option>
                        @endforeach
                    </select>
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>
@endsection
