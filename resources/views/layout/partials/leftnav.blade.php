<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/home') }}" class="brand-link">
        <img src="{{ asset('/assets/dist/img/erp.png') }}" alt="ERP Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">ERP Solution</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">Welcome,
                    {{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
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
        <!-- Sidebar Menu -->
        <nav class="mt-2">
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
                        <i class="nav-icon fa fa-car-side"></i>
                        <p>
                            Franchise
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/coupon/allcoupon') }}" class="nav-link">
                        <i class="nav-icon fa fa-car-side"></i>
                        <p>
                            Coupon Code
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-address-book"></i>
                        <p>
                            Contacts
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/supplier/allsupplier') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Suppliers
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/customers/allcustomers') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Customers
                                </p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
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

                {{-- <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-shopping-bag"></i>
                        <p>
                            Purchase
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ url('/bills/allbills') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Bills
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Transactions
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Sales
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Invoice
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Transactions
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-store-alt"></i>
                        <p>
                            Inventory Management
                        </p>
                    </a>
                </li>

                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-money-check"></i>
                        <p>
                            Expense
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/expense/allexpense') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Expenses
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Expenses Category
                                </p>
                            </a>
                        </li>

                    </ul>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
