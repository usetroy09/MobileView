<?php include "partial/head.php";?>
  <body>

  <?php include "partial/navbar.php";?>
  <?php include "partial/sidebar.php";?>

     
        <section class="home-section mx-3 bg-light rounded shadow">
        <div class="card overflow-scroll" style="height:650px;">
             <div class="card-body">
             <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="mainserv_index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Teachers Monitoring</li>
                </ol>
                </nav>

             
            <?php
             include "assets/php/db_conn.php";
                 $query = "SELECT * FROM `ss_monitoring_teachers` ORDER BY date DESC"; // change database table name for other data fetching
                 $query_run = mysqli_query($conn, $query);
            ?>
                <table id="#" class="table table-striped table-bordered table-responsive p-5">
                    <thead>
                        <th scope="col">ID</th>
                        <th scope="col">Date</th>
                        <th scope="col">Day</th>  
                        <th scope="col">Session</th>
                        <th scope="col">Time Bracket</th>
                        <th scope="col">Campus</th>
                        <th scope="col">Monitored Officer</th>
                        <th scope="col">Room</th>  
                        <th scope="col">Official Time	</th>
                        <th scope="col">Subject Code</th>
                        <th scope="col">Teachers Name</th>
                        <th scope="col">Time Monitored</th>
                        <th scope="col">Remarks</th>  
                        <th scope="col">Concern	</th>
                        <th scope="col">Received by</th>
                        <th scope="col">Status</th>
                        <th scope="col">View</th>

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
                                <td><?= strtoupper($row['received_by'])?></td>
                                <td><?= strtoupper($row['status'])?></td>
                                <td><a href="monit_approved_teachers_monitoring.php?ID=<?= $row['id'];?>" class="btn btn-success" style="background-color:#07177a;"><i class="bi bi-eye">View</i></a></td>
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
  <?php include "partial/footer.php";?> 
    </html>
