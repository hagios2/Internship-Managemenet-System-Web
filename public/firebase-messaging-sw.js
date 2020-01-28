importScripts('https://www.gstatic.com/firebasejs/7.7.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.7.0/firebase-messaging.js');

const firebaseConfig = {
    apiKey: "AIzaSyArb8lXWTJuu0liL4qbPQehfUbHj53Ug2c",
    authDomain: "internship-app-865a9.firebaseapp.com",
    databaseURL: "https://internship-app-865a9.firebaseio.com",
    projectId: "internship-app-865a9",
    storageBucket: "internship-app-865a9.appspot.com",
    messagingSenderId: "634564601633",
    appId: "1:634564601633:web:b6ee8fd3ef0e03d735c060",
     measurementId: "G-8XNLKGLLJC" 
  }; 
  
firebase.initializeApp(firebaseConfig); 

const messaging = firebase.messaging();

messaging.setBackgroundMessageHandler(function(payload){

    console.log('[firebase-messaging-sw.js] Received background message',  payload);

    var notifacationTitle = 'Background Message Title';
    var notifacationOptions = {
        body: 'Background Message body',
        icon: '/firebase-logo.png'
    };

    return self.registration.showNotification(notificationTitle, notificationOptions)
  }); 

