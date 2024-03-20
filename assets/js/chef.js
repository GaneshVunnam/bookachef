$("#Bt_login").click(function(){
    login();
});

function login()
{
    var data_frm = new FormData($("form#login")[0]);
    $.ajax({
         url: "../api/common.php",
         type: "POST",
         data: data_frm,
         processData: false,
         contentType: false,
         success: function(data) {
              var details = JSON.parse(data);

              if (details["status"] == "200") {
                    // alert(details["message"]);
                    window.location.replace("index.php");

              } else {
                   alert(details["message"]);
              }
         },
         error: function() {
              alert("E2: Login Error.");
              return false;
         }
    });
}

$("#bt_update_profile").click(function(){
     updateprofile();
 });
 
 function updateprofile(){
     var data_frm = new FormData($("form#updateprofile")[0]);
     $.ajax({
          url: "../api/common.php",
          type: "POST",
          data: data_frm,
          processData: false,
          contentType: false,
          success: function(data) {
             var details = JSON.parse(data);
 
             if (details["status"] == "200") {
                   alert(details["message"]);
                   window.location.replace("profile.php");
 
             } else {
                  alert(details["message"]);
             }
          },
          error: function() {
               alert("E1");
               return false;
          }
     });
 }

 $('#profilepic').change(function(){
     const file = this.files[0];
     if (file){
       let reader = new FileReader();
       reader.onload = function(event){
         $('#profile_pic').attr('src', event.target.result);
       }
       reader.readAsDataURL(file);
     }
 });


 
$("#home_menu").click(function(){
     window.location.replace("index.php");
 })

 $("#profile_menu").click(function(){
     window.location.replace("profile.php");
 })

 $("#orders_menu").click(function(){
     window.location.replace("orders.php");
 })

 function acceptorder(order, chef){
     $.ajax({
          url: "../api/common.php",
          type: "POST",
          data: {
                    action: "accept_orders", 
                    order: order, 
                    chef: chef,
               },
        
          success: function(data) {
               var details = JSON.parse(data);
     
               if (details["status"] == "200") {
                    alert( details["message"]);
                    window.location.replace("orders.php");
     
               } else {
                    alert( details["message"]);
               }
          },
          error: function() {
               alert("E4: Add Favourite Error.");
               return false;
          }
     });
 }


 function generatepayment(order, amount){
     $.ajax({
          url: "../api/common.php",
          type: "POST",
          data: {
                    action: "generate_payment", 
                    order: order, 
                    amount: amount,
               },
          success: function(data) {
               var details = JSON.parse(data);
     
               if (details["status"] == "200") {
                    alert( details["message"]);
                    window.location.replace("orders.php");
     
               } else {
                    alert( details["message"]);
               }
          },
          error: function() {
               alert("E4: Add Favourite Error.");
               return false;
          }
     });
 }

