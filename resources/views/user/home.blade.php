@extends('layouts.layout-user')

@section('judul')
Beranda
@stop

@section('content')
    <div class="col-sm-9 col-md-9">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-home"></i> {{__('Beranda')}}</h3>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-4 col-xl-3">
              <div class="card bg-c-green order-card">
                <div class="card-block">
                  <h6 class="m-b-20">My Tickets</h6>
                  <h2 class="text-right"><i class="fa fa-ticket f-left"></i><span>{{$order}}</span></h2>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
