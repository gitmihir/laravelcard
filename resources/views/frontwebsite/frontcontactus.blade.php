@include('frontwebsite.frontheader')
@php
    $viewcontactfront = App\Models\FrontContact::all();
@endphp
<div class="Inner-page">
    <!-- INNER PAGE HADDING -->
    <div class="inner-hadding">
        <div class="inner-hadding-box text-center">
            <h2>Contact Us</h2>
        </div>
    </div>
    <!-- END INNER PAGE HADDING -->
    <!-- contact -->
    <div class="contact-page pt-80 pb-80">
        <div class="container">
            <!-- <div class="map-area pb-5">
                <div id="map" data-height="568" data-width="568"></div>
            </div> -->
            <div class="contact-form">
                <div class="row align-items-center justify-content-center">

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="contact-widget">
                            <h5 class="contact-widget-title no-margin text-center"><span>Contact info</span></h5>
                            <div class="textwidget">

                                <ul>
                                    @foreach ($viewcontactfront as $contactData)
                                        <li>
                                            <h5>{{ $contactData->sg_contact_title }}</h5>
                                            <p>{{ $contactData->sg_contact_detail }}</p>
                                            <a href="tel:{{ $contactData->sg_contact_number }}">{{ $contactData->sg_contact_number }}
                                            </a>
                                            <a href="mailto:{{ $contactData->sg_contact_email }}">{{ $contactData->sg_contact_email }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="comment-area">
                            <div class="comment-respond">
                                <h2>Leave Reply</h2>
                                <div class="respons-box pt-4">
                                    <div class="form">
                                        <form action="/sendemail" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="fullname"> Name :</label>
                                                        <input id="fullname" name="fullname"
                                                            class="form-control form-mane fullname" required=""
                                                            type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="conemail">E-mail :</label>
                                                        <input id="conemail" name="conemail"
                                                            class="form-control form-email conemail" required=""
                                                            type="email">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="phonenumber">Phone Number: </label>
                                                        <input id="phonenumber" name="phonenumber"
                                                            class="form-control form-mane phonenumber" required=""
                                                            type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="message">Write a Message :</label>
                                                <textarea id="message" class="form-control form-comment message" cols="10" rows="8" name="comment"
                                                    required=""></textarea>
                                            </div>
                                            <div class="buttons pt-3">
                                                <input type="hidden" class="ajaxurl" value="{{ url('/ajaxform') }}">
                                                <button type="button"
                                                    class="btn btn-button btn-button-2 blue-bg ajaxemail">Send</button>
                                            </div>
                                            <div class="successmsg pt-2"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- END COMMENT RESPOND -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end contact -->
</div>
@include('frontwebsite.frontfooter')
