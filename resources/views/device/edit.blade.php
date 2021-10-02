@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <form action="{{route('device.update',$device)}}" method="post" class="list-group-horizontal">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Город</label>
                        <select class="custom-select" name="city_id" required>
                            @foreach($cities as $item)
                                <option value="{{$item->id}}"
                                        @if(isset($select) && $item->id == $select) selected @endif >{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Компании</label>
                        <select name="company_id" class="custom-select form-control" required>
                            @foreach ($company as $item)
                                <option value="{{$item->id}}"  @if(isset($select) && $item->id == $select) selected @endif>{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Филиал</label>
                        <input type="text" class="form-control" name="filial_name" value="{{$device->filial_name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="">Код</label>
                        <input type="text" class="form-control" name="code" value="{{$device->code ?? ''}}" required>
                    </div>
                </div>

                <div class="form-group text-center">
                    <button class="btn btn-primary" type="submit">Сохранить</button>
                </div>
            </form>

        </div>
    </div>

@endsection
