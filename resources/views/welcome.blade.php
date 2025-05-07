<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>Daily Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <style>
        html {
            scroll-behavior: smooth;
        }
        body {
            background-color: #f7f4ef; /* لون سكري */
            color: #2c2c2c;
        }
        .container-custom {
            max-width: 960px;
            margin: auto;
        }
        section {
            min-height: 100vh;
            padding: 80px 15px;
        }
        #hero {
            background: linear-gradient(135deg, #343a40, #212529);
            color: #fff;
        }
        .btn-custom {
            border-radius: 30px;
            padding: 10px 30px;
        }
        .section-title {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            font-weight: bold;
        }
        .section-description {
            font-size: 1.2rem;
            color: #555;
        }
        .card-custom {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.7s ease-in-out;
        }
        .card-custom.visible {
            opacity: 1;
            transform: translateY(0);
        }
        .card-custom:hover {
            transform: scale(1.03) translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

    </style>
</head>
<body>

<!-- Hero Section -->
<section id="hero" class="d-flex justify-content-center align-items-center text-center">
    <div class="container-custom">
        <h1 class="mb-4 fs-1">مرحباً بك في <strong>Daily Task</strong></h1>
        <p class="mb-4 fs-5">نظام عصري لإدارة وتنظيم مهامك اليومية باحترافية ومرونة.</p>
        <div>
            <a href="#features" class="btn btn-light btn-custom me-2">اعرف المزيد</a>
            <a href="{{ route('login') }}" class="btn btn-outline-light btn-custom">ابدأ الآن</a>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="text-center bg-white">
    <div class="container-custom">
        <h2 class="section-title">لماذا Daily Task؟</h2>
        <p class="section-description mb-5 fs-5">
            في عالم مزدحم، نحتاج جميعًا إلى طريقة ذكية لإدارة الوقت والمهام. Daily Task تم تصميمه ليساعدك على التركيز، الإنجاز، والتوازن بين حياتك الشخصية والعملية.
        </p>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card p-4 h-100 shadow-sm card-custom">
                    <h5 class="mb-3">واجهة استخدام أنيقة</h5>
                    <p>واجهة مبسطة بتصميم مريح للعين، تتيح لك إضافة ومتابعة مهامك بسهولة بدون أي تشتيت.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-4 h-100 shadow-sm card-custom">
                    <h5 class="mb-3">تنظيم ومرونة</h5>
                    <p>أنشئ مهام يومية، صنّفها حسب الأهمية، وعدّل عليها وقتما شئت. كل شيء تحت سيطرتك.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-4 h-100 shadow-sm card-custom">
                    <h5 class="mb-3">تذكيرات ذكية</h5>
                    <p>استلم تنبيهات قبل فوات الأوان، لتظل دائمًا على اطلاع بما هو مهم في يومك.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Get Started Section -->
<section id="get-started" class="bg-light text-center">
    <div class="container-custom">
        <h2 class="section-title">ابدأ رحلتك مع Daily Task</h2>
        <p class="section-description mb-4">
            انضم إلى مجتمع المهتمين بالإنجاز والتنظيم. ابدأ رحلتك الآن وغيّر طريقة إدارتك ليومك بالكامل.
        </p>
        <a href="{{ route('register') }}" class="btn btn-primary btn-lg btn-custom">تسجيل مستخدم جديد</a>
    </div>
</section>

<!-- Footer -->
<footer class="text-center py-4 bg-white border-top">
    <p class="mb-0">© 2025 Daily Task. جميع الحقوق محفوظة.</p>
    <a class="mb-0" href="https://www.facebook.com/profile.php?id=100008937332667">Mahmoud Refaat</a>
</footer>

<!-- Fade-in Script -->
<script>
    const cards = document.querySelectorAll('.card-custom');
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.3 });

    cards.forEach(card => observer.observe(card));
</script>

</body>
</html>
