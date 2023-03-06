<?php include "partial/head.php";?>
  <body>

  <?php include "partial/navbar.php";?>
  <?php include "partial/sidebar.php";?>

  <?php 
  $position = $_SESSION["position"];

  if($position == "OIC"){
    $limitation = "d-block";
  }else if($position == "Officer") {
    $limitation = "d-none";
  }

?>


     
        <div class="card overflow-auto m-3" style="height:650px;">
             <div class="card-body">
             <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="mainserv_propertypass.php">Property Pass</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Entry Pass</li>
                </ol>
                </nav>
             
    
            <?php
             include "assets/php/db_conn.php";
             $query = "SELECT * FROM `ss_add_student_entry_pass`"; // change database table name for other data fetching
                 $query_run = mysqli_query($conn, $query);
            ?>
                <table id="#" class="table table-striped table-bordered" class="">
                    <thead class="text-center">
                    <th scope="col">ID</th>
                    <th scope="col">Date</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Course & Section</th>  
                    <th scope="col">Reason</th> 
                    <th scope="col">Valid Until</th>
                    <th scope="col">Approved by</th>
                    <th scope="col">Status</th>
                    <th scope="col" class="<?php echo $limitation?>">View</th>

                       

                    </thead>
                <tbody class="text-center">
                    <?php
                    
                    if(mysqli_num_rows($query_run) > 0)
                    {
                        foreach($query_run as $row )
                        {
                            ?>
                            <tr>
                            <td><?= $row['id']?></td>
                            <td><?= $row['date']?></td>
                            <td><?= strtoupper($row['fname'])?></td>
                            <td><?= strtoupper($row['course&section'])?></td>
                            <td><?= strtoupper($row['reason'])?></td>
                            <td><?= strtoupper($row['valid_until'])?></td>
                            <td><?= strtoupper($row['received_by'])?></td>                    
                            <td><?= strtoupper($row['status'])?></td>
                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $row['id']; ?>">
                                                            View
                                                          </button>
                            
                            <?php
                          $entry_pass = $conn->query($query) or die($conn->error);
                          while ($row = $entry_pass->fetch_assoc()) {
                        ?>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Entry Pass Details</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <table class="table table-striped">
                                  <tr>
                                    <td>ID</td>
                                    <td><?php echo $row['id']; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Full Name</td>
                                    <td><?php echo $row['fname']; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Date</td>
                                    <td><?php echo $row['date']; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Course & Section</td>
                                    <td><?php echo $row['course&section']; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Reason</td>
                                    <td><?php echo $row['reason']; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Valid Until</td>
                                    <td><?php echo $row['valid_until']; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Received By</td>
                                    <td><?php echo $row['received_by']; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Status</td>
                                    <td><?php echo $row['status']; ?></td>
                                  </tr>
                                  <!-- Add more rows here for other fields -->
                                      </table>
                                  <!-- for update button/ approve status -->
                                  <?php
                                      if(isset($_POST['approve'])){
                                      $id = $_POST['id'];
                                      $status = "Approved";
                                      $received_by = "OIC. Andrew Dela Cruz";
                                      $sql = "UPDATE ss_add_student_entry_pass SET status='$status', received_by='$received_by'WHERE id = '$id'";
                                      $conn->query($sql) or die ($conn->error);


                                      //Perform the query
                                          if(mysqli_query($conn, $sql)) {
                                              $_SESSION['success']="Application Approved Successfuly";
                                          }else{
                                              $_SESSION['error'] = "Data Failed to Insert";
                                          }
                                      }
                                  ?>
                                  <form method="post" >
                                      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                      <input type="hidden" name="status" value="Approved" required>
                                      <input type="hidden" name="received_by" value="OIC. Andrew Dela Cruz" required>
                                      <button type="submit" name="approve" class="btn btn-primary"><i class="bi bi-check-circle me-1"></i>Approve</button>
                                  </form>

                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <?php } ?>
                            </td>
                          </tr>
                           <?php
                        }
                    }
                    ?>
                </table>
            </div>         
        </div> 
        </section>
    </main>
  </body>

  <!-- Sweet Alert Message -->

  <?php 
if(isset($_SESSION['success']) && $_SESSION['success']!=''){
  ?>
  <script>
    swal({
  title:"<?php echo $_SESSION['success']?>",
  icon: "success",
  showConfirmButton: false,
  timer: 1000
}).then(function() {
  window.location.href = "addserv_entrypass.php";
});
  </script>
  <?php
  unset($_SESSION['success']);
}
?>

  <?php include "partial/footer.php";?> 
