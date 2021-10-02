@extends('layouts.app')

@section('title',$city->name)

@section('content')

    <div class="container">
        <div class="">
            <h4 class="card-header text-center">{{$city->name}}</h4>
            <div class="row pt-2 mb-2 ml-1 mr-1">
            @foreach ($city->companies as $item)
                    <div class="col-sm-6">
                        <h2 class="text-lg-center">{{$item->name}}</h2>
                        @foreach($item->deviceRelationship as $val)
                            <div class="card">
                                <div class="@if ($val->status==1)
                                        bg-success
@elseif ($val->status ==2)
                                        bg-warning
@else
                                        bg-danger
@endif">
                                    <a href="{{route('device.inner',$val->id)}}" class="nav-link text-dark">
                                        <h5 class="card-title">{{$val->name}}</h5>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
            @endforeach
            </div>
        </div>
    </div>

@endsection
