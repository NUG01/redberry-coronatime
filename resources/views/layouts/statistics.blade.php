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
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
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

        .scrollbar::-webkit-scrollbar {
            width: 1.2rem;
            background: #f4f3f3e3;
            border-radius: 0 8px 8px 0;
            border-right: 0.1px solid #cbc9c9e3;
            border-right: 0.1px solid #cbc9c9e3;
        }

        .scrollbar::-webkit-scrollbar-thumb {
            width: 0.75rem;
            background: #bdbdbde3;
            border-radius: 0 8px 8px 0;
        }

        input:focus {
            outline-style: none;
            box-shadow: 0 0 1.8px 1.8px #202bf372;
        }

        button:focus {
            box-shadow: none;
        }

        @media(max-width:639px) {
            .resp {
                display: grid;
                grid-template-columns: 1fr 1fr;
                grid-template-rows: 1fr 1fr;
            }

        }

        @media(max-width:639px) {
            .menu {
                display: block;
            }

        }

        .unhide {
            display: none;
        }

        @media(max-width:800px) {
            .hide {
                display: none !important;
            }

        }

        @media(max-width:799px) {
            .unhide {
                display: block !important;
            }

        }
    </style>
</head>

<body>
    <x-header></x-header>

    @yield('content')

</body>

</html>
