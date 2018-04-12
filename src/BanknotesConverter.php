<?php

class BanknotesConverter
{
    /**
     * Static denomination of banknotes with different values
     *
     * @var array
     */
    protected static $denominations = [500, 200, 100, 50, 20, 10, 5, 1];

    /**
     * Converts minimum amount of denominations needed
     *
     * @param  string|int $amount Amount of banknots to convert
     * @return int         minimum denominations count for given amount
     */
    public function minCount($amount)
    {
      $amount = $this->removeWhitespaces($amount);
      $this->guardAgainstNegativeAmount($amount);
      $this->guardAgainstInvalidAmount($amount);

      $minCount = 0;

      for ($i=0; $i <count(self::$denominations) ; $i++) {

          while ($amount >= self::$denominations[$i]) {
            $amount -= self::$denominations[$i];
            $minCount += 1;
          }

      }

        return $minCount;
    }

    /**
     * Checks if amount is numeric and not float
     *
     * @param  string|int $amount
     * @throws InvalidArgumentException
     */
    private function guardAgainstInvalidAmount($amount)
    {
        if (!is_numeric($amount ) || is_float($amount + 0)) throw new InvalidArgumentException("Amount provided is not valid: {$amount}");
    }

    /**
     * Checks if amount is not negative values
     *
     * @param  string|int $amount
     * @throws InvalidArgumentException
     */
    private function guardAgainstNegativeAmount($amount)
    {
        if ($amount < 0) throw new InvalidArgumentException("Negative amount provided: {$amount}");
    }

    /**
     * Removes whitespaces of given amount if it's a string
     *
     * @param  string|int $amount
     * @return int         
     */
    private function removeWhitespaces($amount)
    {
        if (is_string($amount)) {
          return preg_replace('/\s+/', '', $amount);
        }else {
          return $amount;
        }
    }


}
