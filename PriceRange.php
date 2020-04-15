<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Range</title>
  <script>
const ajax = new XMLHttpRequest();

function get(){
    let price1 = document.getElementById("price1").value;
    let price2 = document.getElementById("price2").value;
    ajax.onreadystatechange = update;
    ajax.open("GET", "../php/getItemsByPriceRange.php?price1="+ price1+ "&price2=" + price2);
    
    ajax.send(null);
}

  function update(){
    if(ajax.readyState === 4){
      if(ajax.status === 200){
        var text = document.getElementById('text');
        text.innerHTML = ajax.responseText;
      }
    }
  }
</script>
</head>
<body>
<?php

$priceArray = range(10, 100);
echo '<form method="get">';

echo "<select id = 'price1'><option> Choose the start price </option>";

  foreach ($priceArray as $price) {
    echo '<option '.$price.' value="'.$price.'">'.$price.'</option>';
  }
    echo "</select>";

echo "<select id ='price2'><option> Choose the end price </option>";

    foreach ($priceArray as $price) {
        echo '<option '.$price.' value="'.$price.'">'.$price.'</option>';
    }
    echo "</select>";
echo '<input type="button" onclick = "get()" value="ОК"><br>';
echo "</form>";
?>
<table style="border: 1px solid"><tr><th> Item </th></tr>
<tbody id = "text"></tbody>
</body>
</html>



