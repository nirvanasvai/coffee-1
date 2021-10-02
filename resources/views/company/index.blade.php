@extends('layouts.app')

@section('content')

    <div class="container">
        <br>
        <h2>Компании</h2>
        <br>
        <a href="{{ route('company.create') }}" class="btn btn-primary mb-2"><i class="far fa-plus-square"></i> Создать</a>
        <table class="table table-striped table-borderless">
            <thead class="thead-dark">
            <th>Название</th>
            <th class="text-right">Действие</th>
            </thead>
            <tbody>
            @forelse ($companies as $company)
                <tr>
                    <td>{{ $company->name }}</td>
                    <td class="text-right">
                        <form onsubmit="if(confirm('Удалить?')){ return true }else{ return false }" action="{{ route('company.destroy', $company) }}" method="post">
                            @method('DELETE')
                            @csrf

                            <a class="btn btn-primary" href="{{ route('company.edit', $company) }}"><i class="fa fa-edit"></i></a>

                            <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center"><h2>Данные отсутствуют</h2></td>
                </tr>
            @endforelse
            </tbody>
        </table>

    </div>

@endsection
