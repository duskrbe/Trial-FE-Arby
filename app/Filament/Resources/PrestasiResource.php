<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Prestasi;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PrestasiResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PrestasiResource\RelationManagers;

class PrestasiResource extends Resource
{
    protected static ?string $model = Prestasi::class;
    protected static ?string $modelLabel = 'Prestasi';
    protected static ?string $pluralModelLabel = 'Prestasi';
    protected static ?string $navigationIcon = 'heroicon-o-trophy';

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
                Section::make('Informasi Prestasi')
                ->description('Isi detail lengkap mengenai Prestasi')
                ->schema([
                    TextInput::make('nama')
                    ->label('Nama Prestasi')
                    ->required()
                    ->maxLength(255),
                    FileUpload::make('foto')
                    ->label('Foto Prestasi')
                    ->image()
                    ->directory('prestasi_photos')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->maxSize(5120)
                    ->required(),
                    Textarea::make('deskripsi') 
                    ->label('Deskripsi Prestasi')
                    ->rows(5)
                    ->cols(10)
                    ->nullable() 
                    ->placeholder('Tulis deskripsi lengkap mengenai Prestasi...'),
                    Select::make('prodi_id')
                    ->label('Program Studi')
                    ->preload()
                    ->relationship('prodi', 'nama')
                    ->disabled($isAdminProdi)
                    ->default($isAdminProdi ? $userProdiId : null)
                    ->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                ->label('Foto Prestasi'),
                Tables\Columns\TextColumn::make('nama')
                ->label('Nama Prestasi')
                ->searchable(),
                Tables\Columns\TextColumn::make('prodi.nama')
                ->label('Program Studi')
                ->searchable(),
                Tables\Columns\TextColumn::make('deskripsi')
                ->label('Deskripsi Prestasi')
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
            'index' => Pages\ListPrestasis::route('/'),
            'create' => Pages\CreatePrestasi::route('/create'),
            'edit' => Pages\EditPrestasi::route('/{record}/edit'),
            'view' => Pages\ViewPrestasi::route('/{record}'),
        ];
    }
}
