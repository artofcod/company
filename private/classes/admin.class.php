<?php


class Admin extends databaseObject
{
    static protected $table_name = "admin";
    static protected $db_columns = ['id','name','email','username','hashed_password',];


    public $id;
    public $name;
    public $email;
    public $username;
    protected $hashed_password;
    public $password;
    public $conform_password;
    protected $password_required = true;

    public function __construct($args=[])
    {  
        //i am using nullcolas operator but if its need to fallback
        //then php older version dosent support nullcolas after 5.4
        //for that time turnary is bettre.
        //$this->name = isset($args['name']) ? $args['name'] : '';
        $this->name = $args['name'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->username = $args['username'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->conform_password = $args['conform_password'] ?? '';

    }

    protected function set_hash_password()
    {
        $this->hashed_password = password_hash($this->password ,PASSWORD_BCRYPT);
    }

    public function verify_password($password)
    {
      return password_verify($password,$this->hashed_password);
    }

    protected function create()
    {
        $this->set_hash_password();
        return parent::create();
    }

    protected function update()
    {
        if($this->password !='')
        {
            $this->set_hash_password();
        }
        else
        {
            $this->password_required = false;
        }
        return parent::update();
    }
    
    protected function validate() {
        $this->errors = array();
    
        if(is_blank($this->name)) {
          $this->errors['error'] = ['name']["{Last name cannot be blank."];
        } elseif (!has_length($this->name, array('min' => 2, 'max' => 255))) {
          $this->errors[] =['name']["Last name must be between 2 and 255 characters."];
        }
    
        if(is_blank($this->email)) {
          $this->errors[] = "Email cannot be blank.";
        } elseif (!has_length($this->email, array('max' => 255))) {
          $this->errors[] = "Last name must be less than 255 characters.";
        } elseif (!has_valid_email_format($this->email)) {
          $this->errors[] = "Email must be a valid format.";
        }
    
        if(is_blank($this->username)) {
          $this->errors[] = "Username cannot be blank.";
        } elseif (!has_length($this->username, array('min' => 8, 'max' => 255))) {
          $this->errors[] = "Username must be between 8 and 255 characters.";
        } elseif(!has_unique_username($this->username , $this->id ?? 0)){
          $this->errors[] = "Username is not allowed.Try Anoher";
        }
    
        if($this->password_required) {
          if(is_blank($this->password)) {
            $this->errors[] = "Password cannot be blank.";
          } elseif (!has_length($this->password, array('min' => 8))) {
            $this->errors[] = "Password must contain 12 or more characters";
          } elseif (!preg_match('/[A-Z]/', $this->password)) {
            $this->errors[] = "Password must contain at least 1 uppercase letter";
          } elseif (!preg_match('/[a-z]/', $this->password)) {
            $this->errors[] = "Password must contain at least 1 lowercase letter";
          } elseif (!preg_match('/[0-9]/', $this->password)) {
            $this->errors[] = "Password must contain at least 1 number";
          } elseif (!preg_match('/[^A-Za-z0-9\s]/', $this->password)) {
            $this->errors[] = "Password must contain at least 1 symbol";
          }
    
          if(is_blank($this->conform_password)) {
            $this->errors[] = "Confirm password cannot be blank.";
          } elseif ($this->password !== $this->conform_password) {
            $this->errors[] = "Password and confirm password must match.";
          }
        }
            print_r ($this->errors);
         return $this->errors;
        // die();
      }

  
  static public function find_by_username($username)
   {
    $sql = "select * from ". static::$table_name." ";
    $sql .= " where username = '". self::$database->escape_string($username) ."'";
    $obj_array = static::find_by_sql($sql);
    if(!empty($obj_array))
    {
        return array_shift($obj_array);
    }else{
        return false;
    }
   }  
    

}

?>