<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <p>hello {{ $name }}..</p>
    <p>Recived your payment Amount : ({{ number_format($amount, 2) }})</p>
    <p>Thank you..</p>
</body>

</html>
