@extends('layouts.master')

@section('title')
    Edit
@endsection

@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Edit User</h3>
    </div>
    <div class="panel-body">
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
 
                <form action="/ipolt/{{ $user->id }}/update" method="POST">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" class="form-control" name="name" placeholder="Masukkan Nama (Wajib Diisi)" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">User Tacacs</label>
                        <input type="text" class="form-control" name="user_tacacs" placeholder="Masukkan User Tacacs (Wajib Diisi)" value="{{ $user->user_tacacs }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password Tacacs</label>
                        <input type="password" class="form-control" name="password_tacacs" placeholder="Masukkan Nama (Wajib Diisi)" value="{{ $user->password_tacacs }}">
                    </div>
                </form>

    </div>
</div>
@endsection
