@extends('layouts.master')

@section('pagetitle')
  Tes Mandiri
@endsection

@section('activetes')
  active
@endsection

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-icon" data-background-color="green">
          <i class="material-icons">dashboard</i>
      </div>
      <div class="card-content">
          <h4 class="card-title">Tes Mandiri Diagnosis COVID-19</h4>
      </div>
      <div class="card-content dukurepodo">
        <form action="/tesmandiri/{{ $user->id }}/simpan" method="POST">
        {{ csrf_field() }}
          <!--<div class="checkbox">
              <label>
                  <input type="checkbox" name="gejala[0]" value="batuk">Batuk
              </label>
          </div>
          <div class="checkbox">
              <label>
                  <input type="checkbox" name="gejala[1]" value="Pilek">Pilek
              </label>
          </div>
          <div class="checkbox">
              <label>
                  <input type="checkbox" name="gejala[2]" value="Demam">Demam
              </label>
          </div>
          <div class="checkbox">
              <label>
                  <input type="checkbox" name="gejala[]" value="Sesak Napas">Sesak Napas
              </label>
          </div>
          <div class="checkbox">
              <label>
                  <input type="checkbox" name="gejala[]" value="Diare">Diare
              </label>
          </div>-->
          <div class="form-group">
            Jenis Kelamin
            <div class="radio">
                <label>
                    <input type="radio" name="jenis_kelamin" checked="true" value="pria"> Laki-laki
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="jenis_kelamin" value="wanita"> Perempuan
                </label>
            </div>
          </div>
          <div class="form-group">
            Usia(dalam tahun)<input type="number" class="form-control" name="usia" placeholder="usia">
          </div>
          <div class="form-group">
            Hari Sakit<input type="number" class="form-control" name="hari_sakit" placeholder="">
          </div>
          <div class="form-group">
            Tuliskan Gejala Anda (Contoh : Batuk,pilek,demam)<input type="texfield" class="form-control" name="gejala" placeholder="">
          </div>
          <button type="submit" class="btn btn-warning">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
