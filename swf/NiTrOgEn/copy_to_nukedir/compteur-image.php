<?    $fichier = "cpt.txt";

    $fp = @fopen($fichier, "r");
    if (!$fp) {
        echo "Impossible d'ouvrir $fichier en lecture";
        exit;
    }
    $visites = fgets($fp, 8);
    fclose($fp);

    $fp = @fopen($fichier, "w"); // le fichier est ouvert en ecriture, remis a zero
    if (!$fp) {
        echo "Impossible d'ouvrir $fichier en ecriture";
        exit;
    }
    $visites++;
    fputs($fp, $visites);
    fclose($fp);


    $visites = ereg_replace("0","<img src='image/compteur/0.gif'>","$visites");
    $visites = ereg_replace("1","<img src='image/compteur/1.gif'>","$visites");
    $visites = ereg_replace("2","<img src='image/compteur/2.gif'>","$visites");
    $visites = ereg_replace("3","<img src='image/compteur/3.gif'>","$visites");
    $visites = ereg_replace("4","<img src='image/compteur/4.gif'>","$visites");
    $visites = ereg_replace("5","<img src='image/compteur/5.gif'>","$visites");
    $visites = ereg_replace("6","<img src='image/compteur/6.gif'>","$visites");
    $visites = ereg_replace("7","<img src='image/compteur/7.gif'>","$visites");
    $visites = ereg_replace("8","<img src='image/compteur/8.gif'>","$visites");
    $visites = ereg_replace("9","<img src='image/compteur/9.gif'>","$visites");

    echo $visites
    ?>
