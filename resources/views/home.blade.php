@extends('layouts.app')

@section('content')

    <!-- Hero Section -->
    <section class="vh-100 d-flex align-items-center justify-content-center bg-dark text-white text-center">
        <div class="container">
            <h4 class="mb-2">IWU DKV</h4>
            <h1 class="display-4 fw-bold">Visual Communication Design</h1>
            <p class="mt-3 mb-4">Program Studi Desain Komunikasi Visual IWU berdiri sejak 2008 di Bandung. DKV Iwu mendidik mahasiswa untuk menjadi desainer komunikasi visual yang handal dan berintegritas.</p>
            <a href="#" class="btn btn-outline-light">LEARN MORE</a>
        </div>
    </section>

    <section id="tentang" class="py-5" style="background-color: #f5f6f8;">
    <div class="container">
        <div class="row align-items-center">
            <!-- Konten Teks -->
            <div class="col-md-6">
                <h3>
                    <span style="color: #f5af28;" class="fw-bold">Sekilas</span>
                    <span style="color: #1b2b4f;" class="fw-bold">Visual Communication Design</span>
                </h3>
                <p class="text-dark mt-3" style="font-size: 1rem;">
                    Desain Komunikasi Visual (DKV) adalah perkembangan lanjutan dari seni iklan dan desain grafis. DKV adalah perpaduan rasa dan bahasa untuk mengungkapkan ide atau pesan yang disampaikan melalui berbagai bentuk visual kepada penerima pesan. 
                </p>
                <p class="text-dark" style="font-size: 1rem;">
                    Mahasiswa DKV Petra diharapkan menjadi <em>problem-solver</em> yang handal dan mampu berkolaborasi dalam berbagai bidang.
                </p>
                <p class="text-dark" style="font-size: 1rem;">
                    DKV Petra menyediakan <strong>Program Dual-Degree</strong>, bekerja sama dengan Dongseo University (South Korea, Busan).
                </p>
            </div>

            <!-- Gambar -->
            <div class="col-md-6">
                <img src="{{ asset('images/sekilas-dkv.jpg') }}" alt="Sekilas DKV" class="img-fluid rounded">
            </div>
        </div>
    </div>
</section>

<!-- Section: Tentang Kami -->
    <section class="bg-light py-5">
        <div class="container fluid">
            {{-- <div class="row justify-content-center mb-5 text-center">
                <div class="col-lg-8">
                    <h2 class="fw-bold mb-3">Tentang Program Studi Desain Komunikasi Visual</h2>
                    <p class="text-muted">
                        Program Studi Desain Komunikasi Visual (DKV) Universitas Kristen Petra berdiri sejak tahun 1998.
                        Kami berkomitmen menghasilkan lulusan yang kompeten, kreatif, berintegritas, dan mampu bersaing secara global dalam bidang desain komunikasi visual.
                    </p>
                </div>
            </div> --}}

            <div class="row align-items-center">
                <div class="col-md-6 mb-4 mb-md-0">
                    <img src="{{ asset('images/about-dkv.jpg') }}" class="img-fluid rounded" alt="Tentang DKV Petra">
                </div>
                <div class="col-md-6">
                    <h4 class="fw-semibold mb-3">Visi & Misi</h4>
                    <p><strong>Visi:</strong> Menjadi program studi DKV unggulan yang menghasilkan desainer visual berdaya saing global dan berintegritas Kristen.</p>
                    <p><strong>Misi:</strong></p>
                    <ul class="list-unstyled ps-3">
                        <li>• Menyelenggarakan pendidikan berbasis kreativitas, teknologi, dan nilai-nilai etika</li>
                        <li>• Melakukan penelitian dan pengabdian masyarakat di bidang komunikasi visual</li>
                        <li>• Membangun kolaborasi dengan dunia industri dan institusi pendidikan</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


