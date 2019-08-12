<?php

use PHPUnit\Framework\Constraint\Exception;

/**
 * Mailer
 * 
 * Send Messages
 */

class Mailer
{
    /**
     * Send a Message
     * 
     * @param string $email The mail address
     * @param string $message The message
     * 
     * @return boolean True if sent, false otherwise
     */
    function sendMessage($email, $message)
    {
        // if (empty($email)) {
        //     throw new Exception;
        // }

        //Use mail() or PHPMailer for example
        sleep(3);

        echo "send '$message' to '$email' ";

        return true;
    }
}
