
<div>
    <div class="row">
        <div class="col-md-3">
            <select class="custom-select" wire:model="city" >
                <option selected>Выберите город</option>
                @foreach($cities as $_city)
                <option value="{{$_city->id}}">{{$_city->name}} </option>
                @endforeach

            </select>
        </div>
        <div class="col-md-3">
            <select class="custom-select" wire:model="company" >
                <option selected>Выберите компанию</option>
                @isset($companies)
                @foreach($companies as $_company)
                    <option value="{{$_company->id}}">{{$_company->name}} </option>
                @endforeach
                @endisset
            </select>
        </div>
        <div class="col-md-3">
            <select class="custom-select" wire:model="device" >
                <option selected>Open this select menu</option>
                @isset($devices)
                @foreach($devices as $_device)
                    <option value="{{$_device->id}}">{{$_device->name}} </option>
                @endforeach
                @endisset
            </select>
        </div>
        <div class="col-md-3">

        </div>
    </div>
    <div class="row">
        <div class="col">
            @isset($downtimes)
                <table class="table mt-4">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">время начала</th>
                        <th scope="col">время конца</th>
                        <th scope="col">время прибывания</th>
                        <th scope="col">статус</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php($i = 1)
                    @foreach($downtimes as $_downtime)
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$_downtime->downtime}}</td>
                        <td>{{$_downtime->stop_downtime}}</td>
                        <td>{{$a->hour_diff($_downtime->downtime , $_downtime->stop_downtime)}} минуты</td>
                        <td class="@if($_downtime->status == 1 ) badge badge-success @elseif($_downtime->status == 2) badge badge-warning @else badge badge-danger @endif">состояние</td>
                    </tr>
                    @php($i += 1)
                    @endforeach
                    </tbody>
                </table>
            @endisset
        </div>
    </div>

</div>
