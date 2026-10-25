<main class="mt-16">
    

    <livewire:page-banner />
    
    <div class="flex flex-col h-screen">

    <div class="flex flex-col md:flex-row flex-1 overflow-hidden">

        <div class="md:w-2/5 w-full overflow-y-auto p-4 border-r mb-10">
            @forelse($stores as $store)
                <div class="border p-3 mb-3 rounded cursor-pointer bg-gray-100 hover:bg-white transition-colors"
                     onclick="focusStore({{ $store['latitude'] }},
                                          {{ $store['longitude'] }},
                                          `{!! addslashes($store['title']) !!}`,
                                          `{!! addslashes($store['subtitle']) !!}`,
                                          `{!! addslashes($store['address']) !!}`,
                                          '{{ $store['phone'] }}',
                                          '{{ $store['email'] }}')">

                    <h2 class="text-1xl pb-1"><strong>{{ $store['title'] }}</strong></h2>
                    <p class="text-md  text-slate-500 pb-3">{{ $store['subtitle'] }}</p> 
                    <p><strong>Address:</strong>  {!! addslashes($store['address']) !!}</p>
                    <p><strong>Phone:</strong> {{ $store['phone'] }}</p>
                    <p><strong>Email:</strong> {{ $store['email'] }}</p>
                </div>
            @empty
                <p>No stores found.</p>
            @endforelse
        </div>

        <div class="md:w-3/5 w-full h-64 md:h-full">
            <div id="map" wire:ignore class="h-full" style="max-width:90vw; z-index: 10; margin:0 auto; min-height:700px"></div>
        </div>
    </div>

    <script>
    let map;
    let markerCluster;
    let storeIcon, activeStoreIcon;
    let activeMarker = null;
    let storeMarkers = {};

    document.addEventListener('DOMContentLoaded', () => {
        // 1. Initialize Icons
        storeIcon = L.icon({
            iconUrl: '{{ asset('front/images/favicon.png') }}',
            iconSize: [40, 40],
            iconAnchor: [20, 40],
            popupAnchor: [0, -35],
        });

        activeStoreIcon = L.icon({
            iconUrl: '{{ asset('front/images/favicon.png') }}',
            iconSize: [45, 45], // Slightly larger for emphasis
            iconAnchor: [22, 45],
            popupAnchor: [0, -40],
        });

        // 2. Initialize Map
        const indiaBounds = L.latLngBounds([6.554607, 68.111378], [35.674545, 97.395561]);
        map = L.map('map', {
            maxBounds: indiaBounds,
            maxBoundsViscosity: 1.0,
            minZoom: 5,
            maxZoom: 18,
        }).setView([22.9734, 78.6569], 5);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap'
        }).addTo(map);

        markerCluster = L.markerClusterGroup({
            showCoverageOnHover: false,
            maxClusterRadius: 60,
            spiderfyOnMaxZoom: true
        });
        map.addLayer(markerCluster);

        // 3. LOAD INITIAL MARKERS
        const initialStores = @json($stores);
        renderStoreMarkers(initialStores);
    });

    // Reusable function to draw markers
    function renderStoreMarkers(stores) {
        markerCluster.clearLayers();
        storeMarkers = {};
        activeMarker = null;

        stores.forEach(s => {
            let popupContent = `
                <div class="p-1">
                    <h2 class="text-lg font-bold">${s.title}</h2>
                    <p>${s.subtitle ?? ''}</p>
                    <p>${s.address}</p>
                    <p>📞 ${s.phone ?? '-'}</p>
                    <p>✉️ ${s.email ?? '-'}</p>
                    <a class="text-blue-600 font-bold underline mt-2 block" target="_blank"
                       href="https://www.google.com/maps/dir/?api=1&destination=${s.latitude},${s.longitude}">
                       Get Directions
                    </a>
                </div>
            `;

            let marker = L.marker([s.latitude, s.longitude], {
                icon: storeIcon
            }).bindPopup(popupContent);

            markerCluster.addLayer(marker);
            storeMarkers[s.id] = marker;
        });
    }

    // Handle Livewire updates with a smooth "Fly" to results
    Livewire.on('updateMap', e => {
        renderStoreMarkers(e.stores);
        if (e.stores.length > 0) {
            const bounds = markerCluster.getBounds();
            map.flyToBounds(bounds, { padding: [50, 50], duration: 1.5 });
        }
    });

    // Center map on search using flyTo
    Livewire.on('centerMap', e => {
        map.flyTo([e.lat, e.lng], 12, {
            animate: true,
            duration: 1.5
        });
    });

    // 👉 Click store from LEFT LIST - Smooth Fly Animation
    function focusStore(lat, lng, title, subtitle, address, phone, email) {
        // Smooth Jump Animation
        map.flyTo([lat, lng], 15, {
            animate: true,
            duration: 1.5, // 1.5 seconds for a graceful movement
            easeLinearity: 0.25
        });

        // Clean up existing active marker
        if (activeMarker) {
            map.removeLayer(activeMarker);
        }

        // Add a temporary highlighted marker at the focused location
        activeMarker = L.marker([lat, lng], {
            icon: activeStoreIcon
        })
        .addTo(map)
        .bindPopup(`
            <div class="p-1">
                <h2 class="text-lg font-bold">${title}</h2>
                <p>${subtitle ?? ''}</p>
                <p>${address}</p>
                <p>📞 ${phone ?? '-'}</p>
                <p>✉️ ${email ?? '-'}</p>
                <a class="text-blue-600 font-bold underline mt-2 block" target="_blank"
                   href="https://www.google.com/maps/dir/?api=1&destination=${lat},${lng}">
                   Get Directions
                </a>
            </div>
        `)
        
        // Wait for the fly animation to finish slightly before opening popup
        setTimeout(() => {
            activeMarker.openPopup();
        }, 1200);
    }
</script>

</div>
</main>