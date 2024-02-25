<?php
$Fullname = $_Post['Full name'];
$Emailaddress = $_Post['Email address']; 
$YourMessage = $_Post['Your Message'];

if(!empty($Fullname) || !empty($Emailaddress) || !empty($YourMessage)) {

    $host = "localhost";
    $dbFullname = "root";
    $dbEmailaddress = "";
    $dbYourMessage = "Youtube";
}

    $conn = new mysqli($host,$dbFullname, $dbEmailaddress, $dbYourMessage );

    if (mysqli_connect_error() ) {
        die('Connect Error('.mysqli_connect_error().')'.mysqli_connect());
    } else {
        $SELECT = "SELECT email From register WHere email = ? Limit 1";
        $INSERT = "INSERT Into register (Fullname,Emailaddress,YourMessage)values(?,?,?)";
    
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if ( $rnum==0 ) {
            $stmt->close();

            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("ssssii",$Fullname,$Emailaddress,$YourMessage);
            $stmt->execute();
            echo "New record inserted successfully";
        }   else{
            echo "Someone already register using this email";
        } 
        $stmt->close();
        $conn->close();
    }  
      
