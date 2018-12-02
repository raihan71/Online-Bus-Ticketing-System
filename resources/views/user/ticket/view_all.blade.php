@extends('layouts.layout-user')

@section('judul')
Cari Tiket
@stop

@section('content')
    <div class="col-sm-12 col-xs-12 col-md-9">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-title">
              <i class="fa fa-ticket"></i> {{__('Cari Tiket')}}
              <a data-toggle="modal" data-target="#myModal" class="pull-right"><i class="fa fa-filter"></i> Filter</a>
          </div>
        </div>
        <div class="panel-body">
          <h4>Menampilkan data berdasarkan : @if($id){{$category->type}} @else semua @endif</h4>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="row">
              @foreach($ticket as $key => $data)
              <div class="col-xs-12 col-sm-12 col-md-3">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <div class="panel-title">
                      {{$data->kode_tkt}}
                    </div>
                  </div>
                  <div class="panel-body">
                    <div class="form-group">
                      <div class="thumbnail">
                        <img src="{{$data->image}}" alt="">
                      </div>
                      <p class="caption">
                       Asal : {{$data->source}}
                      </p>
                      <p class="caption">Tujuan : {{$data->destination}}</p>
                      <p class="caption">Harga : IDR {{str_replace(",",".", number_format($data->price))}}</p>
                    </div>
                  </div>
                  <div class="panel-footer text-right">
                    <button class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Lihat</button>
                    <a href="{{route('user.reserve.form',($data->id))}}"><button class="btn btn-default btn-xs"><i class="fa fa-bookmark"></i> Pesan</button></a>
                  </div>
                </div>
              </div>
              @endforeach

            </div>
            <div class="pull-right">
              {{$ticket->links()}}
              
            </div>
          </div>
        </div>
       
      </div>
    </div>

    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Penyaringan Tiket</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label class="control-label">Asal</label>
              <input type="text" name="source" class="form-control" placeholder="Asal Wilayah">
            </div>
            <div class="form-group">
              <label class="control-label">Tujuan</label>
              <input type="text" name="destination" class="form-control" placeholder="Tujuan Perjalanan">
            </div>
            <div class="form-group">
              <label class="control-label">Tanggal Keberangkatan</label>
              <input type="date" name="takeoff" class="form-control">
            </div>
            <div class="form-group">
              <label class="control-label">Brand</label>
              <select class="form-control" name="brand_id">
                <option value="AirAsia">AirAsia</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Submit</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
@endsection
