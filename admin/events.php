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
                    Add Event
                </div>
                <div class="content" style="text-align: left !important;">
                    <form class="row g-3" name="add_event" id="add_event">
                        <input type="hidden" name="action" value="add_event">
                        <div class="col-md-6">
                            <label for="event_name" class="form-label">Event Name</label>
                            <input type="text" class="form-control" id="event_name" name="event_name" autocomplete="off">
                        </div>
                        <div class="col-md-6">
                            <label for="event_date" class="form-label">Event Date</label>
                            <input type="date" class="form-control" id="event_date" name="event_date" autocomplete="off">
                        </div>
                        <div class="col-md-6">
                            <label for="event_image" class="form-label">Event Image</label>
                            <input class="form-control" type="file" name="event_image" id="event_image">
                        </div>
                        <div class="col-12">
                            <button type="button" id="bt_add_event" class="btn btn-primary">Add Event</button>
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
                    Add Special Occasions
                </div>
                <div class="content" style="text-align: left !important;">
                    <form class="row g-3" name="add_special" id="add_special">
                        <input type="hidden" name="action" value="add_special">
                        <div class="col-md-6">
                            <label for="category_name" class="form-label">Occasion Name</label>
                            <input type="text" class="form-control" name="special_name" id="special_name" autocomplete="off">
                        </div>
                        <div class="col-md-6">
                            <label for="occasion_image" class="form-label">Banner Image</label>
                            <input class="form-control" type="file" name="occasion_image" id="occasion_image">
                        </div>
                        <div class="col-12">
                            <button type="button" id="bt_add_special" class="btn btn-primary">Add Occasions</button>
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