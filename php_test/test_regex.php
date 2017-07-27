<?php
/**
 * Created by PhpStorm.
 * User: rs
 * Date: 19/07/2017
 * Time: 15:40
 */
$vContenuSmsRetour = "sdafa \n\t \n dsfa\v dé @ DFa\tfagdfajoaf < 2439286 > / *($}{ <> =+ ";
//$vNoMetaChar = preg_replace("@£$¥èéùìòÇ\fØø\nÅåΔ_ΦΓΛΩΠΨΣΘΞÆæßÉ !\"#¤%&'()*+,-./:;<=>\?¡[A-Z]ÄÖÑÜ§¿[a-z]äöñüà\^\{\}\[~\]\|€", '', $vContenuSmsRetour);
$vNoMetaChar = preg_replace("/[^\sa-zA-Z0-9#¤%&€@£$¥èéùìòÇäöñüàØøÅåΔ_ΦΓΛΩΠΨΣΘΞÆæßÉ¡ÄÖÑÜ§¿!'()*+,-.:;<=>\?\^\{\}\[~\]\|]/", '', $vContenuSmsRetour);
//$vNoMetaChar = preg_replace('/(\\\\n)/', ' ', $vContenuSmsRetour);
$vNoMetaChar2 = str_replace(array("\n", "\r","\t","\v"), "",$vContenuSmsRetour);
echo "ONe ".$vNoMetaChar;
echo "Two ".$vNoMetaChar2;
$adf = 1;