@extends('layouts.password')

@section('content')

    <body class="flex justify-center">
        <main class="content flex flex-col items-center" style="width:42rem">
            <img src="{{ url('/images/header.png') }}" class="mt-[4rem]" style="margin-bottom: 25rem" />
            <div class="flex flex-col items-center justify-center w-full sm:w-[90%]">

                <x-confirmation></x-confirmation>


                <p style="margin-top: 1.6rem; font-size:1.8rem;color:#010414;font-weight:400;">
                    {{ __('translate.password_changed_success') }}
                </p>
                <p style="margin-top: 0.4rem; font-size:1.8rem;color:#010414;font-weight:400;margin-bottom:9rem;">
                    {{ __('translate.please_login') }}
                </p>


                <a href="/login"
                    class="mb-[2.5rem] h-[6rem] w-full flex items-center justify-center bg-[#0FBA68] font-black text-[1.6rem] text-white rounded-xl uppercase">
                    {{ __('translate.sign_in') }}
                </a>

            </div>

        </main>
    </body>
@endsection
