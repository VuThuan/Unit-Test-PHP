<?php

class User
{
    /**
     * @var string
     */
    public $firstName;

    /**
     * @var string
     */
    public $surname;

    public $email;

    /**
     * @return string
     */
    function getFullName()
    {
        return trim("$this->surname $this->firstName");
    }

    protected $mailer;

    /**
     * Set the email dependency
     * 
     * @param Mailer $mailer The Mailer object
     */
    public function setMailer(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Send the user a message
     * 
     * @param string $message The message
     * 
     * @return bollean True if sent, false otherwise
     */
    public function notify($meesage)
    {
        return $this->mailer->sendMessage($this->email, $meesage);
    }
}
