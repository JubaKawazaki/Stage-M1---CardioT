<?php
session_start();

$connect = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connect, 'cardiot');
mysqli_set_charset($connect, "utf8");

if(isset($_POST['Login']))
{

    $email =htmlspecialchars($_POST['username']) ;
    $mdp =htmlspecialchars($_POST['Mtdp']) ;

    $selct = "SELECT * FROM patients";
    $rslt = mysqli_query($connect, $selct);

    while ($row = mysqli_fetch_array($rslt)) 
    {
        if ($row['username'] == $email && $row['Mdp'] == $mdp) 
        {
            if($row['type'] == "patient")
            {
                $_SESSION['idpat'] = $row['ID_pats'];
                $_SESSION['log'] = true;
                header("Location: Dashpat.php");
            }

            if($row['type'] == "ADMIN")
            {
                $_SESSION['log'] = true;
                header("Location: Dashboard.php");
            }
            
        }
    }

}
