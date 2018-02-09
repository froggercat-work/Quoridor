<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?PHP /* Cross-site forgery protection with a synchronizer token, verifier middleware is enabled in Laravel by default! :) */ ?>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Quoridor by Sondra</title>
        <link href="https://fonts.googleapis.com/css?family=Dosis|Gochi+Hand" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <app></app>
        </div>
        <script src="js/app.js"></script>
    </body>
</html>