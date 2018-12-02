@extends('layouts.layout-single')

@section('judul')
Tambah :: Pengaturan Brand
@stop

@section('first-left')
    <div class="col-sm-12 col-xs-12 col-md-8 col-md-push-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-title">
            <i class="fa fa-briefcase"></i> @if(!$show){{__('Edit Brand')}} @else {{__('Detail Brand')}} @endif 
          </div>
        </div>
        <div class="panel-body">
        	@if(!$show)
          <form method="post" action="{{route('admin.manage-brand.store')}}" accept-charset="utf-8">
            {!!csrf_field()!!}
            @endif
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="control-label">Nama Brand *</label>
                  @if($show)
                  <input type="text" name="type" class="form-control" required="" value="{{$brand->name}}" placeholder="Masukan Kategori" disabled="">
                  @else
                  <input type="text" name="type" class="form-control" required="" value="{{$brand->name}}" placeholder="Masukan Kategori">
                  @endif
                </div>
                <div class="form-group">
                  <label class="control-label">Image (opsional)</label>
                  <div class="clearfix"></div>
                	<img src="{{$brand->image}}" alt="{{$brand->name}}" class="img-responsive img-rounded" width="250" alt="center">
                </div>
              </div>
            </div>
        </div>
        <div class="panel-footer text-right">
          @if(!$show)
          <button type="submit" class="btn btn-success btn-md"><i class="fa fa-check-circle"></i> Update</button>
          @endif
          <a href="{{route('admin.manage-brand')}}"><button type="button" class="btn btn-default btn-md"><i class="fa fa-arrow-circle-left"></i> Kembali</button></a>
        </div>
        </form>
      </div>
    </div>
@endsection