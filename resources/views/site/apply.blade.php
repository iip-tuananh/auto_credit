<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <title>Apply – {{ $config->short_name_company }} clone flow (18 steps)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --purple: #5B34F2; /* nút chọn */
            --purple-50: #ede7ff;
            --purple-border: #7b61f6;
            --teal: #14c8a8; /* nút Continue + progress */
            --text: #0b0b0e;
            --muted: #6b7280;
            --bg: #ffffff;
            --radius: 12px;
        }

        html, body {
            background: var(--bg);
            color: var(--text)
        }

        .wrap {
            max-width: 880px;
            margin: 24px auto;
            padding: 0 16px
        }

        .brand {
            font-weight: 800;
            color: #5b34f2
        }

        /* top bar */
        .progress {
            height: 6px;
            background: #e5e7eb;
            border-radius: 999px
        }

        .progress-bar {
            background: var(--teal)
        }

        h1, h2 {
            font-weight: 800
        }

        .subtle {
            color: var(--muted)
        }

        .addr-line {
            color: #63708a;
            font-size: 14px;
            margin: -6px 0 14px
        }

        /* option list cards */
        .pick-list {
            display: flex;
            flex-direction: column;
            gap: 14px;
            margin-top: 10px
        }

        .pick {
            border: 2px solid var(--purple-border);
            border-radius: 14px;
            padding: 16px 18px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: space-between;
            text-decoration: none;
            color: var(--text);
            transition: .15s;
            cursor: pointer
        }

        .pick:hover {
            box-shadow: 0 6px 18px rgba(20, 20, 50, .07)
        }

        .pick.primary {
            background: var(--purple);
            border-color: var(--purple);
            color: #fff
        }

        .pick .arrow {
            font-weight: 900
        }

        /* form controls */
        .cf-input {
            height: 54px;
            border-radius: 12px;
            border: 2px solid #d9dbe3
        }

        .cf-input:focus {
            border-color: #9aa3ff;
            box-shadow: none
        }

        .btn-continue {
            background: var(--teal);
            border: none;
            height: 56px;
            border-radius: 12px;
            font-weight: 800
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #111;
            text-decoration: none
        }

        .back-link:hover {
            text-decoration: underline
        }

        .mini-link {
            color: #0b8b7f;
            text-decoration: underline
        }

        @media (max-width: 576px) {
            .wrap {
                padding: 0 12px
            }
        }
    </style>

    <style>
        /* error luôn chiếm full width, xuống dòng rõ ràng */
        .cf-error { display:block; }

        /* nếu ngay sau input-group thì có khoảng thở hợp lý */
        .input-group + .cf-error { margin-top:.375rem; }

        /* viền đỏ cho input lỗi */
        [aria-invalid="true"].form-control {
            border-color: #dc3545;
        }
        [aria-invalid="true"].form-control:focus {
            box-shadow: 0 0 0 .2rem rgba(220,53,69,.25);
        }

    </style>
