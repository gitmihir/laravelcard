@php
    $viewHeader = App\Models\Brand::all();
@endphp
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    @foreach ($viewHeader as $logoData)
        @if (Auth::user()->user_role === 'normaluser')
            <a href="{{ url('/userarea/allcards') }}" class="brand-link">
                <img src="{{ asset('images/brandimages/' . $logoData->sg_brand_logo) }}"
                    style="height: auto;width: 100%;opacity: .8" alt="Home Logo">
            </a>
        @else
            <a href="{{ url('/home') }}" class="brand-link">
                <img src="{{ asset('images/brandimages/' . $logoData->sg_brand_logo) }}"
                    style="height: auto;width: 100%;opacity: .8" alt="Home Logo">
            </a>
        @endif
    @endforeach
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">Welcome,
                    {{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}</a>
            </div>
        </div>
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <nav class="mt-2">
            @if (Auth::user()->user_role === 'super_admin')
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a target="_blank" href="{{ url('/') }}" class="nav-link">
                            <i class="nav-icon fa fa-globe"></i>
                            <p>
                                View Site
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/home') }}" class="nav-link">
                            <i class="nav-icon fas fa-database"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/usermanagement/allusers') }}" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                User Management
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/smtp/smtpdetails') }}" class="nav-link">
                            <i class="nav-icon fa fa-envelope"></i>
                            <p>
                                SMTP Settings
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/frontfooter/footerdetails') }}" class="nav-link">
                            <i class="nav-icon fa fa-shoe-prints"></i>
                            <p>
                                Footer Settings
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/branddetails/branddetail') }}" class="nav-link">
                            <i class="nav-icon fa fa-copyright"></i>
                            <p>
                                Brand Details
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/edit-cms/1') }}" class="nav-link">
                            <i class="nav-icon fa fa-folder"></i>
                            <p>
                                CMS
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/paymentcredentials/pcdetails') }}" class="nav-link">
                            <i class="nav-icon fas fa-credit-card"></i>
                            <p>
                                Payment Credentials
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/contactusfront/allcontacts') }}" class="nav-link">
                            <i class="nav-icon fas fa-address-book"></i>
                            <p>
                                Front Contact
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/ourteam/allteammembers') }}" class="nav-link">
                            <i class="nav-icon fa fa-user-plus"></i>
                            <p>
                                Our Team
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/owner/allowners') }}" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Owner
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/webvideos/allvideos') }}" class="nav-link">
                            <i class="nav-icon fas fa-video"></i>
                            <p>
                                Videos
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/reviews/allreviews') }}" class="nav-link">
                            <i class="nav-icon fas fa-mug-hot"></i>
                            <p>
                                Reviews
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/clients/allclients') }}" class="nav-link">
                            <i class="nav-icon fas fa-bolt"></i>
                            <p>
                                Clients
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/headertextslider/allslides') }}" class="nav-link">
                            <i class="nav-icon fa fa-car-side"></i>
                            <p>
                                Slides Texts
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/franchise/allfranchise') }}" class="nav-link">
                            <i class="nav-icon fa fa-coffee"></i>
                            <p>
                                Franchise
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/coupon/allcoupon') }}" class="nav-link">
                            <i class="nav-icon fa fa-bookmark"></i>
                            <p>
                                Coupon Code
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/leads/allleads') }}" class="nav-link">
                            <i class="nav-icon fa fa-shopping-bag"></i>
                            <p>
                                Leads
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/orderoffline/allorderoffline') }}" class="nav-link">
                            <i class="nav-icon fa fa-shopping-bag"></i>
                            <p>
                                Orders
                            </p>
                        </a>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fab fa-product-hunt"></i>
                            <p>
                                Product Management
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('/products/allproducts') }}" class="nav-link">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>
                                        Products
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/category/allcategory') }}" class="nav-link">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>
                                        Category
                                    </p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/userarea/allcards') }}" class="nav-link">
                            <i class="nav-icon fas fa-id-card"></i>
                            <p>
                                Cards
                            </p>
                        </a>
                    </li>
                </ul>
            @endif
            @if (Auth::user()->user_role === 'normaluser')
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ url('/userarea/allcards') }}" class="nav-link">
                            <i class="nav-icon fas fa-id-card"></i>
                            <p>
                                Cards
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/orderoffline/allorderoffline') }}" class="nav-link">
                            <i class="nav-icon fa fa-shopping-bag"></i>
                            <p>
                                Orders
                            </p>
                        </a>
                    </li>
                </ul>
            @endif
            @if (Auth::user()->user_role === 'franchiseuser')
                @php
                    $id = App\Models\Franchise::where('sg_franchise_email', Auth::user()->email)->first()->id;
                @endphp
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ url('/home') }}" class="nav-link">
                            <i class="nav-icon fas fa-database"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('view-franchise-orders/' . $id) }}" class="nav-link">
                            <i class="nav-icon fa fa-globe"></i>
                            <p>
                                Franchise Orders
                            </p>
                        </a>
                    </li>
                </ul>
            @endif
            <!-- /.sidebar-menu -->
        </nav>
    </div>
    <!-- /.sidebar -->
</aside>
