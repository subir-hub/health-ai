<?php session_start() ?>

<html>

<head>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="" />
    <link rel="stylesheet" as="style" onload="this.rel='stylesheet'"
        href="https://fonts.googleapis.com/css2?display=swap&amp;family=Lexend%3Awght%40400%3B500%3B700%3B900&amp;family=Noto+Sans%3Awght%40400%3B500%3B700%3B900" />

    <title>Health AI</title>
    <link rel="icon" type="image/x-icon" href="data:image/x-icon;base64," />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    



    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
</head>

<body>
    <div class="relative flex size-full min-h-screen flex-col bg-slate-50 group/design-root overflow-x-hidden"
        style='font-family: Lexend, "Noto Sans", sans-serif;'>
        <div class="layout-container flex h-full grow flex-col">
            <header class="fixed top-0 left-0 w-full z-50 bg-white shadow-sm border-b border-[#e7edf3]">
                <div class="flex items-center justify-between px-6 md:px-10 py-3">
                    <!-- Logo Section -->
                    <div class="flex items-center gap-3 text-[#0e141b]">
                        <div class="w-6 h-6">
                            <!-- Optional SVG Icon -->
                        </div>
                        <h2 class="text-2xl md:text-3xl font-extrabold tracking-tight font-[Poppins] text-[#1978e5]">
  Health<span class="text-[#0e141b]">AI</span>
