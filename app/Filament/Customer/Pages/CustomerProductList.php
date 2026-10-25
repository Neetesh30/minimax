<?php

namespace App\Filament\Customer\Pages;

use App\Models\Product;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Collection;
use Barryvdh\DomPDF\Facade\Pdf;
use Symfony\Component\HttpFoundation\StreamedResponse;

use App\Mail\PriceListRequestMail;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Mail;
use UnitEnum;
use BackedEnum;
use Filament\Support\Icons\Heroicon;

class CustomerProductList extends Page
{
    
    protected string $view = 'filament.customer.pages.customer-product-list';
    protected static ?string $navigationLabel = 'Products';
    protected static ?string $title = 'Product Price List';


     protected static string | UnitEnum | null $navigationGroup = 'Products';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::ShoppingCart;

    public array $cart = [];

    public function mount(): void
    {
        $this->cart = Session::get('cart', []);
    }

    public function addQty(int $productId): void
    {
        $this->cart[$productId] = ($this->cart[$productId] ?? 0) + 1;
        $this->syncCart();
    }

    public function removeQty(int $productId): void
    {
        if (! isset($this->cart[$productId])) {
            return;
        }

        $this->cart[$productId]--;

        if ($this->cart[$productId] <= 0) {
            unset($this->cart[$productId]);
        }

        $this->syncCart();
    }

    public function syncCart(): void
    {
        Session::put('cart', $this->cart);
    }

    public function getProductsProperty()
    {
        return Product::query()
        ->where('status', true)
        ->get()
        ;
    }

    public function getQty(int $productId): int
    {
        return $this->cart[$productId] ?? 0;
    }

    public function getLineTotal(Product $product): float
    {
        return $this->getQty($product->id) * $product->price;
    }

    public function getGrandTotalProperty(): float
    {
        return collect($this->products)
            ->sum(fn ($product) => $this->getLineTotal($product));
    }

    public function getSelectedProductsProperty(): Collection
{
    return $this->products
        ->filter(fn ($product) => $this->getQty($product->id) > 0)
        ->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'product_code' => $product->product_code,
                'capacity' => $product->capacity,
                'price' => $product->price,
                'qty' => $this->getQty($product->id),
                'total' => $this->getLineTotal($product),
            ];
        });
}

public function removeProduct(int $productId): void
{
    unset($this->cart[$productId]);
    $this->syncCart();
}

public function downloadPdf(): StreamedResponse
{
    abort_if($this->selectedProducts->isEmpty(), 403);

    $pdf = Pdf::loadView('pdf.price-list', [
        'items' => $this->selectedProducts->values(),
        'grandTotal' => $this->grandTotal,
    ]);

    return response()->streamDownload(
        fn () => print($pdf->output()),
        'price-list-' . now()->format('YmdHis') . '.pdf'
    );
}


public function emailPdf(): void
{
    abort_if($this->selectedProducts->isEmpty(), 403);

    $user = filament()->auth()->user();

    abort_if(! $user, 403);

    Mail::to(config('mail.admin_email'))
        ->send(new PriceListRequestMail(
            items: $this->selectedProducts->values()->toArray(),
            grandTotal: $this->grandTotal,
            customerName: $user->name,
            customerEmail: $user->email,
        ));

    Notification::make()
        ->title('Price list sent successfully')
        ->success()
        ->send();
    }
}
