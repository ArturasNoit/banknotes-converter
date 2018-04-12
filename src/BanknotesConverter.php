<?php

class BanknotesConverter
{

    protected static $denominations = [500, 200, 100, 50, 20, 10, 5, 1];

    public function minCount($amount)
    {
      $amount = preg_replace('/\s+/', '', $amount);
      if ($amount < 0) throw new InvalidArgumentException("Negative amount provided: {$amount}");
      if (!is_numeric($amount ) || is_float($amount + 0)) throw new InvalidArgumentException("Amount provided is not valid: {$amount}");

      $minCount = 0;

      for ($i=0; $i <count(self::$denominations) ; $i++) {


        while ($amount > 0) {

          if ($amount >= self::$denominations[$i]) {
            $amount -= self::$denominations[$i];
            $minCount += 1;
          } else {
            break;
          }

        }
      }

        return $minCount;
    }


}
