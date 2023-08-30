@extends('website.layouts.master')

@section('title')
{{trans('website_navbar.Home')}}
@endsection

@section('css')
    <style>
        .card{
            box-shadow: 10px 10px 20px;
        }
        .owl-carousel .card { overflow: hidden;}
        .owl-carousel .item img{ transition: all .2s ease-in-out; }
        .owl-carousel .item img:hover { transform: scale(1.1);  }
    </style>
@endsection

@section('content')

@include('website.sections.slider')

@include('website.sections.trend_product')

@include('website.sections.trend_category')


@endsection


@section('js')
    <script>
        $('.trend_product').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            rtl:true,
            dots:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:3
                }
            }
        })

        $('.trend_category').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            rtl:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:3
                }
            }
        })
    </script>
    @endsection

