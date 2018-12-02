@extends('layouts.layout-user')

@section('judul')
Cari Tiket
@stop

@section('content')
    <div class="col-sm-9 col-md-9">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-ticket"></i> {{__('Cari Tiket')}}</h3>
        </div>
        <div class="panel-body">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="form-group text-center">
              <h3 class="h3">Pilih Transportasi</h3>
            </div>
            <form action="{{route('user.cari-tiket.all')}}" method="get" accept="charset-utf8">
              <div class="row">
                @foreach($category as $key => $data)
                <div class="col-md-6 col-sm-push-1">
                  <div class="form-group">
                    <input type="radio" name="category_id" id="{{$data->type}}" class="input-hidden" value="{{$data->id}}" />
                    <label for="{{$data->type}}">
                     <span class="fa {{$data->icon}} fa-5x"></span>
                    </label>
                  </div>
                </div>
                @endforeach
              </div>
              <div class="clearfix"></div>
              <div class="form-group">
                <button type="submit" class="btn btn-default btn-block"><i class="fa fa-search"></i> {{__('Cari')}}</button>
              </div>
            </form>
          </div>
        </div>
        <div class="panel-footer">
          
        </div>
      </div>
    </div>
@endsection
