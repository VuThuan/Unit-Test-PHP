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
    protected function getID()
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

    /**
     * Get a random token with a specified prefix
     * 
     * @param string $prefix token prefix
     * @return string The token
     */
    private function getPrefixedToken($prefix)
    {
        return uniqid($prefix);
    }
}
