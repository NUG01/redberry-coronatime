@extends('layouts.login')

@section('content')

    <body>
        <div>
            <div class="ml-[10%] mt-[4rem] inline-block content">
                <img src="images/Group 1.png" class="mb-[6rem]">
                <div class="flex flex-col mb-[2.5rem]">
                    <h2 class="font-black text-[2.5rem] text-[#010414] mb-[1.6rem]">Welcome to Coronatime</h2>
                    <p class="font-normal text-[2rem] text-[#808189]">Please enter required info to sign up</p>
                </div>
                <form method="POST" action="/register">
                    @csrf
                    <div class="flex flex-col mb-11">
                        <label for="username" class="text-[#010414] font-bold text-[1.6rem] mb-2">Username</label>
                        <input type="text" name="username" id="username" placeholder="Enter unique username"
                            class="h-[5.6rem] w-full rounded-xl border border-[#E6E6E7] border-solid" />
                        <p class="text-normal text-[1.4rem] text-[#808189] mt-2">Username should be unique, min 3 symbols
                        </p>
                        @error('username')
                            <div class="flex items-center justify-start gap-[1rem] mt-[1.2rem]">
                                <x-errorSVG></x-errorSVG>
                                <p class="text-[#CC1E1E] font-medium text-[1.4rem]">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-[2.5rem]">
                        <label for="email" class="text-[#010414] font-bold text-[1.6rem] mb-2">Email</label>
                        <input type="email" name="email" id="email" placeholder="Enter your email"
                            class="h-[5.6rem] w-full rounded-xl border border-[#E6E6E7] border-solid" />
                        @error('email')
                            <div class="flex items-center justify-start gap-[1rem] mt-[1.2rem]">
                                <x-errorSVG></x-errorSVG>
                                <p class="text-[#CC1E1E] font-medium text-[1.4rem]">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-[2.5rem]">
                        <label for="password" class="text-[#010414] font-bold text-[1.6rem] mb-2">Password</label>
                        <input type="password" name="password" id="password" placeholder="Fill in password"
                            class="h-[5.6rem] w-full rounded-xl border border-[#E6E6E7] border-solid" />
                        @error('password')
                            <div class="flex items-center justify-start gap-[1rem] mt-[1.2rem]">
                                <x-errorSVG></x-errorSVG>
                                <p class="text-[#CC1E1E] font-medium text-[1.4rem]">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-[4.2rem]">
                        <label for="repeat-password" class="text-[#010414] font-bold text-[1.6rem] mb-2">Repeat
                            password</label>
                        <input type="password" name="repeat-password" id="repeat-password" placeholder="Repeat password"
                            class="h-[5.6rem] w-full rounded-xl border border-[#E6E6E7] border-solid" />
                        @error('repeat-password')
                            <div class="flex items-center justify-start gap-[1rem] mt-[1.2rem]">
                                <x-errorSVG></x-errorSVG>
                                <p class="text-[#CC1E1E] font-medium text-[1.4rem]">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                    <button type="submit"
                        class="mb-[2.5rem] h-[6rem] w-full flex items-center justify-center bg-[#0FBA68] font-black text-[1.6rem] text-white rounded-xl uppercase">Sign
                        up
                    </button>
                    <div class="flex justify-center gap-[0.4rem] text-[1.6rem]">
                        <p class="text-[#808189] font-normal">Already have an account?</p> <a href='/'
                            class="text-[#010414] font-bold">Log in</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="image"></div>
    </body>
@endsection
