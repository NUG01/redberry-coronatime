@extends('layouts.statistics')

@section('content')
    <main class="w-[85%] flex flex-col m-auto">
        <div class="flex border-b border-[#F6F6F7] mt-[4rem]">
            <div>
                <p class="font-extrabold text-[2.5rem] mb-[4rem]">Worlwide Statistics</p>
                <div class="flex justify-between">
                    <a href="/worldwide"
                        class="font-bold text-[1.6rem] pb-[1.6rem] border-b-[3px] border-[#010414]">Worldwide</a>
                    <a href="/countries" class="font-normal text-[1.6rem]">By country</a>
                </div>
            </div>
        </div>

        <x-statistic-rectangles></x-statistic-rectangles>

        <div class="h-[30rem] mt-[12rem] rounded-[16px] flex items-center justify-center"
            style="background: linear-gradient(to right bottom, #eaff81, #C2FF9D 50%, #75A4FF 100%);">
            <div class="flex flex-col items-center justify-center gap-[1.6rem]">
                <p class="font-black text-[2.5rem]">Get notified first</p>
                <p class="font-normal text-[1.6rem]">Get <span class="font-bold">personalised</span> notifications via
                    email</p>
                <form class="w-[42rem] h-[6.4rem] bg-white mt-[2.4rem] rounded-[3.2rem] flex items-center justify-between">
                    <div class="flex gap-[1.6rem] ml-[3.2rem]">
                        <x-search-icon></x-search-icon>
                        <input type="text" placeholder="Enter your email" />
                    </div>
                    <button type="submit"
                        class="w-[10rem] h-[5rem] bg-[#0FBA68] rounded-[3.2rem] mr-[0.8rem] text-[1.4rem] font-black uppercase text-white tracking-wider">Send</button>

                </form>
            </div>
        </div>
    </main>
@endsection
