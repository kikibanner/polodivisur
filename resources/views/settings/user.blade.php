@extends('layouts.master')

@section('manajemen')
    class="active"
@endsection

@section('title')
    Pengaturan Pengguna
@endsection



@section('content')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Data Pengguna Aplikasi Jolt</h3>
                <div class="right">
                </div>
            </div>
            <div class="panel-body">
                <!-- TAMBAH DATA -->
                <button type="button" class="btn btn-success btn-sm " data-toggle="modal" data-target="#exampleModal">
                    + Tambah Data User
                </button>
                <!-- /TAMBAH DATA -->
                <br>
                <br>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi (Lihat, Edit, Hapus)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $profil)
                        <tr>
                            <td>{{ $loop->iteration  }}</td>
                            <td>{{ $profil->name }}</td>
                            <td>{{ $profil->email }}</td>
                            <td>{{ $profil->role }}</td>
                            <td>
                            @if($profil->role=='user')
                                <a href="/profil/{{$profil->id}}/detail" class="btn btn-sm btn-info"><i class="lnr lnr-eye"></i></a>
                                <a href="/profil/{{$profil->id}}/edit" class="btn btn-sm btn-warning"><i class="lnr lnr-cog"></i></a>
                                <a href="/profil/{{$profil->id}}/delete" class="btn btn-sm btn-danger" onclick="return confirm('Yakin mau dihapus?')"><i class="lnr lnr-trash"></i></a>
                            @else
                                <a href="/profil/{{$profil->id}}/detail" class="btn btn-sm btn-info"><i class="lnr lnr-eye"></i></a>
                                <a href="/profil/{{$profil->id}}/edit" class="btn btn-sm btn-warning"><i class="lnr lnr-cog"></i></a>
                            @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Data -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/pengaturanpost" method="POST">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" class="form-control" name="name" placeholder="Masukkan nama (Wajib Diisi)">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">e-Mail</label>
                            <input type="email" class="form-control" name="email" placeholder="Masukkan e-Mail (Wajib Diisi)">
                        </div>

                            <input type="password" class="form-control" name="password" value="{{bcrypt('jolt')}}" placeholder="pass" style="display:none">
                            <input type="text" class="form-control" name="role" value="user" placeholder="pass" style="display:none">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Modal Tambah Data -->
@endsection
