<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/colorbox.css">
    <meta charset="utf-8" />
    <style type="text/css">
        body{
            background-color: white;
        }
        .form h2{
            margin-left: 150px;
        }
        .form{
            margin: 0 auto; 
            position: relative;
            padding: 20px;
        }
        .tag{
            background-color: #ccc;
            border: 1px solid black;
            line-height: 12px;
            border-radius: 4px;
            padding: 6px;
            margin-left: 20px;
            display: inline-block;
            display: none;
        }
        .form input, select{
            margin: 15px auto;
            display: inline-block;
        }
        .form input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=reset]):not([type=file]){ 
            margin-left: 15px;
            width: 140px;
            border-radius: 3px;
            border:1px solid #999;
            padding: 2px;
        }
        input[type=file]{
            margin-left: 15px;
            display: inline-block;
            border-radius: 3px;
            border:1px solid #999;
            padding: 2px;   
            width: 225px;
        }
        .form input[type=text]:focus, input[type=password]:focus,input[type=email]:focus{ 
            outline-color: orange;
        }
        select{
            margin-left: 15px;
            width: 125px;
        }
        input[type=checkbox]{
            margin-left: 215px;
        }
        .form label{
            text-align: right;
            margin: 14px auto;
        }
        #male{
            margin-left: 15px;
        }           
        .form label:not([for=male]):not([for=female]):not([for=newsletter]){
            display: inline-block;
            float: left;
            clear: left;
            width:200px;
            text-align: right;
        }
        .form input[type=submit]{
            margin-left: 215px !important;
        }
        .form input[type=submit], .form input[type=reset]{
            background-color: #F0F0F0;
            border: 1px solid #D7D7D7;
            margin-left: 10px;
        }
    </style>
    <script src="js/jquery.colorbox-min.js"></script>
    <script src="js/rForm.js"></script>
</head>
<body>

    <form id="rForm" class="form" method="POST" action="procReg.php" enctype="multipart/form-data">
        <h2>Registration Form</h2>
        <label> Username : </label>
        <input type="text" name="username" id="user">
        <div class="tag" id="userTag"> Username cannot be less than 5 characters </div>
        <br>
        <label> Email : </label>
        <input type="email" name="email" id="email">
        <div class="tag" id="emailTag"> Please enter a valid email </div>
        <br>
        <label> Password : </label>
        <input type="password" name="password" id="pass">
        <div class="tag" id="passTag"> Password cannot be less than 6 characters </div>
        <br>
        <label> Password (confirmation) : </label>
        <input type="password" name="confirmation" id="confirm">
        <div class="tag" id="confirmTag"> Passwords doesn't match </div>
        <br>
        <label>Avatar : </label>
        <input type="file" name="avatar" id="avatar"/>
        <div class="tag" id="avatarTag"> Please upload a valid image file</div>
        <br>
        <input type="submit" id="rSubmit" value="Submit">
        <input type="reset"  id="reset" value="Reset">
    </form>
</body>
</html>