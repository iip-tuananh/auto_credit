<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <title>Apply – CF247 clone flow (14 steps)</title>
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
</head>
<body>
<div class="wrap">
    <!-- Header (logo giả + trustpilot placeholder) -->
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div class="brand">Car Finance 247</div>
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

            <!-- 1. Quote for?  Car/Van/Bike -->
            <section data-step="1">
                <div class="pick-list">
                    <a class="pick" data-name="quote_for" data-value="Car">Car <span class="arrow">→</span></a>
                    <a class="pick" data-name="quote_for" data-value="Van">Van <span class="arrow">→</span></a>
                    <a class="pick" data-name="quote_for" data-value="Bike">Bike <span class="arrow">→</span></a>
                </div>
                <p class="subtle mt-4 small">By starting your quote, you agree to our <a href="#" class="mini-link">Privacy
                        Policy</a>.<br>Representative 19.8% APR. CF247 Limited is a credit broker, not a lender.</p>
            </section>

            <!-- 2. Driving licence type? -->
            <section class="d-none" data-step="2">
                <div class="pick-list">
                    <a class="pick " data-value="Full UK">Full UK <span class="arrow">→</span></a>
                    <a class="pick" data-value="Provisional UK">Provisional UK <span class="arrow">→</span></a>
                    <a class="pick" data-value="EU">EU <span class="arrow">→</span></a>
                    <a class="pick" data-value="International">International <span class="arrow">→</span></a>
                    <a class="pick" data-value="No licence">I don't have a licence <span class="arrow">→</span></a>
                </div>
            </section>

            <!-- 3. Marital status -->
            <section class="d-none" data-step="3">
                <div class="pick-list">
                    <a class="pick " data-value="Married">Married <span class="arrow">→</span></a>
                    <a class="pick" data-value="Single">Single <span class="arrow">→</span></a>
                    <a class="pick" data-value="Cohabiting">Cohabiting <span class="arrow">→</span></a>
                    <a class="pick" data-value="Divorced">Divorced <span class="arrow">→</span></a>
                    <a class="pick" data-value="Separated">Separated <span class="arrow">→</span></a>
                    <a class="pick" data-value="Widowed">Widowed <span class="arrow">→</span></a>
                    <a class="pick" data-value="Civil partnership">Civil partnership <span class="arrow">→</span></a>
                </div>
            </section>

            <!-- 4. DOB Day/Month/Year + Continue -->
            <section class="d-none" data-step="4">
                <div class="row g-3 mb-3">
                    <div class="col-4 col-sm-3 col-md-2"><label class="form-label small">Day</label><input
                            class="form-control cf-input" inputmode="numeric" maxlength="2" placeholder="DD"
                            name="dob_d"></div>
                    <div class="col-4 col-sm-3 col-md-2"><label class="form-label small">Month</label><input
                            class="form-control cf-input" inputmode="numeric" maxlength="2" placeholder="MM"
                            name="dob_m"></div>
                    <div class="col-4 col-sm-4 col-md-3"><label class="form-label small">Year</label><input
                            class="form-control cf-input" inputmode="numeric" maxlength="4" placeholder="YYYY"
                            name="dob_y"></div>
                </div>
                <button class="btn btn-continue w-100" data-continue>Continue →</button>
            </section>

            <!-- 5. Where do you live? (search) -->
            <section class="d-none" data-step="5">
                <div class="mb-2"><a href="#" class="mini-link">Why do we ask this?</a></div>
                <label class="form-label subtle">Search for your address</label>
                <input class="form-control cf-input" placeholder="e.g. 'CR0 3AG' or 'Factory Lane'" name="addr_search">
                <div class="mt-2"><a href="#" class="mini-link" id="manualAddr">Manually enter address details</a></div>
                <div id="manualAddrWrap" class="d-none mt-3">
                    <input class="form-control cf-input mb-2" placeholder="Address line" name="address1">
                    <input class="form-control cf-input mb-2" placeholder="Town/City" name="city">
                    <input class="form-control cf-input" placeholder="Postcode" name="postcode">
                </div>
                <button class="btn btn-continue w-100" data-continue>Continue →</button>

            </section>

            <!-- 6. Residential status (shows chosen address line above) -->
            <section class="d-none" data-step="6">
                <div class="addr-line" id="addrLine">—</div>
                <div class="pick-list">
                    <a class="pick" data-value="Private Tenant">Private Tenant <span class="arrow">→</span></a>
                    <a class="pick" data-value="Home Owner">Home Owner <span class="arrow">→</span></a>
                    <a class="pick" data-value="Council Tenant">Council Tenant <span class="arrow">→</span></a>
                    <a class="pick" data-value="Living with Parents">Living with Parents <span
                            class="arrow">→</span></a>
                </div>
            </section>

            <!-- 7. How long at this address? (years/months) -->
            <section class="d-none" data-step="7">
                <div class="addr-line" id="addrLine2">—</div>
                <div class="row g-3 mb-2">
                    <div class="col-sm-6"><label class="form-label">Years</label><input class="form-control cf-input"
                                                                                        inputmode="numeric"
                                                                                        name="years_at"></div>
                    <div class="col-sm-6"><label class="form-label">Months</label><input class="form-control cf-input"
                                                                                         inputmode="numeric"
                                                                                         name="months_at"></div>
                </div>
                <div class="subtle small mb-3">Lenders ask for 3 years' address history.</div>
                <button class="btn btn-continue w-100" data-continue>Continue →</button>
            </section>

            <!-- 8. Employment status (with show more) -->
            <section class="d-none" data-step="8">
                <div class="pick-list" id="empList">
                    <a class="pick" data-value="Full-Time">Full-Time <span class="arrow">→</span></a>
                    <a class="pick" data-value="Self-Employed">Self-Employed <span class="arrow">→</span></a>
                    <a class="pick" data-value="Part-Time">Part-Time <span class="arrow">→</span></a>
                    <a class="pick" data-value="Disability">Disability <span class="arrow">→</span></a>
                    <a class="pick" data-value="Retired">Retired <span class="arrow">→</span></a>
                    <a class="pick" id="moreEmp" data-value="__more">Show more options <span class="arrow">＋</span></a>
                </div>
            </section>

            <!-- 9. Tell us about your current employment -->
            <section class="d-none" data-step="9">
                <div class="subtle">We won't contact your employer</div>
                <div class="mb-2"><a href="#" class="mini-link">Why do we ask this?</a></div>
                <div class="row g-3">
                    <div class="col-12"><label class="form-label">Job Title</label><input class="form-control cf-input"
                                                                                          name="job_title"></div>
                    <div class="col-12"><label class="form-label">Employer Name</label><input
                            class="form-control cf-input" name="employer"></div>
                    <div class="col-12"><label class="form-label">Where is your workplace based?</label><input
                            class="form-control cf-input" name="workplace" placeholder="e.g. Manchester"></div>
                </div>
                <button class="btn btn-continue w-100 mt-3" data-continue>Continue →</button>
            </section>

            <!-- 10. How long have you worked there? -->
            <section class="d-none" data-step="10">
                <div class="row g-3 mb-2">
                    <div class="col-sm-6"><label class="form-label">Years</label><input class="form-control cf-input"
                                                                                        inputmode="numeric"
                                                                                        name="emp_years"></div>
                    <div class="col-sm-6"><label class="form-label">Months</label><input class="form-control cf-input"
                                                                                         inputmode="numeric"
                                                                                         name="emp_months"></div>
                </div>
                <button class="btn btn-continue w-100" data-continue>Continue →</button>
            </section>

            <!-- 11. Income after tax -->
            <section class="d-none" data-step="11">
                <label class="form-label">Amount</label>
                <div class="input-group mb-1">
                    <span class="input-group-text">£</span>
                    <input class="form-control cf-input" inputmode="decimal" name="net_income" placeholder="">
                </div>
                <div class="subtle small mb-3">This can be an estimate if your monthly income varies</div>
                <button class="btn btn-continue w-100" data-continue>Continue →</button>
            </section>

            <!-- 12. How much would you like to borrow? -->
            <section class="d-none" data-step="12">
                <div class="subtle mb-2">Don't worry, you can change this later and it won't impact whether you're
                    approved
                </div>
                <label class="form-label">Amount</label>
                <div class="input-group mb-2">
                    <span class="input-group-text">£</span>
                    <input class="form-control cf-input" inputmode="decimal" name="borrow_amount" value="60000">
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="notSure">
                    <label class="form-check-label" for="notSure">I'm not sure</label>
                </div>
                <button class="btn btn-continue w-100" data-continue>Continue →</button>
            </section>

            <!-- 13. Who you are (Title + names) -->
            <section class="d-none" data-step="13">
                <div class="mb-2"><label class="form-label">Your Title</label></div>
                <div class="d-flex flex-wrap gap-2 mb-2">
                    <button type="button" class="btn" data-title="Mr"
                            style="border:2px solid var(--purple-border);border-radius:10px;padding:10px 14px;font-weight:700;background:var(--purple);color:#fff">
                        Mr
                    </button>
                    <button type="button" class="btn" data-title="Mrs"
                            style="border:2px solid var(--purple-border);border-radius:10px;padding:10px 14px;font-weight:700;background:#fff">
                        Mrs
                    </button>
                    <button type="button" class="btn" data-title="Miss"
                            style="border:2px solid var(--purple-border);border-radius:10px;padding:10px 14px;font-weight:700;background:#fff">
                        Miss
                    </button>
                    <button type="button" class="btn" data-title="Ms"
                            style="border:2px solid var(--purple-border);border-radius:10px;padding:10px 14px;font-weight:700;background:#fff">
                        Ms
                    </button>
                </div>
                <div class="mb-3"><a href="#" id="titleNotListed" class="mini-link">My title isn't listed</a></div>
                <div id="titleCustomWrap" class="d-none mb-3"><input class="form-control cf-input" name="title_custom"
                                                                     placeholder="Enter your title"></div>

                <div class="mb-2"><label class="form-label">First Name</label>
                    <input class="form-control cf-input" name="first_name">
                    <div class="invalid-feedback d-block" id="fnErr" style="display:none;color:#d92c4a">Please enter
                        your first name
                    </div>
                </div>
                <div class="mb-3"><label class="form-label">Last Name</label>
                    <input class="form-control cf-input" name="last_name">
                    <div class="invalid-feedback d-block" id="lnErr" style="display:none;color:#d92c4a">Please enter
                        your last name
                    </div>
                </div>
                <button class="btn btn-continue w-100" data-continue>Continue →</button>
            </section>

            <!-- 14. Contact + T&C -->
            <section class="d-none" data-step="14">
                <div class="mb-3"><label class="form-label">Email address</label><input class="form-control cf-input"
                                                                                        type="email" name="email"></div>
                <div class="mb-3"><label class="form-label">Phone number</label><input class="form-control cf-input"
                                                                                       type="tel" name="phone"></div>
                <div class="mb-3"><strong>Terms and conditions</strong></div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="agreeTc">
                    <label class="form-check-label" for="agreeTc">I have read and agree to <a href="#"
                                                                                              class="mini-link">Car
                            Finance 247 Limited's terms & conditions</a>.</label>
                </div>
                <button class="btn btn-continue w-100" id="submitBtn">Get my quote →</button>
                <div class="subtle small mt-3">The personal information we have collected from you will be shared with
                    fraud prevention agencies who will use it to prevent fraud and money laundering and to verify your
                    identity. See our <a href="#" class="mini-link">Privacy Policy</a>.
                </div>
            </section>

        </div>
    </div>
