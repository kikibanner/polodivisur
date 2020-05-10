@extends('layouts.master')

@section('ipolt')
    class="active"
@endsection

@section('title')
    Edit
@endsection

@section('content')
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
 
                <form action="/ipolt/{{ $ipolt->id }}/update" method="POST">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">STO</label>
                        <input type="text" class="form-control" name="sto" placeholder="Masukkan STO (Wajib Diisi)" value="{{ $ipolt->sto }}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Merk</label>
                        <input type="text" class="form-control" name="merk" placeholder="Masukkan Merk (Wajib Diisi)" value="{{ $ipolt->merk }}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Type</label>
                        <input type="text" class="form-control" name="type" placeholder="Masukkan Type (Wajib Diisi)" value="{{ $ipolt->type }}"  required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hostname</label>
                        <input type="text" class="form-control" name="hostname" placeholder="Masukkan Hostname (Wajib Diisi)" value="{{ $ipolt->hostname }}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">IP OAM</label>
                        <input type="text" class="form-control" name="ip_oam" placeholder="Masukkan IP OAM (Wajib Diisi)"value="{{ $ipolt->ip_oam }}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Metro</label>
                        <input type="text" class="form-control" name="metro" placeholder="Masukkan Metro (Opsional)" value="{{ $ipolt->metro }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Metro Port 1</label>
                        <input type="text" class="form-control" name="metro_port_1" placeholder="Masukkan Metro Port 1 (Opsional)" value="{{ $ipolt->metro_port_1}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Metro Port 2</label>
                        <input type="text" class="form-control" name="metro_port_2" placeholder="Masukkan Metro Port 2 (Opsional)" value="{{ $ipolt->metro_port_2 }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">VLAN Inet</label>
                        <input type="text" class="form-control" name="vlan_inet" placeholder="Masukkan VLAN Inet (Opsional)" value="{{ $ipolt->vlan_inet }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat (Opsional)" value="{{ $ipolt->alamat }}">
                    </div>
                    <button type="submit" class="btn btn-warning">Update</button>
                </form>

    </div>
</div>
@endsection

@section('content1')
    <h1>Edit Data</h1>
        

@endsection