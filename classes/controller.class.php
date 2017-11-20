<?php

/*  Der Bauplan zum Controller (die Klasse). */

class Controller {
 
/*  Variablen (leere) für die Objekte definieren */
    private $template;
	private $view;
	private $data;
    private $model;
    private $temp;
 
/*  Der Konstruktur wird immer beim instanziieren automatisch ausgeführt */
	public function __construct(){
        /* Sobald der Controller instanziiert wird, wird auch ein View Objekt erstellt. */
		$this->view = new View();
        $this->model = new Model();
        
        /* Hier wird ohne die Instanziierung eine Konstante aus dem Model abgerufen. */
		//$this->data = Model::getData();
	}
    
    public function getData() {
        $this->temp = $this->model->getAll('help_topic');
        $this->data = $this->model->encodeJSON($this->temp);
        //echo $this->data;
        return $this->data;
    }

	    
/*  Dies ist eine Methode die innerhalb jedes Controller Objekts aufgerufen werden kann. */
	public function display(){
    /*  Dieser Teil gehört zum Templating und wird separat bearbeitet.
        $this bezieht sich auf 'ich, das Objekt selbst' -> view spricht die Variable $view an und setContent etc. ist die Methode innerhalb eines View Objekts */
		$this->view->setTemplate();
		$this->view->setContent("title", "OOP mit PHP");
		$this->view->setContent("content", $this->data);
		$this->view->setContent("footer", "&copy 2011 by mausernetwork\n");
 
		return $this->view->parseTemplate();
	}
 
}
?>