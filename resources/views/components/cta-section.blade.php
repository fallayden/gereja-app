@props([
    'headline' => 'Mari Bertumbuh dan Beribadah Bersama Kami!',
    'buttonText' => 'Temukan Kami',
    'buttonUrl' => '#lokasi',
])

<section class="bg-primary text-white py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto text-center">
        <h2 class="font-display text-2xl md:text-4xl font-bold tracking-tight text-white mb-6">
            {{ $headline }}
        </h2>
        <p class="text-blue-100 text-base md:text-lg mb-8 max-w-2xl mx-auto">
            Kami menyambut Anda dengan hangat untuk menjadi bagian dari keluarga Allah di GBIA GRAMMATA.
        </p>
        <div>
            <x-button :href="$buttonUrl" variant="primary" class="text-base px-8 py-3.5 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition">
                📍 {{ $buttonText }}
            </x-button>
        </div>
    </div>
</section>
