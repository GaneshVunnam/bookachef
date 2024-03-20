<?php
include "includes/header.php";
include "includes/functions.php";

$CuisineList     = getAllCuisines($conn);

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
                    <!-- fieldsets -->
                    <fieldset>
                        <div >
                        	<div class="row">
                        		<div class="col-12">
                            		<h2 class="fs-title" style="text-align: center;">We're located in...</h2>
                            	</div>
                            </div>
                            <div class="input-group-icon" style="width: 50%;margin: 0 auto;"><i class="fas fa-map-marker-alt text-danger input-box-icon"></i>
                                <label class="visually-hidden" for="inputDelivery">Address</label>
                                <input class="form-control input-box form-foodwagon-control" id="inputDelivery" name="city" type="text" placeholder="Enter Your City" />
                            </div>
                        </div>
                        <button class="btn btn-danger next" style="margin-top:30px;" type="button">Next</button>
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                        		<div class="col-12">
                            		<h2 class="fs-title" style="text-align: center;">We are...</h2>
                            	</div>
                            </div>     
                            <div class="m-wizard-buttons-grid__item" style="text-align: center;">
                                <label class="u-font-size-16">
                                    <span class="a-button-wizard d-block">
                                        <div class="handle-counter" id="AdultCounter" style="margin: 0 auto;width: 120px;">
                                            <div class="counter-minus btn btn-primary" style="background-color: #F17228;">-</div>
                                            <input type="text" value="0" name="persons" style="border:none;outline: none;font-size: 20px;" readonly>
                                            <div class="counter-plus btn btn-primary" style="background-color: #F17228;">+</div>
                                        </div>
                                        <span class="d-block font-weight-normal">Adults</span>
                                    </span>
                                </label>
                            </div>
                            <!-- <div class="m-wizard-buttons-grid__item" style="text-align: center;">
                                <label class="u-font-size-16">
                                    <span class="a-button-wizard d-block">
                                        <div class="handle-counter" id="KidsCounter" style="margin: 0 auto;width: 120px;">
                                            <div class="counter-minus btn btn-primary" style="background-color: #F17228;">-</div>
                                            <input type="text" value="0" name="kids" style="border:none;outline: none;font-size: 20px;" readonly>
                                            <div class="counter-plus btn btn-primary" style="background-color: #F17228;">+</div>
                                        </div>
                                        <span class="d-block font-weight-normal">Kids</span>
                                    </span>
                                </label>
                            </div> -->
                        
                        </div>
                    
                        <button class="btn btn-danger previous" style="margin-top:30px;" type="button">Back</button>
                        <button class="btn btn-danger next" style="margin-top:30px;" type="button">Next</button>
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div id="MulTime">
                                <div class="row">
                                    <div class="col-12">
                                        <h2 class="fs-title" style="text-align: center;">We want on...</h2>
                                    </div>
                                </div>
                                <input type="hidden" id="date-range" name="date" size="40" value="">
                                <div id="date-range-container" style="width:456px;margin: 0 auto;"></div>


                            </div>
                        </div>
                        <button class="btn btn-danger previous" style="margin-top:30px;" type="button">Back</button>
                        <button class="btn btn-danger next" style="margin-top:30px;" type="button">Next</button>
                    </fieldset>
                    <fieldset>
                        <div id="SelectDine">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="fs-title" style="text-align: center;">It's for...</h2>
                                </div>
                            </div>
                            <div class="m-wizard-buttons-grid__item" style="text-align: center;">
                                <input id="dine1" name="DineOption" type="radio" value="Breakfast" class="hidden">
                                <label for="dine1" class="u-font-size-16">
                                    <span class="a-button-wizard d-block">
                                        <span class="d-flex flex-row justify-content-start">
                                            <span class="x-icon d-flex flex-column justify-content-center">
                                                <!-- <i class="fas fa-user me-2"></i> -->
                                            </span>
                                            <span class="d-flex flex-column justify-content-center" style="width:100%;"><strong>Breakfast</strong></span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                            <div class="m-wizard-buttons-grid__item" style="text-align: center;">
                                <input id="dine2" name="DineOption" type="radio" value="Lunch" class="hidden">
                                <label for="dine2" class="u-font-size-16">
                                    <span class="a-button-wizard d-block">
                                        <span class="d-flex flex-row justify-content-start">
                                            <span class="x-icon d-flex flex-column justify-content-center">
                                                <!-- <i class="fas fa-user me-2"></i> -->
                                            </span>
                                            <span class="d-flex flex-column justify-content-center" style="width:100%;"><strong>Lunch</strong></span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                            <div class="m-wizard-buttons-grid__item" style="text-align: center;">
                                <input id="dine3" name="DineOption" type="radio" value="Dinner" class="hidden">
                                <label for="dine3" class="u-font-size-16">
                                    <span class="a-button-wizard d-block">
                                        <span class="d-flex flex-row justify-content-start">
                                            <span class="x-icon d-flex flex-column justify-content-center">
                                                <!-- <i class="fas fa-user me-2"></i> -->
                                            </span>
                                            <span class="d-flex flex-column justify-content-center" style="width:100%;"><strong>Dinner</strong></span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        
                        <button class="btn btn-danger previous" style="margin-top:30px;" type="button">Back</button>
                        <button class="btn btn-danger next" style="margin-top:30px;" type="button">Next</button>
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
                    <!-- <fieldset>
                        <div id="SelectIngredients">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="fs-title" style="text-align: center;">We choose...</h2>
                                </div>
                            </div>
                             <div class="m-wizard-buttons-grid__item" style="text-align: center;">
                                <input id="type1" name="ingredientsoption" type="radio" value="Chef" class="hidden">
                                <label for="type1" class="u-font-size-16">
                                    <span class="a-button-wizard d-block">
                                        <span class="d-block">
                                            <strong>Let chef purchase the ingredients.</strong>
                                        </span>
                                        <span class="d-block font-weight-normal">Recommended</span>
                                    </span>
                                </label>
                            </div>
                            <div class="m-wizard-buttons-grid__item" style="text-align: center;">
                                <input type="radio" name="ingredientsoption" id="type2" value="Customer" class="hidden">
                                <label for="type2" class="u-font-size-16">
                                    <span class="a-button-wizard d-block">
                                        <span class="d-block">
                                            <strong>Let us purchase the ingredients.</strong>
                                        </span>
                                        <span class="d-block font-weight-normal"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <button class="btn btn-danger previous" style="margin-top:30px;" type="button">Back</button>
                        <button class="btn btn-danger next" style="margin-top:30px;" type="button">Next</button>
                    </fieldset> -->
                    <fieldset>
                        <div id="SelectRestrictions">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="fs-title" style="text-align: center;">Any dietary restrictions?</h2>
                                </div>
                            </div>
                             <div class="m-wizard-buttons-grid__item" style="text-align: center;">
                                <input id="d1" name="dietoption[]" type="checkbox" value="Vegetarian" class="hidden">
                                <label for="d1" class="u-font-size-16">
                                    <span class="a-button-wizard d-block">
                                        <span class="d-block">
                                            <strong>Vegetarian</strong>
                                        </span>
                                        <span class="d-block font-weight-normal"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="m-wizard-buttons-grid__item" style="text-align: center;">
                                <input type="checkbox" name="dietoption[]" id="d2" value="Gluten" class="hidden">
                                <label for="d2" class="u-font-size-16">
                                    <span class="a-button-wizard d-block">
                                        <span class="d-block">
                                            <strong>Gluten</strong>
                                        </span>
                                        <span class="d-block font-weight-normal"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="m-wizard-buttons-grid__item" style="text-align: center;">
                                <input type="checkbox" name="dietoption[]" id="d3" value="Nuts" class="hidden">
                                <label for="d3" class="u-font-size-16">
                                    <span class="a-button-wizard d-block">
                                        <span class="d-block">
                                            <strong>Nuts</strong>
                                        </span>
                                        <span class="d-block font-weight-normal"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="m-wizard-buttons-grid__item" style="text-align: center;">
                                <input type="checkbox" name="dietoption[]" id="d4" value="Shellfish" class="hidden">
                                <label for="d4" class="u-font-size-16">
                                    <span class="a-button-wizard d-block">
                                        <span class="d-block">
                                            <strong>Shellfish</strong>
                                        </span>
                                        <span class="d-block font-weight-normal"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="m-wizard-buttons-grid__item" style="text-align: center;">
                                <input type="checkbox" name="dietoption[]" id="d5" value="Dairy" class="hidden">
                                <label for="d5" class="u-font-size-16">
                                    <span class="a-button-wizard d-block">
                                        <span class="d-block">
                                            <strong>Dairy Products</strong>
                                        </span>
                                        <span class="d-block font-weight-normal"></span>
                                    </span>
                                </label>
                            </div>
                            <!-- <div class="m-wizard-buttons-grid__item" style="text-align: center;">
                                <input type="checkbox" name="dietoption[]" id="d6" value="None" class="hidden">
                                <label for="d6" class="u-font-size-16">
                                    <span class="a-button-wizard d-block">
                                        <span class="d-block">
                                            <strong>None</strong>
                                        </span>
                                        <span class="d-block font-weight-normal"></span>
                                    </span>
                                </label>
                            </div> -->
                        </div>
                        <button class="btn btn-danger previous" style="margin-top:30px;" type="button">Back</button>
                        <button class="btn btn-danger next" style="margin-top:30px;" type="button">Next</button>
                    </fieldset>
                    <fieldset>
                        <div id="SelectSpecificRestrictions">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="fs-title" style="text-align: center;">Specifically... Other restrictions</h2>
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
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
<script type="text/javascript" src="assets/packages/daterangepicker/daterangepicker.js"></script> -->

<script>
// $('#date-range-container-2').daterangepicker({
//     "timePicker": true,
//     "autoApply": true,
//     "alwaysShowCalendars": true,
//     "startDate": "01/25/2024",
//     "endDate": "01/31/2024",
//     "opens": "center"
// }, function(start, end, label) {
//   console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
// });


 
</script>
<?php
include "includes/footer.php";
?>