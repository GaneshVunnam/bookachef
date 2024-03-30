<?php
  include "includes/header.php";
  include "../includes/functions.php";

  $Orders = getChefOrders($conn, $_SESSION['cid']);

?>
    <section class="py-5 overflow-hidden bg-primary" id="home">
        <div class="container" >
          <div class="row flex-center" style="padding-top: 50px;">
                <div class="list-group">
                    
                        
                        <?php
                                foreach ($Orders as $value) 
                                {
                                    $User = getUserDetails($conn,$value["user"]);
                                    
                                 
                                    $Status = "";
                                    $DisplayCancelBy = "none";

                                    if($value["payment"] == "YES")
                                    { 
                                        if($value["status"] == "Paid"){
                                            $Status = '<span class="badge rounded-pill bg-success"> Payment successfully received for ₹'.$value["amount"].'</span>';
                                        }else{
                                            $Status = '<span class="badge rounded-pill bg-success"> Payment generated for ₹'.$value["amount"].'</span>';
                                        }
                                        
                                    }else{
                                        $Status = '<span class="badge rounded-pill bg-warning text-dark">Pending Payment Generation.</span>';
                                    }

                                    if($value["request"] == "Selective")
                                    {
                                        $DisplayCancelBy = "none";

                                    }

                                    echo '
                                    <a href="#" class="list-group-item list-group-item-action" aria-current="true" style="margin-bottom: 20px;border-bottom-left-radius: inherit;border-bottom-right-radius: inherit;border-top-right-radius: inherit;border-top-left-radius: inherit;">
                                    <div class="d-flex w-100 justify-content-between" style="margin-bottom:20px;">
                                        <h5 class="mb-1">#ORDER ID - '.$value["id"]." ".$Status.'</h5>
                                        <small>'.time_elapsed_string($value["created_on"]).'</small>

                                        <button class="btn btn-primary" onclick="cancelorder(\''.$value["id"].'\')" style="background-color:#a0a301;border: 1px solid #a0a301;display:'.$DisplayCancelBy.';" type="button" >Reject</button>
                                    </div>
                                    <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <button class="nav-link active" id="order'.$value["id"].'-details-tab" data-bs-toggle="tab" data-bs-target="#tab-details'.$value["id"].'" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Details</button>
                                        <button class="nav-link" id="order'.$value["id"].'-menu-tab" data-bs-toggle="tab" data-bs-target="#tab-menu'.$value["id"].'" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Menu</button>
                                        <button class="nav-link" id="order'.$value["id"].'-payment-tab" data-bs-toggle="tab" data-bs-target="#tab-payment'.$value["id"].'" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Payment</button>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent" style="min-height: 255px;">
                                    <div class="tab-pane fade show active" id="tab-details'.$value["id"].'" role="tabpanel" aria-labelledby="order'.$value["id"].'-details-tab">
                                        <div class="row" style="margin-top:20px">
                                            <div class="col">
                                                <div class="form-floating mb-3">
                                                <input type="email" class="form-control" id="floatingInput" readonly value="'.$User["user"].'">
                                                <label for="floatingInput">Customer</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-floating mb-3">
                                                    <input type="email" class="form-control" id="floatingInput" readonly value="'.$User["email"].'">
                                                    <label for="floatingInput">Customer Email</label>
                                                </div>
                                            </div>
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
                                        <div class="row" style="margin-top:20px">
                                            <div class="col">
                                                <div class="form-floating mb-3">
                                                <input type="email" class="form-control" id="floatingInput" readonly value="'.date("d M, Y", strtotime($value["date"])).'">
                                                <label for="floatingInput">Booked Date</label>
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
                                        <div class="row" style="margin-top:10px">
                                          
                                            <div class="col">
                                                <div class="form-floating mb-3">
                                                <textarea class="form-control" id="floatingTextarea" readonly>'.stripslashes($value["conditions"]).'</textarea>
                                                <label for="floatingTextarea">Conditions</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab-menu'.$value["id"].'" style="padding-top:20px" role="tabpanel" aria-labelledby="order'.$value["id"].'-menu-tab">';
                                    $MenuItems = explode(",", $value["dishes"]);

                                    foreach ($MenuItems as $x) 
                                    {
                                      $Dish = getDishes($conn, $x);
                                      echo '<span class="badge rounded-pill bg-warning text-dark" style="margin-right:5px;font-size: 12px;">'.$Dish["name"].' (₹'.$Dish["price"].')</span>';
                                    }
                                    echo '</div>
                                    <div class="tab-pane fade" id="tab-payment'.$value["id"].'" role="tabpanel" aria-labelledby="order'.$value["id"].'-payment-tab">
                                        <table class="table table-sm">
                                            <thead>
                                                <th scope="col">#</th>
                                                <th scope="col">Menu Item</th>
                                                <th scope="col">Price Per Portion</th>
                                                <th scope="col">Total Portions</th>
                                                <th scope="col">Total Amount</th>
                                            </thead>
                                            <tbody>';

                                            $Bill = calculatePayment($conn,$value["id"]);

                                            $DisplayPayment = "block";

                                            if($Bill["payment"] == "YES"){
                                                $DisplayPayment = 'none';
                                            }else{
                                                $DisplayPayment = 'block';
                                            }

                                            foreach ($Bill["menu"] as $Item) 
                                            {
                                                echo   '<tr>
                                                <th scope="row">'.$Item["no"].'</th>
                                                <td>'.$Item["name"].'</td>
                                                <td> ₹'.$Item["ppp"].'</td>
                                                <td>'.$Item["tp"].'</td>
                                                <td> ₹'.$Item["tm"].'</td>
                                                </tr>';
                                            }

                                            echo '<tr>
                                                    <td colspan="4" style="text-align: right;">GST (18%)</td>
                                                    <td> ₹'.$Bill["total_gst"].'</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" style="text-align: right;">Total Price</td>
                                                    <td> ₹'.$Bill["total_price"].'</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <button class="btn btn-primary" onclick="generatepayment(\''.$value["id"].'\',\''.$Bill["total_price"].'\')" style="background-color:#a0a301;border: 1px solid #a0a301;display:'.$DisplayPayment.';" type="button" >Generate Payment</button>
                                    </div>
                                </div></a>';
                                }
                        ?>
                        
                    
                </div>
          </div>
        </div>
    </section>




<?php
  include "includes/footer.php";
?>