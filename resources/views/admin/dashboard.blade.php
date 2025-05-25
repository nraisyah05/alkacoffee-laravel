@extends('layouts.admin.app')
@section('content')
    {{-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="btn-toolbar dropdown">
            <button class="btn btn-dark btn-sm me-2 dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <span class="fas fa-plus me-2"></span>New Task
            </button>
            <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-0">
                <a class="dropdown-item fw-normal rounded-top" href="#"><span class="fas fa-tasks"></span>New Task</a>
                <a class="dropdown-item fw-normal" href="#"><span class="fas fa-cloud-upload-alt"></span>Upload
                    Files</a>
                <a class="dropdown-item fw-normal" href="#"><span class="fas fa-user-shield"></span>Preview
                    Security</a>
                <div role="separator" class="dropdown-divider my-0"></div>
                <a class="dropdown-item fw-normal rounded-bottom" href="#"><span
                        class="fas fa-rocket text-danger"></span>Upgrade to Pro</a>
            </div>
        </div>
        <div class="btn-group">
            <button type="button" class="btn btn-sm btn-outline-primary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-primary">Export</button>
        </div>
    </div> --}}

    <div class="container">
        <div class="row">
            <!-- Total Pelanggan Card -->
            <div class="col-md-4">
                <div class="card" style="background-color: #FFFFFF; border: none; border-radius: 15px;">
                    <div class="card-body">
                        <h6 style="color: #FFA726;">Total Pelanggan</h6>
                        <h2 class="text-dark font-weight-bold">{{ $totalPelanggan }}</h2>
                        <small style="color: #43A047;">↑ 20% sejak bulan lalu</small>
                    </div>
                </div>
            </div>

            <!-- Total Users Card -->
            <div class="col-md-4">
                <div class="card" style="background-color: #FFFFFF; border: none; border-radius: 15px;">
                    <div class="card-body">
                        <h6 style="color: #FFA726;">Total Users</h6>
                        <h2 class="text-dark font-weight-bold">{{ $totalUsers }}</h2>
                        <small style="color: #43A047;">↑ 10% sejak bulan lalu</small>
                    </div>
                </div>
            </div>

            <!-- Total Mitra Card -->
            <div class="col-md-4">
                <div class="card" style="background-color: #FFFFFF; border: none; border-radius: 15px;">
                    <div class="card-body">
                        <h6 style="color: #FFA726;">Total Mitra</h6>
                        <h2 class="text-dark font-weight-bold">{{ $totalMitra }}</h2>
                        <small style="color: #43A047;">↑ 8% sejak bulan lalu</small>
                    </div>
                </div>
            </div>

            <!-- Pelanggan terbaru -->
            <div class="container mt-4">
                <div class="card" style="background-color: #FFFFFF; border: none; border-radius: 15px;">
                    <div class="card-body">
                        <h6 style="color: #FFA726;">Data Pelanggan Terbaru</h6>
                        @if ($pelangganTerbaru->isEmpty())
                            <p class="text-muted">Belum ada pelanggan terbaru.</p>
                        @else
                            <ul class="list-group">
                                @foreach ($pelangganTerbaru as $dataPelanggan)
                                    <li class="list-group-item d-flex justify-content-between align-items-center"
                                        style="border: none; background-color: #f9f9f9;">
                                        <div>
                                            <strong>{{ $dataPelanggan->first_name }}</strong>
                                            <p class="mb-0 text-muted" style="font-size: 0.9em;">{{ $dataPelanggan->email }}
                                            </p>
                                        </div>
                                        <span class="badge bg-primary" style="font-size: 0.8em;">
                                            {{ \Carbon\Carbon::parse($dataPelanggan->created_at)->format('d M Y') }}
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Diagram Lingkaran dan Diagram Garis -->
            <div class="container mt-4">
                <div class="row">
                    <!-- Diagram Lingkaran Persentase Aset -->
                    <div class="col-md-6">
                        <div class="card" style="background-color: #FFFFFF; border: none; border-radius: 15px;">
                            <div class="card-body">
                                <h6 style="color: #FFA726;">Persentase Kondisi Aset</h6>
                                <div class="chart-container"
                                    style="position: relative; width: 50%; max-width: 300px; margin: auto;">
                                    <canvas id="assetChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Diagram Pertumbuhan Pelanggan -->
                    <div class="col-md-6">
                        <div class="card" style="background-color: #FFFFFF; border: none; border-radius: 15px;">
                            <div class="card-body">
                                <h6 style="color: #FFA726;">Pertumbuhan Pelanggan per Bulan</h6>
                                <div class="chart-container"
                                    style="position: relative; width: 100%; max-width: 600px; margin: auto;">
                                    <canvas id="growthChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Grafik Penambahan Pelanggan -->
                    {{-- <div class="col-md-6">
                        <div class="card" style="background-color: #FFFFFF; border: none; border-radius: 15px;">
                            <div class="card-body">
                                <h4 class="mb-4 text-muted">Grafik Penambahan Pelanggan Per Bulan</h4>
                                <canvas id="pelangganChart" style="background-color: #001f3d;"></canvas>
                            </div>
                        </div>
                    </div> --}}

                    {{-- Produk Terbaru --}}
                    <div class="container mt-4">
                        <div class="card shadow-sm" style="border-radius: 15px; border: none;">
                            <div class="card-body">
                                <h6 class="fw-bold mb-3" style="color: #FFA726;">Produk Terbaru</h6>

                                @if ($produkTerbaru->isEmpty())
                                    <p class="text-muted text-center">Belum ada produk terbaru.</p>
                                @else
                                    <ul class="list-group list-group-flush">
                                        @foreach ($produkTerbaru as $dataProduk)
                                            <li class="list-group-item d-flex justify-content-between align-items-center py-3"
                                                style="background-color: #f9f9f9; border: none;">
                                                <div class="d-flex align-items-center">
                                                    {{-- Product Image --}}
                                                    <img src="{{ asset('gambar/' . $dataProduk->gambar) }}"
                                                        alt="Gambar {{ $dataProduk->nama_produk }}"
                                                        style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px; margin-right: 15px;">

                                                    {{-- Product Info --}}
                                                    <div>
                                                        <strong class="d-block">{{ $dataProduk->nama_produk }}</strong>
                                                        <small class="text-muted">Rp
                                                            {{ number_format($dataProduk->harga, 0, ',', '.') }}</small>
                                                    </div>
                                                </div>

                                                {{-- Date Badge --}}
                                                <span class="badge bg-primary rounded-pill" style="font-size: 0.8em;">
                                                    {{ \Carbon\Carbon::parse($dataProduk->created_at)->format('d M Y') }}
                                                </span>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <!-- Script untuk Chart -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('assetChart').getContext('2d');
        var assetChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Aktif', 'Kadaluarsa', 'Maintenance'],
                datasets: [{
                    data: [
                        {{ $dataAset['Aktif'] }},
                        {{ $dataAset['Kadaluarsa'] }},
                        {{ $dataAset['Maintenance'] }}
                    ],
                    backgroundColor: ['#4CAF50', '#FF5722', '#FFC107'],
                    borderColor: ['#4CAF50', '#FF5722', '#FFC107'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom'
                    }
                }
            }
        });
    </script>

    {{-- script untuk diagram petumbuhan --}}
    <script>
        var growthCtx = document.getElementById('growthChart').getContext('2d');
        var growthChart = new Chart(growthCtx, {
            type: 'line',
            data: {
                labels: {!! json_encode(array_keys($dataPertumbuhanPelanggan->toArray())) !!},
                datasets: [{
                    label: 'Pertumbuhan Pelanggan',
                    data: {!! json_encode(array_values($dataPertumbuhanPelanggan->toArray())) !!},
                    borderColor: '#42A5F5',
                    backgroundColor: 'rgba(66, 165, 245, 0.2)',
                    borderWidth: 2,
                    tension: 0.3, // Membuat garis lebih halus
                    fill: true
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Bulan'
                        },
                        ticks: {
                            callback: function(value, index, ticks) {
                                const bulanPanjang = [
                                    "Januari", "Februari", "Maret", "April", "Mei", "Juni",
                                    "Juli", "Agustus", "September", "Oktober", "November", "Desember"
                                ];
                                const date = this.getLabelForValue(value); // Mengambil nilai dari label
                                const [year, month] = date.split('-'); // Pecah format 'YYYY-MM'
                                return bulanPanjang[parseInt(month) - 1] + ' ' +
                                    year; // Format nama bulan + tahun
                            }
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Jumlah Pelanggan'
                        },
                        beginAtZero: true
                    }
                }

            }
        });
    </script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const pelangganData = @json($pelanggan_per_bulan);

    // Format Bulan-Tahun menjadi format yang lebih ringkas
    const labels = pelangganData.map(item => {
        const month = new Date(item.year, item.month - 1); // Mengambil bulan dari data dan mengonversinya ke format Date
        const options = { year: 'numeric', month: 'short' }; // Format: "Jan 2024"
        return month.toLocaleDateString('id-ID', options); // Menggunakan locale Indonesia
    });

    const data = pelangganData.map(item => item.total);

    const ctx = document.getElementById('pelangganChart').getContext('2d');

    const colorBasedOnTrend = (data) => {
        const colors = [];
        for (let i = 0; i < data.length; i++) {
            if (i === 0) {
                colors.push('rgba(0, 200, 83, 0.7)');
            } else {
                colors.push(data[i] > data[i - 1] ? 'rgba(0, 200, 83, 0.7)' : 'rgba(255, 82, 82, 0.7)');
            }
        }
        return colors;
    };

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Penambahan Pelanggan',
                data: data,
                borderColor: colorBasedOnTrend(data),
                backgroundColor: 'rgba(0,0,0,0)',
                fill: false,
                borderWidth: 3,
                pointBackgroundColor: colorBasedOnTrend(data),
                pointBorderWidth: 2,
                pointRadius: 5,
                pointHoverRadius: 6,
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    labels: {
                        color: '#fff',
                        font: {
                            size: 14
                        }
                    }
                },
                tooltip: {
                    mode: 'index',
                    intersect: false,
                    callbacks: {
                        label: function(tooltipItem) {
                            return Jumlah: ${tooltipItem.raw};
                        }
                    }
                }
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Bulan-Tahun',
                        font: {
                            size: 14
                        },
                        color: '#fff'
                    },
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: '#fff',
                        font: {
                            size: 12
                        }
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Jumlah Pelanggan',
                        font: {
                            size: 14
                        },
                        color: '#fff'
                    },
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(255, 255, 255, 0.2)'
                    },
                    ticks: {
                        color: '#fff',
                        font: {
                            size: 12
                        }
                    }
                }
            }
        }
    });
});
</script> --}}

@endsection
