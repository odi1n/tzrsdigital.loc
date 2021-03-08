@extends('app')

@section('title')
    @if(count($products))
        {{ $products->first()->categories_name }}
    @endif
@endsection('title)

@section('style')
    <link href="{{ asset('css/product.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3">
                <form action="{{ route('user.filter', ['category'=>1, 'filter'=>1]) }}" class="w-100">

                    @foreach($properties_values as $properties_name => $properties_value)
                        <div class="form-group col">
                            <div class="form-group">
                                <h5>{{ $properties_name }}</h5>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <ul class="list-group">
                                        @foreach($properties_value as $key)
                                            <li class="list-group-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="{{ str_slug($properties_name) }}{{ $key['properties_id'] }}"
                                                           name="{{ str_slug($properties_name) }}[]"
                                                           value="{{ $key['properties_id'] }}"
                                                    >
                                                    <label class="custom-control-label"
                                                           for="{{ str_slug($properties_name) }}{{ $key['properties_id'] }}">
                                                        {{ $key['values'] }}</label>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach

                    <div class="form-group col">
                        <div class="form-group">
                            <h5>Цена</h5>
                        </div>
                        <div class="form-group">
                            <div class="form-group row align-content-center">
                                <label for="priceFrom" class="col-2 form-label">От:</label>
                                <div class="col-10">
                                    <input type="number" class="w-100" id="priceFrom" name="priceFrom"
                                           value="100">
                                </div>
                            </div>

                            <div class="form-group row align-content-center">
                                <label for="priceTo" class="col-2 form-label">До:</label>
                                <div class="col-10">
                                    <input type="number" class="w-100" id="priceTo" name="priceTo"
                                           value="100000">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!--price-->

                    <div class="form-group col">
                        <div class="form-group">
                            <h5>Количество</h5>
                        </div>
                        <div class="form-group">
                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="w-100" type="number" id="count" name="count" value="1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!--count-->

                    <div class="form-group col">
                        <div class="form-group">
                            <h5>Название</h5>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <input class="w-100" type="text" id="title" name="title">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!--name-->

                    <div class="form-group col text-center">
                        <button class="btn btn-primary w-100">Фильтр</button>
                    </div>
                    <!--filter-->

                    <div class="form-group col text-center">
                        <button class="btn btn-dark w-100">Сброс</button>
                    </div>
                    <!--cleare-->
                </form>
            </div>
            <!--properties-->

            <div class="col-12 col-md-9 row">
                @foreach($products as $product)
                    <?php $properties_values = \App\Models\PropertiesValue::getByProductId($product->id); ?>

                    <div class="col-12 col-sm-6 col-md-4 box-shadow p-3">
                        <div class="card text-center mh-100">
                            <a href="{{ route('user.characteristics', ['category'=>$product->category_id, 'product_id'=>$product->id]) }}">
                                <img class="card-img-top application__img" src="https://place-hold.it/250x250"
                                     alt="">
                            </a>
                            <div class="card_body m-3">
                                <h4 class="card-title text-uppercase text-truncate">{{$product->name}}</h4>
                                <h5 class="card-subtitle text-center pb-1">
                                    <span>{{ $product->price }} руб.</span>
                                </h5>

                                <p class="card-subtitle">Кол-во:
                                    <span>{{$product->count}}</span>
                                </p>

                                @foreach($properties_values as $properties_value)
                                    <?php
                                    $properties = \App\Models\PropertiesValue::getProperties($properties_value->properties_id);
                                    ?>
                                    <p class="card-subtitle">{{ $properties->name }}:
                                        <span>{{ $properties_value->value }}</span>
                                    </p>
                                @endforeach

                                <a class="btn btn-primary btn-sm w-100"
                                   href="{{route('user.characteristics', ['category'=>$product->category_id,
                                                                      'product_id'=>$product->id])}}">Перейти</a>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
