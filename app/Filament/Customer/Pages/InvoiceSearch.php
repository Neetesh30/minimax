<?php
namespace App\Filament\Customer\Pages;
use App\Models\Invoice;
use Filament\Pages\Page;
use Filament\Forms;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\Action;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction as ExcelHeaderExportAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction as ExcelBulkExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use Illuminate\Support\Facades\Auth;
use UnitEnum;
use BackedEnum;
use Filament\Support\Icons\Heroicon;

class InvoiceSearch extends Page implements Tables\Contracts\HasTable, Forms\Contracts\HasForms
{
    use Tables\Concerns\InteractsWithTable;
    use Forms\Concerns\InteractsWithForms;


    protected static ?string $navigationLabel = 'Invoices';
    protected static ?string $title = 'Invoices';
    protected string $view = 'filament.customer.pages.invoice-search';

    protected static string | UnitEnum | null $navigationGroup = 'Invoice';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::Calendar;

    public $pincode = null;
    public $searchClicked = false;

    // ✅ Show table only after search
        protected function shouldShowTable(): bool
        {
            return !empty($this->pincode);
        }

        public function getInvoiceCountProperty(): int
        {
            return $this->getTableQuery()->count();
        }


        public function search(): void
        {
            $this->searchClicked = true;
            $this->resetTable();
        }

        public function mount(): void
        {
            $this->pincode = auth('customer')->user()?->pincode;
        }


        public function getTableQuery()
        {
            $customerPincode = auth('customer')->user()?->pincode;
            $customerAccount = auth('customer')->user()?->customer_account;

            return Invoice::query()
                // ->when($customerPincode, fn($query) => 
                //     $query->where('pin_code', $customerPincode)

                // )
                
                ->when($customerAccount, fn($query) =>
                $query->where('customer_account', $customerAccount)
            );
        }
    

    protected function getTableColumns(): array
    {
        return [
             TextColumn::make('invoice_date')->label('Date')->searchable(),
            TextColumn::make('invoice_number')->label('Invoice No')->searchable(),
            TextColumn::make('customer')->label('Customer')->searchable(),
            TextColumn::make('product')->label('Product')->searchable(),
            TextColumn::make('code')->label('Code'),
            TextColumn::make('batch_no')->label('Batch No'),
            TextColumn::make('sr_no')->label('Sr No'),
        ];
    }

    // ✅ Export button (top right of table)
 // Header export — button on the top of the table
    protected function getTableHeaderActions(): array
    {
        return [
            ExcelHeaderExportAction::make()
                ->label('Export Invoices')
                ->exports([
                    // use fromTable() so it will resolve columns from your table
                    ExcelExport::make()->fromTable()
                        // set filename here (string or closure)
                        ->withFilename(fn () => 'invoices-' . now()->format('Y-m-d'))
                        // optional: force CSV or XLSX
                        // ->withWriterType(\Maatwebsite\Excel\Excel::XLSX)
                ]),
        ];
    }

    // Bulk export — export selected rows
    protected function getTableBulkActions(): array
    {
        return [
            ExcelBulkExportAction::make()
                ->label('Export Selected')
                ->exports([
                    ExcelExport::make()->fromTable()
                        ->withFilename(fn () => 'selected-invoices-' . now()->format('Y-m-d')),
                ]),
        ];
    }
    
}
