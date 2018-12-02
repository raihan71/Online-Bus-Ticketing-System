@extends('layouts.layout-user')

@section('judul')
Cari Tiket
@stop

@section('content')
    <div class="col-sm-12 col-xs-12 col-md-9">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-title">
              <i class="fa fa-id-card-o"></i> {{__('My Tiket')}}
          </div>
        </div>
        <div class="panel-body">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="row">
              @foreach($ticket as $key => $data)
              <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <div class="panel-title">
                      {{$data->kode_trx}}
                    </div>
                  </div>
                  <div class="panel-body">
                    <div class="form-group">
                     <p class="caption">
                       {{$data->ticket->source}} - {{$data->ticket->destination}}
                     </p>
                     <p class="caption">{{__('Tanggal')}} : {{$data->ticket->takeoff_date}} - {{$data->ticket->takeoff_time}}</p>
                     <p class="caption">Total Harga : IDR {{str_replace(",", ".",number_format($data->cost))}}</p>
                    </div>
                  </div>
                  <div class="panel-footer text-right">
                    <a href="{{route('user.my-ticket',($data->id))}}"><button class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Lihat</button></a>
                    <button class="btn btn-danger btn-xs"><i class="fa fa-download"></i> Unduh</button>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
       
      </div>
    </div>
@endsection
