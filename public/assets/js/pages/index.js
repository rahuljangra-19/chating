var inputElement,
    filterText,
    userList,
    userItems,
    contactItems, 
    contactTitles,
    contactList,
    bookmarkItems;
function searchUser() {
    inputElement = document.getElementById("searchChatUser");
    filterText = inputElement.value.toUpperCase();
    userList = document.querySelector(".chat-room-list");
    userItems = userList.getElementsByTagName("li");

    for (let i = 0; i < userItems.length; i++) {
        let userName = userItems[i].querySelector("p").innerText.toUpperCase();
        userItems[i].style.display =
            userName.indexOf(filterText) > -1 ? "" : "none";
    }
}

function searchContacts() {
    inputElement = document.getElementById("searchContact");
    filterText = inputElement.value.toUpperCase();
    contactList = document.querySelector(".sort-contact");
    contactItems = contactList.querySelectorAll(".mt-3 li");
    contactTitles = contactList.querySelectorAll(".mt-3 .contact-list-title");

    for (let j = 0; j < contactTitles.length; j++) {
        let contactTitle = contactTitles[j];
        let titleText = contactTitle.innerText.toUpperCase();
        contactTitle.style.display =
            titleText.indexOf(filterText) > -1 ? "" : "none";
    }

    for (let i = 0; i < contactItems.length; i++) {
        let contactName = contactItems[i]
            .querySelector("h5")
            .innerText.toUpperCase();
        contactItems[i].style.display =
            contactName.indexOf(filterText) > -1 ? "" : "none";
    }
}

function searchContactOnModal() {
    inputElement = document.getElementById("searchContactModal");
    filterText = inputElement.value.toUpperCase();
    contactList = document.querySelector(".contact-modal-list");
    contactItems = contactList.querySelectorAll(".mt-2 li");
    contactTitles = contactList.querySelectorAll(".mt-2 .contact-list-title");

    for (let j = 0; j < contactTitles.length; j++) {
        let contactTitle = contactTitles[j];
        let titleText = contactTitle.innerText.toUpperCase();
        contactTitle.style.display =
            titleText.indexOf(filterText) > -1 ? "" : "none";
    }

    for (let i = 0; i < contactItems.length; i++) {
        let contactName = contactItems[i]
            .querySelector("h5")
            .innerText.toUpperCase();
        contactItems[i].style.display =
            contactName.indexOf(filterText) > -1 ? "" : "none";
    }
}

function searchBookmark() {
    inputElement = document.getElementById("searchbookmark");
    filterText = inputElement.value.toUpperCase();
    bookmarkItems = document
        .getElementById("chat-bookmark-list")
        .getElementsByTagName("li");

    for (let i = 0; i < bookmarkItems.length; i++) {
        let bookmarkLink = bookmarkItems[i].getElementsByTagName("a")[0];
        let bookmarkText = bookmarkLink.textContent || bookmarkLink.innerText;
        bookmarkItems[i].style.display =
            bookmarkText.toUpperCase().indexOf(filterText) > -1 ? "" : "none";
    }
}

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        document.getElementById("locationOutput").innerHTML =
            "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    document.getElementById("latitude").value = position.coords.latitude;
    document.getElementById("longitude").value = position.coords.longitude;
    document.getElementById("chat-input").value = "My Current Location";
}

let stream = null;

function cameraPermission() {
    if (navigator.mediaDevices.getUserMedia) {
        navigator.mediaDevices
            .getUserMedia({ video: true })
            .then(function (mediaStream) {
                stream = mediaStream;
                document.getElementById("videoElement").srcObject = stream;
                $(".cameraModal").modal("toggle");
            })
            .catch(function (error) {
                console.log(error);
            });
    } else {
        console.log("No camera access");
    }
}

// Stop the media stream when the modal is closed
$(".cameraModal").on("hidden.bs.modal", function () {
    if (stream) {
        stream.getTracks().forEach((track) => track.stop());
    }
});

// // Open the modal and start the camera
// $('.cameraModal').on('show.bs.modal', function () {
//     cameraPermission();
// });

function audioPermission() {
    navigator.mediaDevices
        .getUserMedia({ audio: true })
        .then(function (stream) {
            window.localStream = stream;
            window.localAudio.srcObject = stream;
            window.localAudio.autoplay = true;
        });
}

document.documentElement.style.setProperty(
    "--bs-primary-rgb",
    window.localStorage.getItem("colorPrimary")
),
    document.documentElement.style.setProperty(
        "--bs-secondary-rgb",
        window.localStorage.getItem("colorSecondary")
    );
var primaryColor = window
    .getComputedStyle(document.body, null)
    .getPropertyValue("--bs-primary-rgb");

function removeImage(img, index) {
    document.querySelector("#" + img).remove(),
        0 == document.querySelectorAll(".image-remove").length &&
            document.querySelector(".file_Upload").classList.remove("show");

    if (Images.length === 1) {
        Images = [];
    }
    Images.splice(index, 1);
}

function removeAttachedFile() {
    document.getElementById("remove-attechedFile") &&
        (document.getElementsByClassName("attechedFile-remove")[0],
        document
            .getElementById("remove-attechedFile")
            .addEventListener("click", function (e) {
                e.target.closest(".attchedfile_pre").remove();
            })),
        document
            .querySelector("#remove-attechedFile")
            .addEventListener("click", function () {
                document
                    .querySelector(".file_Upload ")
                    .classList.remove("show");
            });
    Files = [];
}
function removeAudioFile() {
    document.getElementById("remove-audioFile") &&
        (document.getElementsByClassName("audioFile-remove")[0],
        document
            .getElementById("remove-audioFile")
            .addEventListener("click", function (e) {
                e.target.closest(".audiofile_pre").remove();
            })),
        document
            .querySelector("#remove-audioFile")
            .addEventListener("click", function () {
                document
                    .querySelector(".file_Upload ")
                    .classList.remove("show");
            });

    Audios = [];
}



    document.getElementById("user-profile-edit-btn").addEventListener("click", function () {
        var editIcon = document.getElementById("edit-icon");
        document.querySelectorAll(".edit-input .form-control").forEach(function (input) {
            input.disabled = !input.disabled;
        });
        editIcon.classList.toggle("bxs-pencil");
        editIcon.classList.toggle("bxs-save");
        document.getElementById("updateBtn").classList.toggle("d-none");
    });
    

  