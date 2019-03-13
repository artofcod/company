<?php

class Contact extends databaseObject
{

    //-----------START OF ACTIVe RECORD-----------//
    static protected $table_name = "contact" ;
    static protected $db_columns = ['id', 'date', 'name', 'email','subject','message'];

   

    public $id;
    public $date;
    public $name;
    public $email;
    public $subject;
    public $message;

    public function __construct($args=[])
    {
        //i am using nullcolas operator but if its need to fallback
        //then php older version dosent support nullcolas after 5.4
        //for that time turnary is bettre.
        //$this->name = isset($args['name']) ? $args['name'] : '';
        $this->date = $args['date'] ?? '';
        $this->name = $args['name'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->subject = $args['subject'] ?? '';
        $this->message = $args['message'] ?? '';
    }

    public function name()
    {
        return "{$this->name} at date {$this->date}";
    }

}

?>
