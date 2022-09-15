<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CoronaTime</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
    <script defer src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>
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
            height: 100vh;
            width: 100vw;
            background-color: #FDFDFD;
            color: #010414;
        }

        input[type='text'] {
            font-weight: 400;
            font-size: 1.6rem;
            color: ##808189;

        }

        input[type='text']:focus {
            outline: none;
        }

        input[name='search']::placeholder {
            padding-left: 2px;
        }



        @media(max-width:900px) {
            .media {
                display: none;
            }
        }
    </style>
</head>

<body>

    @yield('content')

</body>

</html>
