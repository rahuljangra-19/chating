<x-app-layout>
    <!-- Start User chat -->
    <div class="user-chat w-100 overflow-hidden d-none" id="chat-body">
        <div class="chat-content d-lg-flex">
            <!-- start chat conversation section -->
            <div class="w-100 overflow-hidden position-relative">
                <!-- conversation user -->
                <div id="users-chat" class="position-relative">
                    <div class="py-3 user-chat-topbar">
                        <div class="row align-items-center">
                            <div class="col-sm-4 col-8">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 d-block d-lg-none me-3">
                                        <a href="javascript: void(0);" class="user-chat-remove fs-18 p-1"><i class="bx bx-chevron-left align-middle"></i></a>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 chat-user-img online user-own-img align-self-center me-3 ms-0" id="receiverImage">
                                                <img src="assets/images/users/avatar-2.jpg" class="rounded-circle avatar-sm" alt="">
                                                <span class="user-status"></span>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h6 class="text-truncate mb-0 fs-18"><a href="#" class="user-profile-show text-reset" id="receiverName"></a></h6>
                                                <p class="text-truncate text-muted mb-0"><small id="receiverStatus"></small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8 col-4">
                                <ul class="list-inline user-chat-nav text-end mb-0">
                                    <li class="list-inline-item">
                                        <div class="dropdown">
                                            <button class="btn nav-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class='bx bx-search'></i>
                                            </button>
                                            <div class="dropdown-menu p-0 dropdown-menu-end dropdown-menu-lg">
                                                <div class="search-box p-2">
                                                    <input type="text" class="form-control" placeholder="Search.." id="searchChatMessage">
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-inline-item d-none d-lg-inline-block me-2 ms-0">
                                        <button type="button" class="btn nav-btn audio-call-btn">
                                            <i class='bx bxs-phone-call'></i>
                                        </button>
                                    </li>

                                    <li class="list-inline-item d-none d-lg-inline-block me-2 ms-0">
                                        <button type="button" class="btn nav-btn video-call-btn" id="startVideoCallBtn">
                                            <i class='bx bx-video'></i>
                                        </button>
                                    </li>

                                    <li class="list-inline-item d-none d-lg-inline-block me-2 ms-0">
                                        <button type="button" class="btn nav-btn" data-bs-toggle="modal" data-bs-target=".pinnedtabModal">
                                            <i class='bx bx-bookmark'></i>
                                        </button>
                                    </li>

                                    <li class="list-inline-item d-none d-lg-inline-block me-2 ms-0">
                                        <button type="button" class="btn nav-btn user-profile-show">
                                            <i class='bx bxs-info-circle'></i>
                                        </button>
                                    </li>

                                    <li class="list-inline-item">
                                        <div class="dropdown">
                                            <button class="btn nav-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class='bx bx-dots-vertical-rounded'></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item d-flex justify-content-between align-items-center d-lg-none user-profile-show" href="#">View Profile <i class="bx bx-user text-muted"></i></a>
                                                <a class="dropdown-item d-flex justify-content-between align-items-center d-lg-none audio-call-btn" href="#">Audio <i class="bx bxs-phone-call text-muted"></i></a>
                                                <a class="dropdown-item d-flex justify-content-between align-items-center d-lg-none video-call-btn" href="#">Video <i class="bx bx-video text-muted"></i></a>
                                                {{-- <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">Archive <i class="bx bx-archive text-muted"></i></a> --}}
                                                <a class="dropdown-item d-flex justify-content-between align-items-center mute-btn" data-type="mute" href="#">Muted <i class="bx bx-microphone-off text-muted"></i></a>
                                                <a class="dropdown-item d-flex justify-content-between align-items-center" id="delete-chat-btn" href="#">Delete Chat <i class="bx bx-trash text-muted"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <!-- end chat user head -->

                    <!-- start chat conversation -->

                    <div class="chat-conversation p-3 p-lg-4 " id="chat-conversation" data-simplebar>
                        <ul class="list-unstyled chat-conversation-list" id="users-conversation">
                        </ul>
                    </div>

                    <div class="alert alert-warning alert-dismissible copyclipboard-alert px-4 " id="copyClipBoard" role="alert">
                        Message copied
                    </div>
                    <!-- end chat conversation end -->
                </div>
                <!-- start chat input section -->
                <div class="position-relative">
                    <div class="chat-input-section p-4 border-top">

                        <form id="chatinput-form" enctype="multipart/form-data" method="POST">
                            <div class="row g-0 align-items-center">
                                <div class="file_Upload"></div>
                                <div class="col-auto">
                                    <div class="chat-input-links me-md-2">
                                        <div class="links-list-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="More">
                                            <button type="button" class="btn btn-link text-decoration-none btn-lg waves-effect" data-bs-toggle="collapse" data-bs-target="#chatinputmorecollapse" aria-expanded="false" aria-controls="chatinputmorecollapse">
                                                <i class="bx bx-dots-horizontal-rounded align-middle"></i>
                                            </button>
                                        </div>
                                        <div class="links-list-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Emoji">
                                            <button type="button" class="btn btn-link text-decoration-none btn-lg waves-effect emoji-btn" id="emoji-btn">
                                                <i class="bx bx-smile align-middle"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="position-relative">
                                        <div class="chat-input-feedback" id="input_error">
                                            Please Enter a Message
                                        </div>
                                        <input type="hidden" value="{{ Auth::user()->socket_id }}" id="my_socket_id">
                                        <input type="hidden" value="" id="chat_socket_id">
                                        <input type="hidden" value="" id="socket_id">
                                        <input type="hidden" value="" id="threadId">
                                        <input type="hidden" value="" id="threadToken">
                                        <input type="hidden" value="" id="receiverId">
                                        <input type="hidden" value="" id="latitude">
                                        <input type="hidden" value="" id="longitude">
                                        <input autocomplete="off" type="text" class="form-control  bg-light border-0 chat-input" autofocus id="chat-input" placeholder="Type your message...">
                                        <div class="chat-input-typing">
                                            <span class="typing-user d-flex d-none" id="typing-user">Victoria Lane
                                                is
                                                typing
                                                <span class="typing ms-2">
                                                    <span class="dot"></span>
                                                    <span class="dot"></span>
                                                    <span class="dot"></span>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="chat-input-links ms-2 gap-md-1">
                                        <div class="links-list-item d-none d-sm-block" data-bs-container=".chat-input-links" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-html="true" data-bs-placement="top" data-bs-content="<div class='loader-line'><div class='line'></div><div class='line'></div><div class='line'></div><div class='line'></div><div class='line'></div></div>">
                                            {{-- <button type="button" class="btn btn-link text-decoration-none btn-lg waves-effect" onclick="audioPermission()">
                                                <i class="bx bx-microphone align-middle"></i>
                                            </button> --}}
                                        </div>
                                        <div class="links-list-item">
                                            <button type="submit" class="btn btn-primary btn-lg chat-send waves-effect waves-light" data-bs-toggle="collapse" data-bs-target=".chat-input-collapse1.show">
                                                <i class="bx bxs-send align-middle" id="submit-btn"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="chat-input-collapse chat-input-collapse1 collapse" id="chatinputmorecollapse">
                            <div class="card mb-0">
                                <div class="card-body py-3">
                                    <!-- Swiper -->
                                    <div class="swiper chatinput-links">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="text-center px-2 position-relative">
                                                    <div>
                                                        <input id="attachedfile-input" type="file" class="d-none" accept=".zip,.rar,.7zip,.pdf">
                                                        <label for="attachedfile-input" class="avatar-sm mx-auto stretched-link">
                                                            <span class="avatar-title fs-18 bg-primary-subtle  text-primary  text-primary rounded-circle">
                                                                <i class="bx bx-paperclip"></i>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <h5 class="fs-11 text-uppercase mt-3 mb-0 text-body text-truncate">
                                                        Attached</h5>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="text-center px-2">
                                                    <div class="avatar-sm mx-auto">
                                                        <div class="avatar-title fs-18 bg-primary-subtle  text-primary  text-primary rounded-circle">
                                                            <i class="bx bxs-camera"></i>
                                                        </div>
                                                    </div>
                                                    <h5 class="fs-11 text-uppercase text-truncate mt-3 mb-0"><a href="#" class="text-body stretched-link" onclick="cameraPermission()">Camera</a></h5>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="text-center px-2 position-relative">
                                                    <div>
                                                        <input id="galleryfile-input" type="file" class="d-none" accept="image/png, image/gif, image/jpeg" multiple>
                                                        <label for="galleryfile-input" class="avatar-sm mx-auto stretched-link">
                                                            <span class="avatar-title fs-18 bg-primary-subtle  text-primary  text-primary rounded-circle">
                                                                <i class="bx bx-images"></i>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <h5 class="fs-11 text-uppercase text-truncate mt-3 mb-0">Gallery
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="text-center px-2">
                                                    <div>
                                                        <input id="audiofile-input" type="file" class="d-none" accept="audio/*">
                                                        <label for="audiofile-input" class="avatar-sm mx-auto stretched-link">
                                                            <span class="avatar-title fs-18 bg-primary-subtle  text-primary  text-primary rounded-circle">
                                                                <i class="bx bx-headphone"></i>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <h5 class="fs-11 text-uppercase text-truncate mt-3 mb-0">Audio</h5>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="text-center px-2">
                                                    <div class="avatar-sm mx-auto">
                                                        <div class="avatar-title fs-18 bg-primary-subtle  text-primary  text-primary rounded-circle">
                                                            <i class="bx bx-current-location"></i>
                                                        </div>
                                                    </div>

                                                    <h5 class="fs-11 text-uppercase text-truncate mt-3 mb-0"><a href="#" class="text-body stretched-link" onclick="getLocation()">Location</a></h5>
                                                </div>
                                            </div>
                                            {{-- <div class="swiper-slide d-block d-sm-none">
                                                <div class="text-center px-2">
                                                    <div class="avatar-sm mx-auto">
                                                        <div
                                                            class="avatar-title fs-18 bg-primary-subtle  text-primary  text-primary rounded-circle">
                                                            <i class="bx bxs-user-circle"></i>
                                                        </div>
                                                    </div>
                                                    <h5 class="fs-11 text-uppercase text-truncate mt-3 mb-0"><a href="#"
                                                            class="text-body stretched-link" data-bs-toggle="modal"
                                                            data-bs-target=".contactModal">Contacts</a></h5>
                                                </div>
                                            </div>

                                            <div class="swiper-slide d-block d-sm-none">
                                                <div class="text-center px-2">
                                                    <div class="avatar-sm mx-auto">
                                                        <div
                                                            class="avatar-title fs-18 bg-primary-subtle  text-primary  text-primary rounded-circle">
                                                            <i class="bx bx-microphone"></i>
                                                        </div>
                                                    </div>
                                                    <h5 class="fs-11 text-uppercase text-truncate mt-3 mb-0"><a href="#"
                                                            class="text-body stretched-link">Audio</a>
                                                    </h5>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="replyCard">
                        <div class="card mb-0">
                            <div class="card-body py-3">
                                <div class="replymessage-block mb-0 d-flex align-items-start">
                                    <div class="flex-grow-1">
                                        <h5 class="conversation-name"></h5>
                                        <p class="mb-0"></p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <button type="button" id="close_toggle" class="btn btn-sm btn-link mt-n2 me-n3 fs-18">
                                            <i class="bx bx-x align-middle"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end chat input section -->
            </div>
            <!-- end chat conversation section -->

            <!-- start User profile detail sidebar -->
            <div class="user-profile-sidebar">

                <div class="p-3 border-bottom">
                    <div class="user-profile-img">
                        <img src="assets/images/users/avatar-2.jpg" id="receiver_image_info" class="profile-img rounded receiver-image" alt="">
                        <div class="overlay-content rounded">
                            <div class="user-chat-nav p-2">
                                <div class="d-flex w-100">
                                    <div class="flex-grow-1">
                                        <button type="button" class="btn nav-btn text-white user-profile-show d-none d-lg-block">
                                            <i class="bx bx-x"></i>
                                        </button>
                                        <button type="button" class="btn nav-btn text-white user-profile-show d-block d-lg-none">
                                            <i class="bx bx-left-arrow-alt"></i>
                                        </button>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="dropdown">
                                            <button class="btn nav-btn text-white dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class='bx bx-dots-vertical-rounded'></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item d-flex justify-content-between align-items-center d-lg-none user-profile-show" href="#">View Profile <i class="bx bx-user text-muted"></i></a>
                                                <a class="dropdown-item d-flex justify-content-between align-items-center d-lg-none audio-call-btn" href="#">Audio <i class="bx bxs-phone-call text-muted"></i></a>
                                                <a class="dropdown-item d-flex justify-content-between align-items-center d-lg-none video-call-btn" href="#">Video <i class="bx bx-video text-muted"></i></a>
                                                {{-- <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">Archive <i class="bx bx-archive text-muted"></i></a> --}}
                                                <a class="dropdown-item d-flex justify-content-between align-items-center mute-btn" data-type="mute" href="#">Muted <i class="bx bx-microphone-off text-muted"></i></a>
                                                <a class="dropdown-item d-flex justify-content-between align-items-center delete-thread-btn" id="delete-thread-btn" href="#">Delete <i class="bx bx-trash text-muted"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-auto p-3">
                                <h5 class="user-name mb-0 text-truncate" id="receiver_name_main_info">Victoria Lane
                                </h5>
                                <p class="fs-14 text-truncate user-profile-status mt-1 mb-0" id="receiver_status_main_info"><i class="bx bxs-circle fs-10 text-success me-1 ms-0"></i>
                                    Online</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End profile user -->

                <!-- Start user-profile-desc -->
                <div class="p-4 user-profile-desc" data-simplebar>
                    <div class="text-center border-bottom border-bottom-dashed">
                        <div class="d-flex gap-2 justify-content-center mb-4">
                            <button type="button" class="btn avatar-sm p-0">
                                <span class="avatar-title rounded bg-info-subtle  text-info text-info">
                                    <i class="bx bxs-message-alt-detail"></i>
                                </span>
                            </button>
                            <button type="button" class="btn avatar-sm p-0 favourite-btn">
                                <span class="avatar-title rounded bg-danger-subtle  text-danger text-body">
                                    <i class="bx bx-heart"></i>
                                </span>
                            </button>
                            <button type="button" class="btn avatar-sm p-0 audio-call-btn">
                                <span class="avatar-title rounded bg-success-subtle text-success">
                                    <i class="bx bxs-phone-call"></i>
                                </span>
                            </button>
                            <button type="button" class="btn avatar-sm p-0 video-call-btn" data-bs-toggle="modal">
                                <span class="avatar-title rounded bg-warning-subtle  text-warning text-warning">
                                    <i class="bx bx-video"></i>
                                </span>
                            </button>
                            {{-- <div class="dropdown">
                                <button class="btn avatar-sm p-0 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="avatar-title bg-primary-subtle  text-primary  text-primary rounded">
                                        <i class='bx bx-dots-horizontal-rounded'></i>
                                    </span>
                                </button>

                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">Archive <i class="bx bx-archive text-muted"></i></a>
                                    <a class="dropdown-item d-flex justify-content-between align-items-center mute-btn" href="#">Muted <i class="bx bx-microphone-off text-muted"></i></a>
                                    <a class="dropdown-item d-flex justify-content-between align-items-center delete-thread-btn" id="delete-thread-btn" href="#">Delete <i class="bx bx-trash text-muted"></i></a>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="text-muted pt-4">
                        <h5 class="fs-12 text-muted text-uppercase">Status :</h5>
                        <p class="mb-4" id="receiver_about_info">A professional profile is a brief summary of your
                            skills, strengths, and key
                            experiences.
                        </p>
                    </div>

                    <div class="pb-4 border-bottom border-bottom-dashed mb-4">
                        <h5 class="fs-12 text-muted text-uppercase mb-2">Info :</h5>
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <i class="ri-user-line align-middle fs-15 text-muted"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="fs-14 text-truncate mb-0" id="receiver_name_info"> Victoria Lane</h5>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mt-3">
                            <div class="flex-shrink-0">
                                <i class="ri-mail-line align-middle fs-15 text-muted"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="fs-14 text-truncate mb-0" id="receiver_email_info">bellacote@vhato.com</h5>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mt-3">
                            <div class="flex-shrink-0">
                                <i class="ri-phone-line align-middle fs-15 text-muted"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="fs-14 text-truncate mb-0" id="receiver_phone_info">+(345) 3216 48751</h5>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mt-3">
                            <div class="flex-shrink-0">
                                <i class="ri-map-pin-2-line align-middle fs-15 text-muted"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="fs-14 text-truncate mb-0" id="receiver_location_info">California, USA</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end user-profile-desc -->
            </div>
            <!-- end User profile detail sidebar -->
        </div>
        <!-- end user chat content -->
    </div>
    <!-- End User chat -->

    <!-- forward Modal -->
    <div class="modal fade forwardModal" tabindex="-1" role="dialog" aria-labelledby="forwardModalModalLabel" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content modal-header-colored border-0">
                <div class="modal-header">
                    <h5 class="modal-title text-white fs-16">Share this Message</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div>
                        <div class="replymessage-block mb-2" id="forward-message">
                            <h5 class="conversation-name">Jean Berwick</h5>
                            <p class="mb-0">Yeah everything is fine. Our next meeting tomorrow at 10.00 AM</p>
                        </div>
                    </div>
                    <hr class="my-4">
                    <div class="d-flex align-items-center px-1">
                        <div class="flex-grow-1">
                            <h4 class="mb-0 fs-11 text-muted text-uppercase">Contacts</h4>
                        </div>
                        <div class="flex-shrink-0">
                            <button type="button" id="share-btn" class="btn btn-sm btn-primary">Send</button>
                        </div>
                    </div>
                    <div>
                        <input type="hidden" name="message" id="message_shared_id" value="">
                        <select class="form-control bg-light border-0 pe-0 users-multiple" id="users" name="users[]" multiple="multiple">
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- forward Modal -->

    <!-- Start Add contact Modal -->
    <div class="modal fade" id="addContact-exampleModal" tabindex="-1" role="dialog" aria-labelledby="addContact-exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content modal-header-colored shadow-lg border-0">
                <div class="modal-header">
                    <h5 class="modal-title text-white fs-16" id="addContact-exampleModalLabel">Create Contact</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form>
                        <div class="mb-3">
                            <label for="addcontactemail-input" class="form-label">Email</label>
                            <input type="email" class="form-control" id="addcontactemail-input" placeholder="Enter Email">
                        </div>
                        <div class="mb-3">
                            <label for="addcontactname-input" class="form-label">Name</label>
                            <input type="text" class="form-control" id="addcontactname-input" placeholder="Enter Name">
                        </div>
                        <div class="mb-0">
                            <label for="addcontact-invitemessage-input" class="form-label">Invatation Message</label>
                            <textarea class="form-control" id="addcontact-invitemessage-input" rows="3" placeholder="Enter Message"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Invite</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Add contact Modal -->

    <!-- audiocall Modal -->
    <div class="modal fade audiocallModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border border-0 overflow-hidden">
                <div class="modal-body p-0">
                    <div class="text-center p-4 pb-0">

                        <div class="avatar-xl mx-auto mb-4">
                            <img src="{{ asset('assets/images/users/avatar-7.jpg') }}" alt="" class="img-thumbnail rounded-circle">
                        </div>
                        <div>
                            <h5 class="fs-22 text-truncate mb-0">Victoria Lane</h5>
                            <p class="text-muted">05:45</p>
                        </div>

                        <div class="d-flex justify-content-center align-items-center gap-3 mt-4">
                            <a href="" class="avatar-sm">
                                <div class="avatar-title bg-danger-subtle text-danger text-danger fs-20 rounded-circle">
                                    <i class="bx bx-video-recording"></i>
                                </div>
                            </a>
                            <a href="" class="avatar-sm">
                                <div class="avatar-title bg-success-subtle text-success fs-20 rounded-circle">
                                    <i class="bx bx-volume-full"></i>
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="avatar-sm">
                                <div class="avatar-title bg-info-subtle  text-info text-info fs-20 rounded-circle">
                                    <i class="bx bx-user-plus"></i>
                                </div>
                            </a>
                        </div>

                        <div class="mt-4">
                            <button type="button" class="btn btn-danger avatar-md call-close-btn rounded-circle" data-bs-dismiss="modal">
                                <span class="avatar-title bg-transparent fs-24">
                                    <i class="mdi mdi-phone-hangup"></i>
                                </span>
                            </button>
                        </div>
                    </div>

                    <div class="p-4 bg-primary-gradient mt-n4">
                        <div class="d-flex audio-call-menu">
                            <div class="flex-grow-1">
                                <button type="button" class="btn btn-light avatar-sm">
                                    <span class="avatar-title bg-transparent fs-20">
                                        <i class="ri-question-answer-line"></i>
                                    </span>
                                </button>
                            </div>
                            <div class="flex-shrink-0">
                                <button type="button" class="btn btn-light avatar-sm">
                                    <span class="avatar-title bg-transparent fs-20">
                                        <i class="bx bx-microphone-off"></i>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- audiocall Modal -->

    <!-- videocall Modal -->
    <div class="modal fade videocallModal" id="videocallModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" id="videocallModal-modal-dialog">
            <div class="modal-content border-0">
                <div class="modal-body p-0">
                    <div class="videocall-overlay"></div>
                    <div class="video-call-title position-absolute top-0 start-50 translate-middle-x mt-3 text-center call-details">
                        <h5 class="fs-22 text-truncate text-white" id="called-by">Victoria Lane</h5>
                        <div class="avatar-xl mx-auto mb-4">
                            <img src="{{ asset('assets/images/users/avatar-7.jpg') }}" alt="" class="img-thumbnail rounded-circle receiver-image">
                        </div>
                        <div class="badge text-primary fs-12 d-none" id="call_status">conecting
                            <span class="typing ms-2">
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot"></span>
                            </span>
                        </div>
                        <span class="badge text-white fs-12 d-none" id="timer">0 sec</span>
                    </div>

                    <div class="row mb-3" id="inputDiv">
                        <div class="col">
                            <input type="hidden" id="username" class="form-control" value="{{ Auth::user()->name }}" />
                        </div>
                        <div class="col">
                            <input type="hidden" id="roomname" class="form-control" />
                            <input type="hidden" id="duration" class="form-control" value="0" />
                        </div>
                    </div>


                    <div class="row" id="videoContainer" style="display: none;">
                        <div class="video-container">
                            <div id="localTrack" class="video-window video-call-profile"></div>
                        </div>

                        <div class="video-container">
                            <div id="video-chat-window" class="video-window"></div>
                        </div>
                    </div>

                    {{-- <img src="assets/images/users/avatar-2.jpg" alt="" class="videocallModal-bg">
                    <div>
                        <img src="assets/images/users/avatar-1.jpg" alt="" class="avatar-lg video-call-profile rounded">
                    </div> --}}

                    <div class="position-absolute start-0 end-0 bottom-0">
                        <div class="text-center">
                            <button type="button" class="btn btn-danger avatar-md call-close-btn rounded-circle" id="endCallBtn" data-bs-dismiss="modal">
                                <span class="avatar-title bg-transparent fs-24">
                                    <i class="mdi mdi-phone-hangup"></i>
                                </span>
                            </button>
                        </div>

                        <div class="p-4 bg-primary-gradient mt-n4">
                            <div class="d-flex gap-4 justify-content-center video-call-menu mt-2">
                                <a href="javascript:void(0);" class="btn btn-light avatar-sm rounded-circle">
                                    <span class="avatar-title bg-transparent fs-20">
                                        <i class="bx bx-microphone-off"></i>
                                    </span>
                                </a>
                                <a href="javascript:void(0);" class="btn btn-light avatar-sm rounded-circle me-4">
                                    <span class="avatar-title bg-transparent fs-20">
                                        <i class="bx bx-video-off"></i>
                                    </span>
                                </a>
                                <a href="javascript:void(0);" class="btn btn-light avatar-sm rounded-circle ms-5">
                                    <span class="avatar-title bg-transparent fs-20">
                                        <i class="bx bx-volume-full"></i>
                                    </span>
                                </a>
                                <a href="javascript:void(0);" class="btn btn-light avatar-sm rounded-circle">
                                    <span class="avatar-title bg-transparent fs-20">
                                        <i class="bx bx-refresh"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->

    <!-- incoming call -->
    <div class="modal fade" id="incomingCallModal" tabindex="-1" role="dialog" aria-labelledby="incomingCallModalTitle" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Call Alert</h5>
                </div>
                <div class="modal-body">
                    <div id="incomingCallNotification" style="display: none;" class="incoming-call-notification">
                        <p>Incoming video call from <span id="callerId"></span></p>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-success" id="acceptCallBtn">Accept</button>
                            <button id="declineCallBtn" class="btn btn-danger">Decline</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- ended call -->
    <div class="modal fade" id="callEndedModal" tabindex="-1" role="dialog" aria-labelledby="callEndedModalTitle">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Call Ended</h5>
                    <button type="button" class="close btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="incoming-call-notification">
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-danger w-100" type="button" disabled>Call Ended</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Camer picture capture Modal -->
    <div class="modal fade cameraModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-body p-0">
                    <video id="videoElement" autoplay></video>
                    <canvas id="canvas" width="350" style="display:none;"></canvas>
                    <div class="position-absolute start-0 end-0 bottom-0">
                        <div class="text-center">
                            <button type="button" class="btn btn-success avatar-md call-close-btn rounded-circle" id="snap">
                                <span class="avatar-title bg-transparent fs-24">
                                    <i class="mdi mdi-camera-account"></i>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script src="{{ asset('assets/js/timer.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            let isMobile = false;
            var Images = [];
            var Files = [];
            var Audios = [];
            var media = [];
            var baseUrl = "http://127.0.0.1:8000/";
            var mediaUrl = '{{ $Media }}';
            var threadId;
            var callLogId;
            var currentUserId = `{{ Auth::id() }}`;
            toastr.options = {
                closeButton: true
                , debug: false
                , newestOnTop: false
                , progressBar: false
                , positionClass: "toast-top-center"
                , preventDuplicates: false
                , showDuration: "1000"
                , hideDuration: "1000"
                , timeOut: "5000"
                , extendedTimeOut: "1000"
                , showEasing: "swing"
                , hideEasing: "linear"
                , showMethod: "fadeIn"
                , hideMethod: "fadeOut"
                , position: "top-center"
                , width: "450px"
            , };

            document.addEventListener("DOMContentLoaded", () => {
                const localTrackContainer = document.getElementById("localTrack");
                const videoChatWindow = document.getElementById("video-chat-window");
                var page = 1; // Initial page number
                var accessToken = "";
                var isCallStarted = false;
                var isMuted = false;
                var isCameraOn = true;
                var room = null;
                var localVideoTrack = null;
                var remoteVideoTracks = [];
                var username = "";
                var roomName = "";
                var localTrackAttached = false;
                var incomingCall = false;
                var callerId = "";
                var socketId = "";
                var fromSocketId = "";
                var callType = '';
                var type = '';

                const socket = io("http://localhost:3000", {
                    transports: ["websocket"]
                , });

                socket.on("connect", async (soc) => {
                    console.log("Socket connected");
                    // console.log(socket.id);
                    await updateUserChatStatus("online");
                    await getThreadUsers();
                    await getContacts();
                    await getUnreadMessageCount();
                    await updateUserToken(socket.id);
                });

                socket.on("disconnect", () => {
                    // console.log("Socket disconnected");
                    updateUserChatStatus("offline");
                });
                socket.on("socket disconnect", () => {
                    // console.log("Socket disconnected");
                    updateUserChatStatus("offline");
                });

                socket.on("start typing", (response) => {
                    // console.log(response);
                    $("#typing-user").removeClass("d-none");
                });

                socket.on("stop typing", (response) => {
                    console.log("stop typing");
                    // if (response === $('socket_id').val()) {
                    //     $("#typing-user").addClass("d-none");
                    // }
                    $("#typing-user").addClass("d-none");
                });

                socket.on("status updated", async () => {
                    console.log(`status updated`);
                    await getThreadUsers();

                    // let threadId = $("#threadId").val();
                    if (threadId) {
                        // console.log(`thread id for fetching user details  ${threadId}`);
                        await getUserDetails(threadId, 2);
                    }
                });
                socket.on('update thread list', async (response) => {
                    // console.log(response);
                    await getThreadUsers();
                });

                socket.on("chat message", async (response) => {
                    // console.log("Received message:", response);

                    await processMessages(response.message, 0
                        , 'single'); // loaded new message so that single 

                });

                //if user miss mesages
                socket.on("chat message update", async (response) => {
                    // console.log("message:", response);//

                    fetchData("get-users", async function(error, users) {
                        if (error !== null) {
                            console.log("Something went wrong: " + error);
                        } else {
                            await renderUsersLastMessages(users);
                        }
                    });
                });

                socket.on("incoming-call", (data) => {
                    incomingCall = true;
                    callerId = data.from;
                    roomName = data.roomName;
                    // fromSocketId = data.fromSocketId;
                    // socketId = data.socketId;

                    socketId = data.fromSocketId;
                    fromSocketId = data.socketId;
                    // console.log(`Incoming call from ${data.from}`);
                    showIncomingCallNotification();
                    $("#callEndedModal").modal("hide");
                    $("#incomingCallModal").modal("toggle");
                });

                socket.on("call-ends", (data) => {
                    // console.log(`video call ended by other user`);
                    endVideoCall("end");

                    updateCallLogs();
                });
                socket.on("call-declined", (data) => {
                    // console.log(`video call ended by other user`);
                    endVideoCall("declined");
                    updateCallLogs();

                });
                socket.on("call-started", (data) => {
                    // console.log(data);
                    $('#timer').removeClass('d-none');
                    startTimer();
                });

                async function updateUserToken(token) {
                    const response = await axios.post(
                        baseUrl + "update-socekt-token", {
                            token: token
                        , }, {
                            headers: {
                                "Content-Type": "multipart/form-data"
                            , }
                        , }
                    );

                    // console.log(response);
                    if (response.status == 200) {
                        $("#my_socket_id").val(token);
                        return true;
                    }
                }

                // #------------------- Socket code End ---------#

                document.getElementById("chat-input").addEventListener("focus", function() {
                    let roomId = "room-" + threadId;
                    socket.emit("start typing", roomId);
                });
                document.getElementById("chat-input").addEventListener("blur", function() {
                    let roomId = "room-" + threadId;
                    socket.emit("stop typing", roomId);
                });

                const dropdownItems = document.querySelectorAll('.dropdown-item-user-status');
                const statusIcon = document.getElementById('statusIcon');
                const statusText = document.getElementById('statusText');

                dropdownItems.forEach(item => {
                    item.addEventListener('click', async function(event) {
                        event.preventDefault();

                        // Get the selected status and icon class
                        const selectedStatus = this.getAttribute('data-status');
                        const selectedValue = this.getAttribute('data-value');
                        const selectedIconClass = this.getAttribute('data-icon');

                        // Update the dropdown display
                        statusText.textContent = selectedStatus;
                        statusIcon.className =
                            `bx bxs-circle ${selectedIconClass} fs-10 align-middle`;

                        // Save the selected value (example using localStorage)
                        await updateUserChatStatus(selectedValue);
                        socket.emit("status updated");
                    });
                });

                // ---------------------START CODE  VIDEO CALL -----------//
                async function getAccessToken() {
                    if (username && roomName) {
                        try {
                            const response = await axios.post(
                                baseUrl + "token", {
                                    username: username
                                    , roomName: roomName
                                , }, {
                                    headers: {
                                        "Content-Type": "multipart/form-data"
                                    , }
                                , }
                            );
                            accessToken = response.data;
                            return accessToken;
                        } catch (error) {
                            console.error("Error fetching access token:", error);
                            return false;
                        }
                    } else {
                        toastr.warning("Please enter your name and room name.");
                    }
                }

                document.querySelectorAll('.video-call-btn').forEach(btn => {

                    btn.addEventListener("click", async () => {
                        // console.log('clicked');
                        callType = 'video';
                        type = 'outgoing';
                        if (isCallStarted) {
                            toastr.success("Another call already in progress");
                            // $("#videocallModal").modal("show");
                        } else {
                            $('#call_status').removeClass('d-none');

                            let videoRoom = "call-" + getRandomInt();
                            $("#roomname").val(videoRoom);
                            roomName = videoRoom;
                            username = $("#username").val();
                            $(this).prop("disabled", true);
                            // $("#startVideoCallBtn").prop("disabled", true);
                            let callResult = await startCall();
                            // console.log(callResult);
                            if (callResult) {
                                $("#videocallModal").modal("toggle");
                            }
                        }
                    });
                });

                document.querySelectorAll('.audio-call-btn').forEach(btn => {

                    btn.addEventListener("click", async () => {
                        console.log('clicked');
                        callType = 'audio';
                        type = 'outgoing';

                        if (isCallStarted) {
                            toastr.success("Another call already in progress");
                            $("#videocallModal").modal("show");
                        } else {
                            $('#call_status').removeClass('d-none');

                            let videoRoom = "call-" + getRandomInt();
                            $("#roomname").val(videoRoom);
                            roomName = videoRoom;
                            username = $("#username").val();

                            // $("#startVideoCallBtn").prop("disabled", true);
                            $(this).prop("disabled", true);
                            let callResult = await startCall();
                            // console.log(callResult);
                            if (callResult) {
                                $("#videocallModal").modal("toggle");
                            }
                        }
                    });
                });



                function getRandomInt() {
                    const d = new Date();
                    return d.getMinutes() + d.getSeconds() + d.getMilliseconds();
                }

                function scrollToHalf() {
                    chatHistoryBody.scrollTo(0, chatHistoryBody.scrollHeight / 2);
                }

                async function startCall() {
                    if (!isCallStarted) {
                        let result = await getAccessToken();
                        // console.log(result);
                        if (result) {
                            isCallStarted = true;
                            let roomResult = await connectToRoom();
                            if (roomResult == false) {
                                isCallStarted = false;
                                toastr.warning(
                                    "Please connect camera and mic and try again"
                                );
                                // $("#startBtn").html("Start");
                                $("#startVideoCallBtn").prop("disabled", false);
                                return false;
                            } else {
                                console.log("Starting call...");

                                // console.log(`incomingCall ${incomingCall}`);
                                if (incomingCall == false) {
                                    let userResult = await getUserSocketDetails();
                                    if (userResult.chat_status == "online") {
                                        socket.emit("call-user", {
                                            from: username
                                            , roomName: roomName
                                            , socketId: socketId
                                            , fromSocketId: fromSocketId
                                        });

                                        saveCallLogs(userResult.name, userResult.id);

                                    } else {
                                        $("#startVideoCallBtn").prop("disabled", false);
                                        toastr.warning("Sorry ,User is offline");
                                        isCallStarted = false;
                                        return false;
                                    }
                                }
                                if (isMobile == false) {
                                    $("#videocallModal-modal-dialog").addClass(
                                        "desktop-view"
                                    );
                                }
                                toggleCallControls(true);
                                return true;
                            }
                        }
                    }
                }

                function endVideoCall(type) {
                    if (isCallStarted) {
                        if (localVideoTrack) {
                            localVideoTrack.stop();
                            localVideoTrack.detach().forEach((element) => element.remove());
                            localVideoTrack = null;
                        }
                        if (room) {
                            room.disconnect();
                            room = null;
                        }
                        callType = '';
                        isCallStarted = false;
                        isMuted = false;
                        isCameraOn = true;
                        remoteVideoTracks = [];
                        localTrackAttached = false;
                        incomingCall = false;
                        document.getElementById("video-chat-window").innerHTML = "";
                        document.getElementById("localTrack").innerHTML = "";
                        document.getElementById("roomname").value = "";
                        // document.getElementById("username").value = "";
                        document.getElementById("inputDiv").style.display = "block";
                        // toggleCallControls(false);
                        document.getElementById("videoContainer").style.display = "none";

                        // $("#endCallBtn").addClass("d-none");
                        // $("#startBtn").removeClass("d-none");
                        // $("#startBtn").html("Start");
                        $('#videoContainer').removeClass('connect');
                        $("#startVideoCallBtn").prop("disabled", false);

                        $("#acceptCallBtn").html("Accept");
                        $("#acceptCallBtn").prop("disabled", false);

                        $("#videocallModal").modal("hide");
                        $("#callAlertDiv").addClass("d-none");
                        if (type == "end") {
                            $("#incomingCallModal").modal("hide");
                            $("#callAlertDiv").addClass("d-none");
                            $("#callEndedModal").modal("show");
                        }
                        if (type == "declined") {
                            toastr.warning("User declined the call!");
                        }
                        if (isMobile == false) {
                            $("#callModal-modal-dialog").removeClass(
                                "desktop-view"
                            );
                        }
                        $('#timer').addClass('d-none');
                        resetTimer();
                    }
                }

                function attachTracks(tracks, container) {
                    tracks.forEach((track) => {
                        container.appendChild(track.attach());
                        // console.log(`Attached ${track.kind} track to container.`);
                    });
                }

                function attachParticipantTracks(participant, container) {
                    const tracks = getTracks(participant);
                    attachTracks(tracks, container);
                }

                function detachTracks(tracks) {
                    tracks.forEach((track) => {
                        track.detach().forEach((element) => element.remove());
                        // console.log(`Detached ${track.kind} track from container.`);
                    });
                }

                function detachParticipantTracks(participant) {
                    const tracks = getTracks(participant);
                    detachTracks(tracks);
                }

                function getTracks(participant) {
                    return Array.from(participant.tracks.values())
                        .filter((publication) => publication.track)
                        .map((publication) => publication.track);
                }

                async function connectToRoom() {
                    // console.log(roomName);
                    try {
                        let video = (callType == 'video'); // Set video to true or false based on callType

                        // Connect to the Twilio room with appropriate options
                        room = await Twilio.Video.connect(accessToken, {
                            name: roomName
                            , video: video, // Enable or disable video based on callType
                            audio: true, // Always enable audio
                        });

                        // console.log(`Successfully joined a Room: ${room}`);
                        document.getElementById("inputDiv").style.display = "none";

                        // If it's a video call, create and attach the local video track
                        if (video) {
                            const localTrackContainer = document.getElementById("localTrack");
                            if (!localTrackAttached) {
                                localVideoTrack = await Twilio.Video.createLocalVideoTrack();
                                localTrackContainer.appendChild(localVideoTrack.attach());
                                localTrackAttached = true;
                            }
                        }

                        // Handle participant connection events
                        room.on("participantConnected", (participant) => {
                            $('#call_status').addClass('d-none');
                            $('#videoContainer').addClass('connect');
                            // console.log(`Participant "${participant.identity}" connected`);
                            participant.on("trackSubscribed", trackSubscribed);
                            participant.on("trackUnsubscribed", trackUnsubscribed);
                        });

                        // Handle participant disconnection events
                        room.on("participantDisconnected", (participant) => {
                            // console.log(`Participant "${participant.identity}" disconnected`);
                            detachParticipantTracks(participant);
                        });

                        // Attach tracks for already connected participants
                        room.participants.forEach((participant) => {
                            // console.log(`Participant already connected: ${participant.identity}`);
                            attachParticipantTracks(participant, videoChatWindow);
                            participant.on("trackSubscribed", trackSubscribed);
                            participant.on("trackUnsubscribed", trackUnsubscribed);
                        });

                    } catch (error) {
                        console.error(`Unable to connect to Room: ${error.message}`);
                        return false;
                    }
                }


                function trackSubscribed(track) {
                    if (track.kind === "video") {
                        remoteVideoTracks.push(track);
                        videoChatWindow.appendChild(track.attach());
                        // console.log(`Attached remote video track: ${track.sid}`);
                    }
                    if (track.kind === "audio") {
                        track.attach();
                        // console.log(`Attached remote audio track: ${track.sid}`);
                    }
                    // $("#startVideoCallBtn").addClass("d-none");
                    // $("#endCallBtn").removeClass("d-none");
                }

                function trackUnsubscribed(track) {
                    remoteVideoTracks = remoteVideoTracks.filter(
                        (t) => t.sid !== track.sid
                    );
                    track.detach().forEach((element) => element.remove());
                    // console.log(`Detached remote video track: ${track.sid}`);
                }

                function toggleMute() {
                    isMuted = !isMuted;
                    room.localParticipant.audioTracks.forEach((publication) => {
                        if (publication.track) {
                            publication.track.enable(!isMuted);
                        }
                    });
                }

                function toggleCamera() {
                    isCameraOn = !isCameraOn;
                    room.localParticipant.videoTracks.forEach((publication) => {
                        if (publication.track) {
                            publication.track.enable(isCameraOn);
                        }
                    });
                }

                document
                    .getElementById("acceptCallBtn")
                    .addEventListener("click", async () => {
                        $("#acceptCallBtn").html("Connecting please wait......");
                        $("#acceptCallBtn").prop("disabled", true);
                        $('#called-by').html(callerId);
                        // $("#username").val("{{ Auth::user()->name }}");
                        username = $("#username").val();
                        await startCall();
                        socket.emit("call-started", {
                            roomId: "room-" + 1
                        });
                        $("#incomingCallModal").modal("toggle");
                        $("#videocallModal").modal("toggle");
                        $('#videoContainer').addClass('connect');

                        $('#timer').removeClass('d-none');
                        startTimer();
                    });

                document
                    .getElementById("declineCallBtn")
                    .addEventListener("click", async () => {
                        $("#incomingCallModal").modal("toggle");
                        //fire socket event for user to know call rejected
                        socket.emit("call-declined", {
                            fromSocketId: fromSocketId
                            , socketId: socketId
                        , });
                    });

                // end call btn
                document
                    .getElementById("endCallBtn")
                    .addEventListener("click", async () => {
                        //fire socket event for user to know call rejected
                        socket.emit("call-ended", {
                            fromSocketId: fromSocketId
                            , socketId: socketId
                        , });
                    });

                function showIncomingCallNotification() {
                    document.getElementById("callerId").textContent = callerId;
                    document.getElementById("incomingCallNotification").style.display =
                        "block";
                }

                function toggleCallControls(callStarted) {
                    if (callStarted) {
                        // document.getElementById("controlsContainer").style.display = "flex";
                        document.getElementById("videoContainer").style.display = "flex";
                        // document.querySelector('.controls-container button:nth-child(1)').textContent = isMuted ? "Unmute" : "Mute";
                        // document.querySelector('.controls-container button:nth-child(2)').textContent = isCameraOn ? "Turn Camera Off" : "Turn Camera On";
                    } else {
                        // document.getElementById("controlsContainer").style.display =
                        //     "block";
                        document.getElementById("videoContainer").style.display = "none";
                    }
                }

                $("#videocallModal").on("hidden.bs.modal", function(e) {
                    if (isCallStarted) {
                        $("#callAlertDiv").removeClass("d-none");
                    }
                });
                $("#videocallModal").on("shown.bs.modal", function(e) {
                    if (isCallStarted) {
                        $("#callAlertDiv").addClass("d-none");
                    }
                });


                async function saveCallLogs(toUser, toUserId) {
                    try {
                        const {
                            data
                        } = await axios.post(
                            baseUrl + "save-call-logs", {
                                fromUser: username
                                , toUser: toUser
                                , roomName: roomName
                                , threadId: threadId
                                , toUserId: toUserId
                                , callType: callType
                                , type: type
                            }
                        );
                        // console.log(data);
                        return callLogId = data.data.id;
                    } catch (err) {
                        console.log(err);

                    }
                }

                async function updateCallLogs() {
                    // console.log(callLogId);
                    try {
                        const {
                            data
                        } = await axios.post(
                            baseUrl + "save-call-logs", {
                                id: callLogId
                                , duration: $('#duration').val()
                            }
                        );
                        console.log(data);
                    } catch (err) {
                        console.log(err);

                    }
                }
                // ---------------------END CODE  VIDEO CALL -----------//

                // ------------------------- DELETE chat and mute users code START -------------//

                document.querySelectorAll('.mute-btn').forEach(btn => {
                    btn.addEventListener("click", async () => {
                        const currentType = btn.getAttribute('data-type');
                        if (currentType === 'mute') {
                            Swal.fire({
                                title: "Are you sure?"
                                // , text: "You won't received any notification!"
                                , icon: "warning"
                                , showCancelButton: true
                                , confirmButtonColor: "#3085d6"
                                , cancelButtonColor: "#d33"
                                , confirmButtonText: "Yes, Mute it!"
                            }).then(async (result) => {
                                muUnMute(currentType);
                            });
                        } else {
                            muUnMute(currentType);
                        }
                    });
                });

                async function muUnMute(currentType) {
                    const muteHTML = `Muted <i class="bx bx-microphone-off text-muted"></i>`;
                    const unMuteHTML = `Un-Muted <i class="bx bx-microphone text-muted"></i>`;
                    try {
                        // Get the current type from the button's data attribute
                        const newType = currentType === 'un-mute' ? 'mute' : 'un-mute';
                        const response = await axios.post(
                            baseUrl + "mute-user", {
                                threadId: threadId
                                , type: currentType
                            }
                        );
                        const {
                            data
                        } = response;

                        if (data.status === 200) {
                            // Update the clicked button
                            document.querySelectorAll('.mute-btn').forEach(button => {
                                if (newType === 'mute') {
                                    button.innerHTML = muteHTML;
                                    button.setAttribute('data-type', 'mute');
                                } else {
                                    button.innerHTML = unMuteHTML;
                                    button.setAttribute('data-type', 'un-mute');
                                }
                            });
                            toastr.success(data.message);
                        } else if (data.status === 400) {
                            toastr.warning(data.message);
                        }
                    } catch (error) {
                        console.error(error);
                    }
                }


                document.getElementById('delete-thread-btn').addEventListener('click', async () => {
                    Swal.fire({
                        title: "Are you sure?"
                        , icon: "warning"
                        , showCancelButton: true
                        , confirmButtonColor: "#3085d6"
                        , cancelButtonColor: "#d33"
                        , confirmButtonText: "Yes, delete it!"
                    }).then(async (result) => {
                        if (result.isConfirmed) {
                            try {
                                const {
                                    data
                                } = await axios.post(
                                    baseUrl + "delete-thread", {
                                        threadId: threadId
                                    }
                                );

                                if (data.status == 200) {
                                    $('#chat-body').addClass('d-none');
                                    toastr.success(data.message);
                                  await  getThreadUsers();
                                }
                                if (data.status == 400) {
                                    toastr.warning(data.message);
                                }
                            } catch (error) {
                                console.log(error);
                            }
                        }
                    });

                });

                document.getElementById('delete-chat-btn').addEventListener('click', async () => {
                    Swal.fire({
                        title: "Are you sure?"
                        // , text: "You won't be able to revert this!"
                        , icon: "warning"
                        , showCancelButton: true
                        , confirmButtonColor: "#3085d6"
                        , cancelButtonColor: "#d33"
                        , confirmButtonText: "Yes, delete it!"
                    }).then(async (result) => {
                        if (result.isConfirmed) {
                            try {
                                const {
                                    data
                                } = await axios.post(
                                    baseUrl + "delete-chat", {
                                        id: threadId
                                        , type: 'all'
                                    }
                                );
                                toastr[data.status == 200 ? 'success' : 'warning'](data.message);
                                data.status == 200 ? $('#users-conversation').html('') : null;
                            } catch (error) {
                                console.log(error);
                            }
                        }
                    });

                });

                // ------------------------- DELETE chat and mute users code END -------------//
                var v = !1
                    , g = "users-chat"
                    , o = "assets/images/users/user-dummy-img.jpg"
                    , d = "users"
                    , s = window.location.origin + "/chat/public/assets/js/dir/"
                    , u = ""
                    , m = '{{ Auth::user()->id }}';

                function initializeChat() { // old name a
                    var a = document.getElementsByClassName("user-chat");
                    document.querySelectorAll(".chat-user-list li a").forEach(function(e) {
                            e.addEventListener("click", function(e) {
                                a.forEach(function(e) {
                                    e.classList.add("user-chat-show");
                                });
                                var t = document.querySelector(".chat-user-list li.active");
                                t && t.classList.remove("active"), this.parentNode.classList.add("active");
                            });
                        }), document
                        .querySelectorAll(".sort-contact ul li")
                        .forEach(function(e) {
                            e.addEventListener("click", function(e) {
                                a.forEach(function(e) {
                                    e.classList.add("user-chat-show");
                                });
                            });
                        }), document
                        .querySelectorAll(".user-chat-remove")
                        .forEach(function(e) {
                            e.addEventListener("click", function(e) {
                                a.forEach(function(e) {
                                    e.classList.remove("user-chat-show");
                                });
                            });
                        });
                    return true;

                }

                $('#copyClipBoard').removeClass('show');
                document.getElementById("copyClipBoard").style.display = "none";
                // document.getElementById("copyClipBoardChannel").style.display ="none";


                // Assuming Axios is included in your project
                function fetchData(endpoint, callback) { // old name e
                    axios.get(baseUrl + endpoint)
                        .then(function(response) {
                            callback(null, response.data.data);
                        })
                        .catch(function(error) {
                            // console.log(error);
                            callback(error.response.status, null);
                        });
                }


                function displayChat() { // old name r 
                    if (d === "users") {
                        document.getElementById("users-chat").style.display = "block";
                    } else {
                        document.getElementById("users-chat").style.display = "none";
                    }
                    return true;
                }


                // Load users from users.json
                window.getThreadUsers = function() {
                    fetchData("get-users", function(error, users) {
                        console.log(users);
                        if (error !== null) {
                            console.log("Something went wrong: " + error);
                        } else {
                            document.getElementById("favourite-users").innerHTML = '';
                            users.forEach(function(user, index) {
                                var profileImg = user.image ?
                                    `<img src="${mediaUrl}${user.image}" class="rounded-circle avatar-xs" alt=""><span class="user-status ${user.chat_status}"></span>` :
                                    `<div class="avatar-xs"><span class="avatar-title rounded-circle bg-primary text-white"><span class="username">${user.nickname}</span><span class="user-status ${user.chat_status}"></span></span></div>`;

                                var messageCountBadge = user.unread_messages ?
                                    `<span class="badge badge-soft-danger rounded p-1 fs-10">${user.unread_messages}</span>` :
                                    "";

                                var linkTag = user.messagecount ?
                                    `<a href="javascript: void(0);" class="unread-msg-user">` :
                                    `<a href="javascript: void(0);">`;

                                var activeClass = user.id === 1 ? "active" : "";
                                var lastMessage = renderIcon(user);
                                console.log('lastMessage');
                                // console.log(lastMessage);

                                document.getElementById("favourite-users").innerHTML +=
                                    `<li id="contact-id-${user.id}" data-name="favorite" data-threadId="${user.id}" data-token="${user.token}" class="${activeClass}">
                                        ${linkTag}
                                        <div class="d-flex align-items-center">
                                            <div class="chat-user-img online align-self-center me-2 ms-0">
                                                ${profileImg}
                                            </div>
                                            <div class="overflow-hidden me-2">
                                                <p class="text-truncate chat-username mb-0">${user.name}</p>
                                                <p class="text-truncate text-muted fs-13 mb-0" id="contact-last-message-${user.token}" >${lastMessage}</p>
                                            </div>
                                            <div class="ms-auto" id="contact-id-unread-${user.token}">
                                            ${messageCountBadge}
                                            </div>
                                        </div>
                                    </a>
                                    </li>`;
                            });

                            initializeChat();

                            // Add click event listeners to user list items
                            document.querySelectorAll("#favourite-users li").forEach(
                                function(li) {
                                    li.addEventListener("click", async function(event) {
                                        g = "users-chat";
                                        var userId = li.getAttribute("id");
                                        // console.log(`user-id ${userId}`);

                                        let oldRoomId = "room-" + threadId;
                                        socket.emit("stop typing", oldRoomId);
                                        // let liElement = event.target.closest('li');
                                        // let threadId = li.getAttribute('data-threadId');
                                        threadId = li.getAttribute('data-threadId');
                                        let threadToken = li.getAttribute('data-token');



                                        await getUserDetails(
                                            threadId, 1); //g et user details using thread id
                                        d = "users";

                                        $(`#contact-id-unread-${threadToken}`).html('');
                                        await displayChat();

                                    });
                                });
                        }
                    });
                }

                window.getContacts = function(key = '') {
                    // console.log(key)
                    // Load contacts from contacts.json
                    fetchData(`get-contacts?key=${key}`, function(error, contacts) {
                        if (error !== null) {
                            // console.log("Something went wrong: " + error);
                        } else {
                            // console.log(contacts.data);
                            document.getElementsByClassName("sort-contact")[0].innerHTML = '';
                            var sortedContacts = contacts.sort(function(a, b) {
                                return a.name.localeCompare(b.name);
                            });

                            var lastInitial = "";
                            sortedContacts.forEach(function(contact) {
                                var profileImg = contact.profile ?
                                    `<img src="${mediaUrl}${contact.profile}" class="img-fluid rounded-circle" alt="">` :
                                    `<span class="avatar-title rounded-circle bg-primary fs-10">${contact.nickname}</span>`;

                                var contactHtml =
                                    `<li data-id="${contact.id}">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-2 contact-user">
                                                    <div class="avatar-xs">
                                                        ${profileImg}
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 contact-user">
                                                    <h5 class="fs-14 m-0">${contact.name}</h5>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <div class="dropdown">
                                                        <a href="#" class="text-muted dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="bx bx-dots-vertical-rounded align-middle"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Edit <i class="bx bx-pencil ms-2 text-muted"></i></a>
                                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Block <i class="bx bx-block ms-2 text-muted"></i></a>
                                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Remove <i class="bx bx-trash ms-2 text-muted"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>`;

                                var initial = contact.name.charAt(0).toUpperCase();
                                if (lastInitial !== initial) {
                                    document.getElementsByClassName("sort-contact")[0].innerHTML +=
                                        `<div class="mt-3">
                                                <div class="contact-list-title">${initial}</div>
                                                <ul id="contact-sort-${initial}" class="list-unstyled contact-list"></ul>
                                            </div>`;
                                    lastInitial = initial;
                                }

                                document.getElementById(`contact-sort-${initial}`).innerHTML +=
                                    contactHtml;
                            });


                            // Add click event listeners to contact list items
                            document.querySelectorAll(".sort-contact ul li .contact-user").forEach(function(
                                contactItem) {
                                // console.log(contactItem);

                                contactItem.addEventListener("click", async function(event) {
                                    let liElement = event.target.closest('li');
                                    let threadId = liElement.getAttribute('data-id');

                                    // console.log(threadId);
                                    let thread = await createThread(threadId);
                                    await getUserDetails(thread
                                        .id, 1); //g et user details using thread id
                                    d = "users";

                                    await displayChat();
                                    await getThreadUsers();
                                    if (thread.is_new == true) {
                                        let socket_id = $('#socket_id').val();
                                        socket.emit('update thread list', socket_id);
                                    }
                                });
                            });
                            $('.sort-contact').removeClass('faded');
                            initializeChat(); // Call function 'a' after loading contacts
                            return true;
                        }
                    });
                }

                window.getCallLogs = function() {
                    fetchData('get-calls', function(error, data) {
                        if (error !== null) {
                            console.log("Something went wrong: " + error);
                        } else {
                            let callList = data;
                            callList.forEach(function(call) {
                                const buttonHTML = call.callVideo ?
                                    `<button type="button" class="btn btn-link p-0 fs-20 stretched-link" ><i class="bx bx-video align-middle"></i></button>` :
                                    `<button type="button" class="btn btn-link p-0 fs-20 stretched-link" ><i class="bx bxs-phone-call align-middle"></i></button>`;

                                const avatarHTML = call.profile ?
                                    `<img src="${call.profile}" class="rounded-circle avatar-xs" alt="">` :
                                    `<div class="avatar-xs"><span class="avatar-title rounded-circle bg-danger text-white">${call.user_name.slice(0, 2).toUpperCase()}</span></div>`;

                                document.getElementById("callList").innerHTML +=
                                    `<li id="calls-id-${call.id}">
                                        <div class="d-flex align-items-center">
                                            <div class="chat-user-img flex-shrink-0 me-2">
                                                ${avatarHTML}
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="text-truncate mb-0">${call.user_name}</p>
                                                <div class="text-muted fs-12 text-truncate">
                                                    <i class="${call.callArrowType}"></i> ${call.date_time}
                                                </div>
                                            </div>
                                            <div class="flex-shrink-0 ms-3">
                                                <div class="d-flex align-items-center gap-3">
                                                    <div>
                                                        <h5 class="mb-0 fs-12 text-muted">${call.duration}</h5>
                                                    </div>
                                                    <div>
                                                        ${buttonHTML}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>`;
                            });

                            // document.querySelectorAll("#callList li").forEach(function(listItem) {
                            //     listItem.addEventListener("click", function() {
                            //         const id = listItem.getAttribute("id");
                            //         const name = listItem.querySelector(".text-truncate").innerHTML;
                            //         const avatarSrc = listItem.querySelector(".avatar-xs").getAttribute("src");

                            //         document.querySelector(".videocallModal .text-truncate").innerHTML = name;
                            //         document.querySelector(".audiocallModal .text-truncate").innerHTML = name;

                            //         const imgSrc = avatarSrc ?
                            //             avatarSrc :
                            //             o;

                            //         document.querySelector(".audiocallModal .img-thumbnail").setAttribute("src", imgSrc);
                            //         document.querySelector(".videocallModal .videocallModal-bg").setAttribute("src", imgSrc);
                            //     });
                            // });
                        }
                    });
                }

                let timeoutId;
                document.getElementById('searchContact').addEventListener('keyup', () => {
                    clearTimeout(timeoutId); // Clear any existing timeout
                    $('.sort-contact').addClass('faded');
                    timeoutId = setTimeout(async () => {
                        let key = $('#searchContact').val();
                        // console.log(key);
                        await getContacts(key); // Call your function after a delay

                    }, 500); // Adjust delay time (in milliseconds) as needed
                });


                var t = document.querySelector(".user-profile-sidebar");
                document.querySelectorAll(".user-profile-show").forEach(function(e) {
                    e.addEventListener("click", function(e) {
                        t.classList.toggle("d-block");
                    });
                }), window.addEventListener("DOMContentLoaded", function() {
                    var e = document.querySelector(
                        "#chat-conversation .simplebar-content-wrapper"
                    );
                    e.scrollTop = e.scrollHeight;
                });


                function scrollChatToBottom(e) { // old name h
                    var conversationWrapper = document.getElementById(e).querySelector(
                        "#chat-conversation .simplebar-content-wrapper");
                    var conversationList = document.getElementsByClassName("chat-conversation-list")[0];

                    var scrollHeight = conversationList ? conversationList.scrollHeight - window.innerHeight +
                        250 : 0;

                    if (scrollHeight) {
                        conversationWrapper.scrollTo({
                            top: scrollHeight
                            , behavior: "smooth"
                        });
                    }
                }

                async function getUserDetails(threadId, type) {
                    try {
                        const response = await axios.get(
                            baseUrl + "get-user-details/" + threadId
                        );
                        let {
                            data
                            , status
                        } = response.data;
                        // console.log(data);
                        if (status == 200) {
                            const muteHTML = `Muted <i class="bx bx-microphone-off text-muted"></i>`;
                            const unMuteHTML = `Un-Muted <i class="bx bx-microphone text-muted"></i>`;

                            $("#receiver_status_main_info").html(data.chat_status);
                            $("#receiverStatus").html(data.chat_status);
                            $('.user-status').removeClass().addClass('user-status').addClass(data.chat_status);

                            if (type == 1) { // load details

                                $('#chat-body').removeClass('d-none');
                                if (!isCallStarted) {
                                    socketId = data.socket_id;
                                    fromSocketId = $("#my_socket_id").val();
                                }

                                document.querySelectorAll('.mute-btn').forEach(button => {
                                    if (data.is_user_muted) {
                                        button.innerHTML = unMuteHTML;
                                        button.setAttribute('data-type', 'un-mute');
                                    } else {
                                        button.innerHTML = muteHTML;
                                        button.setAttribute('data-type', 'mute');
                                    }
                                });

                                $("#chat_socket_id").val(data.socket_id);
                                $("#socket_id").val(data.socket_id);
                                $("#receiverId").val(data.id);
                                $("#receiverName").html(data.name);

                                var profileImg = data.image ?
                                    `<img src="${mediaUrl}${data.image}" class="img-fluid rounded-circle" alt="" width="50px"><span class="user-status ${data.chat_status}"></span>` :
                                    `<span class="avatar-title rounded-circle bg-primary fs-10">${data.nickname}</span> <span class="user-status ${data.chat_status}"></span>`;

                                $("#receiverImage").html(profileImg);
                                $("#typing-user").html(
                                    `${data.name} is Typing<span class="typing ms-2"><span class="dot"></span><span class="dot"></span><span class="dot"></span></span>`
                                );

                                document.querySelector(".audiocallModal .text-truncate")
                                    .innerHTML = data.name;
                                document.querySelector(".videocallModal .text-truncate")
                                    .innerHTML = data.name;


                                const images = document.querySelectorAll('.receiver-image');

                                // Update the src attribute for each image
                                images.forEach(img => {
                                    let newSrc;
                                    if (data.image) {
                                        newSrc = mediaUrl + data.image;
                                    } else {
                                        newSrc =
                                            'https://png.pngtree.com/thumb_back/fw800/background/20240124/pngtree-this-is-a-profile-of-a-user-with-shadow-on-a-image_2957804.png';
                                    }
                                    img.src = newSrc;
                                });


                                $("#receiver_name_main_info").html(data.name);
                                $("#receiver_name_info").html(data.name);
                                $("#receiver_about_info").html(data.about);
                                $("#receiver_email_info").html(data.email);
                                $("#receiver_phone_info").html(data.phone);
                                $("#receiver_location_info").html(data.location);
                                $('#threadToken').val(data.thread_token);



                                await getMessages(threadId);
                                await getUnreadMessageCount();
                            }
                            return data;
                        }
                    } catch (error) {
                        console.log(error);
                    }
                }

                async function createThread(userId) {
                    try {
                        const response = await axios.post(baseUrl + "create-thread", {
                            userId: userId
                        , });
                        let {
                            data
                            , status
                        } = response.data;
                        if (status == 200) {
                            return data;
                        }
                    } catch (error) {
                        console.log(error);
                    }
                }

                async function renderUsersLastMessages(users) {
                    if (users.length > 0) {
                        users.forEach(async (thread) => {
                            await appendLastMessage(thread);
                        });
                    }
                }

                function appendLastMessage(thread) {

                    // console.log(thread);
                    let token = thread.token || $('#threadToken').val();
                    let message = renderIcon(thread);
                    $(`#contact-last-message-${token}`).html(message);

                    var messageCountBadge = thread.unread_messages ?
                        `<span class="badge badge-soft-danger rounded p-1 fs-10">${thread.unread_messages}</span>` :
                        '';

                    $(`#contact-id-unread-${token}`).html(messageCountBadge);
                    return true;
                }

                function renderIcon(thread) {
                    // console.log(thread);
                    let messageType = thread.message_type;
                    if (messageType == 1) {
                        return thread.last_message || thread.message;
                    } else if (messageType == 2) {
                        if (thread.file_type) {

                            if (thread.file_type == "mp4") {
                                return `<i class="ri-file-video-line"></i>`;
                            }
                            if (thread.file_type == "mp3") {
                                return `<i class="ri-folder-music-line"></i>`;
                            }
                            if (thread.file_type == "png" || thread.file_type == "jpg") {
                                return `<i class='ri-image-fill'></i>`;
                            }
                            if (thread.file_type == "pdf") {
                                return `<i class="ri-file-pdf-line"></i>`;
                            }
                            return `<i class="ri-file-line"></i>`;
                        }
                        if (thread.has_media) {
                            return `<i class="ri-gallery-line"></i>`;

                        }
                    } else if (messageType == 3) { //location
                        return `<i class="ri-map-pin-line"></i>`;
                    } else {
                        return thread.last_message ? thread.last_message : (thread.message ? thread.message : '----');
                    }
                }

                async function getUserSocketDetails() {
                    try {
                        let threadId = $("#threadId").val();
                        const response = await axios.get(
                            baseUrl + "get-user-details/" + threadId
                        );
                        let result = response.data;
                        if (result.status == 200) {
                            // console.log(result);
                            socketId = result.data.socket_id;
                            $("#socket_id").val(result.data.socket_id);
                            $("#chat_socket_id").val(result.data.socket_id);
                            return result.data;
                        }
                    } catch (error) {
                        console.log(error);
                    }
                }

                async function getUnreadMessageCount() {
                    try {
                        const response = await axios.get(baseUrl + "count-unread-messages");
                        let {
                            data
                            , status
                        } = response.data;
                        if (status == 200) {
                            $('#unread_messages_sidebar').html(data);
                            $('#unread_messages_header').html(`(${data})`);
                            return data;
                        }
                    } catch (error) {
                        console.log(error);
                    }
                }

                document.body.addEventListener("click", function() {
                        new bootstrap.Collapse(i, {
                            toggle: !1
                        }).hide();
                    }), i &&
                    i.addEventListener("shown.bs.collapse", function() {
                        new Swiper(".chatinput-links", {
                            slidesPerView: 3
                            , spaceBetween: 30
                            , breakpoints: {
                                768: {
                                    slidesPerView: 4
                                }
                                , 1024: {
                                    slidesPerView: 6
                                }
                            , }
                        , });
                    }), document
                    .querySelectorAll(".contact-modal-list .contact-list li")
                    .forEach(function(e) {
                        e.addEventListener("click", function() {
                            e.classList.toggle("selected");
                        });
                    }), (document.getElementById("favourite-users").onclick = function() {
                        // document.getElementById("chat-input").focus();
                    });

                var chatForm = document.querySelector("#chatinput-form"), // l
                    chatInput = document.querySelector("#chat-input"), // y
                    chatConversationList = document.querySelector(".chat-conversation-list"); // b
                document.querySelector(".chat-input-feedback");

                function x() {
                    var e = 12 <= new Date().getHours() ? "pm" : "am"
                        , t =
                        12 < new Date().getHours() ?
                        new Date().getHours() % 12 :
                        new Date().getHours()
                        , a =
                        new Date().getMinutes() < 10 ?
                        "0" + new Date().getMinutes() :
                        new Date().getMinutes();
                    return t < 10 ? "0" + t + ":" + a + " " + e : t + ":" + a + " " + e;
                }
                setInterval(x, 1e3);

                var w, n, S = 0
                    , c = 1
                    , k = "";
                document
                    .querySelector("#audiofile-input")
                    .addEventListener("change", function() {
                        var a = document.querySelector(".file_Upload");
                        (n = document.querySelector("#audiofile-input").files[0]), (k = URL.createObjectURL(n));
                        var e = new FileReader();
                        e.readAsDataURL(n), a && a.classList.add("show"), e.addEventListener(
                            "load"
                            , function() {
                                var e = n.name
                                    , t = Math.round(n.size / 1e6).toFixed(2);
                                (a.innerHTML =
                                    '<div class="card p-2 border mb-2 audiofile_pre d-inline-block position-relative">            <div class="d-flex align-items-center">                <div class="flex-shrink-0 avatar-xs ms-1 me-3">                    <div class="avatar-title bg-soft-primary text-primary rounded-circle">                        <i class="bx bx-headphone"></i>                    </div>                </div>                <div class="flex-grow-1 overflow-hidden">                <h5 class="fs-14 text-truncate mb-1">' +
                                    e +
                                    '</h5>                  <input type="hidden" name="downloadaudiodata" value="' +
                                    k +
                                    '"/>                        <p class="text-muted text-truncate fs-13 mb-0">' +
                                    t +
                                    'mb</p>                </div>                <div class="flex-shrink-0 ms-3">                    <div class="d-flex gap-2">                        <div>                        <i class="ri-close-line text-danger audioFile-remove"  id="remove-audioFile  onclick="removeAudioFile()"></i>                        </div>                    </div>                </div>            </div>          </div>'
                                ), (w = e),
                                // removeAudioFile(),
                                (Audios[c] = n);
                            }, !1
                        ), c++;
                    });
                var q, L, p, A = 1;
                document.querySelector("#attachedfile-input").addEventListener("change", async function() {
                    var a = document.querySelector(".file_Upload");
                    p = document.querySelector("#attachedfile-input").files[0];
                    Files = [];
                    Files.push(p);
                    // console.log(Files);

                    var fr = new FileReader();
                    fr.readAsDataURL(p);
                    fr.onload = function() {
                        // console.log(p);
                        var e = p.name;
                        var t = Math.round(p.size / 1e6).toFixed(2);
                        a.classList.add("show");
                        a.innerHTML = `
                                <div class="card p-2 border attchedfile_pre d-inline-block position-relative">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 avatar-xs ms-1 me-3">
                                            <div class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                <i class="ri-attachment-2"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <a href="" id="a"></a>
                                            <h5 class="fs-14 text-truncate mb-1">${e}</h5>
                                            <input type="hidden" name="downloaddata" value="${p}"/>
                                            <p class="text-muted text-truncate fs-13 mb-0">${t}mb</p>
                                        </div>
                                        <div class="flex-shrink-0 align-self-start ms-3">
                                            <div class="d-flex gap-2">
                                                <div>
                                                    <i class="ri-close-line text-muted attechedFile-remove" id="remove-attechedFile"  onclick="removeAttachedFile()"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                        q = e;
                        L = t;
                    };
                    A++;
                });

                removeimg = 1;
                document
                    .querySelector("#galleryfile-input")
                    .addEventListener("change", function() {
                        var s = document.querySelector(".file_Upload");
                        s.insertAdjacentHTML(
                            "beforeend", '<div class="profile-media-img image_pre"></div>'
                        );
                        var i = document.querySelector(".file_Upload .profile-media-img");
                        this.files && [].forEach.call(this.files, function(e, index) {

                            if (!/\.(jpe?g|png|gif)$/i.test(e.name))
                                return alert(e.name + " is not an image");
                            var t = new FileReader()
                                , a = "";
                            t.addEventListener("load", function() {
                                // console.log(t);
                                removeimg++;
                                if (s) {
                                    s.classList.add("show");
                                }
                                Images.push(e);
                                a += `
                                        <div class="media-img-list" id="remove-image-${removeimg}">
                                            <a href="#">
                                                <img src="${this.result}" alt="${e.name}" class="img-fluid">
                                            </a>
                                            <i class="ri-close-line image-remove" onclick="removeImage('remove-image-${removeimg}', '${Images.length - 1}')"></i>
                                        </div>
                                    `;
                                // console.log(Images.length);
                                i.insertAdjacentHTML("afterbegin", a);
                            });

                            t.readAsDataURL(e);
                        });
                    });

                // CAMERA IAMGE CAPUTRE AND PREVIEW 
                document.getElementById("snap").addEventListener("click", () => {
                    const video = document.getElementById('videoElement');
                    const canvas = document.getElementById('canvas');
                    const context = canvas.getContext('2d');

                    // Set canvas dimensions based on video dimensions
                    canvas.width = video.videoWidth;
                    canvas.height = video.videoHeight;

                    context.drawImage(video, 0, 0, canvas.width, canvas.height);
                    const dataURL = canvas.toDataURL('image/png');

                    const file = dataURLtoFile(dataURL, 'captured-image.png');
                    Images.push(file);

                    // Preview the captured image
                    previewCapturedImage(dataURL);
                });


                function previewCapturedImage(dataURL) {
                    $('.cameraModal').modal('toggle');
                    var s = document.querySelector(".file_Upload");
                    s.insertAdjacentHTML(
                        "beforeend", '<div class="profile-media-img image_pre"></div>'
                    );
                    var i = document.querySelector(".file_Upload .profile-media-img");

                    removeimg++;
                    var a =
                        '<div class="media-img-list" id="remove-image-' +
                        removeimg +
                        '"> <a href="#"> <img src="' +
                        dataURL +
                        '" alt="Captured Image" class="img-fluid"></a><i class="ri-close-line image-remove" onclick="removeImage(`remove-image-' +
                        removeimg + '`, `' + (Images.length - 1) + '`)"></i></div>';

                    i.insertAdjacentHTML("afterbegin", a);
                    s.classList.add("show");
                }


                function dataURLtoFile(dataurl, filename) {
                    var arr = dataurl.split(',')
                        , mime = arr[0].match(/:(.*?);/)[1]
                        , bstr = atob(arr[1])
                        , n = bstr.length
                        , u8arr = new Uint8Array(n);
                    while (n--) {
                        u8arr[n] = bstr.charCodeAt(n);
                    }
                    return new File([u8arr], filename, {
                        type: mime
                    });
                }
                // <---------------- END CAMERA IAMGE CAPUTRE AND PREVIEW ------->
                // Form submit code 
                chatForm.addEventListener("submit", async function(event) {
                    event.preventDefault();

                    // Variables for message content, user profile, and feedback elements
                    let messageContent, userProfile, feedbackElement;
                    let chatList, chatConversationList, messageList;
                    let attachedImage, attachedFile, attachedAudio;

                    // Initialize variables with elements from the DOM
                    chatList = g; // Assuming 'g' is the chat list container
                    chatConversationList = g; // Assuming 'g' is the chat conversation list container
                    messageList = g; // Assuming 'g' is the message list container
                    feedbackElement = document.querySelector(".chat-input-feedback");
                    attachedImage = document.querySelector(".image_pre");
                    attachedFile = document.querySelector(".attchedfile_pre");
                    attachedAudio = document.querySelector(".audiofile_pre");
                    messageContent = chatInput.value;

                    let threadId = $("#threadId").val();
                    let receiverId = $("#receiverId").val();
                    // userProfile = document.querySelector(".user-profile-show").innerHTML;

                    media = [...Audios, ...Images, ...Files];
                    // console.log(media);
                    // Check if the message is empty
                    if ((threadId && receiverId) && (messageContent !== '' || media.length > 0)) {
                        $("#submit-btn").attr("disable", true);

                        const {
                            status
                            , data
                        } = await axios.post(
                            baseUrl + "send-message", {
                                message: messageContent
                                , threadId: threadId
                                , receiverId: receiverId
                                , media: media
                                , latitude: $('#latitude').val()
                                , longitude: $('#longitude').val()
                            , }, {
                                headers: {
                                    "Content-Type": "multipart/form-data"
                                , }
                            , }
                        );

                        if (status == 200) {
                            await getUserSocketDetails();
                            let chat_socket_id = $("#chat_socket_id").val();
                            // console.log(data.data);
                            socket.emit("chat message", {
                                room_id: "room-" + threadId
                                , socket_id: chat_socket_id
                                , message: data.data
                            , });
                            media = [];
                            Images = [];
                            Audios = [];
                            Files = [];

                            // Clear input field, remove previews, and close reply card (if applicable)
                            $('.file_Upload').removeClass('show');
                            chatInput.value = "";
                            if (attachedImage) attachedImage.remove();
                            if (attachedFile) attachedFile.remove();
                            if (attachedAudio) attachedAudio.remove();
                            document.getElementById("galleryfile-input").value = "";
                            document.getElementById("attachedfile-input").value = "";
                            document.getElementById("audiofile-input").value = "";
                            document.getElementById("close_toggle").click();

                            $("#submit-btn").attr("disable", false);
                        }
                    } else {
                        // console.log(`message ${messageContent}`);
                        // console.log(`threadId ${threadId}`);
                        // console.log(`receiverId ${receiverId}`);
                        // console.log('invalid');
                        if (messageContent == '') {
                            feedbackElement.classList.add("show");
                        } else {
                            toastr.warning('Something went wrong');
                        }
                        setTimeout(function() {
                            feedbackElement.classList.remove("show");
                        }, 2000);
                    }
                });
                // End form submit code
                function formatMessageHTML(message) {
                    // console.log(message);

                    let hasMedia = message.has_media;
                    let showOptions = true;
                    let text = message.message;

                    let html = '<div class="ctext-wrap">';


                    if (showOptions === true) {
                        html += `<div class="align-self-start message-box-drop d-flex">
                                                    <div class="dropdown">
                                                        <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="ri-emotion-happy-line"></i>
                                                        </a>
                                                        <div class="dropdown-menu emoji-dropdown-menu" data-id="${message.id}">
                                                            <div class="hstack align-items-center gap-2 px-2 fs-25">
                                                                <a href="javascript:void(0);" data-value="💛">💛</a>
                                                                <a href="javascript:void(0);" data-value="🤣">🤣</a>
                                                                <a href="javascript:void(0);" data-value="😜">😜</a>
                                                                <a href="javascript:void(0);" data-value="😘">😘</a>
                                                                <a href="javascript:void(0);" data-value="😍">😍</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown">
                                                        <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="ri-more-2-fill"></i>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item d-flex align-items-center justify-content-between reply-message d-none" href="#" id="reply-message-${message.id}" data-bs-toggle="collapse" data-bs-target=".replyCollapse">Reply <i class="bx bx-share d-none ms-2 text-muted"></i></a>`;
                        html +=
                            (hasMedia) ? `<a class="dropdown-item d-flex align-items-center justify-content-between" href="media-dowload/message/${message.id}">Download <i class="bx bx-download ms-2 text-muted"></i></a>` : ``;

                        html += `<a class="dropdown-item d-flex align-items-center justify-content-between" href="#" onclick="forwardModal(${message.id})" >Forward <i class="bx bx-share-alt ms-2 text-muted"></i></a>
                                                            <a class="dropdown-item d-flex align-items-center justify-content-between copy-message" href="#" id="message-${message.id}">Copy <i class="bx bx-copy text-muted ms-2"></i></a>
                                                            <a class="dropdown-item d-flex align-items-center justify-content-between d-none" href="#">Bookmark <i class="bx bx-bookmarks text-muted ms-2"></i></a>
                                                            <a class="dropdown-item d-flex align-items-center justify-content-between d-none" href="#">Mark as Unread <i class="bx bx-message-error text-muted ms-2"></i></a>
                                                            <a class="dropdown-item d-flex align-items-center justify-content-between delete-item" data-id="${message.id}" href="#">Delete <i class="bx bx-trash text-muted ms-2"></i></a>
                                                        </div>
                                                    </div>
                                                </div>`;
                    }

                    if (text !== null && text !== '') {
                        html += `<div class="ctext-wrap-content" id="message-wrap-${message.id}">`;
                        if (message.message_type == 3 && message.lat && message.long) {

                            html += `<div class="message-img mb-0">
                                                        <div class="message-img-list">
                                                                            <div>
                                                                                <a class="popup-img d-inline-block" target="_blank" href="https://www.google.com/maps?q=${message.lat},${message.long}">
                                                                                    <img src="https://cdn4.iconfinder.com/data/icons/small-n-flat/24/map-marker-512.png" alt="" class="map-image">
                                                                                </a>
                                                                            </div>
                                                        </div>
                                            </div>`;
                        }
                        html += `<p class="mb-0 ctext-content message-${message.id}" >${text}</p>
                                    </div>`;
                    }


                    if (hasMedia) {
                        message.media.forEach(media => {
                            let file = mediaUrl + media.file;

                            // console.log(media);
                            const imageTypes = ["webp", "png", "PNG", "jpg", "jpeg"];
                            if (imageTypes.includes(media.file_type)) {

                                html += `<div class="message-img mb-0">
                                            <div class="message-img-list">
                                                                <div>
                                                                    <a class="popup-img d-inline-block" href="#">
                                                                        <img src="${file}" alt="" class="rounded border img-thumbnail">
                                                                    </a>
                                                                </div>
                                                                <div class="message-img-link">
                                                                    <ul class="list-inline mb-0">
                                                                        <li class="list-inline-item dropdown">
                                                                            <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                <i class="bx bx-dots-horizontal-rounded"></i>
                                                                            </a>
                                                                            <div class="dropdown-menu">
                                                                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="media-dowload/media/${media.id}" download>Download <i class="bx bx-download ms-2 text-muted"></i></a>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                            </div>`;
                            } else if (media.file_type == 'pdf' && media.file != '') {
                                html += `<div class="ctext-wrap-content " id="message-wrap-${message.id}">
                                                            <div class="p-3 border rounded-3">
                                                                <div class="d-flex align-items-center attached-file">
                                                                    <div class="flex-shrink-0 avatar-sm me-3 ms-0 attached-file-avatar">
                                                                        <div class="avatar-title bg-soft-light rounded-circle fs-20">
                                                                            <i class="ri-attachment-2"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="flex-grow-1 overflow-hidden">
                                                                        <div class="text-start">
                                                                            <h5 class="fs-14 text-white mb-1">${media.file_name}</h5>
                                                                            <p class="text-white-50 text-truncate fs-13 mb-0">12.5 MB</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="flex-shrink-0 ms-4">
                                                                        <div class="d-flex gap-2 fs-20 d-flex align-items-start">
                                                                            <div>
                                                                                <a href="media-dowload/media/${media.id}" class="text-white-50">
                                                                                     <i class="bx bxs-download"></i>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </div>`;
                            } else if (media.file_type == 'mp3' && media.file != '') {
                                html += `<div class="audio-file-elem">
                                                            <audio controls>
                                                                <source src="${file}" type="audio/mpeg">
                                                            </audio>
                                                        </div>
                                                       `;
                            } else if (media.file_type == 'mp4' || media.file_type == 'youtube_link') {
                                html += `<div>
                                                        <iframe src="${file}" title="YouTube video" class="w-100 rounded" autoplay allowfullscreen></iframe>
                                                        </div>
                                                        `;
                            }
                        });

                    }

                    html += '</div>';
                    if (hasMedia || (text !== null && text !== '')) {

                        let reactions = `<div class="emoji-icon" id="message-reaction-wrap-${message.id}">`;
                        if (message.reaction.length > 0) {
                            message.reaction.forEach((reaction) => {
                                reactions += `<a data-value="${reaction.reaction}" data-user-id="${reaction.user_id}">${reaction.reaction}</a>`;
                            });

                        }
                        reactions += `</div>`;

                        html += `<div class="conversation-name">
                            <small class="text-muted time">${message.time}</small>
                            <span class="text-success check-message-icon"><i class="bx bx-check-double"></i></span>
                            </div>
                            ${reactions}
                            `;
                    }

                    return html;
                }

                async function updateUserChatStatus(status) {
                    try {
                        const response = await axios.post(baseUrl + "update-status", {
                            status: status
                        , });
                        let result = response.data;
                        if (result.status == 200) {
                            return true;
                        }
                    } catch (error) {
                        console.log(error);
                    }
                }

                async function getMessages(threadId) { // old name H
                    let lastThreadId = threadId;
                    // console.log(`lastThreadId ${lastThreadId}`);
                    socket.emit("leave room", "room-" + lastThreadId); // leave the room
                    socket.emit("join room", "room-" + threadId); // join the room
                    $("#threadId").val(threadId);
                    threadId = threadId;
                    page = 1;
                    try {
                        const response = await axios.get(
                            baseUrl + "get-messages?page=" + page, {
                                params: {
                                    threadId: threadId
                                , }
                            , }
                        );
                        let {
                            data
                            , status
                        } = response.data;
                        if (status == 200) {
                            // console.log(result.data.data);
                            // console.log(result.data);
                            $(`#${d}-conversation`).html('');
                            await processMessages(data, 1, 'multiple'); // loaded first time
                        }
                    } catch (error) {
                        console.log(error);
                    }
                }


                async function processMessages(data, type, processType) {
                    let container = $(`#${d}-conversation`);
                    let indexOffset = 0;

                    if (processType === 'multiple') {
                        let chats = data.data;
                        chats = chats.reverse();

                        chats.forEach((chat, index) => {

                            let messageHTML = '';
                            if (indexOffset > 0) {
                                indexOffset--;
                            } else {
                                let chatClass = chat.sender_id == m ? ' right' : ' left';
                                let senderProfile = mediaUrl + chat.sender_image;
                                // console.log(senderProfile);

                                messageHTML = `<li class="chat-list${chatClass}" id="${chat.id}">
                                    <div class="conversation-list">
                                        ${chat.sender_id != m ? `<div class="chat-avatar"><img src="${senderProfile}" alt=""></div>` : ''}
                                        <div class="user-chat-content">
                                            ${formatMessageHTML(chat)}
                                            </div>
                                            </div>
                                            </li>`;

                                container.append(messageHTML);
                            }
                        });

                        // if (type === 1) { // means  clear old messages 
                        //     container.html(messageHTML);
                        // }
                        // if (type === 2) { // means  apped new messages 
                        //     container.append(messageHTML);
                        // }
                    }
                    if (processType === 'single') {

                        let messageHTML = '';

                        let chatClass = data.sender_id == m ? ' right' : ' left';
                        let senderProfile = mediaUrl + data.sender_image;

                        messageHTML = `<li class="chat-list${chatClass}" id="${data.id}">
                                                    <div class="conversation-list">
                                                        ${data.sender_id != m ? `<div class="chat-avatar"><img src="${senderProfile}" alt=""></div>` : ''}
                                                        <div class="user-chat-content">
                                                            ${formatMessageHTML(data)}
                                                            </div>
                                                            </div>
                                                            </li>`;

                        container.append(messageHTML);

                        await appendLastMessage(data);

                    }

                    // Add event listeners
                    attachEventListeners();

                    // Scroll to bottom
                    scrollChatToBottom("users-chat");

                    // Other functions like _(), handleCopyMessage, etc.
                }

                function repeatedMessages(chats, currentIndex, fromId) {
                    let count = 0;
                    let repeatedHTML = '';

                    for (let i = currentIndex + 1; chats[i] && chats[i].from_id == fromId; i++) {
                        repeatedHTML += formatMessageHTML(chats[i].id, chats[i].msg, chats[i].has_images, chats[
                                i].has_files, chats[i].has_audios, chats[i].has_videos, chats[i]
                            .has_dropDown);
                        count++;
                    }

                    return repeatedHTML;
                }

                function attachEventListeners() {
                    // Delete items
                    chatConversationList.querySelectorAll(".delete-item").forEach(item => {
                        item.addEventListener("click", async function() {
                            try {
                                const {
                                    data
                                } = await axios.post(
                                    baseUrl + "delete-chat", {
                                        id: item.getAttribute('data-id')
                                        , type: 'message'
                                    }
                                );
                                if (data.status == 200) {
                                    toastr.success(data.message);
                                    let parentContent = item.closest(".user-chat-content");
                                    if (parentContent.childElementCount === 2) {
                                        item.closest(".chat-list").remove();
                                    } else {
                                        item.closest(".ctext-wrap").remove();
                                    }
                                } else {
                                    toastr.warning(data.message);
                                }
                            } catch (error) {
                                console.log(error);
                            }

                        });
                    });

                    // Copy message
                    chatConversationList.querySelectorAll(".copy-message").forEach(item => {
                        // console.log(item);
                        item.addEventListener("click", function() {
                            // let messageText = item.closest(".ctext-wrap").children[0] ? item
                            //     .closest(".ctext-wrap").children[0].children[0].innerText : "";
                            //     console.log(messageText);
                            let messageText = $(`.${item.id}`).text();

                            // console.log(messageText);
                            navigator.clipboard.writeText(messageText);
                            handleCopyMessageFeedback();
                        });
                    });

                    // Reply message
                    // chatConversationList.querySelectorAll(".reply-message").forEach(item => {
                    //     item.addEventListener("click", function() {
                    //         handleReplyMessage(item);
                    //     });
                    // });

                    const emojiLinks = document.querySelectorAll('.emoji-dropdown-menu a');
                    emojiLinks.forEach(link => {
                        link.addEventListener('click', async (event) => {
                            // Prevent default action
                            event.preventDefault();
                            const emojiValue = event.currentTarget.getAttribute('data-value');
                            console.log('Selected Emoji:', emojiValue);

                            // Get the data-id from the parent dropdown menu
                            const dropdownMenu = event.currentTarget.closest('.emoji-dropdown-menu');
                            const messageId = dropdownMenu.getAttribute('data-id');
                            const reactionWrap = document.querySelector(`#message-reaction-wrap-${messageId}`);

                            let userReaction = reactionWrap.querySelector(`[data-user-id="${currentUserId}"]`);

                            if (userReaction) {
                                // Update existing reaction
                                userReaction.textContent = emojiValue;
                                userReaction.setAttribute('data-value', emojiValue);
                            } else {
                                // Add new reaction
                                let newReaction = document.createElement('a');
                                newReaction.textContent = emojiValue;
                                newReaction.setAttribute('data-user-id', currentUserId);
                                newReaction.setAttribute('data-value', emojiValue);
                                reactionWrap.appendChild(newReaction);
                            }

                            try {
                                const {
                                    data
                                } = await axios.post(
                                    baseUrl + "message-reaction", {
                                        messageId: messageId
                                        , threadId: threadId
                                        , reaction: emojiValue
                                    }, {
                                        headers: {
                                            "Content-Type": "multipart/form-data"
                                        , }
                                    , }
                                );
                                console.log(data); // Log the actual response data
                                // toastr.success('Profile data updated');
                            } catch (error) {
                                console.error(
                                    "Error:", error.response ? error.response.data : error.message
                                );
                            }
                        });
                    });
                }

                function handleReplyMessage(element) {
                    v = true;
                    document.querySelector(".replyCard").classList.add("show");

                    document.querySelector("#close_toggle").addEventListener("click", function() {
                        document.querySelector(".replyCard").classList.remove("show");
                    });

                    let messageText = element.closest(".ctext-wrap").children[0] ? element.closest(
                        ".ctext-wrap").children[0].children[0].innerText : "";
                    document.querySelector(".replyCard .replymessage-block .flex-grow-1 .mb-0").innerText =
                        messageText;

                    let senderProfile = document.querySelector(".user-profile-show").innerHTML;
                    let senderName = !element.closest(".chat-list") || element.closest(".chat-list").classList
                        .contains("left") ? senderProfile : "You";
                    document.querySelector(".replyCard .replymessage-block .flex-grow-1 .conversation-name")
                        .innerText = senderName;
                }

                function handleCopyMessageFeedback() {
                    document.getElementById("copyClipBoard").style.display = "block";
                    // document.getElementById("copyClipBoardChannel").style.display = "block";
                    setTimeout(function() {
                        document.getElementById("copyClipBoard").style.display = "none";
                        // document.getElementById("copyClipBoardChannel").style.display = "none";
                    }, 1000);
                }


                function _() {
                    GLightbox({
                        selector: ".popup-img"
                        , title: !1
                    });
                }
                document.getElementById("emoji-btn").addEventListener("click", function() {
                    setTimeout(function() {
                        var e, t = document.getElementsByClassName("fg-emoji-picker")[0];
                        !t ||
                            ((e = window.getComputedStyle(t) ?
                                    window.getComputedStyle(t).getPropertyValue("left") :
                                    "") &&
                                ((e = (e = e.replace("px", "")) - 40 + "px"), (t.style.left = e)));
                    }, 0);
                });

                new FgEmojiPicker({
                    trigger: [".emoji-btn"]
                    , removeOnSelection: !1
                    , closeButton: !0
                    , position: ["top", "right"]
                    , preFetch: !0
                    , dir: "assets/js/dir/json"
                    , insertInto: document.querySelector(".chat-input")
                , });

                document.getElementById("emoji-btn").addEventListener("click", function() {
                    setTimeout(function() {
                        var e, t = document.getElementsByClassName("fg-emoji-picker")[0];
                        !t ||
                            ((e = window.getComputedStyle(t) ?
                                    window.getComputedStyle(t).getPropertyValue("left") :
                                    "") &&
                                ((e = (e = e.replace("px", "")) - 40 + "px"), (t.style.left = e)));
                    }, 0);
                });

                var i = document.getElementById("chatinputmorecollapse");

                document.body.addEventListener("click", function() {
                        new bootstrap.Collapse(i, {
                            toggle: !1
                        }).hide();
                    }), i &&
                    i.addEventListener("shown.bs.collapse", function() {
                        new Swiper(".chatinput-links", {
                            slidesPerView: 3
                            , spaceBetween: 30
                            , breakpoints: {
                                768: {
                                    slidesPerView: 4
                                }
                                , 1024: {
                                    slidesPerView: 6
                                }
                            , }
                        , });
                    }), document
                    .querySelectorAll(".contact-modal-list .contact-list li")
                    .forEach(function(e) {
                        e.addEventListener("click", function() {
                            e.classList.toggle("selected");
                        });
                    }), (document.getElementById("favourite-users").onclick = function() {
                        // document.getElementById("chat-input").focus();
                    });

            });

            // Function to be called when a tab is clicked or activated
            async function onTabChange(tabId) {
                console.log("Tab activated: " + tabId);
                if (tabId === 'pills-contacts-tab') {
                    let key = $('#searchContact').val();
                    // console.log(key);
                    if (!key) {
                        await getContacts(key); // Call your function after a delay
                    }
                }
                if (tabId === 'pills-calls-tab') {
                    document.getElementById("callList").innerHTML = '';
                    getCallLogs();
                }
                // Add your custom functionality here
            }

            // Initialize Bootstrap Tab events
            document.querySelectorAll('.nav-link[data-bs-toggle="pill"]').forEach(function(tab) {
                tab.addEventListener('show.bs.tab', function(event) {
                    const targetTabId = event.target.getAttribute('id');
                    onTabChange(targetTabId);
                });
            });


            document
                .getElementById("personalinfoForm")
                .addEventListener("submit", function(e) {
                    e.preventDefault();
                    let data = new FormData(this);
                    updateInfo(data);
                });

            async function updateInfo(userData) {
                try {
                    const response = await axios.post(
                        baseUrl + "update-profile", userData, {
                            headers: {
                                "Content-Type": "multipart/form-data"
                            , }
                        , }
                    );
                    // console.log(response.data); // Log the actual response data
                    toastr.success('Profile data updated');
                } catch (error) {
                    console.error(
                        "Error:", error.response ? error.response.data : error.message
                    );
                }
            }

            document
                .querySelector("#profile-foreground-img-file-input")
                .addEventListener("change", function() {
                    handleFileInputChange(
                        ".profile-foreground-img", ".profile-foreground-img-file-input", "foreground"
                    );
                });

            document
                .querySelector("#profile-img-file-input")
                .addEventListener("change", function() {
                    handleFileInputChange(
                        ".user-profile-image", ".profile-img-file-input", "profile"
                    );
                });

            function handleFileInputChange(imageSelectors, inputSelector, type) {
                var imageElements = document.querySelectorAll(imageSelectors)
                    , fileInput = document.querySelector(inputSelector).files[0]
                    , reader = new FileReader();

                reader.addEventListener(
                    "load"
                    , function() {
                        // Update each image element with the loaded image src
                        imageElements.forEach(function(imageElement) {
                            imageElement.src = reader.result;
                        });
                    }, false
                );

                if (fileInput) {
                    reader.readAsDataURL(fileInput);
                }

                updateInfo({
                    file: fileInput
                    , type: type
                });
            }

            function forwardModal(id) {
                let content = $(`#message-wrap-${id}`).html();
                $('#forward-message').html(content);
                $('#message_shared_id').val(id);
                $('.forwardModal').modal('toggle');
            }

        </script>

        <script>
            $(document).ready(function() {
                $('.users-multiple').select2({
                    multiple: true
                    , width: '100%'
                    , ajax: {
                        url: 'get-users-list'
                        , dataType: 'json'
                        , delay: 250
                        , data: function(params) {
                            return {
                                search: params.term // Search term entered by the user
                            };
                        }
                        , processResults: function(data) {
                            // Map the data to the format required by Select2
                            return {
                                results: data.map(item => ({
                                    id: item.id
                                    , text: item.name
                                    , image: item.image // Include the image URL
                                }))
                            };
                        }
                        , cache: true
                    }
                    , templateResult: formatOption, // Format the option with an image
                    templateSelection: formatOptionSelection // Format the selected option
                });

                function formatOption(option) {
                    if (!option.id) {
                        return option.text;
                    }
                    var $option = $(
                        `<span><img src="${mediaUrl}/${option.image}" class="img-circle" style="width:35px; height:33px; margin-right: 5px;" /> ${option.text}</span>`
                    );
                    return $option;
                }

                function formatOptionSelection(option) {
                    if (!option.id) {
                        return option.text;
                    }
                    var $option = $(
                        `<span><img src="${mediaUrl}/${option.image}" class="img-circle" style="width:35px; height:33px; margin-right: 5px;" /> ${option.text}</span>`
                    );
                    return $option;
                }

                $('.forwardModal').on('hidden.bs.modal', function(e) {
                    $('.users-multiple').val(null).trigger('change');
                });

                $('#share-btn').on('click', async function() {
                    $(this).attr('disabled', true);
                    try {
                        const {
                            data
                        } = await axios.post(
                            baseUrl + "forward-message", {
                                id: $('#message_shared_id').val()
                                , users: $('#users').val()
                            }, {
                                headers: {
                                    "Content-Type": "multipart/form-data"
                                , }
                            , }
                        );
                        // console.log(data); // Log the actual response data
                        if (data.status == 200) {
                            toastr.success(data.message);
                            $('.forwardModal').modal('toggle');
                            $('.users-multiple').val(null).trigger('change');
                            await getThreadUsers();
                        } else {
                            toastr.warning(data.message);
                        }
                        $(this).attr('disabled', false);
                    } catch (error) {
                        console.log(error);
                    }
                });
            });

        </script>
    </x-slot>
</x-app-layout>
