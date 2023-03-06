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

     
        <section class="home-section mx-3 bg-light rounded shadow">
        <div class="card overflow-auto" style="height:650px;">
             <div class="card-body">
             <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="mainserv_childabuse.php">Against Child Abuse</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Transportation</li>
                </ol>
                </nav>
                <div class="card" style="height:150px;">
                 <div class="card-body shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                    <p class="fw-bold text-center">Transportation safety<br>Standard No.11 </p>
                    <p class="fw-bold text-center">
                    Nearly all the schools in the country are day schools. Learners have to commute to school using jeepneys, buses, motorcycles and bicycles. Many also walk to schools. There are many instances where learners have been involved in accidents as pedestrians or passengers, some culminating into fatalities due to negligence, ignorance or sheer irresponsibility in observing basic road usage rules.
                    </p>
                     </div>
                </div>

             <br>
             <br>
             <br>
             <div class="container"> 
                <div class="row">
                    <div class="space">
                    <button class="btn btn-primary" onclick="printTable()"> <i class='bx bx-printer'> &nbsp;Print Table</i></button>   
                    </div>
             
    
                        <?php
                        include "assets/php/db_conn.php";
                        $query = "SELECT * FROM `ss_transporation`"; // change database table name for other data fetching
                            $query_run = mysqli_query($conn, $query);
                        ?>
                            <table id="transpo_table" class="table table-striped table-bordered">
                                <thead class="text-center">
                                    <th scope="col">ID</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Plate Number</th>  
                                    <th scope="col">Vehicle Type</th>
                                    <th scope="col">Requirements Pass</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Approved by</th>
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
                                            <td><?= $row['fname']?></td>
                                            <td><?= strtoupper($row['plate_no'])?></td>
                                            <td><?= strtoupper($row['vehicle_type'])?></td>
                                            <td><?= strtoupper($row['requirements_pass'])?></td>      
                                            <td><?= strtoupper($row['received_by'])?></td>            
                                            <td><?= strtoupper($row['status'])?></td>
                                            <td><a href="mainserv_transporation_approved.php?ID=<?php echo $row['id'];?>" class="btn btn-success <?php echo $limitation?>" style="background-color:#07177a;">View<i class="bi bi-eye"></i></a></td>

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
  <?php include "partial/footer.php";?> 
  <script>
                function printTable() {
                    // Get the table element
                    var table = document.getElementById("transpo_table");
                    
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
