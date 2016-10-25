<html>
    <head>
        <style>
            input { display: block; margin: 6px 0; }
        </style>
    </head>
    
    <body>

    <h2>$_GET</h2> <!-- //sve iza url se zzove querry string //koristi za sharanje -->
    <pre><?php

        var_dump($_GET);

    ?></pre>

    <h2>$_POST</h2>
    <pre><?php

        var_dump($_POST);

    ?></pre>


    <h2>Links</h2>

    <ul>
        <li>
            <a href="02-post-get.php?page=1">Link 1</a>
        </li>
        <li>
            <a href="02-post-get.php?a=1&amp;b=2&c=dummy">Link 2</a>
        </li>
    </ul>

    <h2>Form</h2>


    <!-- fix this form: method, for, type, require -->
    <form>
        <fieldset>
            <legend>Info</legend>

            <label for="email">Email</label> <!-- label for znaci da mozes kliknuti na label -->
            <input name="email" type="email" required pattern="nemozes bez ovog patterna"/> <!-- html5 input types, u safari jedini ne baca error s ovim //regular expression?  -->

            <label>Password</label>
            <input name="password" type="text" />

            <input type="submit" value="Lol"/>  <!--moderno je koristit button type="submit" zato sto unput salje i svoj value serveru-->
        </fieldset>

    </form>

    </body>
</html>