<section id="akreditasi" class="py-5" style="background-color: #f5f6f8;">
    <div class="container-fluid px-0">
        <div class="row g-0 align-items-center">
            <!-- Kolom Gambar -->
            <div class="col-lg-6">
                <img src="{{ asset('images/akreditasi-foto.png') }}" alt="Mahasiswa DKV Petra" class="img-fluid w-100 h-100 object-fit-cover">
            </div>

            <!-- Kolom Teks -->
            <div class="col-lg-6 bg-dark-blue text-white p-5">
                <h5 class="text-warning fw-bold mb-2">Mengapa Berkuliah di</h5>
                <h2 class="fw-bold text-white mb-4">Visual Communication Design PCU?</h2>

                <h4 class="fw-semibold text-white mb-3">Akreditasi</h4>
                <p class="text-white">
                    Program Studi DKV IWU memiliki akreditasi tertinggi <strong>(Nilai A)</strong> dari
                    <strong>Badan Akreditasi Nasional Perguruan Tinggi (BAN-PT)</strong> dari Kemenristekdikti RI,
                    dan terakreditasi internasional oleh <strong>AQAS</strong>, sebuah lembaga akreditasi berbasis di Jerman.
                </p>
            </div>
        </div>
    </div>
</section>

<section id="prospek-karir" style="background-color: #f5f6f8;">
    <div class="container">
        <div class="row g-0">
            <!-- Kolom Judul -->
            <div class="col-md-2 d-flex align-items-center justify-content-center bg-dark-blue text-white">
                <h3 class="fw-bold text-center m-0">Prospek<br>Karier</h3>
            </div>

            <!-- Kolom 1 -->
            <div class="col-md-2 position-relative">
                <img src="{{ asset('images/karir-creative-director.jpg') }}" class="img-fluid w-100 h-100 object-fit-cover" alt="Creative Director">
                <div class="position-absolute top-0 start-0 p-3 text-white fw-bold fs-3 opacity-50">01</div>
                <div class="position-absolute bottom-0 start-0 p-3 text-white fw-bold">Creative Director</div>
            </div>

            <!-- Kolom 2 -->
            <div class="col-md-2 position-relative">
                <img src="{{ asset('images/karir-art-director.jpg') }}" class="img-fluid w-100 h-100 object-fit-cover" alt="Art Director">
                <div class="position-absolute top-0 start-0 p-3 text-white fw-bold fs-3 opacity-50">02</div>
                <div class="position-absolute bottom-0 start-0 p-3 text-white fw-bold">Art Director</div>
            </div>

            <!-- Kolom 3 -->
            <div class="col-md-2 position-relative">
                <img src="{{ asset('images/karir-art-consultant.jpg') }}" class="img-fluid w-100 h-100 object-fit-cover" alt="Art Consultant">
                <div class="position-absolute top-0 start-0 p-3 text-white fw-bold fs-3 opacity-50">03</div>
                <div class="position-absolute bottom-0 start-0 p-3 text-white fw-bold">Art Consultant</div>
            </div>

            <!-- Kolom 4 -->
            <div class="col-md-2 position-relative">
                <img src="{{ asset('images/karir-creativepreneur.jpg') }}" class="img-fluid w-100 h-100 object-fit-cover" alt="Creativepreneur">
                <div class="position-absolute top-0 start-0 p-3 text-white fw-bold fs-3 opacity-50">04</div>
                <div class="position-absolute bottom-0 start-0 p-3 text-white fw-bold">Creativepreneur</div>
            </div>
        </div>
    </div>
</section>

<!-- Section: Prestasi -->
<section id="prestasi" class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-8">
                <h2 class="fw-bold mb-3">Prestasi Mahasiswa</h2>
                <p class="text-muted">
                    DKV IWU bangga dengan berbagai pencapaian mahasiswa dan pengakuan yang diterima di tingkat nasional maupun internasional.
                </p>
            </div>
        </div>

        <div class="row g-4">
            <!-- Prestasi 1 -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <img src="{{ asset('images/prestasi-1.jpg') }}" alt="Prestasi 1" class="card-img-top">
                    <div class="card-body text-center">
                        <p class="fw-semibold mt-3"> Juara Lomba Desain Nasional</p>
                    </div>
                </div>
            </div>

            <!-- Prestasi 2 -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <img src="{{ asset('images/prestasi-2.jpg') }}" alt="Prestasi 2" class="card-img-top">
                    <div class="card-body text-center">
                        <p class="fw-semibold mt-3">Karya Dipamerkan Internasional</p>
                    </div>
                </div>
            </div>

            <!-- Prestasi 3 -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <img src="{{ asset('images/prestasi-3.jpg') }}" alt="Prestasi 3" class="card-img-top">
                    <div class="card-body text-center">
                        <p class="fw-semibold mt-3">Kolaborasi Industri Kreatif</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




        <!-- end section -->
@endsection
