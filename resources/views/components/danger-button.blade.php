<button {{ $attributes->merge(['type' => 'submit', 'class' => ' bg-red-500 active:bg-red-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150']) }}>
    {{ $slot }}
</button>
