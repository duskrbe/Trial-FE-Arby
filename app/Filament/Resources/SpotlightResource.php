<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Spotlight;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SpotlightResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SpotlightResource\RelationManagers;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;

class SpotlightResource extends Resource
{
    protected static ?string $model = Spotlight::class;
    protected static ?string $modelLabel = 'Spotlight';
    protected static ?string $pluralModelLabel = 'Spotlight';
    protected static ?string $navigationIcon = 'heroicon-o-cursor-arrow-rays';

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
                Section::make('Informasi Spotlight')
                ->description('Isi detail lengkap mengenai Spotlight.')
                ->schema([
                    TextInput::make('judul')
                    ->label('Judul Spotlight')
                    ->required()
                    ->placeholder('Tulis judul Spotlight...'),
                    Select::make('prodi_id')
                    ->label('Program Studi')
                    ->preload()
                    ->relationship('prodi', 'nama')
                    ->disabled($isAdminProdi) // Nonaktifkan jika admin prodi
                    ->default($isAdminProdi ? $userProdiId : null)
                    ->required()
                    ->placeholder('Pilih Program Studi...'),
                    Select::make('kategori')
                    ->label('Kategori Spotlight')
                    ->options([
                        'Acara Mendatang' => 'Acara Mendatang',
                        'Berita Terbaru' => 'Berita Terbaru',
                        'Kegiatan Mahasiswa' => 'Kegiatan Mahasiswa'
                    ])
                    ->required(),
                    DatePicker::make('tanggal')
                    ->label('Tanggal Publikasi')
                    ->required()
                    ->default(now())
                    ->maxDate(now())
                    ->displayFormat('d/m/Y'),
                ])
                ->columns(2),
                Section::make('Konten & Media')
                ->description('Deskripsi lengkap dan gambar terkait Spotlight.')
                ->schema([
                    RichEditor::make('deskripsi')
                    ->label('Deskripsi Spotlight')
                    ->placeholder('Tulis deskripsi Spotlight...')
                    ->required(),
                    FileUpload::make('foto')
                    ->label('Foto Spotlight')
                    ->image()
                    ->directory('spotlight_photos')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->placeholder('Tambahkan foto Spotlight...')
                    ->required()
                    ->maxSize(5120),
                    FileUpload::make('banner')
                    ->label('Banner Spotlight')
                    ->image()
                    ->directory('spotlight_banners')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->placeholder('Tambahkan banner Spotlight...')
                    ->required()
                    ->maxSize(8120),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->label('Foto'),
                
                Tables\Columns\ImageColumn::make('banner')
                    ->label('Banner'),
                
                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul')
                    ->limit(25)
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('kategori')
                    ->label('Kategori')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->date('d M Y'), // Format tampilan tanggal
                
                Tables\Columns\TextColumn::make('prodi.nama')
                    ->label('Program Studi')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(25),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListSpotlights::route('/'),
            'create' => Pages\CreateSpotlight::route('/create'),
            'edit' => Pages\EditSpotlight::route('/{record}/edit'),
            'view' => Pages\ViewSpotlight::route('/{record}'),
        ];
    }
}
