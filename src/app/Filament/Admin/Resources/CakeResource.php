<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\CakeResource\Pages;
use App\Models\Cake;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CakeResource extends Resource
{
    protected static ?string $model = Cake::class;

    protected static ?string $navigationIcon = 'heroicon-o-cake';
    protected static ?string $navigationLabel = 'Daftar Kue';
    protected static ?string $navigationGroup = 'Manajemen Produk';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama Kue')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Textarea::make('description')
                    ->label('Deskripsi')
                    ->maxLength(1000)
                    ->rows(3),

                Forms\Components\TextInput::make('price')
                    ->label('Harga')
                    ->required()
                    ->numeric()
                    ->prefix('Rp'),

                Forms\Components\FileUpload::make('image_path')
                    ->label('Gambar')
                    ->image()
                    ->directory('cakes')
                    ->imageEditor()
                    ->imagePreviewHeight('150px'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_path')
                    ->label('Gambar')
                    ->circular()
                    ->height(60)
                    ->width(60),

                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('price')
                    ->label('Harga')
                    ->money('IDR', true)
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCakes::route('/'),
            'create' => Pages\CreateCake::route('/create'),
            'edit' => Pages\EditCake::route('/{record}/edit'),
        ];
    }
}
