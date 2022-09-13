<div class="flex items-start justify-center pt-[0.7rem] pr-[0.3rem]">
    <a href="/change-locale/en"
        class="text-[16px] border-r-[0.7px] border-[#808189] pr-[3px] font-{{ Config::get('app.locale') == 'en' ? 'semibold' : 'normal' }}">EN</a>
    <a href="/change-locale/ka"
        class="text-[16px] border-l-[0.7px] border-[#808189] pl-[3px] font-{{ Config::get('app.locale') == 'en' ? 'normal' : 'semibold' }}">KA</a>

</div>
