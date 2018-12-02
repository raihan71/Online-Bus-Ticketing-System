@extends('layouts.layout-single')

@section('judul')
Tambah :: Pengaturan Kategori
@stop

@section('first-left')
    <div class="col-sm-12 col-xs-12 col-md-8 col-md-push-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-title">
            <i class="fa fa-plus"></i> {{__('Tambah Kategori')}}
          </div>
        </div>
        <div class="panel-body">
          <form method="post" action="{{route('admin.manage-category.store')}}" accept-charset="utf-8">
            {!!csrf_field()!!}
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="control-label">Nama Kategori*</label>
                  <select class="form-control selectpicker" name="type" required="" id="icon">
                    <option selected="" disabled="" value="">Pilih</option>
                    <option value="Bus" data-icon="fa-bus">Bus</option>
                    <option value="Kereta" data-icon="fa-train">Kereta</option>
                    <option value="Pesawat" data-icon="fa-plane">Pesawat</option>
                    <option value="Roket" data-icon="fa-rocket">Roket</option>
                    <option value="Pesawat ulang alik" data-icon="fa-space-shuttle">Pesawat ulang alik</option>
                    <option value="Kapal" data-icon="fa-ship">Kapal</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="control-label">Deskripsi (opsional)</label>
                  <textarea class="form-control" name="desc" placeholder="Deskripsi"></textarea>
                </div>
              </div>
            </div>
        </div>
        <div class="panel-footer text-right">
          <button type="submit" class="btn btn-success btn-md"><i class="fa fa-check-circle"></i> Simpan</button>
          <a href="{{route('admin.manage-category')}}"><button type="button" class="btn btn-default btn-md"><i class="fa fa-arrow-circle-left"></i> Kembali</button></a>
        </div>
        </form>
      </div>
    </div>
@endsection