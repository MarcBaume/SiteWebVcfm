<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">
    <title>Adhésion - VCFM Vélo-Club Franches-Montagnes</title>
	<meta name="viewport" content="width=device-width">
    <meta name="description" content="VCFM formulaire d'adhésion  -  ">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/ie.css">
    <link rel="stylesheet" href="../css/form.css">
    <script>
        // declaration for old IE browsers */   
        document.createElement("header");
        document.createElement("main");
        document.createElement("nav");
        document.createElement("section");
        document.createElement("footer");

    </script>    
</head>

<body>
    
    <header>
        <a href="../index.html"><img id=logo src="../img/logo-vcfm.png" title="Vélo-club Franches-Montagnes"></a>
        <nav class="topnav" id="myTopnav">
            <a href="../index.html">Accueil</a>
            <a href="ecole.html">École de cyclisme</a>
            <a href="activites.html">Activités</a>
            <a href="club.html">Club</a>
            <a href="benevol.php">Inscription aide</a>
            <a href="partenaires.html">Partenaires</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()"><img src="../img/icon-menu.png" alt=""></a>
        </nav>
    </header>    

    <main>
	   <h1>Demande d'adhésion VCFM</h1>	
        <?php
            // Spam check
            //session_start();
            //if (!isset($_SESSION['no_spam'])) {
            //    $_SESSION['no_spam'] = uniqid('', true);
            //}
            
            //if ($_SESSION['no_spam'] == $_POST['spam_check']) {
                $mail = true;
            //}
            //else {
            //    $mail = false;
            //}
            
            // check input
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $post = true;
            }
            else {
                $post = false;
                $mail = false;
            }
            
            //create and fill up form
            echo '<form action="adhesionclub.php" method="post">';
            echo '<input type="hidden" name="spam_check" id="spam_check" value="'.$_SESSION['no_spam'].'">';
            $inputname = htmlentities($_POST['nom']);
            echo '<label for="nom">Nom: (obligatoire)</label><input type="text" name="nom" id="nom" maxlength="30" value="'.$inputname.'">';
            if($post) {
                $nom = isset($inputname) ? $inputname : ""; 
                if (empty(trim($nom))) {echo '<p class="boldred">Veuillez remplir le champ</p>'; $mail =false;}
            }
            $inputprenom = htmlentities($_POST['prenom']);            
            echo '<label for="prenom">Prénom: (obligatoire)</label><input type="text" name="prenom" id="prenom" maxlength="30" value="'.$inputprenom.'">';
            if($post) {
                $prenom = isset($inputprenom) ? $inputprenom : "";
                if (empty(trim($prenom))) {echo '<p class="boldred">Veuillez remplir le champ</p>'; $mail =false;}
            }
            echo '<label for="rue">Rue:</label><input type="text" name="rue" id="rue" maxlength="30" value="'.htmlentities($_POST['rue']).'">';
            $inputlieu = htmlentities($_POST['lieu']);            
            echo '<label for="lieu">N°postal & Lieu: (obligatoire)</label><input type="text" name="lieu" id="lieu" maxlength="30" value="'.$inputlieu.'">';
            if($post) {
                $lieu = isset($inputlieu) ? $inputlieu : "";
                if (empty(trim($lieu))) {echo '<p class="boldred">Veuillez remplir le champ</p>'; $mail =false;}
            }
            $inputmail = htmlentities($_POST['email']);            
            echo '<label for="email">e-mail: (obligatoire)</label><input type="text" name="email" id="email" maxlength="30" value="'.$inputmail.'">';
            if($post) {
                $email = isset($inputmail) ? $inputmail : "";
                if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {echo '<p class="boldred">Veuillez indiquer une adresse e-mail</p>'; $mail =false;}
            }
            echo '<label for="tel">Téléphone:</label><input type="text" name="tel" id="tel" maxlength="30" value="'.htmlentities($_POST['tel']).'">';
            echo '<label for="nai">Date de naissance:</label><input type="text" name="nai" id="nai" maxlength="30" value="'.htmlentities($_POST['nai']).'">';
            echo 'Je souhaite recevoire les communications du VCFM:<br/>';
            if ($_POST['infm'] == 'parmail') {
                echo '<label><input class="chkbox" type="checkbox" name="infm" id="infm" value="parmail" checked>par e-mail</label><br/>';}
            else {
                echo '<label><input class="chkbox" type="checkbox" name="infm" id="infm" value="parmail">par e-mail</label><br/>';}
            if ($_POST['infw'] == 'parwhat') {
                echo '<label><input class="chkbox" type="checkbox" name="infw" id="infw" value="parwhat" checked>par whatsapp</label><br/>';}
            else {
                echo '<label><input class="chkbox" type="checkbox" name="infw" id="infw" value="parwhat">par whatsapp</label><br/>';}
            echo '<label for="mob">Mobile:</label><input type="text" name="mob" id="mob" maxlength="30" value="'.htmlentities($_POST['mob']).'">';
            echo '<p>Message:</p>';
            echo '<textarea name="rem" id="rem" rows="10">'.htmlentities($_POST['rem']).'</textarea>';
            echo '<button type="submit">Envoyer</button></form>';
        
            //for tests without email set here: $mail = false;
        
            //mail
            if ($mail == true){
                $empfaenger = "p_mercier@hispeed.ch, activites@vcfm.ch";
//                $empfaenger = "activites@vcfm.ch";
                $absender   = "info@vcfm.ch";
                $betreff    = "Demande d'adhésion VCFM depuis le site Internet";
                $mailtext   = "Nom: ".$_POST['nom']." ".$_POST['prenom']."\rRue: ".$_POST['rue']."\rLieu: ".$_POST['lieu']."\rMail: ".$_POST['email']."\rTél: ".$_POST['tel']."\rDate de naissamce: ".$_POST['nai']."\rJe souhaite recevoire les communications du VCFM:".$_POST['infm'].$_POST['infw']."\rMobile: ".$_POST['mob']."\r\rMessage: ".$_POST['rem']."\r***\rCet e-mail est généré par le site internet VCFM";
                $antwortan  = $_POST['email'];

                $headers   = array();
                $headers[] = "MIME-Version: 1.0";
                $headers[] = "Content-type: text/plain; charset=utf-8";
                $headers[] = "From: {$absender}";
                $headers[] = "Reply-To: {$antwortan}";
                $headers[] = "Subject: {$betreff}";
                $headers[] = "X-Mailer: PHP/".phpversion();
                $val = mail($empfaenger, $betreff, $mailtext,implode("\r\n",$headers));
                if ($val == treu) {echo '<p class="boldgreen">Votre e-mail a bien été envoyé</p>';}
            }
        ?>
    </main>

    <footer>
        <h2>Sponsor / Partenaires</h2>
            <a target="_blank" href="https://www.crevoisier.ch/"><img class="flex" src="../img/logo-crevoisier-fr.png" title="Crevoisier SA  Fabriques de machines"></a>
            <a target="_blank" href="https://www.raiffeisen.ch/franches-montagnes/fr.html"><img class="flex" src="../img/logo-raiffeisen.png" title="Banque Raiffeisen Franches-Montagnes"></a>
            <a target="_blank" href="https://www.entraide.ch/fr/jura/accueil"><img class="flex" src="../img/logo-jura-loterie-site.png" title="Organe de répartition du Jura"></a>
            <a target="_blank" href="https://www.jura.ch/"><img class="flex" src="../img/logo-jura.png" title="République et Canton du Jura" alt="-"></a>
            <br/><img class="flex" src="../img/logo-dmt.png" title="DMT Microtechnique">
            <a target="_blank" href="https://www.brasseriebfm.ch/"><img class="flex" src="../img/logo-bfm.png" title="Brasserie BFM SA"></a>
             <section class="footergrd">
                <section id="fgrdms1" align="left">© 2019-2020 VCFM</section>
                <section id="fgrdms2"><a class="footer" href="protection.html">Protection des données</a></section>
                <section id="fgrdms3"><a class="footer" href="impressum.html">Impressum</a></section>
                <section class="textright" id="fgrdms4"><a class="footer" href="sitemap.html">Présentation du site</a></section>
            </section>
    </footer>
    
<script>
    // toggle menu
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
</script>

</body>
</html>
