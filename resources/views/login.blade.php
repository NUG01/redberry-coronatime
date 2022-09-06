@extends('layouts.login')
@section('content')

    <body>
        <div>
            <div class="ml-[10%] mt-[4rem] inline-block content">
                <img src="images/Group 1.png" class="mb-[6rem]">
                <div class="flex flex-col mb-[2.5rem]">
                    <h2 class="font-black text-[2.5rem] text-[#010414] mb-[1.6rem]">Welcome Back!</h2>
                    <p class="font-normal text-[2rem] text-[#808189]">Welcome back! Please enter your details</p>
                </div>
                <form method="#" action="#">
                    @csrf
                    <div class="flex flex-col mb-11">
                        <label for="username" class="text-[#010414] font-bold text-[1.6rem] mb-2">Username</label>
                        <input type="text" name="username" id="username" placeholder="Enter unique username or email"
                            class="h-[5.6rem] w-full rounded-xl border border-[#E6E6E7] border-solid" />
                    </div>
                    <div class="flex flex-col mb-[2.5rem]">
                        <label for="password" class="text-[#010414] font-bold text-[1.6rem] mb-2">Password</label>
                        <input type="password" name="password" id="password" placeholder="Fill in password"
                            class="h-[5.6rem] w-full rounded-xl border border-[#E6E6E7] border-solid" />
                    </div>
                    <div class="flex mb-[2.5rem] justify-between">
                        <div class="flex gap-[0.8rem]">
                            <div class="relative"><svg width="12" height="9" viewBox="0 0 12 9" fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="absolute top-1/2 left-1/2 -translate-y-3/4 -translate-x-1/2 pointer-events-none	">
                                    <path
                                        d="M4.66674 7.11463L10.7947 0.985962L11.7381 1.92863L4.66674 8.99996L0.424072 4.7573L1.36674 3.81463L4.66674 7.11463Z"
                                        fill="white" />
                                </svg>
                                <input type="checkbox" name="checkbox" id="checkbox" value="yes"
                                    class="border border-[#E6E6E7] border-solid w-[20px] h-[20px] rounded-[4px] cursor-pointer">
                            </div>
                            <label for="checkbox" class="text-[#010414] font-semibold text-[1.4rem] cursor-pointer">Remember
                                this
                                device</label>
                        </div>
                        <a href="#" class="text-[#2029F3] font-semibold text-[1.4rem]">Forgot password?</a>
                    </div>
                    <button type="submit"
                        class="mb-[2.5rem] h-[6rem] w-full flex items-center justify-center bg-[#0FBA68] font-black text-[1.6rem] text-white rounded-xl uppercase">Log
                        In</button>
                    <div class="flex justify-center gap-[0.4rem] text-[1.6rem]">
                        <p class="text-[#808189] font-normal">Don't have an account?</p> <a href='#'
                            class="text-[#010414] font-bold">Sign up for
                            free</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="image"></div>
    </body>
@endsection
