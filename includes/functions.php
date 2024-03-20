<?php
function getAllCategories($conn){
    $GetCategories = "SELECT * FROM tbl_category";
    $Results    = mysqli_query($conn,$GetCategories);
    $ListArray = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $data = array();
            $data["id"]                     = $record["id"];
            $data["category_name"]          = $record["name"];
            array_push($ListArray,$data);

        }

    }

    return $ListArray;
}

function getAllCuisines($conn){
    $GetCategories = "SELECT * FROM tbl_cuisines";
    $Results    = mysqli_query($conn,$GetCategories);
    $ListArray = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $data = array();
            $data["id"]                     = $record["id"];
            $data["cuisine_name"]           = $record["name"];
            array_push($ListArray,$data);

        }

    }

    return $ListArray;
}

function getProfileInfo($conn, $id)
{
    $Query = "SELECT * FROM tbl_login WHERE id = '$id'";
    $Results    = mysqli_query($conn,$Query);

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $data = array();
            $data["id"]                     = $record["id"];
            $data["username"]               = $record["username"];
            $data["email"]                  = $record["email"];
            $data["user_type"]              = $record["user_type"];
            $data["mobile_number"]          = $record["mobile_number"];
            $data["first_name"]             = $record["first_name"];
            $data["last_name"]              = $record["last_name"];
            $data["address_line_1"]         = $record["address_line_1"];
            $data["address_line_2"]         = $record["address_line_2"];
            $data["postcode"]               = $record["postcode"];
            $data["state"]                  = $record["state"];
            $data["country"]                = $record["country"];
            $data["image"]                  = $record["image"];

            return $data;

        }

    }

}

function UploadImageFile($folder,$image){
    try 
    {
        $uploadDirectory = "../$folder/";
        $uploadURL       = $folder.'/';
        $image_file_path = "";

        if (!file_exists($uploadDirectory)) {
            mkdir($uploadDirectory, 0755, true);
        }

        $file_ext  =    pathinfo($_FILES["$image"]['name'], PATHINFO_EXTENSION);
        $file_name = $_FILES["$image"]["name"];
        $file_tmp  = $_FILES["$image"]["tmp_name"];
        $ext       = pathinfo($file_name, PATHINFO_EXTENSION);

        if (in_array($ext, ['jpeg', 'jpg', 'png', 'gif','PNG', 'jfif'])) {
            $newFileName = date("YmdHis") . "." . $file_ext;
            $uploadPath = $uploadDirectory . $newFileName;


            if (move_uploaded_file($file_tmp, $uploadPath)) {
                $image_file_path= $uploadURL . $newFileName;
            }
        }

        return $image_file_path;

    } catch (Exception $ex) {
        return "Upload Error : ".$ex->getMessage();
    }
}

function getAllEvents($conn){
    $Query = "SELECT * FROM tbl_events WHERE event_type = 'Event' AND event_date >= CURDATE()";
    $Results    = mysqli_query($conn,$Query);
    $ListArray = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $data                   = array();
            $data["id"]             = $record["event_id"];
            $data["name"]           = $record["event_name"];
            $data["date"]           = $record["event_date"];
            $data["image"]          = $record["event_image"];
            $data["type"]           = $record["event_type"];

            array_push($ListArray,$data);

        }

    }

    return $ListArray;
}

function getAllSpecialEvents($conn){
    $Query = "SELECT * FROM tbl_events WHERE event_type = 'Special'";
    $Results    = mysqli_query($conn,$Query);
    $ListArray = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $data                   = array();
            $data["id"]             = $record["event_id"];
            $data["name"]           = $record["event_name"];
            $data["image"]          = $record["event_image"];
            $data["type"]           = $record["event_type"];

            array_push($ListArray,$data);

        }

    }

    return $ListArray;
}

function getAllOrders($conn, $id){
    $GetCategories = "SELECT * FROM tbl_bookings WHERE user = '$id' ORDER BY id DESC";
    $Results    = mysqli_query($conn,$GetCategories);
    $ListArray = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $data = array();
            $data["id"]            = $record["id"];
            $data["user"]          = $record["user"];

            $data["city"]          = $record["city"];
            $data["guest"]         = $record["guest"];
            $data["date"]          = $record["date"];
            $data["meal"]          = $record["meal"];
            $data["cuisine"]       = $record["cuisine"];
            $data["ingredients"]   = $record["ingredients"];
            $data["restrictions"]  = $record["restrictions"];
            $data["conditions"]    = $record["conditions"];

            $data["dishes"]        = $record["dishes"];
            $data["request"]       = $record["request"];
            $data["direct_request"]  = $record["direct_request"];

            $data["status"]          = $record["status"];
            $data["created_on"]      = $record["created_on"];

            $data["payment"]      = $record["payment"];
            $data["amount"]       = $record["amount"];
            $data["chef_update"]  = $record["chef_update"];


            array_push($ListArray,$data);

        }

    }

    return $ListArray;
}

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

function getCuisineName($conn, $id)
{
    $Query = "SELECT * FROM tbl_cuisines WHERE id = '$id'";
    $Results    = mysqli_query($conn,$Query);

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            return $record["name"];
        }
    }
}

function getDishes($conn, $id){
    $Query = "SELECT * FROM tbl_menu WHERE id = '$id'";
    $Results    = mysqli_query($conn,$Query);
    $ListArray = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $data                   = array();
            $data["id"]             = $record["id"];
            $data["name"]           = $record["dish"];
            $data["price"]          = $record["price"];

            return $data;

        }

    }

}

