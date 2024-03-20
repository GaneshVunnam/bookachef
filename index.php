<?php
include "includes/header.php";
include "includes/functions.php";

$Events = getAllEvents($conn);
$SpecialEvents = getAllSpecialEvents($conn);

?>
      <section class="py-5 overflow-hidden bg-primary" id="home">
        <div class="container">
          <div class="row flex-center">
            <div class="col-md-5 col-lg-6 order-0 order-md-1 mt-8 mt-md-0"><a class="img-landing-banner" href="#!"><img class="img-fluid" src="assets/img/gallery/hero-header.png" alt="hero-header" /></a></div>
            <div class="col-md-7 col-lg-6 py-8 text-md-start text-center">
              <h1 class="display-1 fs-md-5 fs-lg-6 fs-xl-8 text-light">Are you starving?</h1>
              <h1 class="text-800 mb-5 fs-4">Within a few clicks, find a chef to <br class="d-none d-xxl-block" />cook a meal at home</h1>
              <div class="card w-xxl-75">
                <div class="card-body">
                  <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                      <form class="row gx-2 gy-2 align-items-center">
                        <div class="col">
                          <div class="input-group-icon"><i class="fas fa-map-marker-alt text-danger input-box-icon"></i>
                            <label class="visually-hidden" for="inputDelivery">Address</label>
                            <input class="form-control input-box form-foodwagon-control" id="inputDelivery" type="text" placeholder="Enter Your City" />
                          </div>
                        </div>
                        <div class="d-grid gap-3 col-sm-auto">
                          <button class="btn btn-danger" onclick="bookchef_by_city()" type="button">Find a chef</button>
                        </div>
                      </form>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                      <form class="row gx-4 gy-2 align-items-center">
                        <div class="col">
                          <div class="input-group-icon"><i class="fas fa-map-marker-alt text-danger input-box-icon"></i>
                            <label class="visually-hidden" for="inputPickup">Address</label>
                            <input class="form-control input-box form-foodwagon-control" id="inputPickup" type="text" placeholder="Enter Your Address" />
                          </div>
                        </div>
                        <div class="d-grid gap-3 col-sm-auto">
                          <button class="btn btn-danger" type="button">Find food</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="py-0">
          <div class="col-lg-6 text-center mx-auto mb-3 mb-md-5 mt-4">
            <h5 class="fw-bold text-danger fs-3 fs-lg-2 lh-sm my-6">Upcoming Events</h5>
          </div>
          <div class="container">
            <div class="row h-100 gx-2 mt-7">
             
              <?php
							
							foreach ($Events as $value) 
							{
								echo '<div class="col-sm-6 col-lg-3 mb-3 mb-md-0 h-100 pb-4">
                <div class="card card-span h-100">
                  <div class="position-relative"> <img class="img-fluid rounded-3 w-100" src="'.$value["image"].'" alt="..." />
                    <div class="card-actions">
                      <div class="badge badge-foodwagon bg-primary p-3">
                        <div class="d-flex flex-between-center">
                          <div class="text-white fs-4">'.date("d", strtotime($value["date"])).'</div>
                            <div class="fw-normal fs-1 mt-2">'.date("M", strtotime($value["date"])).'</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="d-grid gap-3 col-sm-auto"><button class="btn btn-danger"  onclick="location.href = \'bookchef-v1.php?date='.date("Y-m-d", strtotime($value["date"])).'\';"  style="margin:15px;" type="button">Book Now</button></div>
              </div>';
							}
						?>
            </div>
          </div>
      </section>


      <section class="py-4 overflow-hidden">
        <div class="container">
          <div class="row h-100">
            <div class="col-lg-7 mx-auto text-center  mb-5"><!--mt-7 -->
              <h5 class="fw-bold text-danger fs-3 fs-lg-2 lh-sm my-6">Special Occasions</h5>
            </div>
            <div class="col-12">
              <div class="carousel slide" id="carouselPopularItems" data-bs-touch="false" data-bs-interval="false">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="10000">
                      
                      <div class="row gx-3 h-100 align-items-center">
                        
                        <?php
							
                        foreach ($SpecialEvents as $value) 
                        {
                          echo '<div class="col-sm-6 col-md-3 col-xl mb-5 h-100" style="width:20%;">
                          <div class="card card-span h-100 rounded-3"><img class="img-fluid rounded-3" style="height: 180px;width:210px;" src="'.$value["image"].'" alt="..." />
                            <div class="card-body ps-0">
                              <h5 class="fw-bold text-1000 text-truncate mb-1" style="width:210px;">'.$value["name"].'</h5>
                              <!-- <div><span class="text-warning me-2"><i class="fas fa-map-marker-alt"></i></span><span class="text-primary">Burger Arena</span></div><span class="text-1000 fw-bold">$3.88</span> -->
                            </div>
                          </div>
                          <div class="d-grid gap-2" style="width:210px;"><a class="btn btn-lg btn-danger" href="bookchef-v1.php " role="button">Book Now</a></div>
                        </div>';
                        }
                      ?>
                      </div>
                    </div>
                    </div>
                  </div>
                </div>
               
              </div>
            </div>
          </div>
        </div><!-- end of .container-->
        
      </section>
    
  






      <section class="py-0">
        <div class="bg-holder" style="background-image:url(assets/img/gallery/cta-two-bg.png);background-position:center;background-size:cover;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
          <div class="row flex-center">
            <div class="col-xxl-9 py-7 text-center">
              <h1 class="fw-bold mb-4 text-white fs-6">Are you ready to order <br />with the best chefs? </h1><a class="btn btn-danger" href="<?php echo isset($_SESSION['uid']) ? "bookchef-v1.php" : "login.php" ?>"> Book Now<i class="fas fa-chevron-right ms-2"></i></a>
            </div>
          </div>
        </div>
      </section>


<?php
include "includes/footer.php";
?>