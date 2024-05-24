<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>Dashboard | </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- StyleSheets  -->
    <link rel="stylesheet" href="./assets/css/dashlite.css?ver=3.1.2">
    <link id="skin-default" rel="stylesheet" href="./assets/css/theme.css?ver=3.1.2">
</head>

<body class="nk-body bg-lighter npc-default has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-sidebar-brand">
                        <a href="/" class="logo-link nk-sidebar-logo">
                            <img class="logo-light logo-img" src="./logo.png" srcset="./logo.png" alt="logo">
                            <img class="logo-dark logo-img" src="./logo.png" srcset="./logo.png" alt="logo">
                            <img class="logo-small logo-img logo-img-small" src="./logo.png" srcset="./logo.png"
                                alt="logo-small">
                        </a>
                    </div>
                    <div class="nk-menu-trigger me-n2">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none"
                            data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                        <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex"
                            data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                    </div>
                </div><!-- .nk-sidebar-element -->

                @if ($user->usertype == 'admin')
                    @include('adminsidebar')
                @else
                    @include('sidebar')
                @endif

                <!-- .nk-sidebar-element -->
            </div>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <div class="nk-header nk-header-fixed is-light">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ms-n1">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em
                                        class="icon ni ni-menu"></em></a>
                            </div>
                            <div class="nk-header-brand d-xl-none">
                                <a href="/" class="logo-link">
                                    <img class="logo-light logo-img" src="./logo.png" srcset="./logo.png"
                                        alt="logo">
                                    <img class="logo-dark logo-img" src="./logo.png" srcset="./logo.png" alt="logo">
                                </a>
                            </div><!-- .nk-header-brand -->
                            <div class="nk-header-search ms-3 ms-xl-0">
                                <em class="icon ni ni-search"></em>
                                <input type="text" class="form-control border-transparent form-focus-none"
                                    placeholder="Search anything">
                            </div><!-- .nk-header-news -->
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">



                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle me-n1" data-bs-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm">
                                                    <em class="icon ni ni-user-alt"></em>
                                                </div>
                                                <div class="user-info d-none d-xl-block">
                                                    <div class="user-status user-status-unverified">Your account is
                                                        {{ $user->status }}</div>
                                                    <div class="user-name dropdown-indicator">Welcome,
                                                        {{ $user->name }}</div>
                                                </div>
                                            </div>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end">
                                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                <div class="user-card">
                                                    <div class="user-avatar">
                                                        <span>AB</span>
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="lead-text">{{ $user->name }}</span>
                                                        <span class="sub-text">{{ $user->email }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="profile"><em
                                                                class="icon ni ni-user-alt"></em><span>View
                                                                Profile</span></a></li>

                                                    <li><a class="dark-switch" href="#"><em
                                                                class="icon ni ni-moon"></em><span>Dark Mode</span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="logout"><em
                                                                class="icon ni ni-signout"></em><span>Sign
                                                                out</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- .nk-header-wrap -->
                    </div><!-- .container-fliud -->
                </div>
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Recharge Cable TV</h3>
                                        </div><!-- .nk-block-head-content -->

                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="row g-gs">
                                        <div class="col-xxl-3 col-sm-6">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Wallet Balance</h6>
                                                            </div>
                                                        </div>
                                                        <div class="data">
                                                            <div class="data-group">
                                                                <div class="amount"> ₦{{ $user->balance }}.00</div>
                                                                <div class="nk-ecwg6-ck">

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div><!-- .card-inner -->
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        <div class="col-xxl-3 col-sm-6">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Refferal Bonus</h6>
                                                            </div>
                                                        </div>
                                                        <div class="data">
                                                            <div class="data-group">
                                                                <div class="amount">NGN 0.00</div>
                                                                <div class="nk-ecwg6-ck">

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div><!-- .card-inner -->
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->
                                        </div><!-- .col -->




                                    </div><!-- .row -->
                                </div><!-- .nk-block -->

                                <br><br>
                                <div class="row">
                                    <div class="col-1">

                                    </div>
                                    <div class="col-10">
                                        <div class="card-body table-responsive p-0">

                                            @include('partials.alert-messages')

                                            <form method="GET" action="{{ url('/tvrecharge') }}">
                                                @csrf

                                                <input type="hidden" name="username" id="username"
                                                    value="revolutpay"><br>


                                                <input type="hidden" name="password" id="password"
                                                    value="uchetochukwu@gmail.com"><br>
                                                <label>Enter your phone number:</label><br>
                                                <input type="text" name="phone" class="form-control">
                                                <br><br>
                                                <label>Smart Card Number:</label><br>
                                                <input type="text" name="smartcard_number" class="form-control">
                                                <br><br>
                                                <label>Cable TV Network:</label><br>
                                                <select id="service_id" class="form-control">
                                                    <option value="">Select Option</option>
                                                    <option value="dstv">DSTV</option>
                                                    <option value="gotv">GoTV</option>
                                                    <option value="startimes">StarTimes</option>
                                                </select>
                                                <br><br>
                                                <label>Cable TV Package:</label><br>
                                                <select id="data-plans" name="variation_id" class="form-control">
                                                    <!-- Options will be populated dynamically -->
                                                </select>
                                                <br><br>
                                                <button type="submit" class="btn btn-primary">Recharge</button>

                                            </form>

                                            @if (session('message'))
                                                <p>{{ session('message') }}</p>
                                            @endif



                                        </div>
                                    </div>
                                    <div class="col-1">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                <!-- footer @s -->
                <div class="nk-footer">
                    <div class="container-fluid">
                        <div class="nk-footer-wrap">
                            <div class="nk-footer-copyright"> &copy; 2022 DashLite. Template by <a
                                    href="https://softnio.com" target="_blank">Softnio</a>
                            </div>
                            <div class="nk-footer-links">
                                <ul class="nav nav-sm">


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- select region modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="region">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>

            </div><!-- .modal-content -->
        </div><!-- .modla-dialog -->
    </div><!-- .modal -->
    <!-- JavaScript -->
    <script src="./assets/js/bundle.js?ver=3.1.2"></script>
    <script src="./assets/js/scripts.js?ver=3.1.2"></script>
    <script src="./assets/js/charts/chart-ecommerce.js?ver=3.1.2"></script>



    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#network_id').change(function() {

                var network = $(this).val();

                let link = '{{ route('getTvPlans') }}';

                $('#data-plans').find('option').remove();

                $.ajax({
                    url: link,
                    type: 'POST',
                    data: {
                        network: network
                    },
                    dataType: 'json',
                    success: function(response) {

                        if (response.data.length > 0) {
                            let len = response.data.length;
                            for (let i = 0; i < len; i++) {

                                console.log(len);
                                console.log(response.data[i].variation_id);
                                console.log(response.data[i].tvpackage);

                                let variation_id = response.data[i].variation_id;
                                let tvpackage = response.data[i].tvpackage;
                                let option = "<option value='" + variation_id + "'>" + tvpackage +
                                    "</option>";
                                $("#data-plans").append(option);
                            }
                        }


                    }
                });
            })
        });
    </script>



</body>

</html>
