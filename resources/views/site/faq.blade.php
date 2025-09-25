@extends('site.layouts.master')
@section('title')Câu hỏi thường gặp - {{ $config->web_title }}@endsection
@section('description'){{ strip_tags(html_entity_decode($config->introduction)) }}@endsection
@section('image'){{@$config->image->path ?? ''}}@endsection

@section('css')

@endsection

@section('content')
    <section class="page-title-section top-position1 bg-img cover-background" data-overlay-dark="55" data-background="{{ $banner->image->path ?? '' }}">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>FAQ's</h1>
                    <ul class="ps-0">
                        <li><a href="{{ route('front.home-page') }}">Trang chủ</a></li>
                        <li><a href="#!">FAQ's</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- FAQ's
       ================================================== -->
    <section style="padding-top: 60px">
        <div class="container">
            <div class="row mb-2-3 mb-md-6">
                <div class="col-lg-12">
                    <div class="text-center">
                        <div class="main-title">FAQ's
                            <span class="line-left"></span>
                            <span class="line-right"></span>
                        </div>
                        <h2 class="w-md-80 w-lg-50 mb-0 mx-auto">Câu hỏi thường gặp</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div id="accordion" class="accordion-style">
                        @foreach($questions as $question)
                            <div class="card">
                                <div class="card-header" id="heading{{ $question->id }}">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link {{ $loop->first ? '' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#collapse{{ $question->id }}" aria-expanded="true" aria-controls="collapse{{ $question->id }}">
                                            {{ $question->title }}
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse{{ $question->id }}" class="collapse {{ $loop->first ? 'show' : '' }}" aria-labelledby="heading{{ $question->id }}" data-bs-parent="#accordion">
                                    <div class="card-body position-relative">
                                        {{ $question->content }}
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')

@endpush
