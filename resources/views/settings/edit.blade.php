@extends('layouts.master')

@section('manajemen')
    class="active"
@endsection

@section('title')
    Edit Profil
@endsection

@section('content')
@if(auth()->user()->role =='admin' || auth()->user()->id == $user->id  )
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Edit Data</h3>
    </div>
    <div class="panel-body">
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
                <form action="/profil/{{ $user->id }}/update" method="POST">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" class="form-control" name="name" placeholder="Masukkan Nama (Wajib Diisi)" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">e-Mail</label>
                        <input type="email" class="form-control" name="email" placeholder="Masukkan e-Mail (Wajib Diisi)" value="{{ $user->email }}">
                    </div>
                    @if(auth()->user()->role=='admin')
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Role</label>
                        <select class="form-control" name="role" id="exampleFormControlSelect1">
                            @if($user->role=='admin')
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                            @else
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                            @endif
                        </select>
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password Jolt</label>
                        <input type="password" class="form-control" name="password" placeholder="Masukkan Password (Wajib Diisi)" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username TACACS</label>
                        <input type="text" class="form-control" name="username_tacacs" placeholder="Masukkan username TACACS (Wajib Diisi)" value="{{ $user->user_tacacs }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password TACACS</label>
                        <input type="password" class="form-control" name="password_tacacs" placeholder="Masukkan password TACACS (Wajib Diisi)" value="{{ $user->password_tacacs }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username OLT</label>
                        <input type="text" class="form-control" name="username_olt" placeholder="Masukkan username OLT (Wajib Diisi)" value="{{ $user->user_olt }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password OLT</label>
                        <input type="password" class="form-control" name="password_olt" placeholder="Masukkan password OLT (Wajib Diisi)" value="{{ $user->password_olt }}">
                    </div>
                    <button type="submit" class="btn btn-warning">Update</button>
                </form>

    </div>
</div>
@else
<div class="panel">
    Selain admin, anda hanya bisa mengedit profil anda sendiri
</div>
@endif
@endsection

@section('content1')
    <h1>Edit Data</h1>
        

@endsection