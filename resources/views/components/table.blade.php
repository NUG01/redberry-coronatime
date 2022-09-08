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
      