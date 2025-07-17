<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\ProspekKarir;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProspekKarirResource\Pages;
use Filament\Forms\Components\TextArea;
use App\Filament\Resources\ProspekKarirResource\RelationManagers;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\ViewAction;

class ProspekKarirResource extends Resource
{
    protected static ?string $model = ProspekKarir::class;
    protected static ?string $modelLabel = 'Prospek Karir';
    protected static ?string $pluralModelLabel = 'Prospek Karir';
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Prospek Karir')
                ->description('Isi detail lengkap mengenai Prospek Karir')
                ->schema([
                    TextInput::make('nama')
                    ->label('Nama Prospek Karir')
                    ->required()
                    ->maxLength(255),
                    Select::make('prodi_id')
                    ->label('Program Studi')
                    ->preload()
                    ->relationship('prodi', 'nama')
                    ->required(),
                    TextArea::make('deskripsi')
                    ->label('Deskripsi Prospek Karir')
                    ->rows(5)
                    ->cols(10)
                    ->required()
                    ->placeholder('Tulis deskripsi lengkap mengenai Prospek Karir...'),
                    FileUpload::make('foto')
                    ->label('Foto Prospek Karir')
                    ->image()
                    ->directory('prospek_karir_photos')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->placeholder('Tambahkan foto Prospek Karir... (Opsional)')
                    ->maxSize(5120),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                ->label('Foto Prospek Karir'),
                Tables\Columns\TextColumn::make('nama')
                ->label('Nama Prospek Karir')
                ->searchable(),
                Tables\Columns\TextColumn::make('prodi.nama')
                ->label('Program Studi')
                ->searchable(),
                Tables\Columns\TextColumn::make('deskripsi')
                ->label('Deskripsi Prospek Karir')
                ->limit(50),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                ViewAction::make(),
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
            'index' => Pages\ListProspekKarirs::route('/'),
            'create' => Pages\CreateProspekKarir::route('/create'),
            'edit' => Pages\EditProspekKarir::route('/{record}/edit'),
        ];
    }
}
