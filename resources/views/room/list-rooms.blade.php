@extends('template.base')
@section('content')
    <div class="text-2xl font-bold dark:text-white">
        <a href="{{route('list.hotel')}}"><i class="fa-solid fa-arrow-left"></i></a>
    </div>
    <br />
    <h4 class="text-2xl font-bold dark:text-white">Lista de quartos</h4>
    <livewire:room.list-room-component :hotelId="$hotelId" />
@endsection
