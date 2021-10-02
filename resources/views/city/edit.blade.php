@extends('layouts.app')

@section('content')

    <div class="container">

        <br>
        <h2>Редактирование Города</h2>
        <hr />

        <form class="form-horizontal" action="{{ route('city.update', $city)}}" method="post">
            @method('PUT')
            @csrf


            {{-- Form include --}}
            @include('city.form')

        </form>
    </div>

@endsection
