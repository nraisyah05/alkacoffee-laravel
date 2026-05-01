@extends('layouts.admin.app')

@section('content')
<div class="container-fluid py-4">

    {{-- ===== BARIS 1: STAT CARDS ===== --}}
    <div class="row g-3 mb-4">

        {{-- Pendapatan Hari Ini --}}
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100" style="border-radius:15px">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="width:45px;height:45px;background:#fff3e0">
                            <span style="font-size:20px">💰</span>
                        </div>
                        <span class="text-muted" style="font-size:13px">Pendapatan Hari Ini</span>
                    </div>
                    <h4 class="fw-bold mb-0">Rp {{ number_format($pendapatanHariIni, 0, ',', '.') }}</h4>
                </div>
            </div>
        </div>

        {{-- Produk Terjual Hari Ini --}}
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100" style="border-radius:15px">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="width:45px;height:45px;background:#e8f5e9">
                            <span style="font-size:20px">🛍️</span>
                        </div>
                        <span class="text-muted" style="font-size:13px">Produk Terjual Hari Ini</span>
                    </div>
                    <h4 class="fw-bold mb-0">{{ number_format($produkTerjualHariIni) }} item</h4>
                </div>
            </div>
        </div>

        {{-- Total Pelanggan --}}
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100" style="border-radius:15px">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="width:45px;height:45px;background:#e3f2fd">
                            <span style="font-size:20px">👥</span>
                        </div>
                        <span class="text-muted" style="font-size:13px">Total Pelanggan</span>
                    </div>
                    <h4 class="fw-bold mb-0">{{ number_format($totalPelanggan) }}</h4>
                </div>
            </div>
        </div>

        {{-- Total Users --}}
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100" style="border-radius:15px">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="width:45px;height:45px;background:#fce4ec">
                            <span style="font-size:20px">👤</span>
                        </div>
                        <span class="text-muted" style="font-size:13px">Total Users</span>
                    </div>
                    <h4 class="fw-bold mb-0">{{ number_format($totalUsers) }}</h4>
                </div>
            </div>
        </div>

    </div>

    {{-- ===== BARIS 2: GRAFIK PENJUALAN + TOP 5 TERLARIS ===== --}}
    <div class="row g-3 mb-4">

        {{-- Grafik Pertumbuhan Penjualan --}}
        <div class="col-md-8">
            <div class="card border-0 shadow-sm h-100" style="border-radius:15px">
                <div class="card-body">
                    <h6 class="fw-bold mb-3" style="color:#FFA726">
                        📈 Pertumbuhan Penjualan (12 Bulan Terakhir)
                    </h6>
                    <canvas id="penjualanChart" style="max-height:300px"></canvas>
                </div>
            </div>
        </div>

        {{-- Top 5 Produk Terlaris --}}
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius:15px">
                <div class="card-body">
                    <h6 class="fw-bold mb-3" style="color:#FFA726">
                        🏆 Top 5 Terlaris Bulan Ini
                    </h6>
                    @forelse ($produkTerlaris as $i => $produk)
                        <div class="d-flex align-items-center mb-3">
                            <div class="fw-bold me-2 text-center"
                                style="width:24px;font-size:14px;color:{{ $i === 0 ? '#FFA726' : ($i === 1 ? '#9E9E9E' : ($i === 2 ? '#795548' : '#aaa')) }}">
                                #{{ $i + 1 }}
                            </div>
                            <img src="{{ asset('storage/' . $produk->gambar) }}"
                                style="width:45px;height:45px;object-fit:cover;border-radius:8px;margin-right:10px">
                            <div class="flex-grow-1">
                                <div style="font-size:13px;font-weight:600">{{ $produk->nama_produk }}</div>
                                <small class="text-muted">{{ ucfirst($produk->kategori) }}</small>
                            </div>
                            <span class="badge rounded-pill"
                                style="background:#fff3e0;color:#FFA726;font-size:12px">
                                {{ $produk->total_terjual }}x
                            </span>
                        </div>
                    @empty
                        <p class="text-muted text-center mt-4">Belum ada data penjualan bulan ini.</p>
                    @endforelse
                </div>
            </div>
        </div>

    </div>

    {{-- ===== BARIS 3: PRODUK TERBARU ===== --}}
    <div class="row g-3 mb-4">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm" style="border-radius:15px">
                <div class="card-body">
                    <h6 class="fw-bold mb-3" style="color:#FFA726">🆕 Produk Terbaru</h6>
                    <div class="row">
                        @forelse ($produkTerbaru as $p)
                            <div class="col-md-4 mb-3">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('storage/' . $p->gambar) }}"
                                        style="width:50px;height:50px;object-fit:cover;border-radius:8px;margin-right:12px">
                                    <div class="flex-grow-1">
                                        <div style="font-size:13px;font-weight:600">{{ $p->nama_produk }}</div>
                                        <small class="text-muted">
                                            Rp {{ number_format($p->harga, 0, ',', '.') }}
                                            &bull; {{ ucfirst($p->kategori) }}
                                        </small>
                                    </div>
                                    <small class="text-muted">
                                        {{ \Carbon\Carbon::parse($p->created_at)->format('d M') }}
                                    </small>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted text-center">Belum ada produk.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const penjualanData = @json($dataPenjualanBulan);

const bulanLabels = Object.keys(penjualanData).map(b => {
    const [year, month] = b.split('-')
    const nama = ["Jan","Feb","Mar","Apr","Mei","Jun","Jul","Ags","Sep","Okt","Nov","Des"]
    return nama[parseInt(month) - 1] + ' ' + year
})

const penjualanValues = Object.values(penjualanData).map(v => v.total)

new Chart(document.getElementById('penjualanChart'), {
    type: 'bar',
    data: {
        labels: bulanLabels,
        datasets: [{
            label: 'Pendapatan (Rp)',
            data: penjualanValues,
            backgroundColor: 'rgba(255,167,38,0.7)',
            borderColor: '#FFA726',
            borderWidth: 2,
            borderRadius: 6,
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: val => 'Rp ' + val.toLocaleString('id-ID')
                }
            }
        }
    }
})
</script>
@endsection
