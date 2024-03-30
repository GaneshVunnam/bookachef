<?php
include "../includes/config.php";
include "../includes/functions.php";

$ResponseArray 	= 	array();
$ErrorResponse  =    "";
$Action			=	stripslashes(trim($_REQUEST["action"]));
$HtmlContent    =    "";

if(isset($Action) && $Action == "login"){
    try {

        $email		= addslashes((trim($_REQUEST['email'])));
        $password	= addslashes((trim($_REQUEST['password'])));

        $CheckUserQuery = "SELECT * FROM tbl_login WHERE email = '$email' AND password = '$password' AND user_type = 'user'";
        $CheckUserQueryResults = mysqli_query($conn,$CheckUserQuery);

        if (mysqli_num_rows($CheckUserQueryResults) > 0) 
        {
            while($record = mysqli_fetch_assoc($CheckUserQueryResults)) 
            {
                $_SESSION["logged_in"] = true;
                $_SESSION["uid"]       = $record["id"];
                $_SESSION["username"]  = $record["username"];
                $_SESSION["useremail"] = $record["email"];
                $_SESSION["usertype"]  = $record["user_type"];
            }

            
            
            $ResponseArray["status"]  = "200";
            $ResponseArray["message"] = "Login Successfull.";
        } else {
            $ResponseArray["status"]  = "300";
            $ResponseArray["message"] = "Incorrect username or password.";
        }

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
}else if(isset($Action) && $Action == "chef_login"){
    try {

        $email		= addslashes((trim($_REQUEST['email'])));
        $password	= addslashes((trim($_REQUEST['password'])));

        $CheckUserQuery = "SELECT * FROM tbl_login WHERE email = '$email' AND password = '$password' AND user_type = 'chef'";
        $CheckUserQueryResults = mysqli_query($conn,$CheckUserQuery);

        if (mysqli_num_rows($CheckUserQueryResults) > 0) 
        {
            while($record = mysqli_fetch_assoc($CheckUserQueryResults)) 
            {
                $_SESSION["chef_logged_in"] = true;
                $_SESSION["cid"]       = $record["id"];
                $_SESSION["chefname"]  = $record["username"];
                $_SESSION["chefemail"] = $record["email"];
                $_SESSION["usertype"]  = $record["user_type"];
            }

            
            
            $ResponseArray["status"]  = "200";
            $ResponseArray["message"] = "Login Successfull.";
        } else {
            $ResponseArray["status"]  = "300";
            $ResponseArray["message"] = "Incorrect username or password.";
        }

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
}else if(isset($Action) && $Action == "register"){

    try {
        $username	= addslashes((trim($_REQUEST['username'])));
        $email	    = addslashes((trim($_REQUEST['email'])));
        $mobile	    = addslashes((trim($_REQUEST['mobile'])));
        $type	    = addslashes((trim($_REQUEST['user_type'])));
        $password	= addslashes((trim($_REQUEST['password'])));
    
        $LoginArray = array();
        $LoginArray["username"]      = $username;
        $LoginArray["email"]         = $email;
        $LoginArray["mobile_number"]        = $mobile;
        $LoginArray["user_type"]     = $type;
        $LoginArray["password"]      = $password;
    
        $columns = implode(", ",array_keys($LoginArray));
        $escaped_values = array_map(array($conn, 'real_escape_string'), array_values($LoginArray));
        $values  = implode("', '", $escaped_values);
        $AddNewUserQuery = "INSERT INTO tbl_login ($columns) VALUES ('$values')";
        $ExecuteAddNewUserQuery = mysqli_query($conn,$AddNewUserQuery) or die ("Error in query: $AddNewUserQuery. ".mysqli_error($conn));
        
        $ResponseArray["status"]  = "200";
        $ResponseArray["message"] = "Registration Successfull.";

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
   
}else if(isset($Action) && $Action == "adminlogin"){

    try {
        $email		= addslashes((trim($_REQUEST['email'])));
        $password	= addslashes((trim($_REQUEST['password'])));

        $CheckUserQuery = "SELECT * FROM tbl_login WHERE email = '$email' AND password = '$password'";
        $CheckUserQueryResults = mysqli_query($conn,$CheckUserQuery);

        if (mysqli_num_rows($CheckUserQueryResults) > 0) 
        {
            while($record = mysqli_fetch_assoc($CheckUserQueryResults)) 
            {
                $_SESSION["admin_logged_in"] = true;
                $_SESSION["aid"]       = $record["id"];
                $_SESSION["adminname"]  = $record["username"];
                $_SESSION["adminemail"] = $record["email"];
                $_SESSION["usertype"]  = $record["user_type"];
            }

            
            
            $ResponseArray["status"]  = "200";
            $ResponseArray["message"] = "Login Successfull.";
        } else {
            $ResponseArray["status"]  = "300";
            $ResponseArray["message"] = "Incorrect username or password.";
        }

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
   
}else if(isset($Action) && $Action == "add_cuisine"){

    try {
        $cuisine_name		= addslashes((trim($_REQUEST['cuisine_name'])));

        $InsertArray = array();
        $InsertArray["name"]            = $cuisine_name;
        $InsertArray["created_on"]      = date('Y-m-d H:i:s');

        $columns = implode(", ",array_keys($InsertArray));
        $escaped_values = array_map(array($conn, 'real_escape_string'), array_values($InsertArray));
        $values  = implode("', '", $escaped_values);
        $Query = "INSERT INTO tbl_cuisines ($columns) VALUES ('$values')";
        $Execute = mysqli_query($conn,$Query) or die ("Error in query: $Query. ".mysqli_error($conn));
        
        $ResponseArray["status"]  = "200";
        $ResponseArray["message"] = "Cuisine Added Successfull.";

            
          

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
   
}else if(isset($Action) && $Action == "add_category"){

    try {
        $category_name		= addslashes((trim($_REQUEST['category_name'])));

        $InsertArray = array();
        $InsertArray["name"]            = $category_name;

        $columns = implode(", ",array_keys($InsertArray));
        $escaped_values = array_map(array($conn, 'real_escape_string'), array_values($InsertArray));
        $values  = implode("', '", $escaped_values);
        $Query = "INSERT INTO tbl_category ($columns) VALUES ('$values')";
        $Execute = mysqli_query($conn,$Query) or die ("Error in query: $Query. ".mysqli_error($conn));
        
        $ResponseArray["status"]  = "200";
        $ResponseArray["message"] = "Category Added Successfull.";

            
          

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
   
}else if(isset($Action) && $Action == "add_dish"){

    try {
        $getCuisine		= addslashes((trim($_REQUEST['getCuisine'])));
        $getCategory	= addslashes((trim($_REQUEST['getCategory'])));
        $getDishName	= addslashes((trim($_REQUEST['getDishName'])));
        $getPrice		= addslashes((trim($_REQUEST['getPrice'])));

        $InsertArray = array();
        $InsertArray["cid"]            = $getCuisine;
        $InsertArray["category"]       = $getCategory;
        $InsertArray["dish"]           = $getDishName;
        $InsertArray["price"]          = $getPrice;

        $columns = implode(", ",array_keys($InsertArray));
        $escaped_values = array_map(array($conn, 'real_escape_string'), array_values($InsertArray));
        $values  = implode("', '", $escaped_values);
        $Query = "INSERT INTO tbl_menu ($columns) VALUES ('$values')";
        $Execute = mysqli_query($conn,$Query) or die ("Error in query: $Query. ".mysqli_error($conn));
        
        $ResponseArray["status"]  = "200";
        $ResponseArray["message"] = "Dish Added Successfull.";

            
          

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
   
}else if(isset($Action) && $Action == "get_cuisine_details"){

    try {
        $id		= addslashes((trim($_REQUEST['id'])));
       
        $GetCategories = "SELECT DISTINCT category FROM tbl_menu WHERE cid = ".$id;
        $CategoriesResults = mysqli_query($conn,$GetCategories);
        $CategoryArray = array();

        if (mysqli_num_rows($CategoriesResults) > 0) 
        {
            while($record = mysqli_fetch_assoc($CategoriesResults)) 
            {
                $data = array();
                $data["category"]           = $record["category"];
                array_push($CategoryArray,$data);

            }


        }


        $GetMenus = "SELECT * FROM tbl_menu WHERE cid = ".$id;
        $MenusResults = mysqli_query($conn,$GetMenus);
        $MenuArray    = array();

        if (mysqli_num_rows($MenusResults) > 0) 
        {
            while($record = mysqli_fetch_assoc($MenusResults)) 
            {
                $data = array();
                $data["id"]             = $record["id"];
                $data["category"]       = $record["category"];
                $data["dish"]           = $record["dish"];
                $data["price"]          = $record["price"];

                array_push($MenuArray,$data);

            }

        }

        $ResponseArray["categories"]  = $CategoryArray;
        $ResponseArray["menus"]       = $MenuArray;
        $ResponseArray["status"]      = "200";

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
   
}else if(isset($Action) && $Action == "get_chef_details"){

    try {
       
        $Profile = "assets/img/profile.jpg";

        $Query = "SELECT * FROM tbl_login WHERE user_type = 'chef'";
        $Results = mysqli_query($conn,$Query);
        $ChefArray = array();

        if (mysqli_num_rows($Results) > 0) 
        {
            while($record = mysqli_fetch_assoc($Results)) 
            {
                $data = array();
                $data["id"]              = $record["id"];
                $data["username"]        = $record["username"];
                $data["email"]           = $record["email"];
                $data["image"]           = $Profile;
            

                array_push($ChefArray,$data);

            }

        }

        $ResponseArray["status"]      = "200";
        $ResponseArray["chefs"]       = $ChefArray;
     
    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
   
}else if(isset($Action) && $Action == "booknow"){

    try {
        $user		    = addslashes((trim($_REQUEST['user'])));
        $city		    = addslashes((trim($_REQUEST['city'])));
        $guest		    = addslashes((trim($_REQUEST['persons'])));
        $date		    = addslashes((trim($_REQUEST['date'])));
        $dine		    = addslashes((trim($_REQUEST['DineOption'])));
        $cuisine		= addslashes((trim($_REQUEST["CuisineOption"])));
        // $ingredients	= addslashes((trim($_REQUEST['ingredientsoption'])));
        $restrictions	= addslashes((trim($_REQUEST["SpecificRestrictions"])));
        if(isset($_REQUEST["ChefOption"])){
            $chef       	= addslashes((trim($_REQUEST["ChefOption"])));
        }

        // $diet		    = $_REQUEST['dietoption'];
        $menu		    = $_REQUEST['menuoption'];

        // $DietArray = array();
        // foreach($diet as $value) 
        // {
        //     array_push($DietArray,$value);
        // }

        $MenuArray = array();
        foreach($menu as $value) 
        {
            array_push($MenuArray,$value);
        }

        $BookingsArray                      = array();
        $BookingsArray["user"]              = $user;
        $BookingsArray["city"]              = $city;
        $BookingsArray["guest"]             = $guest;
        $BookingsArray["date"]              = $date;
        $BookingsArray["meal"]              = $dine;
        $BookingsArray["cuisine"]           = $cuisine;
        // $BookingsArray["ingredients"]       = $ingredients;
        $BookingsArray["conditions"]        = $restrictions;
        // $BookingsArray["restrictions"]      = implode(",",$DietArray);
        $BookingsArray["dishes"]            = implode(",",$MenuArray);

        if (empty($chef)) {
            $BookingsArray["request"]           = "Open";

            $BookingsArray["direct_request"]    = "NA";
        }else{
            $BookingsArray["request"]           = "Selective";

            $BookingsArray["direct_request"]    = $chef;
        }

        $BookingsArray["created_on"]        = date('Y-m-d H:i:s');

        $columns = implode(", ",array_keys($BookingsArray));
        $escaped_values = array_map(array($conn, 'real_escape_string'), array_values($BookingsArray));
        $values  = implode("', '", $escaped_values);
        $Query = "INSERT INTO tbl_bookings ($columns) VALUES ('$values')";
        $Execute = mysqli_query($conn,$Query) or die ("Error in query: $Query. ".mysqli_error($conn));
        


        $ResponseArray["status"]      = "200";
        $ResponseArray["message"]     = "Successfully Booked.";

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
   
}else if(isset($Action) && $Action == "add_event"){

    try {
        $name		    = addslashes((trim($_REQUEST['event_name'])));
        $date		    = addslashes((trim($_REQUEST['event_date'])));
        
        $image	                = UploadImageFile("uploads",'event_image');


        $EventArray                      = array();
        $EventArray["event_name"]              = $name;
        $EventArray["event_date"]              = $date;
        $EventArray["event_image"]             = $image;
        $EventArray["event_type"]              = "Event";
       
        // $BookingsArray["created_on"]        = date('Y-m-d H:i:s');

        $columns = implode(", ",array_keys($EventArray));
        $escaped_values = array_map(array($conn, 'real_escape_string'), array_values($EventArray));
        $values  = implode("', '", $escaped_values);
        $Query = "INSERT INTO tbl_events ($columns) VALUES ('$values')";
        $Execute = mysqli_query($conn,$Query) or die ("Error in query: $Query. ".mysqli_error($conn));
        


        $ResponseArray["status"]      = "200";
        $ResponseArray["message"]     = "Event Added.";


    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
   
}else if(isset($Action) && $Action == "add_special"){

    try {
        $name		    = addslashes((trim($_REQUEST['special_name'])));
        
        $image	        = UploadImageFile("uploads",'occasion_image');


        $EventArray                      = array();
        $EventArray["event_name"]              = $name;
        $EventArray["event_image"]             = $image;
        $EventArray["event_type"]              = "Special";
       
        // $BookingsArray["created_on"]        = date('Y-m-d H:i:s');

        $columns = implode(", ",array_keys($EventArray));
        $escaped_values = array_map(array($conn, 'real_escape_string'), array_values($EventArray));
        $values  = implode("', '", $escaped_values);
        $Query = "INSERT INTO tbl_events ($columns) VALUES ('$values')";
        $Execute = mysqli_query($conn,$Query) or die ("Error in query: $Query. ".mysqli_error($conn));
        


        $ResponseArray["status"]      = "200";
        $ResponseArray["message"]     = "Event Added.";


    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
   
}else if(isset($Action) && $Action == "profile"){

    try {
        $id		            = addslashes((trim($_REQUEST['id'])));
        $first_name		    = addslashes((trim($_REQUEST['first_name'])));
        $last_name		    = addslashes((trim($_REQUEST['last_name'])));
        $mobile		        = addslashes((trim($_REQUEST['mobile'])));
        $address_line_1		= addslashes((trim($_REQUEST['address_line_1'])));
        $address_line_2		= addslashes((trim($_REQUEST['address_line_2'])));
        $postcode		    = addslashes((trim($_REQUEST['postcode'])));
        $email		        = addslashes((trim($_REQUEST['email'])));
        $country		    = addslashes((trim($_REQUEST['country'])));
        $state		        = addslashes((trim($_REQUEST['state'])));
        $exp		        = addslashes((trim($_REQUEST['experience'])));
        $city		        = addslashes((trim($_REQUEST['city'])));


        $image	            = UploadImageFile("uploads",'profilepic');


        $ProfileArray                       = array();
        $ProfileArray["first_name"]         = $first_name;
        $ProfileArray["last_name"]          = $last_name;
        $ProfileArray["mobile_number"]      = $mobile;
        $ProfileArray["address_line_1"]     = $address_line_1;
        $ProfileArray["address_line_2"]     = $address_line_2;
        $ProfileArray["postcode"]           = $postcode;
        $ProfileArray["email"]              = $email;
        $ProfileArray["country"]            = $country;
        $ProfileArray["state"]              = $state;
        $ProfileArray["image"]              = $image;
        $ProfileArray["exp"]                = $exp;
        $ProfileArray["city"]               = $city;


        $UpdateProfile = "UPDATE tbl_login SET ";
        foreach($ProfileArray as $k => $v)
        {
            $UpdateProfile .= $k."='". $v."', ";
        }
        $UpdateProfile = rtrim($UpdateProfile, ", ");
        $UpdateProfile .= " where id = $id";

        $ExecuteQuery = mysqli_query($conn,$UpdateProfile) or die ("Error in query: $UpdateProfile. ".mysqli_error($conn));

        $ResponseArray["status"]      = "200";
        $ResponseArray["message"]     = "Profile Updated.";


    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
    }
   
}else if(isset($Action) && $Action == "accept_orders"){

    try {
        $order		            = addslashes((trim($_REQUEST['order'])));
        $chef		            = addslashes((trim($_REQUEST['chef'])));
    


        $OrderArray                       = array();
        $OrderArray["status"]             = "Accepted";
        $OrderArray["direct_request"]     = $chef;
       

        $UpdateQuery = "UPDATE tbl_bookings SET ";
        foreach($OrderArray as $k => $v)
        {
            $UpdateQuery .= $k."='". $v."', ";
        }
        $UpdateQuery = rtrim($UpdateQuery, ", ");
        $UpdateQuery .= " where id = $order";

        $ExecuteQuery = mysqli_query($conn,$UpdateQuery) or die ("Error in query: $UpdateQuery. ".mysqli_error($conn));

        $ResponseArray["status"]      = "200";
        $ResponseArray["message"]     = "Order Accepted.";


    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
    }
   
}else if(isset($Action) && $Action == "generate_payment"){

    try {
        $order		            = addslashes((trim($_REQUEST['order'])));
        $amount		            = addslashes((trim($_REQUEST['amount'])));

        $OrderArray                       = array();
        $OrderArray["payment"]            = "YES";
        $OrderArray["amount"]             = $amount;

        $UpdateQuery = "UPDATE tbl_bookings SET ";
        foreach($OrderArray as $k => $v)
        {
            $UpdateQuery .= $k."='". $v."', ";
        }
        $UpdateQuery = rtrim($UpdateQuery, ", ");
        $UpdateQuery .= " where id = $order";

        $ExecuteQuery = mysqli_query($conn,$UpdateQuery) or die ("Error in query: $UpdateQuery. ".mysqli_error($conn));

        $ResponseArray["status"]      = "200";
        $ResponseArray["message"]     = "Payment Generated.";

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
    }
   
}else if(isset($Action) && $Action == "cancel_order"){

    try {
        $id		            = addslashes((trim($_REQUEST['id'])));

        $OrderArray                       = array();
        $OrderArray["request"]            = "Open";
        $OrderArray["direct_request"]     = "NA";

        $UpdateQuery = "UPDATE tbl_bookings SET ";
        foreach($OrderArray as $k => $v)
        {
            $UpdateQuery .= $k."='". $v."', ";
        }
        $UpdateQuery = rtrim($UpdateQuery, ", ");
        $UpdateQuery .= " where id = $id";

        $ExecuteQuery = mysqli_query($conn,$UpdateQuery) or die ("Error in query: $UpdateQuery. ".mysqli_error($conn));

        $ResponseArray["status"]      = "200";
        $ResponseArray["message"]     = "Order Rejected.";

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
    }
   
}else if(isset($Action) && $Action == "payment"){

    try {
        $order		            = addslashes((trim($_REQUEST['order'])));
        $payment_id		        = addslashes((trim($_REQUEST['payment_id'])));

        $PaymentArray                       = array();
        $PaymentArray["status"]             = "Paid";
        $PaymentArray["payment_id"]         = $payment_id;
        
        $UpdateQuery = "UPDATE tbl_bookings SET ";
        foreach($PaymentArray as $k => $v)
        {
            $UpdateQuery .= $k."='". $v."', ";
        }
        $UpdateQuery = rtrim($UpdateQuery, ", ");
        $UpdateQuery .= " where id = $order";

        $ExecuteQuery = mysqli_query($conn,$UpdateQuery) or die ("Error in query: $UpdateQuery. ".mysqli_error($conn));

        $ResponseArray["status"]      = "200";
        $ResponseArray["message"]     = "Payment Successfully Received.";

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
    }
   
}else{
    $ResponseArray["status"]  = "404";
    $ResponseArray["message"] = "Invalid Action.";
}

$Response	=	json_encode($ResponseArray, true);

echo $Response;
exit;

?>