<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">
    <title>Inscription comme aide - VCFM Vélo-Club Franches-Montagnes</title>
	<meta name="viewport" content="width=device-width">
    <meta name="description" content="S‘inscrire comme aide pour les manifestations organisées par le VCFM.  -  ">
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
        <div>
            <h2>Carte membres</h2>
            <img class="mainimg" src="../img/carte-membre.jpg" alt="-">
            <p>Cher(ère) membre,<br/>Notre société compte actuellement 130 membres, mais peine souvent à trouver de l'aide et du soutien dans l'organisation 
            de ses manifestations phares. Conscient du problème et désireux de relancer la participation de chacun parce qu'elle est absolument nécessaire au 
            maintien et la pérennité de ces activités, le comité invite tous les membres à s'inscrire comme aide au moyen du formulaire d'inscription envoyé par 
            courrier en décembre. Il est également possible de remplir le formulaire online ci-dessous.</p>
            <p>Le but à atteindre : que chaque membre actif s'engage dans au moins une des quatre organisations du VCFM (GP Crevoisier 26.03.2023; Trophée du Doubs
            28.06-26.07.2023, parcage Marché-Concours 12/13.08.2023, Tour des Sommêtres 17.09.2023).</p>
            <p>Le VCFM est un club dynamique et ambitieux qui se veut actif dans la promotion du cyclisme et du VTT 
					dans notre région. Avec son école de cyclisme, il est également un club formateur auprès de notre jeunesse. Vous pouvez nous aider et participer à son 
					succès en consacrant un peu de votre temps à la réalisation des objectifs de notre société. D'avance merci à vous pour votre engagement !</p>
            <ul>
                <li class="lstnone"><b>Vous recevez la carte de membre 2023 qui vous offre de multiples avantages:</b></li>
                <li>Prix spécial sur tous les vêtements été/hiver du VCFM. La collection est disponible chez Sébastien et Marianne Froidevaux (tél. 078 765 54 33).</li>
                <li>Rabais de 5 à 20% auprès de nos magasins partenaires Sportissimo Intersport à Saignelégier et Joris Boillat Cycles au Noirmont.</li>
                <li>Participation au camp d'entraînement à un prix préférentiel.</li>
                <li>Prix préférentiels sur les cours de spinning organisés par Fitness Energy à Saignelégier.</li>
                <li>Inscription offerte à toutes les courses organisées par le VCFM.</li>
                <li>Contribution forfaitaire allouée aux classés du général du TJ et/ou de la Coupe AIJC.</li>
                <li>Divers sorties/soupers à prix préférentiels, voir même offerts.</li>
            </ul>
        </div>
		<h3>Inscription comme aide</h3>
        
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
            echo '<form action="benevol.php" method="post">';
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
            $inputmail = htmlentities($_POST['email']);
            echo '<label for="email">e-mail: (obligatoire)</label><input type="text" name="email" id="email" maxlength="30" value="'.$inputmail.'">';
            if($post) {
                $email = isset($inputmail) ? $inputmail : "";
                if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {echo '<p class="boldred">Veuillez indiquer une adresse e-mail</p>'; $mail =false;}
            }
            echo '<label for="tel">Téléphone:</label><input type="text" name="tel" id="tel" maxlength="30" value="'.htmlentities($_POST['tel']).'">';
            
            echo '<br><label class="lblradio" for="gpc0">Aide pour le GP Crevoisier: Oui</label>';  
            if ($_POST['gpc'] == 'GP Crevoisier: oui') {
                echo '<input class="inpradio" type="radio" name="gpc" id="gpc0" value="GP Crevoisier: oui" checked>';}
            else {
                echo '<input class="inpradio" type="radio" name="gpc" id="gpc0" value="GP Crevoisier: oui">';}
            echo '<label class="lblradio" for="gpc1">Non</label>';
            if ($_POST['gpc'] == 'GP Crevoisier: non') {
                echo '<input class="inpradio" type="radio" name="gpc" id="gpc1" value="GP Crevoisier: non" checked>';}
            else {
                echo '<input class="inpradio" type="radio" name="gpc" id="gpc1" value="GP Crevoisier: non">';}
                
            echo '<br><label class="lblradio" for="trd0">Aide pour le Trophée du Doubs: Oui</label>';
            if ($_POST['trd'] == "Trophée du Doubs: oui") {
                echo '<input class="inpradio" type="radio" name="trd" id="trd0" value="Trophée du Doubs: oui" checked>';}
            else {
                echo '<input class="inpradio" type="radio" name="trd" id="trd0" value="Trophée du Doubs: oui">';}
            echo '<label class="lblradio" for="trd1">Non</label>';
            if ($_POST['trd'] == "Trophée du Doubs: non") {
                echo '<input class="inpradio" type="radio" name="trd" id="trd1" value="Trophée du Doubs: non" checked>';}
            else {
                echo '<input class="inpradio" type="radio" name="trd" id="trd1" value="Trophée du Doubs: non">';}
        
            echo '<br><label class="lblradio" for="pmc0">Aide pour le parcage Marché-Concours: Oui</label>';
            if ($_POST['pmc'] == "parcage Marché-Concours: oui") {
                echo '<input class="inpradio" type="radio" name="pmc" id="pmc0" value="parcage Marché-Concours: oui" checked>';}
            else {
                echo '<input class="inpradio" type="radio" name="pmc" id="pmc0" value="parcage Marché-Concours: oui">';}
            echo '<label class="lblradio" for="pmc1">Non</label>';
            if ($_POST['pmc'] == "parcage Marché-Concours: non") {
                echo '<input class="inpradio" type="radio" name="pmc" id="pmc1" value="parcage Marché-Concours: non" checked>';}
            else {
                echo '<input class="inpradio" type="radio" name="pmc" id="pmc1" value="parcage Marché-Concours: non">';}
        
            echo '<br><label class="lblradio" for="tds0">Aide pour le Tour des Sommêtres: Oui</label>';
            if ($_POST['tds'] == "Tour des Sommêtres: oui") {
                echo '<input class="inpradio" type="radio" name="tds" id="tds0" value="Tour des Sommêtres: oui" checked>';}
            else {
                echo '<input class="inpradio" type="radio" name="tds" id="tds0" value="Tour des Sommêtres: oui">';}
            echo '<label class="lblradio" for="tds1">Non</label>';
            if ($_POST['tds'] == "Tour des Sommêtres: non") {
                echo '<input class="inpradio" type="radio" name="tds" id="tds1" value="Tour des Sommêtres: non" checked>';}
            else {
                echo '<input class="inpradio" type="radio" name="tds" id="tds1" value="Tour des Sommêtres: non">';}
            
            echo '<p>Remarque</p>';
            echo '<textarea name="rem" id="rem" rows="10">'.htmlentities($_POST['rem']).'</textarea>';
            echo '<button type="submit">Envoyer</button></form>';
        
            //for tests without email set here: $mail = false;
        
            //mail
            if ($mail == true){
                $empfaenger = "p_mercier@hispeed.ch, tom.salz@bluewin.ch, activites@vcfm.ch"; 
                $absender   = "info@vcfm.ch";
                $betreff    = "Inscription aide depuis le site internet VCFM";
                $mailtext   = $_POST['nom']." ".$_POST['prenom']."\r".$_POST['email']."\r".$_POST['tel']."\r\r".$_POST['gpc']."\r".$_POST['trd']."\r".$_POST['pmc']."\r".$_POST['tds']."\r\rRemarque:\r".$_POST['rem']."\r\r Cet e-mail est généré par le site internet VCFM";
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
                <section id="fgrdms1">© 2019-2020 VCFM</section>
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
