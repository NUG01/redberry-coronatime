@extends('layouts.password')

@section('content')

    <body class="flex justify-center">
        <main class="content flex flex-col items-center">
            {{-- <img src="images/Group 1.png" class="mt-[4rem]" /> --}}
            <p class="font-black text-[2.5rem] text-[#010414]" style="margin-top: 15rem">Reset Password</p>

            <form method="POST" action="/password-changed" class="w-full"
                style="margin-top: 5rem">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="flex flex-col">
                    <label for="password" class="text-[#010414] font-bold text-[1.6rem] mb-2">New password</label>
                    <input type="password" name="password" id="password" placeholder="Enter new password"
                        class="h-[5.6rem] w-full rounded-xl border border-[#E6E6E7] border-solid mb-[2.5rem]" />
                        @error('password')
                            <div class="flex items-center justify-start gap-[1rem] mt-[1.2rem]">
                                <x-errorSVG></x-errorSVG>
                                <p class="text-[#CC1E1E] font-medium text-[1.4rem]">{{ $message }}</p>
                            </div>
                        @enderror
                </div>
                <div class="flex flex-col">
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
                <button type="submit" style="margin-top: 6rem"
                    class="h-[6rem] w-full flex items-center justify-center bg-[#0FBA68] font-black text-[1.6rem] text-white rounded-xl uppercase">Save
                    Changes
                </button>
            </form>
        </main>
    </body>
@endsection
