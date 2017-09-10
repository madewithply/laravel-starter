<?php

namespace App\Services\Money;

use Money\Currencies\ISOCurrencies;
use Money\Formatter\DecimalMoneyFormatter;
use Money\Formatter\IntlMoneyFormatter;
use Money\Money;
use NumberFormatter;

class MoneyFormatter
{

    private $currencies;
    private $numberFormatter;
    private $intlMoneyFormatter;

    /**
     * MoneyFormatter constructor.
     */
    public function __construct()
    {
        $this->currencies = new ISOCurrencies();
        $this->numberFormatter = new NumberFormatter('en_AU', NumberFormatter::CURRENCY);
        $this->intlMoneyFormatter = new IntlMoneyFormatter($this->numberFormatter, $this->currencies);
    }

    /**
     * @param Money $min
     * @param Money $max
     * @return string
     */
    public function generatePriceRangeString($min, $max)
    {

        $min_value = $min->getAmount();
        $max_value = $max->getAmount();

        if ($min_value == 0) {
            $min = null;
        }

        if ($max_value == 0) {
            $max = null;
        }

        if ($min && $max) {
            return $this->format($min) . " - " . $this->format($max);
        } elseif ($min && !$max) {
            return "> " . $this->format($min);
        } elseif (!$min && $max) {
            return "< " . $this->format($max);
        } else {
            return "";
        }

    }

    /**
     * @param Money $money
     * @return string
     */
    public function format($money)
    {
        return $this->intlMoneyFormatter->format($money);
    }

    /**
     * Format the Money into a decimal. e.g. 100cents to 1.00 dollars
     * @param Money $money
     * @return string
     */
    public function formalToDecimal($money)
    {
        $moneyFormatter = new DecimalMoneyFormatter($this->currencies);
        return $moneyFormatter->format($money);
    }

    /**
     * @param Money $money
     * @return string
     */
    public function formatWithoutDecimal($money)
    {
        $valueWithDecimal = $this->intlMoneyFormatter->format($money);
        return substr($valueWithDecimal, 0, strpos($valueWithDecimal, "."));
    }

}