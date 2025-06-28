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
            <?php if (isset($_SESSION['user_email'])): ?>
                <!-- ✅ If user is logged in -->
                <button onclick="location.href='chat.php'"
                    class="rounded-full bg-[#1978e5] text-white px-4 md:px-5 h-10 md:h-11 text-sm md:text-base font-bold hover:bg-[#166cd1] transition">
                    Get Started
                </button>
                <a href="logout.php"
                    class="flex items-center justify-center rounded-full border border-red-500 text-red-500 bg-white px-4 md:px-5 h-10 md:h-11 text-sm md:text-base font-bold hover:bg-gradient-to-r from-red-500 to-red-600 hover:text-white transition-all duration-300 shadow-sm">
                    Logout
                </a>
            <?php else: ?>
                <!-- ❌ If not logged in -->
                <button data-bs-toggle="modal" data-bs-target="#loginModal"
                    class="rounded-full bg-[#1978e5] text-white px-4 md:px-5 h-10 md:h-11 text-sm md:text-base font-bold hover:bg-[#166cd1] transition">
                    Get Started
                </button>
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