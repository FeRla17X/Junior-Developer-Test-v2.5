<?php
  class View extends Model{
    public function get_all(){
      $Type_obj = new All_get();
      return $this->getProduct($Type_obj);
    }
    public function get_DVD(){
      $Type_obj = new DVD_get();
      return $this->getProduct($Type_obj);
    }
    public function get_Book(){
      $Type_obj = new Book_get();
      return $this->getProduct($Type_obj);
    }
    public function get_Forniture(){
      $Type_obj = new Forniture_get();
      return $this->getProduct($Type_obj);
    }
  }
