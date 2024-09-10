<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <title>Chat app | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Chat App" name="description" />
    <meta name="keywords" content="Chat App , chat, web chat " />
    <meta content="Sivahtech" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    {{-- <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" id="tabIcon"> --}}
    <!-- glightbox css -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/libs/glightbox/css/glightbox.min.css') }}"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">

    <!-- One of the following themes -->
    <!-- 'classic' theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/nano.min.css" />

    {{-- <link rel="stylesheet" href="{{ asset('assets/libs/@simonwep/pickr/themes/nano.min.css') }}" /> --}}
    <!-- swiper css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">

    {{-- <link rel="stylesheet" href="{{ asset('assets/libs/swiper/swiper-bundle.min.css') }}"> --}}
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    {{-- <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" /> --}}
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@7.2.96/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">


    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
    @if (isset($style))
    {{ $style }}
    @endif
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        .emoji-icon a.dropdown-toggle {
            z-index: 10;
        }

        .user-chat-content .emoji-icon {
            width: auto !important;
        }

        .user-chat-content .emoji-icon a {
            padding: 1px 3px;
        }

        div#receiverImage .img-fluid {
            height: 50px;
        }

        .fs-10 {
            font-size: 17px !important;
            padding: 6px 10px 7px 10px !important;
        }

        .map-image {
            height: 117px !important;
        }

        .swiper-wrapper {
            position: relative;
            width: 100%;
            height: 100%;
            z-index: 1;
            display: flex;
            transition-property: transform;
            box-sizing: content-box;
            justify-content: space-around !important;
        }

        .chat-list.left .ctext-wrap-content.file-wrap h5,
        .chat-list.left .ctext-wrap-content.file-wrap p {
            color: black !important;
        }

        .chat-list.left .ctext-wrap-content.file-wrap i {
            color: #000 !important;
        }

        .chat-list.left .ctext-wrap-content.file-wrap .avatar-title {
            background: #0003 !important;
        }

        video#videoElement {
            max-width: 500px !important;
        }

        span.typing.ms-2 {
            background: none;
        }

        div#call_status {
            display: flex;
        }

        .call-details {
            z-index: 9;
        }

        #video-chat-window video {
            width: 100% !important;
            height: 100% !important;
        }

        button#startVideoCallBtn {
            border: none !important;
        }

        .desktop-view {
            max-width: 50% !important;
        }

        .chat-user-img.online .user-status .online {
            background-color: #06d6a0 !important;
        }

        span.user-status.offline {
            background-color: #adb5bd !important;
        }

        span.user-status.away {
            background-color: #ffd166 !important;
        }

        span.user-status.dnd {
            background-color: red !important;
        }

        .text-offline {
            color: gray !important;
        }

        .faded {
            opacity: 0.3;
        }

        span.select2-container.select2-container--default.select2-container--open {
            z-index: 9999 !important;
        }



        @media (min-width: 990px) {
            .btn-side-bar {
                display: none;
            }

            div#videoContainer .video-container:first-child {
                position: absolute !important;
                width: 100%;
                height: 100%;
                padding: 0px;
                right: 0;
                bottom: 0;
            }

            div#videoContainer .video-container:first-child video {
                width: 100%;
                height: 100%;
            }

            div#videoContainer.connect .video-container:first-child {
                max-width: 200px;
                height: 200px;
                bottom: 45px !important;
            }

            div#videoContainer .video-container:first-child div#localTrack {
                position: relative;
                bottom: auto;
                right: auto;
                transform: none;
            }

            #videocallModal.modal.show .modal-dialog {
                transform: translateY(0) scale(1);
                /* max-width: 45% !important; */
            }
        }

        @media (max-width: 990px) {
            .btn-side-bar {
                display: none;
            }

            #videocallModal.modal.show .modal-dialog {
                transform: translateY(0) scale(1);
                max-width: 87% !important;
            }

        }

        @media (max-width: 991.98px) {
            .user-chat-topbar {
                position: fixed;
                background-color: rgba(255, 255, 255, 1) !important;
            }

            .chat-conversation {
                height: calc(100vh - 80px);
                margin-bottom: 92px !important;
            }
        }

        @media (max-width:640px) {
            div#videoContainer {
                flex-direction: column;
            }

            div#videoContainer .video-container div#localTrack {
                position: relative;
                height: auto !important;
                width: 100% !important;
                bottom: auto;
                right: auto !important;
                transform: none !important;
            }

            div#videoContainer .video-container div#localTrack video {
                width: 100% !important;
                height: auto !important;
                object-fit: cover;
            }

            .text-center .avatar-md {
                width: 40px;
                height: 40px;
            }

            div#videocallModal-modal-dialog .bg-primary-gradient {
                padding: 10px !important;
            }

            div#videocallModal-modal-dialog .bg-primary-gradient .video-call-menu {
                margin: 0px !important;
            }

            div#videocallModal-modal-dialog .bg-primary-gradient .video-call-menu a.btn.rounded-circle {
                width: 32px;
                height: 32px;
            }

            div#callAlertDiv {
                padding: 10px 15px;
                align-items: center;
            }

            div#callAlertDiv h5 {
                font-size: 0.75rem;
                margin: 0px;
            }

            div#callAlertDiv button.btn.btn-primary {
                padding: 7px 15px;
                height: auto;
                line-height: 1;
            }

            .btn-side-bar {
                display: none;
            }

            #videocallModal.modal.show .modal-dialog {
                transform: translateY(0) scale(1);
                max-width: 100% !important;
            }

            #videocallModal.modal .modal-header {
                margin-top: 20px;
                position: relative;
            }

            #localTrack video {
                width: 100%;
                height: 100%;
            }

            div#localTrack {
                height: 183px !important;
                width: 178px !important;
            }
        }

        .fg-emoji-picker {
            z-index: 9999 !important;
        }

    </style>
