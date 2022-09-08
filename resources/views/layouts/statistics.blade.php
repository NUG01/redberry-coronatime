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
    </style>
</head>

<body>
    <header class="flex h-[8rem] items-center justify-center border-b border-[
      #F6F6F7] bg-white">
        <div class="flex w-[85%] items-center justify-between">
            <div class="flex items-center justify-center"><img src="images/Group 1.png" class="h-[4.5rem]" /></div>
            <div class="flex gap-[1.6rem] h-[3.6rem] items-center justify-center">
                <div class="mr-[1.4rem] font-normal flex items-center justify-center gap-[0.7rem] text-[1.6rem]">
                    <p>English</p><span><svg width="12" height="7" viewBox="0 0 12 7" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.19995 1.3999L5.99995 6.1999L10.8 1.3999" stroke="#010414"
                                stroke-linecap="square" />
                        </svg>
                    </span>
                </div>
                <div class="font-bold text-[1.6rem]">Takashi k</div>
                <span class="w-[1px] h-full bg-[#E6E6E7]"></span>
                <a href="#" class="font-medium text-[1.4rem]">Log Out</a>
            </div>
        </div>
    </header>

    @yield('content')

</body>

</html>
