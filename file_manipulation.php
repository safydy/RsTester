<?php

/*Help :
 * http://www.commentcamarche.net/contents/791-php-les-fichiers
*/

echo "<h3>Read : using file()</h3>";
//Read : using file()
$Fichier = "./Files/myfile.xml";

if (is_file($Fichier)) {
    if ($TabFich = file($Fichier)) {
        for($i = 0; $i < count($TabFich); $i++)
            echo utf8_decode($TabFich[$i]);
        
        print_r($TabFich);
    }else {
        echo "Le fichier ne peut être lu...<br>";
    }
}else {
   echo "Désolé le fichier n'est pas valide<br>";
}

echo "<h3>Read : using fopen()</h3>";
//Read : using fopen()
$vPage = "";
if (is_file($Fichier)) {
    if ($fp = fopen($Fichier,"r")) {
        while(!feof($fp)) {
            $Ligne = fgets($fp);// On récupère une ligne
            $vPage .= $Ligne;// On stocke l'ensemble des lignes dans une variable
        }
        
        fclose($fp); // On ferme le fichier
    }else {
        echo "Le fichier ne peut être lu...<br>";
    }
}else {
   echo "Désolé le fichier n'est pas valide<br>";
}
echo $vPage;

echo "<h3>Write : using fputs()</h3>";
$fp = fopen($Fichier,"a"); // ouverture du fichier en écriture >> append
fputs($fp, "\n"); // on va a la ligne
$vDate = date("Y-M-d H:i:s");
fputs($fp, "date maj : ".$vDate); // on écrit le nom et email dans le fichier
fclose($fp);

echo "add ".$vDate;

echo "<h3>Search replace</h3>";
$search = "#";
$replace = "<balise>#dsfa#</balise>";
$newfilename = $Fichier."_new.xml";
echo replace_file("./Files/", "myfile.xml", $search,$replace,"./Files/New/");

function replace_file($dir_path, $file_name, $string, $replace, $outputDirPath = null)
{
    set_time_limit(0);
    $path = $dir_path.$file_name;
    $new_path = $dir_path.date("Y-M-dHis").".xml";
    
    //Create dir
    if($outputDirPath !== null){
        if(!is_dir($outputDirPath)){//Verification
            mkdir($outputDirPath, 0777, true);
        }
        $new_path = $outputDirPath.date("Y-M-dHis").".xml";
    }
    
    if (is_file($path) === true)
    {
        $file = fopen($path, 'r');

        if (is_resource($file) === true)
        {
            while (feof($file) === false)
            {
                file_put_contents($new_path, str_replace($string, $replace, fgets($file)), FILE_APPEND);
            }

            fclose($file);
        }

        //unlink($path); //supprime le fichier source
    }

    //return rename($new_path, $path);
    return $path." | ".$new_path;
}