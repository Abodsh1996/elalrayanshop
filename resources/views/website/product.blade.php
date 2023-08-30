@extends('website.layouts.master')

@section('title')
    {{$product->slug}}
@endsection

@section('css')

@endsection

@section('content')

    <input type="hidden" value="{{$product->qty}}" id="qty">

    <div class="row py-4 bg-warning">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb px-5">
                <li class="breadcrumb-item"><a
                        href="{{route('get_categories')}}">{{trans('website_trans.category')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$product->category->slug}}</li>
                <li class="breadcrumb-item active" aria-current="page">{{$product->slug}}</li>
            </ol>
        </nav>
    </div>


    <div class="p-5">
        <div class="card mb-3 px-5">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{Storage::url($product->image)}}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="card-header">
                            <h5>
                                {{$product->name}}
                                @if($product->trend == 1)
                                    <span class="float-end badge bg-success">{{trans('website_trans.trending')}}</span>
                                @else
                                    <span class="float-end badge bg-danger">{{trans('website_trans.untrending')}}</span>
                                @endif
                            </h5>

                        </div>
                        <div class="py-4">
                            <s>{{trans('website_trans.price')}} : {{$product->price}}$</s>
                            <span
                                class="float-end">{{trans('website_trans.selling_price')}} : {{$product->selling_price}}$</span>
                        </div>
                        <div class="py-4">
                            <p class="card-text">{{$product->description}}</p>
                            <p class="card-text">
                                @if($product->qty > 0)
                                    <small class="badge bg-success">{{trans('website_trans.available')}}</small>
                                @else
                                    <small class="badge bg-danger">{{trans('website_trans.unavailable')}}</small>
                                @endif
                            </p>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-3">
                                @if($product->qty > 0)
                                    <h4 class="py-4">{{trans('website_trans.quantity')}}</h4>
                                    <div class="input-group mb-3">
                                        <button class="input-group-text btn btn-outline-warning"
                                                onclick="increaseQTY()">+
                                        </button>
                                        <input type="text" class="form-control text-center" id="qty_vlaue" readonly
                                               value="1">
                                        <button class="input-group-text btn btn-outline-warning"
                                                onclick="decreaseQTY()">-
                                        </button>
                                    </div>
                                @endif
                            </div>
                            <div class="col-9">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="py-4">{{trans('website_trans.add_to_cart')}}</h4>
                                        <div class="input-group mb-3">
                                            <button class="btn btn-primary" onclick="addToCart()">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
                                            </button>
                                            <input type="hidden" id="product_id" name="product_id" value="{{$product->id}}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <h4 class="py-4">{{trans('website_trans.add_to_wishlist')}}</h4>
                                        <div class="input-group mb-3">
                                            <button class="btn btn-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/></svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="px-5">
        <div class="row">
            <div class="card col-6">
                <div class="card-header">
                    <h4 class="py-4">{{trans('website_trans.Specifications')}}</h4>
                </div>
                <div class="card-body">
                    <h6>{{$product->short_description}}</h6>
                    <hr>
                    <p>{{$product->meta_description}}</p>
                </div>

            </div>
            <div class="col-6">
                <div class="card">

                    <h4 class="py-4 card-header">{{trans('website_trans.keywords')}}</h4>

                    <div class="card-body">
                        @foreach($keywords as $keyword)
                            <span class="badge bg-warning">{{$keyword}}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection

@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>

        var qty = $('#qty').val();

        function increaseQTY() {
            var value = parseInt($('#qty_vlaue').val());

            value = isNaN(value) ? 0 : value;

            if (value < qty) {

                value++

                $('#qty_vlaue').val(value)
            }

        }

        function decreaseQTY() {
            var value = parseInt($('#qty_vlaue').val());

            value = isNaN(value) ? 0 : value;

            if (value > 1) {
                value --;
                $('#qty_vlaue').val(value)
            }

        }

        function addToCart(){
            var product_id = $('#product_id').val();
            var qty = $('#qty_vlaue').val();

            console.log('product id is : '+ product_id  + ' and qty is : ' + qty)
            $.ajax({
                method : 'POST',
                url : "{{route('product.addToCart')}}",
                data : {
                  'product_id': product_id,
                    'qty': qty
                },
                success:function (res){
                    Swal.fire(res.msg)
                }
            })
        }

    </script>

@endsection
