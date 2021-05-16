<?php

  class Medicine {

    public function __construct(
      private string $name,
      private float $price,
      private string $activeIngredient
    ) {}

    public function canBeChangedBy(Medicine $med) {
      return $this->activeIngredient == $med->getActiveIngredient();
    }  
  
    /**
     * Get the value of name
      */
    public function getName()
    {
          return $this->name;
    }

    /**
     * Set the value of name
      */
    public function setName($name) : self
    {
          $this->name = $name;

          return $this;
    }

    /**
     * Get the value of price
      */
    public function getPrice()
    {
          return $this->price;
    }

    /**
     * Set the value of price
      */
    public function setPrice($price) : self
    {
          $this->price = $price;

          return $this;
    }

    /**
     * Get the value of activeIngredient
      */
    public function getActiveIngredient()
    {
          return $this->activeIngredient;
    }

    /**
     * Set the value of activeIngredient
      */
    public function setActiveIngredient($activeIngredient) : self
    {
          $this->activeIngredient = $activeIngredient;

          return $this;
    }
  }

?>