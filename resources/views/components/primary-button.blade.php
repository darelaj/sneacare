<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-[#0061DD] from-gray-700 to-gray-900 font-medium p-2 md:p-4 text-white py-auto uppercase w-full rounded-2xl']) }}>
    {{ $slot }}
</button>
