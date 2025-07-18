<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\MataKuliah;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MataKuliahResource\Pages;
use App\Filament\Resources\MataKuliahResource\RelationManagers;

class MataKuliahResource extends Resource
{
    protected static ?string $model = MataKuliah::class;
    protected static ?string $modelLabel = 'Mata Kuliah';
    protected static ?string $pluralModelLabel = 'Mata Kuliah';
    protected static ?string $navigationIcon = 'heroicon-o-circle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Mata Kuliah')
                ->description('Isi detail lengkap mengenai Mata Kuliah')
                ->schema([
                    TextInput::make('nama')
                    ->label('Nama Mata Kuliah')
                    ->required()
                    ->maxLength(255),
                    Select::make('prodi_id')
                    ->label('Program Studi')
                    ->required()
                    ->relationship('prodi', 'nama'),
                    TextInput::make('semester')
                    ->label('Semester')
                    ->required()
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(8),
                    TextInput::make('sks')
                    ->label('SKS')
                    ->required()
                    ->numeric()
                    ->minValue(1),
                    Select::make('kurikulum')
                    ->label('Kurikulum')
                    ->relationship('kurikulum', 'nama')
                    ->multiple()
                    ->searchable()
                    ->preload(),
                ])
                ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                ->label('Nama Mata Kuliah')
                ->searchable(),
                TextColumn::make('semester')
                ->label('Semester')
                ->searchable(),
                TextColumn::make('sks')
                ->label('SKS')
                ->searchable(),
                TextColumn::make('prodi.nama')
                ->label('Program Studi')
                ->searchable(),
                BadgeColumn::make('kurikulum')
                ->getStateUsing(fn ($record) => $record->kurikulum?->pluck('nama')->toArray() ?? [])
                ->color('success'),
            ])
            ->filters([
                SelectFilter::make('kurikulum')
                    ->relationship('kurikulum', 'nama')
                    ->preload()
                    ->multiple(),
                SelectFilter::make('prodi')
                    ->relationship('prodi', 'nama')
                    ->label('Program Studi')
                    ->preload()
                    ->multiple(),
                SelectFilter::make('sks')
                    ->label('SKS')
                    ->options(fn () => MataKuliah::query()->distinct()->pluck('sks', 'sks')->toArray())
                    ->multiple(),
                SelectFilter::make('semester')
                    ->label('Semester')
                    ->options(fn () => MataKuliah::query()->distinct()->pluck('semester', 'semester')->toArray())
                    ->multiple(),
                    
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListMataKuliahs::route('/'),
            'create' => Pages\CreateMataKuliah::route('/create'),
            'edit' => Pages\EditMataKuliah::route('/{record}/edit'),
        ];
    }
}
