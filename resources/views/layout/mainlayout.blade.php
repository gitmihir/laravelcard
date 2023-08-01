@include('layout.partials.head')


@php
    
    // $organicsalesq = DB::select("SELECT SUM(sg_total_product_count) AS totalcount, DATE_FORMAT(created_at, '%Y-%m-%d') AS currentdate FROM sg_order WHERE `return_coupon_code` IS NULL OR return_coupon_code = ' ' AND DATE_FORMAT(created_at, '%Y-%m-%d') = " . CURDATE());
    
    $organicsales = App\Models\Order::select('sg_total_product_count', 'created_at')
        ->where('return_coupon_code', null)
        ->where(DB::raw("(DATE_FORMAT(created_at,'%Y-%m-%d'))"), date('Y-m-d'))
        ->get()
        ->sum('sg_total_product_count');
    echo '<pre>';
    print_r($organicsales);
    echo '</pre>';
@endphp

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 mb-2">
                <h1 class="m-0">Organic sales</h1>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>150</h3>
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
                        <h3>53<sup style="font-size: 20px">%</sup></h3>
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
                        <h3>44</h3>
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
                        <h3>150</h3>
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
                        <h3>53<sup style="font-size: 20px">%</sup></h3>
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
                        <h3>44</h3>
                        <p>Yearly card sales</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('layout.partials.footer')
