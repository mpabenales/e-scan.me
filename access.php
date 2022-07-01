<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
<div class="container-fluid" style="margin-top:98px">

<center>
        <h2>Access</h2>
    </center>

    <div class="row">
       
    </div>
    <br>
    <div class="row">
        <div class=" col-lg-12">
           
                <table id="tblfinish" class="table-striped table-bordered col-md-12 text-center">
                    <thead class="" style="background-color: gray; color:black;">
                        <tr>
                            <th>Student Id</th>
                           
                          
                            <th>Device ID</th>
                            <th>Date and Time</th>
                           
                    
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql = "SELECT * FROM `access`";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $devId = $row['deviceId'];
                            $studentId = $row['studentId'];
                           
                            $date= $row['accessDate'];
                            echo '<tr>
                                           
                                           <td> '.$studentId.' </td>
                                           <td> '.$devId.' </td>
                                           <td>'.$date.' </td>
                                          
                                           
                                         
                                        </tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
jQuery(document).ready(function($) {
    $('#tblfinish').DataTable();
} );
</script>