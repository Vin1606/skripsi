<x-layout title="{{ config('app.name', 'Laravel') }} - Landing Page">
    <x-header />

    {{-- Fitur --}}
    <section id="fitur" class="mx-auto max-w-6xl px-6 py-24">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">Fitur Unggulan</h2>
            <p class="mt-4 text-slate-600">Semua yang Anda butuhkan tersedia dalam satu platform.</p>
        </div>

        <div class="mt-14 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ([
                ['Cepat & Ringan', 'Performa optimal sehingga setiap proses berjalan tanpa hambatan.', 'M13 10V3L4 14h7v7l9-11h-7z'],
                ['Aman Terpercaya', 'Data Anda terlindungi dengan standar keamanan yang baik.', 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
                ['Mudah Digunakan', 'Tampilan sederhana dan intuitif, cocok untuk semua kalangan.', 'M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5'],
            ] as [$name, $desc, $icon])
                <div class="rounded-2xl border border-slate-200 bg-white p-8 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-100 text-indigo-600">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $icon }}" />
                        </svg>
                    </div>
                    <h3 class="mt-6 text-lg font-semibold text-slate-900">{{ $name }}</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-600">{{ $desc }}</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Cara Kerja --}}
    <section id="cara-kerja" class="bg-slate-50 py-24">
        <div class="mx-auto max-w-6xl px-6">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">Cara Kerja</h2>
                <p class="mt-4 text-slate-600">Hanya tiga langkah sederhana untuk memulai.</p>
            </div>

            <div class="mt-14 grid gap-8 md:grid-cols-3">
                @foreach ([
                    ['Daftar', 'Buat akun Anda dalam hitungan menit.'],
                    ['Atur', 'Sesuaikan pengaturan sesuai kebutuhan Anda.'],
                    ['Gunakan', 'Nikmati semua fitur dan tingkatkan produktivitas.'],
                ] as $i => [$step, $desc])
                    <div class="text-center">
                        <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-indigo-600 text-xl font-bold text-white">
                            {{ $i + 1 }}
                        </div>
                        <h3 class="mt-6 text-lg font-semibold text-slate-900">{{ $step }}</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">{{ $desc }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Ajakan bertindak --}}
    <section class="mx-auto max-w-6xl px-6 py-24">
        <div class="rounded-3xl bg-indigo-600 px-8 py-16 text-center shadow-lg">
            <h2 class="text-3xl font-bold text-white sm:text-4xl">Siap untuk memulai?</h2>
            <p class="mx-auto mt-4 max-w-xl text-indigo-100">
                Bergabunglah sekarang dan rasakan kemudahannya.
            </p>
            <a href="#kontak"
               class="mt-8 inline-block rounded-lg bg-white px-6 py-3 text-sm font-semibold text-indigo-600 transition hover:bg-indigo-50">
                Hubungi Kami
            </a>
        </div>
    </section>
</x-layout>
