<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>

<div class="container-fluid" style="margin-top:98px">

    <div class="col-lg-12">
        <div class="row">





            <div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:royalblue; color: yellow;">
                            <h5 class="modal-title" id="exampleModalLabel">Add Students </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="partials/_studentManage.php" method="post" enctype="multipart/form-data">

                            <div class="modal-body">
                            <div class="form-group">
                                    <label for="image" class="control-label">Image</label>
                                    <input type="file" name="image" id="image" accept=".jpg" class="form-control"
                                         style="border:none;">
                                    <small id="Info" class="form-text text-muted mx-3">Please .jpg file upload.</small>
                                </div>
                            <div class="form-group">
                                    <label class="control-label">Student Id: </label>
                                    <input type="text" class="form-control" name="studentid" required>
                                </div>
                                <div class="form-row">
                        <div class="form-group col-md-6">
                            <b><label for="firstName">First Name:</label></b>
                            <input type="text" class="form-control" id="firstName" name="firstName"
                                placeholder="First Name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <b><label for="lastName">Last Name:</label></b>
                            <input type="text" class="form-control" id="lastName" name="lastName"
                                placeholder="Last name" required>
                        </div>
                    </div>
                                <div class="form-group">
                                    <label class="control-label">Address: </label>
                                    <textarea cols="30" rows="3" class="form-control" name="address"
                                        ></textarea>
                                </div>
                        


                                <script>
            $(function(){
              $("#categoryId").change(function(){
                var displayvar=$("#categoryId option:selected").text();
                $("#selectcat").val(displayvar);
              })
            })
          </script>
                                <div class="form-group">
                                    <label class="control-label">Course: </label>
                                    <select name="categoryId" id="categoryId" class="custom-select browser-default"
                                        required>
                                        <option hidden disabled selected value>None</option>
                                        <?php
                                        $catsql = "SELECT * FROM `categories`";
                                        $catresult = mysqli_query($conn, $catsql);
                                        while ($row = mysqli_fetch_assoc($catresult)) {
                                            $catId = $row['categorieId'];
                                            $catName = $row['course'];
                                            echo '<option value="' . $catId . '", "' . $catName . '">' . $catName . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <input type="hidden" name="catname" id="selectcat" value="">
                               
                                <div class="form-group">
                                    <label class="control-label">Section: </label>
                                    <input type="text" class="form-control" name="section" required>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="createItem" class="btn btn-primary">Save Data</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>






            <!-- Table Panel -->
            <div class="container">
            </div>
        </div>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentaddmodal">
            Add Students
        </button><br><br>
        
                <table id="tblmenu" class="table table-bordered table-hover mb-0">
                    <thead class="text" style="background-color: gray; color:black;">
                        <tr>

                            <th class="text-center">Student ID</th>
                            <th class="text-center" >Firstname</th>
                           
                            <th class="text-center" >Lastname</th>
                            <th class="text-center" >Address</th>
                            <th class="text-center" >Course</th>
                            <th class="text-center" >Section</th>
                            <th class="text-center" >Device</th>
                            <th class="text-center">Action</th>
                          
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM `students`";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $Id = $row['Id'];
                            $studentId = $row['studentID'];
                            $firstname = $row['Firstname'];
                            $lastname = $row['Lastname'];
                            $address = $row['Address'];
                            $course = $row['Course'];
                            $section = $row['Section'];
                            echo '<tr>
                                           
                                           <td> '.$studentId.' </td>
                                           <td> '.$firstname.' </td>
                                           <td>'.$lastname.' </td>
                                           <td> '.$address.'</td>
                                           <td>'.$course.' </td>
                                           <td>'.$section.' </td>
                                           <td><center>
                                           
                                           <button type="submit" class="btn btn-sm btn-success" name="updateItem" data-toggle="modal" data-target="#add' . $Id . '">ADD DEVICE</button>
                                           
                                           </center></td>
                                            <td class="text-center">
                                            
												<div class="row mx-auto" style="width:112px">
													<button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#updateItem' . $Id . '">Edit</button>
                                                    
													<form action="partials/_studentManage.php" method="POST">
														<button name="removeItem" class="btn btn-sm btn-danger" style="margin-left:9px;">Delete</button>
														<input type="hidden" name="idstud" value="' . $Id . '">
                                                        
													</form>
                                                    
												</div>
                                        </tr>';
                        }
                        ?>
                    </tbody>
               


                </table>
               
        </div>
    </div>

    <!-- Table Panel -->

                    






</div>
</div>
</div>

<script>
jQuery(document).ready(function($) {
    $('#tblmenu').DataTable();
} );
</script>
















