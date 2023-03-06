<?php include "partial/head.php";?>
  <body>

  <?php include "partial/navbar.php";?>
  <?php include "partial/sidebar.php";?>

  <?php
             include "assets/php/db_conn.php";
        
                 $query = "SELECT * FROM `ss_safety_requirements` where school_safety_standard ='CHED'"; // change database table name for other data fetching
                 $query_run = mysqli_query($conn, $query);
                 $row = $query_run->fetch_assoc();
            ?>
            
            <?php do{ ?> 
            

        <section class="home-section mx-3 bg-light rounded shadow">
           <div class="card overflow-auto" style="height:650px;">
             <div class="card-body">

                                      <div class="text-center">
                                      <div id="carouselExample" class="carousel slide mx-auto">
                                        <div class="carousel-inner">
                                          <div class="carousel-item active">
                                            <img src="./assets/img/requirements/<?php echo $row['image'];?>" style="max-width: 500px; height: auto; border: 1px solid black;" class="d-block w-100" alt="...">
                                          </div>
                                        </div>
                                      </div>
                                    </div>


                                  <div class="carousel-item">
                                     <img src="..." class="d-block w-100" alt="...">
                                 </div>
                                     <div class="carousel-item">
                                  <img src="..." class="d-block w-100" alt="...">
                                </div>
                              </div>
                              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                              </button>
                              <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                              </button>
                            </div>
                      <?php }while($row = $query_run->fetch_assoc());
            ?>
            
            </div>
          </div>      
        </section>
    </main>

   <?php include "partial/footer.php";?>

