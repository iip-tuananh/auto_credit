@extends('site.layouts.master')
@section('title')Liên hệ - {{ $config->web_title }}@endsection
@section('description'){{ strip_tags(html_entity_decode($config->introduction)) }}@endsection
@section('image'){{@$config->image->path ?? ''}}@endsection

@section('css')

    <style>
        .send-success-message {
            display: flex;
            align-items: center;
            background-color: #e6ffed;     /* nền xanh nhạt */
            border: 1px solid #71d58b;      /* viền xanh tươi */
            color: #2d6a4f;                 /* chữ xanh đậm */
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 1rem;
            gap: 12px;                      /* khoảng cách icon - text */
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
            margin-bottom: 10px;
        }

        .send-success-message i {
            font-size: 1.4rem;
        }

        .send-success-message p {
            margin: 0;
            line-height: 1.4;
        }
    </style>
@endsection

@section('content')
    <section class="page-title-section top-position1 bg-img cover-background" data-overlay-dark="55" data-background="{{ $banner->image->path ?? '' }}">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Liên hệ</h1>
                    <ul class="ps-0">
                        <li><a href="{{ route('front.home-page') }}">Trang chủ</a></li>
                        <li><a href="#!">Liên hệ</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- CONTACT INFO
       ================================================== -->
    <section style="padding-top: 60px">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-6 mb-4 mb-lg-0">
                    <div class="pe-xl-7">
                        <div class="main-title title-left">Liên hệ với chúng tôi<span class="line-left"></span></div>
                        <h2 class="w-md-80 mb-4">{{ $config->web_title }}</h2>
                        <p class="mb-1-9">{{ $config->introduction }}</p>
                        <ul class="social-icon-style1 ps-0 mb-0">
                            <li><a href="{{ $config->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{ $config->twitter }}"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="{{ $config->youtube }}"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="{{ $config->instagram }}"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="contact-box p-1-9 p-lg-5 rounded">
                        <div class="media mb-1-6 mb-md-1-9">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="media-body ps-3 ps-sm-4">
                                <h3 class="h5">Địa chỉ</h3>
                                <p class="mb-0 w-sm-80">{{ $config->address_company }}</p>
                            </div>
                        </div>
                        <div class="media mb-1-6 mb-md-1-9">
                            <i class="fas fa-phone-alt"></i>
                            <div class="media-body ps-3 ps-sm-4">
                                <h3 class="h5">Hotline</h3>
                                <p class="mb-1">{{ $config->hotline }}</p>
                                <p class="mb-0">{{ $config->zalo }}</p>
                            </div>
                        </div>
                        <div class="media">
                            <i class="far fa-envelope"></i>
                            <div class="media-body ps-3 ps-sm-4">
                                <h3 class="h5">Email</h3>
                                <p class="mb-1">{{ $config->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- CONTACT FORM
       ================================================== -->
    <section class="p-0" ng-controller="AboutPage">
        <div class="container-fuild">
            <div class="row p-0">
                <div class="col-lg-6 p-0">
                    <div>
                       {!! $config->location !!}
                    </div>
                </div>
                <div class="col-lg-6 p-0">
                    <div class="bg-light px-1-9 px-sm-6 px-xl-8 py-1-9 py-sm-8">
                        <div class="main-title title-left">Để lại thông tin<span class="line-left"></span></div>
                        <h2 class="w-md-80 w-xl-50 mb-1-9 mb-xl-4">Hãy để lại mọi thắc mắc của bạn !</h2>
                        <form class="contact quform" enctype="multipart/form-data" id="form-contact">
                            <div class="quform-elements">
                                <div class="row">
                                    <!-- Begin Text input element -->
                                    <div class="col-md-6">
                                        <div class="quform-element form-group">
                                            <label for="name">Họ tên<span class="quform-required">*</span></label>
                                            <div class="quform-input">
                                                <input class="form-control" id="name" type="text" name="name" placeholder="Nhập họ tên của bạn" />
                                                <div class="invalid-feedback d-block" ng-if="errors['name']"><% errors['name'][0] %></div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Text input element -->
                                    <!-- Begin Text input element -->
                                    <div class="col-md-6">
                                        <div class="quform-element form-group">
                                            <label for="phone">Số điện thoại<span class="quform-required">*</span></label>
                                            <div class="quform-input">
                                                <input class="form-control" id="phone" type="text" name="phone" placeholder="Nhập số điện thoại" />
                                                <div class="invalid-feedback d-block" ng-if="errors['phone']"><% errors['phone'][0] %></div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="quform-element form-group">
                                            <label for="email">Email</label>
                                            <div class="quform-input">
                                                <input class="form-control" id="email" type="text" name="email" placeholder="Email" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="quform-element form-group">
                                            <label for="message">Lời nhắn <span class="quform-required">*</span></label>
                                            <div class="quform-input">
                                                <textarea class="form-control" id="message" name="message" rows="3" placeholder="Để lại lời nhắn của bạn"></textarea>
                                            </div>
                                            <div class="invalid-feedback d-block" ng-if="errors['message']"><% errors['message'][0] %></div>
                                        </div>
                                    </div>


                                    <div class="col-lg-12" ng-if="sendSuccess">
                                        <div class="space10"></div>
                                        <div class="send-success-message">
                                            <i class="fas fa-check-circle"></i>
                                            <p style="padding-bottom: 0px">Cảm ơn bạn đã để lại lời nhắn. Tin nhắn đã được gửi</p>
                                        </div>
                                    </div>


                                    <!-- End Captcha element -->
                                    <!-- Begin Submit button -->
                                    <div class="col-md-12">
                                        <div class="quform-submit-inner">
                                            <button class="butn"
                                                    type="button"
                                                    ng-click="submitContact()"
                                                    ng-class="{'is-loading': loading}"
                                                    ng-disabled="loading"
                                                    ng-attr-aria-busy="<% loading %>">
                                                <span ng-if="!loading">Gửi</span>
                                                <span ng-if="loading" class="btn-spinner" aria-hidden="true"></span>
                                                <span ng-if="loading">Đang gửi…</span>
                                            </button>
                                        </div>
                                        <div class="quform-loading-wrap text-start"><span class="quform-loading"></span></div>
                                    </div>
                                    <!-- End Submit button -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script>
        app.controller('AboutPage', function ($rootScope, $scope, $sce, $interval) {
            $scope.errors = [];
            $scope.sendSuccess = false;

            $scope.submitContact = function () {
                if ($scope.loading) return;
                $scope.loading = true;

                var url = "{{route('front.submitContact')}}";
                var data = jQuery('#form-contact').serialize();
                $scope.loading = true;
                jQuery.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    data: data,
                    success: function (response) {
                        if (response.success) {
                            toastr.success(response.message);
                            jQuery('#form-contact')[0].reset();
                            $scope.errors = [];
                            $scope.sendSuccess = true;
                            $scope.$apply();
                        } else {
                            $scope.errors = response.errors;
                            toastr.warning(response.message);
                        }
                    },
                    error: function () {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function () {
                        $scope.loading = false;
                        $scope.$apply();
                    }
                });
            }
        })

    </script>
@endpush
