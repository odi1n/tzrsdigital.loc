@extends('app')

@section('title') {{$product->name}} @endsection('title)

@section('content')
    <div class="container">
        <div class="row">
            <h2 class="col-12">
                <span>{{$product->name}}</span>
            </h2>
            <div class="col-12 col-md-6 box-shadow p-3">
                <div class="card">
                    <img class="card-img-fluid" src="https://place-hold.it/450" alt="">
                </div>
            </div>

            <div class="col-12 col-md-6 box-shadow">
                <div class="pb-3">
                    <div>
                        <h3>Информация</h3>
                        <hr>
                        <dl class="row">
                            <div class="col-12 row">
                                <dt class="col-3">Описание:</dt>
                                <dd class="col-9">{{ $product->description }}</dd>
                            </div>
                            <div class="col-12 row">
                                <dt class="col-3">Количество:</dt>
                                <dd class="col-9">{{ $product->count }}</dd>
                            </div>
                            <div class="col-12 row">
                                <dt class="col-3">Цена:</dt>
                                <dd class="col-9">{{ $product->price }} руб.</dd>
                            </div>
                        </dl>
                    </div>
                    @if($properties_values->count() > 0)
                        <div>
                            <h3>Свойства</h3>
                            <hr>
                            <dl class="row">
                                @foreach($properties_values as $properties_value)
                                    <div class="col-12 row">
                                        <dt class="col-3">{{ $properties_value->getProperties($properties_value->properties_id)->name }}:</dt>
                                        <dd class="col-9">{{ $properties_value->value }}</dd>
                                    </div>
                                @endforeach
                            </dl>
                        </div>
                    @endif
                    <div>
                        <button class="btn btn-primary w-50">Купить</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
