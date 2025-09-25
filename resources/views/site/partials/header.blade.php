<header class="header-style1 border-bottom border-color-light-white menu_area-light">

    <div class="navbar-default">

        <!-- start top search -->
        <div class="top-search bg-primary">
            <div class="container">
                <form class="search-form"  method="GET" accept-charset="utf-8">
                    <div class="input-group">
                                <span class="input-group-addon cursor-pointer">
                                    <button class="search-form_submit fas fa-search text-white" type="submit"></button>
                                </span>
                        <input type="text" class="search-form_input form-control" name="s" autocomplete="off" placeholder="Type & hit enter...">
                        <span class="input-group-addon close-search mt-1"><i class="fas fa-times"></i></span>
                    </div>
                </form>
            </div>
        </div>
        <!-- end top search -->
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-12">
                    <div class="menu_area">
                        <nav class="navbar navbar-expand-lg navbar-light p-0">

                            <div class="navbar-header navbar-header-custom">
                                <!-- start logo -->
                                <a href="{{ route('front.home-page') }}" class="navbar-brand">
                                    <img id="logo" src="{{ $config->image->path ?? '' }}" alt="logo"></a>
                                <!-- end logo -->
                            </div>

                            <div class="navbar-toggler"></div>

                            <!-- menu area -->
                            <ul class="navbar-nav mx-auto" id="nav" style="display: none;">
                                <li><a href="{{ route('front.home-page') }}">Trang chủ</a></li>
                                <li><a href="{{ route('front.abouts') }}">Giới thiệu</a></li>
                                <li><a href="{{ route('front.faq') }}">FAQ</a></li>
                                <li><a href="{{ route('front.contact') }}">Liên hệ</a></li>

                            </ul>
                            <!-- end menu area -->

                            <!-- start attribute navigation -->
                            <div class="attr-nav">
                                <ul>
                                    <li class="d-none d-lg-inline-block"><a href="{{ route('front.apply') }}" class="butn small">Bắt đầu ngay</a></li>
                                </ul>
                            </div>
                            <!-- end attribute navigation -->

                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
