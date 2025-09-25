<?php

namespace App\Http\Controllers\Admin;

use App\Mail\OrderActive;
use App\Model\Admin\Config;
use App\Model\Admin\Order;
use App\Model\Admin\OrderDetail;
use Illuminate\Http\Request;
use App\Model\Admin\Order as ThisModel;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use \stdClass;

use Rap2hpoutre\FastExcel\FastExcel;
use PDF;
use App\Http\Controllers\Controller;
use \Carbon\Carbon;
use Illuminate\Validation\Rule;
use App\Helpers\FileHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Model\Common\Customer;

class OrderController extends Controller
{
    protected $view = 'admin.orders';
    protected $route = 'orders';

    public function index()
    {
        return view($this->view . '.index');
    }

    // Hàm lấy data cho bảng list
    public function searchData(Request $request)
    {
        $objects = ThisModel::searchByFilter($request);
        return Datatables::of($objects)
            ->addColumn('customer', function ($object) {
                $name  = $object->customer_name;
                $cccd  = $object->cccd;
                $phone = $object->phone;

                // format CCCD: 12 số -> 3 3 3 3
                $fmtId = function ($id) {
                    if (!$id) return null;
                    $digits = preg_replace('/\D/', '', $id);
                    if (strlen($digits) === 12) {
                        return preg_replace('/(\d{3})(\d{3})(\d{3})(\d{3})/', '$1 $2 $3 $4', $digits);
                    }
                    return $id;
                };

                // format ĐT VN: +84xxxxxxxxx -> 0xxxxxxxxx, 10 số -> 4 3 3
                $fmtPhone = function ($p) {
                    if (!$p) return null;
                    $digits = preg_replace('/\D/', '', $p);
                    if (substr($digits, 0, 2) === '84') $digits = '0' . substr($digits, 2);
                    if (strlen($digits) === 10) {
                        $digits = preg_replace('/(\d{4})(\d{3})(\d{3})/', '$1 $2 $3', $digits);
                    }
                    return $digits ?: $p;
                };

                $lines = [];
                if ($cccd)  $lines[] = 'CCCD: ' . $fmtId($cccd);
                if ($phone) $lines[] = 'ĐT: '   . $fmtPhone($phone);

                $sub = implode(' • ', $lines);
                return '<div class="dt-customer" style="line-height:1.2">
                <div style="font-weight:600">'.e($name).'</div>'
                    . ($sub ? '<div style="font-size:12px;color:#6b7280;margin-top:2px">'.e($sub).'</div>' : '')
                    .'</div>';
            })
            ->editColumn('code', function ($object) {
                return '<a href = "'.route('orders.show', $object->id).'" title = "Xem chi tiết">' . $object->code . '</a>';
            })
            ->editColumn('created_at', function ($object) {
                return Carbon::parse($object->created_at)->format('d/m/Y H:i');
            })
            ->editColumn('borrow_amount', function ($object) {
                return formatCurrency($object->borrow_amount);
            })
            ->editColumn('status', function ($object) {
                $raw = strtolower((string)($object->status ?? ''));

                $meta = [
                    'new' => [
                        'label' => 'Mới',
                        'bg'    => '#e0f2fe', // xanh nhạt
                        'text'  => '#075985',
                        'icon'  => '🆕'
                    ],
                    'approved' => [
                        'label' => 'Đã duyệt',
                        'bg'    => '#dcfce7', // xanh lá nhạt
                        'text'  => '#166534',
                        'icon'  => '✔'
                    ],
                    'rejected' => [
                        'label' => 'Từ chối',
                        'bg'    => '#fee2e2', // đỏ nhạt
                        'text'  => '#991b1b',
                        'icon'  => '✖'
                    ],
                ];

                $m = $meta[$raw] ?? [
                    'label' => ucfirst($raw ?: 'Không rõ'),
                    'bg'    => '#e5e7eb',
                    'text'  => '#374151',
                    'icon'  => '•'
                ];

                return '<span class="dt-status-badge" title="'.e($m['label']).'"
        style="
            display:inline-flex;align-items:center;gap:6px;
            font-weight:600;font-size:12px;line-height:1;
            padding:6px 10px;border-radius:999px;
            background:'.$m['bg'].';color:'.$m['text'].';
            border:1px solid rgba(0,0,0,0.06);
            box-shadow:0 1px 0 rgba(0,0,0,0.03);
        ">
            <span aria-hidden="true">'.$m['icon'].'</span>
            <span>'.e($m['label']).'</span>
        </span>';
            })
            ->addColumn('action', function ($object) {
                $result = '<div class="btn-group btn-action">
                <button class="btn btn-info btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class = "fa fa-cog"></i>
                </button>
                <div class="dropdown-menu">';
                $result = $result . ' <a href="'.route('orders.show', $object->id).'" title="đổi trạng thái" class="dropdown-item"><i class="fa fa-angle-right"></i>Xem chi tiết</a>';
                $result = $result . ' <a href="'.route('orders.delete', $object->id).'" title="xóa" class="dropdown-item confirm"><i class="fa fa-angle-right"></i>Xóa</a>';

                $result = $result . '</div></div>';
                return $result;
            })
            ->addIndexColumn()
            ->rawColumns(['code', 'action', 'customer', 'status'])
            ->make(true);
    }

    public function show(Request $request, $id) {
        $order = Order::query()->find($id);

        return view($this->view . '.show', compact('order'));
    }

    public function delete($id) {
        $order = Order::query()->where('id', $id)->first();
        $order->details()->delete();

        $order->delete();

        $message = array(
            "message" => "Thao tác thành công!",
            "alert-type" => "success"
        );

        return redirect()->route($this->route.'.index')->with($message);
    }

    public function updateStatus(Request $request)
    {
        $order = Order::query()->find($request->order_id);

        $order->status = $request->order_status;
        $order->save();

        return Response::json(['success' => true, 'message' => 'cập nhật trạng thái hồ sơ thành công']);
    }
}
