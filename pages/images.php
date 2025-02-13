<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">
    <title>VCFM Vélo-Club Franches-Montagnes - club</title>
	<meta name="viewport" content="width=device-width">
    <meta name="VCFM web site" content="site officiel du vélo-club franche-montagnes">
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
    <script>
        function openimg(vimg) {
            alert(vimg);
            }
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
	   <h1>Images</h1>	
        <?php
            $dir = "../tmbs/gpcrevoisier2019";
            if (is_dir($dir))
            {
                if ( $handle = opendir($dir) )
                {
                    while (($file = readdir($handle)) !== false)
                    {
                        $ftype = filetype( $dir."/".$file);
                        if ($ftype == "file")
                        {
                            $vimg = '"../pictures/gpcrevoisier2019/'.$file.'"';    
                            echo "<img class='tmbimg' src=$dir/$file onclick='openimg($vimg)'>";
                        }
                    }
                    closedir($handle);
                }
            }
        ?>
    </main>

    <footer>
        <h2>Sponsor / Partenaires</h2>
            <a target="_blank" href="https://www.crevoisier.ch/"><img class="flex" src="../img/logo-crevoisier-fr.png" title="Crevoisier SA  Fabriques de machines"></a>
            <a target="_blank" href="https://www.raiffeisen.ch/franches-montagnes/fr.html"><img class="flex" src="../img/logo-raiffeisen.png" title="Banque Raiffeisen Franches-Montagnes"></a>
            <a target="_blank" href="https://www.entraide.ch/fr/jura/accueil"><img class="flex" src="../img/logo-jura-loterie-site.png" title="Organe de répartition du Jura"></a>
            <a target="_blank" href="https://www.jura.ch/"><img class="flex" src="../img/logo-jura.png" title="République et Canton du Jura" alt="-"></a>
            <a target="_blank" href="https://www.brasseriebfm.ch/"><img class="flex" src="../img/logo-bfm.png" title="Brasserie BFM SA"></a>
            <a target="_blank" href="https://velonello.ch/"><img class="flex" src="../img/logo-velonello.png" title="Velo Nell'o St-Imier  Bike Machines"></a>
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
