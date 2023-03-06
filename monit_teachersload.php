<?php include "partial/head.php";?>
  <body>

  <?php include "partial/navbar.php";?>
  <?php include "partial/sidebar.php";?>

     
        <section class="home-section mx-3 bg-light rounded shadow">
        <div class="card overflow-auto" style="height:650px;">
             <div class="card-body">
             <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="monit_techearsattendance.php">Teachers Attendance</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Teachers Load</li>
                </ol>
                </nav>
             
    
            <?php
             include "assets/php/db_conn.php";
             $query = "SELECT * FROM `ams_class_sched`"; // change database table name for other data fetching
                 $query_run = mysqli_query($conn, $query);
            ?>
                <table id="#" class="table table-striped table-bordered" class="">
                    <thead class="text-center">
                    <th scope="col">Class ID</th>
                    <th scope="col">S.Y</th>
                    <th scope="col">Course Code</th>
                    <th scope="col">Class Days</th>  
                    <th scope="col">Class Time</th> 
                    <th scope="col">Semester</th>
                    <th scope="col">Year and Section</th>
                    <th scope="col">Subject Code</th>
                    <th scope="col">Subject Name</th>
                    <th scope="col">Teacher</th>
                    <th scope="col">Room</th>

                       

                    </thead>
                <tbody class="text-center">
                    <?php
                    
                    if(mysqli_num_rows($query_run) > 0)
                    {
                        foreach($query_run as $row )
                        {
                            ?>
                            <tr>
                            <td><?= $row['class_ID']?></td>
                            <td><?= $row['class_sy']?></td>
                            <td><?= strtoupper($row['course_code'])?></td>
                            <td><?= strtoupper($row['class_day'])?></td>
                            <td><?= strtoupper($row['class_time'])?></td>
                            <td><?= strtoupper($row['class_sem'])?></td>
                            <td><?= strtoupper($row['class_yearsec'])?></td>                    
                            <td><?= strtoupper($row['subject_code'])?></td>
                            <td><?= strtoupper($row['subject_name'])?></td>
                            <td><?= strtoupper($row['teacher'])?></td>                    
                            <td><?= strtoupper($row['room'])?></td>
                            
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
