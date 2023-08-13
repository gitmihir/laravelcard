@include('frontwebsite.frontheader')
@php
    $viewcmsdata = App\Models\CMS::all();
    $url = \URL::current();
    $pieces = explode('/', $url);
    $title = [];
    $content = [];
    foreach ($viewcmsdata as $cmsd) {
        if ($pieces[5] === '1') {
            $title = 'Terms & Condition';
            $content = $cmsd->sg_cms_termscondition;
        } elseif ($pieces[5] === '2') {
            $title = 'Privacy Policy';
            $content = $cmsd->sg_cms_privacy_policy;
        } elseif ($pieces[5] === '3') {
            $title = 'Payment Policy';
            $content = $cmsd->sg_cms_payment_policy;
        } elseif ($pieces[5] === '4') {
            $title = 'Cookies Policy';
            $content = $cmsd->sg_cms_cookies_policy;
        }
    }
@endphp
<div class="Inner-page">
    <div class="inner-hadding">
        <div class="inner-hadding-box text-center">
            <h2>{{ $title }}</h2>
        </div>
    </div>
    <div class="contact-page pt-80 pb-80">
        <div class="container">
            {!! $content !!}
        </div>
    </div>
</div>
<style>
    p,
    h2,
    h3,
    h4,
    h5,
    h6 {
        color: #ffffff !important;
    }
</style>
@include('frontwebsite.frontfooter')
