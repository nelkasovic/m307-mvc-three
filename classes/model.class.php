<?php
class Model{
    private $database;
    
	public function __construct(){
    /*  Hier kann z.B. die Verbindung zur Datenbank aufgebaut werden. */

	}
    
	public static function getData(){
        return "Das Model gibt diese Daten an den Controller zur&uuml;ck :)";
	}
    
    public static function encodeJSON($array) {
        return json_encode($array);
    }
    
    public static function decodeJSON($array) {
        return json_decode($array);
    }
    
    public static function getAll($table) {
 
        // Build database query
        $sql = 'SELECT * FROM '.$table;
         
        // Return objects
        return self::getBySql($sql);
    }    
    
    public static function getBySql($sql) {
        // Open database connection
        $database = new Database();
                 
        // Execute database query
        $result = $database->query($sql);
         
        // Initialize object array
        $objects = array();
         
        // Fetch objects from database cursor
        while ($object = $result->fetch_object()) {
            $objects[] = $object;
        }
         
        // Close database connection
        $database->close();
 
        // Return objects
        return $objects;    
    }    
    
    public static function getById($table, $id) {
     
        // Build database query
        $sql = 'SELECT * FROM '.$table.' WHERE id = ?';
         
        // Open database connection
        $database = new Database();
         
        // Get instance of statement
        $statement = $database->stmt_init();
         
        // Prepare query
        if ($statement->prepare($sql)) {
             
            // Bind parameters
            $statement->bind_param('i', $id);
             
            // Execute statement
            $statement->execute();
             
            // Bind variable to prepared statement
            $statement->bind_result($id, $title, $content, $created);
             
            // Populate bind variables
            $statement->fetch();
         
            // Close statement
            $statement->close();
        }
         
        // Close database connection
        $database->close();
         
        // Build new object
        $object = new self;
        $object->id = $id;
        $object->title = $title;
        $object->content = $content;
        $object->created = $created;
        return $object;
    }
     
    public function insertData() {
         
        // Initialize affected rows
        $affected_rows = FALSE;
     
        // Build database query
        $sql = "insert into post (title, content) values (?, ?)";
         
        // Open database connection
        $database = new Database();
         
        // Get instance of statement
        $statement = $database->stmt_init();
         
        // Prepare query
        if ($statement->prepare($sql)) {
             
            // Bind parameters
            $statement->bind_param('ss', 
                $this->title, $this->content);
             
            // Execute statement
            $statement->execute();
             
            // Get affected rows
            $affected_rows = $database->affected_rows;
                 
            // Close statement
            $statement->close();
        }
         
        // Close database connection
        $database->close();
 
        // Return affected rows
        return $affected_rows;          
    }
 
    public function updateData($table) {
     
        // Initialize affected rows
        $affected_rows = FALSE;
     
        // Build database query
        $sql = 'UPDATE '.$table.' set title = ?, content = ? WHERE id = ?';
        
        // Open database connection
        $database = new Database();
         
        // Get instance of statement
        $statement = $database->stmt_init();
         
        // Prepare query
        if ($statement->prepare($sql)) {
             
            // Bind parameters
            $statement->bind_param('ssi', 
                $this->title, $this->content, $this->id);
             
            // Execute statement
            $statement->execute();
             
            // Get affected rows
            $affected_rows = $database->affected_rows;
                 
            // Close statement
            $statement->close();
        }
         
        // Close database connection
        $database->close();
 
        // Return affected rows
        return $affected_rows;          
 
    }
 
    public function deleteData($table, $id) {
 
        // Initialize affected rows
        $affected_rows = FALSE;
     
        // Build database query
        $sql = 'DELETE FROM '.$table.' WHERE id = '.$id;
         
        // Open database connection
        $database = new Database();
         
        // Get instance of statement
        $statement = $database->stmt_init();
         
        // Prepare query
        if ($statement->prepare($sql)) {
             
            // Bind parameters
            $statement->bind_param('i', $this->id);
             
            // Execute statement
            $statement->execute();
             
            // Get affected rows
            $affected_rows = $database->affected_rows;
                 
            // Close statement
            $statement->close();
        }
         
        // Close database connection
        $database->close();
 
        // Return affected rows
        return $affected_rows;          
     
    }    
}
?>