@include('layout.partials.head')
@if (Auth::user()->user_role === 'normaluser')
    @php
        //$viewallorder = App\Models\Order::where('sg_business_email', Auth::user()->email)->get();
        
        $viewallorder = App\Models\Order::where('sg_business_email', '=', Auth::user()->email)
            ->orderBy('id', 'DESC')
            ->get();
    @endphp
@else
    @php
        $viewallorder = App\Models\Order::orderBy('id', 'desc')->get();
    @endphp
@endif

<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-6">
        <h3>All Orders</h3>
    </div>
    <div class="col-md-6 text-right">
        @if (Auth::user()->user_role === 'normaluser')
        @else
            <a href="{{ url('/orderoffline/addorderoffline') }}" class="btn btn-primary btn-sm">Add Order</a>
        @endif

    </div>
</div>
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-12">
        <table id="example0" data-order='[[ 0, "desc" ]]' class="table table-bordered table-hover dataTable dtr-inline">
            <thead>
                <tr>
                    <th>Invoice No.</th>
                    <th>Order Id</th>
                    <th>Order Date</th>
                    <th>Full Name</th>
                    <th>Total</th>
                    <th>Order Status</th>
                    <th>Franchise</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($viewallorder as $orderdata)
                    <tr>
                        <td>{{ $orderdata->id }}</td>
                        <td>{{ $orderdata->order_id_for_status }}</td>
                        <td>
                            @php
                                $createDate = new DateTime($orderdata->created_at);
                                $strip = $createDate->format('d-m-Y');
                            @endphp
                            {{ $strip }}</td>
                        <td>{{ $orderdata->sg_full_name }}</td>
                        <td>{{ $orderdata->after_discount_total }}</td>
                        <td>{{ $orderdata->Order_status }}</td>
                        <td>
                            @php
                                
                                if (empty($orderdata->franchise_ID)) {
                                    echo 'kessr';
                                } else {
                                    $productname = App\Models\Franchise::where('id', $orderdata->franchise_ID)->first();
                                    echo $productname->sg_franchise_name;
                                }
                            @endphp
                        </td>
                        <td>
                            <a href="{{ url('view-order/' . $orderdata->id) }}" class="btn btn-info btn-sm"><i
                                    class="fas fa-eye"></i></a>
                            @if (Auth::user()->user_role === 'normaluser')
                            @else
                                <a href="{{ url('edit-order/' . $orderdata->id) }}" class="btn btn-primary btn-sm"><i
                                        class="far fa-edit"></i></a>
                                <button type="button"
                                    delete-url-id='{{ url('delete-order/' . $orderdata->id . '/' . $orderdata->order_id_for_status) }}'
                                    class="btn btn-danger btn-sm deletecardorder" data-toggle="modal"
                                    data-target="#modaldeletecardorder">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            @endif

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('layout.partials.footer')
