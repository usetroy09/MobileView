<?php include "partial/head.php";?>
  

  <?php include "partial/navbar.php";?>
  <?php include "partial/sidebar.php";?>

     
        <section class="home-section mx-3 bg-light rounded shadow">
        <div class="card-header">ACCOUNTS</div>
        <div class="card" style="width: 70rem;">

              <div class="card border-light mb-3 p-md-4">
          <!-- table starts here -->
          <div class="container table-responsive mt-5">
      <table class="table rounded-2 overflow-hidden shadow-sm">
        <?php
             include "assets/php/db_conn.php";
                 $query = "SELECT * FROM `ss_users_officer_1_2`"; // change database table name for other data fetching
                 $query_run = mysqli_query($conn, $query);
            ?>

        <thead>
          <tr class="tableRowHeader align-top">
            <th scope="col">ID</th>
            <th scope="col">Username</th>
            <th scope="col">Password</th>  
            <th scope="col">Name</th>
            <th scope="col">Position</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody class="tableBodyColor">

            <?php
          
              if(mysqli_num_rows($query_run) > 0)
              {
                  foreach($query_run as $row )
                  {
                      ?>
                      <tr>
                          <td><?= $row['id']?></td>
                          <td><?= $row['username']?></td>
                          <td><?= strtoupper($row['password'])?></td>
                          <td><?= strtoupper($row['name'])?></td>
                          <td><?= strtoupper($row['position'])?></td>

                          <td><a href=""></a></td>


                      </tr>
                      <?php

                  }
              }

            ?>
          </tr>
        </tbody>
      </table>
        </section>
      </div>
    </main>

   <?php include "partial/footer.php";?>
  </body>
</html>
