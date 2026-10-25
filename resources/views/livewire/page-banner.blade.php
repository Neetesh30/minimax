<main>
   <section style="margin-top:64px">
    @if($banner)
            <img
                src="{{ asset('storage/' . $banner->image) }}"
                class="w-full h-full object-cover"
                alt="Page Banner"
            >
        @endif
</section>
</main>
