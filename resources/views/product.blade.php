@extends('app')

@section('title') Товары
@if(count($products))
    - {{ $products->first()->category_id }}
@endif
@endsection('title)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                <form action="" class="w-100">
                    <div class="form-group col">
                        <div class="form-group">
                            <h5>Цена</h5>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="form-group row align-content-center">
                                <label for="priceFrom" class=" col-2 form-label">От:</label>
                                <div class="col-10">
                                    <input type="number" id="priceFrom" name="priceFrom" value="{{ old('priceFrom') }}">
                                </div>
                            </div>

                            <div class="form-group row align-content-center">
                                <label for="priceTo" class="col-2 form-label">До:</label>
                                <div class="col-10">
                                    <input type="number" id="priceTo" name="priceTo" value="{{ old('priceTo') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col">
                        <div class="form-group">
                            <h5>Количество</h5>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="w-100" type="number" id="priceFrom">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col">
                        <div class="form-group">
                            <h5>Название</h5>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <div class="col-12">
                                <input class="w-100" type="text" id="priceTo">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col text-center">
                        <button class="btn btn-primary w-100">Фильтр</button>
                    </div>
                    <div class="form-group col text-center">
                        <button class="btn btn-dark w-100">Сброс</button>
                    </div>
                </form>
            </div>
            <!--properties-->

            @foreach($products as $product)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 box-shadow p-3">
                    <div class="card text-center mh-100">
                        <a href="{{route('user.characteristics', ['category'=>$product->category_id,'product_id'=>$product->id])}}">
                            <img class="card-img-top application__img" src="https://place-hold.it/250x250" alt="">
                        </a>
                        <div class="card_body m-3">
                            <h4 class="card-title text-uppercase text-truncate">{{$product->name}}</h4>
                            <p class="card-subtitle">Кол-во:
                                <span>{{$product->count}}</span>
                            </p>
                            <p class="card-subtitle">Цена:
                                <span>{{ $product->price }} руб.</span>
                            </p>
                            <a class="btn btn-primary btn-sm w-100"
                               href="{{route('user.characteristics', ['category'=>$product->category_id,'product_id'=>$product->id])}}">Перейти</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
