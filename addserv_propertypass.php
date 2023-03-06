<?php include "partial/head.php";?>
  <body>

  <?php include "partial/navbar.php";?>
  <?php include "partial/sidebar.php";?>

     
        <section class="home-section mx-3 bg-light rounded shadow">
        <div class="card overflow-auto" style="height:650px;">
             <div class="card-body">
             <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="mainserv_index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Property Pass</li>
                </ol>
                </nav>
             
    
             <?php
             include "assets/php/db_conn.php";
                 $query = "SELECT * FROM `ss_add_property_gatepass`"; // change database table name for other data fetching
                 $query_run = mysqli_query($conn, $query);
            ?>
                <table id="#" class="table table-striped table-bordered" class="">
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
                    <th scope="col">Expected Delivery Time</th>
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
                            <th><?= strtoupper($row['delivered_date'])?></td>
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
