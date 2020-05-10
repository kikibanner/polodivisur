@extends('layouts.master')

@section('uncfg')
    class="active"
@endsection

@section('title')
    Daftar UNCFG OLT
@endsection

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection


@section('content')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Data UNCFG</h3>
                <div class="right">
                </div>
            </div>
            <div class="panel-body">

                <form action="/ipolt" method="GET" class="navbar-form navbar-left">
                    <div class="form-group">
                    <label for="exampleFormControlSelect1"><b>STO : </b></label>
                        <select class="form-control" id="exampleFormControlSelect1">
                        @foreach($ipolt as $ip)
                        <option value="">{{$ip->sto}} {{$ip->sto}}</option>
                        @endforeach
                        </select>
                        <button type="submit" class="btn btn-success">Cari</button>
                    </div>
                </form>

                <div class="navbar-form navbar-right">
                    <a class="btn btn-success" href="javascript:void(0)" id="createNewUncfg">+ Buat Data Baru (DUMMY)</a>    
                </div>

                <table class="table table-striped table-bordered data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>IP OLT</th>
                            <th>Hostname OLT</th>
                            <th>F/S/P</th>
                            <th>SN</th>
                            <th width="280px" style="display:none">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Data -->
<div class="modal fade" id="ajaxModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data OLT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="uncfgForm" name="uncfgForm" >
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="exampleInputEmail1">IP STO</label>
                        <input type="text" class="form-control" id="ip_olt" name="ip_olt" placeholder="Enter " value="" maxlength="50" required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">HOSTNAME STO</label>
                        <input type="text" class="form-control" id="hostname_olt" name="hostname_olt" placeholder="Enter " value="" maxlength="50" required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">F/S/P</label>
                        <input type="text" class="form-control" id="fsp" name="fsp" placeholder="Enter " value="" maxlength="50" required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Serial Number</label>
                        <input type="text" class="form-control" id="sn" name="sn" placeholder="Enter " value="" maxlength="50" required="">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary"  id="saveBtn" value="create">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- /Modal Tambah Data -->
@endsection

@section('script')
<script type="text/javascript">
  $(function () {
     
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('ajaxuncfg.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'ip_olt', name: 'ip_olt'},
            {data: 'hostname_olt', name: 'hostname_olt'},
            {data: 'fsp', name: 'fsp'},
            {data: 'sn', name: 'sn'},
            //{data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
     
    $('#createNewUncfg').click(function () {
        $('#saveBtn').val("create-uncfg");
        $('#uncfg_id').val('');
        $('#uncfgForm').trigger("reset");
        $('#modelHeading').html("Create New Uncfg");
        $('#ajaxModel').modal('show');
    });
    
    $('body').on('click', '.editUncfg', function () {
      var id = $(this).data('id');
      $.get("{{ route('ajaxuncfg.index') }}" +'/' + id +'/edit', function (data) {
          $('#modelHeading').html("Edit Uncfg");
          $('#saveBtn').val("edit-uncfg");
          $('#ajaxModel').modal('show');
          $('#edit_id').val(data.id);
          $('#ip_olt').val(data.ip_olt);
          $('#hostname_olt').val(data.hostname_olt);
          $('#fsp').val(data.fsp);
          $('#sn').val(data.sn);
      })
   });
    
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Menyimpan..');
    
        $.ajax({
          data: $('#uncfgForm').serialize(),
          url: "{{ route('ajaxuncfg.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
     
              $('#uncfgForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();
         
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
          }
      });
    });
    
    $('body').on('click', '.deleteUncfg', function () {
     
        var id = $(this).data("id");
        confirm("Are You sure want to delete !");
      
        $.ajax({
            type: "DELETE",
            url: "{{ route('ajaxuncfg.store') }}"+'/'+id,
            success: function (data) {
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
     
  });
</script>
@endsection