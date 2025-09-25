@extends('site.layouts.master')
@section('title')Giới thiệu - {{ $config->web_title }}@endsection
@section('description'){{ strip_tags(html_entity_decode($config->introduction)) }}@endsection
@section('image'){{@$config->image->path ?? ''}}@endsection

@section('css')
    <link type="text/css" rel="stylesheet" href="/site/css/editor-content.css">

@endsection

@section('content')

    <section class="page-title-section top-position1 bg-img cover-background" data-overlay-dark="55" data-background="{{ $banner->image->path ?? '' }}">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Về chúng tôi</h1>
                    <ul class="ps-0">
                        <li><a href="{{ route('front.home-page') }}">Trang chủ</a></li>
                        <li><a href="#!">Về chúng tôi</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section style="padding-top: 60px; padding-bottom: 0">
        <div class="container">
            <div class="text-center mb-2-3 mb-md-6">
                <div class="main-title mb-2">Về chúng tôi
                    <span class="line-left"></span>
                    <span class="line-right"></span>
                </div>
            </div>
            <div class="row align-items-center">
               <div class="col-12 editor-content">
                   {!! $config->web_des !!}
               </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="row mb-2-3 mb-md-6">
                <div class="col-lg-12">
                    <div class="text-center">
                        <div class="main-title">Đánh giá từ khách hàng
                            <span class="line-left"></span>
                            <span class="line-right"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-carousel owl-carousel owl-theme">
                @foreach($feedbacks as $feedback)
                    <div class="px-3 px-lg-5">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-lg-6 order-2 order-lg-1">
                                <p class="mb-4 mb-lg-5 lead">
                                    {{ $feedback->message }}
                                </p>
                                <h3 class="h5 text-secondary mb-2">{{ $feedback->name }}</h3>
                                <span class="display-28">{{ $feedback->position }}</span>
                            </div>
                            <div class="col-lg-3 order-1 order-lg-2 mb-4 mb-lg-0">
                                <div class="user-img overflow-visible text-lg-end">
                                    <img src="{{ $feedback->image->path ?? '' }}" class="rounded-circle" alt="...">
                                    <span class="quote position-relative">
                                                    <i class="ti-quote-right text-primary"></i>
                                                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@push('scripts')



@endpush
