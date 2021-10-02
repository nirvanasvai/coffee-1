@extends('layouts.app')

@section('content')

    <div class="container">

        <br>
        <h2>Создание Города</h2>

        <hr />

        <form class="form-horizontal" action="{{route('city.store')}}" method="post">
            @csrf

            {{-- Form include --}}
            @include('city.form')

        </form>
    </div>

@endsection
