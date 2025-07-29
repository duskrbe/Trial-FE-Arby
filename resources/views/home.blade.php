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
                <img src="{{ asset('images/demo-it-business.jpg') }}" alt="Sekilas DKV" class="img-fluid rounded">
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
                    <img src="{{ asset('images/demo-lawyer.jpg') }}" class="img-fluid rounded" alt="Tentang DKV Petra">
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
            <div class="col-md-6">
                <img src="{{ asset('images/demo-lawyer.jpg') }}" alt="Mahasiswa DKV Petra" class="img-fluid w-100 h-100 object-fit-cover">
            </div>

            <!-- Kolom Teks -->
            <div class="col-md-6 bg-dark-blue text-white p-5">
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
                <img src="{{ asset('images/demo-music.jpg') }}" class="img-fluid w-100 h-100 object-fit-cover" alt="Creative Director">
                <div class="position-absolute top-0 start-0 p-3 text-white fw-bold fs-3 opacity-50">01</div>
                <div class="position-absolute bottom-0 start-0 p-3 text-white fw-bold">Creative Director</div>
            </div>

            <!-- Kolom 2 -->
            <div class="col-md-2 position-relative">
                <img src="{{ asset('images/demo-music.jpg') }}" class="img-fluid w-100 h-100 object-fit-cover" alt="Art Director">
                <div class="position-absolute top-0 start-0 p-3 text-white fw-bold fs-3 opacity-50">02</div>
                <div class="position-absolute bottom-0 start-0 p-3 text-white fw-bold">Art Director</div>
            </div>

            <!-- Kolom 3 -->
            <div class="col-md-2 position-relative">
                <img src="{{ asset('images/demo-music.jpg') }}" class="img-fluid w-100 h-100 object-fit-cover" alt="Art Consultant">
                <div class="position-absolute top-0 start-0 p-3 text-white fw-bold fs-3 opacity-50">03</div>
                <div class="position-absolute bottom-0 start-0 p-3 text-white fw-bold">Art Consultant</div>
            </div>

            <!-- Kolom 4 -->
            <div class="col-md-2 position-relative">
                <img src="{{ asset('images/demo-music.jpg') }}" class="img-fluid w-100 h-100 object-fit-cover" alt="Creativepreneur">
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
                    <img src="{{ asset('images/demo-music.jpg') }}" alt="Prestasi 1" class="card-img-top">
                    <div class="card-body text-center">
                        <p class="fw-semibold mt-3"> Juara Lomba Desain Nasional</p>
                    </div>
                </div>
            </div>

            <!-- Prestasi 2 -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <img src="{{ asset('images/demo-music.jpg') }}" alt="Prestasi 2" class="card-img-top">
                    <div class="card-body text-center">
                        <p class="fw-semibold mt-3">Karya Dipamerkan Internasional</p>
                    </div>
                </div>
            </div>

            <!-- Prestasi 3 -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <img src="{{ asset('images/demo-music.jpg') }}" alt="Prestasi 3" class="card-img-top">
                    <div class="card-body text-center">
                        <p class="fw-semibold mt-3">Kolaborasi Industri Kreatif</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Section: Mitra & Kolaborator -->
<section id="mitra" class="py-5 bg-white">
    <div class="container">
        <div class="row justify-content-between align-items-center mb-4">
            <div class="col-md-6">
                <h5 class="text-warning fw-bold">Mitra & Kolaborator</h5>
                <h2 class="fw-bold text-dark">Visual Communication Design PCU</h2>
            </div>
            <div class="col-md-6">
                <p class="text-muted">
                    Untuk meningkatkan kualitas lulusan agar sesuai dengan kebutuhan dunia usaha dan industri,
                    Visual Communication Design mendapatkan kesempatan untuk bekerjasama dengan beberapa perusahaan, antara lain:
                </p>
            </div>
        </div>

        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <img src="{{ asset('images/demo-music.jpg') }}" alt="Institut Seni Yogyakarta" class="img-fluid mb-2" style="max-height: 80px;">
                <p class="fw-semibold text-dark mt-2">Institut Seni, <strong>Yogyakarta</strong></p>
            </div>
            <div class="col-md-4 mb-4">
                <img src="{{ asset('images/demo-music.jpg') }}" alt="Institut Seni Denpasar" class="img-fluid mb-2" style="max-height: 80px;">
                <p class="fw-semibold text-dark mt-2">Institut Seni, <strong>Denpasar</strong></p>
            </div>
            <div class="col-md-4 mb-4">
                <img src="{{ asset('images/demo-music.jpg') }}" alt="Dongseo University" class="img-fluid mb-2" style="max-height: 80px;">
                <p class="fw-semibold text-dark mt-2">Dongseo University, <strong>South Korea</strong></p>
            </div>
        </div>
    </div>
