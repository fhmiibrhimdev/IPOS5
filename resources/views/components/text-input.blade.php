@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'tw-border-gray-300 dark:tw-border-gray-700 dark:tw-bg-gray-900 dark:tw-text-gray-300 focus:tw-border-indigo-500 dark:focus:tw-border-indigo-600 focus:tw-ring-indigo-500 dark:focus:tw-ring-indigo-600 tw-rounded-md tw-shadow-sm']) !!}>
