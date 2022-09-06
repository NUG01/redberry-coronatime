<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CoronaTime</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            font-size: 62.5%;
            font-family: 'Inter', sans-serif;
        }

        body {
            display: grid;
            grid-template-columns: 4.2fr 3fr;
            height: 100vh;
            width: 100vw;
            background-color: #ffffff;
        }

        .image {
            background-image: url('images/vaccine.jpg');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        input[type=checkbox] {
            -moz-appearance: none;
            -webkit-appearance: none;
            -o-appearance: none;
        }

        input[type=checkbox]:checked {
            background-color: #E6E6E7;
        }

        input[type='text'] {
            padding: 1.8rem 2.4rem;
        }

        input[type='password'] {
            padding: 1.8rem 2.4rem;
        }

        input::placeholder {
            font-weight: 400;
            font-size: 1.6rem;
            color: #808189;
        }
    </style>
</head>


@yield('content')


</html>