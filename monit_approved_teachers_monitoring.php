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
                 $query = "SELECT * FROM `ss_monitoring_teachers` where id ='$id' "; // change database table name for other data fetching
                 $query_run = mysqli_query($conn, $query);
                 $row = $query_run->fetch_assoc();
            ?>
            
            <?php do{ ?> 
                <td><?= $row['id']?></td>
                                <td><?= $row['date']?></td>
                                <td><?= strtoupper($row['day'])?></td>
                                <td><?= strtoupper($row['session'])?></td>
                                <td><?= strtoupper($row['time_bracket'])?></td>                    
                                <td><?= strtoupper($row['campus'])?></td>
                                <td><?= strtoupper($row['monitored_officer'])?></td>
                                <td><?= strtoupper($row['room'])?></td>
                                <td><?= strtoupper($row['official_time'])?></td>
                                <td><?= strtoupper($row['subject_code'])?></td>
                                <td><?= strtoupper($row['teachers_name'])?></td>                    
                                <td><?= strtoupper($row['time_monitored'])?></td>
                                <td><?= strtoupper($row['remarks'])?></td>
                                <td><?= strtoupper($row['concern'])?></td>
                                <td><?= strtoupper($row['status'])?></td>
                <?php }while($row = $query_run->fetch_assoc());
            ?>
            <?php
                                            $id = $_GET['ID'];
                                            // where id as is na wag na baguhin hindot
                                            $sql = "SELECT * FROM ss_monitoring_teachers WHERE id = '$id'";  
                                            $college = $conn->query($sql) or die($conn->error);
                                            $row = $college->fetch_assoc();

                                            if(isset($_POST['approve'])){

                                                $status = "Approved";
                                                $received_by = "Academic";
                                                $sql = "UPDATE ss_monitoring_teachers SET status='$status', received_by='$received_by'WHERE id= '$id'";
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

                                    <button type="submit" name="approve" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-check-circle me-1"></i>Approve</button>
                                </form>
<?php }while($row = $college->fetch_assoc()); ?>

          </div>
        </section>
      </div>
    </main>

   <?php include "partial/footer.php";?>
  </body>
</html>
