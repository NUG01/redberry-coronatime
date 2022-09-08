@extends('layouts.password')

@section('content')

    <body class="flex justify-center">
        <main class="content flex flex-col items-center">
            <img src="images/Group 1.png" class="mt-[4rem]" />
            <p class="font-black text-[2.5rem] text-[#010414]" style="margin-top: 15rem">Reset Password</p>

            <form class="w-full" style="margin-top: 5rem">
                <div class="flex flex-col">
                    <label for="email" class="text-[#010414] font-bold text-[1.6rem] mb-2">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter your email"
                        class="h-[5.6rem] w-full rounded-xl border border-[#E6E6E7] border-solid" />
                </div>
                <button type="submit" style="margin-top: 6rem"
                    class="h-[6rem] w-full flex items-center justify-center bg-[#0FBA68] font-black text-[1.6rem] text-white rounded-xl uppercase">Reset
                    Password
                </button>
            </form>
        </main>
    </body>
@endsection
