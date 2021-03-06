@extends('layouts.master')

@section('pagetitle')
  Dashboard
@endsection

@section('activedashboard')
  active
@endsection

@section('style')
<style>
  .dukurepodo{
    max-height:300px;
    overflow-y: scroll;
  }
  #mapid { height: 300px; }
</style>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
  integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
  crossorigin=""/>
  <!-- Make sure you put this AFTER Leaflet's CSS -->
  <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
    integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
    crossorigin=""></script>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">

    <div class="card">
        <div class="card-header card-header-icon" data-background-color="green">
            <i class="material-icons">dashboard</i>
        </div>
        <div class="card-content">
            <h4 class="card-title">Status Anda</h4>
            @if($user->result == null)
            Anda Belum Melakukan Tes Mandiri
            @else
            <div class="row">
              <div class="col-md-6">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col"></th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">Gejala</th>
                      <td>{{ str_replace('%20', ' ', $user->gejala ) }}</td>
                    </tr>
                    <tr>
                      <th scope="row">Diagnosis</th>
                      <td>
                        @if(auth()->user()->result == 1)
                        <br>
                        <span class="alert alert-danger">PDP</span>
                        @elseif(auth()->user()->result == 2)
                        <br>
                        <span class="alert alert-warning">ODP</span>
                        @elseif(auth()->user()->result == 0)
                        <br>
                        <span class="alert alert-success">OTG</span>
                        @endif
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-12">
                    Rumah Sakit Terdekat : {{$user->nama_rs}}
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div id="mapid"></div>
                  </div>
                </div>
              </div>
            </div>
            @endif
        </div>
        <div class="card-footer">
          <div class="pull-left">
            <a href="/tesmandiri/{{auth()->user()->id}}/mulai" class="btn btn-primary btn-round">Mulai Tes Mandiri</a>
            <br>
            <br>
          </div>
        </div>
    </div>

  </div>
</div>

<div class="row">
  <div class="col-md-6">

    <div class="card">
        <div class="card-header card-header-icon" data-background-color="rose">
            <i class="material-icons">dashboard</i>
        </div>
        <div class="card-content">
            <h4 class="card-title">Daftar Rumah Sakit</h4>
        </div>
        <div class="card-content dukurepodo">
          <table class="table table-striped table-bordered" id="example">
              <thead>
                  <tr>
                      <th >No.</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($rs as $rs2)
                  <tr>
                      <td >{{ $loop->iteration  }}</td>
                      <td>{{ $rs2->name }}</td>
                      <td>{{ $rs2->address }}</td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
        </div>
        <div class="card-footer">
          <div class="pull-right">
            <a href="#" class="btn btn-rose btn-simple" data-toggle="modal" data-target="#rs">Selengkapnya</a>
          </div>
        </div>
    </div>

  </div>

  <div class="col-md-6">

    <div class="card">
        <div class="card-header card-header-icon" data-background-color="orange">
            <i class="material-icons">dashboard</i>
        </div>
        <div class="card-content">
            <h4 class="card-title">Update COVID-19</h4>
        </div>
        <div class="card-content dukurepodo">
          <iframe src="https://ourworldindata.org/grapher/total-cases-covid-19?tab=map" width="100%" height="600px"></iframe>
        </div>
          <div class="card-footer">
            <div class="pull-right">
              <a href="#" class="btn btn-rose btn-simple" data-toggle="modal" data-target="#map">Selengkapnya</a>
            </div>
          </div>
    </div>

  </div>

  <!-- Classic Modal -->
  <div class="modal fade" id="map" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                      <i class="material-icons">clear</i>
                  </button>
                  <h4 class="modal-title">Update COVID-19</h4>
              </div>
              <div class="modal-body">
                  <iframe src="https://ourworldindata.org/grapher/total-cases-covid-19?tab=map" width="100%" height="600px"></iframe>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Close</button>
              </div>
          </div>
      </div>
  </div>
  <!--  End Modal -->

  <!-- Classic Modal -->
  <div class="modal fade" id="rs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                      <i class="material-icons">clear</i>
                  </button>
                  <h4 class="modal-title">DaftarRumah Sakit yang Menangani COOVID-19 di Surabaya</h4>
              </div>
              <div class="modal-body">
                <table class="table table-striped table-bordered" id="example">
                    <thead>
                        <tr>
                            <th >No.</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rs as $rs)
                        <tr>
                            <td >{{ $loop->iteration  }}</td>
                            <td>{{ $rs->name }}</td>
                            <td>{{ $rs->address }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Close</button>
              </div>
          </div>
      </div>
  </div>
  <!--  End Modal -->

</div>



<script>

	var mymap = L.map('mapid').setView([ {{$user->lat_rs}} , {{$user->long_rs}} ], 13);

	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(mymap);

	L.marker([{{$user->lat_rs}} , {{$user->long_rs}}]).addTo(mymap)
		.bindPopup("<b>Rumah Sakit Terdekat</b><br />").openPopup();


	var popup = L.popup();

	function onMapClick(e) {
		popup
			.setLatLng(e.latlng)
			.setContent("You clicked the map at " + e.latlng.toString())
			.openOn(mymap);
	}

	mymap.on('click', onMapClick);

</script>
@endsection
