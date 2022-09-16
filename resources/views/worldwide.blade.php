@extends('layouts.statistics')

@section('content')
    <main class="w-[85%] flex flex-col m-auto">
        <div class="flex border-b border-[#F6F6F7] mt-[4rem]">
            <div>
                <p class="font-extrabold text-[2.5rem] mb-[4rem]">{{ __('translate.worldwide_statistics') }}</p>
                <div class="flex justify-between">
                    <a href="/worldwide"
                        class="font-bold text-[1.6rem] pb-[1.6rem] border-b-[3px] border-[#010414]">{{ __('translate.worldwide') }}</a>
                    <a href="/countries" class="font-normal text-[1.6rem]">{{ __('translate.countries') }}</a>
                </div>
            </div>
        </div>

        <div class="flex justify-between mt-[4rem] resp sm:gap-x-3	">
            <div
                class="w-[31%] sm:w-[100%] sm:col-span-2 sm:h-[23rem] sm:mb-[2rem] bg-[rgba(32,43,243,0.08)] rounded-[16px] flex items-center justify-center">
                <div class="flex flex-col items-center justify-center gap-[1.6rem]">
                    <div><svg class="absolute" width="92" height="50" viewBox="0 0 92 50" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1 48.5C41.2762 46 16.4144 36.5 48.7348 36.5C60.6685 36.5 55.1989 22.5 68.6243 22.5C82.0497 22.5 81.5525 9.5 91 1"
                                stroke="#2029F3" stroke-width="2" />
                        </svg>
                        <svg width="90" height="64" viewBox="0 0 90 64" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M47.7348 35.5C15.4144 35.5 40.2762 45 0 47.5V64H90V0C80.5525 8.5 81.0497 21.5 67.6243 21.5C54.1989 21.5 59.6685 35.5 47.7348 35.5Z"
                                fill="url(#paint0_linear_5133_26)" />
                            <defs>
                                <linearGradient id="paint0_linear_5133_26" x1="45.2486" y1="-23.5" x2="44.9972"
                                    y2="64" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#2029F3" stop-opacity="0.24" />
                                    <stop offset="1" stop-color="#2029F3" stop-opacity="0" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                    <p class="font-medium text-[2rem] mt-[1rem]">{{ __('translate.new_cases') }}</p>
                    <p class="font-black text-[4rem] sm:text-[3.2rem] text-[#2029F3]">{{ $sumConfirmed }}</p>
                </div>
            </div>

            <div
                class="w-[31%] sm:w-[100%] h-[31rem] sm:h-[23rem]  bg-[rgba(15,186,103,0.08)] rounded-[16px] flex items-center justify-center">
                <div class="flex flex-col items-center justify-center gap-[1.6rem]">
                    <div><svg class="absolute" width="92" height="26" viewBox="0 0 92 26" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1 24.5C41.2762 22 13.6796 18 46 18C57.9337 18 56.0746 11 69.5 11C82.9254 11 81.5525 9.5 91 1"
                                stroke="#0FBA68" stroke-width="2" />
                        </svg>

                        <svg width="90" height="41" viewBox="0 0 90 41" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M43 18.5C10.6796 18.5 40.2762 22 0 24.5V41H90V0C80.5525 8.5 81.0497 10.5 67.6243 10.5C54.1989 10.5 54.9337 18.5 43 18.5Z"
                                fill="url(#paint0_linear_5133_42)" />
                            <defs>
                                <linearGradient id="paint0_linear_5133_42" x1="45.2486" y1="-46.5" x2="44.9972"
                                    y2="41" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#0FBA68" stop-opacity="0.24" />
                                    <stop offset="1" stop-color="#0FBA68" stop-opacity="0" />
                                </linearGradient>
                            </defs>
                        </svg>

                    </div>
                    <p class="font-medium text-[2rem] sm:text-[1.6rem] mt-[1rem]">{{ __('translate.recovered') }}</p>
                    <p class="font-black text-[4rem] sm:text-[2.4rem] text-[#0FBA68]">{{ $sumRecovered }}</p>
                </div>
            </div>
            <div
                class="w-[31%] sm:w-[100%] h-[31rem] sm:h-[23rem]  bg-[rgba(234,214,33,0.08)] rounded-[16px] flex items-center justify-center">
                <div class="flex flex-col items-center justify-center gap-[1.6rem]">
                    <div><svg class="absolute" width="92" height="37" viewBox="0 0 92 37" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1 35.5C41.2762 33 16.4144 23.5 48.7348 23.5C60.6685 23.5 55.1989 9.5 68.6243 9.5C82.0497 9.5 81.5525 10 91 1.5"
                                stroke="#EAD621" stroke-width="2" />
                        </svg>
                        <svg width="90" height="51" viewBox="0 0 90 51" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M47.7348 22.5C15.4144 22.5 40.2762 32 0 34.5V51H90V0.5C80.5525 9 81.0497 8.5 67.6243 8.5C54.1989 8.5 59.6685 22.5 47.7348 22.5Z"
                                fill="url(#paint0_linear_5133_34)" />
                            <defs>
                                <linearGradient id="paint0_linear_5133_34" x1="45.2486" y1="-36.5" x2="44.9972"
                                    y2="51" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#EAD621" stop-opacity="0.24" />
                                    <stop offset="1" stop-color="#EAD621" stop-opacity="0" />
                                </linearGradient>
                            </defs>
                        </svg>

                    </div>
                    <p class="font-medium text-[2rem] sm:text-[1.6rem] mt-[1rem]">{{ __('translate.death') }}</p>
                    <p class="font-black text-[4rem] sm:text-[2.4rem] text-[#EAD621]">{{ $sumDeaths }}</p>
                </div>
            </div>

        </div>


        <div class="h-[30rem] mt-[12rem] rounded-[16px] flex items-center justify-center sm:hidden"
            style="background: linear-gradient(to right bottom, #eaff81, #C2FF9D 50%, #75A4FF 100%);">
            <div class="flex flex-col items-center justify-center gap-[1.6rem]">
                <p class="font-black text-[2.5rem]">{{ __('translate.notified_first') }}</p>
                <p class="font-normal text-[1.6rem]">{{ __('translate.get') }} <span
                        class="font-bold">{{ __('translate.personalised') }}</span>
                    {{ __('translate.via_email') }}</p>
                <form method="POST" action="/worldwide"
                    class="w-[42rem] h-[6.4rem] bg-white mt-[2.4rem] rounded-[3.2rem] flex items-center justify-between">
                    @csrf
                    <div class="flex gap-[1.6rem] ml-[3.2rem]">
                        <x-search-icon></x-search-icon>
                        <input name="subscribeEmail" type="email" placeholder="{{ __('translate.enter_email') }}" />
                    </div>
                    <button type="submit"
                        class="w-[10rem] h-[5rem] bg-[#0FBA68] rounded-[3.2rem] mr-[0.8rem] text-[1.4rem] font-black uppercase text-white tracking-wider">{{ __('translate.send') }}</button>

                </form>
            </div>

        </div>
        @if (session()->has('failure'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
                class="fixed py-4 px-8 rounded-xl bottom-12 right-12 text-3xl drop-shadow-xl bg-[#9b9b9d]">
                <p class="text-white font-medium">{{ session('failure') }}</p>
            </div>
        @endif
    </main>
@endsection
