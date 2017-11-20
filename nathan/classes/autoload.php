<?php

/* In PHP kann man kann eine __autoload() Funktion definieren, die automatisch aufgerufen wird, falls man versucht eine noch nicht definierte Klasse oder ein nicht definiertes Interface zu benutzen. Diese __autoload() Funktion befindet sich in unserem Fall in dieser autoload.class.php Datei. */

function __autoload ($classe){

/*  Die Funktion __autoload($parm) erwartet einen Parameter, den Klassennamen. 
    Hier wird dieser in Kleinbuchstaben umgewandelt. Empfange wurde z.B Controller, daraus wurde dann  controller. */
	$class = strtolower($classe); 
    
/*  Anschliessend wird der Dateiname der Datei zusammengesetzt, die zur gewünschen Klasse gehört. */
	$class = $class.'.php';

/*  Als erstes prüfen wir ob diese Datei vorhanden ist, falls JA, beziehen wir den Inhalt mit ein. */
	if(file_exists(BASEPATH.DIRECTORY_SEPARATOR.'classes' .DIRECTORY_SEPARATOR.$class)){
		include(BASEPATH.DIRECTORY_SEPARATOR.'classes' .DIRECTORY_SEPARATOR.$class);
	}
/*  An dieser Stelle wurde ein INCLUDE der Datei classes/controller.class.php durchgeführt .*/

/*  Echo Ausgaben zu Testzwecken */
    echo $classe.': '.$class.'<br/><br/>';

}
?>