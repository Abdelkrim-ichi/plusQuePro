@props(['disabled' => false])
<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-textarea block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md']) !!}></textarea>
