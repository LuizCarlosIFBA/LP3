<?php
  class CheckingAccount {

    public function __construct
    (
      private string $number,
      private float $balance,
      private bool $isSpecial,
      private float $limit
    ) {}

      private function trueLimit(): float {
        return $this->limit * -1;
      }

      public function deposit(float $value) {
        $this->balance += $value;

        return $this->balance;
      }

      public function withdraw(float $value) {
        $newValue = $this->balance - $value;

        if ($newValue < 0 || $newValue < $this->trueLimit())
          throw new Exception("value to be withdraw can't be greater than current balance or limit");
      
        $this->balance = $newValue;

        return $this->balance;
      }

      /**
       * Get the value of number
       */
      public function getNumber()
      {
            return $this->number;
      }

      /**
       * Set the value of number
       */
      public function setNumber($number) : self
      {
            $this->number = $number;

            return $this;
      }

      /**
       * Get the value of balance
       */
      public function getBalance()
      {
            return $this->balance;
      }

      /**
       * Set the value of balance
       */
      public function setBalance($balance) : self
      {
            $this->balance = $balance;

            return $this;
      }

      /**
       * Get the value of isSpecial
       */
      public function getIsSpecial()
      {
            return $this->isSpecial;
      }

      /**
       * Set the value of isSpecial
       */
      public function setIsSpecial($isSpecial) : self
      {
            $this->isSpecial = $isSpecial;

            return $this;
      }

      /**
       * Get the value of limit
       */
      public function getLimit()
      {
            return $this->limit;
      }

      /**
       * Set the value of limit
       */
      public function setLimit($limit) : self
      {
            $this->limit = $limit;

            return $this;
      }
  }
?>