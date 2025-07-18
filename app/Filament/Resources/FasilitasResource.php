<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Fasilitas;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TextArea;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\FasilitasResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\FasilitasResource\RelationManagers;

class FasilitasResource extends Resource
{
    protected static ?string $model = Fasilitas::class;
    protected static ?string $modelLabel = 'Fasilitas';
    protected static ?string $pluralModelLabel = 'Fasilitas';
    protected static ?string $navigationIcon = 'heroicon-o-home-modern';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Fasilitas')
                ->description('Isi detail lengkap mengenai Fasilitas')
                ->schema([
                    TextInput::make('nama')
                    ->label('Nama Fasilitas')
                    ->required()
                    ->maxLength(255),
                    TextArea::make('deskripsi')
                    ->label('Deskripsi Fasilitas')
                    ->rows(5)
                    ->cols(10)
                    ->required()
                    ->placeholder('Tulis deskripsi lengkap mengenai Fasilitas...'),
                    FileUpload::make('foto')
                    ->label('Foto Fasilitas')
                    ->image()
                    ->directory('fasilitas_photos')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->required()
                    ->placeholder('Tambahkan foto Fasilitas... (Opsional)')
                    ->maxSize(5120),
                    Select::make('prodi_id')
                    ->label('Program Studi')
                    ->preload()
                    ->relationship('prodi', 'nama')
                    ->required(),
                ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                ->label('Foto Fasilitas'),
                Tables\Columns\TextColumn::make('nama')
                ->label('Nama Fasilitas')
                ->searchable(),
                Tables\Columns\TextColumn::make('prodi.nama')
                ->label('Program Studi')
                ->searchable(),
                Tables\Columns\TextColumn::make('deskripsi')
                ->label('Deskripsi Fasilitas')
                ->limit(50),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFasilitas::route('/'),
            'create' => Pages\CreateFasilitas::route('/create'),
            'edit' => Pages\EditFasilitas::route('/{record}/edit'),
        ];
    }
}
