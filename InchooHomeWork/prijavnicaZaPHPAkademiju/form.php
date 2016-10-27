<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>PHPAkademija Prijava!</title>
    <link rel="stylesheet" type="text/css" href="mystyle.css">
    <!--   <style>   input, textarea { display: block; }
    </style>-->
</head>
<body>
<div class="form-style-6">
<header>
    <ul id="menu">
        <li><a href="index.php">Naslovnica</a></li>
        <li><a href="form.php">Prijavi se</a></li>
        <li><a> Login (za admine)</a></li>
    </ul>
</header>

<main>
<?php
$name= $email= $course= $year= $foreknowledge= $motivation= ""; //initializing variables
$languages=[];

if($_SERVER['REQUEST_METHOD']=='POST') {    //assigning the POST values(if possible) to the variables
    $year=htmlspecialchars(trim((isset($_POST['year'])?$_POST['year']:"")));
    $languages=(isset($_POST['languages'])?$_POST['languages']:array());
    $name=htmlspecialchars(trim((isset($_POST['name'])?$_POST['name']:"")));
    $email=htmlspecialchars(trim((isset($_POST['email'])?$_POST['email']:"")));
    $course=htmlspecialchars(trim((isset($_POST['course'])?$_POST['course']:"")));
    $motivation=htmlspecialchars(trim((isset($_POST['motivation'])?$_POST['motivation']:"")));
    $foreknowledge=htmlspecialchars(trim((isset($_POST['foreknowledge'])?$_POST['motivation']:"")));
 if(isset($_FILE['file'])) {
    var_dump($_FILE);
move_uploaded_file($_FILE['tmp_file'],"uploads/"./*TODO: FINISH THIS*/);

}
}

?>

    <h1>Prijavnica za PHP akademiju</h1>

    <p>Prijavnica za prvo osječko izdanje PHP akademije koju Inchoo pokreće u suradnji s FERITom.</p>
    <p>Prijave traju do 10.10., pa požuri i svoje mjesto rezerviraj već sad.</p>
    <p>Više informacija na:
        <a href="http://inchoo.hr/php-akademija-2016/" target="_blank">http://inchoo.hr/php-akademija-2016/</a>
    </p>
    <?php
    if($_SERVER['REQUEST_METHOD']=='POST' &&(empty($name) || empty($year) || empty($email) || empty($course) || empty($motivation) || empty($foreknowledge))):?>
 <span class="error">Molim te, ispuni sva polja kako bi povećao svoje šanse :)</span><br>
<?php endif;?>
    <!-- fix form -->
<form method="post" action="<?= $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
    <label >Ime i prezime</label><br>
    <input name="name" type="text" value="<?=$name?>"/><br>

    <label>Mail adresa</label><br>
    <input name="email" type="email" value="<?=$email?>"/><br>

    <label>Smjer</label><br>
    <input name="course" type="text" value="<?=$course?>" /><br>

    <label>Godina studija</label><br>
    <label><input name="year" type="radio" value="1" <?=($year=="1")?"checked":""?> />1</label><label><input name="year" type="radio" value="4" <?=($year=="4")?"checked":""?>/>4</label><br>
   <label><input name="year" type="radio" value="2" <?=($year=="2")?"checked":""?> />2</label><label><input name="year" type="radio" value="5" <?=($year=="5")?"checked":""?>/>5<br></label>
   <label><input name="year" type="radio" value="3"<?=($year=="3")?"checked":""?> />3</label><br>

    <label>Što te motiviralo da se prijaviš?</label><br>
    <textarea name="motivation"><?=$motivation?></textarea><br>


    <label>Imaš li predznanje vezano uz web development?</label><br>
    <textarea name="foreknowledge"><?=$foreknowledge?></textarea><br>

    U kojim jezicima si do sada programirao?<br>
    <input name="languages[]" type="checkbox" value="C" <?=(in_array("C",$languages))?"checked":""?>/>C <input name="languages[]" type="checkbox" value="Java" <?=(in_array("Java",$languages))?"checked":""?>/>Java <br>
    <input name="languages[]" type="checkbox" value="Python" <?=(in_array("Python",$languages))?"checked":""?>/>Python<input name="languages[]" type="checkbox" value='other' <?=(in_array("other",$languages))?"checked":""?>/>neki drugi<br><br>

    Uploadaj primjer svoga koda:<br>
    <input type="file" name="file"><br><br><!-- TODO: Implement file upload (HINT:use w3schools) and implement file write -->
    <button type="submit">Prijavi se!</button>
</form>
</main>

<footer>
    <p>&copy; PHP Akademija, 2016</p>
</footer>
</div>
</body>
</html>