</head>
<body>
<div class="wrap">
    <!-- Header (logo giả + trustpilot placeholder) -->
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div class="brand">{{ $config->short_name_company }}</div>
        <div class="small text-muted">Trustpilot ★★★★★</div>
    </div>

    <div class="mb-3">
        <div class="progress">
            <div id="progressBar" class="progress-bar" style="width:0%"></div>
        </div>
    </div>

    <div class="pt-2">
        <a href="#" id="backBtn" class="back-link mb-3" style="display:none">⟵ <span>Previous Step</span></a>
        <h1 id="title" class="h2 mb-3">Bạn muốn mua loại xe nào?</h1>

        <!-- STEP CONTAINERS -->
        <div id="steps">

            <!-- step 1 -->
            <section data-step="1">
                <div class="pick-list">
                    <a class="pick" data-name="vehicle_type" data-value="ô tô">Xe ô tô<span class="arrow">→</span></a>
                    <a class="pick" data-name="vehicle_type" data-value="taxi">Xe taxi<span class="arrow">→</span></a>
                    <a class="pick" data-name="vehicle_type" data-value="xe máy">Xe máy <span class="arrow">→</span></a>
                    <a class="pick" data-name="vehicle_type" data-value="khác">Khác <span class="arrow">→</span></a>
                </div>
            </section>


            <!-- step 2 -->
            <section data-step="2">
                <div class="pick-list">
                    <a class="pick" data-name="vehicle_condition" data-value="xe mới">Xe mới<span class="arrow">→</span></a>
                    <a class="pick" data-name="vehicle_condition" data-value="xe đã qua sử dụng">Xe đã qua sử dụng<span class="arrow">→</span></a>
                </div>
            </section>

            <!-- step 3 -->
            <section data-step="3">
                <div class="pick-list">
                    <a class="pick" data-name="vehicle_found" data-value="có">Có<span class="arrow">→</span></a>
                    <a class="pick" data-name="vehicle_found" data-value="chưa">Chưa<span class="arrow">→</span></a>
                </div>
            </section>


            <!-- step 4 -->
            <section class="d-none" data-step="4">
                <div class="pick-list">
                    <a class="pick" data-name="driving_license" data-value="bằng lái ô tô">Bằng lái ô tô<span class="arrow">→</span></a>
                    <a class="pick" data-name="driving_license" data-value="bằng lái xe máy">Bằng lái xe máy<span class="arrow">→</span></a>
                    <a class="pick" data-name="driving_license" data-value="bằng lái ô tô và xe máy">Cả hai <span class="arrow">→</span></a>
                    <a class="pick" data-name="driving_license" data-value="bằng lái quốc tế">Bằng lái quốc tế <span class="arrow">→</span></a>
                    <a class="pick" data-name="driving_license" data-value="chưa có">Chưa có <span class="arrow">→</span></a>
                </div>
            </section>


            <!-- step 5 -->
            <section class="d-none" data-step="5">
                <div class="row g-3">
                    <div class="col-12"><label class="form-label">Họ và tên</label>
                        <input class="form-control cf-input" name="fullname"></div>
                </div>
                <button class="btn btn-continue w-100 mt-3" data-continue>Continue →</button>
            </section>

            <!-- step 6 -->
            <section class="d-none" data-step="6">
                <div class="row g-3 mb-3">
                    <div class="col-4 col-sm-3 col-md-2"><label class="form-label small">Ngày</label><input
                            class="form-control cf-input" inputmode="numeric" maxlength="2" placeholder="DD"
                            name="dob_d"></div>
                    <div class="col-4 col-sm-3 col-md-2"><label class="form-label small">Tháng</label><input
                            class="form-control cf-input" inputmode="numeric" maxlength="2" placeholder="MM"
                            name="dob_m"></div>
                    <div class="col-4 col-sm-4 col-md-3"><label class="form-label small">Năm</label><input
                            class="form-control cf-input" inputmode="numeric" maxlength="4" placeholder="YYYY"
                            name="dob_y"></div>
                </div>
                <button class="btn btn-continue w-100" data-continue>Continue →</button>
            </section>

            <!-- step 7 -->
            <section class="d-none" data-step="7">
                <div class="pick-list">
                    <a class="pick" data-name="marital_status" data-value="độc thân">Độc thân <span class="arrow">→</span></a>
                    <a class="pick" data-name="marital_status" data-value="đã kết hôn">Đã kết hôn <span class="arrow">→</span></a>
                    <a class="pick" data-name="marital_status" data-value="khác">Khác <span class="arrow">→</span></a>
                </div>
            </section>


            <!-- step 8 -->
            <section class="d-none" data-step="8">
                <div class="row g-3">
                    <div class="col-12"><label class="form-label">Địa chỉ thường trú</label>
                        <input class="form-control cf-input" name="address_thuongtru"></div>
                </div>
                <button class="btn btn-continue w-100 mt-3" data-continue>Continue →</button>
            </section>

            <!-- step 9 -->
            <section class="d-none" data-step="9">
                <div class="row g-3">
                    <div class="col-12"><label class="form-label">Địa chỉ sinh sống</label>
                        <input class="form-control cf-input" name="address_sinhsong"></div>
                </div>
                <button class="btn btn-continue w-100 mt-3" data-continue>Continue →</button>
            </section>

            <!-- step 10  -->
            <section class="d-none" data-step="10">
                <div class="row g-3 mb-2">
                    <div class="col-sm-6"><label class="form-label">Năm</label><input class="form-control cf-input"
                                                                                        inputmode="numeric"
                                                                                        name="years_cutru" data-numeric="int"></div>
                    <div class="col-sm-6"><label class="form-label">Tháng</label><input class="form-control cf-input"
                                                                                         inputmode="numeric"
                                                                                         name="months_cutru" data-numeric="int"></div>
                </div>
                <button class="btn btn-continue w-100" data-continue>Continue →</button>
            </section>

            <!-- step 11 -->
            <section class="d-none" data-step="11">
                <div class="addr-line" id="addrLine">—</div>
                <div class="pick-list">
                    <a class="pick" data-name="housing_status" data-value="thuê nhà">Thuê nhà <span class="arrow">→</span></a>
                    <a class="pick" data-name="housing_status" data-value="chủ nhà">Chủ nhà <span class="arrow">→</span></a>
                    <a class="pick" data-name="housing_status" data-value="sống cùng bố mẹ">Sống cùng bố mẹ <span class="arrow">→</span></a>
                </div>
            </section>


            <!-- step 12 -->
            <section class="d-none" data-step="12">
                <div class="pick-list" id="empList">
                    <a class="pick" data-name="employment_status" data-value="làm việc toàn thời gian">Làm việc toàn thời gian <span class="arrow">→</span></a>
                    <a class="pick" data-name="employment_status" data-value="làm việc bán thời gian">Làm việc bán thời gian <span class="arrow">→</span></a>
                    <a class="pick" data-name="employment_status" data-value="tự kinh doanh">Tự kinh doanh<span class="arrow">→</span></a>
                    <a class="pick" data-name="employment_status" data-value="đã nghỉ hưu">Đã nghỉ hưu <span class="arrow">→</span></a>
                    <a class="pick" data-name="employment_status" data-value="khác">Khác <span class="arrow">→</span></a>
                </div>
            </section>


            <!-- step 13 -->
            <section class="d-none" data-step="13">
                <div class="row g-3">
                    <div class="col-12"><label class="form-label">Chức vụ</label><input class="form-control cf-input"
                                                                                          name="job_title"></div>
                    <div class="col-12"><label class="form-label">Tên công ty</label><input
                            class="form-control cf-input" name="company_name"></div>
                    <div class="col-12"><label class="form-label">Địa chỉ công ty</label><input
                            class="form-control cf-input" name="company_address" placeholder=""></div>
                </div>
                <button class="btn btn-continue w-100 mt-3" data-continue>Continue →</button>
            </section>

            <!-- step 14 -->
            <section class="d-none" data-step="14">
                <div class="row g-3 mb-2">
                    <div class="col-sm-6"><label class="form-label">Năm</label><input class="form-control cf-input"
                                                                                        inputmode="numeric"
                                                                                        name="work_years" data-numeric="int"></div>
                    <div class="col-sm-6"><label class="form-label">tháng</label><input class="form-control cf-input"
                                                                                         inputmode="numeric"
                                                                                         name="work_months" data-numeric="int"></div>
                </div>
                <button class="btn btn-continue w-100" data-continue>Continue →</button>
            </section>


            <!-- step 15 -->
            <section class="d-none" data-step="15">
                <label class="form-label">Số tiền</label>
                <div class="input-group mb-1">
                    <span class="input-group-text">đ</span>
                    <input class="form-control cf-input" inputmode="decimal" name="net_income" placeholder="" data-numeric="money">
                </div>
                <button class="btn btn-continue w-100" data-continue>Continue →</button>
            </section>

            <!-- step 16 -->
            <section class="d-none" data-step="16">
                <label class="form-label">Số tiền</label>
                <div class="input-group mb-1">
                    <span class="input-group-text">đ</span>
                    <input class="form-control cf-input" inputmode="decimal" name="borrow_amount" placeholder="" data-numeric="money">
                </div>
                <button class="btn btn-continue w-100" data-continue>Continue →</button>
            </section>

            <!-- step 17 -->
            <section class="d-none" data-step="17">
                <label class="form-label">Số tiền</label>
                <div class="input-group mb-1">
                    <span class="input-group-text">đ</span>
                    <input class="form-control cf-input" inputmode="decimal" name="pay_amount" placeholder="" data-numeric="money">
                </div>
                <button class="btn btn-continue w-100" data-continue>Continue →</button>
            </section>


            <!-- step 18 -->
            <section class="d-none" data-step="18">
                <div class="mb-2"><label class="form-label">Danh xưng</label></div>
                <div class="d-flex flex-wrap gap-2 mb-2">
                    <button type="button" class="btn" data-title="Mr"
                            style="border:2px solid var(--purple-border);border-radius:10px;padding:10px 14px;font-weight:700;background:#fff">
                        Ông
                    </button>
                    <button type="button" class="btn" data-title="Mrs"
                            style="border:2px solid var(--purple-border);border-radius:10px;padding:10px 14px;font-weight:700;background:#fff">
                        Bà
                    </button>
                    <button type="button" class="btn" data-title="Miss"
                            style="border:2px solid var(--purple-border);border-radius:10px;padding:10px 14px;font-weight:700;background:#fff">
                        Cô
                    </button>
                    <button type="button" class="btn" data-title="Ms"
                            style="border:2px solid var(--purple-border);border-radius:10px;padding:10px 14px;font-weight:700;background:#fff">
                        Chị
                    </button>
                </div>
                <div class="mb-3"><label class="form-label">Họ và tên *</label><input class="form-control cf-input"
                                                                                        type="text" name="customer_name"></div>
                <div class="mb-3"><label class="form-label">Số điện thoại *</label><input class="form-control cf-input"
                                                                                       type="tel" name="phone"></div>
                <div class="mb-3"><label class="form-label">Email address</label><input class="form-control cf-input"
                                                                                        type="email" name="email"></div>
                <div class="mb-3"><label class="form-label">Số CMND/CCCD *</label><input class="form-control cf-input"
                                                                                        type="text" name="cccd"></div>
                <div class="mb-3"><strong>Điều khoản và điều kiện</strong></div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="agreeTc">
                    <label class="form-check-label" for="agreeTc">Tôi đồng ý cho phép AutoCredit và các ngân hàng/công ty tài chính đối tác tra cứu thông tin tín dụng của tôi tại CIC để xử lý hồ sơ vay vốn.</label>
                </div>
                <button class="btn btn-continue w-100" id="submitBtn">Hoàn tất. Bắt đầu ngay →</button>
{{--                <div class="subtle small mt-3">The personal information we have collected from you will be shared with--}}
{{--                    fraud prevention agencies who will use it to prevent fraud and money laundering and to verify your--}}
{{--                    identity. See our <a href="#" class="mini-link">Privacy Policy</a>.--}}
{{--                </div>--}}
            </section>

        </div>
    </div>
