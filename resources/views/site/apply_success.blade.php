<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cảm ơn | AutoCredit</title>
    <style>
        /* ========== SCAFFOLD (scoped) ========== */
        :root {
            --ac-bg: #0f0b20;
            --ac-card: #14112a;
            --ac-text: #e9e7ff;
            --ac-sub: #bfb8ff;
            --ac-primary: #7c4dff;
            --ac-primary-600:#6a3dff;
            --ac-primary-700:#5c34e6;
            --ac-success: #2ecc71;
            --ac-border: rgba(255,255,255,.08);
            --ac-muted: #a5a0c6;
            --ac-shadow: 0 10px 35px -10px rgba(124,77,255,.35);
            --radius-xl: 18px;
            --radius-lg: 14px;
            --radius-md: 10px;
        }
        body { margin:0; font-family: system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, "Apple Color Emoji","Segoe UI Emoji"; background: radial-gradient(1200px 700px at 20% -10%, rgba(124,77,255,.18) 0%, transparent 60%), linear-gradient(180deg, #0b0919 0%, #0a0916 100%); color: var(--ac-text); }

        .ac-thanks { min-height: 100dvh; display:flex; align-items:center; justify-content:center; padding: 28px 16px; }
        .ac-thanks__wrap { width:100%; max-width: 980px; }
        .ac-thanks__card {
            background: linear-gradient(180deg, rgba(255,255,255,.02), rgba(255,255,255,.005)) , var(--ac-card);
            border: 1px solid var(--ac-border);
            border-radius: var(--radius-xl);
            box-shadow: var(--ac-shadow);
            overflow: clip;
        }

        /* Header/Hero */
        .ac-hero { position:relative; padding: 28px 22px; display:grid; grid-template-columns: 72px 1fr; gap: 16px; align-items:center; background:
            radial-gradient(500px 220px at 100% -40%, rgba(124,77,255,.22), transparent 60%),
            radial-gradient(420px 220px at -20% 100%, rgba(124,77,255,.18), transparent 60%),
            linear-gradient(180deg, rgba(255,255,255,.04), rgba(255,255,255,.01));
        }
        .ac-hero__icon {
            width:72px;height:72px;border-radius:22px;display:grid;place-items:center;
            background: radial-gradient(120% 120% at 0% 0%, rgba(124,77,255,.25), rgba(124,77,255,.05));
            border:1px solid var(--ac-border);
        }
        .ac-hero__icon svg { width:40px; height:40px; }
        .ac-hero__title { margin:0; font-size: clamp(20px, 3vw, 28px); line-height:1.2; letter-spacing:.2px; }
        .ac-hero__subtitle { margin:6px 0 0; color: var(--ac-sub); font-size: 14px; }

        /* Body content */
        .ac-body { padding: 8px 22px 22px; display:grid; grid-template-columns: 1.2fr .8fr; gap: 22px; }
        .ac-panel {
            background: linear-gradient(180deg, rgba(255,255,255,.02), rgba(255,255,255,.01));
            border:1px solid var(--ac-border);
            border-radius: var(--radius-lg);
            padding:18px;
        }
        .ac-panel h3 { margin: 0 0 10px; font-size: 16px; color: #fff; letter-spacing:.2px; }
        .ac-panel p { margin: 8px 0; color: var(--ac-muted); font-size: 15px; line-height:1.6; }

        /* Steps / timeline */
        .ac-steps { display:grid; gap:12px; margin-top:8px; }
        .ac-step {
            display:grid; grid-template-columns: 32px 1fr; gap:12px; align-items:flex-start;
            padding:12px; border:1px dashed var(--ac-border); border-radius: var(--radius-md);
            background: rgba(124,77,255,.06);
        }
        .ac-step__dot { width:32px;height:32px;border-radius:50%; background: var(--ac-primary); display:grid; place-items:center; font-weight:700; }
        .ac-step__text { font-size:14px; color: var(--ac-text); line-height:1.5; }
        .ac-step__muted { font-size:12px; color: var(--ac-muted); margin-top:2px; }

        /* Contact box */
        .ac-contact { display:grid; gap:12px; }
        .ac-list { display:grid; gap:10px; }
        .ac-item {
            display:flex; align-items:center; gap:12px; padding:12px;
            border:1px solid var(--ac-border); border-radius: var(--radius-md);
            background: linear-gradient(180deg, rgba(255,255,255,.02), rgba(255,255,255,0));
        }
        .ac-item__ico { width:36px;height:36px;border-radius:10px; display:grid; place-items:center; background: rgba(124,77,255,.18); }
        .ac-item__text { display:flex; flex-direction:column; gap:4px; }
        .ac-item__text small { color: var(--ac-muted); }
        .ac-link {
            display:inline-flex; align-items:center; justify-content:center; gap:8px;
            padding: 11px 14px; border-radius: 12px; border:1px solid var(--ac-primary-700);
            background: linear-gradient(180deg, var(--ac-primary) 0%, var(--ac-primary-600) 100%);
            color:#fff; text-decoration:none; font-weight:700; letter-spacing:.2px;
            transition: transform .15s ease, box-shadow .15s ease;
            box-shadow: 0 8px 24px -8px rgba(124,77,255,.5);
        }
        .ac-link:focus-visible { outline: 3px solid rgba(124,77,255,.45); outline-offset: 2px; }
        .ac-link:hover { transform: translateY(-1px); box-shadow: 0 12px 30px -8px rgba(124,77,255,.6); }
        .ac-ghost {
            background: transparent; border-color: var(--ac-border);
            box-shadow: none; color: var(--ac-text);
        }
        .ac-actions { display:flex; flex-wrap:wrap; gap:10px; margin-top:8px; }

        /* Footer note */
        .ac-note {
            margin-top: 6px; padding: 12px;
            background: rgba(255,255,255,.03); border:1px solid var(--ac-border); border-radius: var(--radius-md);
            color: var(--ac-muted); font-size: 13px; line-height:1.6;
        }

        /* Badge success */
        .ac-badge {
            display:inline-flex; align-items:center; gap:8px; padding: 6px 10px;
            border-radius: 999px; border: 1px solid rgba(46, 204, 113, .25);
            background: radial-gradient(100% 100% at 0% 0%, rgba(46,204,113,.2), rgba(46,204,113,.06));
            color:#d9ffe9; font-weight:600; font-size:13px; letter-spacing:.2px;
        }

        /* Responsive */
        @media (max-width: 900px) {
            .ac-body { grid-template-columns: 1fr; }
        }
        @media (max-width: 600px) {
            .ac-hero { grid-template-columns: 56px 1fr; padding: 22px 16px; }
            .ac-hero__icon { width:56px; height:56px; border-radius:16px; }
            .ac-body { padding: 8px 16px 16px; gap:16px; }
            .ac-panel { padding:14px; }
        }
    </style>
</head>
<body>

<div class="ac-thanks">
    <div class="ac-thanks__wrap">
        <div class="ac-thanks__card">

            <!-- HERO -->
            <header class="ac-hero">
                <div class="ac-hero__icon" aria-hidden="true">
                    <!-- Success tick -->
                    <svg viewBox="0 0 24 24" fill="none" role="img" aria-label="Thành công">
                        <circle cx="12" cy="12" r="11" stroke="rgba(255,255,255,.25)" stroke-width="2"></circle>
                        <path d="M7 12.5l3.2 3.2L17.5 8.6" stroke="#2ecc71" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div>
                    <div class="ac-badge">Lập hồ sơ tài chính thành công</div>
                    <h1 class="ac-hero__title" id="greeting">Xin chào, {{ $order->customer_name }}!</h1>
                    <p class="ac-hero__subtitle">Mã hồ sơ của bạn: <strong id="refId">{{ $order->code }}</strong></p>
                </div>
            </header>

            <!-- BODY -->
            <section class="ac-body">

                <!-- Left: message -->
                <article class="ac-panel">
                    <h3>Cảm ơn Anh/Chị đã tin tưởng AutoCredit.com.vn</h3>
                    <p>Chúng tôi sẽ xem xét hồ sơ vay của bạn. AutoCredit hợp tác với nhiều ngân hàng và công ty tài chính để mang lại cơ hội cao nhất giúp bạn tìm được khoản vay mua ô tô với ưu đãi tốt nhất. Nếu sau khi xem xét hồ sơ mà chúng tôi thấy có thể hỗ trợ, bạn sẽ được chỉ định một <strong>Chuyên viên tư vấn vay ô tô</strong> riêng, người sẽ gọi điện và giải thích chi tiết cho bạn.</p>
                    <p><strong>Trong thời gian chờ đợi</strong>, nếu bạn muốn kiểm tra tiến độ hồ sơ, vui lòng liên hệ với chúng tôi.</p>

                    <div class="ac-steps" aria-label="Các bước tiếp theo">
                        <div class="ac-step">
                            <div class="ac-step__dot">1</div>
                            <div>
                                <div class="ac-step__text">Xác minh thông tin hồ sơ</div>
                                <div class="ac-step__muted">Kiểm tra tính chính xác & đầy đủ của dữ liệu bạn cung cấp.</div>
                            </div>
                        </div>
                        <div class="ac-step">
                            <div class="ac-step__dot">2</div>
                            <div>
                                <div class="ac-step__text">Đối chiếu ngân hàng/đối tác tài chính</div>
                                <div class="ac-step__muted">Chọn đối tác phù hợp để đề xuất hạn mức & ưu đãi lãi suất.</div>
                            </div>
                        </div>
                        <div class="ac-step">
                            <div class="ac-step__dot">3</div>
                            <div>
                                <div class="ac-step__text">Chuyên viên liên hệ & tư vấn</div>
                                <div class="ac-step__muted">Gọi điện trình bày chi tiết phương án và hướng dẫn các bước tiếp theo.</div>
                            </div>
                        </div>
                    </div>

                    <div class="ac-note">
                        Lưu ý: Vui lòng để ý điện thoại trong 24–48 giờ làm việc. Nếu cần cập nhật thông tin, bạn có thể hồi đáp nhanh qua Zalo/Email bên dưới.
                    </div>
                </article>

                <!-- Right: contact -->
                <aside class="ac-panel ac-contact">
                    <h3>Liên hệ nhanh</h3>

                    <div class="ac-list">
                        <div class="ac-item">
                            <div class="ac-item__ico" aria-hidden="true">
                                <svg viewBox="0 0 24 24" width="20" height="20" fill="none">
                                    <path d="M6.6 10.8c1.1 2.2 3 4.1 5.2 5.2l2-2c.2-.2.6-.3.9-.2 1 .3 2 .5 3 .5.5 0 .9.4.9.9V18c0 .5-.4.9-.9.9C10.9 18.9 5.1 13.1 5.1 6.9c0-.5.4-.9.9-.9H8c.5 0 .9.4.9.9 0 1 .2 2 .5 3 .1.3 0 .7-.2.9l-1.6 2z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="ac-item__text">
                                <strong>Hotline</strong>
                                <small>Thời gian: 8:00–21:00 (T2–CN)</small>
                            </div>
                        </div>

                        <div class="ac-item">
                            <div class="ac-item__ico" aria-hidden="true">
                                <svg viewBox="0 0 24 24" width="20" height="20" fill="none">
                                    <path d="M4 6.5l8 5 8-5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <rect x="3" y="5" width="18" height="14" rx="2" ry="2" stroke="currentColor" stroke-width="1.5" fill="none"/>
                                </svg>
                            </div>
                            <div class="ac-item__text">
                                <strong>Email</strong>
                                <small>Phản hồi trong 24h làm việc</small>
                            </div>
                        </div>

                        <div class="ac-item">
                            <div class="ac-item__ico" aria-hidden="true">
                                <svg viewBox="0 0 24 24" width="20" height="20" fill="none">
                                    <path d="M12 3c3.9 0 7 3.1 7 7 0 5.2-6.5 10.5-7 11- .5-.5-7-5.8-7-11 0-3.9 3.1-7 7-7z" stroke="currentColor" stroke-width="1.5" fill="none"/>
                                    <circle cx="12" cy="10" r="3" stroke="currentColor" stroke-width="1.5" fill="none"/>
                                </svg>
                            </div>
                            <div class="ac-item__text">
                                <strong>Zalo</strong>
                                <small>Kết nối & cập nhật tiến độ</small>
                            </div>
                        </div>
                    </div>

                    <div class="ac-actions">
                        <a class="ac-link" href="tel:{{ $config->hotline }}" aria-label="Gọi Hotline">
                            Gọi Hotline
                        </a>
                        <a class="ac-link ac-ghost" href="https://zalo.me/{{ $config->zalo }}" target="_blank" rel="noopener" aria-label="Chat Zalo">Chat Zalo</a>
                        <a class="ac-link ac-ghost" href="mailto:{{ $config->email }}" aria-label="Gửi Email">Gửi Email</a>
                    </div>
                </aside>

            </section>
        </div>
    </div>
</div>

<script>
    // ====== DATA BINDING NHẸ ======
    // Ưu tiên: window.__THANKYOU.name -> query ?name= -> fallback "Quý khách"
    (function(){
        const params = new URLSearchParams(location.search);
        const nameFromQuery = params.get('name');
        const name = {{ $order->customer_name }};

        const greeting = document.getElementById('greeting');
        greeting.textContent = `Xin chào, ${name}!`;

        // Mã tham chiếu (nếu có từ server thì ghi đè)
        const ref = {{ $order->code }};
        document.getElementById('refId').textContent = ref;

        function makeRef(){
            const d = new Date();
            const pad = n => String(n).padStart(2,'0');
            return `AC-${d.getFullYear()}${pad(d.getMonth()+1)}${pad(d.getDate())}-${Math.random().toString(36).slice(2,6).toUpperCase()}`;
        }
    })();
</script>
</body>
</html>
