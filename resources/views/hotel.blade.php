@extends('template.base')

@section('title')
    Hoteis
@endsection

@section('content')
    <h1 class="text-2x1 text-slate-50 font-semibold leading-tigh py-2 ">
        Lsita de hoteis
    </h1>

<livewire:hotel.list-hotels />

@endsection
