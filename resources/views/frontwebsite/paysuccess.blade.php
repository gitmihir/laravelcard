@include('frontwebsite.frontheader')
<div class="Inner-page">
    <div class="shop-page">
        <!-- end full width banner -->
        <div class="checkout-page cart-page pt-50 pb-50">
            <div class="container">
                <div class="row">
                    @php
                        $payment_id = $_GET['payment_id'];
                        $product_id = $_GET['product_id'];
                        $curl = curl_init();
                        curl_setopt_array($curl, [
                            CURLOPT_URL => 'https://api.razorpay.com/v1/payments/' . $payment_id,
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => '',
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 0,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => 'GET',
                            CURLOPT_HTTPHEADER => ['Authorization: Basic cnpwX3Rlc3RfSWNNUmM5U09idjhrVmQ6UElNNEh6b0c0MDJYTnJIRXFQMXg5M09I'],
                        ]);
                        $response = curl_exec($curl);
                        curl_close($curl);
                        $resultdata = json_decode($response);
                        $authorized = $resultdata->status;
                        $emailfromorder = $resultdata->email;
                        if ($authorized == 'authorized') {
                            App\Models\Order::where('order_id_for_status', $product_id)->update(['sg_order_status' => '1', 'payment_remark' => $payment_id]);
                            App\Models\Card::where('sg_order_id', $product_id)->update(['sg_order_status' => '1']);
                            $viewdata = App\Models\Order::where('sg_business_email', '=', $emailfromorder)->get();
                            $name = [];
                            $OrderID = [];
                            foreach ($viewdata as $userdata) {
                                $name = $userdata->sg_full_name;
                                $OrderID = $userdata->order_id_for_status;
                            }
                            $brand = App\Models\Brand::all();
                            $brandemail = [];
                            $brandphone = [];
                            foreach ($brand as $branddata) {
                                $brandemail = $branddata->sg_brand_business_email;
                                $brandphone = $branddata->sg_brand_busienss_phone;
                            }
                        }
                    @endphp
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h3>Thank you for your order!</h3>
                                <hr>
                                <p>
                                    Dear {{ $name }}, we are delighted to confirm your order. Your Order
                                    ID:{{ $OrderID }}. if you are an existing
                                    user you can access all updates by logging into your account. if you are a new user
                                    you can access
                                    all updates by logging into your account using provided ID and password on your
                                    registered email.
                                    Thank you for selecting us. For inquiries, kindly contact us at <a
                                        href="tel:{{ $brandphone }}">{{ $brandphone }}</a>
                                    or
                                    email us at
                                    <a href="mailto:{{ $brandemail }}">{{ $brandemail }}</a>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@include('frontwebsite.frontfooter')
