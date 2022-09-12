@extends('layouts.statistics')

@section('content')
    <main class="w-[85%] flex items-start flex-col m-auto">
        <div class="flex border-b border-[#F6F6F7] mt-[4rem]">
            <div>
                <p class="font-extrabold text-[2.5rem] mb-[4rem]">Worlwide Statistics</p>
                <div class="flex justify-between">
                    <a href="/worldwide" class="font-normal text-[1.6rem]">Worldwide</a>
                    <a href="/countries" class="font-bold text-[1.6rem] pb-[1.6rem] border-b-[3px] border-[#010414]">By
                        country</a>
                </div>
            </div>
        </div>
        <form method="GET" action="#" class="mt-[4rem]">
            <div class="relative">
                <input name="search" type="text"
                    class="h-[5rem] w-[24.3rem] bg-white rounded-[8px] border border-[#E6E6E7] flex items-center justify-center pl-[5rem]"
                    placeholder="Search by country">
                <button type="submit" class="absolute top-1/2 left-0 -translate-y-1/2 translate-x-full"">
                    <x-search-icon></x-search-icon>
                </button>
            </div>
        </form>

        <x-table></x-table>

    </main>
@endsection
