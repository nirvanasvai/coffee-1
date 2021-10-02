@extends('layouts.app')

@section('content')

    <div class="container">

        <br>
        <h2>Создание Компании</h2>

        <hr />

        <form class="form-horizontal" action="{{route('company.store')}}" method="post">
            @csrf

            {{-- Form include --}}
            @include('company.form')

        </form>
    </div>

@endsection
