@extends('app')

@section('title') Товары - {{ $products->first()->category_id }} @endsection('title)

@section('content')
    <div class="container">
        <div class="row">
            @foreach($products as $product)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 box-shadow p-3">
                    <div class="card text-center">
                        <a href="{{route('user.properties', ['category'=>$product->category_id,'product_id'=>$product->id])}}">
                            <img class="card-img-top application__img" src="https://place-hold.it/250x250" alt="">
                        </a>
                        <div class="card_body m-3">
                            <h4 class="card-title text-uppercase">{{$product->name}}</h4>
                            <p class="card-subtitle">Кол-во:
                                <span>{{$product->count}}</span>
                            </p>
                            <p class="card-subtitle">Цена:
                                <span>{{ $product->price }} руб.</span>
                            </p>
                            <a class="btn btn-primary btn-sm w-100"
                               href="{{route('user.properties', ['category'=>$product->category_id,'product_id'=>$product->id])}}">Перейти</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
