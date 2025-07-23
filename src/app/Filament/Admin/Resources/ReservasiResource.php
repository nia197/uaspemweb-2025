<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ReservasiResource\Pages;
use App\Models\Reservasi;
use App\Models\Layanan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ReservasiResource extends Resource
{
    protected static ?string $model = Reservasi::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationLabel = 'Reservasi';
    protected static ?string $modelLabel = 'Reservasi';
    protected static ?string $pluralModelLabel = 'Reservasi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_pelanggan')
                    ->label('Nama Pelanggan')
                    ->required()
                    ->maxLength(100),

                Forms\Components\TextInput::make('no_hp')
                    ->label('Nomor HP')
                    ->tel()
                    ->required()
                    ->maxLength(20),

                Forms\Components\DatePicker::make('tanggal')
                    ->label('Tanggal Reservasi')
                    ->required(),

                Forms\Components\TimePicker::make('jam')
                    ->label('Jam')
                    ->required(),

                Forms\Components\Select::make('layanan_id')
                    ->label('Layanan')
                    ->relationship('layanan', 'nama')
                    ->required()
                    ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_pelanggan')
                    ->label('Nama')
                    ->searchable(),

                Tables\Columns\TextColumn::make('no_hp')
                    ->label('No HP'),

                Tables\Columns\TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->date()
                    ->sortable(),

                Tables\Columns\TextColumn::make('jam')
                    ->label('Jam'),

                Tables\Columns\TextColumn::make('layanan.nama')
                    ->label('Layanan')
                    ->searchable(),

                Tables\Columns\TextColumn::make('layanan.harga')
                    ->label('Harga')
                    ->money('IDR', true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('layanan')
                    ->relationship('layanan', 'nama')
                    ->label('Filter Layanan'),
                Tables\Filters\Filter::make('tanggal')
                    ->form([
                        Forms\Components\DatePicker::make('from')->label('Dari'),
                        Forms\Components\DatePicker::make('until')->label('Sampai'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when($data['from'], fn($q) => $q->where('tanggal', '>=', $data['from']))
                            ->when($data['until'], fn($q) => $q->where('tanggal', '<=', $data['until']));
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReservasis::route('/'),
            'create' => Pages\CreateReservasi::route('/create'),
            'edit' => Pages\EditReservasi::route('/{record}/edit'),
        ];
    }
}
