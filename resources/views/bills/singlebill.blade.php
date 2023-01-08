@include('layout.partials.head')
@php
$productname = explode('~', $bills->product_name);
$productprice = explode('~', $bills->product_price);
$productquantity = explode('~', $bills->product_quantity);
$producttotalamount = explode('~', $bills->product_total_amount);
@endphp
<div class="row mb-3 ml-3 mr-3 mt-3">
    <div class="col-md-12">
        <h3>Bill Details</h3>
    </div>
    <div class="col-md-12 mt-3">
        <table class="table table-striped table-bordered">
            <tr>
                <th>Supplier Name</th>
                <td>{{ $bills->supplier_name }}</td>
            </tr>
            <tr>
                <th>Bill Number</th>
                <td>{{ $bills->bill_number }}</td>
            </tr>
            <tr>
                <th>Bill Amount</th>
                <td>{{ $bills->bill_amount }}</td>
            </tr>
            <tr>
                <th>Bill Attachment</th>
                <td><a href="{{ asset('images/billattachments/' . $bills->image) }}" download><i class="fas fa-file"></i>
                        ({{ $bills->image }}) Click to download</a></td>
            </tr>
        </table>
        <table class="table table-striped table-bordered billclasstable">
            <tr>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Qty.</th>
                <th>Total Amount</th>
            </tr>
            <tr>
                <td>
                    @foreach ($productname as $product_name)
                        <div class="billclass">{{ $product_name }}</div>
                    @endforeach
                </td>

                <td>
                    @foreach ($productprice as $product_price)
                        <div class="billclass">{{ $product_price }}</div>
                    @endforeach
                </td>
                <td>
                    @foreach ($productquantity as $product_quantity)
                        <div class="billclass">{{ $product_quantity }}</div>
                    @endforeach
                </td>
                <td>
                    @foreach ($producttotalamount as $producttotal_amount)
                        <div class="billclass">{{ $producttotal_amount }}</div>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <th>Total Bill</th>
                <td class="totalbillclass" style=" padding: 0.75rem !important;padding-left: .75rem !important;">
                    {{ $bills->bill_amount }}</td>
            </tr>
        </table>

    </div>
    <div class="col-md-12">
        <label>Notes</label>
        <p>{{ $bills->bill_notes }}</p>
    </div>
    <div class="col-md-12">
        <a href="{{ url('/bills/allbills') }}" type="button" class="btn btn-info">Back</a>
    </div>
</div>
</form>
@include('layout.partials.footer')
