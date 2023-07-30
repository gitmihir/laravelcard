<script src="{{ asset('/frontassets/assets/vendor/modernizr-3.5.0.js') }}"></script>
<script src="{{ asset('/frontassets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('/frontassets/assets/vendor/modernizr-3.5.0.js') }}"></script>
<script src="{{ asset('/frontassets/assets/bootstrap-4.1.1/popper.min.js') }}"></script>
<script src="{{ asset('/frontassets/assets/bootstrap-4.1.1/bootstrap.min.js') }}"></script>
<script src="{{ asset('/frontassets/assets/swiper/swiper.min.js') }}"></script>
<script src="{{ asset('/frontassets/assets/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('/frontassets/assets/animations/wow.min.js') }}"></script>
<script src="{{ asset('/frontassets/assets/video/video.popup.js') }}"></script>
<script src="{{ asset('/frontassets/assets/lightbox/jquery.littlelightbox.js') }}"></script>
<script src="{{ asset('/frontassets/js/slick.min.js') }}"></script>
<script src="{{ asset('/frontassets/js/main.js') }}"></script>
<script src="{{ asset('/frontassets/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('/frontassets/js/adminlte.js') }}"></script>
<script src="{{ asset('/frontassets/js/dashboard.js') }}"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
@if (env('PAYTM_ENVIRONMENT') == 'production')
    <script type="application/javascript" crossorigin="anonymous" src="https:\\securegw.paytm.in\merchantpgpui\checkoutjs\merchants\<?php echo env('PAYTM_MERCHANT_ID')?>.js" ></script>
@else
    <script type="application/javascript" crossorigin="anonymous" src="https:\\securegw-stage.paytm.in\merchantpgpui\checkoutjs\merchants\<?php echo env('PAYTM_MERCHANT_ID')?>.js" ></script>
@endif
