<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Test Page</title>
    </head>
    <body>
        <?php
            $phone = preg_replace('~[^0-9]~','','(916)213-10 0');
            echo $phone;
        ?>
    </body>
</html>