</section>


<section id="program" class="py-5 bg-light">
  <div class="container">
    <h2 class="text-center fw-bold mb-4">Program Visual Communication Design</h2>

    <!-- Navigation Tabs -->
    <ul class="nav nav-tabs justify-content-center mb-4" id="programTabs" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="kurikulum-tab" data-bs-toggle="tab" data-bs-target="#kurikulum" type="button" role="tab">Kurikulum</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="penelitian-tab" data-bs-toggle="tab" data-bs-target="#penelitian" type="button" role="tab">Penelitian</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="dosen-tab" data-bs-toggle="tab" data-bs-target="#dosen" type="button" role="tab">Dosen & Staf</button>
      </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content" id="programTabsContent">

      <!-- Kurikulum -->
      <div class="tab-pane fade show active" id="kurikulum" role="tabpanel">
        <div class="text-center">
          <img src="{{ asset('images/demo-music.jpg') }}" class="img-fluid rounded shadow" alt="Kurikulum 2024 DKV">
          <p class="mt-3 text-muted">Struktur Kurikulum DKV 2024 yang lengkap dan terintegrasi.</p>
        </div>
      </div>

      <!-- Penelitian -->
      <div class="tab-pane fade" id="penelitian" role="tabpanel">
        <p class="text-muted">
          Mahasiswa dan dosen DKV aktif dalam berbagai kegiatan penelitian desain, publikasi jurnal, serta kolaborasi dengan industri kreatif untuk pengembangan inovasi visual.
        </p>
        <ul>
          <li>Riset dalam bidang tipografi, desain interaktif, dan media baru</li>
          <li>Kolaborasi dengan institusi nasional & internasional</li>
          <li>Publikasi jurnal ilmiah dan partisipasi dalam seminar desain</li>
        </ul>
      </div>

      <!-- Dosen & Staf -->
      <div class="tab-pane fade" id="dosen" role="tabpanel">
        <div class="row g-4 justify-content-center">

          <!-- Dosen 1 -->
          <div class="col-md-4">
            <div class="card border-0 shadow text-center">
              <img src="{{ asset('images/demo-music.jpg') }}" class="card-img-top" alt="Dr. Listia Natadjaja">
              <div class="card-body">
                <h5 class="card-title">Dr. Listia Natadjaja, S.T., M.T., M. Des.</h5>
                <p class="card-text text-muted">Ketua Program Studi</p>
              </div>
            </div>
          </div>

          <!-- Dosen 2 -->
          <div class="col-md-4">
            <div class="card border-0 shadow text-center">
              <img src="{{ asset('images/demo-music.jpg') }}"class="card-img-top" alt="Elisabeth Christine Yuwono">
              <div class="card-body">
                <h5 class="card-title">Elisabeth Christine Yuwono, S.Sn., M.Hum.</h5>
                <p class="card-text text-muted">Sekretaris Program Studi</p>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>

