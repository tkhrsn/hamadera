<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>素数</title>
    </head>
    <img src="/img/prime_<?php echo $isPrime ? 'yes' : 'no' ?>.jpg"/><br>
    <?php echo $isPrime ? '素数である。' : '素数ではないッ！！' ?>
</html>