</div>

<script>
    (() => {
        // ------------ CONFIG ------------
        const titles = {
            1:"What would you like a finance quote for?",
            2:"What type of driving licence do you have?",
            3:"What is your marital status?",
            4:"What is your date of birth?",
            5:"Next, where do you live?",
            6:"What is your residential status?",
            7:"How long have you lived at this address?",
            8:"What is your employment status?",
            9:"Tell us about your current employment",
            10:"How long have you worked there?",
            11:"How much do you earn each month after tax?",
            12:"How much would you like to borrow?",
            13:"Almost done, let us know who you are",
            14:"And finally, where should we send your quote?"
        };
        const total = 14;
        const STORAGE_KEY = 'applyData';
        const STEP_KEY    = 'applyCurrentStep';

        // ------------ STATE ------------
        const applyState = {
            applyData: JSON.parse(localStorage.getItem(STORAGE_KEY) || '{}'),
            applyStep: Number(sessionStorage.getItem(STEP_KEY) || 1),
        };

        // ------------ HELPERS ------------
        const q  = (sel, root=document) => root.querySelector(sel);
        const qa = (sel, root=document) => Array.from(root.querySelectorAll(sel));

        function setData(key, val){
            applyState.applyData[key] = val;
            localStorage.setItem(STORAGE_KEY, JSON.stringify(applyState.applyData));
        }
        function getData(key){ return applyState.applyData[key]; }
        function saveStep(){
            sessionStorage.setItem(STEP_KEY, String(applyState.applyStep));
        }

        function captureStep(n){
            const sect = document.querySelector(`section[data-step="${n}"]`);
            if(!sect) return;
            qa('[name]', sect).forEach(el=>{
                let v;
                if(el.type === 'checkbox') v = el.checked;
                else if(el.type === 'radio'){ if(!el.checked) return; v = el.value; }
                else v = (el.value ?? '').toString().trim();
                setData(el.name, v);
            });
        }

        function hydrateStep(n){
            const sect = document.querySelector(`section[data-step="${n}"]`);
            if(!sect) return;

            // bơm lại input
            qa('[name]', sect).forEach(el=>{
                const v = getData(el.name);
                if(v === undefined) return;
                if(el.type === 'checkbox') el.checked = !!v;
                else if(el.type === 'radio') el.checked = (el.value === v);
                else el.value = v;
            });

            // tô lại option đã chọn (support cả data-name và fallback stepN)
            const stepKey = 'step' + n;
            qa('.pick', sect).forEach(a=>{
                const key = a.dataset.name || stepKey;
                const chosen = getData(key);
                a.classList.toggle('primary', chosen === a.dataset.value);
            });

            // render dòng địa chỉ ở step 6–7
            if(n === 6 || n === 7){
                const addr = (getData('address1') || getData('addr_search') || '')
                    + (getData('city') ? ', '+getData('city') : '')
                    + (getData('postcode') ? ', '+getData('postcode') : '');
                if(n===6 && q('#addrLine'))  q('#addrLine').textContent  = addr || '—';
                if(n===7 && q('#addrLine2')) q('#addrLine2').textContent = addr || '—';
            }
        }

        function renderChrome(n){
            if(q('#title'))      q('#title').textContent = titles[n] || '';
            if(q('#progressBar'))q('#progressBar').style.width = Math.round((n-1)/(total-1)*100) + '%';
            if(q('#backBtn'))    q('#backBtn').style.display = (n>1)?'inline-flex':'none';
        }

        function showStep(n){
            qa('#steps section').forEach(s=>s.classList.add('d-none'));
            const sect = document.querySelector(`#steps section[data-step="${n}"]`);
            if(sect) sect.classList.remove('d-none');

            applyState.applyStep = n;
            saveStep();
            renderChrome(n);
            hydrateStep(n);
        }
        function next(){ if(applyState.applyStep < total) showStep(applyState.applyStep + 1); }
        function back(){ captureStep(applyState.applyStep); showStep(Math.max(1, applyState.applyStep - 1)); }

        // ------------ EVENTS ------------
        // back
        q('#backBtn')?.addEventListener('click', (e)=>{ e.preventDefault(); back(); });

        // click option card
        document.addEventListener('click', (e)=>{
            const pick = e.target.closest('.pick[data-value]');
            if(!pick) return;
            const step = Number(pick.closest('section')?.dataset.step || applyState.applyStep);
            const key  = pick.dataset.name || ('step' + step);
            const groupParent = pick.parentElement;

            setData(key, pick.dataset.value);
            if(groupParent){
                qa(`.pick[data-name="${pick.dataset.name}"], .pick`, groupParent).forEach(a=>a.classList.remove('primary'));
                pick.classList.add('primary');
            }
            next();
        });

        // auto-save khi nhập/chọn
        document.addEventListener('input',  (e)=>{ if(e.target?.name){ captureStep(applyState.applyStep); } });
        document.addEventListener('change', (e)=>{ if(e.target?.name){ captureStep(applyState.applyStep); } });

        // Continue buttons + validations giống code cũ
        qa('[data-continue]').forEach(btn=>{
            btn.addEventListener('click', (e)=>{
                e.preventDefault();
                const step = Number(btn.closest('section').dataset.step);

                // --- VALIDATIONS/ASSIGNMENTS ---
                if(step === 4){
                    const d = q('[name="dob_d"]')?.value.trim();
                    const m = q('[name="dob_m"]')?.value.trim();
                    const y = q('[name="dob_y"]')?.value.trim();
                    if(!(d && m && y)){ alert('Please enter your full date of birth'); return; }
                    setData('dob', `${d}/${m}/${y}`);
                }
                if(step === 5){
                    const as = q('[name="addr_search"]')?.value.trim() || '';
                    const a1 = q('[name="address1"]')?.value.trim() || '';
                    const ct = q('[name="city"]')?.value.trim() || '';
                    const pc = q('[name="postcode"]')?.value.trim() || '';
                    if(!as && !a1 && !ct && !pc){ alert('Please enter or search your address'); return; }
                    ['addr_search','address1','city','postcode'].forEach(k=> setData(k, q(`[name="${k}"]`)?.value || getData(k)));
                }
                if(step === 7){
                    setData('years_at',  q('[name="years_at"]')?.value);
                    setData('months_at', q('[name="months_at"]')?.value);
                }
                if(step === 9){
                    ['job_title','employer','workplace'].forEach(k=> setData(k, q(`[name="${k}"]`)?.value));
                }
                if(step === 10){
                    setData('emp_years',  q('[name="emp_years"]')?.value);
                    setData('emp_months', q('[name="emp_months"]')?.value);
                }
                if(step === 11){
                    const v = q('[name="net_income"]')?.value.trim();
                    if(!v){ alert('Please enter your monthly income after tax'); return; }
                    setData('net_income', v);
                }
                if(step === 12){
                    if(!q('#notSure')?.checked){
                        const v = q('[name="borrow_amount"]')?.value.trim();
                        if(!v){ alert('Please enter amount to borrow or tick "I\'m not sure"'); return; }
                        setData('borrow_amount', v);
                    } else {
                        setData('borrow_amount', 'Not sure');
                    }
                }
                if(step === 13){
                    const fn = q('[name="first_name"]');
                    const ln = q('[name="last_name"]');
                    let ok = true;
                    if(!fn.value.trim()){ ok=false; q('#fnErr').style.display='block'; fn.style.borderColor='#d92c4a'; } else { q('#fnErr').style.display='none'; fn.style.borderColor='#d9dbe3'; }
                    if(!ln.value.trim()){ ok=false; q('#lnErr').style.display='block'; ln.style.borderColor='#d92c4a'; } else { q('#lnErr').style.display='none'; ln.style.borderColor='#d9dbe3'; }
                    if(!ok) return;
                    setData('first_name', fn.value);
                    setData('last_name',  ln.value);
                }

                captureStep(applyState.applyStep); // lưu mọi input trong step
                next();
            });
        });

        // Manual address toggle
        q('#manualAddr')?.addEventListener('click', (e)=>{
            e.preventDefault();
            q('#manualAddrWrap')?.classList.toggle('d-none');
        });

        // Employment show more
        q('#moreEmp')?.addEventListener('click',(e)=>{
            e.preventDefault();
            const extra=['Unemployed','Student','Homemaker','On leave','Other'];
            const list=q('#empList'); if(!list) return;
            extra.forEach(v=>{
                const a=document.createElement('a');
                a.className='pick'; a.dataset.value=v;
                a.innerHTML=`${v} <span class='arrow'>→</span>`;
                list.insertBefore(a, q('#moreEmp'));
            });
            q('#moreEmp').remove();
        });

        // Title select
        qa('[data-title]').forEach(btn=>{
            btn.addEventListener('click', ()=>{
                applyState.applyData.title = btn.dataset.title;
                qa('[data-title]').forEach(b=>{ b.style.background='#fff'; b.style.color='#000'; });
                btn.style.background='var(--purple)'; btn.style.color='#fff';
                localStorage.setItem(STORAGE_KEY, JSON.stringify(applyState.applyData));
            });
        });
        q('#titleNotListed')?.addEventListener('click',(e)=>{
            e.preventDefault(); q('#titleCustomWrap')?.classList.toggle('d-none');
        });

        // Submit final (mock)
        q('#submitBtn')?.addEventListener('click',(e)=>{
            e.preventDefault();
            if(!q('#agreeTc')?.checked){ alert('Please agree to the terms & conditions'); return; }
            const email=q('[name="email"]')?.value.trim(); const phone=q('[name="phone"]')?.value.trim();
            if(!email||!phone){ alert('Please enter your email and phone'); return; }
            alert('Submitted! (mock)');
        });

        // ------------ INIT (khôi phục đúng tiến trình khi reload) ------------
        showStep(applyState.applyStep);
        window.applyState = applyState; // cho AJAX dùng nếu cần
    })();
