
 <!-- datatable lib -->
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
                        <div class="modal-header text-dark" style="background-color:yellow; color:black;">
                            <h5 class="modal-title" id="exampleModalLabel">Add Courses </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="partials/_categoryManage.php" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label">Course: </label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Course Description: </label>
                                    <input type="text" class="form-control" name="desc" required >
                                </div>
                              

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="createCategory" class="btn btn-primary">Save Data</button>
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
            Add Course
        </button><br><br>
       
    <center> <h1>LIST OF COURSE </h1> </center>
                <table id="tblcategory" class="table table-responsive table-bordered table-hover  ">
                    <thead style="background-color: gray; color:black;">
                        <tr>

                          
                            <th scope="col" style="width: 10.66%" class="text-center ">Course Details</th>
                            <th scope="col" style="width: 10.66%" class="text-center ">Course Details</th>
                            <th scope="col" style="width: 1.66%" class="text-center ">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM `categories`";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $catId = $row['categorieId'];
                            $catName = $row['course'];
                            $catDesc = $row['courseDec'];

                            echo '<tr>
                                      
                                     
                                        <td>Course: <b>' . $catName . '</b></td>
                                         
                                           <td> <b>' . $catDesc . '</b>
                                        </td>

                                        <td class="text-center">
                                            <div class="row mx-auto" style="width:112px">
                                            <button class="btn btn-sm btn-primary edit_cat" type="button" data-toggle="modal" data-target="#updateCat' . $catId . '">Edit</button>
                                            <form action="partials/_categoryManage.php" method="POST">
                                                <button name="removeCategory" class="btn btn-sm btn-danger" style="margin-left:9px;">Delete</button>

                                                <input type="hidden" name="catId" value="' . $catId . '">
                                    
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
$catsql = "SELECT * FROM `categories`";
$catResult = mysqli_query($conn, $catsql);
while ($catRow = mysqli_fetch_assoc($catResult)) {
    $catId = $catRow['categorieId'];
                            $catName = $catRow['course'];
                            $catDesc = $catRow['courseDec'];
?>

<!-- Modal -->
<div class="modal fade" id="updateCat<?php echo $catId; ?>" tabindex="-1" role="dialog"
    aria-labelledby="updateCat<?php echo $catId; ?>" aria-hidden="true" style="width: -webkit-fill-available;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: yellow; color:black;">
                <h5 class="modal-title" id="updateCat<?php echo $catId; ?>">EDIT COURSE:</b>
</h5>
            </div>
            <div class="modal-body">
                <form action="partials/_categoryManage.php" method="post">
                    <div class="text-left my-2">
                        <b><label for="name">Course Name</label></b>
                        <input class="form-control" id="name" name="name" value="<?php echo $catName; ?>" type="text"
                            required>
                    </div>
                    <div class="text-left my-2">
                        <b><label for="desc">Course  Description</label></b>
                        <textarea class="form-control" id="desc" name="desc" rows="2" required 
                            minlength="6"><?php echo $catDesc; ?></textarea>
                    </div>
                    <input type="hidden" id="catId" name="catId" value="<?php echo $catId; ?>">
                    <button type="submit" class="btn btn-success" name="updateCategory">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>


       
     

    
    <!--script js for get edit data-->
 
</body>
</html>
<?php
}
?>

