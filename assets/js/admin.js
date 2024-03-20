$("#Bt_Signup").click(function(){
    signup();
});

function signup(){
    var data_frm = new FormData($("form#signup")[0]);
    $.ajax({
         url: "api/common.php",
         type: "POST",
         data: data_frm,
         processData: false,
         contentType: false,
         success: function(data) {
            var details = JSON.parse(data);

            if (details["status"] == "200") {
                  alert(details["message"]);
                  window.location.replace("login.php");

            } else {
                 alert(details["message"]);
            }
         },
         error: function() {
              alert("E1: Signup Error.");
              return false;
         }
    });
}


$("#Bt_login").click(function(){
    login();
});

function login()
{
    var data_frm = new FormData($("form#login")[0]);
    $.ajax({
         url: "api/common.php",
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

$("#Bt_adminlogin").click(function(){
    adminlogin();
});

function adminlogin()
{
    var data_frm = new FormData($("form#adminlogin")[0]);
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

var current_fs, next_fs, previous_fs; 
var opacity;
var current = 1;
var steps = $("fieldset").length;

setProgressBar(current);

$(".next").click(function(){
    
    current_fs = $(this).parent();
    next_fs = $(this).parent().next();
    
    //Add Class Active
    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
    
    //show the next fieldset
    next_fs.show(); 
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
        step: function(now) {
            // for making fielset appear animation
            opacity = 1 - now;

            current_fs.css({
                'display': 'none',
                'position': 'relative'
            });
            next_fs.css({'opacity': opacity});
        }, 
        duration: 500
    });
    setProgressBar(++current);

    var book = $(this).attr("data-book");
    if(book == "Y"){
        alert();
    }
});

$(".previous").click(function(){
    
    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();
    
    //Remove class active
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
    
    //show the previous fieldset
    previous_fs.show();

    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
        step: function(now) {
            // for making fielset appear animation
            opacity = 1 - now;

            current_fs.css({
                'display': 'none',
                'position': 'relative'
            });
            previous_fs.css({'opacity': opacity});
        }, 
        duration: 500
    });
    setProgressBar(--current);
});

function setProgressBar(curStep){
    var percent = parseFloat(100 / steps) * curStep;
    percent = percent.toFixed();
    $(".progress-bar")
      .css("width",percent+"%")   
}

$(".submit").click(function(){
    return false;
})
    
$('input:radio[name="expoption"]').change(
function(){
     if (this.checked && this.value == '1') {
     $("#MulTime").css("display", "none");
     $("#OneTime").css("display", "block");
     }else{
     $("#OneTime").css("display", "none");
     $("#MulTime").css("display", "block");
     }
});




$('#AdultCounter').handleCounter({
    minimum: 0,
    onChange:function(){},
    onMinimum:function(){},
    onMaximize:function(){}
})

$(function ($) {
    $.autofilter();
});

$("#home_menu").click(function(){
    window.location.replace("index.php");
})

$("#search_menu").click(function(){
    window.location.replace("search.php");
})

$("#events_menu").click(function(){
    window.location.replace("events.php");
})

$("#profile_menu").click(function(){
    window.location.replace("profile.php");
})

$("#bt_add_cuisine").click(function(){
    addcuisine();
});

function addcuisine(){
    var data_frm = new FormData($("form#add_cuisine")[0]);
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
                  window.location.replace("index.php");

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

$("#bt_add_category").click(function(){
    addcategory();
});

function addcategory(){
    var data_frm = new FormData($("form#add_category")[0]);
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
                  window.location.replace("index.php");

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

$("#bt_add_dish").click(function(){
    adddish();
});

function adddish(){
    var data_frm = new FormData($("form#add_dish")[0]);
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
                  window.location.replace("index.php");

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

$("#bt_add_event").click(function(){
    addevent();
});

function addevent(){
    var data_frm = new FormData($("form#add_event")[0]);
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
                  window.location.replace("events.php");

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

$("#bt_add_special").click(function(){
    addspecial();
});

function addspecial(){
    var data_frm = new FormData($("form#add_special")[0]);
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
                  window.location.replace("events.php");

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