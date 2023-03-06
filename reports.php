<?php include "partial/head.php";?>
  <body>

  <?php include "partial/navbar.php";?>
  <?php include "partial/sidebar.php";?>
  <!-- restrictions -->
  <?php 
  $position = $_SESSION["position"];

  if($position == "Officer"){
    $limitation = "d-none";
  }else {
    $limitation = "d-block";
  }

?>

<!-- end of restrictions -->
     
<!-- note hirac lang dapat ang na fefetch dito sa mainservices na module -->
<section class="home-section m-3 bg-light rounded shadow">
        <div class="card overflow-auto m-5" style="height:650px;">
             <div class="card-body">
             <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="mainserv_index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Reports</li>
                </ol>
                </nav>
             
                <button class="btn btn-primary" onclick="printTable()">Print Table</button>  
    
            <?php
             include "assets/php/db_conn.php";
             $query = "SELECT * FROM `ss_mservices` "; // change database table name for other data fetching
                 $query_run = mysqli_query($conn, $query);
            ?>
                <table id="rtable" class="table table-striped table-bordered">
                    <thead class="text-center">
                        <th scope="col">ID</th>
                        <th scope="col">Facility</th>
                        <th scope="col">Service</th>  
                        <th scope="col">Standard No.</th>
                        <th scope="col">Hirac</th>
                        <th scope="col">Reports</th>
                        <th scope="col">Status</th>
                       

                    </thead>
                <tbody>
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
                                <td><?= strtoupper($row['status'])?></td>

                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
            </div>         
        </div> 
        <br>
        <h3 class="text-center"> ENTRY PASS </h3>
        <!-- additional services -->
        <div class="card overflow-auto" style="height:650px;">
             <div class="card-body">
             
    
            <?php
             include "assets/php/db_conn.php";
             $query = "SELECT * FROM `ss_add_student_entry_pass`"; // change database table name for other data fetching
                 $query_run = mysqli_query($conn, $query);
            ?>
                <table id="rtable" class="table table-striped table-bordered" class="">
                    <thead class="text-center">
                    <th scope="col">ID</th>
                    <th scope="col">Date</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Course & Section</th>  
                    <th scope="col">Reason</th> 
                    <th scope="col">Valid Until</th>
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
                            <td><?= $row['date']?></td>
                            <td><?= strtoupper($row['fname'])?></td>
                            <td><?= strtoupper($row['course&section'])?></td>
                            <td><?= strtoupper($row['reason'])?></td>
                            <td><?= strtoupper($row['valid_until'])?></td>
                            <td><?= strtoupper($row['status'])?></td>

                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
            </div>         
        </div> 
        <br>
        <h3 class="text-center"> EXIT PASS </h3>
        <div class="card overflow-auto" style="height:650px;">
             <div class="card-body">
             
    
             <?php
             include "assets/php/db_conn.php";
                 $query = "SELECT * FROM `ss_add_student_exit_pass`"; // change database table name for other data fetching
                 $query_run = mysqli_query($conn, $query);
            ?>
                <table id="rtable" class="table table-striped table-bordered" class="">
                    <thead class="text-center">
                    <tr class="tableRowHeader align-top">
                    <th scope="col">ID</th>
                    <th scope="col">Date</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">from</th>  
                    <th scope="col">Reason</th> 
                    <th scope="col">Official Schedule</th>
                    <th scope="col">Time Left</th>
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
                              <td><?= $row['date']?></td>
                              <td><?= strtoupper($row['fname'])?></td>
                              <td><?= strtoupper($row['from'])?></td>
                              <td><?= strtoupper($row['reason'])?></td>
                              <td><?= strtoupper($row['official_schedule_time'])?></td>
                              <td><?= strtoupper($row['time_left'])?></td>
                              <td><?= strtoupper($row['status'])?></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
            </div>         
        </div> 
        <br>
        <h3 class="text center"> Property Pass </h3>
        <div class="card overflow-auto" style="height:650px;">
             <div class="card-body">
             
    
             <?php
             include "assets/php/db_conn.php";
                 $query = "SELECT * FROM `ss_add_property_gatepass`"; // change database table name for other data fetching
                 $query_run = mysqli_query($conn, $query);
            ?>
                <table id="rtable" class="table table-striped table-bordered" class="">
                    <th scope="col">ID</th>
                    <th scope="col">Date</th>
                    <th scope="col">BCP Property</th>
                    <th scope="col">Quantity</th>  
                    <th scope="col">Unit</th> 
                    <th scope="col">Particular</th>
                    <th scope="col">Purpose</th>
                    <th scope="col">From</th>
                    <th scope="col">To</th>  
                    <th scope="col">Requested by:</th> 
                    <th scope="col">Guard on Duty</th>
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
                            <td><?= $row['date']?></td>
                            <td><?= strtoupper($row['bcp_property'])?></td>
                            <td><?= strtoupper($row['quantity'])?></td>
                            <td><?= strtoupper($row['unit'])?></td>
                            <td><?= strtoupper($row['particular'])?></td>
                            <td><?= strtoupper($row['purpose'])?></td>
                            <td><?= strtoupper($row['from'])?></td>
                            <td><?= strtoupper($row['to'])?></td>
                            <td><?= strtoupper($row['requested_by'])?></td>
                            <td><?= strtoupper($row['guard_on_duty'])?></td>
                            <td><?= strtoupper($row['status'])?></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
            </div>         
        </div> 

        <br>
        <h3 class="text-center"> Teachers Monitoring </h3>
        <div class="card overflow-auto" style="height:650px;">
             <div class="card-body">
             
            <?php
             include "assets/php/db_conn.php";
                 $query = "SELECT * FROM `ss_monitoring_teachers` ORDER BY date DESC"; // change database table name for other data fetching
                 $query_run = mysqli_query($conn, $query);
            ?>
                <table id="rtable" class="table table-striped table-bordered">
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

                <!-- for print table  -->
                <script>
                function printTable() {
                    // Get the table element
                    var table = document.getElementById("rtable");
                    
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

  </html>
