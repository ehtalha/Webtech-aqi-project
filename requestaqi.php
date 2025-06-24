<?php
session_start();
$username = $_SESSION['username'] ?? 'Guest';
echo $username;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Vertical Checkboxes</title>
  <style>
    .box1 {
      padding: 20px;
      background-color: skyblue;
      width: 250px;
      height: max-content;
    }
    .checkbox-group {
      display: flex;
      flex-direction: column;
      gap: 20px;
      
    }
    label{
      font-size: 30px;
    }
     input[type="checkbox"]{
      transform: scale(1.5);
     }
     input[type="submit"]{
      margin-left: 70px;
     }
     h2{
      text-align: center;
      margin-top: 10px;
     }
     .box1{
      display: flex;
      margin:10px auto;
     }
     .showdata{
      height:50px;
      width:100px;
     }
  </style>
</head>
<body>
  <h2> Select country:</h2>
<div class="box1">
<form action="showaqi.php" method="get">
<label><input type="checkbox" name="country[]" value="America">America</label><br>
  <label><input type="checkbox" name="country[]" value="India">India</label><br>
  <label><input type="checkbox" name="country[]" value="China" >China</label><br>
  <label><input type="checkbox" name="country[]" value="Germany">Germany</label><br>
  <label><input type="checkbox" name="country[]" value="Bangladesh" >Bangladesh</label><br>
  <label><input type="checkbox" name="country[]" value="Pakistan" >Pakistan</label><br>
  <label><input type="checkbox" name="country[]" value="Qater" onclick="oneclick(this)">Qater</label><br>
  <label><input type="checkbox" name="country[]" value="Canada" onclick="oneclick(this)">Canada</label><br>
  <label><input type="checkbox" name="country[]" value="Brazil" onclick="oneclick(this)">Brazil</label><br>
  <label><input type="checkbox" name="country[]" value="Australia" onclick="oneclick(this)">Australia</label><br>
  <label><input type="checkbox" name="country[]" value="Japan" onclick="oneclick(this)">Japan</label><br>
  <label><input type="checkbox" name="country[]" value="Russia" onclick="oneclick(this)">Russia</label><br>
  <label><input type="checkbox" name="country[]" value="UK" onclick="oneclick(this)">UK</label><br>
  <label><input type="checkbox" name="country[]" value="Italy" onclick="oneclick(this)">Italy</label><br>
  <label><input type="checkbox" name="country[]" value="South Korea" onclick="oneclick(this)">South Korea</label><br>
  <label><input type="checkbox" name="country[]" value="Mexico" onclick="oneclick(this)">Mexico</label><br>
  <label><input type="checkbox" name="country[]" value="Indonesia" onclick="oneclick(this)">Indonesia</label><br>
  <label><input type="checkbox" name="country[]" value="Saudi Arabia" onclick="oneclick(this)">Saudi Arabia</label><br>
  <label><input type="checkbox" name="country[]" value="South Africa" onclick="oneclick(this)">South Africa</label><br>
  <label><input type="checkbox" name="country[]" value="Spain" onclick="oneclick(this)">Spain</label><br>

  <br>
  <input type="submit" value="Show" class="showdata" onclick="onelclick()">
</form>
</div>
<script>
    function onelclick(checkbox){
      const checkboxes = document.querySelectorAll('input[name="country[]"]:checked');
        if(checkboxes.length<10){
          alert("Minimum 10 country required");
          return false;
        }

    }
</script>
</body>
</html>
