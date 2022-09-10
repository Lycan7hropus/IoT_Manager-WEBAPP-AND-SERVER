<?php
class Sensor
{
    public $id;
    public $sensor_id;
    public $sensor_name;
    public $user_login;
    public $is_owner;

    public function __construct(string $id, string $sensor_id,  string $sensor_name,  string $user_login, string $is_owner) {
        $this->id = $id;
        $this->sensor_id = $sensor_id;
        $this->sensor_name = $sensor_name;
        $this->user_login = $user_login;
        $this->is_owner = $is_owner;
   
    }
    
}



?>