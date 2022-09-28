@extends('layouts.login')

@section('content')

    <body class="sm:grid-cols-1	">
        <div>
            <div class="ml-[10%] mt-[4rem] sm:ml-[16px] sm:mr-[16px] sm:mt-[24px]">
                <div class="flex align-center justify-between max-w-[40rem]">
                    <img src="{{ url('/images/header.png') }}" class="mb-[6rem] sm:mb-[3rem]">
                    <x-language></x-language>
                </div>
                <div class="flex flex-col mb-[2.5rem] sm:mb-[2rem]">
                    <h2 class="font-black text-[2.5rem] text-[#010414] mb-[1.2rem]">{{ __('translate.welcome_coronatime') }}
                    </h2>
                    <p class="font-normal text-[2rem] text-[#808189]">{{ __('translate.enter_info') }}</p>
                </div>
                <form method="POST" action="{{ getenv('APP_URL') }}/register" class="max-w-[40rem]">
                    @csrf
                    <div class="flex flex-col mb-[2.5rem] sm:mb-[2rem]">
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
                    <div class="flex flex-col mb-[2.5rem] sm:mb-[2rem]">
                        <label for="email"
                            class="text-[#010414] font-bold text-[1.6rem] mb-2">{{ __('translate.email') }}</label>
                        <input type="email" name="email" id="email" placeholder="{{ __('translate.email') }}"
                            value="{{ old('email') }}"
                            class="h-[5.6rem] w-full rounded-xl border border-[#E6E6E7] border-solid errorEmail" />
                        @error('email')
                            <style>
                                .errorEmail {
                                    box-shadow: 0 0 1px 1.4px #CC1E1E;
                                }
                            </style>
                            <div class="flex items-center justify-start gap-[1rem] mt-[1.2rem]">
                                <x-errorSVG></x-errorSVG>
                                <p class="text-[#CC1E1E] font-medium text-[1.4rem]">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-[2.5rem] sm:mb-[2rem]">
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
                    <div class="flex flex-col mb-[4.2rem] sm:mb-[2.5rem]">
                        <label for="repeat-password"
                            class="text-[#010414] font-bold text-[1.6rem] mb-2">{{ __('translate.repeat_password') }}</label>
                        <input type="password" name="repeat-password" id="repeat-password"
                            placeholder="{{ __('translate.repeat_password') }}"
                            class="h-[5.6rem] w-full rounded-xl border border-[#E6E6E7] border-solid errorRepeat" />
                        @error('repeat-password')
                            <style>
                                .errorRepeat {
                                    box-shadow: 0 0 1px 1.4px #CC1E1E;
                                }
                            </style>
                            <div class="flex items-center justify-start gap-[1rem] mt-[1.2rem]">
                                <x-errorSVG></x-errorSVG>
                                <p class="text-[#CC1E1E] font-medium text-[1.4rem]">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                    <button type="submit"
                        class="mb-[2.5rem] sm:mb-[2rem] h-[6rem] w-full flex items-center justify-center bg-[#0FBA68] font-black text-[1.6rem] text-white rounded-xl uppercase">{{ __('translate.sign_up') }}
                    </button>
                    <div class="flex justify-center gap-[0.4rem] text-[1.6rem] sm:mb-[0.7rem]">
                        <p class="text-[#808189] font-normal">{{ __('translate.have_account') }}</p> <a href='/'
                            class="text-[#010414] font-bold">{{ __('translate.log_in') }}</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="image sm:hidden"></div>
    </body>
@endsection
