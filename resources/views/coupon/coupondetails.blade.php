@include('layout.partials.head')
@php
    $franchise = DB::table('sg_franchise')
        ->where('id', $viewcouponindetail->sg_franchise_id)
        ->first();
@endphp
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-12">
        <h3>
            Coupon Details
        </h3>
    </div>
    <div class="col-md-8">
        <table class="table">
            <tr>
                <th>Franchise</th>
                <td>{{ $franchise->sg_franchise_name }}</td>
            </tr>
            <tr>
                <th>Coupon Code</th>
                <td>{{ $viewcouponindetail->sg_coupon_code }}
                </td>
            </tr>
            <tr>
                <th>Coupon Discount</th>
                <td>{{ $viewcouponindetail->sg_coupon_discount }}</td>
            </tr>
        </table>
        <a href="{{ url('/coupon/allcoupon') }}" type="button" class="btn btn-info">Back</a>
    </div>
</div>
@include('layout.partials.footer')
