<header class="flex h-[8rem] items-center justify-center border-b border-[
      #F6F6F7] bg-white">
    <div class="flex w-[85%] items-center justify-between">
        <div class="flex items-center justify-center"><img src="images/Group 1.png" class="h-[4.5rem]" /></div>
        <div class="flex gap-[1.6rem] h-[3.6rem] items-center justify-center">
            <x-languageDropdown></x-languageDropdown>
            <div class="font-bold text-[1.6rem]">{{ auth()->user()->username }}</div>
            <span class="w-[1px] h-full bg-[#E6E6E7]"></span>
            <form method="POST" action="/logout">
                @csrf
                <button type="submit" class="font-medium text-[1.4rem]">{{ __('translate.log_out') }}</button>

            </form>
        </div>
    </div>
</header>
