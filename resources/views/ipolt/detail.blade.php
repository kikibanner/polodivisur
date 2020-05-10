@extends('layouts.master')

@section('ipolt')
    class="active"
@endsection

@section('title')
    Detail
@endsection

@section('content')

            <div class="panel">
                <div class="clearfix">
                    <!-- LEFT COLUMN -->
                    <div class="profile">
                        <!-- PROFILE HEADER -->
                        <div class="profile-header">
                            <div class="overlay"></div>
                            <div class="profile-main">
                                <h3 class="name">STO : {{$ipolt->sto}}</h3>
                                <span class="online-status status-available">IP OAM : {{$ipolt->ip_oam}}</span>
                            </div>
                        </div>
                        <!-- END PROFILE HEADER -->
                        <!-- PROFILE DETAIL -->
                        <div class="profile-detail">
                            <div class="profile-info">
                                <h4 class="heading">Detail</h4>
                                <br>
                                <table  class="table table-hover">
                                    <tr>
                                        <th>Merk </th>
                                        <td>{{$ipolt->merk}}</td>
                                    </tr>
                                    <tr>
                                        <th>Type</th>
                                        <td>{{$ipolt->type}}</td>
                                    </tr>
                                    <tr>
                                        <th>Hostname</th>
                                        <td>{{$ipolt->hostname}}</td>
                                    </tr>
                                    <tr>
                                        <th>Metro</th>
                                        <td>{{$ipolt->metro}}</td>
                                    </tr>
                                    <tr>
                                        <th>Metro Port 1/th>
                                        <td>{{$ipolt->metro_port_1}}</td>
                                    </tr>
                                    <tr>
                                        <th>Metro Port 2</th>
                                        <td>{{$ipolt->metro_port_2}}</td>
                                    </tr>
                                    <tr>
                                        <th>VLAN Inet</th>
                                        <td>{{$ipolt->vlan_inet}}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>{{$ipolt->alamat}}</td>
                                    </tr>
                                    <tr>
                                        <th>Grup</th>
                                        <td>{{$ipolt->grup}}</td>
                                    </tr>
                                </table>
                            </div>
                            @if(auth()->user()->role=='admin')
                            <div class="text-center"><a href="/ipolt/{{$ipolt->id}}/edit" class="btn btn-warning">Edit </a></div>
                            @endif
                        </div>
                        <!-- END PROFILE DETAIL -->
                    </div>
                    <!-- END LEFT COLUMN -->
                </div>
            </div>
 
@endsection