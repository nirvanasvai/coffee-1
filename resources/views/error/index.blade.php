@extends('layouts.app')

@section('content')

    <div class="container">
        <br>
        <h2>Компании</h2>
        <br>
        <a href="{{ route('error.create') }}" class="btn btn-primary mb-2"><i class="far fa-plus-square"></i> Создать</a>
        <table class="table table-striped table-borderless">
            <thead class="thead-dark">
            <th>Код</th>
            <th>Описание</th>
            <th class="text-right">Действие</th>
            </thead>
            <tbody>
            @forelse ($errorLists as $errorList)
                <tr>
                    <td>{{ $errorList->code }}</td>
                    <td>{{ $errorList->description }}</td>
                    <td class="text-right">
                        <form onsubmit="if(confirm('Удалить?')){ return true }else{ return false }" action="{{ route('error.destroy', $errorList) }}" method="post">
                            @method('DELETE')
                            @csrf

                            <a class="btn btn-primary" href="{{ route('error.edit', $errorList) }}"><i class="fa fa-edit"></i></a>

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
        <div class="pagination">
            {{$errorLists->links("pagination::bootstrap-4")}}
        </div>

    </div>

@endsection
