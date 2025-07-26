<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Logs;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Placeholder;
use App\Filament\Resources\LogsResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\LogsResource\RelationManagers;

class LogsResource extends Resource
{
    protected static ?string $model = Logs::class;
    protected static ?string $pluralModelLabel= 'Logs';
    protected static ?string $modelLabel = 'Logs';
    protected static ?string $navigationIcon = 'heroicon-o-clock';

    public static function canViewAny(): bool
    {
        return auth()->user()->hasRole('super_admin');
    }


        //Menyembunyikan menu riwayat di side bar || masih bisa diakses
    // public static function shouldRegisterNavigation(): bool
    // {
    //     return false;
    // }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Logs')
                    ->description('Logs Aktivitas User')
                    ->schema([
                        Placeholder::make('user.name')
                            ->label('Pengguna')
                            ->content(fn($record) => $record->user->name),
                        Placeholder::make('action')
                            ->label('Aksi')
                            ->content(fn($record) => $record->action),
                        Placeholder::make('table_name')
                            ->label('Tabel')
                            ->content(fn($record) => $record->table_name),
                        Placeholder::make('record_id')
                            ->label('ID Record')
                            ->content(fn($record) => $record->record_id),
                        Placeholder::make('created_at')
                            ->label('Waktu')
                            ->content(fn($record) => $record->created_at),
                        Placeholder::make('description')
                            ->label('Deskripsi')
                            ->columnSpanFull()
                            ->content(fn($record) => $record->description),
                        
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('Pengguna')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('action')
                    ->label('Aksi')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('table_name')
                    ->label('Tabel')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('record_id')
                    ->label('ID Record')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(50)
                    ->tooltip(function ($column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= 50) {
                            return null;
                        }

                        return $state;
                    }),
                TextColumn::make('created_at')
                    ->label('Waktu')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                    Tables\Actions\DeleteBulkAction::make(),
                ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListLogs::route('/'),
            'view' => Pages\ViewLogs::route('/{record}'),
        ];
    }

    public static function canCreate(): bool {return false;}
    public static function canDelete($record): bool {return false;}
    public static function canEdit($record): bool {return false;}
}
