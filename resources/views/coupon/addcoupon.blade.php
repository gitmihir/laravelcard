@include('layout.partials.head')
@php
    $allfranchise = App\Models\Franchise::all();
@endphp
<form action="/createcoupon" method="POST" enctype="multipart/form-data" class="form-group">
    @csrf
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-12">
            <h3>
                Add Coupon
            </h3>
        </div>
        <div class="col-md-6">
            <label for="sg_franchise_id">Franchise</label>
            <select id="sg_franchise_id" class="form-control" name="sg_franchise_id">
                <option value="">Select Franchise</option>
                @foreach ($allfranchise as $franchisedata)
                    <option value="{{ $franchisedata->id }}">{{ $franchisedata->sg_franchise_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_coupon_code">Coupon code</label>
                <input id="sg_coupon_code" name="sg_coupon_code" type="text" required="required"
                    class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sg_coupon_discount">Coupon discount</label>
                <input id="sg_coupon_discount" name="sg_coupon_discount" type="text" required="required"
                    class="form-control">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ url('/coupon/allcoupon') }}" type="button" class="btn btn-info">Cancel</a>
            </div>
        </div>
    </div>
</form>

@include('layout.partials.footer')
