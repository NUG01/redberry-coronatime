<div x-data="{ show: false }" @click.away="show= false" @click="show = ! show"
                class="cursor-pointer mr-[1.4rem] font-normal flex items-center justify-center gap-[0.7rem] text-[1.6rem] relative">
                <p>{{ Config::get('app.locale') == 'en' ? 'English' : 'Georgian' }}</p><span><svg width="12"
                        height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.19995 1.3999L5.99995 6.1999L10.8 1.3999" stroke="#010414" stroke-linecap="square" />
                    </svg>
                </span>
                <div x-show="show" style="display: none"
                    class="absolute -bottom-full left-0 grid w-full bg-[#f0f0f1] grid-cols-2 rounded-[4px] overflow-hidden	translate-y-[3.6px]">
                    <a href="/change-locale/en"
                        class="font-{{ Config::get('app.locale') == 'en' ? 'semibold' : 'normal' }} flex items-center justify-center border-r-[0.7px] border-[#93949b] hover:bg-[#d1d2d7]">EN</a>
                    <a href="/change-locale/ka"
                        class="font-{{ Config::get('app.locale') == 'en' ? 'normal' : 'semibold' }} flex items-center justify-center border-l-[0.7px] border-[#93949b] hover:bg-[#d1d2d7]">KA</a>

                </div>
            </div>