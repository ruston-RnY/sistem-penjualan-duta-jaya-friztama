@extends('layouts.main')
@section('title', 'Store | Edit Data User')

@section('content')
    <main>
        <div class="container px-4">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card mt-3">
                        <div class="card-header">
                            <h5>Edit Data User</h5>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <form action="{{ route('users.update', $user->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" name="name" placeholder="Nama user" class="form-control" value="{{ $user->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Email</label>
                                    <input type="email" name="email" placeholder="contoh email@domain.com" class="form-control" value="{{ $user->email }}">
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <select name="role" class="form-control">
                                        <option value="{{ $user->role }}">{{ $user->role }} (Role saat ini)</option>
                                        <option value="">Pilih Role</option>
                                        <option value="ADMIN">Admin</option>
                                        <option value="MANAGER">Manager</option>
                                        <option value="DIREKTUR">Direktur</option>
                                    </select>
                                </div>  
                                <a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm mt-4">Kembali</a>
                                <button type="submit" class="btn btn-primary btn-sm mt-4">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection