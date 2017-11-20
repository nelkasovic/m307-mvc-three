<?php
class View{
 
	private $path       = 'templates';
	private $template;
	private $content    = array();
 
	public function setContent($key, $value){
		$this->content[$key] = $value;
	}
 
 
	public function setTemplate($template = 'default'){
		$this->template = $this->path . DIRECTORY_SEPARATOR . $template . '.tpl.php';
	}
 
 
	public function parseTemplate(){
 
		if(file_exists($this->template)){
 
			ob_start(); 
            /*
            ob_start — Ausgabepufferung aktivieren
            
            Diese Funktion aktiviert die Ausgabepufferung. Während die Ausgabepufferung aktiv ist werden Scriptausgaben (mit Ausnahme von Headerinformationen) nicht direkt an den Client weitergegeben sondern in einem internen Puffer gesammelt.
            */
            
			include $this->template;
            //Templatedatei einbeziehen aus $template
            
			$output = ob_get_contents();
            //ob_get_contents — Gibt den Inhalt des Ausgabepuffers ohne Löschung zurück.
            
			ob_end_clean();
            /*
            ob_end_clean — Löscht den Ausgabe-Puffer und deaktiviert die Ausgabe-Pufferung
            
            Der Inhalt des Ausgabepuffers (sofern vorhanden) wird verworfen und der Ausgabepuffer (aber nur dieser) wird deaktiviert. Falls sie mit dem Puffer-Inhalt weiter arbeiten möchten, müssen sie diesen erst per ob_get_contents() zwischen speichern bevor sie ob_end_clean() aufrufen, da dadurch der Puffer geleert wird.
            */
 
			return $output;
		}
		return "Kann das Template ".$this->template." nicht finden";
	}
}
?>