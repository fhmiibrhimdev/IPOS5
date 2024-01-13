@props(['value'])

<label {{ $attributes->merge(['class' => 'tw-block tw-font-medium tw-text-sm tw-text-gray-700 dark:tw-text-gray-300']) }}>
    {{ $value ?? $slot }}
</label>
