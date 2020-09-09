<?php include_once 'include/auto_class_register.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="style/index.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
      <form class="w3-display-topright" action="index.php" method="post">
        <!-- header -->
          <div class="w3-container w3-blue ">
            <h1 class='w3-lobster'>Product list</h1>
            <select class='w3-round w3-display-topright' name="type">
              <option selected value="delete">Delete all</option>
              <option value="All">Sort by:All</option>
              <option value="dvd">Sort by:Only DVDs</option>
              <option value="book">Sort by:Only Books</option>
              <option value="forniture">Sort by:Only Fornitures</option>
            </select>
            <button class='w3-round w3-button w3-white' type="submit" name="button">Apply</button>
          </div>

        <br><a href="include/admin.php"> Add Product</a><br>

        <!-- product -->
        <?php
          $get_data = new View();
          $clear = new Contrl();
          if(!isset($_POST["button"])){
                $products = $get_data->get_all();
                printProduct($products);
              }
          else{
                switch ($_POST["type"]) {
                  case 'All':$products = $get_data->get_All();
                    break;
                  case 'dvd':$products = $get_data->get_DVD();
                    break;
                  case 'book':$products = $get_data->get_Book();
                    break;
                  case 'forniture':$products = $get_data->get_Forniture();
                    break;

                  case 'delete':$products = $get_data->get_All();
                        $prods = array();
                        $prods = $_POST["checked_prod"];
                        if(count($prods) > 0){
                          $clear->delete($prods);
                          header("Location:index.php");
                        }
                    break;

                  default:echo "<br><p style='color:red;font-size:2vw;'>wrong type </p>";
                  break;}

                printProduct($products);
          }
        ?>
      </form>

  </body>
</html>
<?php
  function printProduct($products){
    foreach ($products as $value) {
      echo "<div class='box w3-blue w3-hover-shadow'>
            <input type='checkbox' name='checked_prod[]' value='".$value["id"]."'><br>

            <b>SKU:".$value["SKU"]."</b>
            <p>NAME:".$value["Name"]."</p>
            <p>PRICE:".$value["Price"]." $</p>
            ";
            switch ($value["Type"]) {
              case 'DVD-disc':
                echo "<p>SIZE:".$value["Size"]." mb</p>";
                break;
              case 'Book':
                echo "<p>WEIGHT:".$value["Weight"]."kg</p>";
                break;
              case 'Forniture':
                echo "<p>W:".$value["Width"]."/H:".$value["Height"]."/L:".$value["Length"]."/</p>";
                break;

              default:break;
            }
            echo "</div>";
          }
  }
?>
