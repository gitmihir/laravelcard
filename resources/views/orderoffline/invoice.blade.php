@include('layout.partials.head')

@php
    $brand = App\Models\Brand::all();
    $shippingdata = App\Models\CMS::all();
    $productname = explode(',', $invoicedata->product_name);
    $productprice = explode(',', $invoicedata->product_prices);
    $productquantity = explode(',', $invoicedata->product_quantities);
    $producttotalamount = explode(',', $invoicedata->product_prices);
    $productid = explode(',', $invoicedata->product_ids);
    $productselectquery = App\Models\Product::all();
    $allarray = array_map(null, $productname, $productprice, $productquantity, $producttotalamount, $productid);
@endphp
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="invoice p-3 mb-3">
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4">
                            <h3 class="text-center">INVOICE</h3>
                        </div>
                        <div class="col-4"></div>
                    </div>
                    @foreach ($brand as $branddata)
                        <div class="row">
                            <div class="col-6">
                                <div class="logoinvoinceimage">
                                    <img src="{{ asset('images/brandimages/' . $branddata->sg_brand_business_logo) }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <h4><small class="float-right">Date:{{ date('d-m-Y') }}</small></h4>
                            </div>
                        </div>
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                From
                                <address>
                                    <strong>{{ $branddata->sg_brand_business_name }}</strong><br>
                                    {{ $branddata->sg_brand_business_address }}<br>
                                    Phone: {{ $branddata->sg_brand_busienss_phone }}<br>
                                    Email: {{ $branddata->sg_brand_business_email }}<br>
                                    GSTIN: {{ $branddata->sg_gstin }}
                                </address>
                            </div>
                    @endforeach
                    <div class="col-sm-4 invoice-col">
                        To
                        <address>
                            <strong>{{ $invoicedata->sg_business_name }}</strong><br>
                            {{ $invoicedata->sg_business_address }}<br>
                            {{ $invoicedata->sg_state }}<br>
                            Phone: {{ $invoicedata->sg_business_phone }}<br>
                            Email: {{ $invoicedata->sg_business_email }}<br>
                            GSTIN: {{ $invoicedata->sg_business_GST_number }}<br>
                        </address>
                    </div>
                    @php
                        $createDate = new DateTime($invoicedata->created_at);
                        $strip = $createDate->format('d-m-Y');
                    @endphp
                    <div class="col-sm-4 invoice-col">
                        <b>Invoice: #007612</b><br>
                        <b>Order Date: {{ $strip }}</b><br>
                        <b>Order ID:</b> 4F3S8J<br>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Product</th>
                                    <th>HSN / SAC</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Sub Total</th>
                                </tr>
                            </thead>
                            @php $dri = 1; @endphp

                            @foreach ($allarray as $arraydata)
                                @php
                                    $productname = App\Models\Product::where('product_main_id', $arraydata[4])->first();
                                @endphp
                                <td>{{ $dri }}</td>
                                <td>{{ $productname->product_name }}</td>
                                <td>{{ $productname->product_hsnsac }}</td>
                                <td>{{ $productname->product_list_price }}</td>
                                <td>{{ $arraydata[2] }}</td>
                                <td>{{ $arraydata[3] }}</td>
                                </tr>
                                @php $dri++ @endphp
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                    </div>
                    <div class="col-6">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th align="left">Price Total</th>
                                    <td align="right">
                                        <input type="text" name="bill_amount" readonly
                                            class="bill_amount custominput"
                                            value="{{ $invoicedata->before_discount_total }}">&#8377;
                                    </td>
                                </tr>
                                <tr>
                                    <th align="left">Discount</th>
                                    <td align="right">
                                        <input type="text" name="discounted_price"
                                            value="{{ $invoicedata->discounted_price }}" readonly
                                            class="discounted_price custominput">&#8377;
                                    </td>
                                </tr>
                                <tr>
                                    <th align="left">After Discount Price</th>
                                    <td align="right">
                                        <input type="text" name="sg_order_base_price" readonly
                                            class="sg_order_base_price custominput"
                                            value="{{ $invoicedata->sg_order_base_price }}">&#8377;
                                    </td>
                                </tr>
                                @if ($invoicedata->sg_state === 'Gujarat')
                                    <tr class="sg_CGST_classd">
                                        <th align="left">CGST @ 9%</th>
                                        <td align="right">
                                            <input type="text" name="sg_CGST" readonly class="sg_CGST custominput"
                                                value="{{ $invoicedata->sg_CGST }}">&#8377;
                                        </td>
                                    </tr>
                                    <tr class="sg_SGST_classd">
                                        <th align="left">SGST @ 9%</th>
                                        <td align="right">
                                            <input type="text" name="sg_SGST" readonly class="sg_SGST custominput"
                                                value="{{ $invoicedata->sg_SGST }}">&#8377;
                                        </td>
                                    </tr>
                                @else
                                    <tr class="sg_IGST_classd">
                                        <th align="left">IGST @ 18%</th>
                                        <td align="right">
                                            <input type="text" name="sg_IGST" readonly class="sg_IGST custominput"
                                                value="{{ $invoicedata->sg_IGST }}">&#8377;
                                        </td>
                                    </tr>
                                @endif
                                <tr>
                                    <th align="left">Grand Total</th>
                                    <td align="right">
                                        <input type="text" name="after_discount_total" readonly
                                            class="custominput after_discount_total"
                                            value="{{ $invoicedata->after_discount_total }}">&#8377;
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label>Terms & Condition:</label>
                        @foreach ($brand as $branddata)
                            <p>{{ $branddata->sg_brand_tandc_line }}</p>
                        @endforeach
                    </div>
                </div>
                <div class="row no-print">
                    <div class="col-12">
                        <a href="{{ url('/print-invoice/' . $invoicedata->id) }}" rel="noopener" target="_blank"
                            class="btn btn-primary btn-sm"><i class="fas fa-print"></i> Print</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('layout.partials.footer')
