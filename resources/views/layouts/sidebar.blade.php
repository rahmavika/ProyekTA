<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header" style="
            background: linear-gradient(to right, #f4f4f4, #ffffff);
            padding: 10px 15px;
            border-radius: 4px;
        ">
            <link href="https://fonts.googleapis.com/css2?family=Marcellus&display=swap" rel="stylesheet">
            <a href="/welcome" class="b-brand" style="text-decoration: none;">
                <span style="
                    font-family: 'Marcellus', serif;
                    font-size: 1rem;
                    font-weight: normal;
                    color: #2f4f4f;
                    letter-spacing: 2px;
                ">
                    A.W. KARYA BANGUNAN
                </span>
            </a>
        </div>
    </div>
      <div class="navbar-content">
        <ul class="pc-navbar">
          <li class="pc-item">
            <a href="/dashboard" class="pc-link">
              <span class="pc-micon"><i class="fas fa-chart-line"></i>
              </span>
              <span class="pc-mtext">Dashboard</span>
            </a>
          </li>
          @if (Auth::user()->role === 'super_admin')
          <li class="pc-item pc-caption">
            <label>Data Master</label>
            <i class="ti ti-dashboard"></i>
          </li>
          <li class="pc-item">
            <a href="/dashboard-supplier" class="pc-link">
              <span class="pc-micon"><i class="fas fa-truck"></i></span>
              <span class="pc-mtext">Data Supplier</span>
            </a>
          </li>
          <li class="pc-item">
            <a href="/dashboard-kategori" class="pc-link">
              <span class="pc-micon"><i class="fas fa-tags"></i></span>
              <span class="pc-mtext">Kategori Produk</span>
            </a>
          </li>
          <li class="pc-item">
            <a href="/dashboard-satuan" class="pc-link">
              <span class="pc-micon"><i class="fas fa-ruler"></i></span>
              <span class="pc-mtext">Satuan Produk</span>
            </a>
          </li>
          @endif
          <li class="pc-item pc-caption">
            <label>Produk dan Stok</label>
            <i class="ti ti-dashboard"></i>
          </li>
          <li class="pc-item">
            <a href="/dashboard-produk" class="pc-link">
              <span class="pc-micon"><i class="fas fa-box"></i></span>
              <span class="pc-mtext">Produk</span>
            </a>
          </li>
          <li class="pc-item">
            <a href="/dashboard-stok" class="pc-link">
              <span class="pc-micon"><i class="fas fa-warehouse"></i></span>
              <span class="pc-mtext">Stok Produk</span>
            </a>
          </li>
          <li class="pc-item">
            <a href="/dashboard-mutasi" class="pc-link">
              <span class="pc-micon"><i class="fas fa-boxes"></i></span>
              <span class="pc-mtext">Log Stok</span>
            </a>
          </li>
          <li class="pc-item pc-caption">
            <label>Penjualan</label>
            <i class="ti ti-dashboard"></i>
          </li>
          <li class="pc-item">
            <a href="/dashboard-pesanan" class="pc-link">
              <span class="pc-micon"><i class="fas fa-clipboard-list"></i></span>
              <span class="pc-mtext">Pesanan Masuk</span>
            </a>
          </li>
            <li class="pc-item">
                <a href="/dashboard-penjualan" class="pc-link">
                    <span class="pc-micon"><i class="fas fa-cash-register"></i></span>
                    <span class="pc-mtext">Penjualan</span>
                </a>
            </li>
          <li class="pc-item pc-caption">
            <label>Lainnya</label>
            <i class="ti ti-dashboard"></i>
          </li>
          <li class="pc-item">
            <a href="/dashboard-pengguna" class="pc-link">
              <span class="pc-micon"><i class="fas fa-users"></i></span>
              <span class="pc-mtext">Data Pengguna</span>
            </a>
          </li>
          <li class="pc-item">
            <a href="/contact-us" class="pc-link">
              <span class="pc-micon"><i class="fas fa-envelope"></i></span>
              <span class="pc-mtext">Contact Us</span>
            </a>
          </li>
          <li class="pc-item">
            <form id="logout-form" action="/logout" method="POST" style="display: inline;">
                @csrf
                <a href="#" class="pc-link" onclick="document.getElementById('logout-form').submit();">
                    <span class="pc-micon"><i class="bi bi-box-arrow-right"></i></span>
                    <span class="pc-mtext">Sign out</span>
                </a>
            </form>
        </li>

        </ul>
      </div>
    </div>
  </nav>