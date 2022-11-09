<!DOCTYPE html>

<html lang="en" class="dark-style     customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/"
    data-base-url="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-4"
    data-framework="laravel" data-template="blank-menu-theme-default-dark">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Register Basic - Pages |
        Sneat -
        Bootstrap 5 HTML Admin Template - Pro</title>
    <meta name="description"
        content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- laravel CRUD token -->
    <meta name="csrf-token" content="fYz73odguSI9TK6Fv5aJx1YxOiU0MiuMOJCv3UFs">
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://themeselection.com/item/sneat-bootstrap-html-laravel-admin-template/">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('demo/assets/img/favicon/favicon.ico') }}" />

    <!-- Include Styles -->
    <!-- BEGIN: Theme CSS-->
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet"
        href="{{ asset('demo/assets/vendor/fonts/boxicons.css@id=87122b3a3900320673311cebdeb618da') }}" />
    <link rel="stylesheet"
        href="{{ asset('demo/assets/vendor/fonts/fontawesome.css@id=cfafea31c584abe0bcf920c389ea9b3f') }}" />
    <link rel="stylesheet"
        href="{{ asset('demo/assets/vendor/fonts/flag-icons.css@id=403b97c176f3cdf56a3cbf09107ee240') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet"
        href="{{ asset('demo/assets/vendor/css/rtl/core-dark.css@id=863bbf103551fe7d6276dae1217b30a0') }}"
        class="template-customizer-core-css" />
    <link rel="stylesheet"
        href="{{ asset('demo/assets/vendor/css/rtl/theme-default-dark.css@id=3730ac5543e6e20fb4568c3c58d6109b') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('demo/assets/css/demo.css@id=8a804dae81f41c0f9fcbef2fa8316bdd') }}" />


    <link rel="stylesheet"
        href="{{ asset('demo/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css@id=d9fa6469688548dca3b7e6bd32cb0dc6') }}" />
    <link rel="stylesheet"
        href="{{ asset('demo/assets/vendor/libs/typeahead-js/typeahead.css@id=8fc311b79b2aeabf94b343b6337656cf') }}" />

    <!-- Vendor Styles -->
    <!-- Vendor -->
    <link rel="stylesheet"
        href="{{ asset('demo/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />


    <!-- Page Styles -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('demo/assets/vendor/css/pages/page-auth.css') }}">

    <!-- Include Scripts for customizer, helper, analytics, config -->
    <!-- laravel style -->
    <script src="{{ asset('demo/assets/vendor/js/helpers.js') }}"></script>
    <!-- beautify ignore:start -->
  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
  <script src="{{ asset('demo/assets/vendor/js/template-customizer.js') }}"></script>

  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="{{ asset('demo/assets/js/config.js') }}"></script>

  <script>
      window.templateCustomizer = new TemplateCustomizer({
          cssPath: '',
          themesPath: '',
          defaultShowDropdownOnHover: true, // true/false (for horizontal layout only)
          displayCustomizer: true,
          lang: 'en',
          pathResolver: function(path) {
              var resolvedPaths = {
                  // Core stylesheets
                  'core.css': 'https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/core.css?id=2dd9c913029b2c5f8ee3be4934b17c9b',
                  'core-dark.css': 'https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/core-dark.css?id=863bbf103551fe7d6276dae1217b30a0',

                  // Themes
                  'theme-default.css': 'https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-default.css?id=c558d1f84f92626b4007bf28bd986129',
                  'theme-default-dark.css': 'https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-default-dark.css?id=3730ac5543e6e20fb4568c3c58d6109b',
                  'theme-bordered.css': 'https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-bordered.css?id=c0c7a7e835a88e0e3ca7b8abb65ddccd',
                  'theme-bordered-dark.css': 'https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-bordered-dark.css?id=86ff94e7a5a230286b24d435cfd89563',
                  'theme-semi-dark.css': 'https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-semi-dark.css?id=c20543b6d80f0e34767c1c0d7de96b10',
                  'theme-semi-dark-dark.css': 'https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-semi-dark-dark.css?id=7bbd1686012e65d50cca4c8f1a2c4ad0',
              }
              return resolvedPaths[path] || path;
          },
          'controls': ["rtl", "style", "layoutType", "showDropdownOnHover", "layoutNavbarFixed",
              "layoutFooterFixed", "themes"
          ],
      });
  </script>
  <!-- beautify ignore:end -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="async" src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'GA_MEASUREMENT_ID');
    </script>
</head>

