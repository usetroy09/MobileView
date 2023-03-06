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
 
  include "assets/php/db_conn.php";
  $id=$_GET['ID'];
  $query = "SELECT * FROM `ss_add_student_entry_pass` where id ='$id'"; // change database table name for other data fetching
      $query_run = mysqli_query($conn, $query);

?>




     
        <!-- <section class="home-section mx-3 bg-light rounded shadow"> -->
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
                            <td>
                            <form method="POST">
                             <input type="hidden" name="delete_id" value="<?php echo $row['id'];?>">
                              <button type="button"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered"><i class="bi bi-trash"></i></button>
                                                                            
                              <!-- Vertically centered Modal -->
                              <div class="modal fade" id="verticalycentered" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                  <div class="modal-content">
                                    <div class="modal-body">
                                      <div class="row">
                                <!-- Form -->
                                      <div class="col-md-12 mb-3 d-flex justify-content-center">
                                        <h5 style="font-weight: 700;" class="modal-title">Confirmation Action</h5>
                                      </div>
                                <!-- End Form -->

                                <!-- Form -->
                                        <div class="col-md-12 mb-4 d-flex justify-content-center">
                                           Are you sure you want to approve this request?
                                        </div>
                               <!-- End Form -->

                               <!-- Form -->
                                          <div class="col-md-12 mb-2  mt-0 d-flex justify-content-end">
                                            <button style="margin: 2px;" type="submit" name="delete_row" class="btn btn-primary" id="change-bg-btn">Yes</button>
                                              <button style="margin: 2px;" type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                          </div>
                              <!-- End Form -->
                                                </div>
                                            </div>
                                        </div>
                                     </div>
                                </div>
                            </div>
                               <!-- End Vertically centered Modal-->
                                </form>
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
  <?php include "partial/footer.php";?> 
