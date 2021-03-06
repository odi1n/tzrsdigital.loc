@extends('app')

@section('title') {{$product->name}} @endsection('title)

@section('content')
    <div class="container">
        <div class="row">
            <h2 class="col-8">Товар:
                <span>{{$product->name}}</span>
            </h2>
            <div class="col-6 box-shadow p-3">
                <div class="card">
                    <img class="card-img-top" src="https://place-hold.it/450" alt="">
                </div>
            </div>

            <div class="col-6 box-shadow p-3">
                <div class="pb-3">
                    <h3>Описание</h3>
                    <dl>
                        <div class="row">
                            <div class="col-12 row">
                                <dt class="col-4">Описание</dt>
                                <dd class="col-8">{{ $product->desciption }}</dd>
                            </div>
                            <div class="col-12 row">
                                <dt class="col-4">Количество</dt>
                                <dd class="col-8">{{ $product->count }}</dd>
                            </div>
                            <div class="col-12 row">
                                <dt class="col-4">Цена</dt>
                                <dd class="col-8">{{ $product->price }} руб.</dd>
                            </div>
                        </div>
                    </dl>
                    <button class="btn btn-primary w-50">Купить</button>
                </div>
            </div>
        </div>
    </div>
@endsection
