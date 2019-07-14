<nav class="navbar navbar-default navbar-fixed-top">
    <!-- top bar -->
    <div class="top-bar clearfix">
        <div class="container-bar">
            <div class="brand">
                <a href="{{ route('dashboard') }}">
                    <img src="{{ asset(config('appconfig.logoPath').config('app.logo')) }}" alt="{{ config('app.name') }} Logo" class="img-responsive logo" style="width: 150px; margin-bottom: 15px;">
                </a>
            </div>
            <div class="navbar-right">
                <form class="navbar-form navbar-left search-form">
                    <input type="text" value="" class="form-control" placeholder="Type keyword here...">
                    <button type="button" class="btn btn-default"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
    <!-- end top bar -->
    <!-- main navigation -->
    <div id="navbar-menu" class="bottom-bar clearfix">
        <div class="navbar-header">
            <div class="brand visible-xs">
                <a href="{{ route('dashboard') }}">
                    <img src="{{ asset(config('appconfig.logoPath').config('app.logo')) }}" alt="{{ config('app.name') }} Logo" class="img-responsive logo" style="width: 150px; margin-bottom: 15px;">
                </a>
            </div>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
                <i class="ti-menu"></i>
            </button>
        </div>
        <div class="navbar-collapse collapse" id="main-nav">
            <ul class="nav navbar-nav">
                <li class="dropdown">

                    <a href="{{ route('dashboard') }}" class="active"><i class="ti-dashboard"></i>
                        <span>Home</span> </a>
                </li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown"><i class="ti-email"></i> <span>Message</span> <i
                                class="ti-angle-down icon-submenu"></i></a>

                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('messaging.create') }}">Send SMS</a>
                        </li>

                        <li>
                            <a href="{{ action('PricingCoverageController@customerPriceCoverage')}}">Pricing &
                                Coverage</a>
                        </li>
                        <li>
                            <a href="{{ route('messaging.index') }}">SMS History</a>
                        </li>

                        <li>
                            <a href="{{ route('messaging.scheduleCampaign') }}">Schedule SMS List</a>
                        </li>

                    </ul>
                </li>


                <li class="dropdown">
                    <a href="#" data-toggle="dropdown"><i class="fa fa-address-book-o"></i> <span>Contacts</span> <i
                                class="ti-angle-down icon-submenu"></i></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ action('ContactGroupController@index') }}">Manage Groups</a>
                        </li>
                        <li>
                            <a href="{{ action('ContactController@create') }}">Add/Import Contacts</a>
                        </li>
                        <li>
                            <a href="{{ action('ContactController@index') }}">Manage Contacts</a>
                        </li>
                        <li>
                            <a href="{{ url('blacklists') }}">Blacklist</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" data-toggle="dropdown"><i class="ti-bar-chart-alt"></i> <span>Reports</span> <i
                                class="ti-angle-down icon-submenu"></i></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('delivery.reports') }}">Delivery Report</a>
                            {{--<ul class="dropdown-menu">--}}
                                {{--<li><a href="{{ route('report.last24hours') }}">Last 48hrs Report</a></li>--}}
                                {{--<li><a href="#">Custom Report</a></li>--}}
                                {{--<li><a href="#">Campaign Reports</a></li>--}}
                            {{--</ul>--}}
                        </li>


                        <li>
                            <a href="{{ route('usages') }}">Usages Report</a>
                        </li>
                    </ul>
                </li>

                @if(auth()->user()->hasPermission(['user-list', 'user-create', 'user-update']))
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown"><i class="ti-user"></i> <span>Customers</span> <i
                                    class="ti-angle-down icon-submenu"></i></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ url('users/create') }}">Create Customer</a>
                            </li>
                            <li>
                                <a href="{{ url('users') }}">All Customer</a>
                            </li>
                        </ul>
                    </li>
                @endif

                <li class="dropdown">
                    <a href="#" data-toggle="dropdown"><i class="fa fa-credit-card"></i> <span>Billing</span> <i
                                class="ti-angle-down icon-submenu"></i></a>
                    <ul class="dropdown-menu">
                        @if(auth()->id() != 1)
                            <li>
                                <a href="{{ url('funds/create') }}">Add Fund</a>
                            </li>
                        @endif
                        <li>
                            @if(!auth()->user()->hasRole('admin'))
                                <a href="{{ url('my-invoices') }}">My Invoices</a>
                            @endif
                            @if(!auth()->user()->hasRole('user'))
                                <a href="{{ url('invoices') }}">Customer's Invoices</a>
                            @endif
                        </li>
                        <li>
                            @if(!auth()->user()->hasRole('admin'))
                                <a href="{{ url('my-transactions') }}">My Transactions</a>
                            @endif
                            @if(!auth()->user()->hasRole('user'))
                                <a href="{{ url('transactions') }}">Customer's Transactions</a>
                            @endif
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown"><i class="ti-ticket"></i> <span>Masking</span> <i
                                class="ti-angle-down icon-submenu"></i></a>
                    <ul class="dropdown-menu">
                        @if(!auth()->user()->hasRole('admin'))
                            <li>
                                <a href="{{ action('MaskingRequestController@create') }}">New Masking Request</a>
                            </li>
                        @endif
                        <li>
                            <a href="{{ action('MaskingRequestController@index') }}">All Masking Request</a>
                        </li>
                        <li>
                            <a href="#">In Progress Requests</a>
                        </li>
                    </ul>
                </li>

                @if(auth()->user()->hasRole('admin'))
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown"><i class="ti-panel"></i> <span>Admin Tools</span> <i
                                    class="ti-angle-down icon-submenu"></i></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ action('BannedWordController@index') }}">Banned Words</a>
                            </li>
                            <li>
                                <a href="#">Send Email</a>
                            </li>
                            <li>
                                <a href="{{ route('messaging.allScheduleCampaign') }}">All Scheduled Campaign List</a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if(auth()->user()->hasRole('admin|master-reseller|reseller'))
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown"><i class="ti-settings"></i> <span>Settings</span> <i
                                    class="ti-angle-down icon-submenu"></i></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ url('site-settings') }}">General Settings</a>
                            </li>
                            <li>
                                <a href="{{ action('PricingCoverageController@index')}}">Pricing & Coverage</a>
                            </li>

                            <li>
                                <a href="{{ action('PaymentGatewayController@index') }}">Payment Gateways</a>
                            </li>

                            @if(auth()->user()->hasRole('admin'))
                                <li>
                                    <a href="#">Email Templates</a>
                                </li>
                                <li>
                                    <a href="{{ action('CurrencyController@index') }}">Currencies</a>
                                </li>
                                <li class="dropdown dropdown-sub">
                                    <a href="#" data-toggle="dropdown">SMS Gateway </a>
                                    <ul class="dropdown-menu" style="right:100%; left:auto;">
                                        <li>
                                            <a href="{{ route('operators.index') }}">Operators</a>
                                        </li>
                                        <li>
                                            <a href="{{ action('SmsgatewayController@index') }}">SMS Gateways</a>
                                        </li>
                                        <li>
                                            <a href="{{ action('SmsGatewayRoutingController@index') }}">SMS Gateways
                                                Routing</a>
                                        </li>

                                    </ul>
                                </li>

                                <li>
                                    <a href="{{ action('SenderIdController@index') }}">Sender ID</a>
                                </li>
                                <li>
                                    <a href="{{ action('AllUserController@administrator') }}">Administrators</a>
                                </li>

                                <li class="dropdown dropdown-sub">
                                    <a href="#" data-toggle="dropdown">Role-Permission </a>
                                    <ul class="dropdown-menu" style="right:100%; left:auto;">
                                        <li><a href="{{ url('role-permission') }}">Add Role & Permission</a></li>
                                        <li><a href="{{ action('PermissionController@index') }}">Permission</a></li>
                                        <li><a href="{{ action('RoleController@index') }}">Role</a></li>

                                    </ul>
                                </li>
                            @endif
                            <li>
                                <a href="{{ url('developers-api') }}">Developers API</a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if(auth()->user()->hasRole('user'))
                    <li>
                        <a href="{{ url('developers-api') }}">Developers API</a>
                    </li>
                @endif
            </ul>

            @auth
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ auth()->user()->photo ? asset(config('appconfig.userImagePath') . auth()->user()->photo) : asset(config('appconfig.defaultUserThumbnail')) }}" alt="Avatar">
                            <span>{{ auth()->user()->first_name }}</span> <i class="ti-angle-down icon-submenu"></i></a>
                        <ul class="dropdown-menu logged-user-menu">
                            <li><a href="{{ url('my-profile') }}"><i class="ti-user"></i> <span>My Profile</span></a></li>
                            <li><a type="button" href="{{ url('users/change-password') }}"><i class="fa fa-key"></i> <span>Change Password</span></a></li>

                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                    <i class="ti-power-off"></i> <span>Logout</span>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>

                            </li>

                        </ul>
                    </li>
                </ul>
            @endauth
        </div>


    </div>
    <!-- end main navigation -->
