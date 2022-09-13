<header class="flex h-[8rem] items-center justify-center border-b border-[
      #F6F6F7] bg-white">
    <div class="flex w-[85%] items-center justify-between">
        <div class="flex items-center justify-center"><img src="images/Group 1.png" class="h-[4.5rem]" /></div>
        <div class="flex gap-[1.6rem] h-[3.6rem] items-center justify-center">
            <div class="mr-[1.4rem] font-normal flex items-center justify-center gap-[0.7rem] text-[1.6rem]">
                <p>English</p><span><svg width="12" height="7" viewBox="0 0 12 7" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.19995 1.3999L5.99995 6.1999L10.8 1.3999" stroke="#010414" stroke-linecap="square" />
                    </svg>
                </span>
            </div>
            <div class="font-bold text-[1.6rem]">{{ auth()->user()->username }}</div>
            <span class="w-[1px] h-full bg-[#E6E6E7]"></span>
            <form method="POST" action="/logout">
                @csrf
                <button type="submit" class="font-medium text-[1.4rem]">Log Out</button>

            </form>
        </div>
    </div>
</header>
