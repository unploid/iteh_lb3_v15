<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Category</title>
  <script>
const ajax = new XMLHttpRequest();

function get(){
    let name = document.getElementById("name").value;
    ajax.onreadystatechange = update;
    ajax.open("GET", "../php/getItemsByCategory.php?name="+ name);
    
    ajax.send(null);
}

  function update(){
    if(ajax.readyState === 4){
      if(ajax.status === 200){
        var text = document.getElementById('text');
        var res = ajax.responseText;
        var resHtml ="";
        res = JSON.parse(res);

        res.forEach(el =>{
         resHtml += "<tr><td style = 'border: 1px solid'>" + el +"</td></tr>"
        });
        
      text.innerHTML = resHtml;
      }
    }
  }
</script>
</head>
<body>
<?php
include("../php/dbConnect.php");

$categorySql = 'SELECT `name` FROM `category`';

echo '<form method="get" >';

echo "<select id='name'><option> Choose the Category </option>";

foreach($db->query($categorySql) as $row) {
    echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
}

echo "</select>";
echo '<input type="button" onclick = "get()" value="ОК"><br>';
echo "</form>";
?>
<table style="border: 1px solid"><tr><th> Items </th></tr>
<tbody id = "text"></tbody>
</body>
</html>



