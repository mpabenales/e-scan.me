
<?php
  
 
  $sql = "SELECT * from devices";

  if ($result = mysqli_query($conn, $sql)) {


  $rowcount = mysqli_num_rows( $result );
}

$sql1 = "SELECT * from categories";

  if ($result1 = mysqli_query($conn, $sql1)) {


  $rowcount1 = mysqli_num_rows( $result1 );
  }


  $sql2 = "SELECT * from students";

  if ($result2 = mysqli_query($conn, $sql2)) {


  $rowcount2 = mysqli_num_rows( $result2 );
  }

  $sql3 = "SELECT * from access";

  if ($result3 = mysqli_query($conn, $sql3)) {


  $rowcount3 = mysqli_num_rows( $result3 );
  }


?>




<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<h1>Welcome to  Admin Panel</h1>
<hr class="border-purple">
<style>
    #website-cover{
        width:100%;
        height:30em;
        object-fit:cover;
        object-position:center center;
    }
</style>
<div class="row" style="color:royalblue; font-size:20px;">
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="info-box bg-gradient-light shadow">
            <span class="info-box-icon bg-gradient-dark elevation-1"><i class="fas fa-building"></i></span>

            <div class="info-box-content" ><h1>
            <span class="info-box-text">Device: </span>
            <span class="info-box-number text-right " ><?php echo $rowcount; ?></h1>
             
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="info-box bg-gradient-light shadow">
            <span class="info-box-icon bg-gradient-primary elevation-1"><i class="fas fa-scroll "></i></span>

            <div class="info-box-content"><h1>
            <span class="info-box-text">Access: </span>
            <span class="info-box-number text-right"><?php echo $rowcount3; ?></h1>
               
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-3 ">
        <div class="info-box bg-gradient-light shadow ">
            <span class="info-box-icon bg-gradient-warning elevation-1"><i class="fas fa-user-friends"></i></span>

            <div class="info-box-content "><h1>
            <span class="info-box-text">Students: </span>
            <span class="info-box-number text-right "><?php echo $rowcount2; ?></h1>
            
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="info-box bg-gradient-light shadow">
            <span class="info-box-icon bg-gradient-teal elevation-1"><i class="fas fa-file-alt"></i></span>

            <div class="info-box-content"><h1>
            <span class="info-box-text">Course:</span>
            <span class="info-box-number text-right"><?php echo $rowcount1; ?></h1>
              
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <img src="cover.png" alt="Website Cover" class="" id="website-cover">
    </div>
</div>

