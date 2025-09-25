@extends('layouts.main')

@section('css')
@endsection

@section('page_title')
    Chi tiết hồ sơ
@endsection

@section('title')
    Chi tiết hồ sơ
@endsection

@section('buttons')
@endsection

@section('content')

<div>
    <div class="row">
        <div class="col-md-12">
            <div class="card" ng-controller="ProfileShowCtrl">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Hồ sơ #<% form.code %></h6>
                    <!-- Badge trạng thái -->
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <!-- Badge preview -->
                        <span class="dt-status-badge" ng-bind-html="statusBadge(form.status)"></span>

                        <!-- Select cập nhật trạng thái -->
                        <select class="form-select form-select-sm"
                                ng-model="form.status"
                                ng-options="s.value as s.label for s in statusOptions"
                                style="min-width:170px"></select>

                        <!-- Nút Lưu -->
                        <button type="button" class="btn btn-sm btn-primary"
                                ng-click="updateStatus()"
                                ng-disabled="loading.submit">
                            <span ng-if="!loading.submit">Cập nhật</span>
                            <span ng-if="loading.submit">Đang lưu…</span>
                        </button>
                    </div>

                </div>

                <div class="card-body profile-view">
                    <!-- HÀNG 1: Khách hàng + Cá nhân -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="ibox">
                                <div class="ibox-title">Khách hàng</div>
                                <div class="ibox-content">
                                    <div class="kv">
                                        <span class="k">Họ tên</span>
                                        <span class="v"><% form.customer_name || form.fullname %></span>
                                    </div>
                                    <div class="kv">
                                        <span class="k">Email</span>
                                        <span class="v"><% form.email || '—' %></span>
                                    </div>
                                    <div class="kv">
                                        <span class="k">Số CCCD</span>
                                        <span class="v"><% fmtCCCD(form.cccd) %></span>
                                    </div>
                                    <div class="kv">
                                        <span class="k">Điện thoại</span>
                                        <span class="v"><% fmtPhone(form.phone) %></span>
                                    </div>
                                    <div class="kv">
                                        <span class="k">Tình trạng hôn nhân</span>
                                        <span class="v"><% form.marital_status || '—' %></span>
                                    </div>
                                    <div class="kv">
                                        <span class="k">Xưng danh</span>
                                        <span class="v"><% form.title || '—' %></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="ibox">
                                <div class="ibox-title">Thông tin cá nhân</div>
                                <div class="ibox-content">
                                    <div class="kv">
                                        <span class="k">Ngày sinh</span>
                                        <span class="v"><% fmtDOB(form.dob_date, form.dob_d, form.dob_m, form.dob_y) %></span>
                                    </div>
                                    <div class="kv">
                                        <span class="k">Bằng lái</span>
                                        <span class="v"><% form.driving_license || '—' %></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- HÀNG 2: Cư trú + Việc làm -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="ibox">
                                <div class="ibox-title">Cư trú</div>
                                <div class="ibox-content">
                                    <div class="kv">
                                        <span class="k">Địa chỉ thường trú</span>
                                        <span class="v"><% form.address_thuongtru || '—' %></span>
                                    </div>
                                    <div class="kv">
                                        <span class="k">Địa chỉ sinh sống</span>
                                        <span class="v"><% form.address_sinhsong || '—' %></span>
                                    </div>
                                    <div class="kv">
                                        <span class="k">Thời gian cư trú</span>
                                        <span class="v"><% fmtYM(form.years_cutru, form.months_cutru) %></span>
                                    </div>
                                    <div class="kv">
                                        <span class="k">Tình trạng chỗ ở</span>
                                        <span class="v"><% form.housing_status || '—' %></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="ibox">
                                <div class="ibox-title">Việc làm</div>
                                <div class="ibox-content">
                                    <div class="kv">
                                        <span class="k">Tình trạng việc làm</span>
                                        <span class="v"><% form.employment_status || '—' %></span>
                                    </div>
                                    <div class="kv">
                                        <span class="k">Chức vụ</span>
                                        <span class="v"><% form.job_title || '—' %></span>
                                    </div>
                                    <div class="kv">
                                        <span class="k">Công ty</span>
                                        <span class="v"><% form.company_name || '—' %></span>
                                    </div>
                                    <div class="kv">
                                        <span class="k">Địa chỉ công ty</span>
                                        <span class="v"><% form.company_address || '—' %></span>
                                    </div>
                                    <div class="kv">
                                        <span class="k">Thâm niên</span>
                                        <span class="v"><% fmtYM(form.work_years, form.work_months) %></span>
                                    </div>
                                    <div class="kv">
                                        <span class="k">Thu nhập ròng</span>
                                        <span class="v text-money"><% fmtVND(form.net_income) %></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- HÀNG 3: Phương tiện + Khoản vay -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="ibox">
                                <div class="ibox-title">Phương tiện</div>
                                <div class="ibox-content">
                                    <div class="kv">
                                        <span class="k">Loại phương tiện</span>
                                        <span class="v"><% form.vehicle_type || '—' %></span>
                                    </div>
                                    <div class="kv">
                                        <span class="k">Tình trạng xe</span>
                                        <span class="v"><% form.vehicle_condition || '—' %></span>
                                    </div>
                                    <div class="kv">
                                        <span class="k">Đã tìm được xe?</span>
                                        <span class="v"><% form.vehicle_found || '—' %></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="ibox">
                                <div class="ibox-title">Khoản vay</div>
                                <div class="ibox-content">
                                    <div class="kv">
                                        <span class="k">Khoản vay dự kiến</span>
                                        <span class="v text-money"><% fmtVND(form.borrow_amount) %></span>
                                    </div>
                                    <div class="kv">
                                        <span class="k">Số tiền trả trước</span>
                                        <span class="v text-money"><% fmtVND(form.pay_amount) %></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- HÀNG 4: Mã hồ sơ + ghi chú tuỳ chọn -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="ibox">
                                <div class="ibox-title">Thông tin hệ thống</div>
                                <div class="ibox-content">
                                    <div class="kv">
                                        <span class="k">Mã hồ sơ</span>
                                        <span class="v"><% form.code %></span>
                                    </div>
                                    <!-- Bạn có thể thêm ghi chú nội bộ ở đây nếu cần -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                /* ----- chỉ áp dụng trong card này ----- */
                .profile-view .ibox { border:1px solid #e5e7eb; border-radius:14px; margin-bottom:16px; background:#fff; box-shadow:0 1px 0 rgba(0,0,0,.03); }
                .profile-view .ibox-title { font-weight:700; padding:10px 14px; border-bottom:1px solid #f1f5f9; background:#f8fafc; border-radius:14px 14px 0 0; }
                .profile-view .ibox-content { padding:10px 14px; }
                .profile-view .kv { display:flex; gap:12px; padding:6px 0; }
                .profile-view .kv .k { width:190px; color:#64748b; font-weight:600; }
                .profile-view .kv .v { flex:1; color:#0f172a; }
                .profile-view .text-money { font-variant-numeric: tabular-nums; font-weight:700; }
                /* badge status (dùng innerHTML từ statusBadge) */
                .dt-status-badge { display:inline-flex; align-items:center; gap:6px; font-weight:700; font-size:12px; line-height:1; padding:6px 10px; border-radius:999px; border:1px solid rgba(0,0,0,.06); box-shadow:0 1px 0 rgba(0,0,0,.03); }
                .dt-status-badge .dot { width:8px; height:8px; border-radius:50%; display:inline-block; }
                @media (max-width: 575.98px){
                    .profile-view .kv .k { width:140px; }
                }
            </style>


        </div>


    </div>





</div>
@endsection

@section('script')
    @include('admin.orders.Order')

    <script>
        app.controller('ProfileShowCtrl', function ($scope, $sce, $http) {
            $scope.form = new Order(@json($order), {scope: $scope});
            $scope.statusOptions = [
                { value: 'new',      label: 'Mới' },
                { value: 'approved', label: 'Đã duyệt' },
                { value: 'rejected', label: 'Từ chối' },
            ];

            $scope.fmtVND = function(n){
                if (n === null || n === undefined || n === '') return '—';
                const num = Number(n);
                if (isNaN(num)) return n;
                return num.toLocaleString('vi-VN') + ' ₫';
            };

            $scope.fmtCCCD = function(id){
                if (!id) return '—';
                const digits = (''+id).replace(/\D/g,'');
                if (digits.length === 12) return digits.replace(/(\d{3})(\d{3})(\d{3})(\d{3})/, '$1 $2 $3 $4');
                return id;
            };

            $scope.fmtPhone = function(p){
                if (!p) return '—';
                let digits = (''+p).replace(/\D/g,'');
                if (digits.startsWith('84')) digits = '0' + digits.slice(2);
                if (digits.length === 10) return digits.replace(/(\d{4})(\d{3})(\d{3})/, '$1 $2 $3');
                return p;
            };

            $scope.fmtDOB = function(dob_date, d, m, y){
                if (dob_date) {
                    try { return new Date(dob_date).toLocaleDateString('vi-VN'); } catch(e){}
                }
                if (d && m && y) return `${(''+d).padStart(2,'0')}/${(''+m).padStart(2,'0')}/${y}`;
                return '—';
            };

            $scope.fmtYM = function(y, m){
                const yy = (y && y !== '') ? Number(y) : 0;
                const mm = (m && m !== '') ? Number(m) : 0;
                if (!yy && !mm) return '—';
                const ys = yy ? `${yy} năm` : '';
                const ms = mm ? `${mm} tháng` : '';
                return [ys, ms].filter(Boolean).join(' ');
            };

            // ---- Status badge ----
            $scope.statusBadge = function(st){
                const raw = (st||'').toString().toLowerCase();
                const map = {
                    'new':      { label:'Mới',      bg:'#e0f2fe', color:'#075985', dot:'#0ea5e9' },
                    'approved': { label:'Đã duyệt', bg:'#dcfce7', color:'#166534', dot:'#22c55e' },
                    'rejected': { label:'Từ chối',  bg:'#fee2e2', color:'#991b1b', dot:'#ef4444' },
                };
                const m = map[raw] || { label: (st||'Không rõ'), bg:'#e5e7eb', color:'#374151', dot:'#9ca3af' };
                const html = `<span class="dt-status-badge" style="background:${m.bg};color:${m.color}">
                    <i class="dot" style="background:${m.dot}"></i>
                    <span>${m.label}</span>
                  </span>`;
                return $sce.trustAsHtml(html);
            };


            $scope.loading = {};

            $scope.updateStatus = function () {
                $scope.loading.submit = true;
                let data = {
                    order_id: $scope.form.id,
                    order_status: $scope.form.status,
                };

                $.ajax({
                    type: 'POST',
                    url: "/admin/loan-applications/update-status",
                    headers: {
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    data: data,
                    success: function (response) {
                        if (response.success) {
                            toastr.success(response.message);
                        } else {
                            toastr.warning(response.message);
                            $scope.errors = response.errors;
                        }
                    },
                    error: function (e) {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function () {
                        $scope.loading.submit = false;
                        $scope.$applyAsync();
                    }
                });
            }

        });
    </script>
@endsection
