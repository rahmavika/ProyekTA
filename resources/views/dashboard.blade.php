@extends('layouts.main')

@section('content')
<div class="container mt-5">

    <div class="row g-4 mb-4">
        @php
            $cards = [
                [
                    'title' => 'Jumlah Kategori',
                    'value' => $jumlahKategori,
                    'icon'  => 'fas fa-tags',
                    'color' => 'linear-gradient(135deg, #4caf50, #2e7d32)',
                    'route' => route('dashboard-kategori.index')
                ],
                [
                    'title' => 'Jumlah Produk',
                    'value' => $jumlahProduk,
                    'icon'  => 'fas fa-box-open',
                    'color' => 'linear-gradient(135deg, #ff9800, #e65100)',
                    'route' => route('dashboard-produk.index')
                ],
                [
                    'title' => 'Jumlah Pelanggan',
                    'value' => $jumlahPelanggan,
                    'icon'  => 'fas fa-users',
                    'color' => 'linear-gradient(135deg, #2196f3, #0d47a1)',
                    'route' => route('dashboard-pengguna.index')
                ],
                [
                    'title' => 'Pesanan Masuk',
                    'value' => $jumlahPesananMasuk,
                    'icon'  => 'fas fa-truck-loading',
                    'color' => 'linear-gradient(135deg, #673ab7, #311b92)',
                    'route' => '#'
                ]
            ];
        @endphp

        @foreach ($cards as $card)
        <div class="col-md-3">
            <a href="{{ $card['route'] }}" class="text-decoration-none">
                <div class="modern-card">
                    <div class="icon-wrapper" style="background: {{ $card['color'] }}">
                        <i class="{{ $card['icon'] }}"></i>
                    </div>
                    <div class="card-info">
                        <h6>{{ $card['title'] }}</h6>
                        <h3>{{ $card['value'] }}</h3>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>

    <div class="row mb-4">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title mb-3 fw-bold">📊 Grafik Penjualan 7 Hari Terakhir</h5>
                    <canvas id="grafikPenjualan"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white border-0 shadow-sm h-100"
                style="background: linear-gradient(135deg, #00c6ff, #0072ff);">
                <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <h5 class="card-title fw-bold">💰 Total Penjualan Bulan Ini</h5>
                    <h2 class="mt-2 mb-0 fw-bold">Rp {{ number_format($totalPenjualan, 0, ',', '.') }}</h2>
                    <small class="opacity-75">Per {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</small>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .modern-card {
        padding: 20px;
        border-radius: 20px;
        background: white;
        display: flex;
        align-items: center;
        gap: 15px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.05), 0 4px 10px rgba(0,0,0,0.03);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        color: #333;
    }
    .modern-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.08), 0 6px 15px rgba(0,0,0,0.05);
    }
    .modern-card .icon-wrapper {
        padding: 15px;
        border-radius: 15px;
        font-size: 28px;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: inset 0 0 8px rgba(255,255,255,0.2);
    }
    .modern-card .card-info h6 {
        font-weight: 500;
        margin-bottom: 5px;
        color: #555;
    }
    .modern-card .card-info h3 {
        font-weight: 700;
        margin: 0;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('grafikPenjualan').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($pesananPerHari->pluck('tanggal')) !!},
                datasets: [{
                    label: 'Pesanan Selesai',
                    data: {!! json_encode($pesananPerHari->pluck('total')) !!},
                    backgroundColor: 'rgba(76, 175, 80, 0.5)',
                    borderColor: 'rgba(76, 175, 80, 1)',
                    borderWidth: 1,
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'bottom' }
                },
                scales: { y: { beginAtZero: true } }
            }
        });
    });
</script>
@endsection

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('grafikPenjualan').getContext('2d');

        const gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(76, 175, 80, 0.4)');
        gradient.addColorStop(1, 'rgba(76, 175, 80, 0)');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($pesananPerHari->pluck('tanggal')) !!},
                datasets: [{
                    label: 'Pesanan Selesai',
                    data: {!! json_encode($pesananPerHari->pluck('total')) !!},
                    backgroundColor: gradient,
                    borderColor: 'rgba(76, 175, 80, 1)',
                    borderWidth: 3,
                    tension: 0.4, 
                    fill: true,
                    pointBackgroundColor: 'white',
                    pointBorderColor: 'rgba(76, 175, 80, 1)',
                    pointBorderWidth: 2,
                    pointRadius: 5,
                    pointHoverRadius: 7
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            font: { weight: 'bold' }
                        }
                    },
                    tooltip: {
                        backgroundColor: '#333',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        padding: 10,
                        displayColors: false
                    }
                },
                scales: {
                    x: {
                        grid: { color: 'rgba(0,0,0,0.05)' },
                        ticks: { font: { weight: 'bold' } }
                    },
                    y: {
                        beginAtZero: true,
                        grid: { color: 'rgba(0,0,0,0.05)' }
                    }
                }
            }
        });
    });
</script>
