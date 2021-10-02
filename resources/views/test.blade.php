@extends('layouts.app')

@section('content')

<div class="container">
    @foreach($devices as $item)
        <h3>{{$item->name}}</h3>

        <p class="@if ($item->coca)

        @endif"> Cocoa {{$item->cocoa}}%</p>
        <p>Coffee {{$item->coffee}}%</p>
        <p>Water {{$item->water}}%</p>
        <p>Milk {{$item->milk}}%</p>
        <p>Error {{$item->error_id}}</p>
    @endforeach
</div>
@endsection