</div>

<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

<script>
    // Cho phép người dùng gõ: "1 234", "1,234.56" => mình sẽ làm sạch trước khi validate
    function cleanNumeric(str, kind = 'int') {
        let s = (str ?? '').toString().trim();

        // bỏ khoảng trắng và dấu phẩy (thường là phân tách hàng nghìn)
        s = s.replace(/[,\s]/g, '');

        // chuẩn hóa dấu chấm thập phân: giữ nguyên "."
        // (nếu bạn muốn cho phép "," làm thập phân thì thay bằng s = s.replace(',', '.'))
        return s;
    }

    function isNumericStr(str, kind = 'int') {
        const v = cleanNumeric(str, kind);
        if (v === '') return false;
        if (kind === 'int')    return /^-?\d+$/.test(v);
        if (kind === 'money')  return /^-?\d+(\.\d+)?$/.test(v);
        // fallback
        return /^-?\d+(\.\d+)?$/.test(v);
    }

    // Tự động lọc ký tự không hợp lệ khi người dùng gõ
    document.addEventListener('input', (e) => {
        const el = e.target;
        if (!(el instanceof HTMLInputElement)) return;
        const type = el.dataset.numeric;
        if (!type) return;

        let val = el.value;

        if (type === 'int') {
            // chỉ giữ số
            val = val.replace(/[^\d]/g, '');
        } else if (type === 'money') {
            // cho số và 1 dấu chấm thập phân duy nhất, bỏ mọi thứ khác
            val = val.replace(/[^0-9.]/g, '');
            // chỉ giữ dấu chấm đầu tiên
            const firstDot = val.indexOf('.');
            if (firstDot !== -1) {
                val = val.slice(0, firstDot + 1) + val.slice(firstDot + 1).replace(/\./g, '');
            }
        }

        el.value = val;
    });

    // Hàm check nhanh 1 field số
    function requireNumeric(sec, name, kind, msg) {
        const el = sec.querySelector(`[name="${name}"]`);
        const raw = (el?.value || '').trim();
        if (!raw || !isNumericStr(raw, kind)) {
            showError(el, msg);
            return { ok: false };
        }
        // Lưu giá trị đã “làm sạch” vào state (nếu bạn muốn)
        const normalized = cleanNumeric(raw, kind);
        setData(name, normalized);
        return { ok: true };
    }

