<?php

namespace App\Exceptions;

use Exception;

class NotAuthorizedException extends Exception
{
    protected $route;

    protected $message;

    public function redirectTo($route, $message) {
        $this->route = $route;

        $this->message = $message;
        
        return $this;
    }
    
    public function route() {
        return $this->route;
    }

    public function message() {
        return $this->message;
    }

}