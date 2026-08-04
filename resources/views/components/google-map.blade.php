@props([
    'src' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.136426090889!2d106.6135027745852!3d-6.245746293742612!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fc6d411623db%3A0xadf0c541a4ff09c1!2sGBIA%20Grammata!5e0!3m2!1sid!2sid!4v1785846317667!5m2!1sid!2sid',
    'height' => '450px',
])

<div id="lokasi" class="w-full overflow-hidden bg-slate-200 relative shadow-inner">
    <iframe src="{{ $src }}"
            style="height: {{ $height }};"
            class="w-full border-0 block"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="strict-origin-when-cross-origin">
    </iframe>
</div>
