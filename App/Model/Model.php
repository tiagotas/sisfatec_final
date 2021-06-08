<?php

namespace App\Model;

abstract class Model
{
    protected static $dao;  
    
    public $rows;
    public $rows_count;

    public $success_message;
    public $error_message;
}