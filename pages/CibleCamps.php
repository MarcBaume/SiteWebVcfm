<?php

try
{
    $absender = "info@vcfm.ch"; 
    $to = "p_mercier@hispeed.ch, marcbaume12@gmail.com";
    $subject = "Inscription camp ".$_POST['nom']." ".$_POST['prenom'];
    $message = $_POST['nom']." ".$_POST['prenom'].";";
    $message .= $_POST['rue'].";";
    $message .= $_POST['lieu'].";";
    $message .= $_POST['email'].";";
    $message .= $_POST['tel'].";";
    $message .= $_POST['nai'].";";
    $message .= $_POST['mob'].";";
    $message .= $_POST['rem'].";";
    // En-têtes pour l'email HTML
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: vcfm <no-reply@vcfm.ch>" . "\r\n"; // Expéditeur
    $headers .= "Reply-To: {$_POST['email']}" . "\r\n"; // Pour répondre directement


    if (mail($to, $subject, $message,$headers)) 
    {
        header('Location: inscrit.html');
    }
    else 
    {
        echo "Email delivery failed.";
    }

   

}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>
