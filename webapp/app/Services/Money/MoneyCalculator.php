<?php

namespace App\Services\Money;

use Money\Money;

class MoneyCalculator
{

    protected $taxPercentage;

    /**
     * MoneyCalculator constructor.
     * @param $taxPercentage
     */
    public function __construct($taxPercentage = 10)
    {
        $this->taxPercentage = $taxPercentage;
    }


    /**
     * @param mixed $value
     * @return Money
     */
    public function initialiseMoney($value = 0)
    {
        return Money::AUD($value);
    }

    /**
     * @param Money $amountExcludingTax
     * @return Money
     */
    public function addTax($amountExcludingTax)
    {
        return $amountExcludingTax->add($this->calculateTaxComponent($amountExcludingTax));
    }

    /**
     * @param Money $amountExcludingTax
     * @return Money
     */
    public function calculateTaxComponent($amountExcludingTax)
    {
        return $this->calculatePercentageFeeValue($amountExcludingTax, $this->taxPercentage);
    }

    /**
     * @param Money $amount
     * @param float $fee_percentage
     * @return Money
     */
    public function calculatePercentageFeeValue($amount, $fee_percentage)
    {
        $multiplyFactor = $fee_percentage / 100;
        return $amount->multiply($multiplyFactor);
    }


    /**
     * @param Money $amount
     * @param float $fee_percentage
     * @return Money
     */
    public function amount($amount, $fee_percentage)
    {
        return $amount;
    }

    /**
     * @param Money $amount
     * @param $fee_percentage
     * @return Money
     */
    public function addPercentageFee($amount, $fee_percentage)
    {
        $fee = $this->calculatePercentageFeeValue($amount, $fee_percentage);
        return $amount->add($fee);
    }

}