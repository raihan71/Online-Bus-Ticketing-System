@extends('layouts.layout-admin')

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
              <div class="card bg-c-blue order-card">
                <div class="card-block">
                  <h6 class="h6">Total Members</h6>
                  <h2 class="text-right"><i class="fa fa-group f-left"></i><span>{{$user}}</span></h2>
                  <p>Members Active<span class="f-right">{{$user}}</span></p>
                </div>
              </div>
            </div>

            <div class="col-md-4 col-xl-3">
              <div class="card bg-c-green order-card">
                <div class="card-block">
                  <h6 class="m-b-20">Total Reservations</h6>
                  <h2 class="text-right"><i class="fa fa-check-square f-left"></i><span>{{$order}}</span></h2>
                  <p class="m-b-0">Completed Reservation<span class="f-right">{{$order}}</span></p>
                </div>
              </div>
            </div>

            <div class="col-md-4 col-xl-3">
              <div class="card bg-c-yellow order-card">
                <div class="card-block">
                  <h6 class="m-b-20">Total Tickets</h6>
                  <h2 class="text-right"><i class="fa fa-ticket f-left"></i><span>{{$ticket}}</span></h2>
                  <p class="m-b-0">Available Tickets<span class="f-right">{{$ticket}}</span></p>
                </div>
              </div>
            </div>

           {{--  <div class="col-md-4 col-xl-3">
              <div class="card bg-c-pink order-card">
                <div class="card-block">
                  <h6 class="m-b-20">Orders Received</h6>
                  <h2 class="text-right"><i class="fa fa-credit-card f-left"></i><span>486</span></h2>
                  <p class="m-b-0">Completed Orders<span class="f-right">351</span></p>
                </div>
              </div>
            </div> --}}

          </div>
        </div>
      </div>
    </div>
@endsection
