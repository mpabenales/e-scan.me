
 <!-- datatable lib -->
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>

<div class="container-fluid" style="margin-top:98px">
    <div class="col-lg-12">
        <div class="row">


            <!-- Table Panel -->
            <div class="container">
            </div>
        </div>


       
    <center> <h1><b>LIST OF DEVICES</b> </h1> </center>
                <table id="tblcategory" class="table table-responsive table-bordered table-hover  ">
                    <thead style="background-color: gray; color:black;">
                        <tr>

                          
                            <th>Student Id</th>
                            <th >First Name</th>
                            <th>LastName</th>
                          
                            <th>Device ID</th>
                            <th>Device Name</th>
                           
                            <th scope="col" style="width: 1.66%" class="text-center ">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM `devices`";
                        $result = mysqli_query($conn, $sql);
                        while ($row1 = mysqli_fetch_assoc($result)) {
                            $deviceid = $row1['deviceID'];
                            $studentid = $row1['studentID'];
                            $firstname = $row1['Firstname'];
                            $lastname = $row1['Lastname'];
                            $devicename = $row1['DeviceName'];
                            $course = $row1['Course'];
                            $section = $row1['Section'];


                            echo '<tr>
                                      
                            <td> <b>' . $studentid  . '</b>
                            <td> <b>' . $firstname. '</b></td>
                            <td> <b>' . $lastname. '</b></td>
                            <td> <b>' . $deviceid . '</b></td>
                            <td> <b>' . $devicename. '</b></td>
                                         
                                        </td>
                                       
                                     
                                        <td class="text-center">
                                            <div class="row mx-auto" style="width:112px">
                                            <button class="btn btn-sm btn-primary edit_cat" type="button" data-toggle="modal" data-target="#updateCat' . $deviceid. '">Edit</button>
                                            <form action="partials/_deviceManage.php" method="POST">
                                                <button name="removedevice" class="btn btn-sm btn-danger" style="margin-left:9px;">Delete</button>

                                                <input type="hidden" name="deviceid" value="' . $deviceid . '">
                                    
                                            </form></div>
                                        </td>
                                    </tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Table Panel -->
    <script>
jQuery(document).ready(function($) {
    $('#tblcategory').DataTable();
} );
</script>




</div>
</div>
</div>



<?php
                        $sqldev = "SELECT * FROM `devices`";
                        $result = mysqli_query($conn, $sqldev);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $deviceid = $row['deviceID'];
                            $devicename = $row['DeviceName'];
                            $devicetype = $row['DeviceType'];
                            $brand= $row['Brand'];
                            $color = $row['Color'];
                            $serialid = $row['serialId'];
?>

<!-- Modal -->
<div class="modal fade" id="updateCat<?php echo $deviceid; ?>" tabindex="-1" role="dialog"
    aria-labelledby="updateCat<?php echo $deviceid; ?>" aria-hidden="true" style="width: -webkit-fill-available;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: yellow; color:black;">
                <h5 class="modal-title" id="updateCat<?php echo $deviceid ?>">EDIT DEVICE INFORMATION:</b>
</h5>
            </div>
            <div class="modal-body">
                <form action="partials/_deviceManage.php" method="post" >
                    <div class="text-left my-2 row" style="border-bottom: 2px solid #dee2e6;">
     
               
    <div class="form-group col-md-6">
    <b><label for="firstName">Device Name:</label></b>
    <input type="text" class="form-control"  name="devicename" value="<?php echo $devicename ?>"
required>
</div>
<div class="form-group col-md-6">
<b><label for="lastName">Device Type:</label></b>
<input type="text" class="form-control" name="devicetype" value="<?php echo $devicetype ?>"
required>
</div>
</div>
<div class="form-row">
<div class="form-group col-md-6">
<b><label for="firstName">Brand:</label></b>
<input type="text" class="form-control"  name="devicebrand" value="<?php echo $brand ?>"
required>
</div>
<div class="form-group col-md-6">
<b><label for="lastName">Color:</label></b>
<input type="text" class="form-control"  name="devicecolor" value="<?php echo $color ?>"
required>
</div>
</div>
<div class="form-group">
    <b><label class="control-label">Serial Id: </label></b>
    <input type="text" class="form-control" name="serial" onkeypress="if(event.keyCode<48 || event.keyCode>57)event.returnValue=false;"value="<?php echo $serialid ?>" required>
</div>
                    
                    <input type="hidden" id="catId" name="deviceID" value="<?php echo $deviceid; ?>">
                    <button type="submit" class="btn btn-success" name="updatedev">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>


       
     

 
</body>
</html>
<?php
}
?>

