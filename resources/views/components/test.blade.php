<div class="mt-8 flex flex-col w-full px-4 sm:px-6 lg:px-8">
    <div class="-my-2 -mx-4 sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle">
            <div class="shadow-sm ring-1 ring-black ring-opacity-5 overflow-y-scroll h-[60rem] rounded-[8px]">
                <table class="min-w-full border-separate" style="border-spacing: 0">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="sticky top-0 z-10 border-b border-gray-300 bg-gray-50 bg-opacity-75 py-3.5 pl-4 pr-3 text-left text-[14px] font-semibold text-[#010414] backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">
                                Name</th>
                            <th scope="col"
                                class="sticky top-0 z-10 hidden border-b border-gray-300 bg-gray-50 bg-opacity-75 px-3 py-3.5 text-left text-[14px] font-semibold text-[#010414] backdrop-blur backdrop-filter sm:table-cell">
                                Title</th>
                            <th scope="col"
                                class="sticky top-0 z-10 hidden border-b border-gray-300 bg-gray-50 bg-opacity-75 px-3 py-3.5 text-left text-[14px] font-semibold text-[#010414] backdrop-blur backdrop-filter lg:table-cell">
                                Email</th>
                            <th scope="col"
                                class="sticky top-0 z-10 border-b border-gray-300 bg-gray-50 bg-opacity-75 px-3 py-3.5 text-left text-[14px] font-semibold text-[#010414] backdrop-blur backdrop-filter">
                                Role</th>

                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @for ($i = 0; $i < 30; $i++)
                            <tr>
                                <td
                                    class="whitespace-nowrap border-b border-gray-200 py-4 pl-4 pr-3 text-[14px] font-normal text-[#010414] sm:pl-6 lg:pl-8">
                                    Lindsay Walton</td>
                                <td
                                    class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-[14px] font-normal text-[#010414] hidden sm:table-cell">
                                    Front-end Developer</td>
                                <td
                                    class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-[14px] font-normal text-[#010414] hidden lg:table-cell">
                                    lindsay.walton@example.com</td>
                                <td
                                    class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-[14px] font-normal text-[#010414]">
                                    Member</td>

                            </tr>
                        @endfor
                        <!-- More people... -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
