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
<form action="{{ url('update-order/' . $order->id) }}" method="POST" class="form-group">
    @csrf
    @method('PUT')
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-12">
            <h3>
                Edit Order
            </h3>
        </div>
    </div>
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="card">
            <div id="collapse-payment-address-1" class="panel-collapse checkout-box collapse show">
                <div class="card-body">
                    <div class="form-billing-details">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="form-check-label shippinglabel" for="form2Example3c">
                                    Billing Details
                                </h5>
                                <hr>
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
                                        value="{{ $order->sg_business_email }}" placeholder="Email" readonly
                                        required="" class="form-control sg_business_email" />
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
                                    <div class="form-group">
                                        <label>State</label>
                                        <input type="text" name="sg_state" value="{{ $order->sg_state }}"
                                            placeholder="Email" readonly required="" class="form-control sg_state" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h5 class="form-check-label shippinglabel" for="form2Example3c">
                                            Shipping Details
                                        </h5>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input me-2 sameasbilling" type="checkbox"
                                                value="" id="sameasbilling" />
                                            <label class="form-check-label" for="sameasbilling">
                                                Same as billing
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>Business Name</label>
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
                                    <select name="sg_s_state" id="sg_s_state" class="form-control sg_s_state">
                                        <option value="{{ $order->sg_s_state }}">{{ $order->sg_s_state }}</option>
                                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands
                                        </option>
                                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                        <option value="Assam">Assam</option>
                                        <option value="Bihar">Bihar</option>
                                        <option value="Chandigarh">Chandigarh</option>
                                        <option value="Chhattisgarh">Chhattisgarh</option>
                                        <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                        <option value="Daman and Diu">Daman and Diu</option>
                                        <option value="Delhi">Delhi</option>
                                        <option value="Lakshadweep">Lakshadweep</option>
                                        <option value="Puducherry">Puducherry</option>
                                        <option value="Goa">Goa</option>
                                        <option value="Gujarat">Gujarat</option>
                                        <option value="Haryana">Haryana</option>
                                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                        <option value="Jharkhand">Jharkhand</option>
                                        <option value="Karnataka">Karnataka</option>
                                        <option value="Kerala">Kerala</option>
                                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                                        <option value="Maharashtra">Maharashtra</option>
                                        <option value="Manipur">Manipur</option>
                                        <option value="Meghalaya">Meghalaya</option>
                                        <option value="Mizoram">Mizoram</option>
                                        <option value="Nagaland">Nagaland</option>
                                        <option value="Odisha">Odisha</option>
                                        <option value="Punjab">Punjab</option>
                                        <option value="Rajasthan">Rajasthan</option>
                                        <option value="Sikkim">Sikkim</option>
                                        <option value="Tamil Nadu">Tamil Nadu</option>
                                        <option value="Telangana">Telangana</option>
                                        <option value="Tripura">Tripura</option>
                                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                                        <option value="Uttarakhand">Uttarakhand</option>
                                        <option value="West Bengal">West Bengal</option>
                                    </select>
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
                                    value="{{ $order->payment_remark }}" placeholder="Payment Remark" required=""
                                    class="form-control payment_remark" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="Order_status">Order Status</label>
                                <div class="form-group">
                                    <select name="Order_status" id="Order_status" class="form-control Order_status">
                                        <option value="{{ $order->Order_status }}">{{ $order->Order_status }}
                                        </option>
                                        <option value="Order placed">Order placed</option>
                                        <option value="Card Under design">Card under design</option>
                                        <option value="Card is ready to dispatch">Card is ready to dispatch</option>
                                        <option value="In transit">In transit</option>
                                        <option value="Out for delivery">Out for delivery</option>
                                        <option value="Delivered">Delivered</option>
                                    </select>
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
            {{-- <button type="button" class="btn btn-primary add_more_products"><i class="fas fa-plus-square"></i> Click
                to
                add
                more products</button> --}}
        </div>
        <div class="col-md-12">
            <div class="parentchild">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td><label for="product_price">No.</label></td>
                                <td><label for="product_price">Select Product</label></td>
                                <td><label for="product_price">Price</label></td>
                                <td><label for="product_quantity">Quantity</label></td>
                                <td><label for="product_total_amount">Sub Total</label></td>
                                {{-- <td><label for="product_quantity">Add More / Remove</label></td> --}}
                            </tr>
                            @php $dri = 1; @endphp
                            @foreach ($allarray as $arraydata)
                                @php
                                    $productname = App\Models\Product::where('product_main_id', $arraydata[4])->first();
                                @endphp
                                <tr class="parentchild edit">
                                    <td>{{ $dri }}</td>
                                    <td>
                                        <input type="hidden" name="product_name[]"
                                            value="{{ $productname->product_main_id }}">
                                        <input type="text" readonly class="form-control"
                                            value="{{ $productname->product_name }}">
                                        {{-- <select readonly name="product_name[]" class="form-control product_name"
                                            data-row-id='{{ $dri }}'>
                                            <option
                                                product-url="{{ url('/orderoffline/addorderoffline/' . $arraydata[4]) }}"
                                                value="{{ $productname->product_main_id }}">
                                                {{ $productname->product_name }}
                                            </option>
                                        </select> --}}
                                    </td>
                                    <td>
                                        <input type="text" name="product_list_price[]"
                                            value="{{ $productname->product_list_price }}"
                                            class="form-control product_price" readonly>
                                    </td>
                                    <td>
                                        <input readonly type="number" min="1" name="product_quantity[]"
                                            class="form-control product_quantity_edit-{{ $dri }}"
                                            data-row-id="{{ $dri }}" value="{{ $arraydata[2] }}">
                                    </td>
                                    <td>
                                        <input type="text" name="product_total_amount[]"
                                            class="form-control product_total_amount_edit-{{ $dri }}"
                                            data-row-id="{{ $dri }}" readonly value="{{ $arraydata[3] }}">
                                    </td>
                                    {{-- <td><button type="button" class="btn btn-danger remove_product_from_edit"><i
                                        class="fas fa-minus-square"></i></button></td> --}}
                                </tr>
                                @php $dri++ @endphp
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="field_wrapper edit"></div>
        </div>
    </div>
    <div class="row mb-3 ml-3 mr-3 mt-3">
        <div class="col-md-6"></div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Checkout</div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control coupon_code"
                                    value="{{ $order->return_coupon_code }}" disabled name="coupon_code"
                                    placeholder="Apply Coupon Code" />
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-secondary disabled coupon_code_check"
                                        type="button">
                                        Apply
                                    </button>
                                </div>
                            </div>
                        </div>
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
            <input type="hidden" class="order_id_for_status" name="order_id_for_status"
                value="{{ $order->order_id_for_status }}">
            <input type="hidden" value="{{ url('check-coupon-code') }}" class="couponcheckurl">
            <input type="hidden" class="coupon_ID" name="coupon_ID" value="{{ $order->coupon_ID }}">
            <input type="hidden" class="franchise_ID" name="franchise_ID" value="{{ $order->franchise_ID }}">
            <input type="hidden" class="return_coupon_code" name="return_coupon_code"
                value="{{ $order->return_coupon_code }}">
            <input type="hidden" class="coupon_discount" name="coupon_discount"
                value="{{ $order->coupon_discount }}">
            <input type="hidden" class="shipping_fee" name="shipping_fee" value="{{ $order->shipping_fee }}">
            <input type="hidden" class="before_discount_total" name="before_discount_total"
                value="{{ $order->before_discount_total }}">
            <input type="hidden" class="discounted_price" name="discounted_price"
                value="{{ $order->discounted_price }}">
            <input type="hidden" value="{{ url('insert-order') }}" class="ajaxurlforofforder">
            <button type="sumit" class="btn btn-primary">Submit</button>
            <a href="{{ url('/orderoffline/allorderoffline') }}" type="button" class="btn btn-info">Cancel</a>
        </div>
    </div>
</form>
@include('layout.partials.footer')
@include('orderoffline.orderofflinescripts')
