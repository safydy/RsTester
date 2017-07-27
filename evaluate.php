<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$a = "1234567  ";
$str =  'This is <?php echo "test"; ?> ! afaf ';
$str2 = <<<EOD
   <?<?php echo rand(10,100); ?>
   fdaffafd <?php echo "test"; ?> dfafafa
        dfaf
        ss tests f $a
        <?php echo $a ?>
        dfa
        {$_SERVER['REQUEST_URI']} aadfa
EOD;
        
$script = <<<EOD
<!-- Piwik tre-->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//41.77.23.82:8056/kiwip-inh/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', 2]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
<?php echo "oipip 3333333";?>
</script>
        $a
<?php echo "dfa ada adfaff";?>
<noscript><?php echo "dfaf";?><p><img src="//41.77.23.82:8056/kiwip-inh/piwik.php?idsite=2&rec=1&action_name=Test No script&url={$_SERVER['REQUEST_URI']}" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code ... &rec=1&url={$_SERVER['REQUEST_URI']} -->
EOD;
        
$script = preg_replace ( '/\s+(\r\n|\r|\n)/', '$1', $script );

$pi = 3.14;
$str3 = "url={$_SERVER['REQUEST_URI']}&test_variable=$this->$current_pageurl&pi=$pi 1+1";
/*
eval($str); // outputs test
eval('?>'.$str.'<?php;'); // outputs test
eval('?>'.$str.'<?'); // outputs test
eval('?>'.$str.'<?php');// throws syntax error - unexpected $end 
 * 
 * 
 * $result = eval('?>'.$script); // outputs test
 * eval("\$result = '?>'.$str2;"); // outputs test
 * eval('$str2 = "?>".$str2."<?php";');
 * eval($result = '?>'.$str2); // outputs test
*/

/*
$str2 = str_replace("?>", "", $str2);
$str2 = str_replace("<?php", "", $str2);
$str2 = str_replace("echo", "", $str2);
eval('$str2 = $str2;');
print_r($str2);
 * 
 */
$str2 = '?'.$str2;



eval("\$result = \$str3;"); // outputs test
//print_r($result);

echo base64_decode($result)."<br>";
echo base64_encode($result)."<br>";
echo html_entity_decode($result);
echo htmlentities($result);
echo $result;