</script>


<script>
    (function($){
        const moneySel = 'input[data-numeric="money"]';
        const nf = new Intl.NumberFormat('vi-VN');

        const onlyDigits = (s) => (s || '').replace(/\D/g, '');

        function formatDisplay(el){
            const d = onlyDigits(el.value);
            el.value = d ? nf.format(parseInt(d, 10)) : '';
        }

        // Đặt lại caret theo số lượng chữ số trước caret cũ
        function setCaretByDigitIndex(el, digitIdx){
            const val = el.value;
            let count = 0, pos = val.length;
            for (let i = 0; i < val.length; i++){
                if (/\d/.test(val[i])) count++;
                if (count >= digitIdx){ pos = i + 1; break; }
            }
            try { el.setSelectionRange(pos, pos); } catch(e){}
        }

        // Gõ realtime: giữ caret đúng vị trí
        $(document).on('input', moneySel, function(){
            const el = this;
            const start = el.selectionStart || 0;
            const digitBefore = el.value.slice(0, start).replace(/\D/g, '').length;
            formatDisplay(el);
            setCaretByDigitIndex(el, digitBefore);
        });

        // Paste: lấy số, format luôn
        $(document).on('paste', moneySel, function(e){
            e.preventDefault();
            const data = (e.originalEvent || e).clipboardData.getData('text');
            const d = onlyDigits(data);
            this.value = d ? nf.format(parseInt(d,10)) : '';
        });

        // Blur: đảm bảo format
        $(document).on('blur', moneySel, function(){ formatDisplay(this); });


    })(jQuery);
</script>



