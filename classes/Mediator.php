<?php

abstract class Mediator{
    public abstract function sendMessage($message,$connection);
    public abstract function addUser($user);
}




?>
