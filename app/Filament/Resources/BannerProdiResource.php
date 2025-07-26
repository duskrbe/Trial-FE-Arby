<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\BannerProdi;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BannerProdiResource\Pages;
use App\Filament\Resources\BannerProdiResource\RelationManagers;

class BannerProdiResource extends Resource
{
    protected static ?string $model = BannerProdi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
        protected static ?string $modelLabel = 'Banner Prodi';
    protected static ?string $pluralModelLabel = 'Banner Prodi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Banner Program Studi')
                    ->description('Isi detail mengenai Banner Program Studi')
                    ->schema([
                        TextInput::make('judul')
                        ->label('Judul Banner')
                        ->required()
                        ->maxLength(255),
                        FileUpload::make('foto')
                        ->label('Foto Banner')
                        ->image()
                        ->directory('banner_prodi_photos')
                        ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                        ->maxSize(5120)
                        ->required(),
                        Textarea::make('deskripsi') 
                        ->label('Deskripsi Banner Prodi')
                        ->rows(5)
                        ->cols(10)
                        ->nullable() 
                        ->placeholder('Tulis deskripsi mengenai Banner Prodi...'),
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
                ImageColumn::make('foto')
                    ->label('Foto Banner'),

                TextColumn::make('judul')
                    ->label('Judul Banner')
                    ->searchable() 
                    ->sortable(),

                TextColumn::make('prodi.nama')
                    ->label('Program Studi')
                    ->searchable(),
            
                TextColumn::make('deskripsi')
                    ->label('Deskripsi Banner')
                    ->limit(50),

                
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
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
            'index' => Pages\ListBannerProdis::route('/'),
            'create' => Pages\CreateBannerProdi::route('/create'),
            'edit' => Pages\EditBannerProdi::route('/{record}/edit'),
            'view' => Pages\ViewBannerProdi::route('/{record}'),
        ];
    }
}
