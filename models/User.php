<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class User implements \Serializable {
    public $name;
    public $email;
    public $password;
    
    function __construct(string $name, string $email, string $password) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function serialize() {
        return serialize([
            $this->name,
            $this->email,
            $this->password
        ]);
    }

    public function unserialize($serialized) {
        list(
            $this->name,
            $this->email,
            $this->password
        ) = unserialize($serialized);
    }

}

