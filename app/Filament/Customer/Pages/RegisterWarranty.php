<?php

namespace App\Filament\Customer\Pages;

use App\Mail\NewWarrantyRegistration; // Import
use App\Mail\WarrantyRegistrationConfirmation; // Import
use App\Models\Invoice;
use App\Models\WarrantyRegistration;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\{TextInput, Select, Grid, Section};
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Grid as ComponentsGrid;
use Filament\Schemas\Components\Section as ComponentsSection;
use Illuminate\Support\Facades\Mail;
use UnitEnum;
use BackedEnum;
use Filament\Support\Icons\Heroicon;

class RegisterWarranty extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static ?string $title = 'Warranty Registration';
    protected string $view = 'filament.customer.pages.register-warranty';

    protected static string | UnitEnum | null $navigationGroup = 'Warranty Registration';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::CheckBadge;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    protected function getFormStatePath(): ?string
    {
        return 'data';
    }

    /** ---------- FORM SCHEMA ---------- **/
    protected function getFormSchema(): array
    {
        return [
            Select::make('type')
                ->label('Select Type')
                ->options([
                    'customer' => 'Customer',
                    'dealer' => 'Dealer',
                ])
                ->default('customer')
                ->reactive()
                ->required(),

            ComponentsSection::make('Warranty Registration Form')
                ->schema(function (callable $get) {
                    $type = $get('type');

                    if ($type === 'dealer') {
                        // Dealer form fields
                        return [
                            ComponentsGrid::make(2)->schema([
                                TextInput::make('organisation_name')->label('Organisation / Individual Name')->required(),
                                TextInput::make('gunnebo_invoice_no')->label('Gunnebo Invoice No')->required(),
                                TextInput::make('dealer_invoice_no')->label('Dealer Invoice No')->required(),
                                TextInput::make('end_customer_name')->label('Customer Name')->required(),
                                TextInput::make('batch_no')->label('Batch No')->required(),
                                TextInput::make('serial_from')->label('Serial Number From')->required(),
                                TextInput::make('serial_to')->label('Serial Number To')->required(),
                                TextInput::make('mobile')->label('Mobile No')->tel()->required(),
                                TextInput::make('email')->label('Email')->email()->required(),
                            ]),
                        ];
                    }

                    // Customer form fields
                    return [
                        ComponentsGrid::make(2)->schema([
                            TextInput::make('organisation_name')->label('Organisation / Individual Name')->required(),
                            TextInput::make('batch_no')->label('Batch No')->required(),
                            TextInput::make('serial_from')->label('Serial Number From')->required(),
                            TextInput::make('serial_to')->label('Serial Number To')->required(),
                            TextInput::make('mobile')->label('Mobile No')->tel()->required(),
                            TextInput::make('email')->label('Email')->email()->required(),
                        ]),
                    ];
                }),
        ];
    }

    /** ---------- SUBMIT LOGIC ---------- **/
    public function submit(): void
    {
        $data = $this->form->getState();

        // ✅ Validate batch number
        if (!Invoice::where('batch_no', $data['batch_no'])->exists()) {
            Notification::make()
                ->danger()
                ->title('Invalid Batch Number')
                ->body('This batch number is not available in our database.')
                ->send();
            return;
        }

        // ✅ Save data
        $registration = WarrantyRegistration::create($data);

        // ✅ Send emails (pass variable explicitly)
        $this->sendEmails($registration);

        // ✅ Success message
        Notification::make()
            ->success()
            ->title('Warranty Registered Successfully')
            ->body('Thank you for registering your Minimax Fire Extinguisher warranty.')
            ->send();

        // ✅ Reset form
        $this->form->fill();
    }

    /** ---------- FORM ACTIONS ---------- **/
    protected function getFormActions(): array
    {
        return [
            Action::make('submit')
                ->label('Register Warranty')
                ->button()
                ->submit('submit'),
        ];
    }

    /** ---------- EMAIL LOGIC ---------- **/
    protected function sendEmails(WarrantyRegistration $registration): void
    {
        $adminEmail = config('mail.from.address', 'info@minimax.co.in');

        // Email to registrant (using Mailable)
        Mail::to($registration->email)->send(new WarrantyRegistrationConfirmation($registration));

        // Email to admin (using Mailable)
        Mail::to($adminEmail)->send(new NewWarrantyRegistration($registration));
    }
}