</head>

<body>
    <div class="alert alert-primary alert-dismissible fade show d-flex justify-content-between d-none " role="alert" id="callAlertDiv">
        <h5> <strong>Video Call in progress</strong> Click on view to open </h4>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".videocallModal"> view</button>
    </div>

    <div class="layout-wrapper d-lg-flex">

        <!-- Start left sidebar-menu -->
        <div class="side-menu flex-lg-column">
            <!-- LOGO -->
            @include('components.logo')

            <!-- end navbar-brand-box -->

            <!-- Start side-menu nav -->
            <div class="flex-lg-column my-0 sidemenu-navigation">
                <ul class="nav nav-pills side-menu-nav" role="tablist">
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" id="pills-user-tab" data-bs-toggle="pill" href="#pills-user" role="tab">
                            <i class="ri-user-3-line"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-chat-tab" data-bs-toggle="pill" href="#pills-chat" role="tab">
                            <i class="ri-discuss-line"></i>
                            <span class="badge bg-danger fs-11 rounded-pill sidenav-item-badge" id="unread_messages_sidebar">0</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contacts-tab" data-bs-toggle="pill" href="#pills-contacts" role="tab">
                            <i class="ri-contacts-book-line"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-calls-tab" data-bs-toggle="pill" href="#pills-calls" role="tab">
                            <i class="ri-phone-line"></i>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" id="pills-bookmark-tab" data-bs-toggle="pill" href="#pills-bookmark" role="tab">
                            <i class="ri-bookmark-3-line"></i>
                        </a>
                    </li>  --}}
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" id="pills-setting-tab" data-bs-toggle="pill" href="#pills-setting" role="tab">
                            <i class="ri-settings-4-line"></i>
                        </a>
                    </li>
                    <li class="nav-item mt-lg-auto">
                        <a class="nav-link light-dark-mode" href="#">
                            <i class="ri-moon-line"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown profile-user-dropdown">
                        <a class="nav-link dropdown-toggle bg-light " href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ $Media }}/{{ Auth::user()->image }}" alt="" class="profile-user rounded-circle user-profile-image">
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item d-flex align-items-center justify-content-between" id="pills-user-tab" data-bs-toggle="pill" href="#pills-user" role="tab">Profile <i class="bx bx-user-circle text-muted ms-1"></i></a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between" id="pills-setting-tab" data-bs-toggle="pill" href="#pills-setting" role="tab">Setting <i class="bx bx-cog text-muted ms-1"></i></a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">Change Password <i class="bx bx-lock-open text-muted ms-1"></i></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ route('logout') }}">Log out <i class="bx bx-log-out-circle text-muted ms-1"></i></a>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- end side-menu nav -->
        </div>
        <!-- end left sidebar-menu -->

        <!-- start chat-leftsidebar -->
        <x-chat-left-sidebar></x-chat-left-sidebar>
        <!-- end chat-leftsidebar -->

        {{ $slot }}


        <!-- @include('components.group-vdeo-modal')  
    
        @include('components.add-group-modal')
    
        @include('components.pin-tab-modal')        
       
        @include('components.forward-modal')    
      
        @include('components.contact-modal') 
            -->
    </div>
    <!-- end  layout wrapper -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.7.5/socket.io.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://sdk.twilio.com/js/video/releases/2.22.1/twilio-video.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.6.1/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.6.1/firebase-messaging-compat.js"></script>
    <!-- JAVASCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <!-- Modern colorpicker bundle -->
    {{-- <script src="{{ asset('assets/libs/@simonwep/pickr/pickr.min.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.min.js"></script>

    <!-- glightbox js -->
    {{-- <script src="{{ asset('assets/libs/glightbox/js/glightbox.min.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

    <!-- Swiper JS -->
    {{-- <script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <!-- fg-emoji-picker JS -->
    <script src="{{ asset('assets/libs/fg-emoji-picker/fgEmojiPicker.js') }}"></script>
    <!-- page init -->
    <script src="{{ asset('assets/js/pages/index.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script>
        $(document).ready(async () => {
            // Check if the browser supports notifications
            if ('Notification' in window) {
                // Check the current permission
                if (Notification.permission === 'granted') {
                    // If permission is already granted, initialize Firebase messaging
                    await initFirebaseMessagingRegistration();
                } else if (Notification.permission !== 'denied') {
                    // Request permission from the user
                    try {
                        const permission = await Notification.requestPermission();
                        if (permission === 'granted') {
                            await initFirebaseMessagingRegistration();
                        }
                    } catch (error) {
                        console.error('Failed to request notification permission:', error);
                    }
                }
            } else {
                alert('Your browser does not support notifications.');
            }
        });



        async function initFirebaseMessagingRegistration() {

            const firebaseConfig = {
                apiKey: "AIzaSyAyzDyuCashEvEYRCGYLnZRauGhmHizoGg"
                , authDomain: "chat-notify-a21be.firebaseapp.com"
                , projectId: "chat-notify-a21be"
                , storageBucket: "chat-notify-a21be.appspot.com"
                , messagingSenderId: "104073877308"
                , appId: "1:104073877308:web:177557e8058a5e6ed7b039"
            };

            firebase.initializeApp(firebaseConfig);
            const messaging = firebase.messaging();

            // Request permission and get token
            console.log('Notification permission granted.');
            var token;
            // Request permission and get token
            try {
                await Notification.requestPermission();

                token = await messaging.getToken({
                    vapidkey: "BCMkm0WYe52AEarp12HGQ-W7Jer76aIKYZDyQWXlcJN5UTr47XAOO5ITQ0R6872Yd723YoP__WxDEXhUvWAZZUc"
                });

            } catch (err) {
                console.log(err);
            }
            if (token) {
                console.log('Token received:', token);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{ route("save-token") }}'
                    , type: 'POST'
                    , data: {
                        token: token
                    }
                    , dataType: 'JSON'
                    , success: function(response) {
                        sentToServer(true);
                        // alert('Token saved successfully.');
                    }
                    , error: function(err) {
                        console.log('User Chat Token Error' + err);
                    }
                , });
            }

            messaging.onMessage(function(payload) {
                console.log('Message received. ', payload);
                const notificationTitle = payload.data.title;
                const notificationOptions = {
                    body: payload.data.body
                    , icon: "https://wittytalk.me/public/chat-icon.png"
                    , badge: "https://wittytalk.me/public/chat-icon.png"
                    , data: {
                        url: payload.data.url || "http://localhost/chat/dashboard"
                    , }
                , };

                if (Notification.permission === "granted") {
                    const notification = new Notification(notificationTitle, notificationOptions);
                    notification.onclick = function(event) {
                        event.preventDefault();
                        const urlToOpen = event.target.data.url || "https://wittytalk.me/dashboard";
                        console.log("Notification clicked, URL: ", urlToOpen);

                        navigator.serviceWorker.getRegistration().then(function(registration) {
                            if (registration) {
                                registration.active.postMessage({
                                    action: 'checkUrl'
                                    , url: urlToOpen
                                });
                            }
                        });
                    }
                }

            });

            return true;
        }

        navigator.serviceWorker.addEventListener('message', function(event) {
            if (event.data.action === 'checkUrl') {
                const urlToOpen = event.data.url;
                console.log("Checking URL: ", urlToOpen);
                const existingTab = findExistingTab(urlToOpen);
                if (existingTab) {
                    console.log("Focusing existing tab: ", existingTab);
                    existingTab.focus();
                } else {
                    console.log("Opening new tab: ", urlToOpen);
                    window.open(urlToOpen);
                }
            }
        });

        function findExistingTab(url) {
            var tabs = window.tabs || [];
            for (var i = 0; i < tabs.length; i++) {
                if (tabs[i].url === url) {
                    console.log(tabs[i]);
                    return tabs[i];
                }
            }
            return null;
        }

        function isTokenSentToServer() {
            return window.localStorage.getItem('sentToServer') === '1';
        }

        function sentToServer(sent) {
            window.localStorage.setItem('sentToServer', sent ? '1' : '0');
        }

    </script>

    @if (isset($script))
    {{ $script }}
    @endif
</body>

</html>
