<?php include "partial/head.php";?>
  <body>

  <?php include "partial/navbar.php";?>
  <?php include "partial/sidebar.php";?>

     
        <section class="home-section mx-3 bg-light rounded shadow">
        <div class="card overflow-auto" style="height:650px;">
             <div class="card-body">
             <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="mainserv_foodsafety.php">Food Safety</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Drugs and Substance Abuse</li>
                </ol>
                </nav>
             <div class="card" style="height:150px;">
                 <div class="card-body shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                    <p class="fw-bold text-center">Drugs and Substance Abuse <br>Standard No.6</p>
                    <p class="fw-bold text-center">
                    -A drug is any chemical that changes or modifies one or more of body functions. Drug use, misuse and abuse have major implications on the health of individuals. <br>

                    -Drug use means using a drug for its intended purpose. Drug misuse refers to using a drug for a purpose for which it is not intended, for example, using aspirin or paracetamol for treatment of ay diseases.<br>

                    -Drug abuse is the chronic habit of using a drug for a reason other than for what it is intended. Frequent drug abuse can lead to drug dependency or addiction. The main reasons why learners abuse drugs include the urge to act grown up, to have a good time or to conform to others. Other than these reasons, learners also abuse drugs as a result of influence of family members, media and peers.  </p>

                </div>
             </div>
            
             <br>  <br> <br> <br> <br> <br> <br> <br>

             <div class="container"> 
                 <div class="row">
                    <div class="space">
                    <button class="btn btn-primary" onclick="printTable()"> <i class='bx bx-printer'> &nbsp;Print Table</i></button>  
                    </div>
                                <?php
                                include "assets/php/db_conn.php";
                                $query = "SELECT * FROM `ss_mservices` where school_safety_standard ='6'"; // change database table name for other data fetching
                                    $query_run = mysqli_query($conn, $query);
                                ?>
                                    <table id="das_table" class="table table-striped table-bordered">
                                        <thead class="text-center">
                                            <th scope="col">ID</th>
                                            <th scope="col">Facility</th>
                                            <th scope="col">Service</th>  
                                            <th scope="col">Standard No.</th>
                                            <th scope="col">Hirac</th>
                                            <th scope="col">Reports</th>
                                            <th scope="col">Received by</th>
                                            <th scope="col">Status</th>
                                        

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
                                                    <td><?= $row['facility']?></td>
                                                    <td><?= strtoupper($row['Service'])?></td>
                                                    <td><?= strtoupper($row['school_safety_standard'])?></td>
                                                    <td><?= strtoupper($row['hirac'])?></td>                    
                                                    <td><?= strtoupper($row['reports'])?></td>
                                                    <td><?= strtoupper($row['received_by'])?></td>
                                                    <td><?= strtoupper($row['status'])?></td>

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
  <!-- for print table  -->
  <script>
                function printTable() {
                    // Get the table element
                    var table = document.getElementById("das_table");
                    
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

