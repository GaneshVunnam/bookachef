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
function CheckForm(){
	var checked=false;
	var elements = document.getElementsByName("menuoption[]");
	for(var i=0; i < elements.length; i++){
		if(elements[i].checked) {
			checked = true;
		}
	}
	if (!checked) {
		alert('Select Dishes');
	}

	return checked;
}

$(".next").click(function(){
    
    current_fs = $(this).parent();
    next_fs = $(this).parent().next();
    
    if(!$("#user_city").val()){
        alert("Enter City");
        return false;
    }

    if(!$("#user_guest").val()){
        alert("Select Guest");
        return false;
    }

    if(!$("#user_meal").val()){
        alert("Select Meal");
        return false;
    }

    if(!$("#user_date").val()){
        alert("Select Date");
        return false;
    }

    if($('#SelectCuisine').is(':visible')){
        if (!$('input[name=CuisineOption]:checked').length) {
            alert("Select Cuisine");
            return false;

        }
    }


    if($('#SelectMenuItems').is(':visible')){
   
        if(!CheckForm()){
            return false;
        }

    }

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
    //    console.log( $('#msform').serializeArray());
       booknow();
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

$(function ($) {
    $.autofilter();
});
    
$('input:radio[name="CuisineOption"]').change(
function(){

    $.ajax({
        url: "api/common.php",
        type: "POST",
        data: {
                  action: "get_cuisine_details", 
                  id: this.value, 
             },
      
        success: function(data) {
             var details = JSON.parse(data);

             if (details["status"] == "200") {

                // console.log(details["categories"]);
                // console.log(details["menus"]);

                $("#categoryitem").html('');
                $("#menucontainer").html('');

                $("#categoryitem").append('<span data-filter>All</span>');

                for(let i = 0; i < details["categories"].length; i++) {
                    let category = details["categories"][i];
                    $("#categoryitem").append('<span data-filter="'+category.category+'">'+category.category+'</span>');
                }

                for(let j = 0; j < details["menus"].length; j++) {
                    let menus = details["menus"][j];
                    $("#menucontainer").append('<div data-tags="'+menus.category+'" class="m-wizard-buttons-grid__item" style="text-align: center;"><input type="checkbox" name="menuoption[]" id="m'+j+'" value="'+menus.id+'" class="hidden"><label for="m'+j+'" class="u-font-size-16"><span class="a-button-wizard d-block" style="min-width: 9.75rem;margin:0px 10px;padding: 1rem 1rem;"><span class="d-block"><strong>'+menus.dish+'</strong></span><span class="d-block font-weight-normal">₹'+menus.price+'</span></span></label></div>');
                }
                $(function ($) {
                    $.autofilter();
                });

             } else {
                alert(details["message"]);
             }
        },
        error: function() {
             alert("E4: Add Favourite Error.");
             return false;
        }
   });

   $.ajax({
    url: "api/common.php",
    type: "POST",
    data: {
              action: "get_cuisine_details", 
              id: this.value, 
         },
  
    success: function(data) {
         var details = JSON.parse(data);

         if (details["status"] == "200") {

            // console.log(details["categories"]);
            // console.log(details["menus"]);

            $("#categoryitem").html('');
            $("#menucontainer").html('');

            $("#categoryitem").append('<span data-filter>All</span>');

            for(let i = 0; i < details["categories"].length; i++) {
                let category = details["categories"][i];
                $("#categoryitem").append('<span data-filter="'+category.category+'">'+category.category+'</span>');
            }

            for(let j = 0; j < details["menus"].length; j++) {
                let menus = details["menus"][j];
                $("#menucontainer").append('<div data-tags="'+menus.category+'" class="m-wizard-buttons-grid__item" style="text-align: center;"><input type="checkbox" name="menuoption[]" id="m'+j+'" value="'+menus.id+'" class="hidden"><label for="m'+j+'" class="u-font-size-16"><span class="a-button-wizard d-block" style="min-width: 9.75rem;margin:0px 10px;padding: 1rem 1rem;"><span class="d-block"><strong>'+menus.dish+'</strong></span><span class="d-block font-weight-normal">₹'+menus.price+'</span></span></label></div>');
            }
            $(function ($) {
                $.autofilter();
            });

         } else {
            alert(details["message"]);
         }
    },
    error: function() {
         alert("E4: Add Favourite Error.");
         return false;
    }
});

});



// $('#date-range').dateRangePicker({
//      inline:true,
//      container: '#date-range-container',
//      singleDate : true,
//      alwaysOpen:true,
//      format: 'YYYY-MM-DD HH:mm',
//      time: {
// 		enabled: true
// 	}
// });



$('#AdultCounter').handleCounter({
    minimum: 0,
    onChange:function(){},
    onMinimum:function(){},
    onMaximize:function(){}
})

$('#KidsCounter').handleCounter({
    minimum: 0,
    onChange:function(){},
    onMinimum:function(){},
    onMaximize:function(){}
})


$("#home_menu").click(function(){
    window.location.replace("index.php");
})

$("#search_menu").click(function(){
    window.location.replace("search.php");
})

$("#orders_menu").click(function(){
    window.location.replace("orders.php");
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

function booknow(){
    var data_frm = new FormData($("form#msform")[0]);
    $.ajax({
         url: "api/common.php",
         type: "POST",
         data: data_frm,
         processData: false,
         contentType: false,
         success: function(data) {
            var details = JSON.parse(data);

            if (details["status"] == "200") {
                //   alert(details["message"]);
                //   window.location.replace("index.php");

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
         url: "api/common.php",
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

function bookchef_by_city(){

    if(!$("#inputDelivery").val()){
        alert("Enter City");
        return false;
    }

    var city = $('#inputDelivery').val();

    window.location.replace("bookchef-v1.php?city="+city);



}