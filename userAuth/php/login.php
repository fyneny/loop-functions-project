<?php
 session_start ();
if(isset($_POST['submit'])){
   $email = $_POST['email'];
   $password = $_POST['password'];
   
loginUser($email, $password); 

}

function loginUser($email, $password){
    /*
        Finish this function to check if username and password 
    from file match that which is passed from the form
    */
    $file = fopen ('../storage/users.csv', 'r');
    while(!feof($file)){
        $line = fgetcsv ($file);
        if($line[1] == $email && $line[2] == $password){
            $_SESSION['username'] = $line[0];
            header("Location: ../dashboard.php");
            exit();
        } 
    } 
    
    echo"Invalid username or password";
    fclose($file);
}