function getAllOrdersForChef($conn){
    $GetCategories = "SELECT * FROM tbl_bookings WHERE status = 'Order Received' ORDER BY id DESC";
    $Results    = mysqli_query($conn,$GetCategories);
    $ListArray = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $data = array();
            $data["id"]            = $record["id"];
            $data["user"]          = $record["user"];

            $data["city"]          = $record["city"];
            $data["guest"]         = $record["guest"];
            $data["date"]          = $record["date"];
            $data["meal"]          = $record["meal"];
            $data["cuisine"]       = $record["cuisine"];
            $data["ingredients"]   = $record["ingredients"];
            $data["restrictions"]  = $record["restrictions"];
            $data["conditions"]    = $record["conditions"];

            $data["dishes"]        = $record["dishes"];
            $data["request"]       = $record["request"];
            $data["direct_request"]  = $record["direct_request"];

            $data["status"]          = $record["status"];
            $data["created_on"]      = $record["created_on"];

            array_push($ListArray,$data);

        }

    }

    return $ListArray;
}

function getChefOrders($conn, $id){
    $GetCategories = "SELECT * FROM tbl_bookings WHERE direct_request = '$id' ORDER BY id DESC";
    $Results    = mysqli_query($conn,$GetCategories);
    $ListArray = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $data = array();
            $data["id"]            = $record["id"];
            $data["user"]          = $record["user"];

            $data["city"]          = $record["city"];
            $data["guest"]         = $record["guest"];
            $data["date"]          = $record["date"];
            $data["meal"]          = $record["meal"];
            $data["cuisine"]       = $record["cuisine"];
            $data["ingredients"]   = $record["ingredients"];
            $data["restrictions"]  = $record["restrictions"];
            $data["conditions"]    = $record["conditions"];

            $data["dishes"]        = $record["dishes"];
            $data["request"]       = $record["request"];
            $data["direct_request"]  = $record["direct_request"];

            $data["status"]          = $record["status"];
            $data["created_on"]      = $record["created_on"];

            $data["payment"]         = $record["payment"];
            $data["amount"]          = $record["amount"];
            $data["amount"]          = $record["amount"];

            array_push($ListArray,$data);

        }

    }

    return $ListArray;
}

function getUserDetails($conn, $id){
    $GetCategories = "SELECT * FROM tbl_login WHERE id = '$id'";
    $Results    = mysqli_query($conn,$GetCategories);
    $ListArray = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $data = array();
            $data["id"]            = $record["id"];
            $data["user"]          = $record["username"];
            $data["email"]          = $record["email"];
          
            return $data;

        }

    }

}

function getSingleOrderDetails($conn, $id){
    $GetCategories = "SELECT * FROM tbl_bookings WHERE id = '$id'";
    $Results    = mysqli_query($conn,$GetCategories);
    $ListArray = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $data = array();
            $data["id"]            = $record["id"];
            $data["user"]          = $record["user"];

            $data["city"]          = $record["city"];
            $data["guest"]         = $record["guest"];
            $data["date"]          = $record["date"];
            $data["meal"]          = $record["meal"];
            $data["cuisine"]       = $record["cuisine"];
            $data["ingredients"]   = $record["ingredients"];
            $data["restrictions"]  = $record["restrictions"];
            $data["conditions"]    = $record["conditions"];

            $data["dishes"]          = $record["dishes"];
            $data["request"]         = $record["request"];
            $data["direct_request"]  = $record["direct_request"];
            $data["payment"]         = $record["payment"];

            $data["status"]          = $record["status"];
            $data["created_on"]      = $record["created_on"];

            return $data;

        }

    }
}

function calculatePayment($conn, $id){

    $ListArray   = array();
    $TotalAmount = 0;
    $TotalPrice  = 0;
    $Count       = 1;

    $Order = getSingleOrderDetails($conn, $id);

    $ListArray["user"]            = $Order["user"];
    $ListArray["payment"]         = $Order["payment"];

    $MenuArray   = array();

    $MenuItems   = explode(",", $Order["dishes"]);

    foreach ($MenuItems as $x) 
    {
        $Dish                  = getDishes($conn, $x);
        $data                  = array();
        $data["no"]            = $Count;
        $data["name"]          = $Dish["name"];
        $data["ppp"]           = $Dish["price"];
        $data["tp"]            = $Order["guest"];
        
        $Portion               = (int) $Order["guest"];
        $Price                 = (int) $Dish["price"];
        $ItemTotal             = $Portion * $Price;

        $data["tm"]            = $ItemTotal;

        $TotalAmount           += $ItemTotal;

        array_push($MenuArray,$data);

        ++$Count;
    }

    $ListArray["menu"]            = $MenuArray;

    $ListArray["total_amount"]    = $TotalAmount;

    $GST                          = (18 / 100) * $TotalAmount;

    $ListArray["total_gst"]       = round($GST);
    $ListArray["total_price"]     = round($TotalAmount + $GST);

    return $ListArray;
}

function getChefInfo($conn, $id){
    $GetCategories = "SELECT * FROM tbl_login WHERE id = '$id'";
    $Results    = mysqli_query($conn,$GetCategories);
    $ListArray = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $data                  = array();
            $data["id"]            = $record["id"];
            $data["username"]      = $record["username"];
            $data["email"]         = $record["email"];
            $data["image"]         = $record["image"];
            $data["mobile_number"] = $record["mobile_number"];
            $data["first_name"]    = $record["first_name"];
            $data["last_name"]     = $record["last_name"];
           
            return $data;

        }

    }
}
?>