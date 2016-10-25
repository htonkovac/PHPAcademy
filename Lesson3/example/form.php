<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="mystyle.css">
    <!--   <style>   input, textarea { display: block; }
    </style>-->
</head>
<body>

<header>
    <ul>
        <li><a href="index.php">Naslovnica</a></li>
        <li><a href="form.php">Prijavi se</a></li>
        <li>Login (za admine)</li>
    </ul>
</header>

<main>

    <h1>Prijavnica za PHP akademiju</h1>

    <p>Prijavnica za prvo osječko izdanje PHP akademije koju Inchoo pokreće u suradnji s FERITom.</p>
    <p>Prijave traju do 10.10., pa požuri i svoje mjesto rezerviraj već sad.</p>
    <p>Više informacija na:
        <a href="http://inchoo.hr/php-akademija-2016/" target="_blank">http://inchoo.hr/php-akademija-2016/</a>
    </p>

    <!-- fix form -->
<form method="POST" action="<?= $_SERVER['PHP_SELF']?>">
    <label>Ime i prezime</label><br>
    <input name="name"  /><br>

    <label>Mail adresa</label><br>
    <input name="email" /><br>

    <label>Smjer</label><br>
    <input name="smjer" /><br>

    <label>Godina studija</label><br>
    <label><input name="godina" type="radio" value="1"/>1</label><br>
   <label><input name="godina" type="radio" value="2"/>2</label><br>
   <label><input name="godina" type="radio" value="3"/>3</label><br>

    <label>Što te motiviralo da se prijaviš?</label><br>
    <textarea name="motivacija" >

    </textarea><br>


    <label>Imaš li predznanje vezano uz web development?</label><br>
    <textarea>

    </textarea><br>

    U kojim jezicima si do sada programirao?<br>
    <input name="jezici" type="checkbox" value="#C"/>#C<br>
    <input name="jezici" type="checkbox" value='other'/>other<br><br>

    Uploadaj primjer svoga koda:<br>
    <input type="file"><br>
</form>
</main>

<footer>
    <p>&copy; PHP Akademija, 2016</p>
</footer>

</body>
</html>