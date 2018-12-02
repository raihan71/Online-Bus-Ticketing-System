@extends('layouts.layout-single')

@section('judul')
Tambah :: Pengaturan Brand
@stop

@section('first-left')
    <div class="col-sm-12 col-xs-12 col-md-8 col-md-push-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-title">
            <i class="fa fa-plus"></i> {{__('Tambah Brand')}}
          </div>
        </div>
        <div class="panel-body">
          <form method="post" action="{{route('admin.manage-brand.store')}}" accept-charset="utf-8">
            {!!csrf_field()!!}
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="control-label">Nama Brand *</label>
                  <input type="text" name="name" class="form-control" required="" placeholder="Masukan Kategori">
                </div>
                <div class="form-group">
                  <label class="control-label">Image (opsional)</label>
                  <input type="text" name="image" class="form-control" placeholder="Masukan url image">
                </div>
              </div>
            </div>
        </div>
        <div class="panel-footer text-right">
          <button type="submit" class="btn btn-success btn-md"><i class="fa fa-check-circle"></i> Simpan</button>
          <a href="{{route('admin.manage-brand')}}"><button type="button" class="btn btn-default btn-md"><i class="fa fa-arrow-circle-left"></i> Kembali</button></a>
        </div>
        </form>
      </div>
    </div>
@endsection