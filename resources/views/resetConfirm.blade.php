@extends('layouts.password')

@section('content')

    <body class="flex justify-center">
        <main class="content flex flex-col items-center">
            <img src="images/Group 1.png" class="mt-[4rem]" style="margin-bottom: 25rem" />
            <div class="flex flex-col items-center justify-center w-full">
                <x-confirmation></x-confirmation>

                <p style="margin-top: 1.6rem; font-size:1.8rem;color:#010414;font-weight:400;">Check your email to reset password</p>
            </div>

        </main>
    </body>
@endsection
