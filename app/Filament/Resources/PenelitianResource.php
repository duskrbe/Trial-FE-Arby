<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Penelitian;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PenelitianResource\Pages;
use App\Filament\Resources\PenelitianResource\RelationManagers;

class PenelitianResource extends Resource
{
    protected static ?string $model = Penelitian::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $modelLabel = 'Penelitian';
    protected static ?string $pluralModelLabel = 'Penelitian';

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
           Section::make('Informasi Penelitian')
                ->description('Isi detail mengenai Penelitian')
                ->schema([
                    TextInput::make('judul')
                        ->label('Judul Penelitian')
                        ->maxLength(255)
                        ->required(),

                    TextInput::make('tahun')
                        ->label('Tahun Penelitian')
                        ->required()
                        ->numeric()
                        ->rules(['required', 'digits:4', 'min:1900', 'max:' . now()->year]) // Validasi tahun
                        ->placeholder('Contoh: 2005'),

                    TextInput::make('penulis')
                        ->label('Nama Penulis')
                        ->maxLength(255)
                        ->required(),

                    TextInput::make('link')
                        ->label('Link Penelitian')
                        ->placeholder('Tambahkan Link Penelitian... (Opsional)')
                        ->url()
                        ->nullable(),

                    FileUpload::make('gambar_publikasi')
                        ->label('Gambar Publikasi Penelitian')
                        ->image()
                        ->directory('penelitian_photos')
                        ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                        ->placeholder('Tambahkan foto Publikasi... (Opsional)')
                        ->maxSize(5120)
                        ->nullable(),

                    Select::make('prodi_id')
                        ->label('Program Studi')
                        ->relationship('prodi', 'nama')
                        ->disabled($isAdminProdi) // Nonaktifkan jika admin prodi
                        ->default($userProdiId)
                        ->required(),
                ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul')
                    ->label('Judul Penelitian')
                    ->searchable() 
                    ->sortable(),
                TextColumn::make('tahun')
                    ->label('Tahun Penelitian')
                    ->searchable() 
                    ->sortable(), 
                TextColumn::make('penulis')
                    ->label('Penulis Penelitian')
                    ->searchable()
                    ->sortable(), 
                TextColumn::make('prodi.nama')
                    ->label('Program Studi')
                    ->searchable(),
                TextColumn::make('link')
                    ->label('Link Penelitian')
                    ->url(fn ($record) => $record->link)
                    ->openUrlInNewTab(),
                ImageColumn::make('gambar_publikasi')
                    ->label('Gambar Publikasi'),
                
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
            'index' => Pages\ListPenelitians::route('/'),
            'create' => Pages\CreatePenelitian::route('/create'),
            'edit' => Pages\EditPenelitian::route('/{record}/edit'),
            'view' => Pages\ViewPenelitian::route('/{record}'),
        ];
    }
}
