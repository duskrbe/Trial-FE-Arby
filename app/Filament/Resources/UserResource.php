<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select; // Import Select
use Filament\Forms\Components\Section; // Import Section
use Filament\Forms\Components\TextInput; // Import TextInput
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash; // Import Hash untuk password
use Spatie\Permission\Models\Role; // Import Role model dari Spatie

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users'; // Ikon untuk manajemen user
    protected static ?string $navigationGroup = 'Pengaturan Sistem'; // Kelompokkan di bawah pengaturan sistem
    protected static ?int $navigationSort = 1; // Urutan pertama di grupnya

    // Pembatasan akses: Hanya Super Admin yang bisa melihat dan mengelola user
    public static function canViewAny(): bool
    {
        return auth()->user()->hasRole('super_admin');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Akun')
                    ->description('Detail dasar akun pengguna.')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Pengguna')
                            ->required()
                            ->maxLength(255),
                        
                        TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true) // Email harus unik, abaikan saat edit record yang sama
                            ->maxLength(255),
                        
                        TextInput::make('password')
                            ->label('Password')
                            ->password()
                            ->required(fn (string $operation): bool => $operation === 'create') // Wajib saat membuat, opsional saat edit
                            ->dehydrateStateUsing(fn (string $state): string => Hash::make($state)) // Hash password sebelum disimpan
                            ->dehydrated(fn (?string $state): bool => filled($state)) // Hanya dehidrasi jika ada input password
                            ->maxLength(255),
                    ])
                    ->columns(1), // Layout 1 kolom untuk bagian ini

                Section::make('Peran & Program Studi')
                    ->description('Atur peran pengguna dan afiliasinya dengan program studi.')
                    ->schema([
                        Select::make('roles')
                            ->label('Peran')
                            ->relationship('roles', 'name') // Mengambil peran dari Spatie
                            ->multiple() // User bisa punya lebih dari satu peran (misal: admin_prodi dan editor)
                            ->preload() // Memuat semua peran di awal
                            ->required()
                            ->options(Role::all()->pluck('name', 'name')), // Ambil semua nama peran dari database
                        
                        Select::make('prodi_id')
                            ->label('Program Studi')
                            ->relationship('prodi', 'nama', fn (Builder $query) => $query, 'prodi_id') // Relasi ke ProgramStudi
                            ->nullable() // Bisa null untuk Super Admin
                            ->searchable()
                            ->preload()
                            ->visible(fn (Forms\Get $get): bool => in_array('admin_prodi', $get('roles'))), // Hanya tampil jika peran 'admin_prodi' dipilih
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Pengguna')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('roles.name') // Menampilkan nama peran
                    ->label('Peran')
                    ->badge() // Tampilkan sebagai badge
                    ->color('primary')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('prodi.nama') // Menampilkan nama program studi dari relasi
                    ->label('Program Studi')
                    ->placeholder('Tidak Terkait Prodi') // Teks jika prodi_id null
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui Pada')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('roles')
                    ->relationship('roles', 'name')
                    ->label('Filter Berdasarkan Peran')
                    ->multiple(), // Memungkinkan filter beberapa peran
                
                Tables\Filters\SelectFilter::make('prodi_id')
                    ->relationship('prodi', 'nama', fn (Builder $query) => $query, 'prodi_id')
                    ->label('Filter Berdasarkan Program Studi')
                    ->multiple(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    // Pembatasan Query: Hanya Super Admin yang bisa melihat semua user.
    // Admin Prodi hanya bisa melihat dirinya sendiri (jika diperlukan)
    // atau user lain di prodi yang sama (jika ada fitur admin prodi bisa mengelola user lain di prodi nya).
    // Untuk saat ini, kita akan biarkan Super Admin melihat semua.
    // Jika Anda ingin Admin Prodi hanya melihat dirinya sendiri, Anda bisa menambahkan:
    /*
    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        if (auth()->user()->hasRole('admin_prodi')) {
            $query->where('id', auth()->id());
        }

        return $query;
    }
    */
}