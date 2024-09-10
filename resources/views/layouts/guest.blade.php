<!doctype html>
<html lang="en">

<head> 

    <meta charset="utf-8" />
    <title>Chat App  @if (isset($title)) | {{ $title }} @endif</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Chat App" name="description" />
    <meta name="keywords" content="Chat App , chat, web chat " />
    <meta content="Sivahtech" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" id="tabIcon">

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
   
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    @livewireStyles
</head>

<body>
    <div class="auth-bg">
        <div class="container p-0">
            <div class="row justify-content-center g-0">
                <div class="col-xl-9 col-lg-8">
                    <div class="authentication-page-content shadow-lg">
                        <div class="d-flex flex-column h-100 px-4 pt-4">
                            <div class="row justify-content-center">
                                <div class="col-sm-8 col-lg-6 col-xl-6">
                                    {{ $slot }}
                                </div><!-- end col -->
                            </div><!-- end row -->
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="text-center text-muted p-4">
                                        <p class="mb-0">&copy;
                                            <script>
                                                document.write(new Date().getFullYear())
                                            </script> Chat. Crafted with <i class="mdi mdi-heart text-danger"></i> by Sivahtech
                                        </p>
                                    </div>
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
    </div>
    <!-- end auth bg -->

    <!-- JAVASCRIPT -->
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <!-- password addon -->
    <!-- <script src="{{ asset('assets/js/pages/password-addon.init.js') }}"></script> -->

    <!-- theme-style init -->
    <script src="{{ asset('assets/js/pages/theme-style.init.js') }}"></script>

    <script src="{{ asset('assets/js/app.j') }}s"></script>

</body>

</html>