</h2>

                    </div>

                    <!-- Navigation Menu -->
                    <nav class="hidden md:flex items-center gap-6 lg:gap-8 text-sm md:text-base font-medium text-[#0e141b]">
                        <a href="index.php" class="hover:text-[#1978e5] transition">Home</a>
                        <a href="#services" class="hover:text-[#1978e5] transition">Services</a>
                        <a href="#tech" class="hover:text-[#1978e5] transition">Technology</a>
                        <a href="#about" class="hover:text-[#1978e5] transition">About</a>
                        <a href="#contact" class="hover:text-[#1978e5] transition">Contact</a>
                    </nav>

                    <!-- CTA Buttons -->
                    <div class="flex items-center gap-2 ml-4">
                        <!-- Get Started always visible but doesn't redirect -->
                        <button type="button"
                            class="rounded-full bg-[#1978e5] text-white px-4 md:px-5 h-10 md:h-11 text-sm md:text-base font-bold hover:bg-[#166cd1] transition"
                            <?php if (!isset($_SESSION['user_email'])): ?>
                            data-bs-toggle="modal" data-bs-target="#loginModal"
                            <?php else: ?>
                            onclick="window.location.href='chat.php'"
                            <?php endif; ?>>
                            Get Started
                        </button>

                        <?php if (isset($_SESSION['user_email'])): ?>
                            <!-- ✅ Show Logout only -->
                            <a href="logout.php"
                                class="flex items-center justify-center rounded-full border border-red-500 text-red-500 bg-white px-4 md:px-5 h-10 md:h-11 text-sm md:text-base font-bold hover:bg-gradient-to-r from-red-500 to-red-600 hover:text-white transition-all duration-300 shadow-sm">
                                Logout
                            </a>


                        <?php else: ?>
                            <!-- Show Sign Up & Login -->
                            <button data-bs-toggle="modal" data-bs-target="#signupModal"
                                class="rounded-full border border-[#1978e5] text-[#1978e5] px-4 md:px-5 h-10 md:h-11 text-sm md:text-base font-bold hover:bg-[#f0f6fc] transition">
                                Sign Up
                            </button>
                            <button data-bs-toggle="modal" data-bs-target="#loginModal"
                                class="rounded-full bg-[#e7edf3] text-[#0e141b] px-4 md:px-5 h-10 md:h-11 text-sm md:text-base font-bold hover:bg-[#d4e0ec] transition">
                                Login
                            </button>
                        <?php endif; ?>
                    </div>
                </div>
            </header>



            <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content rounded-4 shadow-sm border-0">
                        <div class="modal-header border-0 pb-0 text-center">
                            <div class="w-100">
                                <i class="bi bi-person-plus-fill text-success fs-2"></i>
                                <h5 class="modal-title fw-bold mt-2" id="signupModalLabel" style="font-size: 1.5rem; background: linear-gradient(to right, #28a745, #0e141b); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                                    Join HealthAI Today 🚀
                                </h5>
                                <p class="text-muted small">Create your account and take control of your health</p>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body pt-2">
                            <form id="signupForm" method="POST" autocomplete="off">
                                <div class="mb-3">
                                    <label for="signupName" class="form-label">Full Name</label>
                                    <input type="text" class="form-control rounded-3" id="signupName" name="name" placeholder="John Doe" required>
                                </div>
                                <div class="mb-3">
                                    <label for="signupEmail" class="form-label">Email address</label>
                                    <input type="email" class="form-control rounded-3" id="signupEmail" name="email" placeholder="you@example.com" required>
                                </div>
                                <div class="mb-3">
                                    <label for="signupPassword" class="form-label">Password</label>
                                    <input type="password" class="form-control rounded-3" id="signupPassword" name="password" placeholder="Create a strong password" required>
                                </div>
                                <button type="submit" class="btn btn-success w-100 rounded-3 fw-bold">Sign Up</button>

                                <div id="signupMsg" class="text-center mt-3 fw-semibold"></div>
                            </form>
                        </div>
                        <div class="modal-footer justify-content-center border-0 pt-0">
                            <p class="mb-0 text-muted">Already have an account? <a href="#" class="text-primary" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content rounded-4 shadow-sm border-0">
                        <div class="modal-header border-0 pb-0 text-center">
                            <div class="w-100">
                                <i class="bi bi-shield-lock-fill text-primary fs-2"></i>
                                <h5 class="modal-title fw-bold mt-2" id="loginModalLabel" style="font-size: 1.5rem; background: linear-gradient(to right, #1978e5, #0e141b); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                                    Welcome Back 👋
                                </h5>
                                <p class="text-muted small">Log in to access your HealthAI dashboard</p>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body pt-2">
                            <form id="loginForm" method="POST" autocomplete="off">
                                <div class="mb-3">
                                    <label for="loginEmail" class="form-label">Email address</label>
                                    <input type="email" class="form-control rounded-3" id="loginEmail" name="email" placeholder="you@example.com" required>
                                </div>
                                <div class="mb-3">
                                    <label for="loginPassword" class="form-label">Password</label>
                                    <input type="password" class="form-control rounded-3" id="loginPassword" name="password" placeholder="Enter password" required>
                                </div>
                                <button type="submit" class="btn btn-primary w-100 rounded-3 fw-bold">Login</button>

                                <div id="result" class="text-center mt-3 fw-semibold"></div>
                            </form>
                        </div>
                        <div class="modal-footer justify-content-center border-0 pt-0">
                            <p class="mb-0 text-muted">Don't have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#signupModal" data-bs-dismiss="modal">Sign up</a></p>
                        </div>
                    </div>
                </div>
            </div>



            <div class="px-40 flex flex-1 justify-center py-5 mt-5">
                <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
                    <div class="@container">
                        <div class="@[480px]:p-4">
                            <div class="flex min-h-[480px] flex-col gap-6 bg-cover bg-center bg-no-repeat @[480px]:gap-8 @[480px]:rounded-xl items-center justify-center p-4"
                                style='background-image: linear-gradient(rgba(0, 0, 0, 0.1) 0%, rgba(0, 0, 0, 0.4) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuBi2kAGz7kdLhQF5mBUKsMn8LRkkei-Ddpnv1IdfZLmJkXqEKMVUhHxDT4I0MR1A2Wp3KQLeGAUVYwv2AccGje64QB8zT_scboNkUXvoJEjWtUE3p7-AYyZi95bci8hxnSWk0U71bVWHwx3JM99XsSEPA6exAsvrM3gIsBuW3WAVKl6amP3HuELM-W-iC6rh7pZ5XwlbpZzf0v5JYs1PT8d1JlnVSwhja3n3cxo5wnXvT2TDFx8tR6QF0kCfPq7TYzT_R4hHFx2Acta");'>
                                <div class="flex flex-col gap-2 text-center">
                                    <h1
                                        class="text-white text-4xl font-black leading-tight tracking-[-0.033em] @[480px]:text-5xl @[480px]:font-black @[480px]:leading-tight @[480px]:tracking-[-0.033em]">
                                        Your Health, Simplified
                                    </h1>
                                    <h2
                                        class="text-white text-sm font-normal leading-normal @[480px]:text-base @[480px]:font-normal @[480px]:leading-normal">
                                        Experience the future of healthcare with our AI-powered virtual doctor. Get
                                        personalized insights and care, anytime, anywhere.
                                    </h2>
                                </div>
                                <?php if (isset($_SESSION['user_email'])): ?>
                                    <!-- ✅ If user is logged in -->
                                    <button onclick="location.href='chat.php'"
                                        class="rounded-full bg-[#1978e5] text-white px-4 md:px-5 h-10 md:h-11 text-sm md:text-base font-bold hover:bg-[#166cd1] transition">
                                        Start Chat
                                    </button>

                                <?php else: ?>
                                    <!-- ❌ If not logged in -->
                                    <button data-bs-toggle="modal" data-bs-target="#loginModal"
                                        class="rounded-full bg-[#1978e5] text-white px-4 md:px-5 h-10 md:h-11 text-sm md:text-base font-bold hover:bg-[#166cd1] transition">
                                        Start Chat
                                    </button>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                    <h2 class="text-[#0e141b] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">
                        Our Technology Stack</h2>
                    <div class="grid grid-cols-[repeat(auto-fit,minmax(158px,1fr))] gap-3 p-4">
                        <div class="flex flex-col gap-3">
                            <div class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-xl"
                                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCleqFb9o4Xlu1xV_wnwDtlfa18XqVTpEMcj7RagXl11UxyX8DteMBDkcVJGbqiodyoqbY0cQf_mWlH6YjURCV9LeoA4beK3u8DNkP7gtqtAFRoEidIw3216On8xh62UKHZKtIpARC2inB4PLrVy9Ft2qWF0uA7VjBWaNdgpr255kq62ofJs1jUoGX9lwGCQ9t9bmYe8W4X-dLNIoKAFY2aIVdrme9pE9TkqCxMtaP2GjFzCYQATTk1d7L_cvjPzqmSbDbqi-BMNizY");'>
                            </div>
                        </div>
                        <div class="flex flex-col gap-3">
                            <div class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-xl"
                                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDXbCtaYx6WNKcCxM33B-gcLJnlpNkLvQsjKRmwUcHGE4Y3Cjpmd_o4xzPkr65_0lu3uQi2M3duI7a1ZPHXtK_zmffPPVgc5q5qvIwqZ2xdz9zCBVE429fpDVDumGapithUDBSeBFMYlD3DJKX2SbCpGfJZw_10UiCUMZA6-ok09SOf9a3aiBxJw_OZG4UAdmdTqk3WXxMyq9itHES5MA1wbKCyU8gYavEpZcA6YHczAca7WV1Cam1AyRQI5Gbh7bmW2SblM3i7HC53");'>
                            </div>
                        </div>
                        <div class="flex flex-col gap-3">
                            <div class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-xl"
                                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuClTyr6-PPEPuqhBgaZUgXrscS2UBICb5B8NzCkp_qtMvHHUnK64z6fZZVSml11N0TQb3EesOUxMlFoTxmRYgwwVvftanZEQFdM9Sp8LHzVLiSlxKD17ERnE8EeX08hhLXyMEnrRLowZ4tIc8kii-QlLYEoUz42bCmLHD79wA7AcQVwdBZPYDaQzuoJYS1kBgbwQUuNzeI7MJzQuHaKo9EAZCWT0H1rwN7b29T2ICQm6FLzS_fqGOrCGfHnY6IzTjtKlIFGopH9yo3c");'>
                            </div>
                        </div>
                        <div class="flex flex-col gap-3">
                            <div class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-xl"
                                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAncdnCg6Xt54V_axZeaofaRWhdvT9Gi-jA_HSCVFxXPHLM9PvVEipGUBHvIX_JQYP4a8nA90BHq40xamO-0q4FOpUVqVOPJrraRDAPGMISZj6dTXsXdhryv9jzZb2lTT52VM4zzzeNOHGG8WNiSCKtnpOjKExMPQl54dl_6mP-PboFY1nsH3Rc27ixiF_4kzQEAeJYkc1YaFoOSfTv2Ngz-Zii2DNw7zxVmiL7Lauv6RqpCbmC2tn7SxwODKBFTPb9Xx7LP-BYaXqS");'>
                            </div>
                        </div>
                        <div class="flex flex-col gap-3">
                            <div class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-xl"
                                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDHotmDxAdYjuvkIuHKTMihSYtZbavJUUjqV_zsZKkGd6FUVq9DBE52QWG5TieFBRis0MM7srY53YORK_s3xSdwA7q_bLzaCUrD0HnIUh3392sezNmOvD_fr1WRYrJjbziohJTexPgOs73Inu-V1SqF6mPZTyxMfBLGSCrhmtyLv25tkiIrPZf1xfs139PmXFaIF6iVxVFavxkxsCowWTsTY4cnyjkG-36fFIIXEFNkCUXnVx1S9iLwYd1N9wt3D7abjBf_K2QKQm8z");'>
                            </div>
                        </div>
                        <div class="flex flex-col gap-3">
                            <div class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-xl"
                                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBrciRtUGIbKT16aoMh3PimT5w3l4rvZZ9zGj3S4IbcAUzkYH71WhJDTkQN7F0arf3psE13KYUEOhQ7A_EQikYmJUsgaR04jM9aY2n3Z98UqLWHKycNTc0F7jAQKs9WvKk-QqydjveLduVo6GZPdLOfy_-ap3MgnaM1YvHRgHmeogTghNjuHk4my_-NPMQF-yALc2Uf21x26WpM65Tdy_h_Gv-a2y5LUIl1PhByPrf4gcQwdnWewgJUnk0Rm2-SSEbb0EEYS7df-kxN");'>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-10 px-4 py-10 @container">
                        <div class="flex flex-col gap-4">
                            <h1
                                class="text-[#0e141b] tracking-light text-[32px] font-bold leading-tight @[480px]:text-4xl @[480px]:font-black @[480px]:leading-tight @[480px]:tracking-[-0.033em] max-w-[720px]">
                                Why Choose HealthAI?
                            </h1>
                            <p class="text-[#0e141b] text-base font-normal leading-normal max-w-[720px]">
                                Our virtual doctor combines cutting-edge AI with a user-friendly interface to provide
                                you with the best possible healthcare experience.
                            </p>
                        </div>
                        <div class="grid grid-cols-[repeat(auto-fit,minmax(158px,1fr))] gap-3 p-0">
                            <div class="flex shadow-sm flex-1 gap-3 rounded-lg border border-[#d0dbe7] bg-slate-50 p-4 flex-col">
                                <div class="text-[#0e141b]" data-icon="Heart" data-size="24px" data-weight="regular">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                        fill="currentColor" viewBox="0 0 256 256">
                                        <path
                                            d="M178,32c-20.65,0-38.73,8.88-50,23.89C116.73,40.88,98.65,32,78,32A62.07,62.07,0,0,0,16,94c0,70,103.79,126.66,108.21,129a8,8,0,0,0,7.58,0C136.21,220.66,240,164,240,94A62.07,62.07,0,0,0,178,32ZM128,206.8C109.74,196.16,32,147.69,32,94A46.06,46.06,0,0,1,78,48c19.45,0,35.78,10.36,42.6,27a8,8,0,0,0,14.8,0c6.82-16.67,23.15-27,42.6-27a46.06,46.06,0,0,1,46,46C224,147.61,146.24,196.15,128,206.8Z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <h2 class="text-[#0e141b] text-base font-bold leading-tight">Personalized Care</h2>
                                    <p class="text-[#4e7097] text-sm font-normal leading-normal">Receive tailored health
                                        insights and recommendations based on your unique profile and needs.</p>
                                </div>
                            </div>
                            <div class="flex shadow-sm flex-1 gap-3 rounded-lg border border-[#d0dbe7] bg-slate-50 p-4 flex-col">
                                <div class="text-[#0e141b]" data-icon="Clock" data-size="24px" data-weight="regular">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                        fill="currentColor" viewBox="0 0 256 256">
                                        <path
                                            d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm64-88a8,8,0,0,1-8,8H128a8,8,0,0,1-8-8V72a8,8,0,0,1,16,0v48h48A8,8,0,0,1,192,128Z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <h2 class="text-[#0e141b] text-base font-bold leading-tight">24/7 Availability</h2>
                                    <p class="text-[#4e7097] text-sm font-normal leading-normal">Access our virtual
                                        doctor anytime, day or night, for immediate assistance and peace of mind.</p>
                                </div>
                            </div>
                            <div class="flex shadow-sm flex-1 gap-3 rounded-lg border border-[#d0dbe7] bg-slate-50 p-4 flex-col">
                                <div class="text-[#0e141b]" data-icon="ShieldCheck" data-size="24px"
                                    data-weight="regular">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                        fill="currentColor" viewBox="0 0 256 256">
                                        <path
                                            d="M208,40H48A16,16,0,0,0,32,56v58.78c0,89.61,75.82,119.34,91,124.39a15.53,15.53,0,0,0,10,0c15.2-5.05,91-34.78,91-124.39V56A16,16,0,0,0,208,40Zm0,74.79c0,78.42-66.35,104.62-80,109.18-13.53-4.51-80-30.69-80-109.18V56H208ZM82.34,141.66a8,8,0,0,1,11.32-11.32L112,148.68l50.34-50.34a8,8,0,0,1,11.32,11.32l-56,56a8,8,0,0,1-11.32,0Z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <h2 class="text-[#0e141b] text-base font-bold leading-tight">Secure &amp;
                                        Confidential</h2>
                                    <p class="text-[#4e7097] text-sm font-normal leading-normal">
                                        Your health information is protected with the highest security standards,
                                        ensuring complete privacy.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="@container">
                        <div
                            class="flex flex-col justify-center items-center gap-6 px-6 py-16 rounded-xl bg-gradient-to-r from-[#e6f0fa] to-[#f8fbff] shadow-md @[480px]:gap-8 @[480px]:px-10 @[480px]:py-20 text-center">

                            <!-- Headline -->
                            <h1
                                class="text-[#0e141b] text-[32px] font-extrabold leading-tight tracking-tight max-w-[720px] @[480px]:text-4xl @[480px]:tracking-[-0.03em]">
                                Ready to Take Control of Your Health?
                            </h1>

                            <!-- Subtext -->
                            <p class="text-[#4e7097] text-base font-medium leading-relaxed max-w-[620px]">
                                Sign up today and start your journey toward a healthier you with <span
                                    class="font-semibold text-[#1978e5]">HealthAI</span>.
                            </p>

                            <!-- CTA Button -->
                            <div class="flex justify-center">
                                <button data-bs-toggle="modal" data-bs-target="#signupModal"
                                    class="bg-[#1978e5] hover:bg-[#166cd1] text-white px-6 h-12 text-base font-bold rounded-full shadow-lg transition-all duration-300 hover:scale-105">
                                    Get Started
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="relative flex flex-col bg-slate-50 group/design-root overflow-x-hidden" style='font-family: Lexend, "Noto Sans", sans-serif;'>


                        <div class="layout-container flex h-full grow flex-col">
                            <div class="px-40 flex flex-1 justify-center py-5">
                                <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
                                    <div class="flex p-4 @container">
                                        <div class="flex w-full flex-col gap-4 items-center">
                                            <!-- Profile Image -->
                                            <div class="flex flex-col items-center gap-4">
                                                <img src="./images/my_img.jpg" alt="Subir Ghosh Profile Picture"
                                                    class="rounded-full border-2 border-[#1978e5] shadow-md object-cover"
                                                    width="96" height="96">

                                                <!-- Text Info -->
                                                <div class="text-center">
                                                    <p
                                                        class="text-[#0e141b] text-[22px] font-bold leading-tight tracking-[-0.015em]">
                                                        Hi, I'm Subir Ghosh 👋
                                                    </p>
                                                    <p
                                                        class="text-[#4e7097] text-base font-normal leading-normal max-w-sm">
                                                        A passionate PHP Developer focused on AI integration and modern
                                                        web apps.
                                                    </p>
                                                </div>
                                            </div>


                                            <!-- Social Buttons -->
                                            <div class="flex gap-4 justify-center flex-wrap">
                                                <a href="https://github.com/subir-hub" target="_blank"
                                                    class="flex items-center justify-center rounded-full bg-[#e7edf3] text-[#0e141b] text-sm font-bold px-5 h-10 hover:bg-[#d4e0ec] transition">
                                                    GitHub
                                                </a>
                                                <a href="https://www.linkedin.com/in/subir-ghosh-19a276331"
                                                    target="_blank"
                                                    class="flex items-center justify-center rounded-full bg-[#1978e5] text-white text-sm font-bold px-5 h-10 hover:bg-[#166cd1] transition">
                                                    LinkedIn
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <footer class="bg-[#0e141b] py-6 border-t border-[#2c3e50]">
                <div class="max-w-7xl mx-auto px-4 text-center">
                    <p class="text-sm text-gray-400">
                        © 2024 — Developed by
                        <a href="https://github.com/subir-hub" target="_blank"
                            class="text-white font-semibold hover:underline">
                            Subir Ghosh
                        </a>
                    </p>
                </div>
            </footer>




        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#signupForm').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: 'signup.php',
                data: $(this).serialize(),
                success: function(response) {
                    $('#signupMsg').html(response);

                    // Optional: Clear form on success
                    if (response.toLowerCase().includes('signup successful')) {
                        $('#signupForm')[0].reset();
                    }
                },
                error: function() {
                    $('#signupMsg').html('<span class="text-danger">Something went wrong!</span>');
                }
            });
        });

        $("#loginForm").on("submit", function(e) {
            e.preventDefault();

            $.ajax({
                url: "login.php",
                method: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    $("#result").html(response);

                    if (response.includes("Login successful")) {
                        setTimeout(() => {
                            window.location.href = "index.php"; // Redirect if needed
                        }, 1500);
                    }
                },
                error: function() {
                    $("#result").html('<div class="alert alert-danger">Something went wrong.</div>');
                }
            });
        });
    </script>



</body>

</html>