@extends('layouts.statistics')

@section('content')
    <main class="w-[85%] flex items-start flex-col m-auto">
        <div class="flex border-b border-[#F6F6F7] mt-[4rem]">
            <div>
                <p class="font-extrabold text-[2.5rem] mb-[4rem]">{{ __('translate.worldwide_statistics') }}</p>
                <div class="flex justify-between">
                    <a href="/worldwide" class="font-normal text-[1.6rem]">{{ __('translate.worldwide') }}</a>
                    <a href="/countries"
                        class="font-bold text-[1.6rem] pb-[1.6rem] border-b-[3px] border-[#010414]">{{ __('translate.countries') }}</a>
                </div>
            </div>
        </div>
        <form method="GET" action="#" class="mt-[4rem] mb-[4rem]">
            <div class="relative">
                <input name="search" type="text"
                    class="h-[5rem] w-[24.3rem] bg-white rounded-[8px] border border-[#E6E6E7] flex items-center justify-center pl-[5rem]"
                    placeholder="{{ __('translate.search_country') }}">
                <button type="submit" class="absolute top-1/2 left-0 -translate-y-1/2 translate-x-full"">
                    <x-search-icon></x-search-icon>
                </button>
            </div>
        </form>
        <div class="mt-8 flex flex-col w-full px-4 sm:px-6 lg:px-8">
            <div class="-my-2 -mx-4 sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle">
                    <div
                        class="shadow-sm ring-1 ring-black ring-opacity-5 overflow-y-scroll h-[60rem] rounded-[8px] scrollbar">
                        <table class="min-w-full border-separate" style="border-spacing: 0">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="items-center sticky top-0 z-10 border-b border-gray-300 bg-gray-50 bg-opacity-75 py-3.5 pl-4 pr-3 text-left text-[14px] font-semibold text-[#010414] backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">
                                        <p>{{ __('translate.location') }}<span
                                                style="opacity:0;pointer-events:none">n</span>
                                        </p>
                                        <div
                                            class="flex flex-col gap-[3px] absolute -translate-x-[150%] -translate-y-[118%]">
                                            <x-upArrow></x-upArrow>
                                            <x-downArrow></x-downArrow>
                                        </div>
                                    </th>
                                    <th scope="col"
                                        class="sticky top-0 z-10 border-b border-gray-300 bg-gray-50 bg-opacity-75 px-3 py-3.5 text-left text-[14px] font-semibold text-[#010414] backdrop-blur backdrop-filter sm:table-cell">
                                        <p>{{ __('translate.new_cases') }}
                                        <div
                                            class="flex flex-col gap-[3px] absolute -translate-x-[150%] -translate-y-[118%]">
                                            <x-upArrow></x-upArrow>
                                            <x-downArrow></x-downArrow>
                                        </div>
                                        </p>
                                    </th>
                                    <th scope="col"
                                        class=" sticky top-0 z-10 border-b border-gray-300 bg-gray-50 bg-opacity-75 px-3 py-3.5 text-left text-[14px] font-semibold text-[#010414] backdrop-blur backdrop-filter lg:table-cell">
                                        <p>{{ __('translate.deaths') }}<span
                                                style="opacity:0;pointer-events:none">sss</span>
                                        </p>
                                        <div
                                            class="flex flex-col gap-[3px] absolute -translate-x-[150%] -translate-y-[118%]">
                                            <x-upArrow></x-upArrow>
                                            <x-downArrow></x-downArrow>
                                        </div>
                                    </th>
                                    <th scope="col"
                                        class="sticky top-0 z-10 border-b border-gray-300 bg-gray-50 bg-opacity-75 px-3 py-3.5 text-left text-[14px] font-semibold text-[#010414] backdrop-blur backdrop-filter">
                                        <p>{{ __('translate.recovered') }}</p>
                                        <div
                                            class="flex flex-col gap-[3px] absolute -translate-x-[150%] -translate-y-[118%]">
                                            <x-upArrow></x-upArrow>
                                            <x-downArrow></x-downArrow>
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
                                @foreach ($data as $country)
                                    <tr>

                                        <td
                                            class="whitespace-nowrap border-b border-gray-200 py-4 pl-4 pr-3 text-[14px] font-medium text-[#010414] sm:pl-6 lg:pl-8">
                                            {{ $countries->where('code', $country['country_code'])->first()['name'] }}
                                        </td>
                                        <td
                                            class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-[14px] font-medium text-[#010414] hidden sm:table-cell">
                                            {{ $country['confirmed'] }}<span
                                                style="opacity:0;pointer-events:none">...................................</span>
                                        </td>
                                        <td
                                            class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-[14px] font-medium text-[#010414] hidden lg:table-cell">
                                            {{ $country['deaths'] }}<span
                                                style="opacity:0;pointer-events:none">...................................</span>
                                        </td>
                                        <td
                                            class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-[14px] font-medium text-[#010414]">
                                            {{ $country['confirmed'] }}<span
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
