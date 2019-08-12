<?php

/**
 * Item 
 * 
 * An example item class
 */
class Item
{
    /**
     * Get the description
     * 
     * @return integer A random integer
     */
    public function getDesription()
    {
        return $this->getID() . $this->getToken();
    }

    /**
     * Get A random ID
     * 
     * @return interger The ID
     */
    private function getID()
    {
        return rand();
    }

    /**
     * GET a random Token
     * 
     * @return string THe token
     */
    private function getToken()
    {
        return uniqid();
    }
}
