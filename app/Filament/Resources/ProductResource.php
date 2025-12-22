<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    protected static ?string $navigationLabel = 'Produk';

    protected static ?string $pluralModelLabel = 'Produk';

    protected static ?string $modelLabel = 'Produk';

    protected static ?string $navigationGroup = 'Toko';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required()
                    ->preload()
                    ->searchable(),

                Forms\Components\TextInput::make('name')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(
                        fn ($state, callable $set) => $set('slug', Str::slug($state))
                    ),

                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true),

                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),

                Forms\Components\Fieldset::make('Pricing')
                    ->schema([

                        Forms\Components\TextInput::make('cost_price')
                            ->label('Cost Price')
                            ->numeric()
                            ->prefix('Rp')
                            ->required(),

                        Forms\Components\TextInput::make('selling_price')
                            ->label('Selling Price')
                            ->numeric()
                            ->prefix('Rp')
                            ->required(),

                        Forms\Components\TextInput::make('stock')
                            ->numeric()
                            ->required(),

                    ])
                    ->columns(3),

                Forms\Components\Select::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                        'archived' => 'Archived',
                    ])
                    ->default('published')
                    ->required(),

                Forms\Components\Section::make('Gambar Produk')
                    ->schema([
                        Forms\Components\Repeater::make('media')
                            ->relationship('media')
                            ->schema([
                                Forms\Components\FileUpload::make('file_path')
                                    ->label('Upload Gambar')
                                    ->image()
                                    ->disk('public')
                                    ->directory('products')
                                    ->visibility('public')
                                    ->imagePreviewHeight('200')
                                    ->required(),

                                Forms\Components\Toggle::make('is_primary')
                                    ->label('Gambar Utama')
                                    ->default(false),

                                Forms\Components\TextInput::make('sort_order')
                                    ->label('Urutan')
                                    ->numeric()
                                    ->default(0),
                            ])
                            ->columns(3)
                            ->maxItems(5)
                            ->addActionLabel('Tambah Gambar')
                            ->defaultItems(0)
                            ->itemLabel(
                                fn (array $state): ?string => $state['is_primary'] ? 'Gambar Utama' : 'Gambar Tambahan'
                            )
                            ->collapsible(),
                    ])
                    ->collapsible(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('media_images')
                    ->label('GAMBAR')
                    ->circular()
                    ->stacked()
                    ->size(50)
                    ->limit(3)
                    ->limitedRemainingText()
                    ->disk('public')
                    ->getStateUsing(function ($record) {
                        return $record->media->pluck('file_path')->toArray();
                    }),

                Tables\Columns\TextColumn::make('name')
                    ->label('NAMA')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('category.name')
                    ->label('KATEGORI')
                    ->sortable(),

                Tables\Columns\TextColumn::make('selling_price')
                    ->label('HARGA')
                    ->money('IDR')
                    ->sortable(),

                Tables\Columns\TextColumn::make('stock')
                    ->label('STOK')
                    ->sortable(),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->label('STATUS')
                    ->color(fn (string $state) => match ($state) {
                        'draft' => 'gray',
                        'published' => 'success',
                        'archived' => 'warning',
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('DIBUAT PADA')
                    ->date()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                        'archived' => 'Archived',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('Edit')->button(),
                Tables\Actions\DeleteAction::make()->label('Hapus')->button(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // nanti bisa tambahkan ProductMediaRelationManager
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
