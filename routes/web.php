<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BaiVietController;
use App\Http\Controllers\ChiTietDonHangController;
use App\Http\Controllers\ChiTietNhapKhoController;
use App\Http\Controllers\ChuyenMucController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\HoaDonController;
use App\Http\Controllers\HoaDonNhapKhoController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\NhaCungCapController;
use App\Http\Controllers\QuyenController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ThongKeController;
use App\Http\Controllers\TrangChuController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\VnPayController;
use App\Models\ChuyenMuc;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/vnpay/{id}', [VnPayController::class, 'indexvnpay']);
Route::post('/vnpay/thanh-toan/', [VnPayController::class, 'actionThanhToan']);
Route::get('/vnpay/thanh-toan/respone', [VnPayController::class, 'responeVNPay']);
// Route::get('/', [TestController::class, 'index']);


Route::get('/', [TrangChuController::class, 'index']);
Route::get('/transaction', [TransactionController::class, 'index']);
Route::get('/product/{slug}', [TrangChuController::class, 'detailProduct']);
Route::get('/category/{slug}', [TrangChuController::class, 'listProduct']);
Route::get('/search', [TrangChuController::class, 'search']);


Route::get('/login', [KhachHangController::class, 'viewAuth']);
Route::post('/login', [KhachHangController::class, 'login']);
Route::get('/register', [KhachHangController::class, 'viewRegister']);
Route::post('/register', [KhachHangController::class, 'register']);
Route::get('/kich-hoat/{hash}', [KhachHangController::class, 'active']);

Route::get('/reset', [KhachHangController::class, 'viewReset']);
Route::post('/reset', [KhachHangController::class, 'actionReset']);
Route::get('/change-pass/{hash}', [KhachHangController::class, 'viewChangePass']);
Route::post('/change-pass', [KhachHangController::class, 'actionChangePass']);
Route::get('/blog/{id}', [TrangChuController::class, 'Blog']);
Route::get('/blog-list/{id}', [TrangChuController::class, 'listBlog']);
Route::get('/logout', [KhachHangController::class, 'logout']);


Route::group(['prefix' => '/client', 'middleware' => 'ClientMiddelware'], function () {
    Route::get('/add-to-cart/{id_san_pham}', [ChiTietDonHangController::class, 'store']);
    Route::get('/cart', [ChiTietDonHangController::class, 'index']);
    Route::get('/cart/data', [ChiTietDonHangController::class, 'dataCart']);
    Route::get('/cart/remove/{id}', [ChiTietDonHangController::class, 'removeCart']);
    Route::post('/cart/update', [ChiTietDonHangController::class, 'update']);

    Route::post('/bill/create', [HoaDonController::class, 'store']);
    Route::get('/bill-order', [HoaDonController::class, 'index']);
    Route::get('/bill/order', [HoaDonController::class, 'listOrder']);
    Route::get('/all-bill', [HoaDonController::class, 'listBill']);

    Route::get('/myaccount', [KhachHangController::class, 'myAcc']);
    Route::post('/myaccount', [KhachHangController::class, 'updatemyAcc']);
    Route::post('/updatepassword', [KhachHangController::class, 'updatePassword']);
    Route::post('/delete-hang', [KhachHangController::class, 'deleteHang']);
});

