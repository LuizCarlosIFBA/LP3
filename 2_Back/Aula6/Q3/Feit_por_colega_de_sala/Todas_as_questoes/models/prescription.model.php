<?php
  require_once ('medicine.model.php');

  class Prescription {
    private ?array $medicines = null;
    
    public function __construct (
      private string $pacientName
    ) {
      $this->medicines = [];
    }


    public function pushMedicine(Medicine $med) {
      array_push($this->medicines, $med);
    }

    public function getTotal(): float {
      return array_reduce($this->medicines, function (float $carry, Medicine $item) {
        return $carry + $item->getPrice();
      }, 0);
    }

    public function getCheapestTotal(): float {
      $indexer = [];

      foreach ($this->medicines as &$med) {
        $activeIngredient = $med->getActiveIngredient();
        if (!array_key_exists($activeIngredient, $indexer) || 
            $indexer[$activeIngredient] > $med->getPrice()) 
        {  
          $indexer[$activeIngredient] = $med->getPrice();
        } 
        
      }
      
      return array_reduce(array_values($indexer), function ($carry, float $price) {
        return $carry + $price;
      }, 0);
    }

      /**
       * Get the value of pacientName
       */
      public function getPacientName()
      {
            return $this->pacientName;
      }

      /**
       * Set the value of pacientName
       */
      public function setPacientName($pacientName) : self
      {
            $this->pacientName = $pacientName;

            return $this;
      }

    /**
     * Get the value of medicines
     *
     * @return ?array
     */
    public function getMedicines() : ?array
    {
        return $this->medicines;
    }
  }



?>