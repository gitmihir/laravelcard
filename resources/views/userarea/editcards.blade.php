@include('layout.partials.head')

<form action="{{ url('update-card/' . $card->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Card Details</h3>
                    <button type="submit" class="btn btn-primary" style="
    float: right;
">Update</button>
                </div>
                <div class="card-body p-0">
                    <div class="bs-stepper">
                        <div class="bs-stepper-header" role="tablist">
                            <!-- your steps here -->
                            <div class="step" data-target="#logins-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="logins-part"
                                    id="logins-part-trigger">
                                    <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label">Business Info</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#information-part">
                                <button type="button" class="step-trigger" role="tab"
                                    aria-controls="information-part" id="information-part-trigger">
                                    <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label">Social Profiles</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#location-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="location-part"
                                    id="location-part-trigger">
                                    <span class="bs-stepper-circle">3</span>
                                    <span class="bs-stepper-label">Locations</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#service-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="service-part"
                                    id="service-part-trigger">
                                    <span class="bs-stepper-circle">4</span>
                                    <span class="bs-stepper-label">Service</span>
                                </button>
                            </div>
                            <div class="step" data-target="#gallery-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="gallery-part"
                                    id="gallery-part-trigger">
                                    <span class="bs-stepper-circle">5</span>
                                    <span class="bs-stepper-label">Gallery</span>
                                </button>
                            </div>

                            <div class="line"></div>
                            <div class="step" data-target="#youtube-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="youtube-part"
                                    id="youtube-part-trigger">
                                    <span class="bs-stepper-circle">6</span>
                                    <span class="bs-stepper-label">YouTube</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#payment-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="payment-part"
                                    id="payment-part-trigger">
                                    <span class="bs-stepper-circle">7</span>
                                    <span class="bs-stepper-label">Payment</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#link-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="link-part"
                                    id="link-part-trigger">
                                    <span class="bs-stepper-circle">8</span>
                                    <span class="bs-stepper-label">Link</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#qr-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="qr-part"
                                    id="qr-part-trigger">
                                    <span class="bs-stepper-circle">9</span>
                                    <span class="bs-stepper-label">QR</span>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">

                            <div id="logins-part" class="content" role="tabpanel"
                                aria-labelledby="logins-part-trigger">
                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{-- <label for="sg_cd_user_email">Email address</label> --}}
                                            <input type="hidden" class="form-control" name="sg_cd_user_email"
                                                id="sg_cd_user_email" value="{{ $card->sg_cd_user_email }}"
                                                placeholder="Enter email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{-- <label for="sg_cd_user_phone">User Phone</label> --}}
                                            <input type="hidden" class="form-control" name="sg_cd_user_phone"
                                                id="sg_cd_user_phone" value="{{ $card->sg_cd_user_phone }}"
                                                placeholder="Enter Phonenumber">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sg_cd_cover_image">Cover Image</label>
                                            <div>
                                                <input type="file" class="sg_cd_cover_image"
                                                    name="sg_cd_cover_image">
                                            </div>
                                            @if ($card->sg_cd_cover_image)
                                                <p class="delete_image"
                                                    style="cursor: pointer;padding: 0;margin: 0;color: #ff0000;"
                                                    image-attr="{{ $card->sg_cd_cover_image }}"
                                                    image-db-name="sg_cd_cover_image" image-folder-name="cardimages">
                                                    Remove Image</p>
                                                <div class="sg_cd_cover_image">
                                                    <div class="imageparent">
                                                        <img class="imagechild"
                                                            src="{{ asset('images/cardimages/' . $card->sg_cd_cover_image) }}">
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sg_cd_profile_image">Profile Image</label>
                                            <div>
                                                <input type="file" name="sg_cd_profile_image"
                                                    id="sg_cd_profile_image">
                                            </div>
                                            @if ($card->sg_cd_profile_image)
                                                <p class="delete_image"
                                                    style="cursor: pointer;padding: 0;margin: 0;color: #ff0000;"
                                                    image-attr="{{ $card->sg_cd_profile_image }}"
                                                    image-db-name="sg_cd_profile_image"
                                                    image-folder-name="cardimages">
                                                    Remove Image</p>
                                                <div class="sg_cd_profile_image">
                                                    <div class="imageparent hideprofilediv">
                                                        <img class="imagechildprofile"
                                                            src="{{ asset('images/cardimages/' . $card->sg_cd_profile_image) }}">
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sg_cd_name">Name</label>
                                            <input type="text" class="form-control" name="sg_cd_name"
                                                id="sg_cd_name" value="{{ $card->sg_cd_name }}"
                                                placeholder="Enter Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sg_cd_designation">Designation</label>
                                            <input type="text" class="form-control" name="sg_cd_designation"
                                                id="sg_cd_designation" value="{{ $card->sg_cd_designation }}"
                                                placeholder="Enter Designation">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sg_cd_company_name">Company Name</label>
                                            <input type="text" class="form-control" name="sg_cd_company_name"
                                                id="sg_cd_company_name" value="{{ $card->sg_cd_company_name }}"
                                                placeholder="Enter Company Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sg_cd_about_us">About Us</label>
                                            <input type="text" class="form-control" name="sg_cd_about_us"
                                                id="sg_cd_about_us" value="{{ $card->sg_cd_about_us }}"
                                                placeholder="Enter About Us">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sg_cd_phone_number">Phone</label>
                                            <input type="number" class="form-control" name="sg_cd_phone_number"
                                                id="sg_cd_phone_number" value="{{ $card->sg_cd_phone_number }}"
                                                placeholder="Enter Phone Number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sg_cd_whatsapp_number">Whatsapp number</label>
                                            <input type="number" class="form-control" name="sg_cd_whatsapp_number"
                                                id="sg_cd_whatsapp_number" value="{{ $card->sg_cd_whatsapp_number }}"
                                                placeholder="Enter Whatsapp number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sg_cd_Business_whatsapp_number">Whatsapp Business
                                                number</label>
                                            <input type="number" class="form-control"
                                                name="sg_cd_Business_whatsapp_number"
                                                id="sg_cd_Business_whatsapp_number"
                                                value="{{ $card->sg_cd_Business_whatsapp_number }}"
                                                placeholder="Enter Business Whatsapp number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sg_cd_email">Email</label>
                                            <input type="email" class="form-control" name="sg_cd_email"
                                                id="sg_cd_email" value="{{ $card->sg_cd_email }}"
                                                placeholder="Enter Email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sg_cd_website">Website</label>
                                            <input type="text" class="form-control" name="sg_cd_website"
                                                id="sg_cd_website" value="{{ $card->sg_cd_website }}"
                                                placeholder="Enter Website">
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                            </div>

                            <div id="information-part" class="content" role="tabpanel"
                                aria-labelledby="information-part-trigger">
                                <button type="button" class="btn btn-primary"
                                    onclick="stepper.previous()">Previous</button>
                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sg_cd_Facebook">Facebook</label>
                                            <input type="text" value="{{ $card->sg_cd_Facebook }}"
                                                class="form-control" name="sg_cd_Facebook" id="sg_cd_Facebook"
                                                placeholder="Enter Facebook">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sg_cd_Instagram">Instagram</label>
                                            <input type="text" value="{{ $card->sg_cd_Instagram }}"
                                                class="form-control" name="sg_cd_Instagram" id="sg_cd_Instagram"
                                                placeholder="Enter Instagram">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sg_cd_Twitter">Twitter</label>
                                            <input type="text" value="{{ $card->sg_cd_Twitter }}"
                                                class="form-control" name="sg_cd_Twitter" id="sg_cd_Twitter"
                                                placeholder="Enter Twitter">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sg_cd_Linkedin">Linkedin</label>
                                            <input type="text" value="{{ $card->sg_cd_Linkedin }}"
                                                class="form-control" name="sg_cd_Linkedin" id="sg_cd_Linkedin"
                                                placeholder="Enter Linkedin">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sg_cd_Pinterest">Pinterest</label>
                                            <input type="text" value="{{ $card->sg_cd_Pinterest }}"
                                                class="form-control" name="sg_cd_Pinterest" id="sg_cd_Pinterest"
                                                placeholder="Enter Linkedin">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sg_cd_Youtube">Youtube</label>
                                            <input type="text" value="{{ $card->sg_cd_Youtube }}"
                                                class="form-control" name="sg_cd_Youtube" id="sg_cd_Youtube"
                                                placeholder="Enter Linkedin">
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary"
                                    onclick="stepper.previous()">Previous</button>
                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                            </div>

                            <div id="location-part" class="content" role="tabpanel"
                                aria-labelledby="location-part-trigger">
                                <button type="button" class="btn btn-primary"
                                    onclick="stepper.previous()">Previous</button>
                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sg_cd_Office">Office</label>
                                            <input type="text" value="{{ $card->sg_cd_Office }}"
                                                class="form-control" name="sg_cd_Office" id="sg_cd_Office"
                                                placeholder="Enter Office">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sg_cd_Branch">Branch</label>
                                            <input type="text" value="{{ $card->sg_cd_Branch }}"
                                                class="form-control" name="sg_cd_Branch" id="sg_cd_Branch"
                                                placeholder="Enter Branch">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sg_cd_Branch2">Branch 2</label>
                                            <input type="text" value="{{ $card->sg_cd_Branch2 }}"
                                                class="form-control" name="sg_cd_Branch2" id="sg_cd_Branch2"
                                                placeholder="Enter Branch">
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary"
                                    onclick="stepper.previous()">Previous</button>
                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                            </div>

                            <div id="service-part" class="content" role="tabpanel"
                                aria-labelledby="service-part-trigger">
                                <button type="button" class="btn btn-primary"
                                    onclick="stepper.previous()">Previous</button>
                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                                <div class="row">
                                    <table class="table">
                                        <tr>
                                            <th>No.</th>
                                            <th>Service Title</th>
                                            <th>Service Image</th>
                                            <th>Service About</th>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td><input type="text" class="form-control"
                                                    name="sg_cd_Service_Title_1" id="sg_cd_Service_Title_1"
                                                    value="{{ $card->sg_cd_Service_Title_1 }}"></td>
                                            <td><input type="file" class="form-control" name="sg_Service_Image_1"
                                                    id="sg_Service_Image_1">
                                                @if ($card->sg_Service_Image_1)
                                                    <p class="delete_image"
                                                        style="cursor: pointer;padding: 0;margin: 0;color: #ff0000;"
                                                        image-attr="{{ $card->sg_Service_Image_1 }}"
                                                        image-db-name="sg_Service_Image_1"
                                                        image-folder-name="cardimages">
                                                        Remove Image</p>
                                                    <div class="sg_Service_Image_1">
                                                        <div><button type="button" data-toggle="modal"
                                                                data-target="#modalserviceimage"
                                                                class="btn btn-primary btn-sm mt-1 viewserviceimage"
                                                                service-image={{ asset('images/cardimages/' . $card->sg_Service_Image_1) }}>View
                                                                Image</button>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                            <td><input type="text" class="form-control"
                                                    name="sg_cd_Service_About_1" id="sg_cd_Service_About_1"
                                                    placeholder="Enter About"
                                                    value="{{ $card->sg_cd_Service_About_1 }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td><input type="text" class="form-control"
                                                    name="sg_cd_Service_Title_2" id="sg_cd_Service_Title_2"
                                                    value="{{ $card->sg_cd_Service_Title_2 }}">
                                            </td>
                                            <td><input type="file" class="form-control" name="sg_Service_Image_2"
                                                    id="sg_Service_Image_2">
                                                @if ($card->sg_Service_Image_2)
                                                    <p class="delete_image"
                                                        style="cursor: pointer;padding: 0;margin: 0;color: #ff0000;"
                                                        image-attr="{{ $card->sg_Service_Image_2 }}"
                                                        image-db-name="sg_Service_Image_2"
                                                        image-folder-name="cardimages">
                                                        Remove Image</p>
                                                    <div class="sg_Service_Image_2">
                                                        <div><button type="button" data-toggle="modal"
                                                                data-target="#modalserviceimage"
                                                                class="btn btn-primary btn-sm mt-1 viewserviceimage"
                                                                service-image={{ asset('images/cardimages/' . $card->sg_Service_Image_2) }}>View
                                                                Image</button>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                            <td><input type="text" class="form-control"
                                                    name="sg_cd_Service_About_2" id="sg_cd_Service_About_2"
                                                    placeholder="Enter About"
                                                    value="{{ $card->sg_cd_Service_About_2 }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td><input type="text" class="form-control"
                                                    name="sg_cd_Service_Title_3" id="sg_cd_Service_Title_3"
                                                    value="{{ $card->sg_cd_Service_Title_3 }}">
                                            </td>
                                            <td><input type="file" class="form-control" name="sg_Service_Image_3"
                                                    id="sg_Service_Image_3">
                                                @if ($card->sg_Service_Image_3)
                                                    <p class="delete_image"
                                                        style="cursor: pointer;padding: 0;margin: 0;color: #ff0000;"
                                                        image-attr="{{ $card->sg_Service_Image_3 }}"
                                                        image-db-name="sg_Service_Image_3"
                                                        image-folder-name="cardimages">
                                                        Remove Image</p>
                                                    <div class="sg_Service_Image_3">
                                                        <div><button type="button" data-toggle="modal"
                                                                data-target="#modalserviceimage"
                                                                class="btn btn-primary btn-sm mt-1 viewserviceimage"
                                                                service-image={{ asset('images/cardimages/' . $card->sg_Service_Image_3) }}>View
                                                                Image</button>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                            <td><input type="text" class="form-control"
                                                    name="sg_cd_Service_About_3" id="sg_cd_Service_About_3"
                                                    placeholder="Enter About"
                                                    value="{{ $card->sg_cd_Service_About_3 }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td><input type="text" class="form-control"
                                                    name="sg_cd_Service_Title_4" id="sg_cd_Service_Title_4"
                                                    value="{{ $card->sg_cd_Service_Title_4 }}">
                                            </td>
                                            <td><input type="file" class="form-control" name="sg_Service_Image_4"
                                                    id="sg_Service_Image_4">
                                                @if ($card->sg_Service_Image_4)
                                                    <p class="delete_image"
                                                        style="cursor: pointer;padding: 0;margin: 0;color: #ff0000;"
                                                        image-attr="{{ $card->sg_Service_Image_4 }}"
                                                        image-db-name="sg_Service_Image_4"
                                                        image-folder-name="cardimages">
                                                        Remove Image</p>
                                                    <div class="sg_Service_Image_4">
                                                        <div><button type="button" data-toggle="modal"
                                                                data-target="#modalserviceimage"
                                                                class="btn btn-primary btn-sm mt-1 viewserviceimage"
                                                                service-image={{ asset('images/cardimages/' . $card->sg_Service_Image_4) }}>View
                                                                Image</button>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                            <td><input type="text" class="form-control"
                                                    name="sg_cd_Service_About_4" id="sg_cd_Service_About_4"
                                                    placeholder="Enter About"
                                                    value="{{ $card->sg_cd_Service_About_4 }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td><input type="text" class="form-control"
                                                    name="sg_cd_Service_Title_5" id="sg_cd_Service_Title_5"
                                                    value="{{ $card->sg_cd_Service_Title_5 }}">
                                            </td>
                                            <td><input type="file" class="form-control" name="sg_Service_Image_5"
                                                    id="sg_Service_Image_5">
                                                @if ($card->sg_Service_Image_5)
                                                    <p class="delete_image"
                                                        style="cursor: pointer;padding: 0;margin: 0;color: #ff0000;"
                                                        image-attr="{{ $card->sg_Service_Image_5 }}"
                                                        image-db-name="sg_Service_Image_5"
                                                        image-folder-name="cardimages">
                                                        Remove Image</p>
                                                    <div class="sg_Service_Image_5">
                                                        <div><button type="button" data-toggle="modal"
                                                                data-target="#modalserviceimage"
                                                                class="btn btn-primary btn-sm mt-1 viewserviceimage"
                                                                service-image={{ asset('images/cardimages/' . $card->sg_Service_Image_5) }}>View
                                                                Image</button>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                            <td><input type="text" class="form-control"
                                                    name="sg_cd_Service_About_5" id="sg_cd_Service_About_5"
                                                    placeholder="Enter About"
                                                    value="{{ $card->sg_cd_Service_About_5 }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td><input type="text" class="form-control"
                                                    name="sg_cd_Service_Title_6" id="sg_cd_Service_Title_6"
                                                    value="{{ $card->sg_cd_Service_Title_6 }}">
                                            </td>
                                            <td><input type="file" class="form-control" name="sg_Service_Image_6"
                                                    id="sg_Service_Image_6">
                                                @if ($card->sg_Service_Image_6)
                                                    <p class="delete_image"
                                                        style="cursor: pointer;padding: 0;margin: 0;color: #ff0000;"
                                                        image-attr="{{ $card->sg_Service_Image_6 }}"
                                                        image-db-name="sg_Service_Image_6"
                                                        image-folder-name="cardimages">
                                                        Remove Image</p>
                                                    <div class="sg_Service_Image_6">
                                                        <div><button type="button" data-toggle="modal"
                                                                data-target="#modalserviceimage"
                                                                class="btn btn-primary btn-sm mt-1 viewserviceimage"
                                                                service-image={{ asset('images/cardimages/' . $card->sg_Service_Image_6) }}>View
                                                                Image</button>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                            <td><input type="text" class="form-control"
                                                    name="sg_cd_Service_About_6" id="sg_cd_Service_About_6"
                                                    placeholder="Enter About"
                                                    value="{{ $card->sg_cd_Service_About_6 }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td><input type="text" class="form-control"
                                                    name="sg_cd_Service_Title_7" id="sg_cd_Service_Title_7"
                                                    value="{{ $card->sg_cd_Service_Title_7 }}">
                                            </td>
                                            <td><input type="file" class="form-control" name="sg_Service_Image_7"
                                                    id="sg_Service_Image_7">
                                                @if ($card->sg_Service_Image_7)
                                                    <p class="delete_image"
                                                        style="cursor: pointer;padding: 0;margin: 0;color: #ff0000;"
                                                        image-attr="{{ $card->sg_Service_Image_7 }}"
                                                        image-db-name="sg_Service_Image_7"
                                                        image-folder-name="cardimages">
                                                        Remove Image</p>
                                                    <div class="sg_Service_Image_7">
                                                        <div><button type="button" data-toggle="modal"
                                                                data-target="#modalserviceimage"
                                                                class="btn btn-primary btn-sm mt-1 viewserviceimage"
                                                                service-image={{ asset('images/cardimages/' . $card->sg_Service_Image_7) }}>View
                                                                Image</button>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                            <td><input type="text" class="form-control"
                                                    name="sg_cd_Service_About_7" id="sg_cd_Service_About_7"
                                                    placeholder="Enter About"
                                                    value="{{ $card->sg_cd_Service_About_7 }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td><input type="text" class="form-control"
                                                    name="sg_cd_Service_Title_8" id="sg_cd_Service_Title_8"
                                                    value="{{ $card->sg_cd_Service_Title_8 }}">
                                            </td>
                                            <td><input type="file" class="form-control" name="sg_Service_Image_8"
                                                    id="sg_Service_Image_8">
                                                @if ($card->sg_Service_Image_8)
                                                    <p class="delete_image"
                                                        style="cursor: pointer;padding: 0;margin: 0;color: #ff0000;"
                                                        image-attr="{{ $card->sg_Service_Image_8 }}"
                                                        image-db-name="sg_Service_Image_8"
                                                        image-folder-name="cardimages">
                                                        Remove Image</p>
                                                    <div class="sg_Service_Image_8">
                                                        <div><button type="button" data-toggle="modal"
                                                                data-target="#modalserviceimage"
                                                                class="btn btn-primary btn-sm mt-1 viewserviceimage"
                                                                service-image={{ asset('images/cardimages/' . $card->sg_Service_Image_8) }}>View
                                                                Image</button>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                            <td><input type="text" class="form-control"
                                                    name="sg_cd_Service_About_8" id="sg_cd_Service_About_8"
                                                    placeholder="Enter About"
                                                    value="{{ $card->sg_cd_Service_About_8 }}">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <button type="button" class="btn btn-primary"
                                    onclick="stepper.previous()">Previous</button>
                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                            </div>

                            <div id="gallery-part" class="content" role="tabpanel"
                                aria-labelledby="gallery-part-trigger">
                                <button type="button" class="btn btn-primary"
                                    onclick="stepper.previous()">Previous</button>
                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                                <div class="row">
                                    <table class="table">
                                        <tr>
                                            <th>No.</th>
                                            <th>Gallery Image</th>
                                            <th>View Image</th>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td><input type="file" class="form-control" name="sg_cd_Gallery_1"
                                                    id="sg_cd_Gallery_1">
                                            </td>
                                            <td>
                                                @if ($card->sg_cd_Gallery_1)
                                                    <p class="delete_image"
                                                        style="cursor: pointer;padding: 0;margin: 0;color: #ff0000;"
                                                        image-attr="{{ $card->sg_cd_Gallery_1 }}"
                                                        image-db-name="sg_cd_Gallery_1"
                                                        image-folder-name="galleryimages">
                                                        Remove Image</p>
                                                    <div class="sg_cd_Gallery_1">
                                                        <div><button type="button" data-toggle="modal"
                                                                data-target="#modalserviceimage"
                                                                class="btn btn-primary btn-sm mt-1 viewserviceimage"
                                                                service-image={{ asset('images/galleryimages/' . $card->sg_cd_Gallery_1) }}>View
                                                                Image</button>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td><input type="file" class="form-control" name="sg_cd_Gallery_2"
                                                    id="sg_cd_Gallery_2">
                                            </td>
                                            <td>
                                                @if ($card->sg_cd_Gallery_2)
                                                    <p class="delete_image"
                                                        style="cursor: pointer;padding: 0;margin: 0;color: #ff0000;"
                                                        image-attr="{{ $card->sg_cd_Gallery_2 }}"
                                                        image-db-name="sg_cd_Gallery_2"
                                                        image-folder-name="galleryimages">
                                                        Remove Image</p>
                                                    <div class="sg_cd_Gallery_2">
                                                        <div><button type="button" data-toggle="modal"
                                                                data-target="#modalserviceimage"
                                                                class="btn btn-primary btn-sm mt-1 viewserviceimage"
                                                                service-image={{ asset('images/galleryimages/' . $card->sg_cd_Gallery_2) }}>View
                                                                Image</button>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td><input type="file" class="form-control" name="sg_cd_Gallery_3"
                                                    id="sg_cd_Gallery_3">
                                            </td>
                                            <td>
                                                @if ($card->sg_cd_Gallery_3)
                                                    <p class="delete_image"
                                                        style="cursor: pointer;padding: 0;margin: 0;color: #ff0000;"
                                                        image-attr="{{ $card->sg_cd_Gallery_3 }}"
                                                        image-db-name="sg_cd_Gallery_3"
                                                        image-folder-name="galleryimages">
                                                        Remove Image</p>
                                                    <div class="sg_cd_Gallery_3">
                                                        <div><button type="button" data-toggle="modal"
                                                                data-target="#modalserviceimage"
                                                                class="btn btn-primary btn-sm mt-1 viewserviceimage"
                                                                service-image={{ asset('images/galleryimages/' . $card->sg_cd_Gallery_3) }}>View
                                                                Image</button>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td><input type="file" class="form-control" name="sg_cd_Gallery_4"
                                                    id="sg_cd_Gallery_4">
                                            </td>
                                            <td>
                                                @if ($card->sg_cd_Gallery_4)
                                                    <p class="delete_image"
                                                        style="cursor: pointer;padding: 0;margin: 0;color: #ff0000;"
                                                        image-attr="{{ $card->sg_cd_Gallery_4 }}"
                                                        image-db-name="sg_cd_Gallery_4"
                                                        image-folder-name="galleryimages">
                                                        Remove Image</p>
                                                    <div class="sg_cd_Gallery_4">
                                                        <div><button type="button" data-toggle="modal"
                                                                data-target="#modalserviceimage"
                                                                class="btn btn-primary btn-sm mt-1 viewserviceimage"
                                                                service-image={{ asset('images/galleryimages/' . $card->sg_cd_Gallery_4) }}>View
                                                                Image</button>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td><input type="file" class="form-control" name="sg_cd_Gallery_5"
                                                    id="sg_cd_Gallery_5">
                                            </td>
                                            <td>
                                                @if ($card->sg_cd_Gallery_5)
                                                    <p class="delete_image"
                                                        style="cursor: pointer;padding: 0;margin: 0;color: #ff0000;"
                                                        image-attr="{{ $card->sg_cd_Gallery_5 }}"
                                                        image-db-name="sg_cd_Gallery_5"
                                                        image-folder-name="galleryimages">
                                                        Remove Image</p>
                                                    <div class="sg_cd_Gallery_5">
                                                        <div><button type="button" data-toggle="modal"
                                                                data-target="#modalserviceimage"
                                                                class="btn btn-primary btn-sm mt-1 viewserviceimage"
                                                                service-image={{ asset('images/galleryimages/' . $card->sg_cd_Gallery_5) }}>View
                                                                Image</button>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td><input type="file" class="form-control" name="sg_cd_Gallery_6"
                                                    id="sg_cd_Gallery_6">
                                            </td>
                                            <td>
                                                @if ($card->sg_cd_Gallery_6)
                                                    <p class="delete_image"
                                                        style="cursor: pointer;padding: 0;margin: 0;color: #ff0000;"
                                                        image-attr="{{ $card->sg_cd_Gallery_6 }}"
                                                        image-db-name="sg_cd_Gallery_6"
                                                        image-folder-name="galleryimages">
                                                        Remove Image</p>
                                                    <div class="sg_cd_Gallery_6">
                                                        <div><button type="button" data-toggle="modal"
                                                                data-target="#modalserviceimage"
                                                                class="btn btn-primary btn-sm mt-1 viewserviceimage"
                                                                service-image={{ asset('images/galleryimages/' . $card->sg_cd_Gallery_6) }}>View
                                                                Image</button>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td><input type="file" class="form-control" name="sg_cd_Gallery_7"
                                                    id="sg_cd_Gallery_7">
                                            </td>
                                            <td>
                                                @if ($card->sg_cd_Gallery_7)
                                                    <p class="delete_image"
                                                        style="cursor: pointer;padding: 0;margin: 0;color: #ff0000;"
                                                        image-attr="{{ $card->sg_cd_Gallery_7 }}"
                                                        image-db-name="sg_cd_Gallery_7"
                                                        image-folder-name="galleryimages">
                                                        Remove Image</p>
                                                    <div class="sg_cd_Gallery_7">
                                                        <div><button type="button" data-toggle="modal"
                                                                data-target="#modalserviceimage"
                                                                class="btn btn-primary btn-sm mt-1 viewserviceimage"
                                                                service-image={{ asset('images/galleryimages/' . $card->sg_cd_Gallery_7) }}>View
                                                                Image</button>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td><input type="file" class="form-control" name="sg_cd_Gallery_8"
                                                    id="sg_cd_Gallery_8">
                                            </td>
                                            <td>
                                                @if ($card->sg_cd_Gallery_8)
                                                    <p class="delete_image"
                                                        style="cursor: pointer;padding: 0;margin: 0;color: #ff0000;"
                                                        image-attr="{{ $card->sg_cd_Gallery_8 }}"
                                                        image-db-name="sg_cd_Gallery_8"
                                                        image-folder-name="galleryimages">
                                                        Remove Image</p>
                                                    <div class="sg_cd_Gallery_8">
                                                        <div><button type="button" data-toggle="modal"
                                                                data-target="#modalserviceimage"
                                                                class="btn btn-primary btn-sm mt-1 viewserviceimage"
                                                                service-image={{ asset('images/galleryimages/' . $card->sg_cd_Gallery_8) }}>View
                                                                Image</button>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <button type="button" class="btn btn-primary"
                                    onclick="stepper.previous()">Previous</button>
                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                            </div>

                            <div id="youtube-part" class="content" role="tabpanel"
                                aria-labelledby="youtube-part-trigger">
                                <button type="button" class="btn btn-primary"
                                    onclick="stepper.previous()">Previous</button>
                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sg_cd_YouTube_Link">YouTube Link</label>
                                            <input type="text" value="{{ $card->sg_cd_YouTube_Link }}"
                                                class="form-control" name="sg_cd_YouTube_Link"
                                                id="sg_cd_YouTube_Link" placeholder="Enter YouTube Link">
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary"
                                    onclick="stepper.previous()">Previous</button>
                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                            </div>

                            <div id="payment-part" class="content" role="tabpanel"
                                aria-labelledby="payment-part-trigger">
                                <button type="button" class="btn btn-primary"
                                    onclick="stepper.previous()">Previous</button>
                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sg_cd_Google_Pay">Google Pay</label>
                                            <input type="file" class="form-control" name="sg_cd_Google_Pay"
                                                id="sg_cd_Google_Pay" placeholder="Enter Google Pay">
                                        </div>
                                        @if ($card->sg_cd_Google_Pay)
                                            <p class="delete_image"
                                                style="cursor: pointer;padding: 0;margin: 0;color: #ff0000;"
                                                image-attr="{{ $card->sg_cd_Google_Pay }}"
                                                image-db-name="sg_cd_Google_Pay" image-folder-name="paymentimages">
                                                Remove Image</p>
                                            <div class="sg_cd_Google_Pay">
                                                <div class="payment-image"><img
                                                        src="{{ asset('images/paymentimages/' . $card->sg_cd_Google_Pay) }}">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sg_cd_Phone_pe">Phone Pe</label>
                                            <input type="file" class="form-control" name="sg_cd_Phone_pe"
                                                id="sg_cd_Phone_pe" placeholder="Phone Pe">
                                        </div>
                                        @if ($card->sg_cd_Phone_pe)
                                            <p class="delete_image"
                                                style="cursor: pointer;padding: 0;margin: 0;color: #ff0000;"
                                                image-attr="{{ $card->sg_cd_Phone_pe }}"
                                                image-db-name="sg_cd_Phone_pe" image-folder-name="paymentimages">
                                                Remove Image</p>
                                            <div class="sg_cd_Phone_pe">
                                                <div class="payment-image"><img
                                                        src="{{ asset('images/paymentimages/' . $card->sg_cd_Phone_pe) }}">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sg_cd_Paytm">Paytm</label>
                                            <input type="file" class="form-control" name="sg_cd_Paytm"
                                                id="sg_cd_Paytm" placeholder="Enter Paytm">
                                        </div>
                                        @if ($card->sg_cd_Paytm)
                                            <p class="delete_image"
                                                style="cursor: pointer;padding: 0;margin: 0;color: #ff0000;"
                                                image-attr="{{ $card->sg_cd_Paytm }}" image-db-name="sg_cd_Paytm"
                                                image-folder-name="paymentimages">
                                                Remove Image</p>
                                            <div class="sg_cd_Paytm">
                                                <div class="payment-image"><img
                                                        src="{{ asset('images/paymentimages/' . $card->sg_cd_Paytm) }}">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sg_Bhim_UPI">Bhim UPI</label>
                                            <input type="file" class="form-control" name="sg_Bhim_UPI"
                                                id="sg_Bhim_UPI" placeholder="Enter Bhim UPI">
                                        </div>
                                        @if ($card->sg_Bhim_UPI)
                                            <p class="delete_image"
                                                style="cursor: pointer;padding: 0;margin: 0;color: #ff0000;"
                                                image-attr="{{ $card->sg_Bhim_UPI }}" image-db-name="sg_Bhim_UPI"
                                                image-folder-name="paymentimages">
                                                Remove Image</p>
                                            <div class="sg_Bhim_UPI">
                                                <div class="payment-image"><img
                                                        src="{{ asset('images/paymentimages/' . $card->sg_Bhim_UPI) }}">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary"
                                    onclick="stepper.previous()">Previous</button>
                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                            </div>

                            <div id="link-part" class="content" role="tabpanel" aria-labelledby="link-part-trigger">
                                <button type="button" class="btn btn-primary"
                                    onclick="stepper.previous()">Previous</button>
                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sg_cd_Title_1">Link Title 1</label>
                                            <input type="text" value="{{ $card->sg_cd_Title_1 }}"
                                                class="form-control" name="sg_cd_Title_1" id="sg_cd_Title_1"
                                                placeholder="Enter Title">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sg_cd_Link_1">Link 1</label>
                                            <input type="text" value="{{ $card->sg_cd_Link_1 }}"
                                                class="form-control" name="sg_cd_Link_1" id="sg_cd_Link_1"
                                                placeholder="Enter Link">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sg_cd_Title_2">Link Title 2</label>
                                            <input type="text" value="{{ $card->sg_cd_Title_2 }}"
                                                class="form-control" name="sg_cd_Title_2" id="sg_cd_Title_2"
                                                placeholder="Enter Title">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sg_cd_Link_2">Link 2</label>
                                            <input type="text" value="{{ $card->sg_cd_Link_2 }}"
                                                class="form-control" name="sg_cd_Link_2" id="sg_cd_Link_2"
                                                placeholder="Enter Link">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sg_cd_Title_3">Link Title 3</label>
                                            <input type="text" value="{{ $card->sg_cd_Title_3 }}"
                                                class="form-control" name="sg_cd_Title_3" id="sg_cd_Title_3"
                                                placeholder="Enter Title">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sg_cd_Link_3">Link 3</label>
                                            <input type="text" value="{{ $card->sg_cd_Link_3 }}"
                                                class="form-control" name="sg_cd_Link_3" id="sg_cd_Link_3"
                                                placeholder="Enter Link">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sg_cd_Title_4">Link Title 4</label>
                                            <input type="text" value="{{ $card->sg_cd_Title_4 }}"
                                                class="form-control" name="sg_cd_Title_4" id="sg_cd_Title_4"
                                                placeholder="Enter Title">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sg_cd_Link_4">Link 4</label>
                                            <input type="text" value="{{ $card->sg_cd_Link_4 }}"
                                                class="form-control" name="sg_cd_Link_4" id="sg_cd_Link_4"
                                                placeholder="Enter Link">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="sg_brochure">Upload Brochure</label>
                                            <input type="file" class="form-control" name="sg_brochure"
                                                id="sg_brochure" accept="application/pdf"
                                                placeholder="Upload Brochure">
                                        </div>
                                        @if ($card->sg_brochure && $card->sg_brochure_title)
                                            <p class="delete_image"
                                                style="cursor: pointer;padding: 0;margin: 0;color: #ff0000;"
                                                image-attr="{{ $card->sg_brochure }}" image-db-name="sg_brochure"
                                                image-folder-name="brochures">
                                                Remove File</p>
                                            <div class="sg_brochure">
                                                <div>
                                                    <a href="{{ asset('images/brochures/' . $card->sg_brochure) }}"
                                                        download="" target="_blank"> <i class="fa fa-download"
                                                            aria-hidden="true"></i>
                                                        {{ $card->sg_brochure_title }}
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sg_brochure_title">Brochure Title</label>
                                            <input type="text" value="{{ $card->sg_brochure_title }}"
                                                class="form-control" name="sg_brochure_title" id="sg_brochure_title"
                                                placeholder="Enter Brochure Title" maxlength="20">
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary"
                                    onclick="stepper.previous()">Previous</button>
                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                            </div>

                            <div id="qr-part" class="content" role="tabpanel" aria-labelledby="qr-part-trigger">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="sg_cd_QR_Library">QR</label>
                                            @php $qrurl = URL('/') . $card->sg_cd_QR_Link; @endphp
                                            <div class="qrcode">{!! QrCode::size(100)->generate($qrurl) !!}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sg_cd_QR_Link">Qr Link</label>
                                            <input type="text" value="{{ $qrurl }}" readonly
                                                class="form-control" name="sg_cd_QR_Link" id="sg_cd_QR_Link"
                                                placeholder="Qr Link">
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary"
                                    onclick="stepper.previous()">Previous</button>
                                <input type="hidden" class="ajaxurlforremoveimage"
                                    value="{{ url('delete-image') }}">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@include('layout.partials.footer')
