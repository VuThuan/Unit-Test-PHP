<?php

class ItemChild extends Item
{
    public function getID()
    {
        return parent::getID(); //protected
    }

    public function getToken()
    {
        return parent::getToken(); //Error because it is private method
    }
}
