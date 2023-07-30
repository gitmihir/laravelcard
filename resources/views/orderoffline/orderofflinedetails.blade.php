@include('layout.partials.head')
@php
    $productname = explode(',', $order->product_name);
    $productprice = explode(',', $order->product_prices);
    $productquantity = explode(',', $order->product_quantities);
    $producttotalamount = explode(',', $order->product_prices);
    $productid = explode(',', $order->product_ids);
    $allarray = array_map(null, $productname, $productprice, $productquantity, $producttotalamount, $productid);
    $productselectquery = App\Models\Product::all();
    $shippingdata = App\Models\CMS::all();
@endphp
<section class="viewordersection">
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-6">
            <h3>
                View Order
            </h3>
        </div>
        <div class="col-md-6 float-right">
            <label>Order Status:</label>
            @if ($order->Order_status)
                {{ $order->Order_status }}
            @else
                {{ 'N/A' }}
            @endif
        </div>
    </div>
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="card">
            <div id="collapse-payment-address-1" class="panel-collapse checkout-box collapse show">
                <div class="card-body">
                    <div class="form-billing-details">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="form-check-label shippinglabel" for="form2Example3c">Billing Details</h5>
                                <hr>
                            </div>
                            @php
                                $createDate = new DateTime($order->created_at);
                                $strip = $createDate->format('d-m-Y');
                            @endphp
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>Order Date</label>
                                    <p>{{ $strip }}</p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>Business Name</label>
                                    <input type="text" name="sg_business_name" value="{{ $order->sg_business_name }}"
                                        placeholder="Business Name" required=""
                                        class="form-control sg_business_name" />
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" name="sg_full_name" value="{{ $order->sg_full_name }}"
                                        placeholder="Full Name" required="" class="form-control sg_full_name" />
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" placeholder="Address"
                                        value="{{ $order->sg_business_address }}" name="sg_business_address"
                                        required="" class="form-control sg_business_address" />
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>GSTIN NO</label>
                                    <input type="text" placeholder="GSTIN NO"
                                        value="{{ $order->sg_business_GST_number }}" name="sg_business_GST_number"
                                        required="" class="form-control sg_business_GST_number" />
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="sg_business_email"
                                        value="{{ $order->sg_business_email }}" placeholder="Email" required=""
                                        class="form-control sg_business_email" />
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" name="sg_business_phone"
                                        value="{{ $order->sg_business_phone }}" placeholder="Phone Number"
                                        required="" class="form-control sg_business_phone" />
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>State</label>
                                    <input type="text" name="sg_state" value="{{ $order->sg_state }}" required=""
                                        class="form-control sg_state" />
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="form-check-label shippinglabel" for="form2Example3c">
                                            Shipping Details
                                        </h5>
                                        <hr>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" value="{{ $order->sg_s_name }}" name="sg_s_name"
                                        placeholder="First Name" required="" class="form-control sg_s_name" />
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" value="{{ $order->sg_s_address }}" placeholder="Address"
                                        name="sg_s_address" required="" class="form-control sg_s_address" />
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" value="{{ $order->sg_s_email }}" placeholder="Email"
                                        name="sg_s_email" required="" class="form-control sg_s_email" />
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" value="{{ $order->sg_s_phone }}" name="sg_s_phone"
                                        placeholder="Phone Number" required="" class="form-control sg_s_phone" />
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>State</label>
                                    <input type="text" name="sg_s_state" value="{{ $order->sg_s_state }}"
                                        required="" class="form-control sg_s_state" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="payment_remark">Payment Remark</label>
                                <input type="text" id="payment_remark" name="payment_remark"
                                    value="{{ $order->payment_remark }}" placeholder="Payment Remark"
                                    class="form-control payment_remark" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="Order_status">Order Status</label>
                                <div class="form-group">
                                    <input type="text" id="payment_remark" value="{{ $order->Order_status }}"
                                        placeholder="Payment Remark" class="form-control payment_remark" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="parentchild">
                        <table class="table">
                            <tr>
                                <td><label for="product_price">No.</label></td>
                                <td><label for="product_price">Product</label></td>
                                <td><label for="product_price">Price</label></td>
                                <td><label for="product_quantity">Quantity</label></td>
                                <td><label for="product_total_amount">Sub Total</label></td>
                            </tr>
                            @php $dri = 1; @endphp
                            @foreach ($allarray as $arraydata)
                                @php
                                    $productname = App\Models\Product::where('product_main_id', $arraydata[4])->first();
                                @endphp
                                <tr class="parentchild">
                                    <td>{{ $dri }}</td>
                                    <td>{{ $productname->product_name }}</td>
                                    <td>{{ $productname->product_list_price }}</td>
                                    <td>{{ $arraydata[2] }}</td>
                                    <td>{{ $arraydata[3] }}</td>
                                </tr>
                                @php $dri++ @endphp
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-6"></div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="messageblock">Please enter coupon code!</div>
                        <div class="successblock">Coupon code matched!</div>
                        <div class="failureblock">Coupon code does not Match! Please try different coupon
                            code
                        </div>
                        <div class="double-ringed"></div>
                    </div>
                    <div class="col-md-12">
                        <strong>Shopping Bill
                        </strong>
                        <table class="table">
                            <tr>
                                <th align="left">Price Total</th>
                                <td align="right">
                                    <input type="text" name="bill_amount" readonly class="bill_amount custominput"
                                        value="{{ $order->before_discount_total }}">&#8377;
                                </td>
                            </tr>
                            <tr>
                                <th align="left">Discount</th>
                                <td align="right">
                                    <input type="text" name="discounted_price"
                                        value="{{ $order->discounted_price }}" readonly
                                        class="discounted_price custominput">&#8377;
                                </td>
                            </tr>
                            <tr>
                                <th align="left">After Discount Price</th>
                                <td align="right">
                                    <input type="text" name="sg_order_base_price" readonly
                                        class="sg_order_base_price custominput"
                                        value="{{ $order->sg_order_base_price }}">&#8377;
                                </td>
                            </tr>

                            <tr class="sg_CGST_class">
                                <th align="left">CGST @ 9%</th>
                                <td align="right">
                                    <input type="text" name="sg_CGST" readonly class="sg_CGST custominput"
                                        value="{{ $order->sg_CGST }}">&#8377;
                                </td>
                            </tr>
                            <tr class="sg_SGST_class">
                                <th align="left">SGST @ 9%</th>
                                <td align="right">
                                    <input type="text" name="sg_SGST" readonly class="sg_SGST custominput"
                                        value="{{ $order->sg_SGST }}">&#8377;
                                </td>
                            </tr>

                            <tr class="sg_IGST_class">
                                <th align="left">IGST @ 18%</th>
                                <td align="right">
                                    <input type="text" name="sg_IGST" readonly class="sg_IGST custominput"
                                        value="{{ $order->sg_IGST }}">&#8377;
                                </td>
                            </tr>
                            <tr>
                                <th align="left">Grand Total</th>
                                <td align="right">
                                    <input type="text" name="after_discount_total" readonly
                                        class="custominput after_discount_total"
                                        value="{{ $order->after_discount_total }}">&#8377;
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-12">
            @if (Auth::user()->user_role === 'franchiseuser')
                @php
                    $id = App\Models\Franchise::where('sg_franchise_email', Auth::user()->email)->first()->id;
                @endphp
                <a href="{{ url('/view-franchise-orders/' . $id) }}" type="button" class="btn btn-info">Cancel</a>
            @else
                <a href="{{ url('/orderoffline/allorderoffline') }}" type="button" class="btn btn-info">Cancel</a>
                <a href="{{ url('/view-invoice/' . $order->id) }}" type="button" class="btn btn-info">View
                    Invoice</a>
            @endif
        </div>
    </div>
</section>
@include('layout.partials.footer')
<script>
    $("input, select").attr("disabled", "disabled");
</script>
