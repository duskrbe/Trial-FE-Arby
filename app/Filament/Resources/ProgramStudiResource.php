<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\ProgramStudi;
use Filament\Resources\Resource;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProgramStudiResource\Pages;
use App\Filament\Resources\ProgramStudiResource\RelationManagers;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\ImageColumn;

class ProgramStudiResource extends Resource
{
    protected static ?string $model = ProgramStudi::class;
    
    protected static ?string $navigationGroup = 'Menu';
    protected static ?string $navigationIcon = 'heroicon-o-inbox-stack';
    protected static ?string $navigationLabel = 'Program Studi';
    protected static ?string $pluralModelLabel = 'Data Program Studi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('Nama')
                    ->required(),
                FileUpload::make('Foto')
                    ->image()
                    ->default(null)
                    ->required(),
                TextInput::make('Tahun_Berdiri'),
                RichEditor::make('Deskripsi')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('Nama')
                    ->searchable(),
                ImageColumn::make('Foto'),
                TextColumn::make('Tahun_Berdiri')
                    ->label('Tahun berdiri'),
                TextColumn::make('Deskripsi'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListProgramStudis::route('/'),
            'create' => Pages\CreateProgramStudi::route('/create'),
            'edit' => Pages\EditProgramStudi::route('/{record}/edit'),
        ];
    }
}
