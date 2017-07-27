<?php
    //$vId = (isset($_POST['id'])?$_POST['id'][0]:"");
    //print_r($HTTP_POST_VARS);
    $vIdList = (isset($_POST['id_list'])?$_POST['id_list']:"");
    $tId = (isset($_POST['id'])?$_POST['id']:array("2"));
    print_r($tId) ;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
    "http://www.w3.org/TR/html4/strict.dtd"
    >
<html lang="en">
<head>
    <title><!-- Insert your title here --></title>
    <link rel="stylesheet" type="text/css" href="css/ui.dropdownchecklist.standalone.css">
    <link rel="stylesheet" type="text/css" href="css/smoothness-1.8.13/jquery-ui-1.8.13.custom.css">
    <link rel="stylesheet" type="text/css" href="css/content.css">
    <script type="text/javascript" src="classes/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="classes/jquery-ui-1.10.2.custom.js"></script>
    <script type="text/javascript" src="classes/ui.dropdownchecklist.js"></script>
    <style>
      .ui-dropdownchecklist-text{
        font-size: 12px;
      }
    </style>
</head>
<script type="text/javascript">
    $(document).ready(function() {
        $("#id").dropdownchecklist({ icon: {}, width: 150},{
            
            onItemClick: function(checkbox, selector){
                    var values = "";
                    var newText = '';
                    var justChecked = checkbox.prop("checked");
                    var index = checkbox.attr("index");
                    blackIndex = -1;
                    if(!justChecked){
                        blackIndex = index;
                    }else{
                        newText = selector.options[index].value;
                    }
                    for( i = 0; i < selector.options.length; i++ ){
                            if (selector.options[i].selected && (selector.options[i].value != "") && i!= blackIndex){
                                    if ( newText != "" )
                                            newText += ",";
                                    newText += selector.options[i].value;
                            }
                    }
                    $("#id_list").val(newText);
                    alert("yes");
                    
            },
            onComplete: function(selector){
                var newText = "";
                for( i=0; i < selector.options.length; i++ ) {
                    if (selector.options[i].selected && (selector.options[i].value != "")) {
                            if ( newText != "" ) newText += "_";
                            newText += selector.options[i].value;
                    }
                }
                $("#id_list").val(newText);
            }
            
        });
    });
</script>
<body>
    <form name="fForm" id="fForm" action="index2.php" method="post">
        <input type="hidden" id="id_list" name="id_list" value="<?php echo $vIdList ?>">
        <select name="id[]" id="id" multiple="multiple" style="font-size: 10pt;">
            <?php
                for($i=1;$i<10;$i++){                    
            ?>
            <option value="<?php echo $i ?>" <?php echo (in_array($i."",$tId,true)?"selected=\"selected\"":"") ?>>
                Valeur <?php echo $i ?>
            </option>
            <?php
                }
            ?>
            
        </select>
        <br>
            <input type="submit" name="btn_submit" value="Voir">
    </form>
</body>
</html>
