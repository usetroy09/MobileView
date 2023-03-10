<?php 

include "./assets/php/db_conn.php";

if(isset($_POST['announcement'])){
    // Get user ID from session
    
    
        // insert the form data into the database
    $title = $_POST['title'];
    $body = $_POST['body'];

    $sql = "INSERT INTO ss_announcements (title, body)
    VALUES ('$title','$body')";

        //Perform the query
        if(mysqli_query($conn, $sql)) {
            $_SESSION['success']="Data Inserted Successfully";
        }else{
            $_SESSION['error'] = "Data Failed to Insert";
        }
    }  


if (isset($_POST['delete_row'])) {
    $delete_id = $_POST['delete_id'];

    // Delete the announcement with the specified ID from the database
    $sql = "DELETE FROM ss_announcements WHERE id = '$delete_id'";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "Announcement deleted successfully";
    } else {
        $_SESSION['error'] = "Error deleting announcement: " . mysqli_error($conn);
    }
}

?>

<?php include "partial/head.php";?>
  <body>

  <?php include "partial/navbar.php";?>
  <?php include "partial/sidebar.php";?>

     
        <section class="home-section mx-3 bg-light rounded shadow">
        <div class="card overflow-auto" style="height:650px;">
             <div class="card-body">
             

<div class="container-fluid">

                <div class="card shadow mb-4">  
                    <div class="card-body">
                        <h5 style="text-align: center;">New message</h5>

                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="recipient-name"  class="col-form-label">Title</label>
                                    <input type="text" name="title" class="form-control" id="recipient-name" >
                            </div>

                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Message:</label>
                                    <textarea class="form-control" name="body" id="message-text"></textarea>
                            </div>
                                <button type="submit" name="announcement" class="btn btn-primary">Send message</button>
                        </form>
                    </div>
                </div>
                                <!--Data Tables-->
    
                                    <div clas="row">
                                        <div class="col-xl-12 col-lg-1">
                                            <div class="card shadow mb-4">  
                                                <div class="card-body">

                                                    <div class="table-responsive">
                                                        <table class="table table-striped" id="example" width="100%" cellspacing="0">
                                                            <thead > 
                                                                <tr>
                                                                    <th>id</th>
                                                                    <th>title</th>
                                                                    <th>Body</th>
                                                                    <th>Added On</th>
                                                                </tr>

                                                            </thead>    
                                                                <tbody>
                                                                    <?php
                                                                        $sql = "SELECT * FROM ss_announcements";
                                                                        $college = $conn->query($sql) or die($conn->error);
                                                                        $row = $college->fetch_assoc();
                                                                    ?>

                                                        <?php do{
                                                            if (!empty($row)) { ?> 
                                                                <tr>
                                                                    <td><strong><?php echo $row['id'];?></td>
                                                                    <td><strong><?php echo $row['title'];?></td>
                                                                    <td><strong><?php echo $row['body'];?></td>
                                                                    <td><strong><?php echo $row['added_at'];?></td>
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
                                                        <?php }
                                                        } while($row = $college->fetch_assoc()); ?>
                                                                </tbody>
                                                        </table>
                                                        
                                                    </div>
                                                </div>
                                            </div>             
                                        </div>
                                    </div>

                                <!--End of Data Tables-->
                    <!-- End of Page Content -->
</div>


<?php 
if(isset($_SESSION['success']) && $_SESSION['success']!=''){
  ?>
  <script>
    swal({
  title:"<?php echo $_SESSION['success']?>",
  icon: "success",
  showConfirmButton: false,


});
  </script>
  <?php
  unset($_SESSION['success']);
}
?>
            
        </section>
    </main>
  </body>
  <?php include "partial/footer.php";?> 
