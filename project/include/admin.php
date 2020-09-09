<?php include_once 'auto_class_register.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="../style/admin.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="admin.php" method="post">
      <!-- header -->
      <div class="w3-container w3-blue ">
        <h1 class='w3-lobster'>New  product </h1>
        <button type="submit" class='w3-round w3-button w3-white w3-large' name="save" >save</button>
      </div>
      <br><a href="../index.php"> Product</a><br>
      <!-- add form -->
      <div class="title">Create</div>
      <div class="add_product">
        <input type="text" name="SKU" required placeholder="SKU" maxlength="256"><br>
        <input type="text" name="Name" required placeholder="Name" maxlength="256"><br>
        <input type="number" name="Price" required placeholder="Price" min="1"><br><br>

        <select name="Type" required id="type">
          <option selected disabled>select the product's type</option>
          <option value="dvd">size(in mb) for DVD-disc</option>
          <option value="book">weight(in kg) for book</option>
          <option value="forniture">Demension (HxWxL) for forniture</option>
        </select>

        <br><br>

        <div class="type_input" id='dvd'>
          <input type="text" name="Type_data[size]" placeholder="size" min="1"><br><br>
          Please provide the size(mb) of your DVD-disc
        </div>
        <div class="type_input" id='forniture'>
          <input type="text" name="Type_data[width]" placeholder="width" min="1"><br>
          <input type="text" name="Type_data[height]" placeholder="height" min="1"><br>
          <input type="text" name="Type_data[length]" placeholder="length" min="1"><br><br>
          Please provide dimensions in HxWxL format
        </div>
        <div class="type_input" id='book'>
          <input type="text  " name="Type_data[weight]"  placeholder="weight" min="1"><br><br>
          Please provide the weight of your book
        </div>

      </div>
    </form>
    <script>
      $(document).ready(function() {
        $('#type').change(function(){
          $('.type_input').hide();
          $('#'+ $(this).val()).show();
        });
      });
    </script>
  </body>
</html>
<?php
  if(!isset($_POST["save"])){}
  else{
    $SKU = $_POST["SKU"];
    $Name = $_POST["Name"];
    $Price = $_POST["Price"];
    $Type = $_POST["Type"];
    $Type_data = $_POST["Type_data"];

    $create_prod_obj = new Contrl();
    if($create_prod_obj->new_prod($SKU,$Name,$Price,$Type,$Type_data)){
      echo "<br> <p class='error'>success</p>";;
    }
    else{
      echo "<br> <p class='error'>error</p>";
    }
    header("Location:admin.php");
  }


?>