Route::group(['prefix' => '/admin-shop', 'middleware' => 'AdminMiddleware'], function () {
    Route::get('/', [TestController::class, 'index']);
    Route::group(['prefix' => 'danh-muc'], function () {
        Route::get('/index', [DanhMucController::class, 'index']);
        Route::post('/create', [DanhMucController::class, 'store']);
        Route::get('/data', [DanhMucController::class, 'getData']);
        Route::get('/edit/{id}', [DanhMucController::class, 'edit']);
        Route::post('/update', [DanhMucController::class, 'update']);
        Route::post('/destroy', [DanhMucController::class, 'destroy'])->name('deleteDanhMuc');
        Route::post('/update-status', [DanhMucController::class, 'updateStatus'])->name('updateStatus');
        Route::post('/check-category-id', [DanhMucController::class, 'checkCategoryId']);
        Route::post('/check-category-id2', [DanhMucController::class, 'checkCategoryId2']);
        // Route::post('/search', [DanhMucController::class, 'search']);

    });

    Route::group(['prefix' => 'san-pham'], function () {
        Route::get('/index', [SanPhamController::class, 'index']);
        Route::get('/', [SanPhamController::class, 'index_vue']);
        Route::post('/create', [SanPhamController::class, 'store']);
        Route::get('/data', [SanPhamController::class, 'getData']);
        Route::get('/edit/{id}', [SanPhamController::class, 'edit']);
        Route::post('/update', [SanPhamController::class, 'update']);
        Route::get('/destroy/{id}', [SanPhamController::class, 'destroy']);
        Route::get('/update-status/{id}', [SanPhamController::class, 'updateStatus']);
        Route::post('/check-product-id', [SanPhamController::class, 'checkProductId']);
        Route::post('/check-product-id2', [SanPhamController::class, 'checkProductId2']);
        Route::post('/check-product-slug', [SanPhamController::class, 'checkProductSlug']);
        Route::post('/search', [SanPhamController::class, 'search']);
    });
    Route::group(['prefix' => 'chuyen-muc'], function () {
        Route::get('/index', [ChuyenMucController::class, 'index']);
        Route::post('/create', [ChuyenMucController::class, 'store'])->name('createChuyenMuc');
        Route::post('/check-chuyenmuc-id', [ChuyenMucController::class, 'checkChuyenMuc']);
        Route::get('/data', [ChuyenMucController::class, 'getData'])->name('getDataChuyenMuc');
        Route::post('/update-status', [ChuyenMucController::class, 'updateStatus'])->name('updateStatusChuyenMuc');;
        Route::post('/update', [ChuyenMucController::class, 'update'])->name('updateChuyenMuc');
        Route::get('/edit/{id}', [ChuyenMucController::class, 'edit']);
        Route::post('/destroy', [ChuyenMucController::class, 'destroy'])->name('destroyChuyenMuc');
    });

    Route::group(['prefix' => 'bai-viet'], function () {
        Route::get('/index', [BaiVietController::class, 'index']);
        Route::post('/create', [BaiVietController::class, 'store'])->name('storeBaiViet');
        Route::get('/data', [BaiVietController::class, 'getData'])->name('getDataBaiViet');
        Route::post('/update', [BaiVietController::class, 'update'])->name('updateBaiViet');
        Route::get('/edit/{id}', [BaiVietController::class, 'edit']);
        Route::post('/destroy', [BaiVietController::class, 'destroy'])->name('destroyBaiViet');
    });
    Route::group(['prefix' => '/nha-cung-cap'], function () {
        Route::get('/', [NhaCungCapController::class, 'index']);
        Route::post('/create', [NhaCungCapController::class, 'store'])->name('storeNhaCungCap');
        Route::get('/data', [NhaCungCapController::class, 'data'])->name('dataNhaCungCap');
        Route::post('/delete', [NhaCungCapController::class, 'destroy'])->name('destroyNhaCungCap');
        Route::post('/update', [NhaCungCapController::class, 'update'])->name('updateNhaCungCap');

        Route::post('check-mst', [NhaCungCapController::class, 'checkMST'])->name('checkMSTNhaCungCap');
    });
    Route::group(['prefix' => '/nhap-kho'], function () {
        Route::get('/', [ChiTietNhapKhoController::class, 'index']);
        Route::get('/data', [ChiTietNhapKhoController::class, 'getData']);

        Route::post('/create', [ChiTietNhapKhoController::class, 'store']);
        Route::post('/delete', [ChiTietNhapKhoController::class, 'destroy']);
        Route::post('/update', [ChiTietNhapKhoController::class, 'update']);
        Route::post('/create-nhap-kho', [ChiTietNhapKhoController::class, 'createNhapKho']);
        Route::post('/create-nhap-kho-chinh-thuc', [ChiTietNhapKhoController::class, 'createNhapKhoChinhThuc'])->name('NhapKhoChinhThuc');

        Route::get('/lich-su', [HoaDonNhapKhoController::class, 'history']);
    });

    Route::group(['prefix' => '/hoa-don-nhap-kho'], function () {
        Route::get('/', [HoaDonNhapKhoController::class, 'index']);
        Route::get('/data', [HoaDonNhapKhoController::class, 'getData'])->name('DataHoaDonNhapKho');
        Route::get('/data-nhap-kho/{id}', [HoaDonNhapKhoController::class, 'dataNhapKho'])->name('dataNhapKho');
        Route::post('/change-type', [HoaDonNhapKhoController::class, 'changeType']);
        Route::post('/search', [HoaDonNhapKhoController::class, 'search']);

        Route::get('/thong-ke', [HoaDonNhapKhoController::class, 'analytic']);
        Route::post('/thong-ke', [HoaDonNhapKhoController::class, 'analyticPost'])->name('postThongKeNhapKho');
        Route::get('/thong-ke-san-pham', [ThongKeController::class, 'index1']);
        Route::post('/thong-ke-san-pham', [ThongKeController::class, 'search1'])->name('postThongKeNhapKhoSanPham');
    });
    Route::group(['prefix' => '/admin'], function () {
        Route::get('/index', [AdminController::class, 'index']);
        Route::get('/data', [AdminController::class, 'getData']);
        Route::post('/check-email', [AdminController::class, 'checkEmail']);
        Route::post('/create', [AdminController::class, 'store']);
        Route::get('/update-status/{id}', [AdminController::class, 'updateStatus']);
        Route::get('/logout', [AdminController::class, 'logout']);
        Route::post('/update', [AdminController::class, 'update']);
        Route::post('/update-password', [AdminController::class, 'updatePassword']);
        Route::get('/edit/{id}', [AdminController::class, 'edit']);
        Route::get('/destroy/{id}', [AdminController::class, 'destroy']);
    });
    Route::group(['prefix' => '/hoa-don-ban-hang'], function () {
        Route::get('/index', [HoaDonController::class, 'admin_index']);

        Route::get('/data', [HoaDonController::class, 'getData']);
        Route::get('/exportPdf/{id}', [HoaDonController::class, 'exportPdf']);

        Route::post('/change-status', [HoaDonController::class, 'changeStatus']);
        Route::post('/change-type', [HoaDonController::class, 'changeType']);
        Route::post('/search', [HoaDonController::class, 'search']);
        Route::get('/detail/{id}', [ChiTietDonHangController::class, 'getDetail']);

        Route::get('/thong-ke', [HoaDonController::class, 'analytic']);
        Route::post('/thong-ke', [HoaDonController::class, 'analyticPost'])->name('postThongKe');
        Route::get('/thong-ke-san-pham', [ThongKeController::class, 'index']);
        Route::post('/thong-ke-san-pham', [ThongKeController::class, 'search'])->name('postThongKeSanPham');
    });

    Route::group(['prefix' => '/slide'], function () {
        Route::get('/index', [SlideController::class, 'index']);
        Route::post('/create', [SlideController::class, 'store']);
        Route::get('/data', [SlideController::class, 'getData']);
        Route::get('/edit/{id}', [SlideController::class, 'edit']);
        Route::post('/update', [SlideController::class, 'update']);
        Route::get('/destroy/{id}', [SlideController::class, 'destroy']);
        Route::get('/update-status/{id}', [SlideController::class, 'updateStatus']);
    });
    Route::group(['prefix' => '/quyen'], function () {
        Route::get('/', [QuyenController::class, 'index']);
        Route::get('/data', [QuyenController::class, 'getData']);
        Route::get('/data-action', [QuyenController::class, 'getAction']);

        Route::post('/create', [QuyenController::class, 'store']);
        Route::post('/delete', [QuyenController::class, 'destroy']);
        Route::post('/update', [QuyenController::class, 'update']);
        Route::post('/update-action', [QuyenController::class, 'updateAction']);
        Route::get('/update-status/{id}', [QuyenController::class, 'updateStatus']);
    });
    Route::get('/logout', [\App\Http\Controllers\AdminController::class, 'logout']);
});

Route::get('/admin-shop/login', [\App\Http\Controllers\AdminController::class, 'viewLogin']);
Route::post('/admin-shop/login', [\App\Http\Controllers\AdminController::class, 'actionLogin']);

Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
