<?php


class databaseObject
{
    static protected $database;
    static protected $table_name = "";
    static protected $db_columns = [];
    public $errors = [];

    static public function set_database($database)
    {
        self::$database = $database;
    }

    static public function find_by_sql($sql)
    {
        $result = self::$database->query($sql);
        if(!$result)
        {
            exit('database query failed'); 
        }

        //convert results into object
        $object_array =[];
        while($record = $result->fetch_assoc())
        {
            $object_array[] = static::instanciate($record);
        }
        $result->free();

        return $object_array;
    }

    static public function find_all()
    {
        $sql = "SELECT * FROM " .static::$table_name;
        return static::find_by_sql($sql);
    }

    static public function find_by_id($id)
    {
        $sql = "select * from ". static::$table_name." ";
        $sql .= " where id = '". self::$database->escape_string($id) ."'";
        $obj_array = static::find_by_sql($sql);
        if(!empty($obj_array))
        {
            return array_shift($obj_array);
        }else{
            return false;
        }    
    }

    static protected function instanciate($record)
    {
        $object = new static;
        //could use manual assign values to properties
        //but automaically assignement is easier and re-usable than manual.
        foreach($record as $property => $value)
        {
            if(property_exists($object,$property))
            {
                $object->$property = $value;
            }
        }
        return $object;
    }

    protected function validate() {
        $this->errors = [];

        //add custom validation.

        return $this->errors;
      }

    protected function create() {
      $this->validate();
      if(!empty($this->errors)) { return false; }

        $attributes = $this->sanitized_attributes();
        $sql = "INSERT INTO ". static::$table_name." (";
        $sql .= join(', ', array_keys($attributes));
        $sql .= ") VALUES ('";
        $sql .= join("', '", array_values($attributes));
        $sql .= "')";
        $result = self::$database->query($sql);
        if($result) {
          $this->id = self::$database->insert_id;
        }
        return $result;
      }

    protected function update() {
      $this->validate();
      if(!empty($this->errors)) { return false; }
      
        $attributes = $this->sanitized_attributes();
        $attribute_pairs = [];
        foreach($attributes as $key => $value) {
          $attribute_pairs[] = "{$key}='{$value}'";
        }
    
        $sql = "UPDATE ". static::$table_name." SET ";
        $sql .= join(', ', $attribute_pairs);
        $sql .= " WHERE id='" . self::$database->escape_string($this->id) . "' ";
        $sql .= "LIMIT 1";
        $result = self::$database->query($sql);
        return $result;
    }

    public function save() {
        // A new record will not have an ID yet
        if(isset($this->id)) {
          return $this->update();
        } else {
          return $this->create();
        }
      }

    public function marge_attribuites($args=[])
    {
        foreach($args as $key => $value)
        {
            if(property_exists($this,$key) && !is_null($value))
            {
                $this->$key = $value;
            }      
        }
    }

    // Properties which have database columns, excluding ID
    public function attributes() {
        $attributes = [];
        foreach(static::$db_columns as $column) {
           if($column == 'id') { continue; }
          $attributes[$column] = $this->$column;
        }
        return $attributes;
      }
    
    protected function sanitized_attributes() {
        $sanitized = [];
        foreach($this->attributes() as $key => $value) {
          $sanitized[$key] = self::$database->escape_string($value);
        }
        return $sanitized;
      }

      public function delete() {
        $sql = "DELETE FROM ". static::$table_name." ";
        $sql .= "WHERE id='" . self::$database->escape_string($this->id) . "' ";
        $sql .= "LIMIT 1";
        $result = self::$database->query($sql);
        return $result;
    
        // After deleting, the instance of the object will still
        // exist, even though the database record does not.
        // This can be useful, as in:
        //   echo $user->first_name . " was deleted.";
        // but, for example, we can't call $user->update() after
        // calling $user->delete().
      }

}