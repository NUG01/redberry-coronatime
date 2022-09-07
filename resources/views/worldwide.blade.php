@extends('layouts.statistics')

@section('content')
    <ma% class="w-[85%] h-full flex flex-col m-auto">
        <div class="flex border-b border-[#F6F6F7] mt-[4rem]">
            <div>
                <p class="font-extrabold text-[2.5rem] mb-[4rem]">Worlwide Statistics</p>
                <div class="flex justify-between">
                    <a href="#"
                        class="font-bold text-[1.6rem] pb-[1.6rem] border-b-[3px] border-[#010414]">Worldwide</a>
                    <a href="#" class="font-normal text-[1.6rem]">By country</a>
                </div>
            </div>
        </div>
        <div class="flex justify-between mt-[4rem]">
            <div class="w-[31%] h-[33rem] bg-[rgba(32,43,243,0.09)] rounded-[16px]"></div>
            <div class="w-[31%] h-[33rem] bg-[rgba(15,186,103,0.09)] rounded-[16px]"></div>
            <div class="w-[31%] h-[33rem] bg-[rgba(234,214,33,0.09)] rounded-[16px]"></div>
        </div>
        <div class="h-[30rem] mt-[12rem] rounded-[16px]"
            style="background: linear-gradient(to right bottom, #eaff81, #C2FF9D 50%, #75A4FF 100%);">
        </div>
    @endsection
