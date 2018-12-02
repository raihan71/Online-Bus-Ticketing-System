@extends('layouts.layout-admin')

@section('judul')
Pengaturan Tiket
@stop

@section('content')
    <div class="col-sm-9 col-md-9">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-title">
            <i class="fa fa-ticket"></i> {{__('Pengaturan Tiket')}}
            <a href="{{route('admin.manage-ticket.add')}}" class="pull-right"><button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data</button></a>
          </div>
        </div>
        <div class="panel-body">
          <table class="table table-bordered table-striped table-hover" id="category-manage">
            <thead>
              <tr>
                <th>ID</th>
                <th>Kode</th>
                <th>Asal</th>
                <th>Tujuan</th>
                <th>Harga</th>
                <th>Stock</th>
                <th>Aksi</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
@endsection

@push('scripts')
<script>
  $(function() {
    $('#category-manage').DataTable({
     order: [[0,'desc']], 
     processing: true,  
     serverSide: true, 
     ajax: '{!! route('admin.manage-ticket.data')!!}',
     columns: [
        {data: 'id', name: 'id', },
        {data: 'kode_tkt', name:'kode_tkt'},
        {data: 'source', name: 'source', },
        {data: 'destination', name: 'destination', },
        {data: 'price', name: 'price', },
        {data: 'stock', name: 'stock', },
        {data: 'action', name: 'action', orderable: false, searchable: false,},
     ]
    });
  });
</script>
@endpush