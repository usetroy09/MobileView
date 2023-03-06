<?php include "partial/head.php";?>
  <body>

  <?php include "partial/navbar.php";?>
  <?php include "partial/sidebar.php";?>


  <section class="home-section mx-3 bg-light rounded shadow">
          <div class="text">

          <form method="post">
            <h3 class=" mb-3 font-weight-normal border-bottom border-secondary">Fill out the following form</h3>
            <label for="inputEmail" class="sr-only">Firstname:</label>
            <input name="firstname" type="text" id="inputEmail" class="form-control" placeholder="Firstname" required autofocus>
            <label for="inputEmail" class="sr-only mt-2">Lastname:</label>
            <input name="lastname" type="text" id="inputEmail" class="form-control" placeholder="Lastname" required autofocus>
            <label for="inputEmail" class="sr-only mt-3">Course:</label>
            <select class="form-select-sm " name="course" id="validationCustom04" required>
              <option selected disabled value="">Select...</option>
              <option><a class=" dropdown-item option" value="BS Information Technology">BS Information Technology</a></option>
              <option><a class=" dropdown-item option" value="BS Hospitality Management">BS Hospitality Management</a></option>
              <option><a class=" dropdown-item option" value="BS Office Administration">BS Office Administration</a></option>
              <option><a class=" dropdown-item option" value="BS Business Administration">BS Business Administration</a></option>
              <option><a class=" dropdown-item option" value="BS Criminology">BS Criminology</a></option>
              <option><a class=" dropdown-item option" value="Bachelor of Elementary Education">Bachelor of Elementary Education</a></option>
              <option><a class=" dropdown-item option" value="Bachelor of Secondary Education">Bachelor of Secondary Education</a></option>
              <option><a class=" dropdown-item option" value="BS Computer Engineering">BS Computer Engineering</a></option>
              <option><a class=" dropdown-item option" value="BS Tourism">BS Tourism</a></option>
              <option><a class=" dropdown-item option" value="BS Entrepreneurship">BS Entrepreneurship</a></option>
              <option><a class=" dropdown-item option" value="BS Accounting Information System">BS Accounting Information System</a></option>
              <option><a class=" dropdown-item option" value="BS Psychology">BS Psychology</a></option>
              <option><a class=" dropdown-item option" value="BS Information Science">BS Information Science</a></option>
            </select><br>
            <label for="inputEmail" class="sr-only mt-2">Year & Section:</label>
            <input name="year_section" type="number" id="inputEmail" class="form-control" placeholder="Year & Section" required autofocus>
            <label for="inputEmail" class="sr-only mt-2">Referral:</label>
            <input name="referral" type="text" id="inputEmail" class="form-control bg-light text-muted" placeholder="Year & Section" value="Guidance" readonly>
            <label for="inputEmail" class="sr-only mt-3">State Reason/Concern:</label>
            <select class="form-select-sm " name="concern" id="validationCustom04" required>
              <option selected disabled value="">Select...</option>
              <option><a class=" dropdown-item option" value="Bullying">Bullying</a></option>
              <option><a class=" dropdown-item option" value="Fear">Fear</a></option>
              <option><a class=" dropdown-item option" value="Depression">Depression</a></option>
              <option><a class=" dropdown-item option" value="Mental Health">Mental Health</a></option>
              <option><a class=" dropdown-item option" value="Lying">Lying</a></option>
              <option><a class=" dropdown-item option" value="Stressed">Stressed</a></option>
            </select><br>
            <button name="submit" class="btn btn-primary end-0 mt-3 " value="submit" type="submit">Request</button>
          </form>

        <?php
                            if (isset($_POST['submit'])) {
                            $firstname = $_POST['firstname'];
                            $lastname = $_POST['lastname'];
                            $course = $_POST['course'];
                            $year_section = $_POST['year_section'];
                            $referral = $_POST['referral'];
                            $concern = $_POST['concern'];

                            $message = "$firstname $lastname would like to request a counseling.";

                            $sql = $conn -> prepare ("INSERT INTO requests (firstname,lastname,course,year_section,referral,concern,message,date_time)VALUES(?,?,?,?,?,?,?,Now())");
                            $sql->execute(array($firstname,$lastname,$course,$year_section,$referral,$concern,$message));
                            echo
                            "
                            <script>
                                alert('Success');
                                document.location.href = 'app_requestguidance.php';
                            </script>
                            ";
                         }
         ?>

          </section>
      </div>
    </main>

   <?php include "partial/footer.php";?>
  </body>
</html>