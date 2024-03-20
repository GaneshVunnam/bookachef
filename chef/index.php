<?php
include "includes/header.php";
include "../includes/functions.php";

$Orders = getAllOrdersForChef($conn);

?>
   
    <section class="py-4 overflow-hidden bg-primary">
        <div class="container" >
            <div class="row">
                <div class="col-lg-7 mx-auto text-center">
                    <h5 class="fw-bold fs-3 fs-lg-2 lh-sm my-6" style="color:#fff;">Open Orders</h5>
                </div>
                <div class="col-12">
                    <div class="row gx-3 align-items-center">
                        <div class="list-group">
                            <?php
                                foreach ($Orders as $value) 
                                {
                                    echo '<a href="#" class="list-group-item list-group-item-action" style="margin-bottom: 10px;border-radius: 0.5rem;" aria-current="true">
                                    <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">#ORDER ID - '.$value["id"].'</h5> 
                                    <small>'.time_elapsed_string($value["created_on"]).'</small>
                                    <button class="btn btn-primary" onclick="acceptorder(\''.$value["id"].'\',\''.$_SESSION['cid'].'\')" style="background-color:#a0a301;border: 1px solid #a0a301;" type="button">Accept</button>
                                    </div>
                                    <p class="mb-1" style="margin-top:20px;"></p>
                                    <small></small>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control" style="background-color:#a0a301;border: 1px solid #a0a301;" id="floatingInput" readonly value="'.date("d M, Y", strtotime($value["date"])).'">
                                                <label for="floatingInput">Booked Date</label>
                                            </div>
                                        </div>
                                        
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control" id="floatingInput" style="background-color:#a0a301;border: 1px solid #a0a301;" readonly value="'.$value["guest"].'">
                                                <label for="floatingInput">Guest</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control" style="background-color:#a0a301;border: 1px solid #a0a301;" id="floatingInput" readonly value="'.$value["city"].'">
                                                <label for="floatingInput">City</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" style="background-color:#a0a301;border: 1px solid #a0a301;" id="floatingInput" readonly value="'.$value["meal"].'">
                                            <label for="floatingInput">Meal</label>
                                        </div>
                                        </div>
                                        <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" style="background-color:#a0a301;border: 1px solid #a0a301;" id="floatingInput" readonly value="'.getCuisineName($conn, $value["cuisine"]).'">
                                            <label for="floatingInput">Cuisine</label>
                                        </div>
                                        </div>
                                    </div>
                                    </a>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>











 
    
  






   


<?php
include "includes/footer.php";
?>