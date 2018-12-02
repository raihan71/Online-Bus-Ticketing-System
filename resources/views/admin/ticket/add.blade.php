@extends('layouts.layout-single')

@section('judul')
Pengaturan Tiket :: Tambah
@stop

@section('first-left')
<form accept-charset="utf-8" action="{{route('admin.manage-ticket.store')}}" method="post">
	{!!csrf_field()!!}
	<div class="col-sm-12 col-xs-12 col-md-7">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-ticket"></i> {{__('Tambah Tiket')}}</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label class="control-label">Asal Keberangkatan*</label>
							<input type="text" name="source" class="form-control" placeholder="Masukan Asal Keberangkatan" required="">
						</div>
						<div class="form-group">
							<label class="control-label">Tujuan Keberangkatan*</label>
							<input type="text" name="destination" class="form-control" placeholder="Masukan Tujuan Keberangkatan" required="">
						</div>
						<div class="form-group">
							<label class="control-label">Image (opsional)</label>
							<input type="text" name="image" class="form-control" placeholder="Masukan URL image Anda">
						</div>
						<div class="form-group">
							<label class="control-label">Keterangan (opsional)</label>
							<textarea class="form-control" name="desc" placeholder="Jelaskan kepada pelanggan terkait tiket keberangkatan ini seperti waktu,website brand,dsb (opsional)" cols="4" rows="5"></textarea>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<div class="col-sm-12 col-xs-12 col-md-5">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label class="control-label">Kategori*</label>
							<select class="selectpicker form-control" id="kategori" name="category_id" required="">
								<option value="" selected="" disabled="">Pilih</option>
								@foreach($category as $key => $data)
									<option value="{{$data->id}}" data-icon="{{$data->icon}}">{{$data->type}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label class="control-label">Harga/tiket *</label>
							<input type="text" name="price" id="price" required="" placeholder="Harga per tiket" class="form-control">
						</div>
						<div class="form-group">
							<label class="control-label">Stok Tiket*</label>
							<input type="number" name="stock" class="form-control" id="stock" placeholder="Stok tiket tersedia" required="" max="10" min="1" value="1">
						</div>
						<div class="form-group">
							<label class="control-label">Tanggal Keberangkatan*</label>
							<input type="text" class="form-control datepicker" id="takeoff" name="takeoff_date" placeholder="Klik disini">
						</div>
						<div class="form-group">
							<label class="control-label">Waktu Keberangkatan*</label>
							<input type="text" name="takeoff_time" class="form-control timepicker" placeholder="Klik disini">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-12 col-xs-12 col-md-5">
		<div class="form-group">
			<div class="text-right">
				<button type="submit" class="btn btn-success btn-md"><i class="fa fa-check-circle"></i> Simpan</button>
				<a href="{{route('admin.manage-ticket')}}"><button class="btn btn-danger btn-md"><i class="fa fa-times"></i> Batal</button></a>
			</div>
		</div>
	</div>
</form>
<div id="show-datepicker"></div>
<div id="show-timepicker"></div>
@stop

@push('scripts')
<script src="{{asset('js/vanilla-masker.min.js')}}"></script>
<script src="{{asset('js/legacy.js')}}"></script>
<script src="{{asset('js/picker.js')}}"></script>
<script src="{{asset('js/picker.date.js')}}"></script>
<script src="{{asset('js/picker.time.js')}}"></script>
<script>
	$(document).ready(function() {
		VMasker(document.querySelector("#price")).maskMoney({
  			unit: 'IDR',
  			precision: 0,
  			zeroCents: true
		});
		VMasker(document.querySelector("#stock")).maskNumber();

		var $date = $('.datepicker').pickadate({
			formatSubmit: 'yyyy-mm-dd',
			hiddenName: true,
            min: [2018, 10, 26],
            container: '#show-datepicker',
            closeOnSelect: true,
            closeOnClear: true,
        });
		var datepicker = $date.pickadate('datepicker');

		var $time = $('.timepicker').pickatime({
			container: '#show-timepicker',
			formatSubmit: 'HH:i', 
			closeOnSelect: true,
            closeOnClear: true,
		});
		var timepicker = $time.pickatime('timepicker');
	});
</script>
@endpush