@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form action="{{ route('dashboard') }}" method="post" class="card">
                    @csrf
                    <div class="card-header">
                        Order
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="mb-3">
                            <label for="">Pesanan</label>
                            <div class="form-check">
                                <input class="form-check-input" name="orderan[]" value="kopiTubruk" type="checkbox" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Kopi Tubruk
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="orderan[]" value="NasiGoreng" type="checkbox" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Nasi Goreng
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="orderan[]" value="SateAyam" type="checkbox" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Sate Ayam
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="orderan[]" value="JusMangga" type="checkbox" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Jus Mangga
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="">Status</label>
                            <select name="status" id="" class="form-control">
                                <option value="member">Member</option>
                                <option value="biasa">Biasa</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detail Order</div>
                    <div class="card-body">
                        @isset($data)
                            <div class="mb-3">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" value="{{ $data['nama'] }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="">Jumlah Pesanan</label>
                                <input type="number" class="form-control" value="{{ $data['jumlah_order'] }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="">Total Pesanan</label>
                                <input type="number" class="form-control" value="{{ $data['total_order'] }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="">Status</label>
                                <input type="text" class="form-control" value="{{ $data['status'] }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="">Diskon</label>
                                <input type="number" class="form-control" value="{{ $data['diskon'] }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="">Total Pembayaran</label>
                                <input type="number" class="form-control" value="{{ $data['total_pembayaran'] }}" readonly>
                            </div>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
