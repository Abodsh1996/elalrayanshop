@extends('website.layouts.master')

@section('title')
    {{$category->slug}}
@endsection

@section('css')

@endsection

@section('content')
<div class="row py-4 bg-warning">
    <nav aria-label="breadcrumb" >
        <ol class="breadcrumb px-5">
            <li class="breadcrumb-item"><a href="{{route('get_categories')}}">{{trans('website_trans.category')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$category->slug}}</li>
        </ol>
    </nav>
</div>


    <div class="py-5">
        <div class="container">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{Storage::url($category->image)}}" class="card-img-top img-responsive" style= "height: 250px; width: 100%;" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{$category->name}}</h5>
                            <p class="card-text">{{$category->description}}</p>
                            <hr>
                            <p class="card-text">{{$category->meta_description}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="py-5">
        <div class="container">
            <h2>{{trans('website_trans.product')}}</h2>

            <div class="row">
                @foreach($category->products as $product)
                    <div class="col-4">
                        <div class="card my-5" style="width: 18rem;">
                            <img src="{{Storage::url($product->image)}}" class=" card-img-top img-responsive"
                                 style="height: 250px; width: 100%;" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$product->meta_title}}</h5>
                                <p class="card-text">{{$product->meta_description}}</p>
                                <span class=float-start">
                                {{$product->selling_price}}
                            </span>
                                <span class="float-end">
                                <s>{{$product->price}}</s>
                            </span>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

    </div>


@endsection


@section('js')

@endsection
