@include('layout.partials.head')
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-6">
        <h3>All Franchise Orders</h3>
    </div>
</div>
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-12">
        <table id="example1" data-order='[[ 0, "desc" ]]' class="table table-bordered table-hover dataTable dtr-inline">
            <thead>
                <tr>
                    <th>Order Id</th>
                    <th>Full Name</th>
                    <th>Total</th>
                    <th>Order Status</th>
                    <th>Franchise</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($viewfranchiseorders as $orderdata)
                    <tr>
                        <td>{{ $orderdata->id }}</td>
                        <td>{{ $orderdata->sg_full_name }}</td>
                        <td>{{ $orderdata->after_discount_total }}</td>
                        <td>
                            @php
                                if ($orderdata->sg_order_status == '0') {
                                    echo 'Not Completed';
                                } else {
                                    echo 'Completed';
                                }
                            @endphp
                        </td>
                        <td>
                            @php
                                
                                if (empty($orderdata->franchise_ID)) {
                                    echo 'NA';
                                } else {
                                    $productname = App\Models\Franchise::where('id', $orderdata->franchise_ID)->first();
                                    echo $productname->sg_franchise_name;
                                }
                            @endphp
                        </td>
                        <td>
                            <a href="{{ url('view-order/' . $orderdata->id) }}" class="btn btn-info btn-sm"><i
                                    class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@include('layout.partials.footer')