{{-- fasilitas --}}
<section id="fasilitas" class="py-5 bg-white">
  <div class="container text-center mb-4">
    <h2 class="text-warning fw-bold">Fasilitas</h2>
    <h3 class="fw-bold text-dark">Visual Communication Design PCU</h3>
  </div>

  <div class="container position-relative">
    <!-- Swiper -->
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">

        <!-- Slide 1 -->
        <div class="swiper-slide d-flex justify-content-center">
          <div class="card border-0" style="width: 250px;">
            <img src="{{ asset('images/demo-music.jpg') }}" class="card-img-top rounded" alt="Brandcomm Lab">
            <div class="card-body text-center p-2">
              <h6 class="fw-bold text-primary m-0">BRANDCOMM LAB</h6>
              <small class="text-muted">Brandcomm Lab</small>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="swiper-slide d-flex justify-content-center">
          <div class="card border-0" style="width: 250px;">
            <img src="{{ asset('images/demo-music.jpg') }}" class="card-img-top rounded" alt="Digital Graphic Lab">
            <div class="card-body text-center p-2">
              <h6 class="fw-bold text-primary m-0">DIGITAL GRAPHIC LAB</h6>
              <small class="text-muted">Digital Graphic Lab</small>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="swiper-slide d-flex justify-content-center">
          <div class="card border-0" style="width: 250px;">
            <img src="{{ asset('images/demo-music.jpg') }}" class="card-img-top rounded" alt="Photography Lab">
            <div class="card-body text-center p-2">
              <h6 class="fw-bold text-primary m-0">PHOTOGRAPHY LAB</h6>
              <small class="text-muted">Photography Lab</small>
            </div>
          </div>
        </div>

        <!-- Slide 4 -->
        <div class="swiper-slide d-flex justify-content-center">
          <div class="card border-0" style="width: 250px;">
            <img src="{{ asset('images/demo-music.jpg') }}" class="card-img-top rounded" alt="Motion Lab">
            <div class="card-body text-center p-2">
              <h6 class="fw-bold text-primary m-0">MOTION LAB</h6>
              <small class="text-muted">Motion Graphic Lab</small>
            </div>
          </div>
        </div>

        {{-- tambahkan slide tamabhan jika perlu --}}
      </div>

      <!-- Navigasi -->
      <div class="swiper-button-next text-dark"></div>
      <div class="swiper-button-prev text-dark"></div>
    </div>
  </div>
</section>

{{-- spotlight --}}
<section id="spotlight" class="py-5 bg-white">
  <div class="container">

    <!-- Acara Mendatang -->
    <div class="mb-5">
      <h5 class="fw-bold text-warning">Spotlight</h5>
      <h2 class="fw-bold text-dark">Acara Mendatang</h2>

      <div class="row flex-nowrap overflow-auto mt-3" style="gap: 1rem;">
        <!-- Card 1 -->
        <div class="card p-0 border-0" style="min-width: 220px;">
          <img src="{{ asset('images/demo-music.jpg') }}" class="card-img-top spotlight-img" alt="Innofashion Show 5">
          <div class="bg-light p-2">
            <h6 class="fw-semibold m-0 text-dark small">Innofashion Show 5</h6>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="card p-0 border-0" style="min-width: 220px;">
         <img src="{{ asset('images/demo-music.jpg') }}" class="card-img-top spotlight-img" alt="Innofashion Show 5">
          <div class="bg-light p-2">
            <h6 class="fw-semibold m-0 text-dark small">Adiwara 2023: ANTI. The Afterwards</h6>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="card p-0 border-0" style="min-width: 220px;">
          <img src="{{ asset('images/demo-music.jpg') }}" class="card-img-top spotlight-img" alt="Innofashion Show 5">
          <div class="bg-light p-2">
            <h6 class="fw-semibold m-0 text-dark small">Reuni 25 Tahun: MUDIKOMVIS</h6>
          </div>
        </div>
      </div>
    </div>

    <!-- Berita Terbaru -->
    <div>
      <h5 class="fw-bold text-warning">Spotlight</h5>
      <h2 class="fw-bold text-dark">Berita Terbaru</h2>

      <div class="row flex-nowrap overflow-auto mt-3" style="gap: 1rem;">
        <!-- Card 1 -->
        <div class="card p-0 border-0" style="min-width: 220px;">
          <img src="{{ asset('images/demo-music.jpg') }}" class="card-img-top spotlight-img" alt="Innofashion Show 5">
          <div class="bg-light p-2">
            <h6 class="fw-semibold m-0 text-dark small">Mahasiswa DKV UK Petra di Ngayogjazz 2023</h6>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="card p-0 border-0" style="min-width: 220px;">
          <img src="{{ asset('images/demo-music.jpg') }}" class="card-img-top spotlight-img" alt="Innofashion Show 5">
          <div class="bg-light p-2">
            <h6 class="fw-semibold m-0 text-dark small">Terbang ke Belanda bertemu Mahasiswa Double Degree</h6>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="card p-0 border-0" style="min-width: 220px;">
          <img src="{{ asset('images/demo-music.jpg') }}" class="card-img-top spotlight-img" alt="Innofashion Show 5">
          <div class="bg-light p-2">
            <h6 class="fw-semibold m-0 text-dark small">INSCAPE CERITA “Celetukan Rombongan Ibu Kota”</h6>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

