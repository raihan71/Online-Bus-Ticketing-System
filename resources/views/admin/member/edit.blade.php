@extends('layouts.layout-single')

@section('judul')
Tambah :: Pengaturan Member
@stop

@section('first-left')
    <div class="col-sm-12 col-xs-12 col-md-8 col-md-push-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-title">
            <i class="fa fa-group"></i> @if(!$show){{__('Edit Member')}} @else {{__('Detail Member')}} @endif 
          </div>
        </div>
        <div class="panel-body">
        	@if(!$show)
          <form method="post" action="{{route('admin.manage-member.store')}}" accept-charset="utf-8">
            <input type="hidden" name="id" value="{{$user->id}}">
            {!!csrf_field()!!}
            @endif
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="control-label">Nama Member *</label>
                  @if($show)
                  <input type="text" name="name" class="form-control" required="" value="{{$user->name}}" placeholder="Masukan Kategori" disabled="">
                  @else
                  <input type="text" name="name" class="form-control" required="" value="{{$user->name}}" placeholder="Masukan Kategori">
                  @endif
                </div>
                <div class="form-group">
                  <label class="control-label">Email *</label>
                  @if($show)
                  <input type="email" name="email" class="form-control" required="" value="{{$user->email}}" placeholder="Masukan Email Anda" disabled="">
                  @else
                  <input type="email" name="email" class="form-control" required="" value="{{$user->email}}" placeholder="Masukan Email Anda">
                  @endif
                </div>
                <div class="form-group">
                  <label class="control-label">Kontak (opsional)</label>
                  @if($show)
                  <input type="number" name="phone" class="form-control" value="{{$user->phone}}" placeholder="Kontak Telepon" disabled="">
                  @else
                  <input type="number" name="phone" class="form-control" value="{{$user->phone}}" placeholder="Kontak Telepon">
                  @endif
                </div>
                <div class="form-group">
                  <label class="control-label">Alamat (opsional)</label>
                	  @if($show)
                  	<textarea class="form-control" name="desc" placeholder="Deskripsi" disabled="">{{$user->address}}</textarea>
                  	@else
                  	<textarea class="form-control" name="desc" placeholder="Deskripsi">{{$user->address}}</textarea>
                  	@endif
                </div>
              </div>
            </div>
        </div>
        <div class="panel-footer text-right">
          @if(!$show)
          <button type="submit" class="btn btn-success btn-md"><i class="fa fa-check-circle"></i> Update</button>
          @endif
          <a href="{{route('admin.manage-member')}}"><button type="button" class="btn btn-default btn-md"><i class="fa fa-arrow-circle-left"></i> Kembali</button></a>
        </div>
        </form>
      </div>
    </div>
@endsection