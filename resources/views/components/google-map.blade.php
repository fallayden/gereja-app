@props([
    'src' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.81956135000001!3d-6.194741399999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMTEnNDEuMSJTIDEwNsKwNDknMTAuNCJF!5e0!3m2!1sid!2sid!4v1600000000000!5m2!1sid!2sid',
    'height' => '400px',
])

<div id="lokasi" class="w-full overflow-hidden shadow-inner bg-slate-200 relative">
    <iframe src="{{ $src }}"
            style="height: {{ $height }};"
            class="w-full border-0 block"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</div>
