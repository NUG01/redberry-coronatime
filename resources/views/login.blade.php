@extends('layouts.login')
@section('content')

    <body class="sm:grid-cols-1	">
        <div class="relative">
            <div class="ml-[10%] mt-[4rem] block max-w-[40rem] sm:ml-[16px] sm:mr-[16px] sm:mt-[24px]">
                <div class="flex align-center justify-between">
                    <img src="{{ url('/images/header.png') }}" class="mb-[6rem] sm:mb-[4rem]">
                    <x-language></x-language>
                </div>
                <div class="flex flex-col mb-[2.5rem]">
                    <h2 class="font-black text-[2.5rem] text-[#010414] mb-[1.6rem]">{{ __('translate.welcome_back') }}</h2>
                    <p class="font-normal text-[2rem] sm:text-[1.8rem] text-[#808189]">
                        {{ __('translate.welcome_back_details') }}</p>
                </div>
                <form method="POST" action="{{ getenv('APP_URL') }}/login">
                    @csrf
                    <div class="flex flex-col mb-11">
                        <label for="username"
                            class="text-[#010414] font-bold text-[1.6rem] mb-2">{{ __('translate.username') }}</label>
                        <input type="text" name="username" id="username" value="{{ old('username') }}"
                            placeholder="{{ __('translate.enter_unique_username') }}"
                            class="h-[5.6rem] w-full rounded-xl border border-[#E6E6E7] border-solid errorUser" />
                        @error('username')
                            <style>
                                .errorUser {
                                    box-shadow: 0 0 1px 1.4px #CC1E1E;
                                }
                            </style>
                            <div class="flex items-center justify-start gap-[1rem] mt-[1.2rem]">

                                <x-errorSVG></x-errorSVG>
                                <p class="text-[#CC1E1E] font-medium text-[1.4rem]">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-[2.5rem]">
                        <label for="password"
                            class="text-[#010414] font-bold text-[1.6rem] mb-2">{{ __('translate.password') }}</label>
                        <input type="password" name="password" id="password"
                            placeholder="{{ __('translate.fill_password') }}"
                            class="h-[5.6rem] w-full rounded-xl border border-[#E6E6E7] border-solid errorPass" />

                        @error('password')
                            <style>
                                .errorPass {
                                    box-shadow: 0 0 1px 1.4px #CC1E1E;
                                }
                            </style>
                            <div class="flex items-center justify-start gap-[1rem] mt-[1.2rem]">
                                <x-errorSVG></x-errorSVG>
                                <p class="text-[#CC1E1E] font-medium text-[1.4rem]">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>


                    <div class="flex mb-[2.5rem] justify-between">
                        <div class="flex gap-[0.8rem] items-center" x-data="{ show: false }" @click.away="show= false"
                            @click="show = ! show">
                            <div class="relative">
                                <x-checkbox-icon x-show="show" style="display: none"></x-checkbox-icon>
                                <input type="checkbox" name="remember_device" id="remember_device"
                                    class="border border-[#E6E6E7] border-solid w-[20px] h-[20px] rounded-[4px] cursor-pointer">
                            </div>
                            <label for="remember_device"
                                class="text-[#010414] font-semibold text-[1.4rem] cursor-pointer">{{ __('translate.remember_device') }}</label>
                        </div>
                        <a href="{{ getenv('APP_URL') }}/forget-password"
                            class="text-[#2029F3] font-semibold text-[1.4rem]">{{ __('translate.forgot_password') }}</a>
                    </div>
                    @if (session()->has('incorrect'))
                        <div class="flex items-center justify-start gap-[1rem] mt-[1.2rem] mb-[1rem]">
                            <x-errorSVG></x-errorSVG>
                            <p class="text-[#CC1E1E] font-medium text-[1.4rem]">{{ __('translate.login_fail') }}</p>
                        </div>
                    @endif
                    <button type="submit"
                        class="mb-[2.5rem] h-[6rem] w-full flex items-center justify-center bg-[#0FBA68] font-black text-[1.6rem] text-white rounded-xl uppercase">
                        {{ __('translate.log_in') }}</button>
                    <div class="flex justify-center gap-[0.4rem] text-[1.6rem]">
                        <p class="text-[#808189] font-normal">{{ __('translate.no_account') }}</p> <a href="/register"
                            class="text-[#010414] font-bold">{{ __('translate.free_signup') }}</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="image sm:hidden"></div>
    </body>
@endsection
