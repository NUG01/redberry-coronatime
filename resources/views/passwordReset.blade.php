@extends('layouts.password')

@section('content')

    <body class="flex justify-center">
        <main class="content flex flex-col items-center">

            <div class="flex flex-col items-center w-full"><img src="images/header.png" class="mt-[4rem]" />

                <p class="font-black text-[2.5rem] text-[#010414] mt-[15rem] sm:mt-[4rem]">
                    {{ __('translate.reset_password') }}
                </p>
            </div>


            <form method="POST" action="/reset-password"
                class="w-full sm:mb-[4rem] sm:w-[90%] sm:flex sm:flex-col sm:justify-between sm:h-full"
                style="margin-top: 5rem">
                @csrf

                <div class="flex flex-col">
                    <label for="email"
                        class="text-[#010414] font-bold text-[1.6rem] mb-2">{{ __('translate.email') }}</label>
                    <input type="email" name="email" id="email" placeholder="{{ __('translate.enter_email') }}"
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
                <button type="submit" style="margin-top: 6rem"
                    class="h-[6rem] w-full flex items-center justify-center bg-[#0FBA68] font-black text-[1.6rem] text-white rounded-xl uppercase">{{ __('translate.reset_password') }}
                </button>
            </form>

        </main>
    </body>
@endsection
