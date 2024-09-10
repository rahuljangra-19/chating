/*
Give the service worker access to Firebase Messaging.
Note that you can only use Firebase Messaging here, other Firebase libraries are not available in the service worker.
*/
importScripts(
  "https://www.gstatic.com/firebasejs/9.6.1/firebase-app-compat.js"
);
importScripts(
  "https://www.gstatic.com/firebasejs/9.6.1/firebase-messaging-compat.js"
);

/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
* New configuration for app@pulseservice.com
*/
firebase.initializeApp({
  apiKey: "AIzaSyAyzDyuCashEvEYRCGYLnZRauGhmHizoGg",
  authDomain: "chat-notify-a21be.firebaseapp.com",
  projectId: "chat-notify-a21be",
  storageBucket: "chat-notify-a21be.appspot.com",
  messagingSenderId: "104073877308",
  appId: "1:104073877308:web:177557e8058a5e6ed7b039",
});

/*
Retrieve an instance of Firebase Messaging so that it can handle background messages.
*/
const messaging = firebase.messaging();
messaging.onBackgroundMessage(function (payload) {
  console.log(
    "[firebase-messaging-sw.js] Received background message ",
    payload
  );
  /* Customize notification here */
  const notificationTitle = payload.data.title;
  const notificationOptions = {
    body: payload.data.body,
    icon: "https://wittytalk.me/public/chat-icon.png",
    badge: "https://wittytalk.me/public/chat-icon.png",
    data: {
      url: payload.data.url || "http://localhost/chat/dashboard",
    },
  };

  return self.registration.showNotification(
    notificationTitle,
    notificationOptions
  );
});

self.addEventListener("notificationclick", function (event) {
  // console.log("Notification clicked!");
  event.notification.close();
  const url = event.notification.data.url;

  event.waitUntil(
    (async () => {
      // Check if the tab is already open
      const allClients = await clients.matchAll({
        type: "window",
        includeUncontrolled: true,
      });
      const matchingClient = allClients.find((client) => client.url === url);

      if (matchingClient) {
        // Focus the existing tab
        await matchingClient.focus();
      } else {
        // Open the URL in a new window
        await clients.openWindow(url);
      }
    })()
  );
});
