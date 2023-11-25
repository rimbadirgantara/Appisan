@extends('frontLayouts.frontLayouts')
@section('pages')

<section class="hero-section d-flex justify-content-center align-items-center" id="home">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-12 mx-auto">
                <h1 class="text-white text-center">Pilih Jurusan Mu Sekarang !</h1>
                <h6 class="text-center">Kami Akan Membantu Kamu</h6>
            </div>
        
        </div>
        <div class="row">
            <div class="col-lg-5"></div>
            <div class="col-lg">
                <div class="">
                    <a href="#bantuSaya" class="btn custom-btn custom-border-btn smoothscroll me-4">Ayo Mulai</a>
                </div>
            </div>
            <div class="col-5"></div>
        </div>
    </div>
</section>


<section class="featured-section">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                <div class="custom-block bg-white shadow-lg">
                    <a href="topics-detail.html">
                        <div class="d-flex">
                            <div>
                                <h5 class="mb-2">Siapa Kami ?</h5>

                                <p class="mb-0">Tim "Pintar Pilih Jurusan" memberikan panduan cerdas berbasis Sistem Pendukung Keputusan untuk membantu calon mahasiswa menentukan pilihan jurusan dengan keyakinan.</p>
                            </div>

                            <span class="badge bg-design rounded-pill ms-auto">&#128512</span>
                        </div>

                        <img src="frontTemplate/images/topics/undraw_Remote_design_team_re_urdx.png" class="custom-block-image img-fluid" alt="">
                    </a>
                </div>
            </div>

            <div class="col-lg-6 col-12">
                <div class="custom-block custom-block-overlay">
                    <div class="d-flex flex-column h-100">
                        <img src="frontTemplate/images/businesswoman-using-tablet-analysis.jpg" class="custom-block-image img-fluid" alt="">

                        <div class="custom-block-overlay-text d-flex">
                            <div>
                                <h5 class="text-white mb-2">Pintar Pilih Jurusan</h5>

                                <p class="text-white">
                                    "Pintar Pilih Jurusan" adalah web aplikasi berbasis sistem pendukung keputusan untuk membantu calon mahasiswa menemukan jurusan yang sesuai. Dengan analisis data, aplikasi ini memberikan rekomendasi akurat, memudahkan pengguna dalam mengambil keputusan cerdas tentang pilihan pendidikan tinggi mereka.</p>

                                <a href="#bantuSaya" class="btn custom-btn mt-2 mt-lg-3">Ayo Mulai !</a>
                            </div>

                            <span class="badge bg-finance rounded-pill ms-auto">&#128512</span>
                        </div>

                        <div class="social-share d-flex">
                            <p class="text-white me-4">Berbagi:</p>

                            <ul class="social-icon">
                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi bi-whatsapp"></a>
                                </li>
                        </div>

                        <div class="section-overlay"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="explore-section section-padding" id="bantuSaya">
    <div class="container">

            <div class="col-12 text-center">
                <h2 class="mb-4">Kami Akan Membantu Mu !</h1>
                <p class="mb-2">Silahkan isi kolom input dibawah ini sesuai nilai tarakir kamu :D</p>
            </div>

        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="design-tab" data-bs-toggle="tab" data-bs-target="#design-tab-pane" type="button" role="tab" aria-controls="design-tab-pane" aria-selected="true">Robot</button>
                </li>
            </ul>
        </div>
    </div>

    <div class="container">
        <div class="row">

            <div class="col-12">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="design-tab-pane" role="tabpanel" aria-labelledby="design-tab" tabindex="0">
                        <div class="row">
                            <div class="col">
                                <div class="custom-block bg-white shadow-lg">
                                    <div class="d-flex mb-2">
                                        <div>
                                            <h5 class="mb-2">Papan Digital Penentuan</h5>
                                        </div>

                                        <span class="badge bg-design rounded-pill ms-auto">&#128512</span>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-lg-6">
                                            <div class="form-floating">
                                                <input type="text" name="name" id="name" class="form-control" placeholder="Nilai A" required="">
                                                <label for="floatingInput">Nilai C</label>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-floating">
                                                <input type="text" name="name" id="name" class="form-control" placeholder="Nilai B" required="">
                                                <label for="floatingInput">Nilai D</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-lg-6">
                                            <div class="form-floating">
                                                <input type="text" name="name" id="name" class="form-control" placeholder="Nilai A" required="">
                                                <label for="floatingInput">Nilai E</label>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-floating">
                                                <input type="text" name="name" id="name" class="form-control" placeholder="Nilai B" required="">
                                                <label for="floatingInput">Nilai F</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-3">
                                        <div class="col-lg-6">
                                            <div class="form-floating">
                                                <input type="text" name="name" id="name" class="form-control" placeholder="Nilai A" required="">
                                                <label for="floatingInput">Nilai G</label>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-floating">
                                                <input type="text" name="name" id="name" class="form-control" placeholder="Nilai B" required="">
                                                <label for="floatingInput">Nilai H</label>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="#bantuSaya" class="btn custom-btn custom-border-btn smoothscroll me-4">Tentukan !</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>
