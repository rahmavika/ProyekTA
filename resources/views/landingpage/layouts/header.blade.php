    <!-- Preloader Start -->
<div class="header-bottom  header-sticky">
    <div class="container-fluid">
        <div class="row align-items-center">
            <!-- Logo -->
            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-3">
                <div class="logo">
                  <a href="index.html"><img src="assets/img/logo/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-8 col-md-7 col-sm-5">
                <!-- Main-menu -->
                <div class="main-menu f-right d-none d-lg-block">
                    <nav>
                        <ul id="navigation">
                            <li><a href="/">Home</a></li>
                            <li class="hot"><a href="#">Kategori</a>
                                <ul class="submenu">
                                    <li><a href="product_list.html"> Material Struktural</a></li>
                                    <li><a href="single-product.html"> Material Finishing</a></li>
                                    <li><a href="single-product.html"> Materila Atap</a></li>
                                    <li><a href="single-product.html"> Material Plumbing & Sanitasi</a></li>
                                    <li><a href="single-product.html"> Material Listrik</a></li>
                                    <li><a href="single-product.html"> Material Pintu & Jendela</a></li>
                                    <li><a href="single-product.html"> Perlengkapan Bangunan</a></li>
                                    <li><a href="single-product.html"> Peralatan Bangunan</a></li>
                                </ul>
                            </li>
                            <li><a href="/semuaproduk">Semua Produk</a></li>
                            <li><a href="/tentang">Tentang Kami</a></li>
                            <li><a href="/contactus">Contact</a></li>

                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-xl-5 col-lg-3 col-md-3 col-sm-3 fix-card">
                <ul class="header-right f-right d-none d-lg-block d-flex justify-content-between">
                    <li class="d-none d-xl-block">
                        <div class="form-box f-right ">
                            <input type="text" name="Search" placeholder="Search products">
                            <div class="search-icon">
                                <i class="fas fa-search special-tag"></i>
                            </div>
                        </div>
                     </li>
                    <li>
                        <div class="shopping-card">
                            <a href="#"><i class="fas fa-shopping-cart"></i></a>
                        </div>
                    </li>
                    <li class="d-none d-lg-block">
                        <button
                          type="button"
                          class="btn header-btn"
                          data-bs-toggle="modal"
                          data-bs-target="#loginModal"
                        >
                          Sign in
                        </button>
                      </li>
                </ul>
            </div>
            <!-- Mobile Menu -->
            <div class="col-12">
                <div class="mobile_menu d-block d-lg-none"></div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

@include('login')
