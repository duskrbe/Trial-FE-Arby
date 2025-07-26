<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Kurikulum;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\KurikulumResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KurikulumResource\RelationManagers;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class KurikulumResource extends Resource
{
    protected static ?string $model = Kurikulum::class;
    protected static ?string $modelLabel = 'Kurikulum';
    protected static ?string $pluralModelLabel = 'Kurikulum';

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery(); // Selalu mulai dengan query dasar Resource

        // Dapatkan user yang sedang login
        $user = auth()->user();

        // Jika user bukan 'super_admin', terapkan scoping
        if ($user && !$user->hasRole('super_admin')) {
            // Jika user adalah admin_prodi dan memiliki prodi_id
            if ($user->hasRole('admin_prodi') && $user->prodi_id) {
                // Filter data berdasarkan prodi_id user yang login
                $query->where('prodi_id', $user->prodi_id);
            } else {
                // Jika user tidak punya peran yang jelas atau tidak punya prodi_id
                // mereka tidak bisa melihat data prodi mana pun
                $query->where('prodi_id', null); // Atau query yang tidak mengembalikan hasil
            }
        }

        return $query;
    }

    public static function form(Form $form): Form
    {
        $user = auth()->user();
        $isAdminProdi = $user && $user->hasRole('admin_prodi');
        $userProdiId = $user ? $user->prodi_id : null;
        return $form
            ->schema([
                Section::make('Informasi Kurikulum')
                ->description('Isi detail lengkap mengenai Kurikulum')
                ->schema([
                    TextInput::make('nama')
                    ->label('Nama Kurikulum (Tahun)')
                    ->required(),
                    Select::make('prodi_id')
                    ->label('Program Studi')
                    ->preload()
                    ->relationship('prodi', 'nama')
                    ->disabled($isAdminProdi) // Nonaktifkan jika admin prodi
                    ->default($isAdminProdi ? $userProdiId : null)
                    ->required(),
                    Textarea::make('deskripsi')
                    ->label('Deskripsi Kurikulum')
                    ->rows(5)
                    ->cols(10)
                    ->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                ->label('Nama Kurikulum')
                ->searchable(),
                TextColumn::make('deskripsi')
                ->label('Deskripsi Kurikulum')
                ->limit(25),
                TextColumn::make('prodi.nama')
                ->label('Program Studi')
                ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                ->requiresConfirmation()
                ->color('danger')
                ->icon('heroicon-s-trash')
                ->modalHeading('Anda yakin ingin menghapus Kurikulum ini?')
                ->modalSubmitActionLabel('YA, Hapus')
                ->modalDescription('Jika anda menghapus kurikulum ini, data data mata kuliah akan TERHAPUS semua. Apakah kamu yakin?'),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListKurikulums::route('/'),
            'create' => Pages\CreateKurikulum::route('/create'),
            'edit' => Pages\EditKurikulum::route('/{record}/edit'),
            'view' => Pages\ViewKurikulum::route('/{record}'),
        ];
    }
}
