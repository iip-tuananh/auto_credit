<footer class="footer1 bg-img cover-background" data-overlay-dark="8" data-background="https://loan.websitelayout.net/img/bg/footer-bg.jpg">
    <div class="container">
        <div class="footer-top p-4 p-md-5 mb-6 rounded">
            <div class="row align-items-center">
                <div class="col-xl-6">
                    <div class="mb-4 mb-xl-0">
                        <h2 class="text-white mb-0">Đăng ký nhận bản tin qua email </h2>
                    </div>
                </div>
                <div class="col-xl-6">
                    <form class="quform newsletter-form w-100"  enctype="multipart/form-data" onclick="">

                        <div class="quform-elements">

                            <div class="row">

                                <!-- Begin Text input element -->
                                <div class="col-md-8">
                                    <div class="quform-element mb-md-0">
                                        <div class="quform-input">
                                            <input class="form-control" id="email_address" type="text" name="email_address" placeholder="Subscribe with us" />
                                        </div>
                                    </div>
                                </div>
                                <!-- End Text input element -->

                                <!-- Begin Submit button -->
                                <div class="col-md-4">
                                    <div class="quform-submit-inner">
                                        <button class="butn m-0 d-block w-100" type="button"><span>Subscribe</span></button>
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
        <div class="row">
            <div class="col-sm-6 col-lg-4 pe-md-5 mb-2-5 mb-lg-0">
                <h3 class="text-white h4 mb-4">{{ $config->short_name_company }}</h3>
                <p class="mb-1-6 text-white">{{ $config->introduction }}</p>
                <div class="media mb-3 align-items-center">
                    <div class="me-3">
                        <i class="far fa-envelope text-primary display-25"></i>
                    </div>
                    <div class="media-body align-self-center">
                        <p class="text-white mb-0">{{ $config->email }}</p>
                    </div>
                </div>
                <div class="media mb-3 align-items-center">
                    <div class="me-3">
                        <i class="fas fa-mobile-alt text-primary display-25"></i>
                    </div>
                    <div class="media-body align-self-center">
                        <p class="text-white mb-0">{{ $config->hotline }}</p>
                    </div>
                </div>
                <div class="media">
                    <div class="me-3">
                        <i class="fas fa-map-marker-alt text-primary display-25"></i>
                    </div>
                    <div class="media-body align-self-center">
                        <p class="text-white mb-0">{{ $config->address_company }}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-2 mb-2-5 mb-lg-0 ps-lg-5">
                <h3 class="text-white h4 mb-4">Liên kết</h3>
                <ul class="footer-link mb-0 list-unstyled">
                    <li class="mb-3"><a href="{{ route('front.home-page') }}">Trang chủ</a></li>
                    <li class="mb-3"><a href="{{ route('front.abouts') }}">Giới thiệu</a></li>
                    <li class="mb-3"><a href="{{ route('front.contact') }}">Liên hệ</a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-lg-3 mb-2-5 mb-sm-0 ps-lg-8">
                <h3 class="text-white h4 mb-4">Bắt đầu ngay</h3>
                <ul class="footer-link mb-0 list-unstyled">
                    <li class="mb-3"><a href="{{ route('front.apply') }}">Tạo hồ sơ tín dụng</a></li>
                    <li class="mb-3"><a href="{{ route('front.faq') }}">Câu hỏi thường gặp</a></li>

                </ul>
            </div>
            <div class="col-sm-6 col-lg-3">
{{--                <h3 class="text-white h4 mb-4">Recent News</h3>--}}
{{--                <div class="media mb-1-6">--}}
{{--                    <img src="https://loan.websitelayout.net/img/content/footer-thumb1.jpg" class="rounded" alt="...">--}}
{{--                    <div class="media-body ms-4">--}}
{{--                        <h4 class="mb-2 h6"><a href="#!" class="text-white">We’re providing the quality services</a></h4>--}}
{{--                        <span class="text-primary small">23 Mar. 2021</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="media">--}}
{{--                    <img src="https://loan.websitelayout.net/img/content/footer-thumb2.jpg" class="rounded" alt="...">--}}
{{--                    <div class="media-body ms-4">--}}
{{--                        <h4 class="mb-2 h6"><a href="#!" class="text-white">Great thoughts out of your company’s assets</a></h4>--}}
{{--                        <span class="text-primary small">20 Mar. 2021</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
    <div class="footer-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start mt-3 mt-md-0 order-2 order-md-1">
                    <p class="d-inline-block text-white mb-0">&copy; <span class="current-year"></span>  <a href="#!" target="_blank" class="text-primary">{{ $config->web_title }}</a></p>
                </div>
                <div class="col-md-6 text-md-end order-1 order-md-2">
                    <ul class="social-icon-style1">
                        <li><a href="{{ $config->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="{{ $config->twitter }}"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="{{ $config->youtube }}"><i class="fab fa-youtube"></i></a></li>
                        <li><a href="{{ $config->instagram }}"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
