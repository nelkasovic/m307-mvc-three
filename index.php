<?php

/*  define —> Definiert eine benannte Konstante.
    Hier wird eine Konstante BASEPATH mit dem aktuellen Pfad der index.php Datei definiert. */

    define ('BASEPATH', realpath(dirname(__FILE__)));
    echo BASEPATH.'<br/><br/>';
    
/*  Hier wird die autoload.class.php Datei einbezogen.
    Man kann eine __autoload() Funktion definieren, die automatisch aufgerufen wird, falls man versucht eine noch nicht definierte Klasse oder ein nicht definiertes Interface zu benutzen. Diese __autoload() Funktion befindet sich in unserem Fall in der autoload.class.php Datei. */

/*  DIRECTORY_SEPARATOR ist eine der vordefinierten PHP Konstanten
    http://php.net/manual/de/dir.constants.php */
    echo DIRECTORY_SEPARATOR.'<br/><br/>';

    include(BASEPATH.DIRECTORY_SEPARATOR.'classes' .DIRECTORY_SEPARATOR.'autoload.class.php');

/*  Zusammengesetzter Pfad zur autoload.class.php Datei */
    echo BASEPATH.DIRECTORY_SEPARATOR.'classes' .DIRECTORY_SEPARATOR.'autoload.class.php<br/><br/><br/>';
    
/*  Klasse Controller wird instanziiert, ein Objekt wird erstellt. */
    $controller = new Controller();
    $router = new Router($controller);
    $dispatcher = new Dispatcher($router);

    $router->get('test', function() {
        echo 'test';
    });

    //$router->post('bar', function() { echo "POST bar\n"; });
    //$router->get('help', $controller->getData());

    $dispatcher->handle(new Request('GET', 'test'));
    //$dispatcher->handle(new Request('POST', 'bar'));
    //$dispatcher->handle(new Request('GET', 'help'));

/*  Die Methode display(); im Controller wird aufgerufen */
    echo $controller->display();
?>