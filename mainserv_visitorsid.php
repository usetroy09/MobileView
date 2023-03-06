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

     
        <!-- <section class="home-section mx-3 bg-light rounded shadow"> -->
        <div class="card overflow-auto p-5 m-5" style="height:650px;">
             <div class="card-body">
             <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="mainserv_communityrelation.php">Social Community Relation</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Visitors</li>
                </ol>
                </nav>
             
                <div class="container"> 
                  <div class="row">
                      <div class="space">
                      <button class="btn btn-primary" onclick="printTable()"> <i class='bx bx-printer'> &nbsp;Print Table</i></button>  
                      </div>
    
                <?php
             include "assets/php/db_conn.php";
             $query = "SELECT * FROM `ss_visitors_id`"; // change database table name for other data fetching
                 $query_run = mysqli_query($conn, $query);
            ?>
                <table id="#" class="table table-striped table-bordered" class="">
                    <thead class="text-center">
                    <th scope="col">ID</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Visitors Concern</th>  
                    <th scope="col">Department</th> 
                    <th scope="col"> Time In</th>
                    <th scope="col">Received by</th>
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
                            <td><?= $row['visitors_id']?></td>
                            <td><?= $row['fullname']?></td>
                            <td><?= strtoupper($row['visitors_concern'])?></td>
                            <td><?= strtoupper($row['department'])?></td>
                            <td><?= strtoupper($row['time_in'])?></td>
                            <td><?= strtoupper($row['received_by'])?></td>                    
                            <td><?= strtoupper($row['status'])?></td>
                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $row['visitors_id']; ?>">
                                                            View
                                                          </button>
                            
                            <?php
                          $entry_pass = $conn->query($query) or die($conn->error);
                          while ($row = $entry_pass->fetch_assoc()) {
                        ?>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal<?php echo $row['visitors_id']; ?>" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Visitors Pass Details</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <table id=visitors_table class="table table-striped">
                                  <tr>
                                    <td>ID</td>
                                    <td><?php echo $row['visitors_id']; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Full Name</td>
                                    <td><?php echo $row['fullname']; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Visitors Concern</td>
                                    <td><?php echo $row['visitors_concern']; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Department</td>
                                    <td><?php echo $row['department']; ?></td>
                                  </tr>
                                  <tr>
                                    <td>time_in</td>
                                    <td><?php echo $row['time_in']; ?></td>
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
                                      $id = $_POST['visitors_id'];
                                      $status = "Approved";
                                      $received_by = "Safety and Security O.I.C";
                                      $sql = "UPDATE ss_visitors_id SET status='$status', received_by='$received_by'WHERE visitors_id = '$id'";
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
                                      <input type="hidden" name="visitors_id" value="<?php echo $row['visitors_id']; ?>">
                                      <input type="hidden" name="status" value="Approved" required>
                                      <input type="hidden" name="received_by" value="Safety and Security O.I.C" required>
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
  window.location.href = "mainserv_visitorsid.php";
});
  </script>
  <?php
  unset($_SESSION['success']);
}
?>

  <?php include "partial/footer.php";?> 
  <!-- for print table  -->
  <script>
                function printTable() {
                    // Get the table element
                    var table = document.getElementById("visitors_table");
                    
                    // Open a new window with the table content
                    var newWin = window.open('', 'Print-Window');
                    newWin.document.open();
                    newWin.document.write('<html><head><title>Print Table</title></head><body>');
                    newWin.document.write('<table>' + table.innerHTML + '</table>');
                    newWin.document.write('</body></html>');
                    newWin.document.close();
                    
                    // Print the new window
                    newWin.print();
                }
                </script>
