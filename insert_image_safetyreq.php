<?php include "partial/head.php";?>
  <body>

  <?php include "partial/navbar.php";?>
  <?php include "partial/sidebar.php";?>

    <?php
  if(isset($_POST['application_form'])){
    
    // insert the form data into the database
    $safetyrequirements = $_POST['safetyrequirements'];
    $type = $_POST['type'];

    $image = $_FILES['image']['name'];
    $target_img = "./assets/img/requirements/".basename($image);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_img)) {
                $sql = "INSERT INTO ss_safety_requirements (safetyrequirements, type, image)
                VALUES ('$safetyrequirements', '$type','$image')";
                //Perform the query
                if(mysqli_query($conn, $sql)) {
                    $_SESSION['successsubmit']="Application Submitted Successfully";
                }else{
                    $_SESSION['success']="Error";
                }
            
        }else {
            $_SESSION['success']="Failed to Upload your Image";
        }
   
}

?>

    <section class="home-section mx-3 bg-light rounded shadow">
           <div class="card p-5" style="height:650px; ">
                <div class="card-body center">  

                
         <form method="POST" enctype="multipart/form-data">
            </br>
            <h3 class="text-muted" id="exampleModalLabel">Insert Your File </h3>
            
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Safety Requirements</label>
                            <input type="text" class="form-control" name="safetyrequirements" id="safetyrequirements" placeholder="Safety Requirements" >
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Type</label>
                                <input type="text" class="form-control" name="type"  placeholder="Type">
                        </div>
                    </div>
<br>

                    <div class="form-group">
                        <label for="image">Requirements Image</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>



                    <div class="text-center">
                        <button type="submit" name="application_form" class="btn btn-primary">Submit</button>
                    </div>
                    </br>

            </form>
                </div>
            </div>      
    </section>
        </main>

<?php include "partial/footer.php";?>