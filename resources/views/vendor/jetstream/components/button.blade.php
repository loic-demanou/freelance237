<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2
bg-indigo-700 border border-transparent rounded-md font-semibold text-sm text-white   
tracking-widest hover:bg-indigo-500 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 
focus:shadow-outline-indigo disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
