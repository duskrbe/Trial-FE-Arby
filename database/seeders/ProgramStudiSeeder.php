<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProgramStudi; // Pastikan ini di-import!
use Illuminate\Support\Facades\Storage; // Untuk menyimpan "foto" dummy

class ProgramStudiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan direktori penyimpanan foto ada
        if (!Storage::exists('public/program_studi_photos')) {
            Storage::makeDirectory('public/program_studi_photos');
        }

        // Membuat data dummy untuk Program Studi
        ProgramStudi::create([
            'Nama' => 'Desain Komunikasi Visual',
            'Foto' => 'https://picsum.photos/seed/dkv/600/400', // Sesuaikan path ini
            'Tahun_Berdiri' => 2005,
            'Deskripsi' => 'Program Studi Desain Komunikasi Visual (DKV) di IWU fokus pada pengembangan kreativitas dan inovasi dalam media visual. Mahasiswa akan mempelajari berbagai disiplin ilmu seperti desain grafis, ilustrasi, fotografi, videografi, dan multimedia interaktif.',
        ]);

        ProgramStudi::create([
            'Nama' => 'Desain Produk',
            'Foto' => 'https://picsum.photos/seed/dkv/600/400', // Sesuaikan path ini
            'Tahun_Berdiri' => 2010,
            'Deskripsi' => 'Program Studi Desain Produk mempersiapkan mahasiswa untuk menjadi desainer produk yang inovatif, mampu menciptakan produk-produk yang fungsional, estetis, dan berkelanjutan. Fokus pada proses desain dari ideation hingga prototipe.',
        ]);

        ProgramStudi::create([
            'Nama' => 'Tata Busana',
            'Foto' => 'https://picsum.photos/seed/dkv/600/400', // Sesuaikan path ini
            'Tahun_Berdiri' => 1998,
            'Deskripsi' => 'Prodi Tata Busana membekali mahasiswa dengan pengetahuan dan keterampilan di bidang fashion, mulai dari desain, pola, produksi, hingga manajemen bisnis fashion. Mengembangkan desainer busana yang berdaya saing global.',
        ]);

        // Opsional: Untuk foto dummy, kamu bisa menempatkan gambar kosong atau placeholder
        // di direktori public/storage/program_studi_photos (setelah menjalankan storage:link)
        // Atau kamu bisa gunakan layanan placeholder gambar seperti Lorem Picsum
        // Contoh: 'Foto' => 'https://picsum.photos/seed/dkv/600/400',
    }
}