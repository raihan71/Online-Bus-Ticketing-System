@extends('layouts.layout-single')

@section('judul')
Order
@stop

@section('first-left')
<div class="col-sm-12 col-xs-12 col-md-7">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-check-square-o"></i> {{__('Isi Data Secara Lengkap')}}</h3>
		</div>
		<form accept="charset-utf8" method="post" action="{{route('user.reserve.order',($ticket->id))}}">
			{!!csrf_field()!!}
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label class="control-label">Nama *</label>
							<input type="text" name="name" class="form-control" placeholder="Masukan Nama Anda" required="" value="{{Auth::user()->name}}">
						</div>
						<div class="form-group">
							<label class="control-label">Email *</label>
							<input type="email" name="email" class="form-control" placeholder="Masukan Alamat Email Anda" required="" value="{{Auth::user()->email}}">
						</div>
						<div class="form-group">
							<label class="control-label">Kontak *</label>
							<input type="text" name="phone" class="form-control" placeholder="Masukan Kontak Anda" required="" value="{{Auth::user()->phone}}">
						</div>
						<div class="form-group">
							<label class="control-label">Jumlah Tiket *</label>
							<input type="number" name="qty" class="form-control" min="1" max="10" value="1" required="">
						</div>
					</div>
				</div>
			</div>
			<div class="panel-footer text-right">
				<button class="btn btn-success btn-md"><i class="fa fa-check-circle"></i> Submit</button>
				<button class="btn btn-danger btn-md"><i class="fa fa-times"></i> Batal</button>
			</div>
		</form>
	</div>
</div>
@stop

@section('first-right')
<div class="col-sm-12 col-xs-12 col-md-5">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-train"></i> {{__('Detail Travel')}}</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<img class="img-responsive center-block" src="{{$ticket->image}}" alt="">
					</div>
					<div class="form-group text-center">
						<h3 class="h3"><i class="fa fa-map-marker"></i> {{$ticket->source}} - {{$ticket->destination}}</h3>
					</div>
					<div class="form-group">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th colspan="2" class="text-center">Detail Keberangkatan</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><i class="fa fa-train"></i> Asal</td>
									<td>
										{{$ticket->source}}
									</td>
								</tr>
								<tr>
									<td><i class="fa fa-road"></i> Tujuan</td>
									<td>
										{{$ticket->destination}}
									</td>
								</tr>
								<tr>
									<td><i class="fa fa-dollar"></i> Harga</td>
									<td>
										IDR {{str_replace(",", ".",number_format($ticket->price))}}/ticket
									</td>
								</tr>
								<tr>
									<td><i class="fa fa-ticket"></i> Tiket Tersedia</td>
									<td>
										{{$ticket->stock}}
									</td>
								</tr>
								<tr>
									<td>
										<i class="fa fa-calendar-check-o"></i> Tanggal
									</td>
									<td>
										{{$ticket->takeoff_date}} - {{$ticket->takeoff_time}}
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>
@stop