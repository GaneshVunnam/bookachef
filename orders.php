<?php
  include "includes/header.php";
  include "includes/functions.php";

  $Orders = getAllOrders($conn, $_SESSION['uid']);
?>
    <section class="py-5 overflow-hidden bg-primary" id="home">
        <div class="container">
          <div class="row flex-center" style="padding-top: 50px;">
            <div class="list-group">
            <?php
							
              foreach ($Orders as $value) 
              {
                $Notification = "";
                // if($value["chef_update"]){
                //   $Notification = '<span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle" onclick="" >
                //   <span class="visually-hidden">New alerts</span>
                // </span>';
                // }
                

                echo '<a href="#" class="list-group-item list-group-item-action " style="margin-bottom: 20px;border-bottom-left-radius: inherit;border-bottom-right-radius: inherit;border-top-right-radius: inherit;border-top-left-radius: inherit;" aria-current="true">
                <div class="d-flex w-100 justify-content-between" >
                  <h5 class="mb-1">#ORDER ID - '.$value["id"].' <span class="badge rounded-pill bg-success">'.$value["status"].'</span>
                  </h5>
                  <small>'.time_elapsed_string($value["created_on"]).'</small>
                </div>
        
                <div class="d-flex align-items-start" style="margin-top: 20px;">
                  <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="order'.$value["id"].'-tab-info" data-bs-toggle="pill" data-bs-target="#order'.$value["id"].'-pills-info" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Details</button>
                    <button class="nav-link" id="order'.$value["id"].'-tab-ins" data-bs-toggle="pill" data-bs-target="#order'.$value["id"].'-pills-ins" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Instructions</button>
                    <button class="nav-link" id="order'.$value["id"].'-tab-dish" data-bs-toggle="pill" data-bs-target="#order'.$value["id"].'-pills-dish" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Menu</button>
                    <button class="nav-link" id="order'.$value["id"].'-tab-chef" data-bs-toggle="pill" data-bs-target="#order'.$value["id"].'-pills-chef" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">From Chef 
                      '.$Notification.'
                    </button>
                  </div>
                  <div class="tab-content" id="v-pills-tabContent" style="width: 100%;">
                    <div class="tab-pane fade show active" id="order'.$value["id"].'-pills-info" role="tabpanel" aria-labelledby="order'.$value["id"].'-tab-info">
                      <div class="row">
                        <div class="col">
                          <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" readonly value="'.date("d M, Y", strtotime($value["date"])).'">
                            <label for="floatingInput">Booked Date</label>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" readonly value="'.date("h:i A", strtotime($value["date"])).'">
                            <label for="floatingInput">Booked Time</label>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" readonly value="'.$value["guest"].'">
                            <label for="floatingInput">Guest</label>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" readonly value="'.$value["city"].'">
                            <label for="floatingInput">City</label>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col">
                          <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" readonly value="'.$value["meal"].'">
                            <label for="floatingInput">Meal</label>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" readonly value="'.getCuisineName($conn, $value["cuisine"]).'">
                            <label for="floatingInput">Cuisine</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="order'.$value["id"].'-pills-ins" role="tabpanel" aria-labelledby="order'.$value["id"].'-tab-ins">
                      <div class="row">
                        <div class="col">
                        
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="form-floating mb-3">
                            <textarea class="form-control" id="floatingTextarea" readonly>'.stripslashes($value["conditions"]).'</textarea>
                            <label for="floatingTextarea">Conditions</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="order'.$value["id"].'-pills-dish" role="tabpanel" aria-labelledby="order'.$value["id"].'-tab-dish">';
                    $MenuItems = explode(",", $value["dishes"]);

                    foreach ($MenuItems as $x) 
                    {
                      $Dish = getDishes($conn, $x);
                      echo '<span class="badge rounded-pill bg-warning text-dark" style="margin-right:5px;font-size: 12px;">'.$Dish["name"].' (₹'.$Dish["price"].')</span>';
                    }

                    echo '</div>
                    <div class="tab-pane fade" id="order'.$value["id"].'-pills-chef" role="tabpanel" aria-labelledby="order'.$value["id"].'-tab-chef">
                      <ul class="list-group">';
                      $Chef = getChefInfo($conn, $value["direct_request"]);
                      if($value["status"] == "Order Received"){
                        echo '<li class="list-group-item list-group-item-warning" id="OrderReceived">We are waiting for a chef to accept your order.</li>';
                      }else if($value["status"] == "Accepted"){

                        if($value["payment"] == "YES"){
                          echo '<li class="list-group-item list-group-item-success" id="OrderReceived">
                              <img src="'.$Chef["image"].'" style="height: 50px;width: 50px;border-radius: 50%;" alt="quixote">
                              Chef, '. ucfirst($Chef["username"]).' has generated payment for your order.
                              </li>';

                          echo '<li class="list-group-item list-group-item-success">
                                Proceed to pay ₹'.$value["amount"].  '
                                <button class=""btn btn-primary btn-sm" onclick="pay_now(\''.$value["id"].'\')" style="background-color:#a0a301;border: 1px solid #a0a301;" type="button">Pay Now</button>
                                <input type="hidden" id="TotalAmount" value="'.$value["amount"].'">
                                </li>';
                        }else{
                          echo '<li class="list-group-item list-group-item-warning" id="OrderReceived">
                              <img src="'.$Chef["image"].'" style="height: 50px;width: 50px;border-radius: 50%;" alt="quixote">
                              Chef, '. ucfirst($Chef["username"]).' has accepted your order.
                              </li>';
                        }
                      }else if($value["status"] == "Paid"){
                        echo '<li class="list-group-item list-group-item-success" id="OrderReceived">
                        Payment for ₹'.$value["amount"].' is successfully received for your order.
                        </li>';
                      }

                      echo '</ul>
                    </div>
                  </div>
                </div>
              </a>';
              }

            ?>
            </div>
          </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script type="text/javascript">

        function pay_now(order)
        {
            var name          = ""; // Add Name
            var amount        = $("#TotalAmount").val(); // Get total amount
            var actual_amount = parseInt(amount) * 100;
            var description   = "Book a chef"; // Add description

            var options = {
                "key": "rzp_test_L1stWFZEA9XXVL",
                "amount": actual_amount, 
                "currency": "INR",
                "name": name,
                "description": description,
                "image": "", 
                "handler": function (response){
                    console.log(response);
                    $.ajax({
                        url: 'api/common.php',
                        'type': 'POST',
                        'data': {
                            'action': 'payment',  
                            'order': order, 
                            'payment_id':response.razorpay_payment_id,
                            'amount':actual_amount,
                            'total':amount,
                        },
                        success:function(data){
                            window.location.href = 'orders.php'; // Add redirect page
                        }

                    });
                },
            };

            var rzp1 = new Razorpay(options);
            rzp1.on('payment.failed', function (response){
                    alert(response.error.code);
                    alert(response.error.description);
                    alert(response.error.source);
                    alert(response.error.step);
                    alert(response.error.reason);
                    alert(response.error.metadata.order_id);
                    alert(response.error.metadata.payment_id);
            });

            rzp1.open();
        }
    </script>


<?php
  include "includes/footer.php";
?>


<!-- <div class="form-floating mb-3">
                            <textarea class="form-control" id="floatingTextarea" readonly>'.$value["restrictions"].'</textarea>
                            <label for="floatingTextarea">Restrictions</label>
                          </div> -->