<body>
    <!-- Layout Content -->

    <!-- Content -->
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">

                <!-- Register Card -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="../../demo-4.1" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo"><svg width="25" viewBox="0 0 25 42" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <defs>
                                            <path
                                                d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"
                                                id="path-1"></path>
                                            <path
                                                d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z"
                                                id="path-3"></path>
                                            <path
                                                d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z"
                                                id="path-4"></path>
                                            <path
                                                d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z"
                                                id="path-5"></path>
                                        </defs>
                                        <g id="g-app-brand" stroke="none" stroke-width="1" fill="none"
                                            fill-rule="evenodd">
                                            <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                                                <g id="Icon" transform="translate(27.000000, 15.000000)">
                                                    <g id="Mask" transform="translate(0.000000, 8.000000)">
                                                        <mask id="mask-2" fill="white">
                                                            <use xlink:href="#path-1"></use>
                                                        </mask>
                                                        <use fill="#696cff" xlink:href="#path-1"></use>
                                                        <g id="Path-3" mask="url(#mask-2)">
                                                            <use fill="#696cff" xlink:href="#path-3"></use>
                                                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3">
                                                            </use>
                                                        </g>
                                                        <g id="Path-4" mask="url(#mask-2)">
                                                            <use fill="#696cff" xlink:href="#path-4"></use>
                                                            <use fill-opacity="0.2" fill="#FFFFFF"
                                                                xlink:href="#path-4"></use>
                                                        </g>
                                                    </g>
                                                    <g id="Triangle"
                                                        transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) ">
                                                        <use fill="#696cff" xlink:href="#path-5"></use>
                                                        <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5">
                                                        </use>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </span>
                                <span class="app-brand-text demo text-body fw-bolder">Sneat</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2">Adventure starts here 🚀</h4>
                        <p class="mb-4">Make your app management easy and fun!</p>

                        <form method="post" action="{{ route('register') }}" class="mb-3">
                            @csrf
                            {{-- Name input --}}
                            <div class="mb-3">
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    placeholder="Name" value="{{ old('name') }}" required autocomplete="name"
                                    autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- email input --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- phone input --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">phone</label>
                                <input id="email" type="number"
                                    class="form-control @error('phone') is-invalid @enderror" name="phone"
                                    value="{{ old('phone') }}" required autocomplete="phone" placeholder="phone">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- traning name --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">training_center_name</label>
                                <input id="text" type="text"
                                    class="form-control @error('phone') is-invalid @enderror"
                                    name="training_center_name" value="{{ old('training_center_name') }}" required
                                    autocomplete="training_center_name" placeholder="training_center_name">
                                @error('training_center_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- password --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">password</label>
                                <input id="text" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    value="{{ old('password') }}" required autocomplete="training_center_name"
                                    placeholder="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- confirm password --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">password</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="confirm password">
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="terms-conditions"
                                        name="terms">
                                    <label class="form-check-label" for="terms-conditions">
                                        I agree to
                                        <a href="javascript:void(0);">privacy policy & terms</a>
                                    </label>
                                </div>
                            </div>
                            <button class="btn btn-primary d-grid w-100">
                                Sign up
                            </button>
                        </form>

                        <p class="text-center">
                            <span>Already have an account?</span>
                            <a href="login-basic">
                                <span>Sign in instead</span>
                            </a>
                        </p>

                        <div class="divider my-4">
                            <div class="divider-text">or</div>
                        </div>

                        <div class="d-flex justify-content-center">
                            <a href="javascript:;" class="btn btn-icon btn-label-facebook me-3">
                                <i class="tf-icons bx bxl-facebook"></i>
                            </a>

                            <a href="javascript:;" class="btn btn-icon btn-label-google-plus me-3">
                                <i class="tf-icons bx bxl-google-plus"></i>
                            </a>

                            <a href="javascript:;" class="btn btn-icon btn-label-twitter">
                                <i class="tf-icons bx bxl-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Register Card -->
            </div>
        </div>
    </div>
    <!--/ Content -->

    <!--/ Layout Content -->





    <!-- Include Scripts -->
    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('demo/assets/vendor/libs/jquery/jquery.js@id=b49db52ac0f1a7a5d75b32b6326b285f') }}"></script>
    <script src="{{ asset('demo/assets/vendor/libs/popper/popper.js@id=1f8255bd80f17f73ba33c2d1210e5763') }}"></script>
    <script src="{{ asset('demo/assets/vendor/js/bootstrap.js@id=e310c0547362e972fb0e431ca7b5f438') }}"></script>
    <script
        src="{{ asset('demo/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js@id=9d86308b7c41e76a7dc8472907865b83') }}">
    </script>
    <script src="{{ asset('demo/assets/vendor/libs/hammer/hammer.js@id=2a80ebd1aa77a9e33ec54b68ee8de5e0') }}"></script>
    <script src="{{ asset('demo/assets/vendor/libs/i18n/i18n.js@id=8552a7b6c4b850c1768e5ed4409f1b97') }}"></script>
    <script src="{{ asset('demo/assets/vendor/libs/typeahead-js/typeahead.js@id=8c315d7e2e7b09a04d8e8efead923241') }}">
    </script>
    <script src="{{ asset('demo/assets/vendor/js/menu.js@id=f45ec38086f86335b91fc2fdcaaadab8') }}"></script>
    <script src="{{ asset('demo/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
    <script src="{{ asset('demo/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
    <script src="{{ asset('demo/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('demo/assets/js/main.js@id=3c628e87a9befaa350e1f822744b8142') }}"></script>

    <!-- END: Theme JS-->
    <!-- Pricing Modal JS-->
    <!-- END: Pricing Modal JS-->
    <!-- BEGIN: Page JS-->
    <script src="{{ asset('demo/assets/js/pages-auth.js') }}"></script>
    <!-- END: Page JS-->

</body>

</html>
