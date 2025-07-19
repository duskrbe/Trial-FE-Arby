<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Dosen;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Actions\ViewAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\DosenResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DosenResource\RelationManagers;

class DosenResource extends Resource
{
    protected static ?string $model = Dosen::class;
    protected static ?string $modelLabel = 'Dosen';
    protected static ?string $pluralModelLabel = 'Dosen';

    protected static ?string $navigationIcon = 'heroicon-o-user-group'; // Contoh ikon
    protected static ?string $navigationGroup = 'Data Kampus'; // Kelompokkan navigasi

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Dosen')
                    ->description('Isi detail lengkap mengenai data dosen.')
                    ->schema([
                        TextInput::make('nidn')
                            ->label('NIDN')
                            ->required()
                            ->unique(ignoreRecord: true) // Pastikan NIDN unik, kecuali saat mengedit record yang sama
                            ->maxLength(20)
                            ->numeric()
                            ->placeholder('Contoh: 0012345678'),

                        TextInput::make('nama')
                            ->label('Nama Dosen')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Prof. Dr. Siti Aminah'),
                        
                        Select::make('status')
                            ->label('Status Dosen')
                            ->required()
                            ->options([
                                'Dosen Tidak Tetap' => 'Dosen Tidak Tetap',
                                'Dosen Tetap' => 'Dosen Tetap',
                            ]),

                        Select::make('prodi_id')
                            ->label('Program Studi')
                            ->relationship('prodi', 'nama') // Menghubungkan ke model ProgramStudi, menampilkan kolom 'nama'
                            ->required()
                            ->searchable() // Memungkinkan pencarian program studi
                            ->preload(), // Memuat semua opsi di awal (hati-hati jika banyak data)
                        FileUpload::make('foto')
                            ->label('Foto Dosen')
                            ->image()
                            ->required()
                            ->directory('dosen_photos') // Folder penyimpanan di storage
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->maxSize(5120)
                            ->columnSpanFull()
                            ->nullable(), // Sesuai migrasi, foto bisa null
                    ])
                    ->columns(2), // Layout 2 kolom untuk form ini
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->label('Foto'),                
                Tables\Columns\TextColumn::make('nidn')
                    ->label('NIDN')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Dosen')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn($record) => $record->status === 'Dosen Tidak Tetap' ? 'danger' : 'success')
                    ->searchable()
                    ->sortable()
                    ->placeholder('Tidak Ada Status'), // Teks jika status kosong
                
                Tables\Columns\TextColumn::make('prodi.nama')
                    ->label('Program Studi')
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
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                ViewAction::make(),
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
            'index' => Pages\ListDosens::route('/'),
            'create' => Pages\CreateDosen::route('/create'),
            'edit' => Pages\EditDosen::route('/{record}/edit'),
        ];
    }
}