<?php
                        $sql1 = "SELECT * FROM `students`";
                        $result1 = mysqli_query($conn, $sql1);
                        while ($row1 = mysqli_fetch_assoc($result1)) {
                            $Id = $row1['Id'];
                            $studentId = $row1['studentID'];
                            $firstname = $row1['Firstname'];
                            $lastname = $row1['Lastname'];
                            $address = $row1['Address'];
                            $course = $row1['Course'];
                            $section = $row1['Section'];
?>





<!-- Modal -->
<div class="modal fade" id="updateItem<?php echo $Id; ?>" tabindex="-1" role="dialog"
    aria-labelledby="updateItem<?php echo $Id; ?>" aria-hidden="true">
    <div class="modal-dialog"  role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: royalblue; color:yellow;">Information: 
                <h5 class="modal-title" id="updateItem<?php echo $Id; ?>"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="modal-body">
                <form action="partials/_studentManage.php" method="post" enctype="multipart/form-data">
                    <div class="text-left my-2 row" style="border-bottom: 2px solid #dee2e6;">
                        <div class="form-group col-md-8">
                            <b><label for="image">Image</label></b>
                            <input type="file" name="itemimage" id="itemimage" accept=".jpg" class="form-control"
                                required style="border:none;"
                                onchange="document.getElementById('itemPhoto').src = window.URL.createObjectURL(this.files[0])">
                            <small id="Info" class="form-text text-muted mx-3">Please .jpg file upload.</small>
                            <input type="hidden" id="studID" name="studID" value="<?php echo $Id; ?>">
                            <button type="submit" class="btn btn-success my-1" name="updateItemPhoto">Update
                                Image</button>
                        </div>
                        <div class="form-group col-md-4">
                            <img src="/apc/img/student-<?php echo $Id; ?>.jpg" id="itemPhoto"
                                name="itemPhoto" alt="item image" width="100" height="100">
                        </div>
                    </div>
                </form>
                <form action="partials/_studentManage.php" method="post">
                    


                <div class="form-group">
                                    <label class="control-label">Student Id: </label>
                                    <input type="text" class="form-control" name="studentid"  value="<?php echo  $studentId ; ?>"readonly required>
                                </div>
                                <div class="form-row">
                        <div class="form-group col-md-6">
                            <b><label for="firstName">First Name:</label></b>
                            <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $firstname; ?>"
                                placeholder="First Name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <b><label for="lastName">Last Name:</label></b>
                            <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $lastname; ?>"
                                placeholder="Last name" required>
                        </div>
                    </div>
                                <div class="form-group">
                                    <label class="control-label">Address: </label>
                                    <textarea cols="30" rows="3" class="form-control" name="address" value=""
                                        ><?php echo $address; ?></textarea>
                                </div>

 <div class="form-group">
 <script>
            $(function(){
              $("#categoryId1").change(function(){
                var displayvar=$("#categoryId1 option:selected").text();
                $("#selectcat1").val(displayvar);
              })
            })
          </script>
                                    <label class="control-label">Course: </label>
                                    <select name="categoryId1" id="categoryId1" class="custom-select browser-default"
                                        >
                                        <option hidden disabled selected value><?php echo $course; ?></option>
                                        <?php
                                        $catsql = "SELECT * FROM `categories`";
                                        $catresult = mysqli_query($conn, $catsql);
                                        while ($row = mysqli_fetch_assoc($catresult)) {
                                            $catId = $row['categorieId'];
                                            $catName = $row['course'];
                                            echo '<option value="' . $catId . '", "' . $catName . '">' . $catName . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <input type="hidden" name="coursename" id="selectcat1" value="<?php echo $course; ?>">
                               
                                <div class="form-group">
                                    <label class="control-label">Section: </label>
                                    <input type="text" class="form-control" name="section" value="<?php echo $section; ?>" required>
                                </div>


                    <input type="hidden" id="id" name="Id" value="<?php echo $Id; ?>">
                    <button type="submit" class="btn btn-success" name="updateItem">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>




<!-- ADD NEW DEVICE -->

<div class="modal fade" id="add<?php echo $Id; ?>" tabindex="-1" role="dialog"
    aria-labelledby="add<?php echo $Id; ?>" aria-hidden="true">
    <div class="modal-dialog"  role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: royalblue; color:yellow;">Device Information: 
                <h5 class="modal-title" id="updateItem<?php echo $Id; ?>"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="modal-body">
                <form action="partials/_deviceManage.php" method="post" >
                    <div class="text-left my-2 row" style="border-bottom: 2px solid #dee2e6;">
     
               
    <div class="form-group col-md-6">
    <b><label for="firstName">Device Name:</label></b>
    <input type="text" class="form-control"  name="devicename"
required>
</div>
<div class="form-group col-md-6">
<b><label for="lastName">Device Type:</label></b>
<input type="text" class="form-control" name="devicetype"
required>
</div>
</div>
<div class="form-row">
<div class="form-group col-md-6">
<b><label for="firstName">Brand:</label></b>
<input type="text" class="form-control"  name="devicebrand"
required>
</div>
<div class="form-group col-md-6">
<b><label for="lastName">Color:</label></b>
<input type="text" class="form-control"  name="devicecolor"
required>
</div>
</div>
<div class="form-group">
    <b><label class="control-label">Serial Id: </label></b>
    <input type="text" class="form-control" name="serial" onkeypress="if(event.keyCode<48 || event.keyCode>57)event.returnValue=false;" required>
</div>


                  

               
                <input type="hidden"  name="Id" value="<?php echo $Id; ?>">
                <input type="hidden"  name="studentsId1" value="<?php echo $studentId; ?>">
                <input type="hidden"  name="firstname1" value="<?php echo $firstname; ?>">
                <input type="hidden"  name="lastname1" value="<?php echo $lastname; ?>">
                <input type="hidden"  name="course1" value="<?php echo $course; ?>">
                <input type="hidden"  name="section1" value="<?php echo $section; ?>">
                    <button type="submit" class="btn btn-success" name="adddevice">ADD DEVICE</button>
            </div>
            </div>
                                    </form>
        </div>
    </div>



            <?php
}
?>