</section>


<section class="timeline-section section-padding" id="beginiCaraKerjaNya">
    <div class="section-overlay"></div>

    <div class="container">
        <div class="row">

            <div class="col-12 text-center">
                <h2 class="text-white mb-4">Seperti ini kerja nya</h1>
            </div>

            <div class="col-lg-10 col-12 mx-auto">
                <div class="timeline-container">
                    <ul class="vertical-scrollable-timeline" id="vertical-scrollable-timeline">
                        <div class="list-progress">
                            <div class="inner"></div>
                        </div>

                        <li>
                            <h4 class="text-white mb-3">Input Nilai Kamu</h4>

                            <p class="text-white">Disini kamu input nilai yang di minta oleh aplikasi nya 😄</p>

                            <div class="icon-holder">
                            <i class="bi bi-pen"></i>
                            </div>
                        </li>
                        
                        <li>
                            <h4 class="text-white mb-3">Tunggu !</h4>

                            <p class="text-white">Disini sistem kami sedang mengkalkulasi nilai kamu dengan algoritma yang rumit untuk mendapatkan jurusan yang cocok buat kamu 👍</p>

                            <div class="icon-holder">
                            <i class="bi bi-cpu"></i>
                            </div>
                        </li>

                        <li>
                            <h4 class="text-white mb-3">Selesai</h4>

                            <p class="text-white">Nah setelah selesai di kalkukasi, hasil nya kan di perlihat kan ke kamu 🌟</p>

                            <div class="icon-holder">
                            <i class="bi bi-check-circle"></i>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="faq-section section-padding" id="Nanya?">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-12">
                <h2 class="mb-4">Pertanyaan yang Sering Diajukan</h2>
            </div>

            <div class="clearfix"></div>

            <div class="col-lg-5 col-12">
                <img src="frontTemplate/images/faq_graphic.jpg" class="img-fluid" alt="FAQs">
            </div>

            <div class="col-lg-6 col-12 m-auto">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Bagaimana "Pintar Pilih Jurusan" membantu menentukan jurusan kuliah?
                            </button>
                        </h2>

                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Aplikasi ini menganalisis data minat, potensi, dan tujuan karir untuk memberikan rekomendasi jurusan yang sesuai.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Data apa yang digunakan aplikasi ini untuk memberikan rekomendasi jurusan?
                        </button>
                        </h2>

                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Aplikasi menggunakan hasil tes minat, prestasi akademis, dan informasi ekstrakurikuler untuk menghasilkan rekomendasi akurat.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Bagaimana antarmuka pengguna aplikasi dirancang untuk memudahkan pengguna?
                        </button>
                        </h2>

                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Antarmuka intuitif memungkinkan pengguna menjelajahi opsi jurusan, melihat informasi terkait, dan mendapatkan rekomendasi dengan cepat.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
</main>
@endsection