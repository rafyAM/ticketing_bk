@props(['active' => false, 'label' => ''])

<button {{ $attributes->merge([
  'class' => 'inline-flex items-center justify-center px-6 py-2 text-sm rounded-full font-medium transition-all border ' .
    ($active
      ? 'bg-blue-800 text-white border-blue-800 hover:bg-blue-900'
      : 'bg-white border-blue-900 text-blue-900 hover:bg-blue-900 hover:text-white')
]) }}>
  {{ $label }}
</button>
