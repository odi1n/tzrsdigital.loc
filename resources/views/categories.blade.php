@extends('app')

@section('title') Категории @endsection('title)

@section('content')
    <div class="container">
        <div class="row">
            @foreach($categories as $category)
                <div class="col-4 text-center">
                    <div class="card">
                        <div class="m-3">
                            <div class="card-header">
                                <h4 class="card-title text-uppercase">{{$category->name}}</h4>
                            </div>
                            <div class="card-image">
                                <img src="https://place-hold.it/450" class="img-fluid mb-3" alt="">
                            </div>
                            <div class="card-text">
                                <h5 class="text-truncate mb-2">{{$category->description}}</h5>
                            </div>
                            <a href="{{ route('user.product', ['category'=>$category->id]) }}" class="btn btn-primary w-100">Перейти</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
