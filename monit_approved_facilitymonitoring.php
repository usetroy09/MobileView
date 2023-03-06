<?php include "partial/head.php";?>
  <body>

  <?php include "partial/navbar.php";?>
  <?php include "partial/sidebar.php";?>

     
        <section class="home-section mx-3 bg-light rounded shadow">
        <div class="card overflow-scroll" style="height:650px;">
             <div class="card-body">
             <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="monit_techearsattendance.php">Teachers Monitoring</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Facility Monitoring</li>
                </ol>
                </nav>
            <!-- insert something to view details properly ex table .-->
          <?php
             include "assets/php/db_conn.php";
             $id=$_GET['ID'];
                 $query = "SELECT * FROM `ss_monitoring_facility` where id ='$id' "; // change database table name for other data fetching
                 $query_run = mysqli_query($conn, $query);
                 $row = $query_run->fetch_assoc();
            ?>
            
            <?php do{ ?> 
              
              <label><?php echo $row['id'];?></label>
              <label><?php echo $row['Date'];?></label>
              <label><?php echo $row['Monitored_officer'];?></label>
              <label><?php echo $row['Time'];?></label>
              <label><?php echo $row['facility'];?></label>
              <label><?php echo $row['Spot_monitoring'];?></label>
              <label><?php echo $row['Concern'];?></label>
              <label><?php echo $row['received_by'];?></label>
              <label><?php echo $row['status'];?></label>
              <?php }while($row = $query_run->fetch_assoc());
          ?>
          <?php
                                            $id = $_GET['ID'];
                                            // where id as is na wag na baguhin hindot
                                            $sql = "SELECT * FROM ss_monitoring_facility WHERE id = '$id'";  
                                            $college = $conn->query($sql) or die($conn->error);
                                            $row = $college->fetch_assoc();

                                            if(isset($_POST['approve'])){

                                                $status = "Approved";
                                                $received_by = "Property Custodian";
                                                $sql = "UPDATE ss_monitoring_facility SET status='$status', received_by='$received_by'WHERE id= '$id'";
                                                $conn->query($sql) or die ($conn->error);


                                                //Perform the query
                                                    if(mysqli_query($conn, $sql)) {
                                                        $_SESSION['success']="Application Approved Successfuly";
                                                    }else{
                                                        $_SESSION['error'] = "Data Failed to Insert";
                                                    }
                                            }
                                        ?>




 <?php do{ ?> 
				<form method="post" >

                                        <input type="hidden" name="status" <?php echo $row['status'];?> required>
                                        <input type="hidden" name="received_by" <?php echo $row['received_by'];?> required>

                                    <button type="submit" name="approve" class="btn btn-primary"><i class="bi bi-check-circle me-1"></i>Approve</button>
                                </form>
<?php }while($row = $college->fetch_assoc()); ?>

          </div>
        </section>
      </div>
    </main>

   <?php include "partial/footer.php";?>
  </body>
</html>
