@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label class="form-label">nama</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">email</label>
                    <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">password</label>
                    <input type="text" class="form-control" name="password" value="{{ $user->password }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">role</label>
                    <select class="form-select" name="role">
                        <option selected>Open this select menu</option>
                        <option value="owner">Owner</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>
@endsection
