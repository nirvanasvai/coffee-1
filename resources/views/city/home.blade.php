@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($cities as $item)
            <div class="col-sm-3 pt-2">
                <div class="card bg-secondary">
                    <a class="nav-link text-white" href="{{route('device.inner.city',$item->slug)}}">
                        <h3 class="card-title">{{$item->name}}</h3> </a>
                </div>
                <div class="">
                    @foreach ($item->device as $val)
                        <div class="card  @if ($val->status==1)
                                bg-success
@elseif ($val->status ==2)
                                bg-warning
@else
                                bg-danger
@endif">
                            <h4 class="pt-4">{{$val->name}}</h4>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection
