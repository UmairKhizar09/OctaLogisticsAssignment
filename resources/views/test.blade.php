<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
            if(DB::connection()->getPdo())
            {
                echo "Successfully connected to the database => "
                             .DB::connection()->getDatabaseName();
            }
        ?>
   
</body>
</html>