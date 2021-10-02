@extends('layouts.app')

@section('content')

    <div class="container">

        <br>
        <h2>Редактирование Ошибок</h2>
        <hr />

        <form class="form-horizontal" action="{{ route('company.update', $company) }}" method="post">
            @method('PUT')
            @csrf


            {{-- Form include --}}
            @include('company.form')

        </form>
    </div>

@endsection
