@extends('layouts.master')

@section('manajemen')
    class="active"
@endsection

@section('title')
    Detail
@endsection

@section('content')

            <div class="panel panel-profile">
                <div class="clearfix">
                    <!-- LEFT COLUMN -->
                    <div class="profile-left">
                        <!-- PROFILE HEADER -->
                        <div class="profile-header">
                            <div class="overlay"></div>
                            <div class="profile-main">
                                <h3 class="name">Nama : {{$user->name}}</h3>
                                <span class="online-status status-available">Grup : {{$user->grup}}</span>
                            </div>
                            <div class="profile-stat">
                                <!-- <div class="row">
                                    <div class="col-md-4 stat-item">
                                        45 <span>Projects</span>
                                    </div>
                                    <div class="col-md-4 stat-item">
                                        15 <span>Awards</span>
                                    </div>
                                    <div class="col-md-4 stat-item">
                                        2174 <span>Points</span>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <!-- END PROFILE HEADER -->
                        <!-- PROFILE DETAIL -->
                        <div class="profile-detail">
                            <div class="profile-info">
                                <h4 class="heading">Informasi</h4>
                                <ul class="list-unstyled list-justify">
                                    <li>E-Mail <span>{{$user->email}}</span></li>
                                    <li>User Tacacs <span>{{$user->user_tacacs}}</span></li>
                                    <li>Id Telegram<span>{{$user->id_telegram}}</span></li>
                                </ul>
                            </div>
                            @if(auth()->user()->role=='admin' || auth()->user()->id == auth()->user()->id )
                            <div class="text-center"><a href="/profil/{{auth()->user()->id}}/edit" class="btn btn-warning">Edit</a></div>
                            @endif
                        </div>
                        <!-- END PROFILE DETAIL -->
                    </div>
                    <!-- END LEFT COLUMN -->
                    <!-- RIGHT COLUMN -->
                    <div class="profile-right">
  
                        <!-- TABBED CONTENT -->
                        <div class="custom-tabs-line tabs-line-bottom left-aligned">
                            <ul class="nav" role="tablist">
                                <li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Aktivitas Terakhir</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab-bottom-left1">
                                <ul class="list-unstyled activity-timeline">
                                    <li>
                                        <i class="fa fa-comment activity-icon"></i>
                                        <p>mboh <a href="#">mboh</a> <span class="timestamp">2 minutes ago</span></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-cloud-upload activity-icon"></i>
                                        <p>mboh<a href="#">mboh</a> mboh <a href="#">mboh</a> <span class="timestamp">7 hours ago</span></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-plus activity-icon"></i>
                                        <p>mboh<a href="#">mboh</a> mboh <a href="#">mboh</a>mboh <span class="timestamp">Yesterday</span></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check activity-icon"></i>
                                        <p>mboh <a href="#">mboh</a> <span class="timestamp">1 day ago</span></p>
                                    </li>
                                </ul>
                                <div class="margin-top-30 text-center"><a href="#" class="btn btn-default">mboh</a></div>
                            </div>

                        </div>
                        <!-- END TABBED CONTENT -->
                    </div>
                    <!-- END RIGHT COLUMN -->
                </div>
            </div>
 
@endsection
