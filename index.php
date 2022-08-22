<!DOCTYPE html>
<html lang="en">

<head>

<style>
.error {color: #FF0000;}
</style>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>File Upload</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
<?php
include 'db.php' ;
$nameErr = $birthErr = $genderErr = $degreeErr=  $imgErr="";
$name = $birth = $gender = $degree = $img= "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
  if (empty($_POST["name"])) 
  {
    $nameErr = "Name is required";
  }
  else 
  {
    $name = get($_POST["name"]);
  }

  if (empty($_POST["birth"]))
  {
    $birthErr = "DOB is required";
  } 
  else
  {
    $birth = get($_POST["birth"]);
  }
    
  if (empty($_POST["gender"]))
  {
    $genderErr = "Gender is required";
  } 
  else
  {
    $gender = get($_POST["gender"]);
  }

  if (empty($_POST["degree"]))
  {
    $degreeErr = "Degree is required";
  }
  else
  {
    $degree = get($_POST["degree"]);
  }

  if (empty($_POST["img"]))
  {
    $imgErr = "Image is required";
  }
  else
  {
    $img = get($_POST["img"]);
  }
}
 if ($name !="" &&  $birth !="" && $gender !="" && $degree !="" && $img !="") 
    {
      $query="insert into forms(name,birth,gender,degree,img)values('$name','$birth','$gender','$degree','$img')";

        $run=mysqli_query($conn,$query) or die(mysqli_error());

    if($run)
    {
        echo"Informations are stored successfully";
    }
    else{
        echo"something went wrong";
    }
}

function get($sakthi) 
{
  $sakthi = trim($sakthi);
  $sakthi = stripslashes($sakthi);
  $sakthi = htmlspecialchars($sakthi);
  return $sakthi;
}
?>

    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Registration Information</h2>
                    <form method="POST" action="upload.php" enctype="multipart/form-data">
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="NAME" name="name">
                            <span class="error"><?php echo $nameErr;?></span>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1 js-datepicker" type="text" placeholder="BIRTHDATE" name="birth">
                                    <span class="error"><?php echo $birthErr;?></span>
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="gender">
                                            <option disabled="disabled" selected="selected">GENDER</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Other</option>
                                        </select>
                                        <span class="error"><?php echo $genderErr;?></span>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="degree">
                                    <option disabled="disabled" selected="selected">DEGREE</option>
                                    <option>HSC</option>
                                    <option>UG</option>
                                    <option>PG</option>
                                </select>
                                <span class="error"><?php echo $degreeErr;?></span>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                     <label><input type="file" name="img" placeholder="IMAGE UPLOAD" id="img"></label>
                                    <!-- <input class="input--style-1" type="file" placeholder="IMAGE UPLOAD" name="img"> -->   
                                    <span class="error"><?php echo $imgErr;?></span>
                                </div>
                            </div>
                        </div>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
