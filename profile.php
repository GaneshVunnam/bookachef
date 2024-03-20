<?php
  include "includes/header.php";
  include "includes/functions.php";

  $Profile = getProfileInfo($conn, isset($_SESSION["uid"]) ? $_SESSION["uid"] : '0');

  $ProfilePic = empty($Profile["image"]) ? 'assets/img/profile.jpg' : $Profile["image"];

?>

<div class="container rounded bg-white mt-5 mb-5">
<form action="#" id="updateprofile" class="contact-form">
<input type="hidden" name="action" value="profile">
<input type="hidden" name="id" value="<?php echo $_SESSION["uid"]; ?>">

    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" id="profile_pic" width="150px" src="<?php echo $ProfilePic; ?>">
                <input type="file" id="profilepic" name="profilepic" hidden="">
                <label class="btn btn-success-soft btn-block" for="profilepic" style="color:#212121">Upload Image</label>
            </div>
            
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">My Profile</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" placeholder="first name" id="first_name" name="first_name" value="<?php echo $Profile["first_name"]; ?>"></div>
                    <div class="col-md-6"><label class="labels">Surname</label><input type="text" id="last_name" name="last_name" class="form-control" value="<?php echo $Profile["last_name"]; ?>" placeholder="surname"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" name="mobile" id="mobile"  placeholder="enter phone number" value="<?php echo $Profile["mobile_number"]; ?>"></div>
                    <div class="col-md-12"><label class="labels">Address Line 1</label><input type="text" class="form-control" id="address_line_1" name="address_line_1" placeholder="enter address line 1" value="<?php echo $Profile["address_line_1"]; ?>"></div>
                    <div class="col-md-12"><label class="labels">Address Line 2</label><input type="text" class="form-control" id="address_line_2" name="address_line_2"  placeholder="enter address line 2" value="<?php echo $Profile["address_line_2"]; ?>"></div>
                    <div class="col-md-12"><label class="labels">Postcode</label><input type="text" id="postcode" name="postcode" class="form-control" placeholder="Postcode" value="<?php echo $Profile["postcode"]; ?>"></div>
                    <div class="col-md-12"><label class="labels">Email ID</label><input type="text" id="email" name="email" class="form-control" placeholder="enter email id" value="<?php echo $Profile["email"]; ?>"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Country</label><input type="text" id="country" name="country" class="form-control" placeholder="country" value="<?php echo $Profile["country"]; ?>"></div>
                    <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" id="state" name="state" value="<?php echo $Profile["state"]; ?>" placeholder="state"></div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" id="bt_update_profile" type="button">Update Profile</button></div>
            </div>
        </div>
        <div class="col-md-4">
        </div>
    </div>
    </form>

</div>
</div>
</div>
<script>
 
</script>
<?php
  include "includes/footer.php";
?>