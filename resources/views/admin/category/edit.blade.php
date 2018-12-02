@extends('layouts.layout-single')

@section('judul')
Tambah :: Pengaturan Kategori
@stop

@section('first-left')
    <div class="col-sm-12 col-xs-12 col-md-8 col-md-push-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-title">
            <i class="fa fa-clone"></i> @if(!$show){{__('Edit Kategori')}} @else {{__('Detail Kategori')}} @endif 
          </div>
        </div>
        <div class="panel-body">
        	@if(!$show)
          <form method="post" action="{{route('admin.manage-category.store')}}" accept-charset="utf-8">
            {!!csrf_field()!!}
            @endif
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="control-label">Nama Kategori *</label>
                  @if($show)
                  <input type="text" name="type" class="form-control" required="" value="{{$category->type}}" placeholder="Masukan Kategori" disabled="">
                  @else
                  <input type="text" name="type" class="form-control" required="" value="{{$category->type}}" placeholder="Masukan Kategori">
                  @endif
                </div>
                <div class="form-group">
                  <label class="control-label">Icon Kategori*</label>
                  <select class="form-control selectpicker" name="icon" required="" id="icon">
                    <option selected="" disabled="" value="">Pilih</option>
                    <option value="fa-bus" @if($category->icon == 'fa-bus') {{'selected'}} @endif data-icon="fa-bus">Bus</option>
                    <option value="fa-train" @if($category->icon == 'fa-train') {{'selected'}} @endif data-icon="fa-train">Kereta</option>
                    <option value="fa-plane" @if($category->icon == 'fa-plane') {{'selected'}} @endif data-icon="fa-plane">Pesawat</option>
                    <option value="fa-rocket" @if($category->icon == 'fa-rocket') {{'selected'}} @endif data-icon="fa-rocket">Roket</option>
                    <option value="fa-space-shuttle" @if($category->icon == 'fa-space-shuttle') {{'selected'}} @endif data-icon="fa-space-shuttle">Pesawat ulang alik</option>
                    <option value="fa-ship" @if($category->icon == 'fa-ship') {{'selected'}} @endif data-icon="fa-ship">Kapal</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="control-label">Deskripsi (opsional)</label>
                	@if($show)
                  	<textarea class="form-control" name="desc" placeholder="Deskripsi" disabled="">{{$category->desc}}</textarea>
                  	@else
                  	<textarea class="form-control" name="desc" placeholder="Deskripsi">{{$category->desc}}</textarea>
                  	@endif
                </div>
              </div>
            </div>
        </div>
        <div class="panel-footer text-right">
          @if(!$show)
          <button type="submit" class="btn btn-success btn-md"><i class="fa fa-check-circle"></i> Update</button>
          @endif
          <a href="{{route('admin.manage-category')}}"><button type="button" class="btn btn-default btn-md"><i class="fa fa-arrow-circle-left"></i> Kembali</button></a>
        </div>
        </form>
      </div>
    </div>
@endsection