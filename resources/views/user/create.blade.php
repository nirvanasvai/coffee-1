@extends('layouts.app')

@section('content')

    <div class="container">

        <br>
        <h2>Создание пользователя</h2>

        <hr />

        <form class="form-horizontal" action="{{route('user.store')}}" method="post">
            @csrf

            {{-- Form include --}}
            @include('user.form')

        </form>
    </div>

@endsection
