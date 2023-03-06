<?php include "partial/head.php";?>
  <body>

  <?php include "partial/navbar.php";?>
  <?php include "partial/sidebar.php";?>


     
        <section class="home-section mx-3 bg-light rounded shadow">
          <div class="text">
            <!-- insert something to view details properly ex table .-->
          <?php
             include "assets/php/db_conn.php";
             $id=$_GET['ID'];
                 $query = "SELECT * FROM `ss_visitors_id` where visitors_id ='$id' "; // change database table name for other data fetching
                 $query_run = mysqli_query($conn, $query);
                 $row = $query_run->fetch_assoc();
            ?>
            
            <?php do{ ?> 
              
                <label><?php echo $row['visitors_id'];?></label>
                <label><?php echo $row['fullname'];?></label>
                <label><?php echo $row['visitors_concern'];?></label>
                <label><?php echo $row['department'];?></label>
                <label><?php echo $row['time_in'];?></label>
                <?php }while($row = $query_run->fetch_assoc());
            ?>
            <?php
                                            $id = $_GET['ID'];
                                            $sql = "SELECT * FROM ss_visitors_id WHERE visitors_id = '$id'";
                                            $college = $conn->query($sql) or die($conn->error);
                                            $row = $college->fetch_assoc();

                                            if(isset($_POST['approve'])){

                                                $status = "Approved";
                                                $received_by = "Clinic";
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

