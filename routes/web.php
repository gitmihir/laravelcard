<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

use Illuminate\Support\Facades\Auth;

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


/* Login Register Routes */

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('home', [AuthController::class, 'home']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

/* Employee Routes */
Route::get('/', function () {
    return view('frontwebsite/frontpage');
});
Route::get('/contact-us', function () {
    return view('frontwebsite/frontcontactus');
});
Route::get('/products', function () {
    return view('frontwebsite/frontproducts');
});
Route::get('/checkout', function () {
    return view('frontwebsite/checkout');
});
Route::get('cart', 'App\Http\Controllers\ProductController@cart');
Route::get('add-to-cart/{id}', 'App\Http\Controllers\ProductController@addToCart');
Route::get('product-detail/{id}', 'App\Http\Controllers\ProductController@viewproductindetailfront');
Route::patch('update-cart', 'App\Http\Controllers\ProductController@update');
Route::delete('remove-from-cart', 'App\Http\Controllers\ProductController@remove');
Route::patch('update-shopping-cart', 'App\Http\Controllers\ProductController@updateshoppingcart');


/* Expenses Routes */
Route::group(['middleware' => 'auth'], function () {


    Route::get(
        '/customers/allcustomers',
        function () {
            return view('/customers/allcustomers');
        }
    );

    Route::get(
        '/customers/addcustomer',
        function () {
            return view('/customers/addcustomer');
        }
    );
    Route::get('insert', 'App\Http\Controllers\CustomerController@insertform');
    Route::post('/create', 'App\Http\Controllers\CustomerController@insert');
    Route::get('/customers/allcustomers', 'App\Http\Controllers\CustomerController@view');
    Route::get('edit-employee/{id}', 'App\Http\Controllers\CustomerController@edit');
    Route::put('update-employee/{id}', 'App\Http\Controllers\CustomerController@update');
    Route::get('delete-customer/{id}', 'App\Http\Controllers\CustomerController@destroy');
    Route::get('view-employee/{id}', 'App\Http\Controllers\CustomerController@viewcustomerindetail');
    Route::get(
        '/expense/allexpense',
        function () {
            return view('/expense/allexpense');
        }
    );

    Route::get(
        '/expense/addexpense',
        function () {
            return view('/expense/addexpense');
        }
    );

    Route::get('/expense/addexpense', 'App\Http\Controllers\ExpenseController@expenseby');
    Route::get('insertexpense', 'App\Http\Controllers\ExpenseController@insertexpenseform');
    Route::post('/createexpense', 'App\Http\Controllers\ExpenseController@insertexpense');
    Route::get('/expense/allexpense', 'App\Http\Controllers\ExpenseController@viewexpense');
    Route::get('edit-expense/{expense_id}', 'App\Http\Controllers\ExpenseController@editexpense');
    Route::put('update-expense/{expense_id}', 'App\Http\Controllers\ExpenseController@updateexpense');
    Route::get('delete-expense/{expense_id}', 'App\Http\Controllers\ExpenseController@destroyexpense');
    Route::get('view-expense/{expense_id}', 'App\Http\Controllers\ExpenseController@viewexpenseindetail');

    /* Product Routes */
    Route::get(
        '/products/allproducts',
        function () {
            return view('/products/allproducts');
        }
    );
    Route::get(
        '/products/addproduct',
        function () {
            return view('/products/addproduct');
        }
    );
    Route::get('insertproduct', 'App\Http\Controllers\ProductController@insertproductform');
    Route::post('/submitproduct', 'App\Http\Controllers\ProductController@insertproduct');
    Route::get('/products/allproducts', 'App\Http\Controllers\ProductController@viewproduct');
    Route::get('edit-product/{product_main_id}', 'App\Http\Controllers\ProductController@editproduct');
    Route::put('update-product/{product_main_id}', 'App\Http\Controllers\ProductController@updateproduct');
    Route::get('delete-product/{product_main_id}', 'App\Http\Controllers\ProductController@destroyproduct');
    Route::get('view-product/{product_main_id}', 'App\Http\Controllers\ProductController@viewproductindetail');
    Route::get('/products/addproduct', 'App\Http\Controllers\ProductController@categoryinproduct');


    /* Category Routes */

    Route::get(
        '/category/allcategory',
        function () {
            return view('/category/allcategory');
        }
    );
    Route::get(
        '/category/addcategory',
        function () {
            return view('/category/addcategory');
        }
    );
    Route::get('insertcategory', 'App\Http\Controllers\CategoryController@insertcategoryform');
    Route::post('/submitcategory', 'App\Http\Controllers\CategoryController@insertcategory');
    Route::get('/category/allcategory', 'App\Http\Controllers\CategoryController@viewcategory');
    Route::get('edit-category/{category_id}', 'App\Http\Controllers\CategoryController@editcategory');
    Route::put('update-category/{category_id}', 'App\Http\Controllers\CategoryController@updatecategory');
    Route::get('delete-category/{category_id}', 'App\Http\Controllers\CategoryController@destroycategory');
    Route::get('view-category/{category_id}', 'App\Http\Controllers\CategoryController@viewcategoryindetail');


    /* Sub Category Routes */
    Route::get(
        '/subcategory/allsubcategory',
        function () {
            return view('/subcategory/allsubcategory');
        }
    );
    Route::get(
        '/subcategory/addsubcategory',
        function () {
            return view('/subcategory/addsubcategory');
        }
    );
    Route::get('insertsubcategory', 'App\Http\Controllers\SubcategoryController@insertsubcategoryform');
    Route::post('/submitsubcategory', 'App\Http\Controllers\SubcategoryController@insertsubcategory');
    Route::get('/subcategory/allsubcategory', 'App\Http\Controllers\SubcategoryController@viewsubcategory');
    Route::get('edit-subcategory/{subcategory_id}', 'App\Http\Controllers\SubcategoryController@editsubcategory');
    Route::put('update-subcategory/{subcategory_id}', 'App\Http\Controllers\SubcategoryController@updatesubcategory');
    Route::get('delete-subcategory/{subcategory_id}', 'App\Http\Controllers\SubcategoryController@destroysubcategory');
    Route::get('view-subcategory/{subcategory_id}', 'App\Http\Controllers\SubcategoryController@viewsubcategoryindetail');



    /* Supplier Routes */
    Route::get(
        '/supplier/allsupplier',
        function () {
            return view('/supplier/allsupplier');
        }
    );
    Route::get(
        '/supplier/addsupplier',
        function () {
            return view('/supplier/addsupplier');
        }
    );
    Route::get('insertsupplier', 'App\Http\Controllers\SupplierController@insertsupplierform');
    Route::post('/submitsupplier', 'App\Http\Controllers\SupplierController@insertsupplier');
    Route::get('/supplier/allsupplier', 'App\Http\Controllers\SupplierController@viewsupplier');
    Route::get('edit-supplier/{id}', 'App\Http\Controllers\SupplierController@editsupplier');
    Route::put('update-supplier/{id}', 'App\Http\Controllers\SupplierController@updatesupplier');
    Route::get('delete-supplier/{id}', 'App\Http\Controllers\SupplierController@destroysupplier');
    Route::get('view-supplier/{id}', 'App\Http\Controllers\SupplierController@viewsupplierindetail');

    /* Bills Routes */
    Route::get(
        '/bills/addbills',
        function () {
            return view('/bills/addbills');
        }
    );
    Route::get(
        '/bills/allbills',
        function () {
            return view('/bills/allbills');
        }
    );
    Route::get('/bills/addbills', 'App\Http\Controllers\BillsController@selectqueries');
    Route::get('insertbill', 'App\Http\Controllers\SupplierController@insertbillform');
    Route::post('/createbill', 'App\Http\Controllers\BillsController@insertbill');
    Route::get('/bills/allbills', 'App\Http\Controllers\BillsController@viewbills');
    Route::get('view-bill', 'App\Http\Controllers\BillsController@viewbillindetail');
    Route::get('bill-transaction/{id}', 'App\Http\Controllers\BillsController@addbiilltransactionform');
    Route::put('submittransaction/', 'App\Http\Controllers\BillsController@inserttransaction');
    Route::get('delete-bills/{id}', 'App\Http\Controllers\BillsController@destroybill');

    /* Ajax Routes */
    Route::get('/bills/addbills/{productid}', 'App\Http\Controllers\BillsController@getproductamount');
    Route::get('edit-bill/{id}', 'App\Http\Controllers\BillsController@editbill');
    Route::put('update-bill/{id}', 'App\Http\Controllers\BillsController@updatebill');
    Route::get('listoftransactions/{id}', 'App\Http\Controllers\BillsController@listoftransactions');

    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified'
    ])->group(
            function () {
                Route::get(
                    '/dashboard',
                    function () {
                                return view('dashboard');
                            }
                )->name('dashboard');
            }
        );


    /* SMTP Settings Routes */
    Route::get(
        '/smtp/smtpdetails',
        function () {
            return view('/smtp/smtpdetails');
        }
    );
    Route::get(
        '/smtp/addsmtp',
        function () {
            return view('/smtp/addsmtp');
        }
    );
    Route::get('insertsupplier', 'App\Http\Controllers\SmtpController@insertsmtpform');
    Route::post('/createsmtp', 'App\Http\Controllers\SmtpController@insertsmtp');
    Route::get('/smtp/smtpdetails', 'App\Http\Controllers\SmtpController@viewsmtp');
    Route::get('edit-smtp/{id}', 'App\Http\Controllers\SmtpController@editsmtp');
    Route::put('update-smtp/{id}', 'App\Http\Controllers\SmtpController@updatesmtp');
    Route::get('delete-smtp/{id}', 'App\Http\Controllers\SmtpController@destroysmtp');

    /* Front Footer Routes */
    Route::get(
        '/frontfooter/footerdetails',
        function () {
            return view('/smtp/footerdetails');
        }
    );
    Route::get(
        '/frontfooter/addfooter',
        function () {
            return view('/frontfooter/addfooter');
        }
    );
    Route::get('insertsupplier', 'App\Http\Controllers\FrontfooterController@insertfrontfooterform');
    Route::post('/createfrontfooter', 'App\Http\Controllers\FrontfooterController@insertfrontfooter');
    Route::get('/frontfooter/footerdetails', 'App\Http\Controllers\FrontfooterController@viewfrontfooter');
    Route::get('edit-frontfooter/{id}', 'App\Http\Controllers\FrontfooterController@editfrontfooter');
    Route::put('update-frontfooter/{id}', 'App\Http\Controllers\FrontfooterController@updatefrontfooter');
    Route::get('delete-frontfooter/{id}', 'App\Http\Controllers\FrontfooterController@destroyfrontfooter');

    /* Brand Details Routes */
    Route::get(
        '/branddetails/branddetail',
        function () {
            return view('/branddetails/branddetail');
        }
    );
    Route::get(
        '/branddetails/addbrand',
        function () {
            return view('/branddetails/addbrand');
        }
    );
    Route::get('insertsupplier', 'App\Http\Controllers\BrandController@insertbarndform');
    Route::post('/createbrand', 'App\Http\Controllers\BrandController@insertbrand');
    Route::get('/branddetails/branddetail', 'App\Http\Controllers\BrandController@viewbrand');
    Route::get('edit-brand/{id}', 'App\Http\Controllers\BrandController@editbrand');
    Route::put('update-brand/{id}', 'App\Http\Controllers\BrandController@updatebrand');
    Route::get('delete-brand/{id}', 'App\Http\Controllers\BrandController@destroybrand');

    /* CMS Details Routes */
    Route::get(
        '/cms/cmsdetails',
        function () {
            return view('/cms/cmsdetails');
        }
    );
    Route::get(
        '/cms/addcms',
        function () {
            return view('/cms/addcms');
        }
    );
    Route::get('insertcms', 'App\Http\Controllers\CMSController@insertcmsform');
    Route::post('/createcms', 'App\Http\Controllers\CMSController@insertcms');
    Route::get('/cms/cmsdetails', 'App\Http\Controllers\CMSController@viewcms');
    Route::get('edit-cms/{id}', 'App\Http\Controllers\CMSController@editcms');
    Route::put('update-cms/{id}', 'App\Http\Controllers\CMSController@updatecms');
    Route::get('delete-cms/{id}', 'App\Http\Controllers\CMSController@destroycms');

    /* Payment Credentials Routes */
    Route::get(
        '/paymentcredentials/pcdetails',
        function () {
            return view('/paymentcredentials/pcdetails');
        }
    );
    Route::get(
        '/paymentcredentials/addpc',
        function () {
            return view('/paymentcredentials/addpc');
        }
    );
    Route::get('insertsupplier', 'App\Http\Controllers\PCController@insertpcform');
    Route::post('/createpc', 'App\Http\Controllers\PCController@insertpc');
    Route::get('/paymentcredentials/pcdetails', 'App\Http\Controllers\PCController@viewpc');
    Route::get('edit-pc/{id}', 'App\Http\Controllers\PCController@editpc');
    Route::put('update-pc/{id}', 'App\Http\Controllers\PCController@updatepc');
    Route::get('delete-pc/{id}', 'App\Http\Controllers\PCController@destroypc');

    /* Front Contact Routes */
    Route::get(
        '/contactusfront/allcontacts',
        function () {
            return view('/contactusfront/allcontacts');
        }
    );
    Route::get(
        '/contactusfront/addcontact',
        function () {
            return view('/contactusfront/addcontact');
        }
    );
    Route::get('insertcontactfr', 'App\Http\Controllers\FrontContactController@insertproductform');
    Route::post('/createcontactfr', 'App\Http\Controllers\FrontContactController@insertcontactfr');
    Route::get('/contactusfront/allcontacts', 'App\Http\Controllers\FrontContactController@viewcontactfr');
    Route::get('view-contactfr/{id}', 'App\Http\Controllers\FrontContactController@viewcontactfrindetail');
    Route::get('edit-contactfr/{id}', 'App\Http\Controllers\FrontContactController@editcontactfr');
    Route::put('update-contactfr/{id}', 'App\Http\Controllers\FrontContactController@updatecontactfr');
    Route::get('delete-contactfr/{id}', 'App\Http\Controllers\FrontContactController@destroycontactfr');


    /* Our Team Routes */
    Route::get(
        '/ourteam/allteammembers',
        function () {
            return view('/ourteam/allteammembers');
        }
    );
    Route::get(
        '/ourteam/addourteam',
        function () {
            return view('/ourteam/addourteam');
        }
    );
    Route::get('insertteam', 'App\Http\Controllers\OurTeamController@insertteamform');
    Route::post('/createmember', 'App\Http\Controllers\OurTeamController@insertteam');
    Route::get('/ourteam/allteammembers', 'App\Http\Controllers\OurTeamController@viewteam');
    Route::get('view-team/{id}', 'App\Http\Controllers\OurTeamController@viewteamindetail');
    Route::get('edit-team/{id}', 'App\Http\Controllers\OurTeamController@editteam');
    Route::put('update-team/{id}', 'App\Http\Controllers\OurTeamController@updateteam');
    Route::get('delete-team/{id}', 'App\Http\Controllers\OurTeamController@destroyteam');

    /* Owner Routes */
    Route::get(
        '/owner/allowners',
        function () {
            return view('/owner/allowners');
        }
    );
    Route::get(
        '/owner/addowner',
        function () {
            return view('/owner/addowner');
        }
    );
    Route::get('insertowner', 'App\Http\Controllers\OwnerController@insertownerform');
    Route::post('/createowner', 'App\Http\Controllers\OwnerController@insertowner');
    Route::get('/owner/allowners', 'App\Http\Controllers\OwnerController@viewowner');
    Route::get('view-owner/{id}', 'App\Http\Controllers\OwnerController@viewownerindetail');
    Route::get('edit-owner/{id}', 'App\Http\Controllers\OwnerController@editowner');
    Route::put('update-owner/{id}', 'App\Http\Controllers\OwnerController@updateowner');
    Route::get('delete-owner/{id}', 'App\Http\Controllers\OwnerController@destroyowner');

    /* Video Routes */
    Route::get(
        '/webvideos/allvideos',
        function () {
            return view('/webvideos/allvideos');
        }
    );
    Route::get(
        '/webvideos/addvideo',
        function () {
            return view('/webvideos/addvideo');
        }
    );
    Route::get('insertvideo', 'App\Http\Controllers\VideoController@insertvideoform');
    Route::post('/creatvideo', 'App\Http\Controllers\VideoController@insertvideo');
    Route::get('/webvideos/allvideos', 'App\Http\Controllers\VideoController@viewvideo');
    Route::get('view-video/{id}', 'App\Http\Controllers\VideoController@viewvideoindetail');
    Route::get('edit-video/{id}', 'App\Http\Controllers\VideoController@editvideo');
    Route::put('update-video/{id}', 'App\Http\Controllers\VideoController@updatevideo');
    Route::get('delete-video/{id}', 'App\Http\Controllers\VideoController@destroyvideo');

    /* Review Routes */
    Route::get(
        '/reviews/allreviews',
        function () {
            return view('/reviews/allreviews');
        }
    );
    Route::get(
        '/reviews/addreview',
        function () {
            return view('/reviews/addreview');
        }
    );
    Route::get('insertreview', 'App\Http\Controllers\ReviewController@insertreviewform');
    Route::post('/createreview', 'App\Http\Controllers\ReviewController@insertreview');
    Route::get('/reviews/allreviews', 'App\Http\Controllers\ReviewController@viewreview');
    Route::get('view-review/{id}', 'App\Http\Controllers\ReviewController@viewreviewindetail');
    Route::get('edit-review/{id}', 'App\Http\Controllers\ReviewController@editreview');
    Route::put('update-review/{id}', 'App\Http\Controllers\ReviewController@updatereview');
    Route::get('delete-review/{id}', 'App\Http\Controllers\ReviewController@destroyreview');

    /* Client Routes */
    Route::get(
        '/clients/allclients',
        function () {
            return view('/clients/allclients');
        }
    );
    Route::get(
        '/clients/addclient',
        function () {
            return view('/clients/addclient');
        }
    );
    Route::get('insertclient', 'App\Http\Controllers\ClientsController@insertclientform');
    Route::post('/createclient', 'App\Http\Controllers\ClientsController@insertclient');
    Route::get('/clients/allclients', 'App\Http\Controllers\ClientsController@viewclient');
    Route::get('view-client/{id}', 'App\Http\Controllers\ClientsController@viewclientindetail');
    Route::get('edit-client/{id}', 'App\Http\Controllers\ClientsController@editclient');
    Route::put('update-client/{id}', 'App\Http\Controllers\ClientsController@updateclient');
    Route::get('delete-client/{id}', 'App\Http\Controllers\ClientsController@destroyclient');

    /* Slides Routes */
    Route::get(
        '/headertextslider/allslides',
        function () {
            return view('/headertextslider/allslides');
        }
    );
    Route::get(
        '/headertextslider/addslide',
        function () {
            return view('/headertextslider/addslide');
        }
    );
    Route::get('insertslide', 'App\Http\Controllers\SlideController@insertslideform');
    Route::post('/createslide', 'App\Http\Controllers\SlideController@insertslide');
    Route::get('/headertextslider/allslides', 'App\Http\Controllers\SlideController@viewslide');
    Route::get('view-slide/{id}', 'App\Http\Controllers\SlideController@viewslideindetail');
    Route::get('edit-slide/{id}', 'App\Http\Controllers\SlideController@editslide');
    Route::put('update-slide/{id}', 'App\Http\Controllers\SlideController@updateslide');
    Route::get('delete-slide/{id}', 'App\Http\Controllers\SlideController@destroyslide');

    //Route::post('/sendemail', 'App\Http\Controllers\MailController@sendemailcontroller');
    /* Ajax For Contact Form */
    Route::get('/ajaxform', 'App\Http\Controllers\MailController@sendemailcontroller');


    /* Franchise Routes */
    Route::get(
        '/franchise/allfranchise',
        function () {
            return view('/franchise/allfranchise');
        }
    );
    Route::get(
        '/franchise/addfranchise',
        function () {
            return view('/franchise/addfranchise');
        }
    );
    Route::get('insertfranchise', 'App\Http\Controllers\FranchiseController@insertfranchiseform');
    Route::post('/createfranchise', 'App\Http\Controllers\FranchiseController@insertfranchise');
    Route::get('/franchise/allfranchise', 'App\Http\Controllers\FranchiseController@viewfranchise');
    Route::get('view-franchise/{id}', 'App\Http\Controllers\FranchiseController@viewfranchiseindetail');
    Route::get('edit-franchise/{id}', 'App\Http\Controllers\FranchiseController@editfranchise');
    Route::put('update-franchise/{id}', 'App\Http\Controllers\FranchiseController@updatefranchise');
    Route::get('delete-franchise/{id}', 'App\Http\Controllers\FranchiseController@destroyfranchise');

    Route::get('view-franchise-orders/{id}', 'App\Http\Controllers\FranchiseController@viewfranchiseorders');


    /* Coupon Routes */
    Route::get(
        '/coupon/allcoupon',
        function () {
            return view('/coupon/allcoupon');
        }
    );
    Route::get(
        '/coupon/addcoupon',
        function () {
            return view('/coupon/addcoupon');
        }
    );
    Route::get('insertcoupon', 'App\Http\Controllers\CouponController@insertcouponform');
    Route::post('/createcoupon', 'App\Http\Controllers\CouponController@insertcoupon');
    Route::get('/coupon/allcoupon', 'App\Http\Controllers\CouponController@viewcoupon');
    Route::get('view-coupon/{id}', 'App\Http\Controllers\CouponController@viewcouponindetail');
    Route::get('edit-coupon/{id}', 'App\Http\Controllers\CouponController@editcoupon');
    Route::put('update-coupon/{id}', 'App\Http\Controllers\CouponController@updatecoupon');
    Route::get('delete-coupon/{id}', 'App\Http\Controllers\CouponController@destroycoupon');


    Route::get(
        '/orderoffline/addorderoffline',
        function () {
            return view('/orderoffline/addorderoffline');
        }
    );
    Route::get(
        '/orderoffline/allorderoffline',
        function () {
            return view('/orderoffline/allorderoffline');
        }
    );

    Route::get('/orderoffline/addorderoffline/{productid}', 'App\Http\Controllers\ProductController@getproductamount');
    Route::get('view-order/{id}', 'App\Http\Controllers\OrderController@vieworderindetail');

    Route::get('edit-order/{id}', 'App\Http\Controllers\OrderController@editorder');
    Route::put('update-order/{id}', 'App\Http\Controllers\OrderController@updateorder');
    Route::get('delete-order/{id}', 'App\Http\Controllers\OrderController@destroyorder');

});

