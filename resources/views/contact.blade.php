@extends('layouts.main')

@section('title', 'Hubungi Kami')

@section('content')

<section class="py-5 text-center" style="background-color: #4e342e; color: white;">
    <div class="container">
        <h1 class="fw-bold display-5 mb-2">Lokasi & Kontak</h1>
        <p class="lead opacity-75" style="font-size: 1rem;">Kunjungi markas kami atau kirimkan pesan Anda</p>
    </div>
</section>

<div class="container-fluid py-5" style="background-color: white;">
    <div class="container py-4">
        <div class="row g-5 align-items-stretch">
            
            <div class="col-lg-5 mb-4">
                <div class="card h-100 border-0 shadow-sm rounded-4" style="background-color: #e8d5b5; color: #3e2723;">
                    <div class="card-body p-4 p-md-5">
                        <div class="text-center mb-4">
                            <h3 class="fw-bold mb-2">Kirim Pesan</h3>
                            <p class="small mb-0" style="opacity: 0.9; line-height: 1.5;">
                                Ada pertanyaan seputar menu atau booking tempat untuk turnamen? Isi form di bawah ini.
                            </p>
                        </div>
                        
                        <form id="contactForm" onsubmit="sendEmail(event)">
                            <div class="mb-3">
                                <label class="form-label fw-bold small">Nama Lengkap</label>
                                <input type="text" id="name" class="form-control rounded-3 border-0 py-2 px-3" placeholder="Masukkan nama Anda" style="font-size: 0.95rem;" required>
                             </div>
    
                            <div class="mb-3">
                                <label class="form-label fw-bold small">Email</label>
                                <input type="email" id="email" class="form-control rounded-3 border-0 py-2 px-3" placeholder="email@example.com" style="font-size: 0.95rem;" required>
                            </div>
    
                            <div class="mb-4">
                                <label class="form-label fw-bold small">Pesan</label>
                                <textarea id="message" class="form-control rounded-3 border-0 py-2 px-3" rows="5" placeholder="Tulis pesan Anda di sini..." style="font-size: 0.95rem;" required></textarea>
                            </div>
    
                            <button type="submit" class="btn w-100 fw-bold text-white py-2 rounded-3 shadow-sm" 
                             style="background-color: #3e2723; transition: 0.3s;">
                                <i class="bi bi-send-fill me-2"></i> Kirim Sekarang
                            </button>
                        </form>

                        <script>
                            function sendEmail(event) {
                            event.preventDefault(); // Mencegah reload halaman

                            // 1. Ambil data dari input
                            var name = document.getElementById('name').value;
                            var email = document.getElementById('email').value;
                            var message = document.getElementById('message').value;

                            // 2. Tentukan tujuan email
                            var recipient = "warkopsoeger@gmail.com";
                            var subject = "Pesan Baru dari Website Warkop: " + name;

                            // 3. Format isi email
                            var emailBody = "Halo Admin Warkop Omah Soeger,%0D%0A%0D%0A";
                            emailBody += "Ada pesan baru dari pengunjung website:%0D%0A";
                            emailBody += "-----------------------------------%0D%0A";
                            emailBody += "Nama: " + name + "%0D%0A";
                            emailBody += "Email: " + email + "%0D%0A";
                            emailBody += "Pesan:%0D%0A" + message;

                            // 4. Buka aplikasi email bawaan (Gmail/Outlook/dll)
                            window.location.href = 'mailto:' + recipient + '?subject=' + encodeURIComponent(subject) + '&body=' + emailBody;
                            }
                        </script>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 mb-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="h-100 w-100">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3950.1285511957985!2d112.18621789999999!3d-8.0883705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78ed00753f28bf%3A0xed48a3a848e31506!2sWARKOP%20OMAH%20SOEGER!5e0!3m2!1sid!2sid!4v1763669497247!5m2!1sid!2sid" 
                                width="100%" height="100%" 
                                style="border:0; min-height: 450px;" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                    
                    <div class="card-footer p-3 text-center text-white" style="background-color: #4e342e;">
                        <small style="letter-spacing: 0.5px;">
                            <i class="bi bi-geo-alt-fill me-1 text-warning"></i> Blitar, Jawa Timur &nbsp;•&nbsp; 
                            <i class="bi bi-clock-fill ms-3 me-1 text-warning"></i> 09.00 - 02.00 WIB
                        </small>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection