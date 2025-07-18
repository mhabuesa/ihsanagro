<!DOCTYPE html>


<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr"
    data-theme="theme-default" data-assets-path="{{ asset('backend') }}/" data-template="vertical-menu-template">


<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">


    {{-- Title Dynamic Code --}}
    @php

        $url = $_SERVER['REQUEST_URI'];
        $explode = explode('/', $url);
        $title = $explode[1];
        $page_title = '';

        if ($title == '') {
            $page_title = 'হোম';
        } elseif ($title == 'project') {
            $page_title = 'প্রজেক্ট';
        } elseif ($title == 'project_add') {
            $page_title = 'নতুন প্রজেক্ট';
        } elseif ($url == '/system/season') {
            $page_title = 'মৌসুম';
        } elseif ($url == '/system/season/create') {
            $page_title = 'মৌসুম যুক্ত';
        } elseif ($url == '/income') {
            $page_title = 'আয় তালিকা';
        } elseif ($url == '/add/income') {
            $page_title = 'নতুন আয়';
        } elseif ($url == '/add/expense') {
            $page_title = 'নতুন ব্যয়';
        } elseif ($title == 'expense') {
            $page_title = 'ব্যয় তালিকা';
        } elseif ($url == '/note') {
            $page_title = 'নোট';
        } elseif ($url == '/trash/expense') {
            $page_title = 'ট্রাশ';
        } elseif ($title == 'income_edit') {
            $page_title = 'আয়';
        } elseif ($title == 'user') {
            $page_title = 'ইউজার';
        } elseif ($title == 'expense_profile') {
            $page_title = 'প্রফাইল তালিকা';
        } elseif ($title == 'expense_profile_show') {
            $page_title = 'প্রফাইল তালিকা';
        } elseif ($title == 'expense_profile_filter') {
            $page_title = 'প্রফাইল ফিল্টার';
        }
    @endphp
    {{-- Title Dynamic Code End --}}

    <title>{{ $page_title }} | ইহসান এগ্রো</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('backend/logo/favicon.png') }}" />

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap"
        rel="stylesheet">

    <!-- Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('backend') }}/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="{{ asset('backend') }}/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="{{ asset('backend') }}/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('backend') }}/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('backend') }}/vendor/css/rtl/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('backend') }}/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('backend') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ asset('backend') }}/vendor/libs/datatables-bs5/datatables.bootstrap5.css">
    <link rel="stylesheet"
        href="{{ asset('backend') }}/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css">
    <link rel="stylesheet"
        href="{{ asset('backend') }}/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/vendor/libs/quill/katex.css" />
    <link rel="stylesheet" href="{{ asset('backend') }}/vendor/libs/quill/editor.css" />
    <link rel="stylesheet" href="{{ asset('backend') }}/vendor/libs/select2/select2.css" />

    <link rel="stylesheet" href="{{ asset('backend') }}/richtexteditor/rte_theme_default.css" />


    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('backend') }}/vendor/css/pages/cards-advance.css" />
    <link rel="stylesheet" href="{{ asset('backend') }}/vendor/css/pages/app-email.css" />
    <link rel="stylesheet" href="{{ asset('backend') }}/vendor/css/pages/page-account-settings.css" />
    <link rel="stylesheet" href="{{ asset('backend') }}/vendor/css/pages/page-profile.css" />

    <link rel="stylesheet" data-purpose="Layout StyleSheet" title="Web Awesome"
        href="/css/app-wa-d53d10572a0e0d37cb8d614a3f177a0c.css?vsn=d">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-thin.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-regular.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-light.css">



    <!-- Helpers -->
    <script src="{{ asset('backend') }}/vendor/js/helpers.js"></script>
    <script src="{{ asset('backend') }}/js/config.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css" />


    {{-- Text Editor Customize Code --}}
    @stack('style')
    <style>
        ol,
        ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        span,
        p {
            padding: 0;
            margin: 0;
        }

        hr {
            margin: 0;
        }

        .swal2-popup {
            top: 10%;
        }

        .dt-buttons {
            display: none;
        }

        .app-brand-logo img {
            width: 174px;
        }

        .user-profile-header .user-profile-img {
            border: 5px solid transparent;
        }

        /* .card-header {
            padding: 12px var(--bs-card-cap-padding-x);
            margin-bottom: 0;
            color: var(--bs-card-cap-color);
            background-color: var(--bs-card-cap-bg);
            border-bottom: var(--bs-card-border-width) solid var(--bs-card-border-color);
        } */

        .user-profile-header-banner img {
            height: 80px;
        }

        .table th {
            font-weight: 600;
        }

        .dt-length label {
            display: none;
        }

        @font-face {
            font-family: 'SolaimanLipi';
            src: url('{{ asset('backend/fonts/solaimanlipi.woff') }}') format('truetype');
        }

        body {
            margin: 0;
            font-family: SolaimanLipi;
            font-size: var(--bs-body-font-size);
            font-weight: var(--bs-body-font-weight);
            line-height: var(--bs-body-line-height);
            color: var(--bs-body-color);
            text-align: var(--bs-body-text-align);
            background-color: var(--bs-body-bg);
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: rgba(75, 70, 92, 0)
        }

        // Spinner CSS
        .spinner-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.7);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .spinner {
            border: 5px solid #f3f3f3;
            border-top: 5px solid #3498db;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>

</head>

<body>


    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar  ">
        <div class="layout-container">

            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">


                <div class="app-brand demo">
                    <a href="{{ route('index') }}" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <img src="{{ asset('backend/logo/logo.png') }}" alt="logo" />
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                        <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
                        <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>



                <ul class="menu-inner py-1">
                    <!-- Dashboards -->
                    <li class="menu-item {{ $title == '' ? 'active' : '' }}">
                        <a href="{{ route('index') }}" class="menu-link">
                            <i class="fa-solid fa-house-heart mx-2"></i>
                            <div data-i18n="হোম">হোম</div>
                        </a>
                    </li>

                    <!-- Layouts -->
                    <li
                        class="menu-item
                        {{ $url == '/income' ? 'open' : '' }}
                        {{ $url == '/add/income' ? 'open' : '' }}
                    ">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="fa-solid fa-square-plus mx-2"></i>
                            <div data-i18n="আয় হিসাব">আয় হিসাব</div>
                        </a>

                        <ul class="menu-sub">

                            <li class="menu-item {{ $url == '/add/income' ? 'active' : '' }}">
                                <a href="{{ route('add.income') }}" class="menu-link">
                                    <div data-i18n="নতুন আয়">নতুন আয়</div>
                                </a>
                            </li>

                            <li class="menu-item {{ $url == '/income' ? 'active' : '' }}">
                                <a href="{{ route('income') }}" class="menu-link">
                                    <div data-i18n="আয় তালিকা">আয় তালিকা</div>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li
                        class="menu-item
                            {{ $title == 'expense' ? 'open' : '' }}
                            {{ $url == '/add/expense' ? 'open' : '' }}
                            {{ $title == 'trash' ? 'open' : '' }}
                            {{ $title == 'expense_profile' ? 'open' : '' }}
                            {{ $title == 'expense_profile_show' ? 'open' : '' }}
                            {{ $title == 'expense_profile_filter' ? 'open' : '' }}
                        ">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="fa-solid fa-square-minus mx-2"></i>
                            <div data-i18n="ব্যয় হিসাব">ব্যয় হিসাব</div>
                        </a>

                        <ul class="menu-sub">

                            <li class="menu-item {{ $url == '/add/expense' ? 'active' : '' }}">
                                <a href="{{ route('add.expense') }}" class="menu-link">
                                    <div data-i18n="নতুন ব্যয়">নতুন ব্যয়</div>
                                </a>
                            </li>

                            <li
                                class="menu-item
                                {{ $title == 'expense' ? 'active' : '' }}
                                ">
                                <a href="{{ route('expense') }}" class="menu-link">
                                    <div data-i18n="ব্যয় তালিকা">ব্যয় তালিকা</div>
                                </a>
                            </li>

                            <li
                                class="menu-item
                                {{ $title == 'expense_profile' ? 'active' : '' }}
                                {{ $title == 'expense_profile_show' ? 'active' : '' }}
                                {{ $title == 'expense_profile_filter' ? 'active' : '' }}
                                ">
                                <a href="{{ route('expense_profile') }}" class="menu-link">
                                    <div data-i18n="ব্যয় প্রফাইল">ব্যয় প্রফাইল</div>
                                </a>
                            </li>

                            <li class="menu-item {{ $title == 'trash' ? 'active' : '' }}">
                                <a href="{{ route('expense.trash') }}" class="menu-link">
                                    <div data-i18n="ট্রাশ">ট্রাশ</div>
                                </a>
                            </li>

                        </ul>
                    </li>


                    <li
                        class="menu-item
                            {{ $title == 'due' ? 'open' : '' }}
                            {{ $title == 'dueList' ? 'open' : '' }}
                        ">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="fa-solid fa-calendar-minus mx-2"></i>
                            <div data-i18n="বাঁকি হিসাব">বাঁকি হিসাব</div>
                        </a>

                        <ul class="menu-sub">
                            {{-- <li class="menu-item {{$url == '/add/expense'?'active':''}}">
                            <a href="{{route('due.list')}}" class="menu-link">
                                <div data-i18n="বাঁকি পরিশোধ">বাঁকি পরিশোধ</div>
                            </a>
                            </li> --}}

                            <li
                                class="menu-item
                            {{ $title == 'dueList' ? 'active' : '' }}
                            ">
                                <a href="{{ route('due.list') }}" class="menu-link">
                                    <div data-i18n="বাঁকি তালিকা">বাঁকি তালিকা</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item {{ $title == 'project' ? 'active' : '' }}">
                        <a href="{{ route('project') }}" class="menu-link">
                            <i class="fa-light fa-list-check mx-2"></i>
                            <div data-i18n="প্রজেক্ট তালিকা">প্রজেক্ট তালিকা</div>
                        </a>
                    </li>

                    <li class="menu-item {{ $title == 'note' ? 'active' : '' }}">
                        <a href="{{ route('note') }}" class="menu-link">
                            <i class="fa-solid fa-notebook mx-2"></i>
                            <div data-i18n="নোট">নোট</div>
                        </a>
                    </li>

                    <li class="menu-item {{ $title == 'note_count' ? 'active' : '' }}">
                        <a href="{{ route('note.count') }}" class="menu-link">
                            <i class="fa-solid fa-money-bill-wave mx-2"></i>
                            <div data-i18n="টাকা নোট গননা">টাকা নোট গননা</div>
                        </a>
                    </li>

                    <li
                        class="menu-item
                            {{ $url == '/system/season' ? 'open' : '' }}
                            {{ $url == '/system/season/create' ? 'open' : '' }}
                            {{ $title == 'user' ? 'open' : '' }}
                        ">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="fa-solid fa-screwdriver-wrench mx-2"></i>
                            <div data-i18n="সিস্টেম">সিস্টেম</div>
                        </a>

                        <ul class="menu-sub">

                            {{-- <li
                                class="menu-item {{ $url == '/system/season' ? 'active' : '' }} {{ $url == '/system/season/create' ? 'active' : '' }}">
                                <a href="{{ route('season') }}" class="menu-link">
                                    <div data-i18n="মৌসুম">মৌসুম</div>
                                </a>
                            </li> --}}

                            <li class="menu-item {{ $title == 'user' ? 'active' : '' }}">
                                <a href="{{ route('user') }}" class="menu-link">
                                    <div data-i18n="ইউজার">ইউজার</div>
                                </a>
                            </li>

                        </ul>
                    </li>

                </ul>



            </aside>
            <!-- / Menu -->



            <!-- Layout container -->
            <div class="layout-page">

                <!-- Top Navbar Start -->
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="ti ti-menu-2 ti-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <ul class="navbar-nav flex-row align-items-center ms-auto">

                            <!-- Message -->
                            <!--/ <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                    <i class="ti ti-mail ti-md"></i>
                                    <span class="badge bg-danger rounded-pill badge-notifications">9</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end py-0">
                                    <li class="dropdown-menu-header border-bottom">
                                        <div class="dropdown-header d-flex align-items-center py-3">
                                            <h5 class="text-body mb-0 me-auto">Messages</h5>

                                        </div>
                                    </li>
                                    <li class="dropdown-notifications-list scrollable-container">
                                        <ul class="list-group list-group-flush">

                                            <a href="" class="d-flex">
                                                <li
                                                    class="list-group-item list-group-item-action dropdown-notifications-item">
                                                    <div class="d-flex">
                                                        <div class="flex-shrink-0 me-3">
                                                            <div class="avatar">
                                                                {{-- <img src="{{ Avatar::create($message->name)->toBase64() }}"
                                                            alt class="h-auto rounded-circle"> --}}
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="mb-1">{{ 'Abu Esa' }}</h6>
                                                            <p class="mb-0">{{ 'subject' }}</p>
                                                            {{-- <small class="text-muted">{{ $message->created_at->diffForHumans() }}</small> --}}
                                                        </div>
                                                    </div>
                                                </li>
                                            </a>

                                            {{-- <li
                                        class="list-group-item list-group-item-action dropdown-notifications-item">
                                        <span>No new message found!</span>
                                    </li> --}}

                                        </ul>
                                    </li>
                                    <li class="dropdown-menu-footer border-top">
                                        <a href=""
                                            class="dropdown-item d-flex justify-content-center text-primary p-2 h-px-40 mb-1 align-items-center">
                                            View all Messages
                                        </a>
                                    </li>
                                </ul>
                            </li> -->
                            <!--/ Message -->

                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar">


                                        <img src="{{ asset('backend') }}/img/avatars/9.jpg" alt="profile photo"
                                            class="h-auto rounded-circle">

                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar">
                                                        <img src="{{ asset('backend') }}/img/avatars/9.jpg" alt
                                                            class="h-auto rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-medium d-block">{{ Auth::user()->name }}</span>
                                                    <small
                                                        class="text-muted text-capitalize">{{ 'Admin' }}</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="">
                                            <i class="ti ti-user-check me-2 ti-sm"></i>
                                            <span class="align-middle">My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="">
                                            <i class="ti ti-settings me-2 ti-sm"></i>
                                            <span class="align-middle">Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>

                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a class="dropdown-item" href="{{ route('logout') }}" target="_blank"
                                                onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                                <i class="ti ti-logout me-2 ti-sm"></i>
                                                <span class="align-middle">Log Out</span>
                                            </a>
                                        </form>
                                    </li>

                                </ul>
                            </li>
                            <!--/ User -->

                        </ul>
                    </div>

                </nav>
                <!-- Top Navbar End -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <!-- Content -->
                        @yield('content')
                        <!-- / Content -->
                    </div>

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <hr>
                        <div class="container-xxl">
                            <div class="footer-container text-center py-2">
                                <div>
                                    &copy; IHSAN AGRO</a>
                                </div>
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>



        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>


        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>

    </div>
    <!-- / Layout wrapper -->
    <div id="form-loading-spinner" style="display: none;">
        <div class="spinner-overlay">
            <div class="spinner"></div>
        </div>
    </div>



    <!-- JS -->

    <script src="{{ asset('backend') }}/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('backend') }}/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('backend') }}/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('backend') }}/vendor/libs/node-waves/node-waves.js"></script>
    <script src="{{ asset('backend') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ asset('backend') }}/vendor/libs/hammer/hammer.js"></script>
    <script src="{{ asset('backend') }}/vendor/libs/i18n/i18n.js"></script>
    <script src="{{ asset('backend') }}/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="{{ asset('backend') }}/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('backend') }}/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="{{ asset('backend') }}/vendor/libs/swiper/swiper.js"></script>

    <!-- Main JS -->
    <script src="{{ asset('backend') }}/js/main.js"></script>


    <!-- Page JS -->
    <script src="{{ asset('backend') }}/js/dashboards-analytics.js"></script>

    {{-- Sweet Alart --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!--Data Table -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script>
        new DataTable('#example', {
            layout: {
                bottomEnd: {
                    paging: {
                        boundaryNumbers: false
                    }
                }
            }
        });
    </script>

    //loader script
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('form');
            const spinner = document.getElementById('form-loading-spinner');

            forms.forEach(function(form) {
                form.addEventListener('submit', function() {
                    spinner.style.display = 'block';
                });
            });
        });
    </script>

    @stack('script')

</body>

</html>