Route::get('check-coupon-code', 'App\Http\Controllers\CouponController@checkCouponCode');
/* Order Routes */
Route::get('/ajaxform2', 'App\Http\Controllers\LeadController@insertLeadData');
Route::get('inserorder', 'App\Http\Controllers\OrderController@insertorderform');
Route::post('/createorder', 'App\Http\Controllers\OrderController@inserorder');

Route::get('/insert-order', 'App\Http\Controllers\OrderController@inserorder');

//Route::get('/paysuccess/?payment_id={payment_id}', 'App\Http\Controllers\OrderController@orderstatus');

Route::get(
    'paysuccess',
    function () {
        return view('frontwebsite/paysuccess');
    }
);
Route::get('check-email', 'App\Http\Controllers\FranchiseController@CheckEmail');

/* Cards Routes */
Route::get(
    '/userarea/allcards',
    function () {
        return view('/userarea/allcards');
    }
);
Route::get('view-card-details/{id}/{customstring}', 'App\Http\Controllers\CardController@viewcardindetail');
Route::get('edit-card/{id}', 'App\Http\Controllers\CardController@editcardindetail');
Route::put('update-card/{id}', 'App\Http\Controllers\CardController@updatecard');
Route::get('delete-image', 'App\Http\Controllers\CardController@DeleteImage');

Route::get('/downloadvcard/{id}', 'App\Http\Controllers\DownloadVcardController@downloadVcard');
Route::get('view-invoice/{id}', 'App\Http\Controllers\InvoiceController@viewinvoicedetail');
Route::get('print-invoice/{id}', 'App\Http\Controllers\InvoiceController@printinvoice');


/* User Routes */
Route::get(
    '/usermanagement/allusers',
    function () {
        return view('/usermanagement/allusers');
    }
);
Route::get('/usermanagement/allusers', 'App\Http\Controllers\UserController@viewusers');
Route::get('view-user/{id}', 'App\Http\Controllers\UserController@viewuserindetail');
Route::get('edit-user/{id}', 'App\Http\Controllers\UserController@edituser');
Route::put('update-user/{id}', 'App\Http\Controllers\UserController@updateuser');
Route::get('delete-user/{id}', 'App\Http\Controllers\UserController@destroyuser');