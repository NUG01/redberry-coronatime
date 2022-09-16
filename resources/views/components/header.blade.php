<header class="flex h-[8rem] items-center justify-center border-b border-[
      #F6F6F7] bg-white">
    <div class="flex w-[85%] items-center justify-between">
        <div class="flex items-center justify-center"><img src="images/Group 1.png" class="h-[4.5rem]" /></div>
        <div class="flex gap-[1.6rem] h-[3.6rem] items-center justify-center">
            <x-languageDropdown></x-languageDropdown>
            <div class="font-bold sm:hidden text-[1.6rem]">{{ auth()->user()->username }}</div>
            <span class="w-[1px] sm:hidden h-full bg-[#E6E6E7]"></span>
            <form method="POST" action="/logout" class="sm:hidden">
                @csrf
                <button type="submit" class="font-medium text-[1.4rem]">{{ __('translate.log_out') }}</button>

            </form>
            <div>
                <div class="cursor-pointer hidden sm:block" x-data="{ show: false }" @click.away="show= false"
                    @click="show = ! show" class="hidden menu"><svg width="18" height="16" viewBox="0 0 18 16"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0H18V2H0V0ZM6 7H18V9H6V7ZM0 14H18V16H0V14Z" fill="#09121F" />
                    </svg>

                    <div class="flex flex-col items-center justify-center rounded-bl-[6px] absolute top-[9%] h-[7rem] w-[27%] right-0 bg-[#e9e7e75e]"
                        x-show="show" style="display: none">
                        <div class="font-bold text-[1.6rem] mb-[7px] border-b-[1px]">{{ auth()->user()->username }}
                        </div>
                        <form method="POST" action="/logout">
                            @csrf
                            <button type="submit"
                                class="font-medium text-[1.4rem]">{{ __('translate.log_out') }}</button>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</header>
