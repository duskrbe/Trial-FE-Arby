<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Alumni;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\AlumniResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AlumniResource\RelationManagers;

class AlumniResource extends Resource
{
    protected static ?string $model = Alumni::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $modelLabel = 'Alumni';
    protected static ?string $pluralModelLabel = 'Alumni';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Alumni')
                    ->description('Isi detail lengkap mengenai Alumni')
                    ->schema([
                        TextInput::make('nama')
                        ->label('Nama Alumni')
                        ->required()
                        ->maxLength(255),
                        FileUpload::make('foto')
                        ->label('Foto Alumni')
                        ->image()
                        ->directory('alumni_photos')
                        ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                        ->maxSize(5120)
                        ->required(),
                        TextInput::make('tahun_lulus')
                        ->label('Tahun Lulus')
                        ->numeric()
                        ->rules(['required', 'digits:4', 'min:1900', 'max:' . now()->year]) // Validasi tahun
                        ->placeholder('Contoh: 2005')
                        ->required(),
                        TextInput::make('jabatan')
                        ->label('Jabatan Alumni')
                        ->nullable() 
                        ->maxLength(255),
                        Textarea::make('Perusahaan') 
                        ->label('Perusahaan Alumni')
                        ->rows(5)
                        ->cols(10)
                        ->nullable() 
                        ->placeholder('Tulis deskripsi lengkap mengenai Alumni DKV...'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto')
                    ->label('Foto Alumni'),

                TextColumn::make('nama')
                    ->label('Nama Alumni')
                    ->searchable() 
                    ->sortable(),
                
                TextColumn::make('tahun_lulus')
                    ->label('Tahun Lulus')
                    ->searchable() 
                    ->sortable(), 

                TextColumn::make('jabatan')
                    ->label('Jabatan Alumni')
                    ->searchable() 
                    ->sortable(),
                
                TextColumn::make('perusahaan')
                    ->label('Deskripsi Alumni')
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
            'index' => Pages\ListAlumnis::route('/'),
            'create' => Pages\CreateAlumni::route('/create'),
            'edit' => Pages\EditAlumni::route('/{record}/edit'),
        ];
    }
}
