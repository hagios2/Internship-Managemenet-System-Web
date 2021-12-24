/*  */
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

messaging.requestPermission()
         .then(function(){
            
            console.log('Notification permission granted');

            return messaging.getToken()
                
        }).then(function(token){

               $('#device_token').val(token);
            
               console.log(token);
            
        }).catch(function(err){

            console.log('Unable to get permission to notify ', err);
        
        }); 

messaging.onMessage((payload) => {

    console.log(payload);

    if(payload.notification.tille == 'student message')
    {
      $('<li class="replies"><img src="http://emilcarlsson.se/assets/mikeross.png" alt="" /><p>' + payload.notification.body + '</p></li>').appendTo($('.messages ul'));
      $('.message-input input').val(null);
      $('.contact.active .preview').html('<span>You: </span>' + payload.notification.body);
      $(".messages").animate({ scrollTop: $(document).height() }, "fast");

    }else if(payload.notification.tille == 'main_cordinator message')
    {
      $('<li class="sent"><img src="http://emilcarlsson.se/assets/mikeross.png" alt="" /><p>' + payload.notification.body + '</p></li>').appendTo($('.messages ul'));
      $('.message-input input').val(null);
      $('.contact.active .preview').html('<span>You: </span>' + payload.notification.body);
      $(".messages").animate({ scrollTop: $(document).height() }, "fast");
     
    }


    $('.numberalert').empty().html(payload.data['gcm.notification.badge'])

   /*  $('.number-message').empty().html() */

});
 