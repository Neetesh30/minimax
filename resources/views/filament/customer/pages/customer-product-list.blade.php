<x-filament::page>
    <div class="space-y-6">

        {{-- Product Inventory/All Products Table --}}
        <div class="overflow-x-auto bg-white rounded-xl shadow-lg mb-0">
            <table class="w-full text-sm divide-y divide-gray-200 min-w-full">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-2 px-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Image</th>
                        <th class="py-2 px-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</th>
                        <th class="py-2 px-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Code</th>
                        <th class="py-2 px-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Capacity</th>
                        <th class="py-2 px-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Price</th>
                        <th class="py-2 px-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Qty</th>
                        <th class="py-2 px-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Total</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @foreach($this->products as $product)
                        <tr class="hover:bg-gray-50">
                            {{-- Image Cell --}}
                            <td class="py-2 px-6 whitespace-nowrap">
                                <img
                                    src="{{ asset('storage/' . $product->image) }}"
                                    class="h-12 w-12 object-cover rounded-md"
                                    alt="{{ $product->name }}"
                                />
                            </td>

                            {{-- Product Data Cells --}}
                            <td class="py-2 px-6 whitespace-nowrap">{{ $product->name }}</td>
                            <td class="py-2 px-6 whitespace-nowrap">{{ $product->product_code }}</td>
                            <td class="py-2 px-6 whitespace-nowrap">{{ $product->capacity }}</td>
                            <td class="py-2 px-6 whitespace-nowrap font-medium">₹{{ number_format($product->price, 2) }}</td>

                            {{-- Quantity Control Cell (using Livewire actions) --}}
                            <td class="py-2 px-6 whitespace-nowrap">
                                <div class="flex items-center gap-2">
                                    <x-filament::button
                                        size="xs"
                                        :disabled="$this->getQty($product->id) === 0"
                                        wire:click="removeQty({{ $product->id }})"
                                    >
                                        -
                                    </x-filament::button>

                                    <span class="w-6 text-center font-semibold">
                                        {{ $this->getQty($product->id) }}
                                    </span>

                                    <x-filament::button
                                        size="xs"
                                        wire:click="addQty({{ $product->id }})"
                                    >
                                        +
                                    </x-filament::button>
                                </div>
                            </td>

                            {{-- Line Total Cell --}}
                            <td class="py-2 px-6 whitespace-nowrap font-semibold">
                                ₹{{ number_format($this->getLineTotal($product), 2) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
           
        </div>

        {{-- Grand Total Summary Block (for all products in the list) --}}
        <div class="flex justify-end">
            <div class="bg-gray-50 p-4 rounded-xl w-64 border border-gray-200">
                <div class="flex justify-between font-bold text-lg">
                    <span>Grand Total</span>
                    <span>₹{{ number_format($this->grandTotal, 2) }}</span>
                </div>
            </div>
        </div>


        {{-- Selected Products Table (Conditional Display) --}}
        @if($this->selectedProducts->isNotEmpty())
            <div class="overflow-x-auto bg-white rounded-xl shadow-lg p-6 mt-6 border border-gray-100">
                <h2 class="text-xl font-bold mb-4 text-gray-800">✅ Selected Products for Export</h2>

                <table class="w-full text-sm divide-y divide-gray-200 min-w-full">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="py-2 px-6 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Product</th>
                            <th class="py-2 px-6 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Code</th>
                            <th class="py-2 px-6 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Capacity</th>
                            <th class="py-2 px-6 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Price</th>
                            <th class="py-2 px-6 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Qty</th>
                            <th class="py-2 px-6 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Total</th>
                            <th class="py-2 px-6"></th> {{-- Action Column Header --}}
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                        @foreach($this->selectedProducts as $item)
                            <tr class="hover:bg-gray-50">
                                <td class="py-2 px-6 whitespace-nowrap">{{ $item['name'] }}</td>
                                <td class="py-2 px-6 whitespace-nowrap">{{ $item['product_code'] }}</td>
                                <td class="py-2 px-6 whitespace-nowrap">{{ $item['capacity'] }}</td>
                                <td class="py-2 px-6 whitespace-nowrap">₹{{ number_format($item['price'], 2) }}</td>
                                <td class="py-2 px-6 whitespace-nowrap">{{ $item['qty'] }}</td>
                                <td class="py-2 px-6 whitespace-nowrap font-medium">₹{{ number_format($item['total'], 2) }}</td>
                                <td class="py-2 px-6">
                                    <x-filament::button
                                        color="danger"
                                        size="xs"
                                        wire:click="removeProduct({{ $item['id'] }})"
                                    >
                                        Remove
                                    </x-filament::button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Summary for Selected Products --}}
                <div class="flex justify-end mt-4">
                    <div class="text-right font-bold text-lg">
                        Grand Total:
                        <span class="ml-2 text-primary-600">
                            ₹{{ number_format($this->grandTotal, 2) }}
                        </span>
                    </div>
                </div>
            </div>
        @endif


        {{-- Actions Buttons --}}
        <div class="flex justify-end gap-3 mt-8 flex-wrap-reverse">
            <x-filament::button
                color="primary"
                icon="heroicon-o-arrow-down-tray"
                wire:click="downloadPdf"
            >
                Download Price List PDF
            </x-filament::button>

            <x-filament::button
                color="success"
                icon="heroicon-o-paper-airplane"
                wire:click="emailPdf"
            >
                Email to Admin
            </x-filament::button>
        </div>


    </div>
</x-filament::page>