<script>
    (() => {
        // =========================
        // CONFIG
        // =========================
        const TITLES = {
            1:"Bạn muốn mua loại xe nào?",
            2:"Xe bạn muốn mua là mới hay đã qua sử dụng?",
            3:"Bạn đã tìm được chiếc xe muốn mua chưa?",
            4:"Bạn đang sở hữu loại bằng lái xe nào?",
            5:"Họ và tên của bạn",
            6:"Ngày tháng năm sinh",
            7:"Tình trạng hôn nhân",
            8:"Địa chỉ thường trú",
            9:"Địa chỉ sinh sống",
            10:"Thời gian cư trú tại đây?",
            11:"Tình trạng chỗ ở",
            12:"Tình trạng việc làm",
            13:"Công việc hiện tại",
            14:"Anh/Chị đã làm việc ở công ty hiện tại bao lâu?",
            15:"Thu nhập trung bình hàng tháng sau thuế",
            16:"Khoản vay dự kiến",
            17:"Số tiền Anh/Chị dự kiến trả trước là bao nhiêu?",
            18:"Cuối cùng, hãy cho chúng tôi biết về anh chị",
        };

        const REQUIRED_STEPS = new Set([5,6,8,9,15,16,17,18]);
        const TOTAL_STEPS = 18;
        const STORAGE_KEY = 'applyData';
        const STEP_KEY    = 'applyCurrentStep';

        // =========================
        // STATE
        // =========================
        const $stepsWrap = document.querySelector('#steps');
        const sections = Array.from($stepsWrap.querySelectorAll('section[data-step]'));

        // Hot-fix: nếu có section chứa input name="borrow_amount" mà data-step sai, sửa thành 16
        {
            const wrongSec = sections.find(s => s.querySelector('[name="borrow_amount"]'));
            if (wrongSec && wrongSec.dataset.step !== '16') {
                wrongSec.dataset.step = '16';
            }
        }

        // Recollect sections after potential fix
        const stepMap = new Map();
        Array.from($stepsWrap.querySelectorAll('section[data-step]')).forEach(s => {
            stepMap.set(Number(s.dataset.step), s);
        });

        const state = {
            data: JSON.parse(localStorage.getItem(STORAGE_KEY) || '{}'),
            step: Math.min(
                Math.max(Number(sessionStorage.getItem(STEP_KEY) || 1), 1),
                TOTAL_STEPS
            ),
        };

        // =========================
        // HELPERS
        // =========================
        const $ = (sel, root=document) => root.querySelector(sel);
        const $$ = (sel, root=document) => Array.from(root.querySelectorAll(sel));

        function setData(key, val){
            state.data[key] = val;
            localStorage.setItem(STORAGE_KEY, JSON.stringify(state.data));
        }
        function getData(key){ return state.data[key]; }

        function saveStep(){
            sessionStorage.setItem(STEP_KEY, String(state.step));
        }

        function showStep(n){
            // clamp
            n = Math.min(Math.max(n, 1), TOTAL_STEPS);

            // hide all
            stepMap.forEach(sec => sec.classList.add('d-none'));
            // show current
            const sec = stepMap.get(n);
            if (sec) sec.classList.remove('d-none');

            state.step = n;
            saveStep();

            // optional UI chrome (nếu có các phần tử này trong layout)
            const titleEl = $('#title');
            if (titleEl) titleEl.textContent = TITLES[n] || '';

            const progressBar = $('#progressBar');
            if (progressBar) progressBar.style.width = Math.round((n-1)/(TOTAL_STEPS-1)*100) + '%';

            const backBtn = $('#backBtn');
            if (backBtn) backBtn.style.display = (n > 1 ? 'inline-flex' : 'none');

            // hydrate inputs/picks
            hydrateStep(n);
        }

        function next(){
            if (state.step < TOTAL_STEPS) {
                showStep(state.step + 1);
            }
        }
        function back(){
            captureStep(state.step);
            showStep(state.step - 1);
        }

        function captureStep(n){
            const sec = stepMap.get(n);
            if (!sec) return;
            // input elements
            $$('[name]', sec).forEach(el=>{
                let v;
                if (el.type === 'checkbox') v = el.checked;
                else if (el.type === 'radio'){ if(!el.checked) return; v = el.value; }
                else v = (el.value ?? '').toString().trim();
                setData(el.name, v);
            });

            // chosen pick (nơi thiếu data-name thì lưu theo stepN)
            $$('.pick[data-value]', sec).forEach(a=>{
                if (a.classList.contains('primary')) {
                    const key = a.dataset.name || ('step' + n);
                    setData(key, a.dataset.value);
                }
            });
        }

        function hydrateStep(n){
            const sec = stepMap.get(n);
            if (!sec) return;

            // inputs
            $$('[name]', sec).forEach(el => {
                const v = getData(el.name);
                if (v === undefined) return;
                if (el.type === 'checkbox') el.checked = !!v;
                else if (el.type === 'radio') el.checked = (el.value === v);
                else el.value = v;
            });

            // picks
            const stepKey = 'step' + n;
            $$('.pick[data-value]', sec).forEach(a=>{
                const key = a.dataset.name || stepKey;
                const chosen = getData(key);
                a.classList.toggle('primary', chosen === a.dataset.value);
            });
        }

        function clearErrors(sec){
            $$('.cf-error', sec).forEach(e=>e.remove());
            $$('[aria-invalid="true"]', sec).forEach(el => el.removeAttribute('aria-invalid'));
        }

        function showError(el, msg){
            if (!el) return;

            // a11y
            el.setAttribute('aria-invalid','true');

            // Tạo node hint
            const hint = document.createElement('div');
            const descId = 'err-' + (el.name || el.id || Math.random().toString(36).slice(2));
            hint.id = descId;
            hint.className = 'cf-error form-text text-danger mt-1';
            hint.textContent = msg;

            // Tìm container hợp lý để đặt lỗi
            const ig = el.closest('.input-group'); // nếu có input-group, ta đặt lỗi RA NGOÀI nó
            const container =
                (ig ? ig.parentElement : null) ||
                el.closest('.form-group, .mb-3, .col-12, .row, .col-sm-6, .col-sm-4, .col-sm-3') ||
                el.parentElement;

            // Xoá lỗi cũ trong cùng container để tránh trùng
            container.querySelectorAll('.cf-error').forEach(n => n.remove());

            // Gắn lỗi
            container.appendChild(hint);

            // Liên kết mô tả lỗi cho screen reader
            el.setAttribute('aria-describedby', descId);
        }


        function isNumericStr(s){ return /^[0-9]+(\.[0-9]+)?$/.test(s); }

        function cleanMoney(str){
            return String(str || '').replace(/[^\d]/g, ''); // bỏ mọi ký tự không phải số
        }
        function validateMoney(el, message, { min = 1, max = Number.MAX_SAFE_INTEGER } = {}){
            const raw = cleanMoney(el?.value);
            if (!raw) { showError(el, message); return { ok:false }; }
            const num = parseInt(raw, 10);
            if (isNaN(num) || num < min || num > max) { showError(el, message); return { ok:false }; }
            return { ok:true, value: num };
        }

        // =========================
        // VALIDATION PER STEP (bắt buộc: 5,6,8,9,15,16,17,18)
        // return {ok:boolean}
        // =========================
        function validateStep(n){
            const sec = stepMap.get(n);
            if (!sec) return { ok: true };

            clearErrors(sec);

            if (!REQUIRED_STEPS.has(n)) {
                // không bắt buộc -> luôn pass
                captureStep(n);
                return { ok: true };
            }

            // Các bước bắt buộc:
            switch(n){
                case 5: {
                    const el = $('[name="fullname"]', sec);
                    const v = (el?.value || '').trim();
                    if (!v) { showError(el, 'Vui lòng nhập họ và tên'); return { ok:false }; }
                    break;
                }
                case 6: {
                    const d = $('[name="dob_d"]', sec), m = $('[name="dob_m"]', sec), y = $('[name="dob_y"]', sec);
                    const vd = (d?.value||'').trim(), vm = (m?.value||'').trim(), vy = (y?.value||'').trim();
                    if(!vd || !vm || !vy){ [d,m,y].forEach(el=>showError(el,'Vui lòng nhập đủ ngày/tháng/năm')); return {ok:false}; }
                    const id = parseInt(vd,10), im = parseInt(vm,10), iy = parseInt(vy,10);
                    const validDate = id>=1 && id<=31 && im>=1 && im<=12 && vy.length===4 && iy>=1900 && iy<=new Date().getFullYear();
                    if(!validDate){ [d,m,y].forEach(el=>showError(el,'Ngày sinh không hợp lệ')); return {ok:false}; }
                    setData('dob', `${vd}/${vm}/${vy}`);
                    break;
                }
                case 8: {
                    const el = $('[name="address_thuongtru"]', sec);
                    const v = (el?.value || '').trim();
                    if (!v) { showError(el, 'Vui lòng nhập địa chỉ thường trú'); return { ok:false }; }
                    break;
                }
                case 9: {
                    const el = $('[name="address_sinhsong"]', sec);
                    const v = (el?.value || '').trim();
                    if (!v) { showError(el, 'Vui lòng nhập địa chỉ sinh sống'); return { ok:false }; }
                    break;
                }
                case 10: {
                    const ok1 = requireNumeric(sec, 'years_cutru',  'int', 'Vui lòng nhập số năm (số)').ok;
                    const ok2 = requireNumeric(sec, 'months_cutru', 'int', 'Vui lòng nhập số tháng (số)').ok;
                    if (!ok1 || !ok2) return { ok:false };
                    break;
                }
                case 14: {
                    const ok1 = requireNumeric(sec, 'work_years',  'int', 'Vui lòng nhập năm làm việc (số)').ok;
                    const ok2 = requireNumeric(sec, 'work_months', 'int', 'Vui lòng nhập tháng làm việc (số)').ok;
                    if (!ok1 || !ok2) return { ok:false };
                    break;
                }

                case 15: {
                    const el = $('[name="net_income"]', sec);
                    const r = validateMoney(el, 'Vui lòng nhập thu nhập hàng tháng (số hợp lệ)'); // > 0
                    if (!r.ok) return r;
                    break;
                }
                case 16: {
                    const sec16 = stepMap.get(16) || stepMap.get(n);
                    const el = $('[name="borrow_amount"]', sec16);
                    const r = validateMoney(el, 'Vui lòng nhập khoản vay dự kiến (số hợp lệ)');
                    if (!r.ok) return r;
                    break;
                }
                case 17: {
                    const el = $('[name="pay_amount"]', sec);
                    const r = validateMoney(el, 'Vui lòng nhập số tiền dự kiến trả trước (số hợp lệ)');
                    if (!r.ok) return r;
                    break;
                }
                case 18: {
                    // Title + email + phone + agree T&C
                    const titleBtn = $('[data-title].active', sec);
                    const emailEl = $('[name="email"]', sec);
                    const phoneEl = $('[name="phone"]', sec);
                    const nameEl = $('[name="customer_name"]', sec);
                    const cccdEl = $('[name="cccd"]', sec);
                    const agree   = $('#agreeTc', sec);

                    const name = (nameEl?.value||'').trim();
                    const cccd = (cccdEl?.value||'').trim();
                    const email = (emailEl?.value||'').trim();
                    const phone = (phoneEl?.value||'').trim();

                    if (!state.data.title && !titleBtn){
                        // nếu chưa click nút title nào
                        // (nếu bạn muốn title không bắt buộc thì bỏ check này)
                        // showError vào block chứa các button title:
                        const host = sec.querySelector('.d-flex.flex-wrap') || sec;
                        const hint = document.createElement('div');
                        hint.className = 'cf-error small text-danger w-100 mb-2';
                        hint.textContent = 'Vui lòng chọn xưng danh (Ông/Bà/Cô/Chị)';
                        host.appendChild(hint);
                        return { ok:false };
                    }
                    if (!name){
                        showError(nameEl, 'Vui lòng nhập họ tên'); return { ok:false };
                    }
                    if (!cccd){
                        showError(cccdEl, 'Vui lòng nhập số CMND hoặc CCCD'); return { ok:false };
                    }
                    if (!phone || phone.replace(/\D/g,'').length < 9){
                        showError(phoneEl, 'Vui lòng nhập số điện thoại hợp lệ'); return { ok:false };
                    }
                    if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)){
                        showError(emailEl, 'Email không hợp lệ'); return { ok:false };
                    }

                    if (!agree?.checked){
                        const label = sec.querySelector('label[for="agreeTc"]') || agreeEl;
                        showError(label || agree, 'Bạn cần đồng ý điều khoản'); return { ok:false };
                    }
                    break;
                }
            }

            // nếu qua được switch -> ok
            captureStep(n);
            return { ok:true };
        }

        // =========================
        // EVENTS
        // =========================

        // Back (nếu có #backBtn trong layout)
        $('#backBtn')?.addEventListener('click', (e)=>{ e.preventDefault(); back(); });

        // Pick items -> set và next
        document.addEventListener('click', (e)=>{
            const pick = e.target.closest('.pick[data-value]');
            if (!pick) return;
            const sec = pick.closest('section[data-step]');
            if (!sec) return;
            const step = Number(sec.dataset.step);

            const key = pick.dataset.name || ('step' + step);
            setData(key, pick.dataset.value);

            // toggle UI trong cùng nhóm
            const group = pick.parentElement;
            if (group) {
                $$('.pick', group).forEach(a => a.classList.remove('primary'));
                pick.classList.add('primary');
            }

            // Lưu và sang bước tiếp theo (bước pick không nằm trong REQUIRED_STEPS)
            captureStep(step);
            showStep(step + 1);
        });

        // Auto-save mỗi khi nhập/chọn
        document.addEventListener('input',  (e)=>{ if(e.target?.name){ captureStep(state.step); } });
        document.addEventListener('change', (e)=>{ if(e.target?.name){ captureStep(state.step); } });

        // Nút Continue (có data-continue)
        $$('[data-continue]').forEach(btn=>{
            btn.addEventListener('click', (e)=>{
                e.preventDefault();
                const sec = btn.closest('section[data-step]');
                if (!sec) return;
                const n = Number(sec.dataset.step);
                const { ok } = validateStep(n);
                if (!ok) return;
                showStep(n + 1);
            });
        });

        // Title chọn ở step 18
        $$('[data-title]').forEach(btn=>{
            btn.addEventListener('click', ()=>{
                state.data.title = btn.dataset.title; // lưu
                localStorage.setItem(STORAGE_KEY, JSON.stringify(state.data));
                // UI
                $$('[data-title]').forEach(b=>{
                    b.classList.remove('active');
                    b.style.background = '#fff';
                    b.style.color = '#000';
                });
                btn.classList.add('active');
                btn.style.background = 'var(--purple)';
                btn.style.color = '#fff';
            });
        });

        // =========================
        // INIT
        // =========================
        showStep(state.step);
        window.applyFlowState = state; // expose nếu cần debug



