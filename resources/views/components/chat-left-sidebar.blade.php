<div class="chat-leftsidebar">

    <div class="tab-content">
        <!-- Start Profile tab-pane -->
        <div class="tab-pane" id="pills-user" role="tabpanel" aria-labelledby="pills-user-tab">
            <!-- Start profile content -->
            <div>
                <div class="user-profile-img">
                    <img src="{{ $Media }}/{{Auth::user()->back_image}}" class="profile-img .profile-foreground-img" style="height: 160px;" alt="">
                    <div class="overlay-content">
                        <div>
                            <div class="user-chat-nav p-2 ps-3">

                                <div class="d-flex w-100 align-items-center">
                                    <div class="flex-grow-1">
                                        <h5 class="text-white mb-0">My Profile</h5>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="dropdown">
                                            <button class="btn nav-btn text-white dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class='bx bx-dots-vertical-rounded'></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Info <i class="bx bx-info-circle ms-2 text-muted"></i></a>
                                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Setting <i class="bx bx-cog text-muted ms-2"></i></a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Help <i class="bx bx-help-circle ms-2 text-muted"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center border-bottom border-bottom-dashed pt-2 pb-4 mt-n5 position-relative">
                    <div class="mb-lg-3 mb-2">
                        <img src="{{ $Media }}/{{Auth::user()->image}}" class="rounded-circle avatar-lg img-thumbnail user-profile-image" alt="">
                    </div>

                    <h5 class="fs-17 mb-1 text-truncate">{{ Auth::user()->name }}</h5>
                    <!-- <p class="text-muted fs-14 text-truncate mb-0">Front end Developer</p> -->
                </div>
                <!-- End profile user -->

                <!-- Start user-profile-desc -->
                <div class="p-4 profile-desc" data-simplebar>
                    <div class="text-muted">
                        <p class="mb-3">{{Auth::user()->about}}</p>
                    </div>

                    <div class="border-bottom border-bottom-dashed mb-4 pb-2">
                        <div class="d-flex py-2 align-items-center">
                            <div class="flex-shrink-0 me-3">
                                <i class="bx bx-user align-middle text-muted fs-19"></i>
                            </div>
                            <div class="flex-grow-1">
                                <p class="mb-0">{{ Auth::user()->name }}</p>
                            </div>
                        </div>

                        @if(Auth::user()->phone)
                        <div class="d-flex py-2 align-items-center">
                            <div class="flex-shrink-0 me-3">
                                <i class="ri-phone-line align-middle text-muted fs-19"></i>
                            </div>
                            <div class="flex-grow-1">
                                <p class="mb-0">{{ Auth::user()->phone }}</p>
                            </div>
                        </div>
                        @endif

                        <div class="d-flex py-2 align-items-center">
                            <div class="flex-shrink-0 me-3">
                                <i class="ri-message-2-line align-middle text-muted fs-19"></i>
                            </div>
                            <div class="flex-grow-1">
                                <p class="fw-medium mb-0">{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                        @if(Auth::user()->location)
                        <div class="d-flex py-2 align-items-center">
                            <div class="flex-shrink-0 me-3">
                                <i class="ri-map-pin-2-line align-middle text-muted fs-19"></i>
                            </div>
                            <div class="flex-grow-1">
                                <p class="mb-0">{{ Auth::user()->location }}</p>
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- <div class="border-bottom border-bottom-dashed mb-4 pb-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-grow-1">
                                <h5 class="fs-12 text-muted text-uppercase mb-0">Media</h5>
                            </div>
                            <div class="flex-shrink-0">
                                <a href="#" class="fw-medium fs-12 d-block">Show all</a>
                            </div>
                        </div>
                        <div class="profile-media-img">
                            <div class="media-img-list">
                                <a href="#">
                                    <img src="assets/images/small/img-1.jpg" alt="media img" class="img-fluid">
                                </a>
                            </div>
                            <div class="media-img-list">
                                <a href="#">
                                    <img src="assets/images/small/img-2.jpg" alt="media img" class="img-fluid">
                                </a>
                            </div>
                            <div class="media-img-list">
                                <a href="#">
                                    <img src="assets/images/small/img-4.jpg" alt="media img" class="img-fluid">
                                    <div class="bg-overlay">+ 15</div>
                                </a>
                            </div>
                        </div>
                    </div> -->

                    <!-- <div>
                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-grow-1">
                                <h5 class="fs-12 text-muted text-uppercase mb-0">Attached Files</h5>
                            </div>
                            <div class="flex-shrink-0">
                                <a href="#" class="fw-medium fs-12 d-block">Show all</a>
                            </div>
                        </div>
                        <div>
                            <div class="card p-2 border border-dashed mb-2">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 ms-1 me-3">
                                        <img src="assets/images/pdf-file.png" alt="" class="avatar-xs">
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="fs-14 text-truncate mb-1">design-phase-1-approved.pdf</h5>
                                        <p class="text-muted fs-13 mb-0">12.5 MB</p>
                                    </div>

                                    <div class="flex-shrink-0 ms-3">
                                        <div class="d-flex gap-2">
                                            <div>
                                                <a href="#" class="text-muted px-1">
                                                    <i class="bx bxs-download"></i>
                                                </a>
                                            </div>
                                            <div class="dropdown">
                                                <a class="dropdown-toggle text-muted px-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Share <i class="bx bx-share-alt ms-2 text-muted"></i></a>
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Bookmark <i class="bx bx-bookmarks text-muted ms-2"></i></a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Delete <i class="bx bx-trash ms-2 text-muted"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card p-2 border border-dashed mb-2">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 ms-1 me-3">
                                        <img src="assets/images/image-file.png" alt="" class="avatar-xs">
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="fs-14 text-truncate mb-1">Image-1.jpg</h5>
                                        <p class="text-muted fs-13 mb-0">4.2 MB</p>
                                    </div>

                                    <div class="flex-shrink-0 ms-3">
                                        <div class="d-flex gap-2">
                                            <div>
                                                <a href="#" class="text-muted px-1">
                                                    <i class="bx bxs-download"></i>
                                                </a>
                                            </div>
                                            <div class="dropdown">
                                                <a class="dropdown-toggle text-muted px-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Share <i class="bx bx-share-alt ms-2 text-muted"></i></a>
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Bookmark <i class="bx bx-bookmarks text-muted ms-2"></i></a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Delete <i class="bx bx-trash ms-2 text-muted"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card p-2 border border-dashed mb-2">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 ms-1 me-3">
                                        <img src="assets/images/image-file.png" alt="" class="avatar-xs">
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="fs-14 text-truncate mb-1">Image-2.jpg</h5>
                                        <p class="text-muted fs-13 mb-0">3.1 MB</p>
                                    </div>

                                    <div class="flex-shrink-0 ms-3">
                                        <div class="d-flex gap-2">
                                            <div>
                                                <a href="#" class="text-muted px-1">
                                                    <i class="bx bxs-download"></i>
                                                </a>
                                            </div>
                                            <div class="dropdown">
                                                <a class="dropdown-toggle text-muted px-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Share <i class="bx bx-share-alt ms-2 text-muted"></i></a>
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Bookmark <i class="bx bx-bookmarks text-muted ms-2"></i></a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Delete <i class="bx bx-trash ms-2 text-muted"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card p-2 border border-dashed mb-0">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 ms-1 me-3">
                                        <img src="assets/images/zip-file.png" alt="" class="avatar-xs">
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="fs-14 text-truncate mb-1">Landing-A.zip</h5>
                                        <p class="text-muted fs-13 mb-0">6.7 MB</p>
                                    </div>

                                    <div class="flex-shrink-0 ms-3">
                                        <div class="d-flex gap-2">
                                            <div>
                                                <a href="#" class="text-muted px-1">
                                                    <i class="bx bxs-download"></i>
                                                </a>
                                            </div>
                                            <div class="dropdown">
                                                <a class="dropdown-toggle text-muted px-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Share <i class="bx bx-share-alt ms-2 text-muted"></i></a>
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Bookmark <i class="bx bx-bookmarks text-muted ms-2"></i></a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Delete <i class="bx bx-trash ms-2 text-muted"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                </div>
                <!-- end user-profile-desc -->
            </div>
            <!-- End profile content -->
        </div>
        <!-- End Profile tab-pane -->

        <!-- Start chats tab-pane -->
        <div class="tab-pane show active" id="pills-chat" role="tabpanel" aria-labelledby="pills-chat-tab">
            <!-- Start chats content -->
            <div>
                <div class="px-4 pt-4">
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <h4 class="mb-4">Messages <span class="text-primary fs-13" id="unread_messages_header"></span></h4>
                        </div>
                    </div>
                    <form>
                        <div class="input-group search-panel mb-3">
                            <input type="text" class="form-control bg-light border-0" id="searchChatUser" onkeyup="searchUser()" placeholder="Search here..." aria-label="Example text with button addon" aria-describedby="searchbtn-addon" autocomplete="off">
                            <button class="btn btn-light p-0" type="button" id="searchbtn-addon"><i class='bx bx-search align-middle'></i></button>
                        </div>
                    </form>
                </div> <!-- .p-4 -->

                <div class="chat-room-list" data-simplebar>
                    <!-- Start chat-message-list -->
                    <h5 class="mb-3 px-4 mt-4 fs-11 text-muted text-uppercase">Chats</h5>

                    <div class="chat-message-list">
                        <ul class="list-unstyled chat-list chat-user-list" id="favourite-users">
                        </ul>
                    </div>
 
                    <!-- ><div class="d-flex align-items-center px-4 mt-5 mb-2">
                        <div class="flex-grow-1">
                            <h4 class="mb-0 fs-11 text-muted text-uppercase">Direct Messages</h4>
                        </div>
                        <div class="flex-shrink-0">
                            <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="New Message">

                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target=".contactModal">
                                    <i class="bx bx-plus align-middle"></i>
                                </button>
                            </div>
                        </div>
                    </div -->

                    <!-- <div class="chat-message-list">

                        <ul class="list-unstyled chat-list chat-user-list" id="usersList">
                        </ul>
                    </div> -->

                    <!-- <div class="d-flex align-items-center px-4 mt-5 mb-2">
                        <div class="flex-grow-1">
                            <h4 class="mb-0 fs-11 text-muted text-uppercase">Channels</h4>
                        </div>
                        <div class="flex-shrink-0">
                            <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Create group">

                                
                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addgroup-exampleModal">
                                    <i class="bx bx-plus align-middle"></i>
                                </button>
                            </div>
                        </div>
                    </div> -->

                    <!-- <div class="chat-message-list">

                        <ul class="list-unstyled chat-list chat-user-list mb-3" id="channelList">
                        </ul>
                    </div> -->
                    <!-- End chat-message-list -->
                </div>

            </div>
            <!-- Start chats content -->
        </div>
        <!-- End chats tab-pane -->

        <!-- Start contacts tab-pane -->
        <div class="tab-pane" id="pills-contacts" role="tabpanel" aria-labelledby="pills-contacts-tab">
            <!-- Start Contact content -->
            <div>
                <div class="px-4 pt-4">
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <h4 class="mb-4">Contacts</h4>
                        </div> 
                        <div class="flex-shrink-0">
                            <div>
                                <!-- Button trigger modal -->
                                <!-- <button type="button" class="btn btn-soft-success btn-sm" data-bs-toggle="modal" data-bs-target="#addContact-exampleModal">
                                    <i class="bx bx-plus"></i>
                                </button> -->
                            </div>
                        </div>
                    </div>

                    <form>
                        <div class="input-group search-panel mb-4">
                            <input type="text" class="form-control bg-light border-0" id="searchContact" placeholder="Search contacts..." aria-label="Search Contacts..." aria-describedby="button-searchcontactsaddon" autocomplete="off">
                            <button class="btn btn-light p-0" type="button" id="button-searchcontactsaddon"><i class='bx bx-search align-middle'></i></button>
                        </div>
                    </form>
                </div>
                <!-- end p-4 -->

                <div class="chat-message-list chat-group-list" data-simplebar>
                    <div class="sort-contact">
                    </div>
                </div>
                <!-- end contact lists -->
            </div>
            <!-- Start Contact content -->
        </div>
        <!-- End contacts tab-pane -->

        <!-- Start calls tab-pane -->
        <div class="tab-pane" id="pills-calls" role="tabpanel" aria-labelledby="pills-calls-tab">
            <!-- Start Contact content -->
            <div>
                <div class="px-4 pt-4">
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <h4 class="mb-3">Calls</h4>
                        </div>
                    </div>
                </div>
                <!-- end p-4 -->

                <!-- Start contact lists -->
                <div class="chat-message-list chat-call-list" data-simplebar>
                    <ul class="list-unstyled chat-list" id="callList">

                    </ul>
                </div>
                <!-- end contact lists -->
            </div>
            <!-- Start Contact content -->
        </div>
        <!-- End calls tab-pane -->

        <!-- Start bookmark tab-pane -->
        <div class="tab-pane" id="pills-bookmark" role="tabpanel" aria-labelledby="pills-bookmark-tab">
            <!-- Start Contact content -->
            <div>
                <div class="px-4 pt-4">
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <h4 class="mb-3">Bookmark</h4>
                        </div>
                    </div>
                    <form>
                        <div class="input-group search-panel mb-3">
                            <input type="text" class="form-control bg-light border-0" id="searchbookmark" onkeyup="searchBookmark()" placeholder="Search here..." aria-label="Example text with button addon" aria-describedby="searchbookmark-addon" autocomplete="off">
                            <button class="btn btn-light p-0" type="button" id="searchbookmark-addon"><i class='bx bx-search align-middle'></i></button>
                        </div>
                    </form>
                </div>
                <!-- end p-4 -->

                <!-- Start contact lists -->
                <div class="chat-message-list chat-bookmark-list" id="chat-bookmark-list" data-simplebar>
                    <!-- <ul class="list-unstyled chat-list">
                        <li>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 ms-1 me-3">
                                    <img src="assets/images/pdf-file.png" alt="" class="avatar-xs">
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="fs-14 mb-1"><a href="#" class="text-truncate p-0">design-phase-1-approved.pdf</a>
                                    </h5>
                                    <p class="text-muted text-truncate fs-13 mb-0">12.5 MB</p>
                                </div>

                                <div class="flex-shrink-0 ms-3">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle fs-16 text-muted px-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Open
                                                <i class="bx bx-folder-open ms-2 text-muted"></i></a>
                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Edit
                                                <i class="bx bx-pencil ms-2 text-muted"></i></a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Delete <i class="bx bx-trash ms-2 text-muted"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 ms-1 me-3">
                                    <img src="assets/images/link-file.png" alt="" class="avatar-xs">
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="fs-14 mb-1"><a href="#" class="text-truncate p-0">Bg Pattern</a></h5>
                                    <p class="text-muted text-truncate fs-13 mb-0">https://bgpattern.com/</p>
                                </div>

                                <div class="flex-shrink-0 ms-3">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle fs-18 text-muted px-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Open
                                                <i class="bx bx-folder-open ms-2 text-muted"></i></a>
                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Edit
                                                <i class="bx bx-pencil ms-2 text-muted"></i></a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Delete <i class="bx bx-trash ms-2 text-muted"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 ms-1 me-3">
                                    <img src="assets/images/image-file.png" alt="" class="avatar-xs">
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="fs-14 mb-1"><a href="#" class="text-truncate p-0">Image-001.jpg</a></h5>
                                    <p class="text-muted text-truncate fs-13 mb-0">4.2 MB</p>
                                </div>

                                <div class="flex-shrink-0 ms-3">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle fs-16 text-muted px-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Open
                                                <i class="bx bx-folder-open ms-2 text-muted"></i></a>
                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Edit
                                                <i class="bx bx-pencil ms-2 text-muted"></i></a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Delete <i class="bx bx-trash ms-2 text-muted"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 ms-1 me-3">
                                    <img src="assets/images/link-file.png" alt="" class="avatar-xs">
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="fs-14 mb-1"><a href="#" class="text-truncate p-0">Images</a></h5>
                                    <p class="text-muted text-truncate fs-13 mb-0">https://images123.com/</p>
                                </div>

                                <div class="flex-shrink-0 ms-3">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle fs-18 text-muted px-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Open
                                                <i class="bx bx-folder-open ms-2 text-muted"></i></a>
                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Edit
                                                <i class="bx bx-pencil ms-2 text-muted"></i></a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Delete <i class="bx bx-trash ms-2 text-muted"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 ms-1 me-3">
                                    <img src="assets/images/link-file.png" alt="" class="avatar-xs">
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="fs-14 mb-1"><a href="#" class="text-truncate p-0">Bg Gradient</a></h5>
                                    <p class="text-muted text-truncate fs-13 mb-0">https://bggradient.com/</p>
                                </div>

                                <div class="flex-shrink-0 ms-3">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle fs-18 text-muted px-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Open
                                                <i class="bx bx-folder-open ms-2 text-muted"></i></a>
                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Edit
                                                <i class="bx bx-pencil ms-2 text-muted"></i></a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Delete <i class="bx bx-trash ms-2 text-muted"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 ms-1 me-3">
                                    <img src="assets/images/image-file.png" alt="" class="avatar-xs">
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="fs-14 mb-1"><a href="#" class="text-truncate p-0">Image-012.jpg</a></h5>
                                    <p class="text-muted text-truncate fs-13 mb-0">3.1 MB</p>
                                </div>

                                <div class="flex-shrink-0 ms-3">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle fs-16 text-muted px-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Open
                                                <i class="bx bx-folder-open ms-2 text-muted"></i></a>
                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Edit
                                                <i class="bx bx-pencil ms-2 text-muted"></i></a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Delete <i class="bx bx-trash ms-2 text-muted"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 ms-1 me-3">
                                    <img src="assets/images/zip-file.png" alt="" class="avatar-xs">
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="fs-14 mb-1"><a href="#" class="text-truncate p-0">analytics dashboard.zip</a></h5>
                                    <p class="text-muted text-truncate fs-13 mb-0">6.7 MB</p>
                                </div>

                                <div class="flex-shrink-0 ms-3">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle fs-16 text-muted px-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Open
                                                <i class="bx bx-folder-open ms-2 text-muted"></i></a>
                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Edit
                                                <i class="bx bx-pencil ms-2 text-muted"></i></a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Delete <i class="bx bx-trash ms-2 text-muted"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 ms-1 me-3">
                                    <img src="assets/images/image-file.png" alt="" class="avatar-xs">
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="fs-14 mb-1"><a href="#" class="text-truncate p-0">Image-031.jpg</a></h5>
                                    <p class="text-muted text-truncate fs-13 mb-0">4.2 MB</p>
                                </div>

                                <div class="flex-shrink-0 ms-3">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle fs-16 text-muted px-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Open
                                                <i class="bx bx-folder-open ms-2 text-muted"></i></a>
                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Edit
                                                <i class="bx bx-pencil ms-2 text-muted"></i></a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Delete <i class="bx bx-trash ms-2 text-muted"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 ms-1 me-3">
                                    <img src="assets/images/txt-file.png" alt="" class="avatar-xs">
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="fs-14 mb-1"><a href="#" class="text-truncate p-0">Changelog.txt</a></h5>
                                    <p class="text-muted text-truncate fs-13 mb-0">6.7 MB</p>
                                </div>

                                <div class="flex-shrink-0 ms-3">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle fs-16 text-muted px-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Open
                                                <i class="bx bx-folder-open ms-2 text-muted"></i></a>
                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Edit
                                                <i class="bx bx-pencil ms-2 text-muted"></i></a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Delete <i class="bx bx-trash ms-2 text-muted"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 ms-1 me-3">
                                    <img src="assets/images/zip-file.png" alt="" class="avatar-xs">
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="fs-14 mb-1"><a href="#" class="text-truncate p-0">Widgets.zip</a></h5>
                                    <p class="text-muted text-truncate fs-13 mb-0">6.7 MB</p>
                                </div>

                                <div class="flex-shrink-0 ms-3">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle fs-16 text-muted px-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Open
                                                <i class="bx bx-folder-open ms-2 text-muted"></i></a>
                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Edit
                                                <i class="bx bx-pencil ms-2 text-muted"></i></a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Delete <i class="bx bx-trash ms-2 text-muted"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 ms-1 me-3">
                                    <img src="assets/images/image-file.png" alt="" class="avatar-xs">
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="fs-14 mb-1"><a href="#" class="text-truncate p-0">logo-light.png</a></h5>
                                    <p class="text-muted text-truncate fs-13 mb-0">4.2 MB</p>
                                </div>

                                <div class="flex-shrink-0 ms-3">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle fs-16 text-muted px-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Open
                                                <i class="bx bx-folder-open ms-2 text-muted"></i></a>
                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Edit
                                                <i class="bx bx-pencil ms-2 text-muted"></i></a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Delete <i class="bx bx-trash ms-2 text-muted"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 ms-1 me-3">
                                    <img src="assets/images/image-file.png" alt="" class="avatar-xs">
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="fs-14 mb-1"><a href="#" class="text-truncate p-0">Image-2.jpg</a></h5>
                                    <p class="text-muted text-truncate fs-13 mb-0">3.1 MB</p>
                                </div>

                                <div class="flex-shrink-0 ms-3">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle fs-16 text-muted px-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Open
                                                <i class="bx bx-folder-open ms-2 text-muted"></i></a>
                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Edit
                                                <i class="bx bx-pencil ms-2 text-muted"></i></a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Delete <i class="bx bx-trash ms-2 text-muted"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 ms-1 me-3">
                                    <img src="assets/images/zip-file.png" alt="" class="avatar-xs">
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="fs-14 mb-1"><a href="#" class="text-truncate p-0">Landing-A.zip</a></h5>
                                    <p class="text-muted text-truncate fs-13 mb-0">6.7 MB</p>
                                </div>

                                <div class="flex-shrink-0 ms-3">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle fs-16 text-muted px-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Open
                                                <i class="bx bx-folder-open ms-2 text-muted"></i></a>
                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Edit
                                                <i class="bx bx-pencil ms-2 text-muted"></i></a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Delete <i class="bx bx-trash ms-2 text-muted"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                    </ul> -->
                </div>
                <!-- end contact lists -->
            </div>
            <!-- Start Contact content -->
        </div>
        <!-- End bookmark tab-pane -->

        <!-- Start settings tab-pane -->
        <div class="tab-pane" id="pills-setting" role="tabpanel" aria-labelledby="pills-setting-tab">
            <!-- Start Settings content -->
            <div>
                <div class="user-profile-img">
                    <img src="{{ $Media }}/{{Auth::user()->back_image}}" class="profile-img profile-foreground-img" style="height: 160px;" alt="">
                    <div class="overlay-content">
                        <div>
                            <div class="user-chat-nav p-3">

                                <div class="d-flex w-100 align-items-center">
                                    <div class="flex-grow-1">
                                        <h5 class="text-white mb-0">Settings</h5>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="avatar-xs p-0 rounded-circle profile-photo-edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="bottom" title="Change Background">
                                            <input id="profile-foreground-img-file-input" type="file" class="profile-foreground-img-file-input">
                                            <label for="profile-foreground-img-file-input" class="profile-photo-edit avatar-xs">
                                                <span class="avatar-title rounded-circle bg-light text-body">
                                                    <i class="bx bxs-pencil"></i>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center p-3 p-lg-4 border-bottom pt-2 pt-lg-2 mt-n5 position-relative">
                    <div class="mb-3 profile-user">
                        <img src="{{ $Media }}/{{Auth::user()->image}}" class="rounded-circle avatar-lg img-thumbnail user-profile-image" alt="user-profile-image">
                        <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                            <input id="profile-img-file-input" type="file" class="profile-img-file-input">
                            <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                <span class="avatar-title rounded-circle bg-light text-body">
                                    <i class="bx bxs-camera"></i>
                                </span>
                            </label>
                        </div>
                    </div>

                    <h5 class="fs-16 mb-1 text-truncate"></h5>

                    <div class="dropdown d-inline-block">
                        <a id="statusDropdown" class="text-muted dropdown-toggle d-block" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i id="statusIcon" class="bx bxs-circle text-success fs-10 align-middle"></i> <span id="statusText">Online</span> <i class="mdi mdi-chevron-down"></i>
                        </a>

                        <div class="dropdown-menu">
                            <a class="dropdown-item dropdown-item-user-status " href="#" data-status="Online" data-value="Online" data-icon="text-success"><i class="bx bxs-circle text-success fs-10 me-1 align-middle"></i>Online</a>
                            <a class="dropdown-item dropdown-item-user-status" href="#" data-status="Offlilne" data-value="Offline" data-icon="text-offline"><i class="bx bxs-circle text-offline fs-10 me-1 align-middle"></i> Offlilne</a>
                            <a class="dropdown-item dropdown-item-user-status" href="#" data-status="Away" data-value="away" data-icon="text-warning"><i class="bx bxs-circle text-warning fs-10 me-1 align-middle"></i> Away</a>
                            <a class="dropdown-item dropdown-item-user-status" href="#" data-status="Do not disturb" data-value="dnd" data-icon="text-danger"><i class="bx bxs-circle text-danger fs-10 me-1 align-middle"></i> Do not disturb</a>
                        </div>
                    </div>

                </div>
                <!-- End profile user -->

                <!-- Start User profile description -->
                <div class="user-setting" data-simplebar>
                    <div id="settingprofile" class="accordion accordion-flush">
                        <div class="accordion-item">
                            <div class="accordion-header" id="headerpersonalinfo">
                                <a class="accordion-button fs-14 fw-medium" data-bs-toggle="collapse" href="#personalinfo" aria-expanded="true" aria-controls="personalinfo">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 me-3 avatar-xs">
                                            <div class="avatar-title bg-info-subtle 
                 text-info text-info rounded">
                                                <i class="bx bxs-user"></i>
                                            </div>
                                        </div>
                                        Personal Info
                                    </div>
                                </a>
                            </div>
                            <div id="personalinfo" class="accordion-collapse collapse show" aria-labelledby="headerpersonalinfo" data-bs-parent="#settingprofile">
                                <form action="javascrip:void(0)" id="personalinfoForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="accordion-body edit-input">
                                        <div class="float-end">
                                            <a href="#" class="badge bg-light text-muted" id="user-profile-edit-btn"> <i class="bx bxs-pencil align-middle" id="edit-icon"></i>
                                            </a>
                                        </div>

                                        <div>
                                            <label for="name" class="form-label text-muted fs-13">Name</label>
                                            <input type="text" class="form-control edit" name="name" value="{{ Auth::user()->name }}" placeholder="Enter name" disabled>
                                        </div>

                                        <div>
                                            <label for="email" class="form-label text-muted fs-13">Email</label>
                                            <input type="email" class="form-control " readonly value="{{ Auth::user()->email }}" placeholder="Enter email" disabled>
                                        </div>

                                        <div class="mt-3">
                                            <label for="phone" class="form-label text-muted fs-13">Phone No</label>
                                            <input type="text" class="form-control edit" name="phone" value="{{ Auth::user()->phone }}" placeholder="Enter phone no" disabled>
                                        </div>

                                        <div class="mt-3">
                                            <label for="location" class="form-label text-muted fs-13">Location</label>
                                            <input type="text" class="form-control edit" name="location" value="{{ Auth::user()->location }}" placeholder="Location" disabled>
                                        </div>
                                        <div class="mt-3 d-flex justify-content-center d-none updateBtn " id="updateBtn">
                                            <button class="btn  btn-primary" id="infoUpdateBtn"> update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- end personal info card -->

                        <div class="accordion-item">
                            <div class="accordion-header" id="privacy1">
                                <a class="accordion-button fs-14 fw-medium collapsed" data-bs-toggle="collapse" href="#privacy" aria-expanded="false" aria-controls="privacy">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 me-3 avatar-xs">
                                            <div class="avatar-title bg-info-subtle 
                 text-info text-info rounded">
                                                <i class="bx bxs-lock"></i>
                                            </div>
                                        </div>
                                        Privacy
                                    </div>
                                </a>
                            </div>
                            <div id="privacy" class="accordion-collapse collapse" aria-labelledby="privacy1" data-bs-parent="#settingprofile">
                                <div class="accordion-body">
                                    <h6 class="mb-3">Who can see my personal info</h6>
                                    <ul class="list-unstyled vstack gap-4 mb-0">
                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="fs-13 mb-0 text-truncate">Profile photo</h5>
                                                </div>
                                                <div class="flex-shrink-0 ms-2">
                                                    <select class="form-select form-select-sm">
                                                        <option value="Everyone" selected>Everyone</option>
                                                        <option value="Selected">Selected</option>
                                                        <option value="Nobody">Nobody</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="fs-13 mb-0 text-truncate">Status</h5>
                                                </div>
                                                <div class="flex-shrink-0 ms-2">
                                                    <select class="form-select form-select-sm">
                                                        <option value="Everyone" selected>Everyone</option>
                                                        <option value="Selected">Selected</option>
                                                        <option value="Nobody">Nobody</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="fs-13 mb-0 text-truncate">Groups</h5>

                                                </div>
                                                <div class="flex-shrink-0 ms-2">
                                                    <select class="form-select form-select-sm">
                                                        <option value="Everyone" selected>Everyone</option>
                                                        <option value="Selected">Selected</option>
                                                        <option value="Nobody">Nobody</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="fs-13 mb-0 text-truncate">Last seen</h5>
                                                </div>
                                                <div class="flex-shrink-0 ms-2">
                                                    <div class="form-check form-switch">
                                                        <input type="checkbox" class="form-check-input" id="privacy-lastseenSwitch" checked>
                                                        <label class="form-check-label" for="privacy-lastseenSwitch"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="fs-13 mb-0 text-truncate">Read receipts</h5>
                                                </div>
                                                <div class="flex-shrink-0 ms-2">
                                                    <div class="form-check form-switch">
                                                        <input type="checkbox" class="form-check-input" id="privacy-readreceiptSwitch" checked>
                                                        <label class="form-check-label" for="privacy-readreceiptSwitch"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- end privacy card -->

                        <div class="accordion-item">
                            <div class="accordion-header" id="headersecurity">
                                <a class="accordion-button fs-14 fw-medium collapsed" data-bs-toggle="collapse" href="#collapsesecurity" aria-expanded="false" aria-controls="collapsesecurity">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 me-3 avatar-xs">
                                            <div class="avatar-title bg-info-subtle 
                 text-info text-info rounded">
                                                <i class="bx bxs-check-shield"></i>
                                            </div>
                                        </div>
                                        Security
                                    </div>
                                </a>
                            </div>
                            <div id="collapsesecurity" class="accordion-collapse collapse" aria-labelledby="headersecurity" data-bs-parent="#settingprofile">
                                <div class="accordion-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item p-0">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="fs-13 mb-0 text-truncate">Show security notification</h5>

                                                </div>
                                                <div class="flex-shrink-0 ms-2">
                                                    <div class="form-check form-switch">
                                                        <input type="checkbox" class="form-check-input" id="security-notificationswitch">
                                                        <label class="form-check-label" for="security-notificationswitch"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- end security card -->



                        <div class="accordion-item">
                            <div class="accordion-header" id="headerhelp">
                                <button class="accordion-button fs-14 fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsehelp" aria-expanded="false" aria-controls="collapsehelp">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 me-3 avatar-xs">
                                            <div class="avatar-title bg-info-subtle 
                 text-info text-info rounded">
                                                <i class="bx bxs-help-circle"></i>
                                            </div>
                                        </div>
                                        Help
                                    </div>
                                </button>
                            </div>
                            <div id="collapsehelp" class="accordion-collapse collapse" aria-labelledby="headerhelp" data-bs-parent="#settingprofile">
                                <div class="accordion-body">
                                    <ul class="list-unstyled vstack gap-4 mb-0">
                                        <li>
                                            <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">FAQs</a></h5>
                                        </li>
                                        <li>
                                            <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Contact</a></h5>
                                        </li>
                                        <li>
                                            <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Terms & Privacy policy</a>
                                            </h5>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end profile-setting-accordion -->
                </div>
                <!-- End User profile description -->
            </div>
            <!-- Start Settings content -->
        </div>
        <!-- End settings tab-pane -->
    </div>
    <!-- end tab content -->
</div>
 