{{-- alumni --}}
<section id="alumni" class="py-5 bg-white">
  <div class="container text-center">

    <!-- Heading -->
    <h4 class="fw-bold text-warning">Alumni Berkesan</h4>
    <h5 class="fw-bold text-dark mb-4">& Testimoni</h5>

    <!-- Alumni Carousel -->
    <div id="alumniCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner d-flex">

        <!-- Slide 1 -->
        <div class="carousel-item active">
          <div class="d-flex justify-content-center gap-4">
            <!-- Alumni Card -->
            <div class="card border-0" style="width: 220px;">
              <img src="{{ asset('images/demo-music.jpg')}}" class="card-img-top" alt="Dira Gana">
              <div class="card-body bg-light">
                <h6 class="fw-bold m-0">Dira Gana</h6>
                <p class="mb-1 small">Creative Manager</p>
                <p class="text-muted small">L'zzie Clothings, Singapore</p>
              </div>
            </div>

            <!-- Alumni Card -->
            <div class="card border-0" style="width: 220px;">
              <img src="{{ asset('images/demo-music.jpg') }}" class="card-img-top" alt="Vincentius Bobby">
              <div class="card-body bg-light">
                <h6 class="fw-bold m-0">Vincentius Bobby Hartono</h6>
                <p class="mb-1 small">Head of Creative and Communication</p>
                <p class="text-muted small">Eka Hospital</p>
              </div>
            </div>

            <!-- Alumni Card -->
            <div class="card border-0" style="width: 220px;">
              <img src="{{ asset('images/demo-music.jpg') }}" class="card-img-top" alt="Grace Giovani">
              <div class="card-body bg-light">
                <h6 class="fw-bold m-0">Grace Giovani</h6>
                <p class="mb-1 small">Brand Manager</p>
                <p class="text-muted small">PT. Santos Jaya Abadi (Kapal Api Group)</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Tambahkan carousel-item lain jika ada lebih banyak alumni -->

      </div>

      <!-- Controls -->
      <button class="carousel-control-prev" type="button" data-bs-target="#alumniCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#alumniCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>
  </div>
</section>


{{-- pendaftaran --}}
<section class="py-5" style="background-color: #fff;">
  <div class="container">
    <div class="row align-items-center">

      <!-- Left (Text Content) -->
      <div class="col-md-6 bg-dark text-white p-5" style="background-color: #1E2C54;">
        <h4 class="fw-bold text-warning mb-2">Pendaftaran</h4>
        <h4 class="fw-bold text-white mb-3">Mahasiswa Baru</h4>
        <p class="mb-4" style="color: #e1e1e1;">
          Pertajam pengetahuan, asah keterampilan, dan bentuk karakter dalam nilai-nilai Kristiani bersama kami.
          Pelajari lebih lanjut mengenai cara pendaftaran serta biaya dan beasiswa yang bisa kamu peroleh di
          Universitas Kristen Petra.
        </p>
        <div class="d-flex gap-3">
          <a href="#" class="btn btn-warning text-dark fw-semibold px-4">DAFTAR SEKARANG</a>
          <a href="#" class="btn btn-outline-light fw-semibold px-4">WEBSITE UTAMA</a>
        </div>
      </div>

      <!-- Right (Image) -->
      <div class="col-md-6 p-0">
        <img src="{{ asset('images/demo-music.jpg') }}" alt="Mahasiswa Baru" class="img-fluid w-100 h-100 object-fit-cover">
      </div>

    </div>
  </div>
</section>










        <!-- end section -->
@endsection
