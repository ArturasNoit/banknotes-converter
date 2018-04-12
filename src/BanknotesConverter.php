<?php

class BanknotesConverter
{

    protected static $denominations = [500, 200, 100, 50, 20, 10, 5, 1];

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

    private function guardAgainstInvalidAmount($amount)
    {
        if (!is_numeric($amount ) || is_float($amount + 0)) throw new InvalidArgumentException("Amount provided is not valid: {$amount}");
    }

    private function guardAgainstNegativeAmount($amount)
    {
        if ($amount < 0) throw new InvalidArgumentException("Negative amount provided: {$amount}");
    }

    private function removeWhitespaces($amount)
    {
        if (is_string($amount)) {
          return preg_replace('/\s+/', '', $amount);
        }else {
          return $amount;
        }
    }


}
