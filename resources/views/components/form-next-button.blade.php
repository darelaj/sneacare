<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-[200px] h-[50px] bg-purple-100 rounded-[30px]']) }}>
    {{ $slot }}
</button>
