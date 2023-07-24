<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('/assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/dist/css/adminlte.min.css') }}">
</head>

<body>
    <div class="wrapper">
        @php
            $brand = App\Models\Brand::all();
            $shippingdata = App\Models\CMS::all();
            $productname = explode(',', $printinvoice->product_name);
            $productprice = explode(',', $printinvoice->product_prices);
            $productquantity = explode(',', $printinvoice->product_quantities);
            $producttotalamount = explode(',', $printinvoice->product_prices);
            $productid = explode(',', $printinvoice->product_ids);
            $productselectquery = App\Models\Product::all();
            $allarray = array_map(null, $productname, $productprice, $productquantity, $producttotalamount, $productid);
        @endphp
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="invoice p-3 mb-3">
                            @foreach ($brand as $branddata)
                                <div class="row">
                                    <div class="col-6">
                                        <div class="logoinvoinceimage">
                                            <img src="{{ asset('images/brandimages/' . $branddata->sg_brand_business_logo) }}"
                                                style="width: 200px;
                                                height: 150px;">
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
                                    <strong>{{ $printinvoice->sg_business_name }}</strong><br>
                                    {{ $printinvoice->sg_business_address }}<br>
                                    {{ $printinvoice->sg_state }}<br>
                                    Phone: {{ $printinvoice->sg_business_phone }}<br>
                                    Email: {{ $printinvoice->sg_business_email }}<br>
                                    GSTIN: {{ $printinvoice->sg_business_GST_number }}<br>
                                </address>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                <b>Invoice #007612</b><br>
                                <br>
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
                            <div class="col-6"></div>
                            <div class="col-6">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th align="left">Price Total</th>
                                            <td align="right">{{ $printinvoice->before_discount_total }}&#8377;</td>
                                        </tr>
                                        <tr>
                                            <th align="left">Discount</th>
                                            <td align="right">{{ $printinvoice->discounted_price }}&#8377;</td>
                                        </tr>
                                        <tr>
                                            <th align="left">After Discount Price</th>
                                            <td align="right">{{ $printinvoice->sg_order_base_price }}&#8377;</td>
                                        </tr>
                                        @if ($printinvoice->sg_state === 'Gujarat')
                                            <tr class="sg_CGST_classd">
                                                <th align="left">CGST @ 9%</th>
                                                <td align="right">{{ $printinvoice->sg_CGST }}&#8377;</td>
                                                </td>
                                            </tr>
                                            <tr class="sg_SGST_classd">
                                                <th align="left">SGST @ 9%</th>
                                                <td align="right">{{ $printinvoice->sg_SGST }}&#8377;
                                                </td>
                                            </tr>
                                        @else
                                            <tr class="sg_IGST_classd">
                                                <th align="left">IGST @ 18%</th>
                                                <td align="right">{{ $printinvoice->sg_IGST }}&#8377;</td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <th align="left">Grand Total</th>
                                            <td align="right">{{ $printinvoice->after_discount_total }}&#8377;</td>
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
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>
