@props(['title', 'date', 'location', 'price', 'image', 'href' => null])

@php
// Format Indonesian price
$formattedPrice = $price ? 'Rp ' . number_format($price, 0, ',', '.') : 'Harga tidak tersedia';

$formattedDate = $date
? \Carbon\Carbon::parse($date)->locale('id')->translatedFormat('d F Y, H:i')
: 'Tanggal tidak tersedia';

// Safe image URL: use external URL if provided, otherwise use asset (storage path)
$imageUrl = $image
? (filter_var($image, FILTER_VALIDATE_URL)
? $image
: asset('images/events/' . $image))
: asset('images/konser.jpeg');

@endphp

<a href="{{ $href ?? '#' }}" class="block">
    <div class="bg-white rounded-lg h-96 shadow-sm hover:shadow-md transition-shadow duration-300 overflow-hidden">
        <div class="h-48 overflow-hidden bg-gray-100 flex items-center justify-center">
            <img 
                src="{{ $imageUrl }}" 
                alt="{{ $title }}" 
                class="max-w-full max-h-full object-contain"
            >
        </div>

        <div class="p-4">
            <h2 class="text-lg font-bold mb-2">
                {{ $title }}
            </h2>

            <p class="text-sm text-gray-500">
                {{ $formattedDate }}
            </p>

            <p class="text-sm">
                📍 {{ $location }}
            </p>

            <p class="font-bold text-lg mt-2">
                {{ $formattedPrice }}
            </p>

        </div>
    </div>
</a>