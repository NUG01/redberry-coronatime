@extends('layouts.password')

@section('content')

    <body class="flex justify-center">
        <main class="content flex flex-col items-center">

            <p class="font-black text-[2.5rem] text-[#010414]" style="margin-top: 15rem">
                {{ __('translate.reset_password') }}
            </p>

            <form method="POST" action="/password-changed" class="w-full sm:w-[90%]" style="margin-top: 5rem">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="flex flex-col mb-[2.5rem]">
                    <label for="password"
                        class="text-[#010414] font-bold text-[1.6rem] mb-2">{{ __('translate.new_password') }}</label>
                    <input type="password" name="password" id="password"
                        placeholder="{{ __('translate.enter_new_password') }}"
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

                <div class="flex flex-col">
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
                    class="h-[6rem] mt-[6rem] sm:mt-[75%] sm:mb-[4rem] w-full flex items-center justify-center bg-[#0FBA68] font-black text-[1.6rem] text-white rounded-xl uppercase">{{ __('translate.save_changes') }}
                </button>

            </form>
        </main>
    </body>
@endsection
