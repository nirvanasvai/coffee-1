@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <form action="{{route('device.store')}}" method="post" class="list-group-horizontal">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Город</label>
                        <select class="custom-select" name="city_id" required>
                            @foreach($cities as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Филиал</label>
                        <input type="text" class="form-control" name="filial_name" required>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                         <label for="">Устройства</label>
                       <select name="name" class="custom-select form-control" required>
                           <option value="WMF 1500S">WMF 1500S</option>
                           <option value="WMF 1500S+">WMF 1500S+</option>
                           <option value="WMF 5000S">WMF 5000S</option>
                           <option value="WMF 5000S+">WMF 5000S+</option>
                           <option value="WMF 1100S">WMF 1100S</option>
                           <option value="WMF 1200S">WMF 1200S </option>
                           <option value="WMF 1800S">WMF 1800S</option>
                       </select>
                    </div>
                    <div class="form-group">
                        <label for="">Компании</label>
                        <select name="company_id" class="custom-select form-control" required>
                            @foreach ($company as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Код</label>
                        <input type="text" class="form-control" name="code" required>
                    </div>
                </div>

                <div class="form-group text-center">
                    <button class="btn btn-primary" type="submit">Сохранить</button>
                </div>
            </form>

        </div>
    </div>

@endsection
