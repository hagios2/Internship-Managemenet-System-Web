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

var messaging = firebase.messaging();

messaging.requestPermission()
         .then(function(){
            
            console.log('Notification permission granted');

            return messaging.getToken()
                
        }).then(function(token){
               // $('#device_token').val(token);
            console.log(token);
            
        }).catch(function(err){

            console.log('Unable to get permission to notify ', err);
        
        }); 

messaging.onMessage((payload) => {

    console.log(payload);

});
