@extends('app')

@section('title') ОК @endsection('title)

@section('content')
    <div class="container">
        <p>Приватная страница</p>
        <a href="{{ route("user.logout") }}">Выход</a>
    </div>
@endsection
