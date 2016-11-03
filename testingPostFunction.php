<html>
<head>
</head>
<body>
<form method="POST" >
<input type="text" name="name">
<input type="submit">
<input type="radio" name="radio" value="jesus">
<input type="radio" name="radio" value="alah">
<input type="checkbox" name="check[]" value="option1">

<input type="checkbox" name="check[]" value="option2">
</form>
<?php
$checkbox=(isset($_POST['check']))?implode("/",$_POST['check']):"";
$name=(isset($_POST['name']))?$_POST['name']:"";
$radio=(isset($_POST['radio']))?$_POST['radio']:"";
print_r($_POST);
if(!empty($name)||!empty($checkbox)||!empty($radio)){
 $myfile=fopen("test.txt","a");
       fwrite($myfile,$name.",".$radio.",".$checkbox."\r\n");
       echo "$name, your data has been stored!";
} else print"pls fill everything tnx";
?>

</body>
</html>