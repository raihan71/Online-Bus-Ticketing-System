@extends('layouts.layout-admin')

@section('judul')
Pengaturan Member
@stop

@section('content')
    <div class="col-sm-9 col-md-9">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-title">
            <i class="fa fa-group"></i> {{__('Pengaturan Member')}}
          </div>
        </div>
        <div class="panel-body">
          <table class="table table-bordered table-striped table-hover" id="category-manage">
            <thead>
              <tr>
                <th class="col-md-1">{{__('Id')}}</th>
                <th class="col-md-3">Nama</th>
                <th class="col-md-3">Email</th>
                <th class="col-md-2">Kontak</th>
                <th class="col-md-3">Aksi</th>
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
     ajax: '{!! route('admin.manage-member.data')!!}',
     columns: [
        {data: 'id', name:'id'},
        {data: 'fullname', name: 'fullname', },
        {data: 'email', name: 'email', },
        {data: 'phone', name: 'phone', },
        {data: 'action', name: 'action', orderable: false, searchable: false,},
     ]
    });
  });
</script>
@endpush