@extends('layouts.app')

@section('content')

    <div class="container">
        @if (auth()->user()->role ==1)
            <a href="{{route('device.create')}}" class="btn btn-primary mt-4"><i class="far fa-plus-square"></i> Создать</a>

        @endif
        <div class="row">
           @foreach ($devices as $item)
                <div class="col-sm-6 pt-2">
                    <div class="card @include('components.status',['item'=>$item])">
                        <div class="card-body">
                            <a class="nav-link text-dark" href="{{route('device.inner',$item->id)}}">
                                <p class="card-title">{{$item->name}}</p>
                            </a>
                        </div>
                    </div>
                </div>
           @endforeach
        </div>
    </div>

@endsection
