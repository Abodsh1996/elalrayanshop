<div class="py-5">
    <div class="container">
        <h2 class="text-center">{{trans('website_trans.trend_product')}}</h2>

        <div class="owl-carousel trend_product owl-theme py-5">
            @foreach($products as $product)
                <a href="{{route('get_product_slug',[$product->category->slug,$product->slug])}}">
                <div class="item">
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
                </a>
            @endforeach
        </div>
    </div>
</div>
