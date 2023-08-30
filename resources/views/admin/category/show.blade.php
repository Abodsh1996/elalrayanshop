@extends('admin.master')

@section('title')
    {{trans('admin_title_page_trans.show_category')}}
@stop

@section('css')

@stop

@section('title_page')
    {{trans('admin_title_page_trans.show_category')}}
@endsection

@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="card-body">
        @if(session('error_catch'))
        <div class="bg-danger">{{session('error_catch')}}</div>
        @endif
        <form>

            <div class="row">
                <div class="col">
                    <label for="name_ar">{{trans('category_trans.name_ar')}}</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="name_ar" value="{{$category->getTranslation('name','ar')}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <label for="name_en">{{trans('category_trans.name_en')}}</label>
                    <div class="input-group mb-3 col">
                        <input type="text" class="form-control " name="name_en" value="{{$category->getTranslation('name','en')}}" readonly>

                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="slug">{{trans('category_trans.slug')}}</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="slug" value="{{$category->slug}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <label for="image">{{trans('category_trans.image')}}</label>
                    <div class="input-group mb-3 col">
                        <img src="{{Storage::url($category->image)}}" alt="" class="img-thumbnail" style="max-width:200px;">
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col">
                    <label for="description_ar">{{trans('category_trans.description_ar')}}</label>
                    <div class="input-group mb-3">
                        <textarea name="description_ar" rows="3" cols="3"
                                  class="form-control" readonly>{{$category->getTranslation('description','ar')}}</textarea>
                    </div>

                </div>
                <div class="col">
                    <label for="description_en">{{trans('category_trans.description_en')}}</label>
                    <div class="input-group mb-3">
                        <textarea name="description_en" rows="3" cols="3"
                                  class="form-control" readonly>{{$category->getTranslation('description','en')}}</textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="is_showing">{{trans('category_trans.is_showing')}}</label>
                    <div class="input-group mb-3">
                        @if($category->is_showing == 1)
                            <span class="badge badge-success">{{trans('category_trans.showing')}}</span>
                        @else
                            <span class="badge badge-danger">{{trans('category_trans.hidden')}}</span>
                        @endif
                    </div>

                </div>
                <div class="col">
                    <label for="is_popular">{{trans('category_trans.is_popular')}}</label>
                    <div class="input-group mb-3 col">
                        @if($category->is_popular == 1)
                            <span class="badge badge-success">{{trans('category_trans.popular')}}</span>
                        @else
                            <span class="badge badge-danger">{{trans('category_trans.no_popular')}}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="meta_title_ar">{{trans('category_trans.meta_title_ar')}}</label>
                    <div class="input-group mb-3">
                        <input type="text" name="meta_title_ar"
                               class="form-control" value="{{$category->getTranslation('meta_title','ar')}}" readonly>
                    </div>
                </div>
                <div class="col">
                    <label for="meta_title_en">{{trans('category_trans.meta_title_en')}}</label>
                    <div class="input-group mb-3">
                        <input type="text" name="meta_title_en"
                               class="form-control" value="{{$category->getTranslation('meta_title','en')}}" readonly>
                    </div>
                    @error('meta_title_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="meta_description_ar">{{trans('category_trans.meta_description_ar')}}</label>
                    <div class="input-group mb-3">
                    <textarea name="meta_description_ar" rows="3" cols="3"
                              class="form-control" readonly>{{$category->getTranslation('meta_description','ar')}}</textarea>
                    </div>
                </div>
                <div class="col">
                    <label for="meta_description_en">{{trans('category_trans.meta_description_en')}}</label>
                    <div class="input-group mb-3">
                    <textarea name="meta_description_en" rows="3" cols="3"
                              class="form-control" readonly>{{$category->getTranslation('meta_description','en')}}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="meta_keywords">{{trans('category_trans.meta_keyword')}}</label>
                    <div class="input-group mb-3">
                    <textarea name="meta_keywords" rows="3" cols="3"
                              class="form-control" readonly>{{$category->meta_keywords}}</textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('js')

@endsection
