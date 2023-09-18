<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-16 py-5 bg-[#F5AF00]  border border-transparent rounded-full font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#E4B223] focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
