<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\ProgramStudi;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProgramStudiResource\Pages;
use App\Filament\Resources\ProgramStudiResource\RelationManagers;

class ProgramStudiResource extends Resource
{
    protected static ?string $model = ProgramStudi::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $modelLabel = 'Program Studi';
    protected static ?string $pluralModelLabel = 'Program Studi';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Program Studi')
                    ->description('Isi detail lengkap mengenai Program Studi')
                    ->schema([
                        TextInput::make('nama')
                        ->label('Nama Program Studi')
                        ->required()
                        ->maxLength(255),
                        FileUpload::make('foto')
                        ->label('Foto Program Studi')
                        ->image()
                        ->directory('program_studi_photos')
                        ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                        ->maxSize(5120)
                        ->required(),
                        TextInput::make('tahun_berdiri')
                        ->label('Tahun Berdiri')
                        ->numeric()
                        ->rules(['required', 'digits:4', 'min:1900', 'max:' . now()->year]) // Validasi tahun
                        ->placeholder('Contoh: 2005')
                        ->required(),
                        Textarea::make('deskripsi') 
                        ->label('Deskripsi Program Studi')
                        ->rows(5)
                        ->cols(10)
                        ->nullable() 
                        ->placeholder('Tulis deskripsi lengkap mengenai Program Studi DKV...'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto')
                    ->label('Foto Program Studi'),

                TextColumn::make('nama')
                    ->label('Nama Program Studi')
                    ->searchable() 
                    ->sortable(),
                
                TextColumn::make('tahun_berdiri')
                    ->label('Tahun Berdiri')
                    ->searchable() 
                    ->sortable(), 
                
                TextColumn::make('deskripsi')
                    ->label('Deskripsi Program Studi')
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
            'index' => Pages\ListProgramStudis::route('/'),
            'create' => Pages\CreateProgramStudi::route('/create'),
            'edit' => Pages\EditProgramStudi::route('/{record}/edit'),
            'view' => Pages\ViewProgramStudi::route('/{record}'),
        ];
    }
}
