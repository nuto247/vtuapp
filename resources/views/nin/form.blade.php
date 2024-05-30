@php
    $user = Auth::user();
@endphp

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
                        <a href="html/index.html" class="logo-link nk-sidebar-logo">
                            <img class="logo-light logo-img" src="./images/logo.png" srcset="./images/logo2x.png 2x"
                                alt="logo">
                            <img class="logo-dark logo-img" src="./images/logo-dark.png"
                                srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                            <img class="logo-small logo-img logo-img-small" src="logo.png"
                                srcset="./images/logo-small2x.png 2x" alt="logo-small">
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
                                <a href="html/index.html" class="logo-link">
                                    <img class="logo-light logo-img" src="./images/logo.png"
                                        srcset="./images/logo2x.png 2x" alt="logo">
                                    <img class="logo-dark logo-img" src="./images/logo-dark.png"
                                        srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
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
                                            <h3 class="nk-block-title page-title">Verify NIN</h3>
                                        </div><!-- .nk-block-head-content -->

                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block nk-block-lg">


                                    <div class="row g-gs">
                                        <div class="col-lg-6">
                                            <div class="card card-bordered h-100">
                                                <div class="card-inner">
                                                    <div class="card-head">
                                                        <h5 class="card-title">Verification Datas</h5>
                                                    </div>

                                                    @include('partials.alert-messages')
                                                    
                                                    <form action="{{ route('nin_verify') }}" method="POST">
                                                        @csrf
                                                        <div class="form-group"><label class="form-label"
                                                                for="full-name">NIN</label>
                                                            <div class="form-control-wrap"><input type="text"
                                                                    value="{{ old('nin') }}"
                                                                    class="form-control  @error('nin') is-invalid @enderror"
                                                                    name="nin" id="nin"></div>

                                                                    @error('nin')
                                                                <span class="text-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group"><label class="form-label"
                                                                for="full-name">First Name</label>
                                                            <div class="form-control-wrap"><input type="text"
                                                                    value="{{ old('firstname') }}"
                                                                    class="form-control  @error('firstname') is-invalid @enderror"
                                                                    name="firstname" id="first-name"></div>

                                                            @error('firstname')
                                                                <span class="text-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror

                                                        </div>

                                                        <div class="form-group"><label class="form-label"
                                                                for="full-name">Last Name</label>
                                                            <div class="form-control-wrap"><input type="text"
                                                                    value="{{ old('lastname') }}"
                                                                    class="form-control  @error('lastname') is-invalid @enderror"
                                                                    name="lastname" id="last-name"></div>
                                                                    @error('lastname')
                                                                <span class="text-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>


                                                        <div class="form-group"><button type="submit"
                                                                class="btn btn-lg btn-primary">
                                                                Verify</button></div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="card card-bordered h-100">
                                                <div class="card-inner">
                                                    <div class="card-head">
                                                        <h5 class="card-title">NIN Datas</h5>
                                                    </div>

                                                    @php
                                                        $nin = data_get($ninDatas, 'nin');
                                                    @endphp


                                                    <table class="table table-tranx">
                                                        <thead>
                                                            <tr class="tb-tnx-head">
                                                                <th class="tb-tnx-id"><span class="">Name</span>
                                                                </th>
                                                                <th class="tb-tnx-info"><span
                                                                        class="">Value</span>
                                                                </th>


                                                            </tr>
                                                        </thead>
                                                        <tbody>



                                                            <tr class="tb-tnx-item">
                                                                <td class="tb-tnx-id">
                                                                    NIN
                                                                </td>
                                                                <td class="tb-tnx-info">
                                                                    {{ data_get($nin, 'nin') }}
                                                                </td>
                                                            </tr>

                                                            <tr class="tb-tnx-item">
                                                                <td class="tb-tnx-id">
                                                                    Firstname
                                                                </td>
                                                                <td class="tb-tnx-info">
                                                                    {{ data_get($nin, 'firstname') }}
                                                                </td>
                                                            </tr>

                                                            <tr class="tb-tnx-item">
                                                                <td class="tb-tnx-id">
                                                                    Lastname
                                                                </td>
                                                                <td class="tb-tnx-info">
                                                                    {{ data_get($nin, 'lastname') }}
                                                                </td>
                                                            </tr>

                                                            <tr class="tb-tnx-item">
                                                                <td class="tb-tnx-id">
                                                                    Middlename
                                                                </td>
                                                                <td class="tb-tnx-info">
                                                                    {{ data_get($nin, 'middlename') }}
                                                                </td>
                                                            </tr>
                                                            <tr class="tb-tnx-item">
                                                                <td class="tb-tnx-id">
                                                                    Phone
                                                                </td>
                                                                <td class="tb-tnx-info">
                                                                    {{ data_get($nin, 'phone') }}
                                                                </td>
                                                            </tr>
                                                            <tr class="tb-tnx-item">
                                                                <td class="tb-tnx-id">
                                                                    Gender
                                                                </td>
                                                                <td class="tb-tnx-info">
                                                                    {{ data_get($nin, 'gender') }}
                                                                </td>
                                                            </tr>
                                                            <tr class="tb-tnx-item">
                                                                <td class="tb-tnx-id">
                                                                    Photo
                                                                </td>
                                                                <td class="tb-tnx-info">
                                                                    <img src="data:image/jpeg;base64,{{ data_get($nin, 'photo') }}" >
                                                                </td>
                                                            </tr>
                                                            <tr class="tb-tnx-item">
                                                                <td class="tb-tnx-id">
                                                                    Birthdate
                                                                </td>
                                                                <td class="tb-tnx-info">
                                                                    {{ data_get($nin, 'birthdate') }}
                                                                </td>
                                                            </tr>

                                                            @php
                                                                $residence = data_get($nin, 'residence');
                                                            @endphp

                                                            <tr class="tb-tnx-item">
                                                                <td class="tb-tnx-id">
                                                                    Address
                                                                </td>
                                                                <td class="tb-tnx-info">
                                                                    {{ data_get($residence, 'address1') }}
                                                                </td>
                                                            </tr>

                                                            <tr class="tb-tnx-item">
                                                                <td class="tb-tnx-id">
                                                                    LGA
                                                                </td>
                                                                <td class="tb-tnx-info">
                                                                    {{ data_get($residence, 'lga') }}
                                                                </td>
                                                            </tr>

                                                            <tr class="tb-tnx-item">
                                                                <td class="tb-tnx-id">
                                                                    State
                                                                </td>
                                                                <td class="tb-tnx-info">
                                                                    {{ data_get($residence, 'state') }}
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>


                                                </div>
                                            </div>
                                        </div>

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

    <script src="./assets/js/bundle.js?ver=3.1.2"></script>
    <script src="./assets/js/scripts.js?ver=3.1.2"></script>
    <script src="./assets/js/charts/chart-ecommerce.js?ver=3.1.2"></script>

</body>

</html>
