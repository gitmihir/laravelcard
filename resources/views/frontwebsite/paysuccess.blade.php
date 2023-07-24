@include('frontwebsite.frontheader')
<div class="Inner-page">
    <div class="shop-page">
        <!-- end full width banner -->
        <div class="checkout-page cart-page pt-50 pb-50">
            <div class="container">
                <div class="row">
                    <h3>Payment successfull.</h3>
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
                        if ($authorized == 'authorized') {
                            App\Models\Order::where('order_id_for_status', $product_id)->update(['sg_order_status' => '1', 'payment_remark' => $payment_id]);
                        }
                    @endphp
                </div>
            </div>
        </div>
    </div>
</div>
@include('frontwebsite.frontfooter')
