<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard ALKA</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets-general/assets/favicon.ico') }}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('assets-general/css/styles.css') }}" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            {{-- logo --}}
            <img src="{{ asset('assets-admin/img/brand/ALKA.LOGO.png') }}"
                class="card-img-top rounded-circle border-white d-block mx-auto me-2" alt="Bonnie Green"
                style="width: 50px; height: 50px;">
            <a class="navbar-brand text-white fs-3 fw-bold" href="#">ALKA.COFFEE</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio">Product</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#team">Team</a></li>
                    <li class="nav-item"><a class="nav-link" href="#location">Location</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('login.admin') }}">Admin</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">Welcome To Our Website!</div>
            <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
            <a class="btn btn-primary btn-xl text-uppercase" href="#services">Tell Me More</a>
        </div>
    </header>
    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Services</h2>
                <h3 class="section-subheading text-muted">Kami selalu memberikan pelayanan maksimal kepada para
                    pelanggan kami</h3>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-custom"></i>
                        <i class="fas fa-users fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Responsif dan Ramah</h4>
                    <p class="text-muted">Memberikan layanan yang cepat dan responsif untuk memastikan kepuasan
                        pelanggan, baik melalui komunikasi langsung, telepon, maupun platform digital, dengan tim yang
                        selalu siap membantu menjawab pertanyaan atau menangani keluhan.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-custom"></i>
                        <i class="fas fa-cutlery fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Fasilitas Lengkap</h4>
                    <p class="text-muted">Menyediakan fasilitas yang mendukung kenyamanan pelanggan, seperti ruang
                        tunggu yang nyaman, akses Wi-Fi gratis, tempat parkir luas, dan area bermain untuk anak-anak,
                        sehingga pengalaman pelanggan menjadi lebih menyenangkan.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-custom"></i>
                        <i class="fas fa-thumbs-up fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Kualitas dan Keamanan Terjamin</h4>
                    <p class="text-muted">Menjamin semua produk dan layanan memenuhi standar kualitas tinggi serta
                        memprioritaskan keamanan, baik dalam penyajian makanan, kebersihan tempat, hingga layanan
                        pelanggan, untuk memberikan pengalaman terbaik yang bebas dari risiko.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Portfolio Grid-->
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Product</h2>
                <h3 class="section-subheading text-muted">Kami menyediakan berbagai macam product yang membuatmu bahagia
                </h3>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 1-->
                    <div class="card border-0">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid card-img-top"
                                    src="{{ asset('assets-general/assets/img/portfolio/1.png') }}" alt="..." />
                            </a>
                            <div class="portfolio-caption p-3">
                                <div class="portfolio-caption-heading" style="color: #B55505;">Matcha Latte</div>
                                <div class="portfolio-caption-subheading text-muted" style="color: #28a745;">
                                    <strong>Harga:</strong> Rp 30.000</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 2-->
                    <div class="card border-0">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal2">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid card-img-top"
                                    src="{{ asset('assets-general/assets/img/portfolio/2.png') }}" alt="..." />
                            </a>
                            <div class="portfolio-caption p-3">
                                <div class="portfolio-caption-heading" style="color: #B55505;">Caramel Macchiato</div>
                                <div class="portfolio-caption-subheading text-muted" style="color: #28a745;">
                                    <strong>Harga:</strong> Rp 35.000</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 3-->
                    <div class="card border-0">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal3">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid card-img-top"
                                    src="{{ asset('assets-general/assets/img/portfolio/3.png') }}" alt="..." />
                            </a>
                            <div class="portfolio-caption p-3">
                                <div class="portfolio-caption-heading" style="color: #B55505;">Hazelnut Latte</div>
                                <div class="portfolio-caption-subheading text-muted" style="color: #28a745;">
                                    <strong>Harga:</strong> Rp 33.000</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                    <!-- Portfolio item 4-->
                    <div class="card border-0">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal4">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid card-img-top"
                                    src="{{ asset('assets-general/assets/img/portfolio/4.png') }}" alt="..." />
                            </a>
                            <div class="portfolio-caption p-3">
                                <div class="portfolio-caption-heading" style="color: #B55505;">Vanilla Latte</div>
                                <div class="portfolio-caption-subheading text-muted" style="color: #28a745;">
                                    <strong>Harga:</strong> Rp 32.000</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4 mb-sm-0">
                    <!-- Portfolio item 5-->
                    <div class="card border-0">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal5">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid card-img-top"
                                    src="{{ asset('assets-general/assets/img/portfolio/5.png') }}" alt="..." />
                            </a>
                            <div class="portfolio-caption p-3">
                                <div class="portfolio-caption-heading" style="color: #B55505;">Butterscotch Coffee
                                </div>
                                <div class="portfolio-caption-subheading text-muted" style="color: #28a745;">
                                    <strong>Harga:</strong> Rp 35.000</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <!-- Portfolio item 6-->
                    <div class="card border-0">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal6">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid card-img-top"
                                    src="{{ asset('assets-general/assets/img/portfolio/6.png') }}" alt="..." />
                            </a>
                            <div class="portfolio-caption p-3">
                                <div class="portfolio-caption-heading" style="color: #B55505;">Chocolate Frappe</div>
                                <div class="portfolio-caption-subheading text-muted" style="color: #28a745;">
                                    <strong>Harga:</strong> Rp 28.000</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About-->
    <section class="page-section" id="about">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">About</h2>
                <h3 class="section-subheading text-muted">"Berawal dari secangkir kopi, tumbuh menjadi tempat penuh
                    cerita."</h3>
            </div>
            <ul class="timeline">
                <li>
                    <div class="timeline-image"><img class="rounded-circle img-fluid"
                            src="{{ asset('assets-general/assets/img/about/1.jpg') }}" alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>2009-2011</h4>
                            <h4 class="subheading">Awal yang Sederhana</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Berawal dari sebuah ide sederhana, ALKA.COFFEE dirancang dengan visi
                                menghadirkan kopi berkualitas yang dapat dinikmati semua kalangan. Perencanaan mencakup
                                konsep, menu unik, dan pengalaman pelanggan yang berbeda.</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image"><img class="rounded-circle img-fluid"
                            src="{{ asset('assets-general/assets/img/about/2.jpg') }}" alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>March 2011</h4>
                            <h4 class="subheading">Merangkai Persiapan</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Dalam tahap ini, seluruh kebutuhan seperti peralatan, bahan baku, dan
                                desain interior dihitung dengan cermat. ALKA.COFFEE memanfaatkan dana dari sumber
                                pribadi dan dukungan komunitas.</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-image"><img class="rounded-circle img-fluid"
                            src="{{ asset('assets-general/assets/img/about/3.jpg') }}" alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>December 2015</h4>
                            <h4 class="subheading">Survei dan Pemilihan Lokasi</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Setelah melakukan survei di berbagai tempat, akhirnya dipilih lokasi
                                yang strategis dan mudah diakses. Tempat ini dirancang untuk menciptakan suasana nyaman
                                bagi pelanggan, menjadi rumah bagi pecinta kopi.</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image"><img class="rounded-circle img-fluid"
                            src="{{ asset('assets-general/assets/img/about/4.jpg') }}" alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>July 2020</h4>
                            <h4 class="subheading">Grand Opening – Mulai Melayani Pelanggan</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">ALKA.COFFEE resmi dibuka! Dengan antusiasme besar, kami mulai
                                menyajikan kopi terbaik dan memberikan pelayanan hangat kepada setiap pelanggan yang
                                datang.</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-image"><img class="rounded-circle img-fluid"
                            src="{{ asset('assets-general/assets/img/about/5.jpg') }}" alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>December 2015</h4>
                            <h4 class="subheading">Perkembangan dan Ekspansi</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Seiring waktu, ALKA.COFFEE terus berkembang. Dengan bertambahnya
                                cabang, kami kini melayani lebih banyak pelanggan dan tetap berkomitmen pada kualitas
                                rasa serta suasana yang menyenangkan.</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image">
                        <h4>
                            Be Part
                            <br />
                            Of Our
                            <br />
                            Story!
                        </h4>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- Team-->
    <section class="page-section bg-light" id="team">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Our Amazing Development Team</h2>
                <h3 class="section-subheading text-muted">"Dedikasi kami, kepuasan Anda."</h3>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="team-member text-center">
                        <img class="mx-auto rounded-circle" src="{{ asset('assets-general/assets/img/team/1.jpg') }}"
                            alt="..." />
                        <h4>Nuraisyah</h4>
                        <p class="text-muted">2357301097</p>
                        {{-- <a class="btn btn-dark btn-social mx-2" href="#!"
                            aria-label="Aisyah Anand Twitter Profile"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"
                            aria-label="Aisyah Anand Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"
                            aria-label="Aisyah Anand LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a> --}}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-member text-center">
                        <img class="mx-auto rounded-circle" src="{{ asset('assets-general/assets/img/team/2.jpg') }}"
                            alt="..." />
                        <h4>Nurul Aiza</h4>
                        <p class="text-muted">2357301098</p>
                        {{-- <a class="btn btn-dark btn-social mx-2" href="#!"
                            aria-label="Iza Petersen Twitter Profile"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"
                            aria-label="Iza Petersen Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"
                            aria-label="Iza Petersen LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <p class="large text-muted">
                        ALKA.COFFEE, lebih dari sekadar kopi, menghadirkan cita rasa dan kehangatan
                        dalam setiap cangkir yang penuh dengan cerita.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Clients-->
    {{-- <div class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto"
                            src="{{ asset('assets-general/assets/img/logos/microsoft.svg') }}" alt="..."
                            aria-label="Microsoft Logo" /></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto"
                            src="{{ asset('assets-general/assets/img/logos/google.svg') }}" alt="..."
                            aria-label="Google Logo" /></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto"
                            src="{{ asset('assets-general/assets/img/logos/facebook.svg') }}" alt="..."
                            aria-label="Facebook Logo" /></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto"
                            src="{{ asset('assets-general/assets/img/logos/ibm.svg') }}" alt="..."
                            aria-label="IBM Logo" /></a>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Location-->
    <section class="page-section" id="location">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Our Location</h2>
                <h3 class="section-subheading text-primary">Jl. Cut Nyak Dien - Pekanbaru, Riau - Belakang Perpustakaan
                    Wilayah Soeman HS</h3>
            </div>
            <!-- * * * * * * * * * * * * * * *-->
            <!-- * * SB Forms Contact Form * *-->
            <!-- * * * * * * * * * * * * * * *-->
            <!-- This form is pre-integrated with SB Forms.-->
            <!-- To make this form functional, sign up at-->
            <!-- https://startbootstrap.com/solution/contact-forms-->
            <!-- to get an API token!-->
            {{-- <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- Name input-->
                                <input class="form-control" id="name" type="text" placeholder="Your Name *" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <div class="form-group">
                                <!-- Email address input-->
                                <input class="form-control" id="email" type="email" placeholder="Your Email *" data-sb-validations="required,email" />
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                            <div class="form-group mb-md-0">
                                <!-- Phone number input-->
                                <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <!-- Message input-->
                                <textarea class="form-control" id="message" placeholder="Your Message *" data-sb-validations="required"></textarea>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                            </div>
                        </div>
                    </div>
                    <!-- Submit success message-->
                    <!---->
                    <!-- This is what your users will see when the form-->
                    <!-- has successfully submitted-->
                    <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center text-white mb-3">
                            <div class="fw-bolder">Form submission successful!</div>
                            To activate this form, sign up at
                            <br />
                            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                        </div>
                    </div>
                    <!-- Submit error message-->
                    <!---->
                    <!-- This is what your users will see when there is-->
                    <!-- an error submitting the form-->
                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                    <!-- Submit Button-->
                    <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton" type="submit">Send Message</button></div>
                </form> --}}

            <!-- Tambahkan Peta -->
            <div class="row">
                <div class="col-md-12 px-0">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d498.70687228558177!2d101.44519103699166!3d0.5184555931266466!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5ac03387a29a1%3A0x75413a89cc09bf6d!2sJl.%20Cut%20Nyak%20Dhien%2C%20Kota%20Pekanbaru%2C%20Riau%2028156!5e0!3m2!1sid!2sid!4v1733666490762!5m2!1sid!2sid"
                        width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
    </section>
    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <!-- Kolom 1: Copyright -->
                <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2023</div>

                <!-- Kolom 2: Ikon Media Sosial -->
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i
                            class="fab fa-linkedin-in"></i></a>
                </div>

                <!-- Kolom 3: Privacy & Terms -->
                <div class="col-lg-4 text-lg-end">
                    <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                    <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Portfolio Modals-->
    <!-- Portfolio item 1 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {{-- <div class="close-modal" data-bs-dismiss="modal">
                    <img src="{{ asset('assets-general/assets/img/close-icon.svg') }}" alt="Close modal" />
                </div> --}}
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="modal-body d-flex align-items-center">
                                <!-- Gambar produk -->
                                <div class="modal-image">
                                    <img class="img-fluid"
                                        src="{{ asset('assets-general/assets/img/portfolio/1.png') }}"
                                        alt="Matcha Latte" width="400" height="auto">
                                </div>
                                <!-- Detail produk -->
                                <div class="modal-details ms-4">
                                    <h2 class="text-uppercase">Matcha Latte</h2>
                                    <p class="item-intro text-muted">Non-Coffee</p>
                                    <p>Kombinasi susu segar dengan bubuk matcha premium, menghasilkan rasa manis dan
                                        sedikit pahit yang seimbang.</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Harga:</strong>
                                            Rp 30.000,00
                                        </li>
                                        <li>
                                            <strong>Promo:</strong>
                                            Diskon 10% setiap pembelian 2 cup.
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                        type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Product
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio item 2 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {{-- <div class="close-modal" data-bs-dismiss="modal">
                    <img src="{{ asset('assets-general/assets/img/close-icon.svg') }}" alt="Close modal" />
                </div> --}}
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="modal-body d-flex align-items-center">
                                <div class="modal-image">
                                    <img class="img-fluid"
                                        src="{{ asset('assets-general/assets/img/portfolio/2.png') }}"
                                        alt="Caramel Macchiato">
                                </div>
                                <div class="modal-details ms-4">
                                    <h2 class="text-uppercase">Caramel Macchiato</h2>
                                    <p class="item-intro text-muted">Coffee</p>
                                    <p>Kopi espresso kuat dengan tambahan susu lembut dan sirup caramel manis.</p>
                                    <ul class="list-inline">
                                        <li><strong>Harga:</strong> Rp 35.000,00</li>
                                        <li><strong>Promo:</strong> Gratis topping ekstra caramel untuk pembelian hari
                                            Senin.</li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                        type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Product
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio item 3 modal popup -->
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {{-- <div class="close-modal" data-bs-dismiss="modal">
                    <img src="{{ asset('assets-general/assets/img/close-icon.svg') }}" alt="Close modal" />
                </div> --}}
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="modal-body d-flex align-items-center">
                                <div class="modal-image">
                                    <img class="img-fluid"
                                        src="{{ asset('assets-general/assets/img/portfolio/3.png') }}"
                                        alt="Hazelnut Latte">
                                </div>
                                <div class="modal-details ms-4">
                                    <h2 class="text-uppercase">Hazelnut Latte</h2>
                                    <p class="item-intro text-muted">Coffee</p>
                                    <p>Susu lembut dengan aroma kacang hazelnut yang khas dan sentuhan espresso.</p>
                                    <ul class="list-inline">
                                        <li><strong>Harga:</strong> Rp 33.000,00</li>
                                        <li><strong>Promo:</strong> Buy 1 Get 1 pada hari Jumat.</li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                        type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Product
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio item 4 modal popup -->
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {{-- <div class="close-modal" data-bs-dismiss="modal">
                    <img src="{{ asset('assets-general/assets/img/close-icon.svg') }}" alt="Close modal" />
                </div> --}}
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="modal-body d-flex align-items-center">
                                <div class="modal-image">
                                    <img class="img-fluid"
                                        src="{{ asset('assets-general/assets/img/portfolio/4.png') }}"
                                        alt="Vanilla Latte">
                                </div>
                                <div class="modal-details ms-4">
                                    <h2 class="text-uppercase">Vanilla Latte</h2>
                                    <p class="item-intro text-muted">Coffee</p>
                                    <p>Espresso halus dengan susu segar dan sentuhan manis vanila alami.</p>
                                    <ul class="list-inline">
                                        <li><strong>Harga:</strong> Rp 32.000,00</li>
                                        <li><strong>Promo:</strong> Diskon 15% untuk pembelian 3 cup atau lebih.</li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                        type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Product
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio item 5 modal popup -->
    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {{-- <div class="close-modal" data-bs-dismiss="modal">
                    <img src="{{ asset('assets-general/assets/img/close-icon.svg') }}" alt="Close modal" />
                </div> --}}
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="modal-body d-flex align-items-center">
                                <div class="modal-image">
                                    <img class="img-fluid"
                                        src="{{ asset('assets-general/assets/img/portfolio/5.png') }}"
                                        alt="Butterscotch Coffee">
                                </div>
                                <div class="modal-details ms-4">
                                    <h2 class="text-uppercase">Butterscotch Coffee</h2>
                                    <p class="item-intro text-muted">Coffee</p>
                                    <p>Kombinasi espresso dengan sirup butterscotch manis dan susu creamy.</p>
                                    <ul class="list-inline">
                                        <li><strong>Harga:</strong> Rp 35.000,00</li>
                                        <li><strong>Promo:</strong> Dapatkan cup reusable gratis untuk pembelian di atas
                                            Rp 100.000.</li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                        type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Product
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio item 6 modal popup -->
    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {{-- <div class="close-modal" data-bs-dismiss="modal">
                    <img src="{{ asset('assets-general/assets/img/close-icon.svg') }}" alt="Close modal" />
                </div> --}}
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="modal-body d-flex align-items-center">
                                <div class="modal-image">
                                    <img class="img-fluid"
                                        src="{{ asset('assets-general/assets/img/portfolio/6.png') }}"
                                        alt="Chocolate Frappe">
                                </div>
                                <div class="modal-details ms-4">
                                    <h2 class="text-uppercase">Chocolate Frappe</h2>
                                    <p class="item-intro text-muted">Non Coffee</p>
                                    <p>Minuman cokelat dingin dengan tekstur lembut, dibuat dari cokelat Belgia
                                        berkualitas tinggi.</p>
                                    <ul class="list-inline">
                                        <li><strong>Harga:</strong> Rp 28.000,00</li>
                                        <li><strong>Promo:</strong> Tambah Rp 5.000 untuk whipped cream ekstra.</li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                        type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Product
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('assets-general/js/scripts.js') }}"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
