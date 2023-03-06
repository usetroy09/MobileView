<?php include "partial/head.php";?>
  <body>

  <?php include "partial/navbar.php";?>
  <?php include "partial/sidebar.php";?>

     
        <section class="home-section mx-3 bg-light rounded shadow">
        <div class="card overflow-auto" style="height:650px;">
             <div class="card-body">
             <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="mainserv_visitorsid.php">Visitors</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Compliance and Guidelines</li>
                </ol>
                </nav>
                <div class="container"> 
            <div class="row">
                 <div class="space">
                 <button class="btn btn-primary" onclick="printTable()"> <i class='bx bx-printer'> &nbsp;Print Table</i></button>  
             </div>
    
                                        <?php
                                        include "assets/php/db_conn.php";
                                        $query = "SELECT * FROM `ss_mservices` where school_safety_standard ='10'"; // change database table name for other data fetching
                                            $query_run = mysqli_query($conn, $query);
                                        ?>
                                            <table id="cag_table" class="table table-striped table-bordered">
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
                    var table = document.getElementById("cag_table");
                    
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
