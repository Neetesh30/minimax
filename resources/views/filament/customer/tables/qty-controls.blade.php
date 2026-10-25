<div class="flex items-center gap-2">
    <x-filament::button
        size="sm"
        icon="heroicon-m-minus"
        wire:click="removeQty({{ $record->id }})"
        :disabled="($cart[$record->id] ?? 0) === 0"
    />
    <span class="w-6 text-center">
        {{ $cart[$record->id] ?? 0 }}
    </span>
    <x-filament::button
        size="sm"
        icon="heroicon-m-plus"
        wire:click="addQty({{ $record->id }})"
    />
</div>
