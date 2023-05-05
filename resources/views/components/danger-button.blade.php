<button {{ $attributes->merge(['type' => 'submit', 'class' => 'text-white bg-red-600 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-600 dark:focus:ring-red-800']) }}>
    {{ $slot }}
</button>
