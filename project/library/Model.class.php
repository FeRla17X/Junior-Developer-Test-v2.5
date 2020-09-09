<?php
  class Model extends Dbh{

    // FOR CONTROLLER

    protected function setProduct($SKU,$Name,$Price,$Type_data,PROD_TYPE_INSERT $Type_obj){
      return $Type_obj->insert_data($SKU,$Name,$Price,$Type_data);
    }

    protected function clear($prods){
      foreach ($prods as $value) {
        $sql = "DELETE FROM product WHERE id='".$value."';";
        if(!$connection = $this->connect()->query($sql)){
          return false;}
      }
    }

    // FOR VIEW

    protected function getProduct($Type_obj){
      $sql = $Type_obj->set_sql();
      if(!$connection = $this->connect()->query($sql)){return false;}
      else{return $connection->fetchAll();}
    }
  }


  // add product to the DB by type
  interface PROD_TYPE_INSERT{
      public function insert_data($SKU,$Name,$Price,$Type_data);
    }
    class DVD_insert extends Dbh implements PROD_TYPE_INSERT {
      public function insert_data($SKU,$Name,$Price,$Type_data){
        $sql = "INSERT INTO product(SKU,Name,Price,Type,Size) VALUES(?,?,?,?,?)";
        $connection = $this->connect()->prepare($sql);
        if(!$connection->execute([$SKU,$Name,$Price,'DVD-disc',$Type_data["size"]])){return false;}
      }
    }

    class Book_insert extends Dbh implements PROD_TYPE_INSERT{
      public function insert_data($SKU,$Name,$Price,$Type_data){
        $sql = "INSERT INTO product(SKU,Name,Price,Type,Weight) VALUES(?,?,?,?,?)";
        $connection = $this->connect()->prepare($sql);
        if(!$connection->execute([$SKU,$Name,$Price,'Book',$Type_data["weight"]])){return false;}
      }
    }

    class FORNITURE_insert extends Dbh implements PROD_TYPE_INSERT{
      public function insert_data($SKU,$Name,$Price,$Type_data){
        $sql = "INSERT INTO product(SKU,Name,Price,Type,Width,Height,Length)
                                                        VALUES(?,?,?,?,?,?,?)";
        $connection = $this->connect()->prepare($sql);
        if(!$connection->execute([$SKU,$Name,$Price,'Forniture',
                                  $Type_data["width"],$Type_data["height"],$Type_data["length"]]))
        {return false;}

      }
    }

  // get product from the db by type
  interface PROD_TYPE_GET{
      public function set_sql();
    }
    class All_get{
      public function set_sql(){
        return "SELECT * from product";
      }
    }
    class DVD_get{
      public function set_sql(){
        return "SELECT * from product WHERE Type='DVD-disc'";
      }
    }
    class Book_get{
      public function set_sql(){
        return "SELECT * from product WHERE Type='Book'";
      }
    }
    class Forniture_get{
      public function set_sql(){
        return "SELECT * from product WHERE Type='Forniture'";
      }
    }
