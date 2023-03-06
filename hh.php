if(isset($_POST['application_form'])){
    
    // insert the form data into the database
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];

    $enrollment_img = $_FILES['enrollment_img']['name'];
    $target_img = "./uploads/".basename($enrollment_img);
        if (move_uploaded_file($_FILES['enrollment_img']['tmp_name'], $target_img)) {
                $sql = "INSERT INTO oes_student_application (firstname, email, enrollment_img,)
                VALUES ('$firstname', '$email','$enrollment_img')";
                //Perform the query
                if(mysqli_query($conn, $sql)) {
                    $_SESSION['successsubmit']="Application Submitted Successfully";
                }else{
                    $_SESSION['success']="Error";
                }
            
        }else {
            $_SESSION['success']="Failed to Upload your Image";
        }
   
}