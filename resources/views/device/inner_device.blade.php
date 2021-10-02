@extends('layouts.app')

@section('title',$device->name)

@section('content')
    <div class="container">
        <div class="card">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">{{$device->cityRelationship->name}}</li>
                    <li class="breadcrumb-item">{{$device->companyRelationship->name}}</li>
                    @isset($device->filial_name)
                        <li class="breadcrumb-item" aria-current="page">{{$device->filial_name ?? ''}}</li>
                    @endisset
                    <li class="breadcrumb-item" aria-current="page">{{$device->name}}</li>
                </ol>
            </nav>
        </div>
       <div class="row">
           <div class="col-sm-4">
               <ul class="list-group">
                   <li class="list-group-item @if ($device->cocoa == 0)
                       bg-danger
                       @elseif ($device->cocoa <=30)
                           bg-warning
                           @else
                           bg-success
                   @endif">Cocoa {{$device->cocoa}}%</li>
                   <li class="list-group-item @if ($device->coffee == 0)
                           bg-danger
@elseif ($device->coffee <=30)
                           bg-warning
                           @else
                           bg-success
                   @endif">Coffee {{$device->coffee}}%</li>
                   <li class="list-group-item @if ($device->water == 0)
                           bg-danger
@elseif ($device->water <=30)
                           bg-warning
                           @else
                           bg-success
                   @endif">Water {{$device->water}}%</li>
                   <li class="list-group-item @if ($device->milk == 0)
                           bg-danger
@elseif ($device->milk <=30)
                           bg-warning
                           @else
                           bg-success
                   @endif">Milk {{$device->milk}}%</li>
                   @if (isset($device->errorRelationship->code))
                       <li class="list-group-item pt-4">{{$device->errorRelationship->code}}</li>
                   @else
                       <li class="list-group-item pt-4">Нет</li>
                   @endif
               </ul>
               <a href="{{route('device.edit',$device)}}"> <button class="btn btn-primary">Изменить</button></a>
           </div>
       </div>
    </div>
@endsection
