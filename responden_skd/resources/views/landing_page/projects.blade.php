@extends('landing_page.landing_page_layout')

@section('landing_page')
    <!-- Projects Section-->
    <section class="py-5">
        <div class="container px-5 mb-5">
            <div class="text-center mb-5">
                <h1 class="display-5 fw-bolder mb-5"><span class="text-gradient d-inline">Projects</span></h1>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-11 col-xl-9 col-xxl-8">
                    <!-- Project Card 1-->
                    <section class="project">
                        <div class="card overflow-hidden shadow rounded-4 border-0 hidden">
                            <div class="card-body p-0">
                                <div class="d-flex align-items-center">
                                    <div class="p-5">
                                        <h2 class="fw-bolder">Pendataan Responden Suvei Kebutuhan Data</h2>
                                        <p>Proyek ini merupakan inovasi dari tim IPDS untuk memudahkan dalam mendata setiap
                                            responden yang melakukan permintaan data ke bagian PST. Untuk pengguna sendiri,
                                            dapat digunakan sebagai alat komunikasi dalam permintaan data kepada pihak PST
                                            di mana saja dan kapan saja. Tekan gambar untuk menuju halaman pengguna.</p>
                                    </div>
                                    <a href="{{ url('/guest/permintaan_data') }}"><img
                                            src="{{ url('/assets') }}/img/project/project_skd.png" alt="..."
                                            width="300" height="400" /></a>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Project Card 2-->
                    <section class="project">
                        <div class="card overflow-hidden shadow rounded-4 border-0 hidden">
                            <div class="card-body p-0">
                                <div class="d-flex align-items-center">
                                    <div class="p-5">
                                        <h2 class="fw-bolder">Sistem Peminjaman Buku Perpustakaan</h2>
                                        <p>Sistem ini merupakan <i>cost-effective system</i> dalam rangka melakukan
                                            peminjaman buku, sehingga dari sisi bagian PST dapat dengan mudah melakukan
                                            manejerial peminjam buku, dan memudahkan dari sisi pengguna akhir untuk
                                            berkomunikasi kepada pihak PST terkait proses peminjaman buku. Tekan gambar
                                            untuk menuju halaman pengguna.</p>
                                    </div>
                                    <a href="{{ url('/guest/pinjam_buku') }}"><img width="300" height="400"
                                            src="{{ url('/assets') }}/img/project/project_perpus.jpg" alt="..." /></a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <!-- Call to action section-->
    <section class="py-5 bg-gradient-primary-to-secondary text-white">
        <div class="container px-5 my-5">
            <div class="text-center">
                <h2 class="display-4 fw-bolder mb-4">Let's build something together</h2>
                <a class="btn btn-outline-light btn-lg px-5 py-3 fs-6 fw-bolder" href="#">Contact me</a>
            </div>
        </div>
    </section>
@endsection
