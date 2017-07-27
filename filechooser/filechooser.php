<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
DEFINE('DIR_PATH', $_SERVER[ 'DOCUMENT_ROOT' ].dirname($_SERVER['PHP_SELF']));
DEFINE('DIR_ROOT', $_SERVER[ 'DOCUMENT_ROOT' ]);
$vError = "";
$vUploaded = false;
$vFile = "newfile";

echo DIR_PATH.'<br>';
echo DIR_ROOT.'<br>';
echo dirname(__FILE__);
print_r($_FILES).'<br>';
echo 'name '.$_FILES[$vFile]['name'].'<br>';
echo 'path '.$_FILES[$vFile]['tmp_name'].'<br>';

if ($_FILES[$vFile]['error']) {     
          switch ($_FILES[$vFile]['error']){     
                   case 1: // UPLOAD_ERR_INI_SIZE     
                   $vError = "Le fichier dépasse la limite autorisée par le serveur (fichier php.ini) !";     
                   break;     
                   case 2: // UPLOAD_ERR_FORM_SIZE     
                   $vError = "Le fichier dépasse la limite autorisée dans le formulaire HTML !"; 
                   break;     
                   case 3: // UPLOAD_ERR_PARTIAL     
                   $vError = "L'envoi du fichier a été interrompu pendant le transfert !";     
                   break;     
                   case 4: // UPLOAD_ERR_NO_FILE     
                   $vError = "Le fichier que vous avez envoyé a une taille nulle !"; 
                   break;     
          }     
}     
else {     
 // $_FILES['nom_du_fichier']['error'] vaut 0 soit UPLOAD_ERR_OK     
 // ce qui signifie qu'il n'y a eu aucune erreur 
    echo 'yes';
    if ((isset($_FILES[$vFile]['tmp_name'])&&($_FILES[$vFile]['error'] == UPLOAD_ERR_OK))) {     
    $chemin_destination = DIR_ROOT.'/MyTest/Files/';  
    echo $chemin_destination;
    move_uploaded_file($_FILES[$vFile]['tmp_name'], $chemin_destination.$_FILES[$vFile]['name']);     
    
    echo $_FILES[$vFile]['name']." : uploaded";
    }     
} 

if($vError !== ""){
    echo $vError."<br>";
}

?>
<label>Brochure File</label>
<form method="post" action="filechooser.php" enctype="multipart/form-data">     
    <input type="hidden" name="MAX_FILE_SIZE" value="2097152">     
    <input type="file" name="<?php echo $vFile ?>">    
    <input type="submit" value="Envoyer">    
</form>

   


