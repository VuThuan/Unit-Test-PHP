<?php

/**
 * An example User class
 */
class User
{
    /**
     * Email address
     * @var string
     */
    public $email;

    //protected $mailer;

    // protected $mailer_callable;

    /**
     * Constructor
     * 
     * @param string $email The email address
     * @return void
     */
    public function __construct(string $email)
    {
        $this->email = $email;
    }

    // public function setMailer(Mailer $mailer)
    // {
    //     $this->mailer = $mailer;
    // } option 1

    // public function setMailerCallable(callable $mailer_callable)
    // {
    //     $this->mailer_callable = $mailer_callable;
    // } OPTION 2

    /**
     * Send the user a message
     * 
     * @param string $message The message
     * @return boolean 
     */
    public function notify(string $message)
    {
        // return $this->mailer->send($this->email, $message); option 1

        //option 2
        // return call_user_func($this->mailer_callable, $this->email, $message);

        return Mailer::send($this->email, $message);
    }
}
