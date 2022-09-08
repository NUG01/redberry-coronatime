@extends('layouts.statistics')

@section('content')
    <main class="w-[85%] flex items-start flex-col m-auto">
        <div class="flex border-b border-[#F6F6F7] mt-[4rem]">
            <div>
                <p class="font-extrabold text-[2.5rem] mb-[4rem]">Worlwide Statistics</p>
                <div class="flex justify-between">
                    <a href="#" class="font-normal text-[1.6rem]">Worldwide</a>
                    <a href="#" class="font-bold text-[1.6rem] pb-[1.6rem] border-b-[3px] border-[#010414]">By
                        country</a>
                </div>
            </div>
        </div>
        <form method="GET" action="#" class="mt-[4rem]">
            <div class="relative">
                <input name="search" type="text"
                    class="h-[5rem] w-[24.3rem] bg-white rounded-[8px] border border-[#E6E6E7] flex items-center justify-center pl-[5rem]"
                    placeholder="Search by country">
                <button type="submit" class="absolute top-1/2 left-0 -translate-y-1/2 translate-x-full""><svg
                        width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M19.3333 19.3332L14 13.9998M8.66663 16.6665C4.24835 16.6665 0.666626 13.0848 0.666626 8.6665C0.666626 4.24823 4.24835 0.666504 8.66663 0.666504C13.0849 0.666504 16.6666 4.24823 16.6666 8.6665C16.6666 13.0848 13.0849 16.6665 8.66663 16.6665Z"
                            stroke="#010414" />
                    </svg></button>
            </div>
        </form>

        <!-- This example requires Tailwind CSS v2.0+ -->

        {{-- <div class="mt-[4rem] flex flex-col max-h-[63rem] w-full overflow-scroll">
              <div class="overflow-x-auto sm:-mx-6 h-full w-full">
                <div class="inline-block min-w-full py-2 px-8 align-middle"> --}}
        <div
            class="shadow ring-1 ring-black ring-opacity-5 md:rounded-lg max-h-[63rem] w-[100%]
              mt-[4rem] overflow-scroll">
            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-[#F6F6F7]">
                    <tr>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                            Name</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                            Title</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                            Email</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                            Role</th>
                        @for ($i = 0; $i < 9; $i++)
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6 media">
                                <span class="sr-only">Edit</span>
                            </th>
                        @endfor

                    </tr>
                </thead>
                <tbody class="divide-y divide-[#F6F6F7] bg-white ">
                    @for ($i = 0; $i < 23; $i++)
                        <tr>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                Lindsay Walton</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Front-end
                                Developer
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                lindsay.walton@example.com</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Member</td>
                            {{-- <td
                                            class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit<span
                                                    class="sr-only">, Lindsay Walton</span></a>
                                        </td> --}}
                        </tr>
                    @endfor
                    <!-- More people... -->
                </tbody>
            </table>
        </div>
        {{-- </div>
                  </div>
              </div> --}}







    </main>
@endsection
