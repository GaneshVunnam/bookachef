<?php
include "includes/header.php";
include "includes/functions.php";

$CuisineList     = getAllCuisines($conn);
$ChefList        = getChefDetails($conn);

$UserID = isset($_SESSION['uid']) ? addslashes((trim($_SESSION['uid']))) : "0";

?>

<div class="container">
	<div class="row justify-content-center" style="margin-top:30px;">
		<div class="col-11 col-sm-9 col-md-7 col-lg-12 col-xl-12 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2 id="heading" class="text-1000 fs-3 fw-bold ms-2 text-gradient">Find your Private Chef</h2>
                <p>A few details will help us find the right Private Chef for you.</p>

                <form id="msform">
                    <input name="action" type="hidden" value="booknow" />
                    <input name="user" type="hidden" value="<?php echo $UserID; ?>" />

                    <div class="progress">
                    	<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                	</div>
                    <br>
                    <fieldset>
                        <div>
                            <div class="row">
                        		<div class="col-12">
                            		<h2 class="fs-title" style="text-align: center;">We're located in...</h2>
                            	</div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="city" id="user_city" value="" style="background-color: #ffb800;">
                                        <label for="user_city" style="color: #212529;">City</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" name="persons" id="user_guest" value="" style="background-color: #ffb800;">
                                        <label for="user_guest" style="color: #212529;">Guest</label>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating">
                                        <select class="form-select" name="DineOption" id="user_meal" style="background-color: #ffb800;" >
                                            <option value="" selected>Choose Meal</option>
                                            <option value="Breakfast">Breakfast</option>
                                            <option value="Lunch">Lunch</option>
                                            <option value="Dinner">Dinner</option>
                                        </select>
                                        <label for="user_meal" style="color: #212529;">Meal</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="date" id="user_date" value="" style="background-color: #ffb800;">
                                        <label for="user_date" style="color: #212529;">Date</label>
                                    </div>
                                </div>
                               
                            
                            </div>
                        </div>
                        <button class="btn btn-danger next" style="margin-top:30px;" onclick="location_part()" type="button">Next</button>
                    </fieldset>
                    <fieldset>
                        <div id="SelectCuisine">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="fs-title" style="text-align: center;">Our preferred cuisine is...</h2>
                                </div>
                            </div>
                            <div class="cuisinecontainer" style="display: flex;flex-wrap: wrap;justify-content: center;">
                            <?php
                            
                            foreach ($CuisineList as $value) {
                                echo '<div class="m-wizard-buttons-grid__item" style="text-align: center;">
                                <input id="c'.$value["id"].'" name="CuisineOption" type="radio" value="'.$value["id"].'" class="hidden">
                                <label for="c'.$value["id"].'" class="u-font-size-16">
                                    <span class="a-button-wizard d-block" style="min-width: 9.75rem;margin:0px 10px;padding: 1rem 1rem;">
                                        <span class="d-flex flex-row justify-content-start">
                                            <span class="x-icon d-flex flex-column justify-content-center">
                                            </span>
                                            <span class="d-flex flex-column justify-content-center" style="width:100%;"><strong>'.$value["cuisine_name"].'</strong></span>
                                        </span>
                                    </span>
                                </label>
                            </div>';
                            }
                            ?>
                            </div>
                            
                        </div>
                        <button class="btn btn-danger previous" style="margin-top:30px;" type="button">Back</button>
                        <button class="btn btn-danger next" style="margin-top:30px;" type="button">Next</button>
                    </fieldset>
                    <fieldset>
                        <div id="SelectMenuItems">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="fs-title" style="text-align: center;">We like...</h2>
                                    <div id="categoryitem">
                                           
                                    </div>
                                </div>
                            </div>
                           <div id="menucontainer" style="display: flex;flex-wrap: wrap;justify-content: center;">
                                   
            
                            </div>
                          
                        </div>
                        <button class="btn btn-danger previous" style="margin-top:30px;" type="button">Back</button>
                        <button class="btn btn-danger next" style="margin-top:30px;" type="button">Next</button>
                    </fieldset>
                    <fieldset>
                        <div id="SelectSpecificRestrictions">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="fs-title" style="text-align: center;">Specifically... Any restrictions</h2>
                                </div>
                            </div>
                             <div class="m-wizard-buttons-grid__item" style="text-align: center;">
                             <textarea id="SpecificRestrictions" name="SpecificRestrictions" rows="6" cols="70" style="outline:none;" placeholder="One of my friends is alergic to garlic and..."></textarea>
                            </div>
                          
                        </div>
                        <button class="btn btn-danger previous" style="margin-top:30px;" type="button">Back</button>
                        <button class="btn btn-danger next" style="margin-top:30px;" type="button">Next</button>
                    </fieldset>
                  
                    <fieldset>
                        <div id="SelectChef">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="fs-title" style="text-align: center;">Choose your chef</h2>
                                </div>
                            </div>
                            <div id="chefcontainer" style="display: flex;flex-wrap: wrap;justify-content: center;">
                                   
                                <?php
                                    foreach ($ChefList as $value) {
                                        echo '<div class="m-wizard-buttons-grid__item" style="text-align: center;">
                                        <input id="co'.$value["id"].'" name="ChefOption" type="radio" value="'.$value["id"].'" class="hidden">
                                        <label for="co'.$value["id"].'" class="u-font-size-16">
                                            <span class="a-button-wizard d-block" style="min-width: 9.75rem;margin:0px 10px;padding: 1rem 1rem;">
                                                <span class="d-flex flex-row justify-content-start">
                                                    <span class="x-icon d-flex flex-column justify-content-center">
                                                    <img style="border-radius: 50%;" src="'.$value["image"].'"  width="50" height="50">
                                                    </span>
                                                    <span class="d-flex flex-column justify-content-center" style="width:100%;"><strong>'.$value["username"].'</strong></span>
                                                </span>
                                                <span class="d-flex flex-column justify-content-center" style="width:100%;"><strong>Exp : '.$value["exp"].'</strong></span>
                                                <span class="d-flex flex-column justify-content-center" style="width:100%;"><strong>City : '.$value["city"].'</strong></span>
                                            </span>
                                        </label>
                                    </div>';
                                    }
                                ?>
                           
                            </div>
                          
                        </div>
                        <button class="btn btn-danger previous" style="margin-top:30px;" type="button">Back</button>
                        <button class="btn btn-danger next" id="booknow" style="margin-top:30px;" data-book="Y" type="button">Book Now</button>
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                        	<div class="row">
                        		<div class="col-12">
                                    <h2 class="fs-title" style="text-align: center;">We have received your request!</h2>
                            	</div>
                            	
                            </div>
                            <br><br>
                            <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2>
                            <br>
                            <div class="row justify-content-center">
                                <div class="col-3">
                                    <img src="assets/img/success.png" class="fit-image">
                                </div>
                            </div>
                            <br><br>
                            <div class="row justify-content-center">
                                <div class="col-7 text-center">
                                    <h5 class="purple-text text-center">Our chef will contact you shortly.</h5>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
	</div>
</div>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script> -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
<script type="text/javascript" src="assets/packages/daterangepicker/daterangepicker.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
  
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script>

const date = new Date();

let day = date.getDate();
let month = date.getMonth() + 1;
let year = date.getFullYear();

let currentDate = `${month}/${day}/${year}`;

$('#user_date').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    opens: "center",
    minDate: currentDate,
    locale: {
      format: 'YYYY-MM-DD'
    }
}, function(start, end, label) {
 
});

const queryString = window.location.search;
const urlParams   = new URLSearchParams(queryString);

var city = urlParams.get('city')
var eventdate = urlParams.get('date')


$('#user_city').val(city);

if(eventdate != "")
{
    $('#user_date').val(eventdate);

}


function location_part(){
    // if(!$("#user_city").val()){
    //     alert("Enter City");
    //     return false;
    // }

    // if(!$("#user_guest").val()){
    //     alert("Select Guest");
    //     return false;
    // }

    // if(!$("#user_meal").val()){
    //     alert("Select Meal");
    //     return false;
    // }

    
}

</script>
<?php
include "includes/footer.php";
?>