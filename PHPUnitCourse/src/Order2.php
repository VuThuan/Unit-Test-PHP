<?php

class Order2
{
    /**
     * QUanlity
     * 
     * @var int
     */
    public $quanlity;

    /**
     * Unit price
     * 
     * @var float
     */
    public $unit_price;

    /**
     * amount
     * 
     * @var float
     */
    public $amount;

    /**
     * COnstructor
     * 
     * @param int $quanlity QUanlity
     * @param float $unit_price Unit Price
     * 
     * @return void
     */
    public function __construct(int $quanlity, float $unit_price)
    {
        $this->quanlity = $quanlity;
        $this->unit_price = $unit_price;

        $this->amount = $quanlity * $unit_price;
    }

    public function process(PaymentGateway $gateway)
    {
        $gateway->charge($this->amount);
    }
}
