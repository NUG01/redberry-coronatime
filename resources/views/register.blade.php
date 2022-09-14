@extends('layouts.login')

@section('content')

    <body>
        <div>
            <div class="ml-[10%] mt-[4rem]">
                <img src="images/Group 1.png" class="mb-[6rem]">
                <div class="flex flex-col mb-[2.5rem]">
                    <h2 class="font-black text-[2.5rem] text-[#010414] mb-[1.6rem]">{{ __('translate.welcome_coronatime') }}
                    </h2>
                    <p class="font-normal text-[2rem] text-[#808189]">{{ __('translate.enter_info') }}</p>
                </div>
                <form method="POST" action="/register" class="max-w-[40rem]">
                    @csrf
                    <div class="flex flex-col mb-11">
                        <label for="username"
                            class="text-[#010414] font-bold text-[1.6rem] mb-2">{{ __('translate.username') }}</label>
                        <input type="text" name="username" id="username"
                            placeholder="{{ __('translate.enter_unique_username') }}"
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
                        <label for="email"
                            class="text-[#010414] font-bold text-[1.6rem] mb-2">{{ __('translate.email') }}</label>
                        <input type="email" name="email" id="email" placeholder="{{ __('translate.email') }}"
                            class="h-[5.6rem] w-full rounded-xl border border-[#E6E6E7] border-solid" />
                        @error('email')
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
                            class="h-[5.6rem] w-full rounded-xl border border-[#E6E6E7] border-solid" />
                        @error('password')
                            <div class="flex items-center justify-start gap-[1rem] mt-[1.2rem]">
                                <x-errorSVG></x-errorSVG>
                                <p class="text-[#CC1E1E] font-medium text-[1.4rem]">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-[4.2rem]">
                        <label for="repeat-password"
                            class="text-[#010414] font-bold text-[1.6rem] mb-2">{{ __('translate.repeat_password') }}</label>
                        <input type="password" name="repeat-password" id="repeat-password"
                            placeholder="{{ __('translate.repeat_password') }}"
                            class="h-[5.6rem] w-full rounded-xl border border-[#E6E6E7] border-solid" />
                        @error('repeat-password')
                            <div class="flex items-center justify-start gap-[1rem] mt-[1.2rem]">
                                <x-errorSVG></x-errorSVG>
                                <p class="text-[#CC1E1E] font-medium text-[1.4rem]">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                    <button type="submit"
                        class="mb-[2.5rem] h-[6rem] w-full flex items-center justify-center bg-[#0FBA68] font-black text-[1.6rem] text-white rounded-xl uppercase">{{ __('translate.sign_up') }}
                    </button>
                    <div class="flex justify-center gap-[0.4rem] text-[1.6rem]">
                        <p class="text-[#808189] font-normal">{{ __('translate.have_account') }}</p> <a href='/'
                            class="text-[#010414] font-bold">{{ __('translate.log_in') }}</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="image"></div>
    </body>
@endsection
