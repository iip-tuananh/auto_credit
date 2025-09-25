<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_applications', function (Blueprint $t) {
            $t->bigIncrements('id');
            // --- Meta theo dõi hồ sơ ---
            $t->string('status', 32)->default('draft')->comment('Trạng thái hồ sơ: draft|submitted|approved|rejected');

            // --- Thông tin phương tiện / nhu cầu ---
            $t->string('vehicle_type')->nullable()->comment('Loại phương tiện: ô tô/taxi/xe máy/khác');
            $t->string('vehicle_condition')->nullable()->comment('Tình trạng xe: xe mới/xe đã qua sử dụng');
            $t->string('vehicle_found')->nullable()->comment('Đã tìm được xe chưa: có/chưa');

            // --- Bằng lái ---
            $t->string('driving_license')->nullable()->comment('Loại bằng lái: ô tô/xe máy/cả hai/quốc tế/chưa có');

            // --- Thông tin cá nhân cơ bản ---
            $t->string('fullname')->nullable()->comment('Họ tên người nộp');
            $t->integer('dob_d')->nullable()->comment('Ngày sinh - ngày (DD)');
            $t->integer('dob_m')->nullable()->comment('Ngày sinh - tháng (MM)');
            $t->integer('dob_y')->nullable()->comment('Ngày sinh - năm (YYYY)');
            $t->date('dob_date')->nullable()->comment('Ngày sinh dạng DATE (nếu muốn lưu dạng chuẩn; có thể dựng từ d/m/y)');
            $t->string('marital_status')->nullable()->comment('Tình trạng hôn nhân: độc thân/đã kết hôn/khác');

            // --- Địa chỉ cư trú ---
            $t->string('address_thuongtru', 255)->nullable()->comment('Địa chỉ thường trú');
            $t->string('address_sinhsong', 255)->nullable()->comment('Địa chỉ sinh sống hiện tại');
            $t->integer('years_cutru')->nullable()->comment('Số năm cư trú tại địa chỉ hiện tại');
            $t->integer('months_cutru')->nullable()->comment('Số tháng cư trú tại địa chỉ hiện tại (0-11)');
            $t->string('housing_status', 50)->nullable()->comment('Tình trạng chỗ ở: thuê/chủ nhà/sống cùng bố mẹ');

            // --- Việc làm ---
            $t->string('employment_status')->nullable()->comment('Tình trạng việc làm');
            $t->string('job_title')->nullable()->comment('Chức vụ hiện tại');
            $t->string('company_name')->nullable()->comment('Tên công ty');
            $t->string('company_address')->nullable()->comment('Địa chỉ công ty (tên field theo FE: "company_address")');

            // --- Thâm niên công việc ---
            $t->integer('work_years')->nullable()->comment('Số năm làm việc tại công ty hiện tại');
            $t->integer('work_months')->nullable()->comment('Số tháng làm việc (0-11)');

            // --- Tài chính ---
            $t->decimal('net_income', 15, 2)->nullable()->comment('Thu nhập ròng hàng tháng (VND)');
            $t->decimal('borrow_amount', 15, 2)->nullable()->comment('Khoản vay dự kiến (VND)');
            $t->decimal('pay_amount', 15, 2)->nullable()->comment('Số tiền dự kiến trả trước (VND)');

            // --- Liên hệ & xưng danh ---
            $t->string('title', 10)->nullable()->comment('Xưng danh: Mr/Mrs/Miss/Ms');
            $t->string('email', 191)->nullable()->index()->comment('Email liên hệ');
            $t->string('customer_name')->nullable()->index()->comment('Họ tên');
            $t->string('cccd')->nullable()->index()->comment('số cccd');
            $t->string('phone', 50)->nullable()->index()->comment('Số điện thoại liên hệ');

            $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loan_applications');
    }
}
