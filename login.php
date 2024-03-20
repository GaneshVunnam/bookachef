<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Bookachef</title>
      <link rel="stylesheet" href="assets/css/style.css">
   </head>
   <body>
      <div class="wrapper">
         <div class="title">
            
            Login
         </div>
         <img src="assets/images/cheff_hat.jpg" alt="" style="margin-left:150px;">
         <form method="post" name="login" id="login">
            <input type="hidden" name="action" value="login">

            <strong style="margin-left:130px; font-size: 30px;" >BOOK A CHEF</strong>
            <div class="field">
               <input type="text" name="email" required>
               <label>Email Address</label>
            </div>
            <div class="field">
               <input type="password" name="password" required>
               <label>Password</label>
            </div>
            <div class="content">
               <div class="pass-link">
               </div>
            </div>
            <div class="field">
               <input type="button" id="Bt_login" value="Login">
            </div>
            <div class="signup-link">
               Don't have an account? <a href="#" onclick="window.location.href='signup.php'">Signup</a>
            </div>
         </form>
      </div>
      <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" 
      crossorigin="anonymous"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.16.0/moment.min.js" type="text/javascript"></script>

      <script type="text/javascript" src="../assets/js/jquery.daterangepicker.min.js"></script>
    <script type="text/javascript" src="../assets/js/handleCounter.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.customselect.js"></script>
    <script type="text/javascript" src="../assets/js/autofilter.js"></script>
      <script src="assets/js/script.js"></script>

   </body>
</html>