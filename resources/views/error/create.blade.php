@extends('layouts.app')

@section('content')

    <div class="container">

        <br>
        <h2>Создание Ошибок</h2>

        <hr />

        <form class="form-horizontal" action="{{route('error.store')}}" method="post">
            @csrf

            {{-- Form include --}}
            @include('error.form')

        </form>
    </div>

@endsection
