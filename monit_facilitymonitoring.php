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
                    <li class="breadcrumb-item"><a href="monit_teachersload.php">Teachers Attendance </a></li>
                    <li class="breadcrumb-item active" aria-current="page">Facility Monitoring</li>
                </ol>
                </nav>
             
             
    
            <?php
             include "assets/php/db_conn.php";
             $query = "SELECT * FROM `ss_monitoring_facility`"; // change database table name for other data fetching
                 $query_run = mysqli_query($conn, $query);
            ?>
                <table id="#" class="table table-striped table-bordered">
                    <thead class="text-center">
                        <th scope="col">ID</th>
                        <th scope="col">Date</th>
                        <th scope="col">Monitored Officer</th>  
                        <th scope="col">Time</th>
                        <th scope="col">Facility</th>
                        <th scope="col">Spot Monitoring</th>
                        <th scope="col">Concern</th>
                        <th scope="col">Received by: </th>
                        <th scope="col">Status</th>
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
                                <td><?= $row['Date']?></td>
                                <td><?= strtoupper($row['Monitored_officer'])?></td>
                                <td><?= strtoupper($row['Time'])?></td>
                                <td><?= strtoupper($row['facility'])?></td> 
                                <td><?= strtoupper($row['Spot_monitoring'])?></td> 
                                <td><?= strtoupper($row['Concern'])?></td>
                                <td><?= strtoupper($row['received_by'])?></td>                     
                                <td><?= strtoupper($row['status'])?></td>
                                <td><a href="monit_approved_facilitymonitoring.php?ID=<?php echo $row['id'];?>" class="btn btn-success <?php echo $limitation?>" style="background-color:#07177a;">VIEW<i class="bi bi-eye"></i></a></td>

                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
            </div>         
        </div> 
        </section>
    </main>
  </body>
  <?php include "partial/footer.php";?> 
