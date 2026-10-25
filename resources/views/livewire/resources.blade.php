<div wire:ignore>
<main>

  
<livewire:page-banner />


<section class="bg-gray-50">
  <div class="max-w-7xl mx-auto">
    <div class="flex flex-col md:flex-row py-8">

      <div class="p-6">
        <div id="folderView" class="p-6">

          <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($categories as $category)
              <div class="folder text-2xl border border-gray-200"
                   data-folder="{{ $category->slug }}">
                📁 {{ $category->name }}
              </div>

            @endforeach
          </div>
        </div>
      </div>

      

      <div id="pdfView" class="hidden p-6">
        <button id="backBtn" class="w-full sm:w-auto px-7 py-3 text-lg font-medium rounded-full backdrop-blur-md blue border border-orange/30 shadow-lg cursor-pointer animate-slide-in-up delay-2 mb-5"> ← Back</button>
        <div id="pdfGrid" class="grid grid-cols-1 md:grid-cols-4 gap-5"></div>
      </div>

      <main class="flex-1 relative">
        <div id="flipbookModal" class="modal-overlay hidden">
          <div class="modal-content">
            <button id="closeModal" class="close-btn">✕</button>
            <div id="flipbookContainer"></div>
          </div>
        </div>
      </main>

    </div>
  </div>
</section>
</main>
</div>

<script>
    const pdfData = @js($pdfData);
</script>



