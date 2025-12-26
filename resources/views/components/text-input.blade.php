@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-bsi-teal focus:ring-bsi-teal rounded-xl shadow-sm px-4 py-3 text-base text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-opacity-20 transition duration-150 ease-in-out bg-gray-50 focus:bg-white']) !!}>