</nav>

<!-- Modal -->
{{--<div class="modal fade" id="resetPass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"--}}
     {{--aria-hidden="true">--}}
    {{--<div class="modal-dialog" role="document">--}}
        {{--<div class="modal-content">--}}
            {{--<div class="modal-header">--}}
                {{--<h5 class="modal-title" id="exampleModalLabel">Reset Password</h5>--}}
                {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                    {{--<span aria-hidden="true">&times;</span>--}}
                {{--</button>--}}
            {{--</div>--}}
            {{--<div class="modal-body">--}}

                {{--<form class="form-horizontal"--}}
                      {{--action="{{ action('AllUserController@password') }}" method="post"--}}
                      {{--enctype="multipart/form-data">--}}
                    {{--@csrf--}}
                    {{--@method('PUT')--}}

                    {{--<input type="hidden" value="{{ auth()->user()->id }}" name="tempID">--}}

                    {{--<label class="control-label">New Password</label><br><br>--}}
                    {{--<input type="password" class="form-control" name="newPassword" required>--}}
                    {{--<br><label class="control-label">Confirm Password</label><br><br>--}}
                    {{--<input type="password" class="form-control" name="confirmPassword" required><br>--}}


                    {{--<div class="modal-footer">--}}
                        {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>--}}
                        {{--<button type="submit" class="btn btn-primary">Change Password</button>--}}
                    {{--</div>--}}
                {{--</form>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

{{--</div>--}}