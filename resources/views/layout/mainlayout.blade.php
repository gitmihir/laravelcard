@include('layout.partials.head')
@php
    $current_date = date('Y-m-d');
    $current_month = date('m');
    $current_year = date('Y');
    $couponcode = DB::table('sg_coupon_code')
        ->select('sg_coupon_code', 'id')
        ->where('id', Auth::user()->id)
        ->get();
    $codedisplay = [];
    foreach ($couponcode as $code) {
        $codedisplay = $code->sg_coupon_code;
    }
    print_r($codedisplay);
    /* Admin Query */
    if (Auth::user()->user_role === 'super_admin') {
        $organicsales_today = DB::table('sg_order')
            ->select('sg_total_product_count', 'return_coupon_code', 'created_at')
            ->where(DB::raw("(DATE_FORMAT(created_at,'%Y-%m-%d'))"), $current_date)
            ->where('return_coupon_code', '')
            ->get()
            ->sum('sg_total_product_count');
        $organicsales_month = DB::table('sg_order')
            ->select('sg_total_product_count', 'return_coupon_code', 'created_at')
            ->where(DB::raw("(DATE_FORMAT(created_at,'%m'))"), $current_month)
            ->where('return_coupon_code', '')
            ->get()
            ->sum('sg_total_product_count');
        $organicsales_yearly = DB::table('sg_order')
            ->select('sg_total_product_count', 'return_coupon_code', 'created_at')
            ->where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"), $current_year)
            ->where('return_coupon_code', '')
            ->get()
            ->sum('sg_total_product_count');
        $franchise_today = DB::table('sg_order')
            ->select('sg_total_product_count', 'return_coupon_code', 'created_at')
            ->where(DB::raw("(DATE_FORMAT(created_at,'%Y-%m-%d'))"), $current_date)
            ->where('return_coupon_code', '!=', '')
            ->get()
            ->sum('sg_total_product_count');
        $franchise_month = DB::table('sg_order')
            ->select('sg_total_product_count', 'return_coupon_code', 'created_at')
            ->where(DB::raw("(DATE_FORMAT(created_at,'%m'))"), $current_month)
            ->where('return_coupon_code', '!=', '')
            ->get()
            ->sum('sg_total_product_count');
        $franchise_yearly = DB::table('sg_order')
            ->select('sg_total_product_count', 'return_coupon_code', 'created_at')
            ->where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"), $current_year)
            ->where('return_coupon_code', '!=', '')
            ->get()
            ->sum('sg_total_product_count');
        /* Franchise User Query */
    } elseif (Auth::user()->user_role === 'franchiseuser') {
        $franchise_user_today = DB::table('sg_order')
            ->select('sg_total_product_count', 'return_coupon_code', 'created_at', 'sg_business_email')
            ->where(DB::raw("(DATE_FORMAT(created_at,'%Y-%m-%d'))"), $current_date)
            ->where('return_coupon_code', $codedisplay)
            ->where('sg_business_email', Auth::user()->email)
            ->get()
            ->sum('sg_total_product_count');
        $franchise_user_month = DB::table('sg_order')
            ->select('sg_total_product_count', 'return_coupon_code', 'created_at', 'sg_business_email')
            ->where(DB::raw("(DATE_FORMAT(created_at,'%m'))"), $current_month)
            ->where('return_coupon_code', $codedisplay)
            ->where('sg_business_email', Auth::user()->email)
            ->get()
            ->sum('sg_total_product_count');
        $franchise_user_yearly = DB::table('sg_order')
            ->select('sg_total_product_count', 'return_coupon_code', 'created_at', 'sg_business_email')
            ->where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"), $current_year)
            ->where('return_coupon_code', $codedisplay)
            ->where('sg_business_email', Auth::user()->email)
            ->get()
            ->sum('sg_total_product_count');
        /* Normal User Query */
    } elseif (Auth::user()->user_role === 'normaluser') {
        $users_today = DB::table('sg_order')
            ->select('sg_total_product_count', 'return_coupon_code', 'created_at', 'sg_business_email')
            ->where(DB::raw("(DATE_FORMAT(created_at,'%Y-%m-%d'))"), $current_date)
            ->where('sg_business_email', Auth::user()->email)
            ->get()
            ->sum('sg_total_product_count');
        $users_month = DB::table('sg_order')
            ->select('sg_total_product_count', 'return_coupon_code', 'created_at', 'sg_business_email')
            ->where(DB::raw("(DATE_FORMAT(created_at,'%m'))"), $current_month)
            ->where('sg_business_email', Auth::user()->email)
            ->get()
            ->sum('sg_total_product_count');
        $users_yearly = DB::table('sg_order')
            ->select('sg_total_product_count', 'return_coupon_code', 'created_at', 'sg_business_email')
            ->where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"), $current_year)
            ->where('sg_business_email', Auth::user()->email)
            ->get()
            ->sum('sg_total_product_count');
    }
@endphp
<section class="content">
    <div class="container-fluid">
        @if (Auth::user()->user_role === 'super_admin')
            <div class="row">
                <div class="col-sm-12 mb-2">
                    <h1 class="m-0">Organic sales</h1>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $organicsales_today }}</h3>
                            <p>Today's card sale</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $organicsales_month }}</h3>
                            <p>Monthly card sale</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $organicsales_yearly }}</h3>
                            <p>Yearly card sales</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 mb-2">
                    <h1 class="m-0">Franchise card sales</h1>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $franchise_today }}</h3>
                            <p>Today's card sale</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $franchise_month }}</h3>
                            <p>Monthly card sale</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $franchise_yearly }}</h3>
                            <p>Yearly card sales</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                </div>
            </div>
        @elseif(Auth::user()->user_role === 'franchiseuser')
            <div class="row">
                <div class="col-sm-12 mb-2">
                    <h1 class="m-0">Franchise card sales</h1>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $franchise_user_today }}</h3>
                            <p>Today's card sale</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $franchise_user_month }}</h3>
                            <p>Monthly card sale</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $franchise_user_yearly }}</h3>
                            <p>Yearly card sales</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                </div>
            </div>
        @elseif(Auth::user()->user_role === 'normaluser')
            <div class="row">
                <div class="col-sm-12 mb-2">
                    <h1 class="m-0">User card sales</h1>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $users_today }}</h3>
                            <p>Today's card sale</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $users_month }}</h3>
                            <p>Monthly card sale</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $users_yearly }}</h3>
                            <p>Yearly card sales</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
@include('layout.partials.footer')
