@extends('admin.master')

@section('title')
    {{trans('admin_title_page_trans.show_product')}}  | {{$product->meta_title}}
@stop

@section('css')

@stop

@section('title_page')
    {{trans('admin_title_page_trans.show_product')}} | {{$product->meta_title}}
@endsection

@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="card-body">
        @if(session('error_catch'))
            <div class="bg-danger">{{session('error_catch')}}</div>
        @endif

        <form action="#">
{{--            <div class="row my-2">--}}
{{--                <label for="name_ar">{{trans('product_trans.category')}}</label>--}}
{{--                <select name="category_id" id="" class="form-control">--}}
{{--                    <option value="">{{trans('product_trans.please_select')}}</option>--}}
{{--                    @foreach($categories as $category)--}}
{{--                        <option value="{{$category->id}}" {{($product->category_id == $category->id) ? 'selected' : ''}} >{{$category->name}}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}
            <div class="row my-2">
                <div class="col">
                    <label for="name_ar">{{trans('product_trans.category')}}</label>
                    <input type="text" readonly class="form-control" value="{{$product->category->name}}">
                </div>
            </div>
            <div class="row my-2">
                <div class="col">
                    <label for="name_ar">{{trans('product_trans.name_ar')}}</label>
                    <div class="input-group mb-3">
                        <input readonly type="text" class="form-control" name="name_ar" value="{{$product->getTranslation('name','ar')}}">
                    </div>

                </div>
                <div class="col">
                    <label for="name_en">{{trans('product_trans.name_en')}}</label>
                    <div class="input-group mb-3 col">
                        <input readonly type="text" class="form-control " name="name_en" value="{{$product->getTranslation('name','en')}}">

                    </div>

                </div>
            </div>

            <div class="row my-2">
                <div class="col">
                    <label for="slug">{{trans('product_trans.slug')}}</label>
                    <div class="input-group mb-3">
                        <input readonly type="text" class="form-control" name="slug" value="{{$product->slug}}">
                    </div>
                </div>
                <div class="col">
                    <div class="row my-2">
                        <label for="image">{{trans('product_trans.image')}}</label>
                        <div class="col">
                            <img src="{{Storage::url($product->image)}}" alt="" class="img-thumbnail" style="max-width:100px;">
                        </div>

                    </div>

                </div>

            </div>

            <div class="row my-2">
                <div class="col">
                    <label for="short_description_ar">{{trans('product_trans.short_description_ar')}}</label>
                    <div class="input-group mb-3">
                        <textarea readonly name="short_description_ar" rows="3" cols="3"
                                  class="form-control ">{{$product->getTranslation('short_description','ar')}}</textarea>
                    </div>

                </div>
                <div class="col">
                    <label for="short_description_en">{{trans('product_trans.short_description_en')}}</label>
                    <div class="input-group mb-3">
                        <textarea readonly name="short_description_en" rows="3" cols="3"
                                  class="form-control">{{$product->getTranslation('short_description','en')}}</textarea>
                    </div>

                </div>
            </div>

            <div class="row my-2">
                <div class="col">
                    <label for="description_ar">{{trans('product_trans.description_ar')}}</label>
                    <div class="input-group mb-3">
                        <textarea readonly name="description_ar" rows="3" cols="3"
                                  class="form-control">{{$product->getTranslation('description','ar')}}</textarea>
                    </div>

                </div>
                <div class="col">
                    <label for="description_en">{{trans('product_trans.description_en')}}</label>
                    <div class="input-group mb-3">
                        <textarea readonly name="description_en" rows="3" cols="3"
                                  class="form-control">{{$product->getTranslation('description','en')}}</textarea>
                    </div>

                </div>
            </div>

            <div class="row my-2">
                <div class="col">
                    <label for="status">{{trans('product_trans.status')}}</label>
                    <div class="input-group mb-3">
                        @if($product->status == 1)
                            <span class="badge badge-success">{{trans('category_trans.showing')}}</span>
                        @else
                            <span class="badge badge-danger">{{trans('category_trans.hidden')}}</span>
                        @endif
                    </div>

                </div>
                <div class="col">
                    <label for="trend">{{trans('product_trans.trend')}}</label>
                    <div class="input-group mb-3 col">
                        @if($product->trend == 1)
                            <span class="badge badge-success">{{trans('category_trans.popular')}}</span>
                        @else
                            <span class="badge badge-danger">{{trans('category_trans.no_popular')}}</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row my-2">
                <div class="col">
                    <label for="price">{{trans('product_trans.price')}}</label>
                    <div class="input-group mb-3">
                        <input readonly type="number" name="price"
                               class="form-control " value="{{$product->price}}">
                    </div>

                </div>
                <div class="col">
                    <label for="selling_price">{{trans('product_trans.selling_price')}}</label>
                    <div class="input-group mb-3">
                        <input readonly type="number" name="selling_price"
                               class="form-control " value="{{$product->selling_price}}">
                    </div>

                </div>
            </div>

            <div class="row my-2">
                <div class="col">
                    <label for="qty">{{trans('product_trans.qty')}}</label>
                    <div class="input-group mb-3">
                        <input readonly type="number" name="qty"
                               class="form-control " value="{{$product->qty}}">
                    </div>

                </div>
                <div class="col">
                    <label for="tax">{{trans('product_trans.tax')}}</label>
                    <div class="input-group mb-3">
                        <input readonly type="number" name="tax"
                               class="form-control" value="{{$product->tax}}">
                    </div>

                </div>
            </div>

            <div class="row my-2">
                <div class="col">
                    <label for="meta_title">{{trans('product_trans.meta_title')}}</label>
                    <div class="input-group mb-3">
                    <input readonly type="text" name="meta_title" class="form-control " value="{{$product->meta_title}}">
                    </div>

                </div>
            </div>

            <div class="row my-2">
                <div class="col">
                    <label for="meta_description_ar">{{trans('product_trans.meta_description_ar')}}</label>
                    <div class="input-group mb-3">
                    <textarea readonly name="meta_description_ar" rows="3" cols="3"
                              class="form-control">{{$product->getTranslation('meta_description','ar')}}</textarea>
                    </div>

                </div>
                <div class="col">
                    <label for="meta_description_en">{{trans('product_trans.meta_description_en')}}</label>
                    <div class="input-group mb-3">
                    <textarea readonly name="meta_description_en" rows="3" cols="3"
                              class="form-control ">{{$product->getTranslation('meta_description','en')}}</textarea>
                    </div>

                </div>
            </div>

            <div class="row my-2">
                <div class="col">
                    <label for="meta_keywords">{{trans('product_trans.meta_keyword')}}</label><span
                        class="text-danger">{{trans('product_trans.meta_keyword_note')}}</span>
                    <div class="input-group mb-3">
                    <textarea readonly name="meta_keywords" rows="3" cols="3"
                              class="form-control ">{{$product->meta_keywords}}</textarea>
                    </div>

                </div>
            </div>
        </form>
    </div>

@endsection

@section('js')

@endsection
