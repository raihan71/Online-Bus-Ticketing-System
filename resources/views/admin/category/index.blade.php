@extends('layouts.layout-admin')

@section('judul')
Pengaturan Kategori
@stop

@section('content')
    <div class="col-sm-9 col-md-9">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-title">
            <i class="fa fa-clone"></i> {{__('Pengaturan Kategori')}}
            <a href="{{route('admin.manage-category.add')}}" class="pull-right"><button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data</button></a>
          </div>
        </div>
        <div class="panel-body">
          <table class="table table-bordered table-striped table-hover" id="category-manage">
            <thead>
              <tr>
                <th class="col-md-1">{{__('Id')}}</th>
                <th class="col-md-2">Kategori</th>
                <th class="col-md-3">Deskripsi</th>
                <th class="col-md-2">Aksi</th>
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
     ajax: '{!! route('admin.manage-category.data')!!}',
     columns: [
        {data: 'id', name:'id'},
        {data: 'type', name: 'type', },
        {data: 'desc', name: 'desc', },
        {data: 'action', name: 'action', orderable: false, searchable: false,},
     ]
    });
  });
</script>
@endpush