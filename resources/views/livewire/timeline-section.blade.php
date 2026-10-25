<section
  x-data="{
    active: 0,
    total: {{ $timelines->count() }},
    timer: null,

    indicatorLeft: 0,
    indicatorWidth: 0,

    start() {
      this.timer = setInterval(() => {
        this.next()
      }, 15000)
    },

    reset() {
      clearInterval(this.timer)
      this.start()
    },

    next() {
      this.active = (this.active + 1) % this.total
      this.scrollTab()
      this.moveIndicator(this.$refs['tab' + this.active])
      this.reset()
    },

    prev() {
      this.active = this.active > 0 ? this.active - 1 : this.total - 1
      this.scrollTab()
      this.moveIndicator(this.$refs['tab' + this.active])
      this.reset()
    },

    scrollTab() {
      if (window.innerWidth < 768) {
        this.$nextTick(() => {
          this.$refs['tab' + this.active]?.scrollIntoView({
            behavior: 'smooth',
            inline: 'center',
            block: 'nearest'
          })
        })
      }
    },

    moveIndicator(el) {
      if (!el) return
      this.$nextTick(() => {
        this.indicatorLeft = el.offsetLeft
        this.indicatorWidth = el.offsetWidth
      })
    }
  }"
  x-init="
    start();
    moveIndicator($refs.tab0);
  "
  class="bg-gray-100 py-24"
>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative overflow-hidden">

    <!-- Header -->
    <div class="text-left">
      <p class="blue text-sm font-bold uppercase mb-3 tracking-widest">History</p>
      <h2 class="text-4xl font-bold mb-10">Our Timeline</h2>
    </div>

    <div class="relative">

      <!-- Arrows -->
      <div class="flex justify-end space-x-4 mb-4">

          <!-- Arrows -->
        <div class="flex justify-end space-x-4 mb-5">
            <button id="prev-testimonial"
             @click="prev()"
            class="arrow left p-3 rounded-full border border-gray-300 text-gray-500 hover:bg-gray-100 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </button>

            <button id="next-testimonial" 
             @click="next()"
            class="arrow right p-3 rounded-full border border-gray-300 text-gray-500 hover:bg-gray-100 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                </svg>
            </button>
        </div>

     
      </div>

      <!-- Tabs -->
      <div class="relative overflow-x-auto">
        <div class="tab_box relative flex gap-6 border-b border-gray-200 pb-3 whitespace-nowrap">

          @foreach ($timelines as $index => $timeline)
            <div
              x-ref="tab{{ $index }}"
              @click="
                active = {{ $index }};
                scrollTab();
                moveIndicator($refs['tab{{ $index }}']);
                reset();
              "
              :class="active === {{ $index }}
                ? 'tab_btn cursor-pointer text-sm font-medium text-yellow-600 pb-2'
                : 'tab_btn cursor-pointer text-sm font-medium text-gray-600 hover:text-orange-600 pb-2'"
            >
              {{ $timeline->title }}
            </div>
          @endforeach

          <!-- Absolute Orange Indicator -->
          <span
            class="absolute bottom-0 h-[2px] bg-orange-500 transition-all duration-300"
            :style="{
              left: indicatorLeft + 'px',
              width: indicatorWidth + 'px'
            }"
          ></span>

        </div>
      </div>

      <!-- Content Box -->
      <div class="content_box mt-6">

        @foreach ($timelines as $index => $timeline)
          <div
            :class="active === {{ $index }}
              ? 'content active block'
              : 'content hidden'"
          >
            <div class="flex flex-col md:flex-row gap-6 items-start">
              <div class="w-full md:w-1/3">
                <img
                  src="{{ $timeline->image_url }}"
                  alt="{{ $timeline->title }}"
                  class="rounded-lg object-cover w-full h-full"
                >
              </div>

              <div class="w-full md:w-2/3">
                <h2 class="text-xl font-semibold mb-2 text-orange-500">
                  {{ $timeline->title }}
                </h2>

                <p class="text-gray-600 text-sm leading-relaxed">
                  {{ $timeline->description }}
                </p>
              </div>
            </div>
          </div>
        @endforeach

      </div>

    </div>
  </div>
</section>
