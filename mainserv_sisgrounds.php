<?php include "partial/head.php";?>
  <body>

  <?php include "partial/navbar.php";?>
  <?php include "partial/sidebar.php";?>


        <section class="home-section mx-3 bg-light rounded shadow">
            <br>
             <div class="card-body">
             <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">School Grounds</li>
                </ol>
                </nav>
                <div class="card" style="height:150px;">
                 <div class="card-body shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                 <p class="fw-bold text-center">Safety on School Grounds <br>Standard No.1 </p>
                    <p class="fw-bold text-center">
                        School grounds refer to the entire enclosure designated for use by the school for any of its activities such as learning, playing. games or sports, Such grounds should be large to house the required physical infrastructure, including classrooms, offices, canteen, playing grounds and assembly walkways, among others. The school ground must be well managed and the necessary documents of ownership obtained from the Ministry of Lands or the Local Authority, whichever is appropriate.</p>
                     </div>
                </div>
                <br> <br> <br> <br>

            <div class="container"> 
            <div class="row">
            <div class="space">
            <button class="btn btn-primary" onclick="printTable()"> <i class='bx bx-printer'> &nbsp;Print Table</i></button>  
             </div>
             
             <?php
                                                            include "assets/php/db_conn.php";
                                                            $query = "SELECT * FROM `ss_mservices` where school_safety_standard ='1'"; // change database table name for other data fetching
                                                                $query_run = mysqli_query($conn, $query);
                                                            ?>
                                                            <br>
                                                                <table id="table" class="table table-striped table-bordered">
                                                                    <thead class="text-center">
                                                                        <th data-sort="string">ID</th>
                                                                        <th data-sort="string">Facility</th>
                                                                        <th data-sort="string">Service</th>  
                                                                        <th data-sort="string">Standard No.</th>
                                                                        <th data-sort="string">Hirac</th>
                                                                        <th data-sort="string">Reports</th>
                                                                        <th data-sort="string">Received by</th>
                                                                        <th data-sort="string">Status</th>
                                                                    

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
                    <br>        
                </div>
             <br>                               
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
                    var table = document.getElementById("table");
                    
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

                    
                    <script>
                    $(document).ready(function() {
                        $('th[sortable]').click(function() {
                        var table = $(this).parents('table').eq(0)
                        var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
                        this.asc = !this.asc
                        if (!this.asc) {
                            rows = rows.reverse()
                        }
                        for (var i = 0; i < rows.length; i++) {
                            table.append(rows[i])
                        }
                        })
                        function comparer(index) {
                        return function(a, b) {
                            var valA = getCellValue(a, index)
                            var valB = getCellValue(b, index)
                            return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.toString().localeCompare(valB)
                        }
                        }
                        function getCellValue(row, index) {
                        return $(row).children('td').eq(index).text()
                        }
                    })
                </script>

  </html>