</script>


<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
    /**
     * Gọi lên server với toàn bộ state.
     * Giả sử bạn đã có window.applyState.applyData và applyState.applyStep.
     */
    function submitApplication() {
        const $btn = $('#submitBtn');
        const payload = {
            step: window.applyState?.applyStep || null,     // bước hiện tại (tuỳ chọn)
            data: window.applyState?.applyData || {}        // toàn bộ form
        };

        console.log(payload)
        $btn.prop('disabled', true).text('Submitting...');

        $.ajax({
            url: "",      // khai báo route trong web.php
            method: "POST",
            data: JSON.stringify(payload),
            contentType: "application/json; charset=utf-8",
            processData: false,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            success: function(res) {
                // tuỳ ý: xoá nháp sau khi submit thành công
                // localStorage.removeItem('applyData');
                // sessionStorage.removeItem('applyCurrentStep');

                // điều hướng/hiển thị thông báo
                // window.location.href = res.redirect || '/thank-you';
                alert('Submitted successfully!');
            },
            error: function(xhr) {
                // Laravel validation 422
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON?.errors || {};
                    // bạn có thể hiển thị từng lỗi cạnh input theo key:
                    // ví dụ: errors['first_name'] => ["The first name field is required."]
                    console.error('Validation errors:', errors);
                    alert('Please check the form and try again.');
                } else {
                    console.error('Server error:', xhr.responseText);
                    alert('Something went wrong. Please try again.');
                }
            },
            complete: function() {
                $btn.prop('disabled', false).text('Get my quote →');
            }
        });
    }

    $('#submitBtn').on('click', function(e){
        e.preventDefault();
        submitApplication();
    });
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>




</body>
</html>
