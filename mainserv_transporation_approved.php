<?php include "partial/head.php";?>
  <body>

  <?php include "partial/navbar.php";?>
  <?php include "partial/sidebar.php";?>
  



  <section class="home-section mx-3 bg-light rounded shadow">
          <div class="card overflow-auto" style="height:650px;">
             <div class="card-body">
             <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="mainserv_transportation.php">Transportation Request</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Transportation Approval</li>
                </ol>
                </nav>
            
            <?php
             include "assets/php/db_conn.php";
             $id=$_GET['ID'];
                 $query = "SELECT * FROM `ss_transporation` where id='$id'"; // change database table name for other data fetching
                 $query_run = mysqli_query($conn, $query);
                 $row = $query_run->fetch_assoc();
            ?>
            
            <?php do{ ?> 
                <label><?php echo $row['id'];?></label>
                <label><?php echo $row['fname'];?></label>
                <label><?php echo $row['plate_no'];?></label>
                <label><?php echo $row['vehicle_type'];?></label>
                <label><?php echo $row['requirements_pass'];?></label>
                <?php }while($row = $query_run->fetch_assoc());
            ?>
            <?php
                                            $id = $_GET['ID'];
                                            $sql = "SELECT * FROM ss_transporation WHERE id = '$id'";
                                            $college = $conn->query($sql) or die($conn->error);
                                            $row = $college->fetch_assoc();

                                            if(isset($_POST['approve'])){

                                                $status = "Approved";
                                                $received_by = "Safety and Security O.I.C";
                                                $sql = "UPDATE ss_transporation SET status='$status', received_by='$received_by'WHERE id= '$id'";
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

