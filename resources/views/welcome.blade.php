<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Royal Paws | Premium Pet Nutrition</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS (CDN for compatibility with Node v18) -->
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    
    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, h4, h5, h6, .font-playfair { font-family: 'Playfair Display', serif; }
        
        /* Gold Gradient Text */
        .text-gradient-gold {
            background: linear-gradient(to right, #B8860B, #FFD700, #B8860B);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            color: transparent;
        }

        /* Gold Gradient Border */
        .border-gradient-gold {
            border-image: linear-gradient(to right, #B8860B, #FFD700, #B8860B) 1;
        }
        
        .gold-glow {
            box-shadow: 0 0 15px rgba(212, 175, 55, 0.3);
        }
    </style>
</head>
<body class="antialiased bg-[#0D2115] text-[#F3E5AB] min-h-screen flex flex-col pt-24">

    <!-- Navigation -->
    <header class="fixed top-0 w-full z-50 bg-[#1A3626]/90 backdrop-blur-md border-b border-[#D4AF37]/30 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center gap-3">
                    <svg class="w-8 h-8 text-[#D4AF37]" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M5.5 2C3.567 2 2 3.567 2 5.5C2 7.026 2.977 8.324 4.352 8.814C4.12 10.748 4.793 12.639 6.136 14.122C7.308 15.416 8.941 16 10.5 16C10.505 16 10.511 16 10.516 16C10.729 16.924 11.233 17.763 11.956 18.411C12.825 19.19 14.004 19.565 15.225 19.467C16.892 19.333 18.397 18.358 19.167 16.906C20.57 16.273 21.644 14.978 21.921 13.387C22.259 11.439 21.363 9.479 19.645 8.435C20.485 7.429 20.897 6.071 20.781 4.721C20.627 2.923 19.066 1.579 17.268 1.733C15.903 1.849 14.821 2.82 14.453 4.125C13.562 3.42 12.449 3 11.25 3C9.079 3 7.23 4.382 6.58 6.307C5.95 6.096 5.5 5.519 5.5 5.5V5.5C5.5 5.617 5.509 5.733 5.528 5.847C5.163 5.94 4.779 5.925 4.417 5.808C4.78 6.174 5.253 6.425 5.783 6.486C5.558 6.177 5.438 5.821 5.438 5.438V5.438C5.438 4.673 5.717 3.974 6.175 3.425C5.961 3.167 5.741 2.91 5.5 2Z"/>
                    </svg>
                    <span class="font-playfair font-bold text-2xl tracking-wider text-gradient-gold">ROYAL PAWS</span>
                </div>
                
                <!-- Desktop Menu -->
                <nav class="hidden md:flex space-x-8">
                    <a href="#" class="text-[#F3E5AB] hover:text-[#D4AF37] transition-colors duration-200 uppercase tracking-widest text-sm font-medium">Nos Croquettes</a>
                    <a href="#" class="text-[#F3E5AB] hover:text-[#D4AF37] transition-colors duration-200 uppercase tracking-widest text-sm font-medium">Boutique</a>
                    <a href="#" class="text-[#F3E5AB] hover:text-[#D4AF37] transition-colors duration-200 uppercase tracking-widest text-sm font-medium">Notre Histoire</a>
                </nav>

                <!-- Actions -->
                <div class="hidden md:flex items-center space-x-6">
                    <a href="#" class="text-[#F3E5AB] hover:text-[#D4AF37] transition-colors duration-200 text-sm font-medium">Connexion</a>
                    <a href="#" class="px-6 py-2 border border-[#D4AF37] text-[#D4AF37] hover:bg-[#D4AF37] hover:text-[#0D2115] transition-all duration-300 rounded-sm font-medium tracking-wide text-sm gold-glow">
                        S'enregistrer
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <main class="flex-grow">
        <section class="relative bg-[#0D2115] overflow-hidden pt-12 pb-24 sm:pt-16 lg:pt-20">
            <!-- Decorative Elements -->
            <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 opacity-20">
                <div class="absolute -top-[20%] -right-[10%] w-[50%] h-[50%] rounded-full blur-[120px] bg-[#D4AF37]"></div>
                <div class="absolute top-[60%] -left-[10%] w-[40%] h-[40%] rounded-full blur-[100px] bg-[#D4AF37]"></div>
            </div>

            <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <!-- Crown Icon -->
                <div class="flex justify-center mb-6">
                    <svg class="w-16 h-16 text-[#D4AF37] opacity-80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M2 17L3 7L8 10L12 3L16 10L21 7L22 17H2Z"/>
                        <path d="M12 22C17.5228 22 22 19.7614 22 17C22 14.2386 17.5228 12 12 12C6.47715 12 2 14.2386 2 17C2 19.7614 6.47715 22 12 22Z" fill="#D4AF37" fill-opacity="0.2"/>
                    </svg>
                </div>
                
                <h1 class="text-5xl md:text-7xl font-playfair font-bold text-gradient-gold mb-6 drop-shadow-md">
                    ROYAL PAWS
                </h1>
                
                <p class="mt-4 text-xl md:text-2xl text-[#F3E5AB] font-playfair italic max-w-3xl mx-auto mb-4">
                    Premium Nutrition for Cats & Dogs
                </p>
                <p class="text-md md:text-lg text-[#F3E5AB]/80 font-light max-w-2xl mx-auto mb-10 tracking-wide">
                    Not just pet food. A royal lifestyle.
                </p>
                
                <div class="flex flex-col sm:flex-row justify-center gap-4 mb-16">
                    <a href="#" class="px-8 py-3 bg-gradient-to-r from-[#B8860B] via-[#D4AF37] to-[#B8860B] text-[#0D2115] font-semibold rounded-sm shadow-[0_0_20px_rgba(212,175,55,0.4)] hover:shadow-[0_0_30px_rgba(212,175,55,0.6)] transition-all duration-300 transform hover:-translate-y-1">
                        Enter the Royal Store
                    </a>
                    <a href="#" class="px-8 py-3 border border-[#D4AF37] text-[#D4AF37] hover:bg-[#1A3626] font-medium rounded-sm transition-all duration-300">
                        Discover the Collection
                    </a>
                </div>

                <!-- Hero Image Container (Golden Frame) -->
                <div class="relative mx-auto mt-12 max-w-5xl rounded-lg p-1 bg-gradient-to-b from-[#D4AF37]/50 to-transparent gold-glow">
                    <div class="rounded-lg overflow-hidden border border-[#D4AF37]/30 bg-[#1A3626]">
                        <img src="{{ asset('images/hero.png') }}" alt="Royal Paws Premium Pet Food" class="w-full h-auto object-cover opacity-90 hover:opacity-100 transition-opacity duration-700">
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="border-y border-[#D4AF37]/20 bg-[#1A3626] py-12 relative">
            <!-- Subtle Gold Pattern Background -->
            <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(#D4AF37 1px, transparent 1px); background-size: 20px 20px;"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center divide-y md:divide-y-0 md:divide-x divide-[#D4AF37]/20">
                    
                    <div class="py-4 px-6 flex items-center justify-center gap-4 group">
                        <svg class="w-8 h-8 text-[#D4AF37] mt-1 group-hover:scale-110 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                        </svg>
                        <h3 class="text-xl font-playfair text-[#F3E5AB]">Premium Ingredients</h3>
                    </div>

                    <div class="py-4 px-6 flex items-center justify-center gap-4 group">
                        <svg class="w-8 h-8 text-[#D4AF37] mt-1 group-hover:scale-110 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        <h3 class="text-xl font-playfair text-[#F3E5AB]">Vet Approved Nutrition</h3>
                    </div>

                    <div class="py-4 px-6 flex items-center justify-center gap-4 group">
                        <svg class="w-8 h-8 text-[#D4AF37] mt-1 group-hover:scale-110 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        <h3 class="text-xl font-playfair text-[#F3E5AB]">Strong Bones & Joints</h3>
                    </div>

                </div>
            </div>
        </section>

        <!-- The Royal Collection -->
        <section class="py-24 bg-[#0D2115] relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <div class="flex items-center justify-center gap-4 mb-4">
                        <div class="h-[1px] w-16 bg-[#D4AF37]/50"></div>
                        <h2 class="text-4xl font-playfair text-gradient-gold">The Royal Collection</h2>
                        <div class="h-[1px] w-16 bg-[#D4AF37]/50"></div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Premium Ingredients Box -->
                    <div class="border border-[#D4AF37]/40 rounded-sm p-8 bg-[#1A3626]/50 hover:bg-[#1A3626] transition-colors duration-300 group relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-[#D4AF37] to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="flex flex-col items-center text-center">
                            <div class="w-16 h-16 rounded-full border border-[#D4AF37]/50 flex items-center justify-center mb-6 bg-[#0D2115] group-hover:scale-110 transition-transform duration-300">
                                <span class="text-2xl">🥩</span>
                            </div>
                            <h3 class="text-xl font-playfair text-[#D4AF37] mb-2">Finest Meat</h3>
                            <p class="text-[#F3E5AB]/70 text-sm">Rich in high-quality proteins selected for royal palates.</p>
                        </div>
                    </div>

                    <!-- Vet Approved Box -->
                    <div class="border border-[#D4AF37]/40 rounded-sm p-8 bg-[#1A3626]/50 hover:bg-[#1A3626] transition-colors duration-300 group relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-[#D4AF37] to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="flex flex-col items-center text-center">
                            <div class="w-16 h-16 rounded-full border border-[#D4AF37]/50 flex items-center justify-center mb-6 bg-[#0D2115] group-hover:scale-110 transition-transform duration-300">
                                <span class="text-2xl text-[#D4AF37] font-bold">++</span>
                            </div>
                            <h3 class="text-xl font-playfair text-[#D4AF37] mb-2">Clinically Proven</h3>
                            <p class="text-[#F3E5AB]/70 text-sm">Formulated with veterinarians to ensure unmatched health.</p>
                        </div>
                    </div>

                    <!-- Strong Bones Box -->
                    <div class="border border-[#D4AF37]/40 rounded-sm p-8 bg-[#1A3626]/50 hover:bg-[#1A3626] transition-colors duration-300 group relative overflow-hidden">
                         <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-[#D4AF37] to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="flex flex-col items-center text-center">
                            <div class="w-16 h-16 rounded-full border border-[#D4AF37]/50 flex items-center justify-center mb-6 bg-[#0D2115] group-hover:scale-110 transition-transform duration-300">
                                <span class="text-2xl">🐾</span>
                            </div>
                            <h3 class="text-xl font-playfair text-[#D4AF37] mb-2">Active Life</h3>
                            <p class="text-[#F3E5AB]/70 text-sm">Essential nutrients for joint support to keep them leaping.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Story Banner -->
        <section class="py-20 relative bg-[#1A3626] border-y border-[#D4AF37]/20 flex flex-col items-center text-center px-4">
            <h2 class="text-3xl md:text-5xl font-playfair text-gradient-gold mb-8 max-w-4xl mx-auto leading-tight italic">
                "Because every pet deserves<br>the royal treatment."
            </h2>
            <a href="#" class="px-10 py-3 border-2 border-[#D4AF37] text-[#D4AF37] hover:bg-[#D4AF37] hover:text-[#0D2115] transition-all duration-300 rounded-sm font-medium tracking-widest uppercase text-sm">
                Our Story
            </a>
        </section>

    </main>

    <!-- Footer -->
    <footer class="bg-[#0A1810] py-12 border-t border-[#D4AF37]/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-[#F3E5AB]/50 text-sm">
            <div class="flex justify-center items-center gap-2 mb-4">
                <svg class="w-5 h-5 text-[#D4AF37]/50" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M5.5 2C3.567 2 2 3.567 2 5.5C2 7.026 2.977 8.324 4.352 8.814C4.12 10.748 4.793 12.639 6.136 14.122C7.308 15.416 8.941 16 10.5 16C10.505 16 10.511 16 10.516 16C10.729 16.924 11.233 17.763 11.956 18.411C12.825 19.19 14.004 19.565 15.225 19.467C16.892 19.333 18.397 18.358 19.167 16.906C20.57 16.273 21.644 14.978 21.921 13.387C22.259 11.439 21.363 9.479 19.645 8.435C20.485 7.429 20.897 6.071 20.781 4.721C20.627 2.923 19.066 1.579 17.268 1.733C15.903 1.849 14.821 2.82 14.453 4.125C13.562 3.42 12.449 3 11.25 3C9.079 3 7.23 4.382 6.58 6.307C5.95 6.096 5.5 5.519 5.5 5.5V5.5C5.5 5.617 5.509 5.733 5.528 5.847C5.163 5.94 4.779 5.925 4.417 5.808C4.78 6.174 5.253 6.425 5.783 6.486C5.558 6.177 5.438 5.821 5.438 5.438V5.438C5.438 4.673 5.717 3.974 6.175 3.425C5.961 3.167 5.741 2.91 5.5 2Z"/>
                </svg>
            </div>
            <p>&copy; 2026 Royal Paws by ElAlif. All rights reserved.</p>
            <p class="mt-2 text-xs opacity-50">Designed with regal excellence.</p>
        </div>
    </footer>
</body>
</html>
