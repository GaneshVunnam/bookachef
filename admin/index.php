<?php
include "includes/header.php";
include "../includes/functions.php";

$CategoryList = getAllCategories($conn);
$CuisineList     = getAllCuisines($conn);

?>
<style>
    .dash-bar{
  padding: 10px;
  color: #fff;
  background-color: #ff6c1c;
  font-family: "Source Sans Pro", "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
  font-weight: bold;
  margin-bottom: 15px;
}
</style>
    <section class="py-0">
        <div class="container">
          <div class="row flex-center">
            <div class="col-xxl-9 py-7 text-center">
                <div class="dash-bar">
                    Add Cuisine
                </div>
                <div class="content" style="text-align: left !important;">
                    <form class="row g-3" name="add_cuisine" id="add_cuisine">
                        <input type="hidden" name="action" value="add_cuisine">
                        <div class="col-md-6">
                            <label for="cuisine_name" class="form-label">Cuisine Name</label>
                            <input type="text" class="form-control" id="cuisine_name" name="cuisine_name" autocomplete="off">
                        </div>
                        <div class="col-12">
                            <button type="button" id="bt_add_cuisine" class="btn btn-primary">Add Cuisine</button>
                        </div>
                    </form>
                </div>
                
            </div>
          </div>
        </div>
    </section>
    <section class="py-0">
        <div class="container">
          <div class="row flex-center">
            <div class="col-xxl-9 text-center" style="padding-bottom: 5rem !important;">
                <div class="dash-bar">
                    Add Menu Category
                </div>
                <div class="content" style="text-align: left !important;">
                    <form class="row g-3" name="add_category" id="add_category">
                        <input type="hidden" name="action" value="add_category">
                        <div class="col-md-6">
                            <label for="category_name" class="form-label">Category Name</label>
                            <input type="text" class="form-control" name="category_name" id="category_name" autocomplete="off">
                        </div>
                        <div class="col-12">
                            <button type="button" id="bt_add_category" class="btn btn-primary">Add Category</button>
                        </div>
                    </form>
                </div>
                
            </div>
          </div>
        </div>
    </section>
    <section class="py-0">
        <div class="container">
          <div class="row flex-center">
            <div class="col-xxl-9 text-center" style="padding-bottom: 5rem !important;">
                <div class="dash-bar">
                    Add New Dish
                </div>
                <div class="content" style="text-align: left !important;">
                    <form class="row g-3" name="add_dish" id="add_dish">
                        <input type="hidden" name="action" value="add_dish">

                        <div class="col-md-6">
                            <label for="getCuisine" class="form-label">Cuisine</label>
                            <select id="getCuisine" name="getCuisine" class="form-select">
                                <option selected>Choose...</option>
                                <?php
                            
                                    foreach ($CuisineList as $value) {
                                        echo "<option value='".$value["id"]."'>".$value["cuisine_name"]."</option>";
                                    }
                                ?>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="getCategory" class="form-label">Category</label>
                            <select id="getCategory" name="getCategory" class="form-select">
                                <option selected>Choose...</option>
                                <?php
                                    
                                    foreach ($CategoryList as $value) {
                                        echo "<option value='".$value["category_name"]."'>".$value["category_name"]."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                       
                        <div class="col-md-6">
                            <label for="getDishName" class="form-label">Dish Name</label>
                            <input type="text" class="form-control" id="getDishName" name="getDishName">
                        </div>
                      
                        <div class="col-md-6">
                            <label for="getPrice" class="form-label">Price</label>

                            <div class="input-group mb-3">
                                <span class="input-group-text">₹</span>
                                <input type="number" id="getPrice" name="getPrice" class="form-control" >
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="button" id="bt_add_dish" class="btn btn-primary">Add Dish</button>
                        </div>
                    </form>
                </div>
                
            </div>
          </div>
        </div>
    </section>

<?php
include "includes/footer.php";
?>