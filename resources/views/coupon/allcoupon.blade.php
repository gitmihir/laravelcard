@include('layout.partials.head')

<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-6">
        <h3>Franchise</h3>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{ url('/coupon/addcoupon') }}" class="btn btn-primary btn-sm">Add Coupon</a>
    </div>
</div>
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-12">
        <table id="example1" class="table table-bordered table-hover dataTable dtr-inline">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Franchise</th>
                    <th>Coupon code</th>
                    <th>Coupon discount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1 @endphp
                @foreach ($viewcoupon as $coupondata)
                    @php
                        $franchise = App\Models\Franchise::find($coupondata->sg_franchise_id);
                    @endphp
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $franchise->sg_franchise_name }}</td>
                        <td>{{ $coupondata->sg_coupon_code }}</td>
                        <td>{{ $coupondata->sg_coupon_discount }}</td>
                        <td>
                            <a href="{{ url('view-coupon/' . $coupondata->id) }}" class="btn btn-info btn-sm"><i
                                    class="fas fa-eye"></i></a>
                            <a href="{{ url('edit-coupon/' . $coupondata->id) }}" class="btn btn-primary btn-sm"><i
                                    class="far fa-edit"></i></a>
                            <button type="button" delete-url-id='{{ url('delete-coupon/' . $coupondata->id) }}'
                                class="btn btn-danger btn-sm deletemodal" data-toggle="modal"
                                data-target="#modaldelete">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                    @php $i++ @endphp
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@include('layout.partials.footer')
