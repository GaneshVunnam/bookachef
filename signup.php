<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Bookachef</title>
      <link rel="stylesheet" href="assets/css/style.css">
   </head>
   <body>
      <div class="wrapper">
         <div class="title" style="color: rgb(233, 241, 242);">
            <label>Create New Account</label>
         </div>
         <form method="post" name="signup" id="signup">
            <input type="hidden" name="action" value="register">

            <div class="field">
               <input type="text" name="username" required>
               <label>Enter username</label>
            </div>
            <div class="field">
               <input type="text" name="email" required>
               <label>Email Address</label>
            </div>
            <div class="field" >
               <input type="Enter Mobile Number" name="mobile" required>
               <label>Enter Mobile Number</label>
            </div>
            <div class="field">
               <select name="user_type" id="user_type" style="color:#999999;" required>
                  <option value="user">Customer</option>
                  <option value="chef">Chef</option>
               </select>
            </div>
            <div class="field" >
               <input type="Enter password" name="password" required>
               <label>Enter Password</label>
            </div>
            <div class="field">
                <input type="confirm password" required>
                <label>Confirm Password</label>
             </div>
            <div class="field" >
               <input id="Bt_Signup" type="button" value="Signup" >
            </div>
            <div class="signup-link" >
               Already have an account? <a href="#" onclick="window.location.href='login.php'">Signin</a>
            </div>
         </form>
      </div>
      <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
      <script src="assets/js/script.js"></script>

   </body>
</html>