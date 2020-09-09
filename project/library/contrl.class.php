<?php
  class Contrl extends Model{
    public function new_prod($SKU,$Name,$Price,$Type,$Type_data){
      switch ($Type) {
        case 'dvd':
          $detected_type = new DVD_insert();
          break;
        case 'book':
          $detected_type = new Book_insert();
          break;
        case 'forniture':
          $detected_type = new Forniture_insert();
          break;
        default:
          return "<br> <p class='error'>please select the type</p>";
        break;
      }
      return $this->setProduct($SKU,$Name,$Price,$Type_data,$detected_type);
    }

    public function delete($prods){
      if(!count($prods)<1){
        return $this->clear($prods);
      }
      return false;
    }
  }
