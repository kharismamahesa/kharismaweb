<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PreorderResource\Pages;
use App\Models\Preorder;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class PreorderResource extends Resource
{
    protected static ?string $model = Preorder::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    protected static ?string $navigationLabel = 'Pre Order';

    protected static ?string $pluralModelLabel = 'Pre Order';

    protected static ?string $modelLabel = 'Pre Order';

    protected static ?string $navigationGroup = 'Toko';

    public static function form(Form $form): Form
    {
        return $form->schema([

            /* ===============================
             * DATA PO
             * =============================== */
            Forms\Components\Section::make('Informasi Pre Order')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(
                            fn ($state, callable $set) => $set('code', Str::upper(Str::slug($state, '_')))
                        ),

                    Forms\Components\TextInput::make('code')
                        ->required()
                        ->unique(ignoreRecord: true),

                    Forms\Components\Textarea::make('description')
                        ->columnSpanFull(),
                ])
                ->columns(2),

            /* ===============================
             * PERIODE PO
             * =============================== */
            Forms\Components\Section::make('Periode PO')
                ->schema([
                    Forms\Components\DateTimePicker::make('started_at')
                        ->label('PO Dibuka')
                        ->required(),

                    Forms\Components\DateTimePicker::make('closed_at')
                        ->label('PO Ditutup')
                        ->required(),

                    Forms\Components\DateTimePicker::make('estimated_arrival_at')
                        ->label('Estimasi Tiba'),
                ])
                ->columns(3),

            /* ===============================
             * PRODUK DALAM PO
             * =============================== */
            Forms\Components\Section::make('Produk PO')
                ->schema([
                    Forms\Components\Repeater::make('items')
                        ->relationship()
                        ->schema([
                            Forms\Components\Select::make('product_id')
                                ->relationship('product', 'name')
                                ->searchable()
                                ->preload()
                                ->required(),

                            Forms\Components\TextInput::make('preorder_price')
                                ->label('Harga PO')
                                ->numeric()
                                ->prefix('Rp')
                                ->required(),
                        ])
                        ->columns(2)
                        ->minItems(1)
                        ->addActionLabel('Tambah Produk'),
                ]),

            /* ===============================
             * STATUS
             * =============================== */
            Forms\Components\Select::make('status')
                ->options([
                    'open' => 'Open',
                    'closed' => 'Closed',
                    'arrived' => 'Arrived',
                    'cancelled' => 'Cancelled',
                ])
                ->default('open')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->label('JUDUL')
                    ->sortable(),

                Tables\Columns\TextColumn::make('code')
                    ->label('KODE')
                    ->badge(),

                Tables\Columns\TextColumn::make('started_at')
                    ->label('TGL MULAI')
                    ->dateTime(),

                Tables\Columns\TextColumn::make('closed_at')
                    ->label('TGL TUTUP')
                    ->dateTime(),

                // bisa kah tampilkan jumlah produk dalam preorder?
                Tables\Columns\TextColumn::make('items_count')
                    ->label('JUMLAH PRODUK')
                    ->counts('items')
                    ->sortable(),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->label('STATUS')
                    ->color(fn ($state) => match ($state) {
                        'open' => 'success',
                        'closed' => 'warning',
                        'arrived' => 'info',
                        'cancelled' => 'danger',
                    }),
            ])
            ->defaultSort('started_at', 'desc')
            ->actions([
                Tables\Actions\EditAction::make()->button(),
                Tables\Actions\DeleteAction::make()->button(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPreorders::route('/'),
            'create' => Pages\CreatePreorder::route('/create'),
            'edit' => Pages\EditPreorder::route('/{record}/edit'),
        ];
    }
}
