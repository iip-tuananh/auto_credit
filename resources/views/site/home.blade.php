@extends('site.layouts.master')
@section('title'){{ $config->web_title }}@endsection
@section('description'){{ strip_tags(html_entity_decode($config->introduction)) }}@endsection
@section('image'){{@$config->image->path ?? ''}}@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

@endsection

@section('content')
    <!-- BANNER
        ================================================== -->
{{--    <style>--}}
{{--        /* ====== Banner Quote (scoped) ====== */--}}
{{--        .banner-quote{--}}
{{--            display:flex; flex-direction:column; align-items:center; text-align:center;--}}
{{--            gap:12px;--}}
{{--        }--}}

{{--        .bq-label{--}}
{{--            color:#fff; font-weight:700; opacity:.95;--}}
{{--            font-size:clamp(14px, 2.2vw, 20px);--}}
{{--            margin-bottom:2px;--}}
{{--        }--}}

{{--        .bq-input-wrap{--}}
{{--            position:relative;--}}
{{--            width:min(420px, 92%);--}}
{{--        }--}}

{{--        .bq-currency{--}}
{{--            position:absolute; inset-inline-start:14px; top:50%; transform:translateY(-50%);--}}
{{--            font-weight:800; font-size:22px; color:#0f172a; opacity:.95; pointer-events:none;--}}
{{--        }--}}

{{--        .bq-input{--}}
{{--            width:100%; height:58px;--}}
{{--            padding:0 16px 0 42px;--}}
{{--            border-radius:12px; border:2px solid rgba(15,23,42,.7);--}}
{{--            background:#fff; color:#0f172a; font-weight:800; font-size:22px;--}}
{{--            box-shadow:0 1px 0 rgba(17,24,39,.25), inset 0 0 0 1px rgba(255,255,255,.6);--}}
{{--            outline:none; transition:border-color .18s ease, box-shadow .18s ease;--}}
{{--        }--}}
{{--        .bq-input::placeholder{ color:#9ca3af; font-weight:700; }--}}
{{--        .bq-input:focus{--}}
{{--            border-color:#08d1b8;--}}
{{--            box-shadow:0 10px 24px rgba(0,0,0,.2), 0 0 0 4px rgba(8,209,184,.25);--}}
{{--        }--}}

{{--        .bq-btn{--}}
{{--            width:min(420px, 92%);--}}
{{--            height:56px; border:none; border-radius:12px;--}}
{{--            font-weight:800; font-size:18px; color:#fff;--}}
{{--            background:linear-gradient(140deg, #5F27CD 0%, #5F27CD 100%);--}}
{{--            box-shadow:0 12px 30px  rgba(95, 39, 205, .35);;--}}
{{--            cursor:pointer; transition:transform .08s ease, box-shadow .18s ease, filter .18s ease;--}}
{{--        }--}}
{{--        .bq-btn:hover{ transform:translateY(-1px); filter:saturate(1.03); }--}}
{{--        .bq-btn:active{ transform:translateY(0); box-shadow:0 6px 18px rgba(0,194,167,.35); }--}}

{{--        .bq-legal{--}}
{{--            color:#fff; opacity:.9; margin:6px 0 0;--}}
{{--            font-size:12px; line-height:1.35;--}}
{{--        }--}}

{{--        .bq-trust{ display:flex; align-items:center; gap:10px; margin-top:10px; }--}}
{{--        .bq-trust-title{ color:#fff; font-weight:700; }--}}
{{--        .bq-stars i{--}}
{{--            display:inline-grid; place-items:center;--}}
{{--            width:28px; height:28px; margin-right:4px;--}}
{{--            background:#00b67a; color:#fff; border-radius:4px; font-style:normal;--}}
{{--            font-size:16px; line-height:1; box-shadow:0 6px 14px rgba(0,182,122,.35);--}}
{{--        }--}}
{{--        .bq-stars i:last-child{ margin-right:0; }--}}

{{--        /* Responsive */--}}
{{--        @media (max-width:480px){--}}
{{--            .bq-input{ height:54px; font-size:20px; }--}}
{{--            .bq-btn{ height:54px; font-size:17px; }--}}
{{--        }--}}

{{--    </style>--}}
{{--    <section class="bg-img cover-background full-screen top-position1 p-0" data-overlay-dark="2" data-background="{{ $banners->image->path ?? '' }}">--}}

{{--        <div class="container d-flex flex-column">--}}
{{--            <div class="row align-items-center min-vh-100">--}}
{{--                <div class="col-md-12 col-lg-12 col-xl-12 mt-5 mt-lg-0">--}}

{{--                    <h1 class="text-white display-16 display-sm-14 display-md-9 display-lg-7 display-xl-3 lh-1 mb-3 text-shadow" style="text-align: center">--}}
{{--                        <span class="fw-bolder">Vay mua ô tô</span> dễ dàng--}}
{{--                    </h1>--}}

{{--                    <!-- banner quote form -->--}}
{{--                    <form class="banner-quote" method="get" novalidate>--}}
{{--                        <label class="bq-label" for="bq-budget">Mỗi tháng tôi muốn trả</label>--}}

{{--                        <div class="bq-input-wrap">--}}
{{--                            <span class="bq-currency" aria-hidden="true">đ</span>--}}
{{--                            <input id="bq-budget" name="budget" inputmode="numeric" autocomplete="off"--}}
{{--                                   placeholder="2.500.000 ₫" aria-label="Ngân sách hàng tháng (VND)" class="bq-input">--}}
{{--                            <input type="hidden" name="budget_raw" id="bq-budget-raw">--}}
{{--                        </div>--}}


{{--                        <button class="bq-btn" type="submit" data-go="/apply">Bắt đầu ngay →</button>--}}

{{--                        <p class="bq-legal">--}}
{{--                            Rates from 8.9% APR. Representative 19.8% APR.<br>--}}
{{--                            Car Finance 247 Limited is a credit broker, not a lender.--}}
{{--                        </p>--}}

{{--                        <div class="bq-trust">--}}
{{--                            <span class="bq-trust-title">★ Trustpilot</span>--}}
{{--                            <span class="bq-stars" aria-label="5 out of 5 stars">--}}
{{--        <i>★</i><i>★</i><i>★</i><i>★</i><i>★</i>--}}
{{--      </span>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                    <!-- /banner quote form -->--}}

{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}

{{--    </section>--}}



    <!-- ===== BANNER / HERO ===== -->
    <section class="ac-hero  top-position1 p-0" data-background="{{ $banners->image->path ?? '' }}">
        <div class="container d-flex flex-column">
            <div class="row align-items-center">
                <div class="col-12">

                    <!-- Title -->
                    <h1 class="ac-hero__title">Vay mua ô tô dễ dàng</h1>

                    <!-- Subtitle -->
                    <p class="ac-hero__subtitle">Mỗi tháng tôi muốn trả</p>

                    <!-- Quote form -->
                    <form class="ac-hero__form" method="get" novalidate>
                        <label class="sr-only" for="ac-budget">Ngân sách hàng tháng (VND)</label>

                        <div class="ac-hero__input">
                            <span class="ac-hero__currency" aria-hidden="true">đ</span>
                            <input id="ac-budget"
                                   name="budget"
                                   inputmode="numeric"
                                   autocomplete="off"
                                   placeholder="2.500.000"
                                   aria-label="Ngân sách hàng tháng (VND)">
                            <input type="hidden" name="budget_raw" id="ac-budget-raw">
                        </div>

                        <button class="ac-hero__btn" type="submit" data-go="/apply">
                            Nhận báo giá của tôi →
                        </button>

                        <div class="ac-hero__trust">
                            <span class="ac-hero__trust-title">★ Trustpilot</span>
                            <span class="ac-hero__stars" aria-label="4.9 trên 5 sao">
              <i>★</i><i>★</i><i>★</i><i>★</i><i>★</i>
            </span>
                            <span class="ac-hero__score">4.9 | 40,436 đánh giá</span>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

    <!-- ===== UNDER SECTION: CAR CARD + LEGAL ===== -->
    <section class="ac-foot">
        <div class="container">

            <!-- Car Card (nhô lên từ mép trên) -->
            <div class="ac-foot__car-card">
                <img class="ac-foot__car-img" src="https://cdn.imagin.studio/getImage?customer=gb-carfinance247&zoomType=fullscreen&margins=0.03&make=ford&modelFamily=fiesta&modelRange=fiesta&modelYear=2022&modelTrim=&bodySize=5&powerTrain=hybrid&angle=23&paintId=pspc0386&width=354&position=top&fileType=webp&version=5&surrounding=studio&modelVariant=ha&countryCode=0&licensePlateType=eu&rim=0&interiorId=000002&steering=lhd&tailoring=gray&aspectRatio=1.6&transmission=0" alt="Xe minh hoạ">
            </div>

            <!-- Legal text -->
            <div class="ac-foot__legal">
                <p>
                    Ví dụ minh họa: Vay 300.000.000 VND trong 5 năm với 20% giá trị xe trả trước.
                    Lãi suất cố định ưu đãi 6,5%/năm trong 6 tháng đầu, sau đó áp dụng lãi suất thả nổi lãi suất cơ sở + 3,4%.
                    Số tiền trả góp hàng tháng (ước tính): ~6.400.000 VND. Tổng chi phí lãi vay trong 5 năm: ~84.000.000 VND.
                    Tổng số tiền phải thanh toán trong toàn bộ kỳ hạn 5 năm: ~384.000.000 VND.
                    AutoCredit.com.vn là đơn vị tư vấn tín dụng, không phải là ngân hàng cho vay.
                </p>
            </div>

        </div>
    </section>

    <style>
        /* ========== ACCESSIBILITY HELPERS ========== */
        .sr-only{
            position:absolute!important;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0,0,0,0);white-space:nowrap;border:0;
        }

        /* ========== HERO (BANNER) ========== */
        .ac-hero{
            position: relative;
            min-height: 82vh !important;
            display: grid;
            place-items: center;
            text-align: center;
            overflow: hidden;

            /* nền tím gradient + vầng tròn như ảnh mẫu */
            background:
                radial-gradient(1200px 700px at 50% -10%, rgba(255,255,255,0.08) 0%, rgba(255,255,255,0) 55%),
                linear-gradient(180deg,#7A2FF6 0%, #5B22D0 60%, #4B18C2 100%);
        }
        /* nếu muốn dùng ảnh nền từ Blade, có thể thêm bằng JS hoặc CSS inline tùy hệ thống */

        .ac-hero__title{
            color:#fff;
            font-weight: 900;
            line-height: 1.1;
            font-size: clamp(34px, 6vw, 58px);
            margin: 0 0 .35rem;
        }
        .ac-hero__subtitle{
            color:#E6D7FF;
            margin:0 0 1rem;
            font-size: clamp(16px, 2.2vw, 22px);
        }

        /* form */
        .ac-hero__form{
            max-width: 560px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr;
            gap: 14px;
        }
        .ac-hero__input{ position: relative; }
        .ac-hero__input input{
            width: 100%;
            height: 64px;
            border-radius: 14px;
            padding: 0 16px 0 56px;
            font-size: 24px;
            font-weight: 800;
            border: none; outline: none;
            background: #fff; color: #4B18C2;
            box-shadow: 0 10px 24px rgba(0,0,0,.15);
        }
        .ac-hero__currency{
            position:absolute; left:18px; top:50%; transform:translateY(-50%);
            display:inline-flex; align-items:center; justify-content:center;
            width:28px; height:28px; border-radius:8px;
            font-weight:900; color:#4B18C2; font-size:18px;
            background:#EDE6FF;
        }
        .ac-hero__btn{
            height:64px; border-radius:14px; border:none; cursor:pointer;
            font-weight:900; font-size:18px; color:#0B0B0B;
            background:#39F7C2; /* xanh ngọc kiểu 247 */
            box-shadow: 0 12px 30px rgba(0,0,0,.18);
            transition: transform .12s ease, filter .12s ease;
        }
        .ac-hero__btn:hover{ transform: translateY(-1px); filter: brightness(0.98); }
        .ac-hero__btn:active{ transform: translateY(0); }

        .ac-hero__trust{
            display:flex; align-items:center; justify-content:center; gap:10px;
            color:#fff; margin-top:8px; flex-wrap: wrap;
        }
        .ac-hero__trust-title{ font-weight:800; }
        .ac-hero__stars i{
            font-style:normal; font-size:20px; line-height:1;
            color:#00B67A; text-shadow: 0 2px 0 rgba(0,0,0,.08);
        }
        .ac-hero__score{ color:#E6D7FF; font-size:14px; }

        /* mobile tweaks */
        @media (max-width: 575.98px){
            .ac-hero__input input, .ac-hero__btn{ height:56px; font-size:17px; }
            .ac-hero__currency{ width:26px; height:26px; font-size:16px; }
        }

        /* ========== UNDER SECTION: CAR CARD + LEGAL ========== */
        .ac-foot{
            /*--ac-overlap: 44%;                  !* độ nhô của car-card (0–60%) *!*/
            background: #F1E9FF;               /* tím nhạt */
            position: relative;
            /*padding-top: clamp(90px, 14vw, 160px);*/
            /*padding-bottom: clamp(32px, 5vw, 56px);*/
            overflow: visible;
        }

        .ac-foot__car-card{
            bottom: 130px;
            width: min(400px, 84vw);
            margin: 0 auto;
            /*background: #fff;*/
            border-radius: 22px;
            padding: clamp(10px, 1.8vw, 16px);
            /*box-shadow: 0 24px 50px rgba(0,0,0,.18);*/
            position: relative;
            z-index: 2;
            transform: translateY(calc(-1 * var(--ac-overlap)));
        }
        .ac-foot__car-img{
            display:block; width:100%; height:auto;
            border-radius: 16px;
            filter: drop-shadow(0 18px 30px rgba(0,0,0,.25));
            pointer-events:none; user-select:none;
        }

        .ac-foot__legal{
            margin-top: -160px !important;
            position: relative;
            z-index: 1;
            margin: clamp(10px, 2.5vw, 20px) auto 0;
            max-width: 1100px;
            text-align: center;
            color: #160A3A;
            font-size: clamp(13px, 1.5vw, 15px);
            line-height: 1.55;
        }

        @media (max-width: 575.98px){
            .ac-foot{ --ac-overlap: 36%; }
        }
    </style>



    <style>
        /* 1) Banner: cho phép phần dưới chèn lên và hạ overlay xuống */
        .ac-hero{
            position: relative;
            z-index: 1;                 /* thấp hơn ac-foot */
            overflow: visible !important;
        }
        /* Nhiều theme tạo overlay trên banner bằng :before của .ac-hero / .bg-img / .cover-background */
        .ac-hero::before,
        .bg-img::before,
        .cover-background::before{
            z-index: 0 !important;      /* hạ overlay xuống */
        }

        /* 2) Cha bao ngoài (nếu có) đừng cắt trồi lên */
        .main-wrapper,
        section,
        body{
            overflow: visible;           /* đề phòng theme set hidden */
        }

        /* 3) Kéo cả section ac-foot CHÈN LÊN bằng top:-… thay vì margin âm */
        .ac-foot{
            /* chỉnh mức chèn tại đây */
            /*--lap: clamp(56px, 9vw, 140px);*/
            /*--car-over: clamp(20px, 4.5vw, 70px);*/

            position: relative;          /* để dùng top */
            /*top: calc(-1 * var(--lap));  !* chèn lên ac-hero *!*/
            z-index: 3;                  /* cao hơn ac-hero */

            margin-top: 0;               /* KHÔNG dùng margin âm nữa */
            background: #F1E9FF;
            /* bù khoảng trống đã kéo lên + khoảng thở cho ảnh */
            padding-top: calc(var(--lap) + clamp(40px, 6vw, 90px));
            padding-bottom: clamp(28px, 4vw, 26px);
            text-align: center;
        }

        /* 4) Ảnh xe chỉ cần nhô thêm bằng transform (không absolute/bottom) */
        .ac-foot__car{
            position: relative;
            width: min(680px, 84vw);
            margin: 0 auto;
            transform: translateY(calc(-1 * var(--car-over)));
        }
        .ac-foot__car img{
            display:block; width:100%; height:auto;
            filter: drop-shadow(0 20px 36px rgba(0,0,0,.30));
            pointer-events:none; user-select:none;
        }

        /* 5) Legal text */

        /* 6) Mobile tinh chỉnh */
        @media (max-width: 575.98px){
            .ac-foot{ --lap: 48px; --car-over: 28px; }
        }

    </style>
    <script>
        /* ===== Format VNĐ + điều hướng CTA ===== */
        (function(){
            const input = document.getElementById('ac-budget');
            const raw   = document.getElementById('ac-budget-raw');
            const btn   = document.querySelector('.ac-hero__btn');

            function formatVN(numStr){
                const digits = numStr.replace(/[^\d]/g,'');
                if(!digits) return '';
                return digits.replace(/\B(?=(\d{3})+(?!\d))/g, '.'); // nhóm nghìn
            }
            function rawVN(s){ return s.replace(/[^\d]/g,''); }

            if (input){
                input.addEventListener('input', function(){
                    const posBefore = this.selectionStart;
                    const valBefore = this.value;
                    this.value = formatVN(this.value);
                    raw.value = rawVN(this.value);
                    const diff = this.value.length - valBefore.length;
                    const pos = Math.max(0,(posBefore||0) + diff);
                    this.setSelectionRange(pos,pos);
                });
            }

            if (btn){
                btn.addEventListener('click', function(ev){
                    const form = this.closest('form');
                    if(!form) return;
                    raw.value = rawVN(input.value || '');
                    const go = this.dataset.go;
                    if(go){
                        ev.preventDefault();
                        const params = new URLSearchParams(new FormData(form)).toString();
                        window.location.href = go + (params ? ('?' + params) : '');
                    }
                });
            }
        })();
    </script>


    <!-- SERVICE
    ================================================== -->
    <section style="padding-top: 60px; padding-bottom: 0">
        <div class="container">
            <div class="row align-items-end mb-2-3 mb-md-6">
                <div class="col-lg-12 mb-3 mb-lg-0">
                    <a href="{{ route('front.apply') }}">
                        <div class="main-title title-left">Bắt đầu ngay
                            <span class="line-left"></span>
                        </div>
                    </a>

                    <h2 class="w-md-90 text-lg-start mb-0">Quy trình vay ô tô dễ dàng trong 3 bước
                    </h2>
                </div>
{{--                <div class="col-lg-7">--}}
{{--                    <p class="mb-0">Advances at appealing financing costs with higher credit qualification and lower EMI. credit is the loaning of cash by at least one people, associations, or different substances to others, associations. Apply now to get snappy endorsement of best advance administrations.</p>--}}
{{--                </div>--}}
            </div>
            <style>
                .service-inner-1 .step-item{
                    display:flex; align-items:center; line-height:1.2;
                }
                .service-inner-1 .step-badge{
                    width:44px; height:44px; border-radius:50%;
                    display:flex; align-items:center; justify-content:center;
                    background:#FFB700; /* xanh nhạt */
                    border:1px solid rgba(14,165,233,.2);
                    color:#ffffff; font-weight:700; flex:0 0 44px;
                }
                .service-inner-1 .step-badge .step-number{ font-size:16px; }
                .service-inner-1 .step-label{
                    font-size:12px; color:#93c5fd; text-transform:uppercase; letter-spacing:.02em;
                    margin-bottom:2px; font-weight:700;
                }

                /* Mobile tinh gọn */
                @media (max-width:575.98px){
                    .service-inner-1 .step-badge{ width:38px; height:38px; flex-basis:38px; }
                    .service-inner-1 .step-badge .step-number{ font-size:14px; }
                }

            </style>
            <div class="row g-lg-5 mt-n1-9">
                @foreach($achievements as $step)
                    @php $n = $loop->iteration; @endphp
                    <div class="col-md-6 col-xl-4 mt-1-9">
                        <div class="card card-style1">
                            <img src="{{ $step->image->path ?? '' }}" class="d-block" alt="{{ $step->title }}">
                            <div class="service-data service-inner-1 step-item ">

                                {{--                                <div class="lh-1"><i class="ti-credit-card display-20 display-lg-15 text-white"></i></div>--}}
                                <div class="step-badge">
                                    <span class="step-number">{{ $n }}</span>
                                </div>
                                <h3 class="h5 text-white mb-0 ms-3">{{ $step->title }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="service-inner service-inner-1 step-item">
{{--                                    <div class="lh-1"><i class="ti-credit-card display-15 text-primary"></i></div>--}}
                                    <div class="step-badge">
                                        <span class="step-number">{{ $n }}</span>
                                    </div>
                                    <h3 class="h5 mb-0 ms-3"><a href="#" class="text-white">{{ $step->title }}</a></h3>
                                </div>
                                <div>
                                    <p class="text-white mb-lg-4">{{ $step->content }}</p>
                                    <a class="butn small primary" href="{{ route('front.apply') }}">Bắt đầu ngay</a>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </section>

    <!-- ABOUT US
       ================================================== -->
    <section style="padding-top: 80px; padding-bottom: 0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="about-img position-relative">
                        <div class="image-box">
{{--                            <div class="image-1"><img src="https://loan.websitelayout.net/img/about/about-1.jpg" class="rounded" alt="..."></div>--}}
{{--                            <div class="image-2"><img src="https://loan.websitelayout.net/img/about/about-2.jpg" class="rounded" alt="..."></div>--}}

                            <div class="image-1"><img src="{{ $about->image->path ?? '' }}" class="rounded" alt="..."></div>
{{--                            <div class="image-2"><img src="{{ $about->image_back->path ?? '' }}" class="rounded" alt="..."></div>--}}
                        </div>

                    </div>
                </div>
                <div class="col-lg-6 ps-lg-4 ps-xl-7">
                    <div class="content-box">
                        <div class="main-title title-left">{{ $about->sub_title }}<span class="line-left"></span></div>
                        <h2 class="w-lg-90 mb-1-6 mb-lg-1-9">{{ $about->title }}</h2>
                        <p class="mb-1-9 mb-lg-6">
                           {{ $about->intro }}
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TESTIMONIALS
    ================================================== -->
    <section style="padding-top: 60px; padding-bottom: 0">
        <div class="container">
            <div class="row mb-2-3 mb-md-6">
                <div class="col-lg-12">
                    <div class="text-center">
                        <div class="main-title">Đánh giá
                            <span class="line-left"></span>
                            <span class="line-right"></span>
                        </div>
                        <h2 class="w-md-80 w-lg-50 mb-0 mx-auto">Cảm nhận từ khách hàng đã sử dụng dịch vụ tại {{ $config->short_name_company }}</h2>
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



    <section style="padding-top: 80px; padding-bottom: 0">
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



{{--                        <div class="card">--}}
{{--                            <div class="card-header" id="headingTwo">--}}
{{--                                <h5 class="mb-0">--}}
{{--                                    <button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">What is outsourced financial support?</button>--}}
{{--                                </h5>--}}
{{--                            </div>--}}
{{--                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion">--}}
{{--                                <div class="card-body position-relative">--}}
{{--                                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                    </div>
                </div>
            </div>
        </div>
    </section>



    <style>
        :root{
            --brand-bg:#eadcfb;     /* tím nhạt nền */
            --brand-gap:40px;       /* khoảng cách giữa logo */
            --brand-h:46px;         /* chiều cao logo desktop */
        }
        .brand-strip{background:var(--brand-bg); padding:28px 0 32px;}
        .brand-container{max-width:1200px; margin:0 auto; padding:0 16px; text-align:center;}
        .brand-title{margin:0 0 18px; font-size:20px; font-weight:700;}

        /* Swiper */
        .brand-swiper{padding:6px 0; position:relative;}
        .brand-swiper .swiper-wrapper{align-items:center;}
        .brand-swiper .swiper-slide{
            display:flex; align-items:center; justify-content:center;
            height:var(--brand-h);
            /*filter:grayscale(100%) contrast(1.05); opacity:.95;*/
            transition:transform .2s ease, filter .2s ease, opacity .2s ease;
        }
        .brand-swiper .swiper-slide:hover{filter:none; opacity:1; transform:translateY(-2px);}
        .brand-swiper img{height:100%; width:auto; object-fit:contain; display:block;}

        /* Nút điều hướng tối giản */
        .brand-nav{position:absolute; inset:0; pointer-events:none;}
        .brand-prev,.brand-next{
            position:absolute; top:50%; transform:translateY(-50%);
            pointer-events:auto;
            background:#00000010; border:none; width:36px; height:36px; border-radius:50%;
            font-size:20px; line-height:36px; font-weight:700;
        }
        .brand-prev{left:0;}
        .brand-next{right:0;}

        /* Responsive */
        @media (max-width:992px){
            :root{ --brand-gap:32px; --brand-h:40px; }
            .brand-title{font-size:18px;}
        }
        @media (max-width:576px){
            :root{ --brand-gap:24px; --brand-h:34px; }
            .brand-title{font-size:16px;}
            .brand-strip{padding:22px 0 24px;}
        }
    </style>
    <section class="brand-strip" style="margin-top: 60px; margin-bottom: 60px">
        <div class="brand-container">
            <h3 class="brand-title">Đối tác tài chính toàn diện</h3>

            <!-- Slider -->
            <div class="swiper brand-swiper">
                <div class="swiper-wrapper">
                    @foreach($partners as $partner)
                        <div class="swiper-slide">
                            <img src="{{ $partner->image->path ?? '' }}" alt="{{ $partner->name }}" loading="lazy">
                        </div>
                    @endforeach
                </div>

                <!-- Optional: nút điều hướng -->
                <div class="brand-nav">
                    <button class="brand-prev" aria-label="Previous">‹</button>
                    <button class="brand-next" aria-label="Next">›</button>
                </div>
            </div>
        </div>
    </section>





@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        const swiper = new Swiper('.brand-swiper', {
            loop: true,
            speed: 600,                    // tốc độ slide khi bấm nút
            centeredSlides: false,
            slidesPerView: 5,              // desktop
            spaceBetween: 40,              // gap giữa logo (match --brand-gap)
            grabCursor: true,
            autoplay: {
                delay: 0,                    // 0 để chạy liên tục
                disableOnInteraction: false
            },
            freeMode: { enabled: true, momentum:false },
            // trick "chạy mượt liên tục": set animation tốc độ thấp
            on: {
                init: function() {
                    // translate bằng CSS animation mượt (autoplay delay = 0 + freeMode)
                    this.setTranslate(0);
                }
            },
            // dừng khi hover:
            pauseOnMouseEnter: true,

            navigation: {
                nextEl: '.brand-next',
                prevEl: '.brand-prev',
            },

            breakpoints: {
                0:   { slidesPerView: 2.2, spaceBetween: 24 },
                576: { slidesPerView: 3,   spaceBetween: 24 },
                768: { slidesPerView: 4,   spaceBetween: 32 },
                992: { slidesPerView: 5,   spaceBetween: 40 }
            }
        });
    </script>

    <script>
        (function() {
            const input = document.querySelector('#bq-budget');
            if (!input) return;

            // Formatter cho VNĐ (không phần thập phân)
            const currencyFmt = new Intl.NumberFormat('vi-VN', {
                style: 'currency', currency: 'VND', maximumFractionDigits: 0
            });
            const groupFmt = new Intl.NumberFormat('vi-VN', { maximumFractionDigits: 0 });

            const toDigits = v => (v || '').replace(/\D/g, '');
            const formatNumber = (digits, withSymbol) => {
                if (!digits) return '';
                const n = Number(digits);
                if (!Number.isFinite(n)) return '';
                return withSymbol ? currencyFmt.format(n) : groupFmt.format(n);
            };

            // Khi gõ: chỉ hiện phân cách hàng nghìn để hạn chế nhảy caret
            input.addEventListener('input', () => {
                const posFromEnd = input.value.length - (input.selectionStart || 0);
                const digits = toDigits(input.value);
                input.value = formatNumber(digits, false);
                const newPos = Math.max(input.value.length - posFromEnd, 0);
                input.setSelectionRange && input.setSelectionRange(newPos, newPos);
                input.dataset.raw = digits; // lưu số thô
            });

            // Focus: hiện số không kèm ký hiệu
            input.addEventListener('focus', () => {
                const digits = input.dataset.raw || toDigits(input.value);
                input.value = formatNumber(digits, false);
                // input.select(); // nếu muốn auto bôi đen toàn bộ khi focus thì mở dòng này
            });

            // Blur: hiện số kèm ký hiệu ₫
            input.addEventListener('blur', () => {
                const digits = input.dataset.raw || toDigits(input.value);
                input.value = digits ? formatNumber(digits, true) : '';
            });

            // Format giá trị ban đầu nếu có
            const initialDigits = toDigits(input.value);
            if (initialDigits) {
                input.dataset.raw = initialDigits;
                input.value = formatNumber(initialDigits, true);
            }


            const form = input.form;
            if (form) {
                form.addEventListener('submit', () => {
                    const digits = input.dataset.raw || toDigits(input.value);
                    input.value = digits;
                });
            }
        })();
    </script>

    <script>
        document.addEventListener('click', function (e) {
            const btn = e.target.closest('button[data-go]');
            if (!btn) return;
            e.preventDefault(); // không submit form
            window.location.href = btn.dataset.go; // điều hướng
        });
    </script>
@endpush
