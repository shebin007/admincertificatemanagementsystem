<?php
    require_once 'conn.php';
    session_start();
try{
    if(isset($_POST['sign']))
    {
        $query = "SELECT * FROM users WHERE uname = :username "."AND upass = :password";  
        $statement = $db->prepare($query); 
        $statement->execute(  
            array(  
                 'username'     =>     $_POST["uname"],  
                 'password'     =>     $_POST["upassword"]  
            )  
       );  
       $count = $statement->rowCount();     
       if($count > 0)  
                {  
                     $_SESSION["username"] = $_POST["uname"];  
                     header("location:index.php");  
                }  
                else  
                {  
                     $message = '<label>Wrong Data</label>';  
                }  
        
    }
}

catch(PDOException $error){
    $message = $error->getMessage();  
}
?>