<div class="flex items-center gap-2">
    <x-filament::button
        size="xs"
        wire:click="removeQty({{ $record->id }})"
        :disabled="($cart[$record->id] ?? 0) === 0"
    >
        -
    </x-filament::button>

    <span class="w-6 text-center">
        {{ $cart[$record->id] ?? 0 }}
    </span>

    <x-filament::button
        size="xs"
        wire:click="addQty({{ $record->id }})"
    >
        +
    </x-filament::button>
</div>