// Clear toàn bộ dữ liệu form + state + UI
        function resetApplyFlow({ gotoFirstStep = true } = {}) {
            const root = document.getElementById('steps');
            if (!root) return;

            // 1) Xoá lỗi cũ
            root.querySelectorAll('.cf-error, .text-danger').forEach(el => el.remove());
            root.querySelectorAll('.is-invalid, [aria-invalid="true"]').forEach(el => {
                el.classList.remove('is-invalid');
                el.removeAttribute('aria-invalid');
            });

            // 2) Clear inputs/selects/textarea
            root.querySelectorAll('input, select, textarea').forEach(el => {
                const type = (el.type || '').toLowerCase();
                if (type === 'checkbox' || type === 'radio') {
                    el.checked = false;
                } else {
                    // Nếu bạn có defaultValue muốn giữ, có thể dùng el.value = el.defaultValue;
                    el.value = '';
                }
            });

            // 3) Bỏ chọn các pick / title
            root.querySelectorAll('.pick.primary').forEach(a => a.classList.remove('primary'));
            root.querySelectorAll('[data-title].active').forEach(a => a.classList.remove('active'));

            // 4) Clear state trong bộ nhớ / localStorage (nếu dùng)
            if (window.applyFlowState) {
                window.applyFlowState.data = {};
                window.applyFlowState.currentStep = 1;
            }
            try {
                localStorage.removeItem('applyFlowState');
            } catch (_) {}

            // 5) Về step 1 (tuỳ chọn)
            if (gotoFirstStep && typeof showStep === 'function') {
                showStep(1);
                // Scroll lên đầu form cho rõ
                root.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }


        // Gom toàn bộ dữ liệu từ state (nếu có) hoặc từ DOM
        function collectApplyData() {
            // Ưu tiên dùng state bạn đang lưu sẵn
            if (window.applyFlowState && window.applyFlowState.data) {
                return { ...window.applyFlowState.data };
            }

            // Fallback: quét DOM lấy [name] + pick đã chọn
            const data = {};
            const root = document.getElementById('steps');

            // inputs/selects có name
            root.querySelectorAll('[name]').forEach(el => {
                let v;
                if (el.type === 'checkbox') v = el.checked;
                else if (el.type === 'radio') { if (!el.checked) return; v = el.value; }
                else v = (el.value ?? '').toString().trim();
                data[el.name] = v;
            });

            // các lựa chọn .pick (nếu dùng)
            root.querySelectorAll('.pick.primary').forEach(a => {
                const step = a.closest('section[data-step]') || a.closest('section[data-step]');
                const n = Number(step?.dataset.step || 0);
                const key = a.dataset.name || ('step' + n);
                data[key] = a.dataset.value;
            });

            // title ở step 18 (nếu có)
            const activeTitle = root.querySelector('[data-title].active');
            if (activeTitle) data.title = activeTitle.dataset.title;

            return data;
        }



        const onlyDigits = (s) => (s || '').replace(/\D/g, ''); // bỏ mọi ký tự không phải số

// Lấy danh sách field name của các input tiền (data-numeric="money")
        function getMoneyFieldNames(root=document){
            const set = new Set();
            root.querySelectorAll('input[data-numeric="money"], [data-numeric="money"] input').forEach(el=>{
                if (el.name) set.add(el.name);
            });
            return set;
        }

// Làm sạch dữ liệu: với các key thuộc moneyFields -> chuyển từ "12.345.678" => 12345678 (Number)
        function stripMoneyFromData(data, moneyFields){
            // deep clone an toàn cho object/array đơn giản
            const clone = (v) => (Array.isArray(v) ? v.map(clone) : (v && typeof v === 'object') ? Object.fromEntries(Object.entries(v).map(([k,val])=>[k, clone(val)])) : v);

            const out = clone(data);

            const walk = (obj) => {
                if (Array.isArray(obj)) {
                    obj.forEach(walk);
                    return;
                }
                if (obj && typeof obj === 'object') {
                    Object.keys(obj).forEach(k=>{
                        const val = obj[k];
                        if (moneyFields.has(k) && (typeof val === 'string' || typeof val === 'number')) {
                            const digits = onlyDigits(String(val));
                            obj[k] = digits ? Number(digits) : null;
                        } else if (val && typeof val === 'object') {
                            walk(val);
                        }
                    });
                }
            };
            walk(out);
            return out;
        }

        // Bắt click ở step 18
        document.getElementById('submitBtn')?.addEventListener('click', function (e) {
            e.preventDefault();
            const btn = this;
            btn.disabled = true;
            btn.dataset.loading = '1';

            const sec18 = stepMap.get(18) || document.querySelector('section[data-step="18"]');
            const { ok } = validateStep(18);
            if (!ok) {
                showStep(18);
                // kéo tới lỗi đầu tiên cho UX tốt hơn
                const firstErr = sec18?.querySelector('.cf-error, .is-invalid, [aria-invalid="true"], .text-danger');
                firstErr?.scrollIntoView({ behavior: 'smooth', block: 'center' });
                if (firstErr?.focus) firstErr.focus();
                btn.disabled = false;
                btn.removeAttribute('data-loading');
                return;
            }


            const data = collectApplyData();

            const moneyFields = getMoneyFieldNames(document);
            const dataClean = stripMoneyFromData(data, moneyFields);


            const payload = {
                status: 'submitted',
                extra_fields: dataClean
            };

            console.log('>>> Submit payload (ready to send):', payload);

            jQuery.ajax({
                url: '{{ route('front.submitApply') }}',
                type: 'POST',
                contentType: 'application/json; charset=utf-8',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'X-Requested-With': 'XMLHttpRequest',
                },
                data: JSON.stringify(payload),
                success: function(response) {
                    if (response.success) {
                        resetApplyFlow();
                        window.location.href = '{{route('front.submitApplySuccess')}}';
                    } else {
                        toastr.error('Thao tác thất bại');
                    }
                },
                error: function(response) {
                    toastr.error('Thao tác thất bại');
                },
                complete: function() {
                    btn.disabled = false;
                    btn.removeAttribute('data-loading');
                }
            });


            // Nếu muốn thử gửi thật, bỏ comment dưới:
            /*
            fetch('/api/applications/submit', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
              },
              credentials: 'same-origin',
              body: JSON.stringify(payload)
            })
            .then(r => r.json())
            .then(json => console.log('>>> Server response:', json))
            .catch(err => console.error('>>> Submit error:', err));
            */
        });


    })();




</script>





<script>

</script>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>




</body>
</html>
