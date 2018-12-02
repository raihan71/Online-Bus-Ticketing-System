@extends('layouts.layout-single')

@section('judul')
Order
@stop

@section('first-right')
<div class="col-sm-12 col-xs-12 col-md-6 col-md-push-3">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-id-card-o"></i> {{__('Detail Tiket')}}</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<img class="img-responsive center-block" src="{{$ticket->image}}" width="250" alt="">
					</div>
					<div class="form-group text-center">
						<h3 class="h3"><i class="fa fa-map-marker"></i> {{$ticket->source}} - {{$ticket->destination}}</h3>
						<h4 class="h4"><i class="fa fa-plane"> {{$ticket->category->type}}</i> | AirAsia</h4>
					</div>
					<div class="form-group">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th colspan="2" class="text-center">Data diri Pribadi</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><i class="fa fa-user"></i> Nama</td>
									<td>
										{{$order->name}}
									</td>
								</tr>
								<tr>
									<td><i class="fa fa-envelope-o"></i> Email</td>
									<td>
										{{$order->email}}
									</td>
								</tr>
								<tr>
									<td><i class="fa fa-phone"></i> Kontak</td>
									<td>
										{{$order->phone}}
									</td>
								</tr>
								<tr>
									<td>
										<i class="fa fa-ticket"></i> Tiket
									</td>
									<td>
										{{$order->qty}}
									</td>
								</tr>
							</tbody>
						</table>
						<div class="clearfix"></div>
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
										IDR {{str_replace(",", ".", number_format($ticket->price))}}/ticket
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
						<div class="clearfix">
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th colspan="2" class="text-center">Total</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><i class="fa fa-ticket"></i> Tiket</td>
										<td>
											{{$order->qty}}
										</td>
									</tr>
									<tr>
										<td><i class="fa fa-dollar"></i> Harga</td>
										<td>
											<b>IDR {{str_replace(",", ".",number_format($order->cost))}}</b>
										</td>
									</tr>
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="panel-footer text-right">
			<a href="{{route('user.my-ticket.all')}}"><button class="btn btn-primary btn-md"><i class="fa fa-th-list"></i> Lihat Tiket Saya</button></a>
		</div>
	</div>
</div>
@stop