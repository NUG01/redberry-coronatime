@extends('layouts.statistics')

@section('content')
    <main class="w-[85%] sm:w-[99.3%] flex items-start flex-col m-auto">
        <div class="flex border-b border-[#F6F6F7] mt-[4rem] sm:mt-[3rem] sm:px-[7%]">
            <div>
                <p class="font-extrabold text-[2.5rem] mb-[4rem]">{{ __('translate.worldwide_statistics') }}</p>
                <div class="flex justify-between">
                    <a href="{{ getenv('APP_URL') }}/worldwide" class="font-normal text-[1.6rem]">{{ __('translate.worldwide') }}</a>
                    <a href="{{ getenv('APP_URL') }}/countries"
                        class="font-bold text-[1.6rem] pb-[1.6rem] border-b-[3px] border-[#010414]">{{ __('translate.countries') }}</a>
                </div>
            </div>
        </div>
        <form method="GET" action="#" class="mt-[4rem] mb-[4rem] sm:px-[7%] sm:mb-[1.8rem] sm:mt-[1.8rem]">
            <div class="relative">
                <div class="flex items-center"><input name="search" type="text"
                        class="h-[5rem] w-[24.3rem] bg-white rounded-[8px] border border-[#E6E6E7] flex items-center justify-center pl-[5rem]"
                        placeholder="{{ __('translate.search_country') }}">
                    <a href="/countries">
                        <ion-icon name="refresh-outline" class="pl-[1.6rem] w-[2.4rem] h-[2.4rem] text-[#808189]">
                        </ion-icon>
                    </a>
                </div>
                <button type="submit" class="absolute top-1/2 left-0 -translate-y-1/2 translate-x-full"">
                    <x-search-icon></x-search-icon>
                </button>
            </div>

        </form>




        <div class="mt-8 flex flex-col w-full px-4 sm:px-6 lg:px-8 unhide">
            <div class="-my-2 -mx-4 sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle">
                    <div
                        class="shadow-sm ring-1 ring-black ring-opacity-5 overflow-y-scroll h-[60rem] {{ Config::get('app.locale') == 'en' ? 'sm:max-h-[46rem] ' : 'sm:max-h-[44rem] ' }} rounded-[8px] scrollbar">
                        <table class="min-w-full border-separate" style="border-spacing: 0">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="items-center sticky top-0 z-10 border-b border-gray-300 bg-gray-50 bg-opacity-75 py-3.5 pl-4 pr-3 text-left {{ Config::get('app.locale') == 'en' ? 'text-[13px]' : 'text-[11px]' }} font-semibold text-[#010414] backdrop-blur backdrop-filter sm:pl-6 llg:pl-8">
                                        <p>{{ __('translate.location') }}

                                        </p>
                                        <div
                                            class="flex flex-col gap-[3px] absolute -translate-x-[150%] -translate-y-[118%]">

                                            <a href="/countries/location-ascend">
                                                <x-upArrow></x-upArrow>
                                            </a>
                                            <a href="/countries/location-descend">
                                                <x-downArrow></x-downArrow>
                                            </a>
                                        </div>
                                    </th>
                                    <th scope="col"
                                        class="sticky top-0 z-10 border-b border-gray-300 bg-gray-50 bg-opacity-75 px-3 py-3.5 text-left {{ Config::get('app.locale') == 'en' ? 'text-[13px]' : 'text-[11px]' }} font-semibold text-[#010414] backdrop-blur backdrop-filter sm:table-cell">
                                        <p>{{ __('translate.new_cases') }}
                                        <div
                                            class="flex flex-col gap-[3px] absolute -translate-x-[150%] -translate-y-[118%]">
                                            <a href="/countries/new-cases-ascend">
                                                <x-upArrow></x-upArrow>
                                            </a>
                                            <a href="/countries/new-cases-descend">
                                                <x-downArrow></x-downArrow>
                                            </a>
                                        </div>
                                        </p>
                                    </th>
                                    <th scope="col"
                                        class=" sticky top-0 z-10 border-b border-gray-300 bg-gray-50 bg-opacity-75 px-3 py-3.5 text-left {{ Config::get('app.locale') == 'en' ? 'text-[13px]' : 'text-[11px]' }} font-semibold text-[#010414] backdrop-blur backdrop-filter lg:table-cell">
                                        <p>{{ __('translate.deaths') }}
                                        </p>
                                        <div
                                            class="flex flex-col gap-[3px] absolute -translate-x-[150%] -translate-y-[118%]">
                                            <a href="/countries/deaths-ascend">
                                                <x-upArrow></x-upArrow>
                                            </a>
                                            <a href="/countries/deaths-descend">
                                                <x-downArrow></x-downArrow>
                                            </a>
                                        </div>
                                    </th>
                                    <th scope="col"
                                        class="sticky top-0 z-10 border-b border-gray-300 bg-gray-50 bg-opacity-75 px-3 py-3.5 text-left {{ Config::get('app.locale') == 'en' ? 'text-[13px]' : 'text-[11px]' }} font-semibold text-[#010414] backdrop-blur backdrop-filter">
                                        <p>{{ __('translate.recovered') }}</p>
                                        <div
                                            class="flex flex-col gap-[3px] absolute -translate-x-[150%] -translate-y-[118%]">
                                            <a href="/countries/recovered-ascend">
                                                <x-upArrow></x-upArrow>
                                            </a>
                                            <a href="/countries/recovered-descend">
                                                <x-downArrow></x-downArrow>
                                            </a>
                                        </div>
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @foreach ($statistic as $country)
                                    <tr>

                                        <td
                                            class="whitespace-nowrap border-b border-gray-200 py-4 pl-4 pr-3 {{ Config::get('app.locale') == 'en' ? 'text-[12px]' : 'text-[10px]' }} font-medium text-[#010414] ssm:pl-6 lg:pl-8">
                                            {{ $country['country'] == 'United States of America' ? 'USA' : $country['country'] }}
                                        </td>
                                        <td
                                            class="whitespace-nowrap border-b border-gray-200 px-3 py-4 {{ Config::get('app.locale') == 'en' ? 'text-[12px]' : 'text-[10px]' }} font-medium text-[#010414] hidden sm:table-cell">
                                            {{ number_format($country['confirmed']) }}
                                        </td>
                                        <td
                                            class="whitespace-nowrap border-b border-gray-200 px-3 py-4 {{ Config::get('app.locale') == 'en' ? 'text-[12px]' : 'text-[10px]' }} font-medium text-[#010414] hidden lg:table-cell">
                                            {{ number_format($country['deaths']) }}
                                        </td>
                                        <td
                                            class="whitespace-nowrap border-b border-gray-200 px-3 py-4 {{ Config::get('app.locale') == 'en' ? 'text-[12px]' : 'text-[10px]' }} font-medium text-[#010414]">
                                            {{ number_format($country['recovered']) }}
                                        </td>

                                    </tr>
                                @endforeach
                                <!-- More people... -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-8 flex flex-col w-full px-4 sm:px-6 lg:px-8 hide">
            <div class="-my-2 -mx-4 sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle">
                    <div
                        class="shadow-sm ring-1 ring-black ring-opacity-5 overflow-y-scroll h-[60rem] rounded-[8px] scrollbar">
                        <table class="min-w-full border-separate" style="border-spacing: 0">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="items-center sticky top-0 z-10 border-b border-gray-300 bg-gray-50 bg-opacity-75 py-3.5 pl-4 pr-3 text-left text-[14px] font-semibold text-[#010414] backdrop-blur backdrop-filter ssm:pl-6 llg:pl-8">
                                        <p>{{ __('translate.location') }}<span
                                                style="opacity:0;pointer-events:none">n</span>
                                        </p>
                                        <div
                                            class="flex flex-col gap-[3px] absolute -translate-x-[150%] -translate-y-[118%]">

                                            <a href="/countries/location-ascend">
                                                <x-upArrow></x-upArrow>
                                            </a>
                                            <a href="/countries/location-descend">
                                                <x-downArrow></x-downArrow>
                                            </a>
                                        </div>
                                    </th>
                                    <th scope="col"
                                        class="sticky top-0 z-10 border-b border-gray-300 bg-gray-50 bg-opacity-75 px-3 py-3.5 text-left text-[14px] font-semibold text-[#010414] backdrop-blur backdrop-filter ssm:table-cell">
                                        <p>{{ __('translate.new_cases') }}
                                        <div
                                            class="flex flex-col gap-[3px] absolute -translate-x-[150%] -translate-y-[118%]">
                                            <a href="/countries/new-cases-ascend">
                                                <x-upArrow></x-upArrow>
                                            </a>
                                            <a href="/countries/new-cases-descend">
                                                <x-downArrow></x-downArrow>
                                            </a>
                                        </div>
                                        </p>
                                    </th>
                                    <th scope="col"
                                        class=" sticky top-0 z-10 border-b border-gray-300 bg-gray-50 bg-opacity-75 px-3 py-3.5 text-left text-[14px] font-semibold text-[#010414] backdrop-blur backdrop-filter llg:table-cell">
                                        <p>{{ __('translate.deaths') }}<span
                                                style="opacity:0;pointer-events:none">sss</span>
                                        </p>
                                        <div
                                            class="flex flex-col gap-[3px] absolute -translate-x-[150%] -translate-y-[118%]">
                                            <a href="/countries/deaths-ascend">
                                                <x-upArrow></x-upArrow>
                                            </a>
                                            <a href="/countries/deaths-descend">
                                                <x-downArrow></x-downArrow>
                                            </a>
                                        </div>
                                    </th>
                                    <th scope="col"
                                        class="sticky top-0 z-10 border-b border-gray-300 bg-gray-50 bg-opacity-75 px-3 py-3.5 text-left text-[14px] font-semibold text-[#010414] backdrop-blur backdrop-filter">
                                        <p>{{ __('translate.recovered') }}</p>
                                        <div
                                            class="flex flex-col gap-[3px] absolute -translate-x-[150%] -translate-y-[118%]">
                                            <a href="/countries/recovered-ascend">
                                                <x-upArrow></x-upArrow>
                                            </a>
                                            <a href="/countries/recovered-descend">
                                                <x-downArrow></x-downArrow>
                                            </a>
                                        </div>
                                    </th>
                                    <th scope="col"
                                        class="sticky top-0 z-10 border-b border-gray-300 bg-gray-50 bg-opacity-75 px-3 py-3.5 text-left text-[14px] font-semibold text-[#010414] backdrop-blur backdrop-filter">
                                    </th>
                                    <th scope="col"
                                        class="sticky top-0 z-10 border-b border-gray-300 bg-gray-50 bg-opacity-75 px-3 py-3.5 text-left text-[14px] font-semibold text-[#010414] backdrop-blur backdrop-filter">
                                    </th>
                                    <th scope="col"
                                        class="sticky top-0 z-10 border-b border-gray-300 bg-gray-50 bg-opacity-75 px-3 py-3.5 text-left text-[14px] font-semibold text-[#010414] backdrop-blur backdrop-filter">
                                    </th>
                                    <th scope="col"
                                        class="sticky top-0 z-10 border-b border-gray-300 bg-gray-50 bg-opacity-75 px-3 py-3.5 text-left text-[14px] font-semibold text-[#010414] backdrop-blur backdrop-filter">
                                    </th>


                                </tr>
                            </thead>

                            <tbody class="bg-white">
                                @foreach ($statistic as $country)
                                    <tr>

                                        <td
                                            class="whitespace-nowrap border-b border-gray-200 py-4 pl-4 pr-3 text-[14px] font-medium text-[#010414] ssm:pl-6 llg:pl-8">
                                            {{ $country['country'] }}
                                        </td>
                                        <td
                                            class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-[14px] font-medium text-[#010414] hidden ssm:table-cell">
                                            {{ number_format($country['confirmed']) }}<span
                                                style="opacity:0;pointer-events:none">...................................</span>
                                        </td>
                                        <td
                                            class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-[14px] font-medium text-[#010414] hidden llg:table-cell">
                                            {{ number_format($country['deaths']) }}<span
                                                style="opacity:0;pointer-events:none">...................................</span>
                                        </td>
                                        <td
                                            class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-[14px] font-medium text-[#010414]">
                                            {{ number_format($country['recovered']) }}<span
                                                style="opacity:0;pointer-events:none">...................................</span>
                                        </td>
                                        <td
                                            class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-[14px] font-medium text-[#010414]">
                                        </td>
                                        <td
                                            class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-[14px] font-medium text-[#010414]">
                                        </td>
                                        <td
                                            class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-[14px] font-medium text-[#010414]">
                                        </td>
                                        <td
                                            class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-[14px] font-medium text-[#010414]">
                                        </td>

                                    </tr>
                                @endforeach
                                <!-- More people... -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </main>
@endsection
