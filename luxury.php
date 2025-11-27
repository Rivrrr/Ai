<!DOCTYPE html>
<html lang="id" class="luxury-theme">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxury Guestbook | Buku Tamu Mewah</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800&family=Cinzel:wght@400;500;600;700&family=Marcellus&family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        :root {
            --gold-primary: #D4AF37;
            --gold-secondary: #FFD700;
            --gold-accent: #CFB53B;
            --platinum: #E5E4E2;
            --silver: #C0C0C0;
            --diamond: #B9F2FF;
            --emerald: #50C878;
            --ruby: #E0115F;
            --sapphire: #0F52BA;
            
            --bg-dark: #0A0A0A;
            --bg-darker: #050505;
            --bg-velvet: #1A0F0F;
            --bg-card: rgba(20, 15, 10, 0.8);
            --bg-card-hover: rgba(30, 20, 15, 0.9);
            
            --text-gold: #D4AF37;
            --text-platinum: #E5E4E2;
            --text-silver: #C0C0C0;
            --text-muted: #8B7355;
            
            --border-gold: 2px solid var(--gold-primary);
            --shadow-gold: 0 0 30px rgba(212, 175, 55, 0.3);
            --shadow-intense: 0 0 60px rgba(212, 175, 55, 0.5);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Marcellus', serif;
            background: var(--bg-velvet);
            color: var(--text-platinum);
            min-height: 100vh;
            overflow-x: hidden;
            background-image: 
                radial-gradient(circle at 20% 80%, rgba(212, 175, 55, 0.03) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(207, 181, 59, 0.02) 0%, transparent 50%),
                linear-gradient(45deg, var(--bg-darker) 0%, var(--bg-velvet) 100%);
            position: relative;
        }

        /* Luxury Background Elements */
        .luxury-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -2;
            opacity: 0.1;
            background-image: 
                url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1" fill="%23D4AF37" opacity="0.3"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
        }

        .floating-jewels {
            position: fixed;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .jewel {
            position: absolute;
            font-size: 2rem;
            opacity: 0.1;
            animation: floatJewel 8s infinite ease-in-out;
        }

        .jewel.diamond { color: var(--diamond); top: 20%; left: 10%; animation-delay: 0s; }
        .jewel.emerald { color: var(--emerald); top: 60%; right: 15%; animation-delay: -2s; }
        .jewel.ruby { color: var(--ruby); bottom: 20%; left: 20%; animation-delay: -4s; }
        .jewel.sapphire { color: var(--sapphire); top: 30%; right: 25%; animation-delay: -6s; }

        .crown-decoration {
            position: absolute;
            top: 50px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 3rem;
            color: var(--gold-primary);
            opacity: 0.1;
            animation: crownGlow 4s ease-in-out infinite;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 40px 20px;
            position: relative;
            z-index: 1;
        }

        /* Header Styles */
        .luxury-header {
            text-align: center;
            margin-bottom: 80px;
            padding: 60px 0;
            position: relative;
            border-bottom: var(--border-gold);
        }

        .luxury-header::before, .luxury-header::after {
            content: '✧';
            position: absolute;
            bottom: -15px;
            color: var(--gold-primary);
            font-size: 2rem;
            animation: spin 10s linear infinite;
        }

        .luxury-header::before { left: 25%; }
        .luxury-header::after { right: 25%; }

        .main-title {
            font-family: 'Cinzel', serif;
            font-size: 5rem;
            font-weight: 700;
            background: linear-gradient(45deg, var(--gold-primary), var(--gold-secondary), var(--gold-accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 20px;
            text-shadow: var(--shadow-gold);
            letter-spacing: 4px;
            position: relative;
        }

        .main-title::first-letter {
            font-size: 6rem;
            color: var(--gold-secondary);
        }

        .subtitle {
            font-family: 'Great Vibes', cursive;
            font-size: 2.5rem;
            color: var(--text-gold);
            margin-bottom: 30px;
            font-weight: 400;
        }

        .header-divider {
            width: 200px;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--gold-primary), transparent);
            margin: 0 auto;
            position: relative;
        }

        .header-divider::before, .header-divider::after {
            content: '✦';
            position: absolute;
            top: -12px;
            color: var(--gold-primary);
            font-size: 1.5rem;
        }

        .header-divider::before { left: 0; }
        .header-divider::after { right: 0; }

        /* Card Styles */
        .luxury-card {
            background: var(--bg-card);
            backdrop-filter: blur(20px);
            border: var(--border-gold);
            border-radius: 25px;
            padding: 50px;
            margin-bottom: 50px;
            box-shadow: 
                var(--shadow-gold),
                inset 0 0 100px rgba(212, 175, 55, 0.1);
            transition: all 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            position: relative;
            overflow: hidden;
        }

        .luxury-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, 
                transparent 0%, 
                rgba(212, 175, 55, 0.05) 50%, 
                transparent 100%);
            opacity: 0;
            transition: opacity 0.6s ease;
        }

        .luxury-card:hover {
            transform: translateY(-15px) scale(1.02);
            box-shadow: 
                var(--shadow-intense),
                inset 0 0 150px rgba(212, 175, 55, 0.15);
        }

        .luxury-card:hover::before {
            opacity: 1;
        }

        .card-corner {
            position: absolute;
            width: 50px;
            height: 50px;
            border: 2px solid var(--gold-primary);
            opacity: 0.5;
        }

        .card-corner.tl { top: 10px; left: 10px; border-right: none; border-bottom: none; }
        .card-corner.tr { top: 10px; right: 10px; border-left: none; border-bottom: none; }
        .card-corner.bl { bottom: 10px; left: 10px; border-right: none; border-top: none; }
        .card-corner.br { bottom: 10px; right: 10px; border-left: none; border-top: none; }

        /* Form Styles */
        .form-group {
            margin-bottom: 40px;
            position: relative;
        }

        .luxury-label {
            display: block;
            margin-bottom: 15px;
            font-family: 'Cinzel', serif;
            font-size: 1.3rem;
            color: var(--text-gold);
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .luxury-label i {
            margin-right: 12px;
            color: var(--gold-secondary);
        }

        .luxury-input {
            width: 100%;
            padding: 20px 25px;
            background: rgba(10, 8, 5, 0.6);
            border: 2px solid rgba(212, 175, 55, 0.3);
            border-radius: 15px;
            font-size: 1.1rem;
            font-family: 'Marcellus', serif;
            color: var(--text-platinum);
            transition: all 0.4s ease;
            position: relative;
        }

        .luxury-input:focus {
            outline: none;
            border-color: var(--gold-primary);
            box-shadow: 
                var(--shadow-gold),
                inset 0 0 30px rgba(212, 175, 55, 0.1);
            background: rgba(15, 12, 8, 0.8);
            transform: scale(1.02);
        }

        .luxury-input.error-input {
            border-color: var(--ruby);
            box-shadow: 
                0 0 20px rgba(224, 17, 95, 0.3),
                inset 0 0 20px rgba(224, 17, 95, 0.1);
            animation: rubyPulse 0.6s ease-in-out;
        }

        textarea.luxury-input {
            height: 160px;
            resize: vertical;
            min-height: 140px;
        }

        /* Button Styles */
        .luxury-button {
            background: linear-gradient(135deg, var(--gold-primary), var(--gold-secondary));
            color: var(--bg-dark);
            padding: 22px 60px;
            border: none;
            border-radius: 15px;
            font-family: 'Cinzel', serif;
            font-size: 1.3rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 3px;
            cursor: pointer;
            transition: all 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            position: relative;
            overflow: hidden;
            box-shadow: 
                0 10px 30px rgba(212, 175, 55, 0.4),
                0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .luxury-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: left 0.6s;
        }

        .luxury-button:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 
                0 15px 40px rgba(212, 175, 55, 0.6),
                0 8px 25px rgba(0, 0, 0, 0.4);
            letter-spacing: 4px;
        }

        .luxury-button:hover::before {
            left: 100%;
        }

        .luxury-button:active {
            transform: translateY(0) scale(1);
        }

        /* Messages Section */
        .messages-section {
            margin-top: 80px;
        }

        .section-title {
            font-family: 'Cinzel', serif;
            font-size: 3rem;
            text-align: center;
            margin-bottom: 60px;
            color: var(--text-gold);
            text-shadow: var(--shadow-gold);
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 150px;
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--gold-primary), transparent);
        }

        .message-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(450px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .message-frame {
            background: var(--bg-card);
            backdrop-filter: blur(15px);
            border: var(--border-gold);
            border-radius: 20px;
            padding: 30px;
            transition: all 0.5s ease;
            position: relative;
            overflow: hidden;
            animation: frameEntrance 0.8s ease-out;
        }

        .message-frame::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.05), transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .message-frame:hover {
            transform: translateY(-10px) rotate(1deg);
            box-shadow: 
                var(--shadow-intense),
                inset 0 0 80px rgba(212, 175, 55, 0.08);
        }

        .message-frame:hover::before {
            opacity: 1;
        }

        .message-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(212, 175, 55, 0.3);
        }

        .message-name {
            font-family: 'Cinzel', serif;
            font-size: 1.4rem;
            color: var(--gold-secondary);
            font-weight: 600;
        }

        .message-time {
            font-family: 'Marcellus', serif;
            font-size: 0.9rem;
            color: var(--text-muted);
        }

        .message-content {
            color: var(--text-silver);
            line-height: 1.7;
            font-size: 1.1rem;
            padding: 20px;
            background: rgba(212, 175, 55, 0.05);
            border-radius: 12px;
            border-left: 4px solid var(--gold-primary);
            position: relative;
        }

        .message-content::before {
            content: '"';
            position: absolute;
            top: 10px;
            left: 15px;
            font-size: 3rem;
            color: var(--gold-primary);
            opacity: 0.3;
            font-family: 'Times New Roman', serif;
        }

        /* Status Messages */
        .luxury-success {
            background: rgba(80, 200, 120, 0.1);
            border: 1px solid var(--emerald);
            color: var(--emerald);
            padding: 25px 30px;
            border-radius: 15px;
            margin-bottom: 30px;
            text-shadow: 0 0 10px rgba(80, 200, 120, 0.5);
            animation: emeraldGlow 3s ease-in-out infinite;
            backdrop-filter: blur(10px);
            font-size: 1.1rem;
        }

        .luxury-error {
            background: rgba(224, 17, 95, 0.1);
            border: 1px solid var(--ruby);
            color: var(--ruby);
            padding: 20px 25px;
            border-radius: 15px;
            margin-bottom: 30px;
            text-shadow: 0 0 10px rgba(224, 17, 95, 0.5);
            animation: rubyShake 0.5s ease-in-out;
            backdrop-filter: blur(10px);
        }

        .field-error {
            color: var(--ruby);
            font-size: 0.95rem;
            margin-top: 10px;
            padding: 10px 15px;
            background: rgba(224, 17, 95, 0.1);
            border-radius: 8px;
            border-left: 4px solid var(--ruby);
            animation: fadeInUp 0.3s ease-out;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 100px 40px;
            color: var(--text-muted);
            grid-column: 1 / -1;
        }

        .empty-icon {
            font-size: 5rem;
            margin-bottom: 30px;
            opacity: 0.3;
            color: var(--gold-primary);
        }

        .empty-state h3 {
            font-family: 'Cinzel', serif;
            font-size: 2rem;
            margin-bottom: 15px;
            color: var(--text-gold);
        }

        /* Animations */
        @keyframes floatJewel {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            33% { transform: translate(20px, -20px) rotate(120deg); }
            66% { transform: translate(-15px, 15px) rotate(240deg); }
        }

        @keyframes crownGlow {
            0%, 100% { opacity: 0.1; transform: translateX(-50%) scale(1); }
            50% { opacity: 0.2; transform: translateX(-50%) scale(1.1); }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes frameEntrance {
            from {
                opacity: 0;
                transform: translateY(50px) scale(0.9);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes emeraldGlow {
            0%, 100% { box-shadow: 0 0 20px rgba(80, 200, 120, 0.3); }
            50% { box-shadow: 0 0 40px rgba(80, 200, 120, 0.6); }
        }

        @keyframes rubyShake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-8px); }
            75% { transform: translateX(8px); }
        }

        @keyframes rubyPulse {
            0%, 100% { box-shadow: 0 0 20px rgba(224, 17, 95, 0.3); }
            50% { box-shadow: 0 0 30px rgba(224, 17, 95, 0.5); }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .main-title { font-size: 3rem; }
            .message-gallery { grid-template-columns: 1fr; }
            .luxury-card { padding: 30px; }
            .container { padding: 20px; }
            .luxury-header { padding: 40px 0; margin-bottom: 50px; }
        }

        /* Luxury Toggle */
        .luxury-toggle {
            position: fixed;
            top: 30px;
            right: 30px;
            background: var(--bg-card);
            border: var(--border-gold);
            color: var(--text-gold);
            padding: 12px 20px;
            border-radius: 10px;
            cursor: pointer;
            z-index: 1000;
            transition: all 0.3s ease;
            font-family: 'Cinzel', serif;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .luxury-toggle:hover {
            background: var(--gold-primary);
            color: var(--bg-dark);
            box-shadow: var(--shadow-gold);
        }

        /* Signature */
        .signature {
            text-align: center;
            margin-top: 80px;
            padding-top: 40px;
            border-top: 1px solid rgba(212, 175, 55, 0.3);
            color: var(--text-muted);
            font-family: 'Great Vibes', cursive;
            font-size: 1.5rem;
        }
    </style>
</head>
<body>
    <!-- Luxury Background -->
    <div class="luxury-bg"></div>
    <div class="floating-jewels">
        <div class="jewel diamond">💎</div>
        <div class="jewel emerald">💚</div>
        <div class="jewel ruby">❤️</div>
        <div class="jewel sapphire">💙</div>
    </div>
    <div class="crown-decoration">👑</div>

    <!-- Luxury Toggle -->
    <button class="luxury-toggle" onclick="toggleAmbiance()">
        <i class="fas fa-gem"></i> AMBIANCE
    </button>

    <div class="container">
        <!-- Header -->
        <div class="luxury-header">
            <h1 class="main-title">LUXURY GUESTBOOK</h1>
            <p class="subtitle">Where Elegance Meets Expression</p>
            <div class="header-divider"></div>
        </div>

        <?php
        // Konfigurasi
        $file_buku_tamu = 'buku_tamu.txt';
        $errors = [];
        $field_errors = [
            'nama' => '',
            'pesan' => ''
        ];
        $success = '';

        // Proses form jika ada submit
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sanitasi dan validasi input
            $nama = trim($_POST['nama'] ?? '');
            $pesan = trim($_POST['pesan'] ?? '');

            // Validasi per field
            if (empty($nama)) {
                $field_errors['nama'] = "💎 Name is required for this exclusive registry";
                $errors[] = "Name is required";
            }

            if (empty($pesan)) {
                $field_errors['pesan'] = "💎 Your gracious message is awaited";
                $errors[] = "Message is required";
            }

            // Jika tidak ada error, simpan ke file
            if (empty($errors)) {
                // Sanitasi input untuk keamanan
                $nama = htmlspecialchars($nama, ENT_QUOTES, 'UTF-8');
                $pesan = htmlspecialchars($pesan, ENT_QUOTES, 'UTF-8');
                
                // Format timestamp
                $timestamp = date('Y-m-d H:i:s');
                
                // Format data untuk disimpan
                $data = "=== PESAN TAMU ===\n";
                $data .= "Waktu: " . $timestamp . "\n";
                $data .= "Nama: " . $nama . "\n";
                $data .= "Pesan: " . $pesan . "\n";
                $data .= "------------------------\n";
                
                // Simpan ke file dengan FILE_APPEND
                if (file_put_contents($file_buku_tamu, $data, FILE_APPEND | LOCK_EX) !== false) {
                    $success = "✨ YOUR ELEGANT MESSAGE HAS BEEN PRESERVED IN OUR ARCHIVES • Thank you for gracing us with your words • ";
                    // Reset form values setelah sukses
                    $nama = '';
                    $pesan = '';
                } else {
                    $errors[] = "💎 System encountered an issue while preserving your message • Please try again";
                }
            }
        }

        // Tampilkan pesan success
        if (!empty($success)) {
            echo '<div class="luxury-success">';
            echo '<i class="fas fa-crown"></i> ' . htmlspecialchars($success);
            echo '</div>';
        }

        // Tampilkan pesan error global
        $global_errors = array_filter($errors, function($error) {
            return $error !== "Name is required" && $error !== "Message is required";
        });
        
        if (!empty($global_errors)) {
            echo '<div class="luxury-error">';
            foreach ($global_errors as $error) {
                echo '<i class="fas fa-exclamation-circle"></i> ' . htmlspecialchars($error) . '<br>';
            }
            echo '</div>';
        }
        ?>

        <!-- Form Input -->
        <div class="luxury-card">
            <div class="card-corner tl"></div>
            <div class="card-corner tr"></div>
            <div class="card-corner bl"></div>
            <div class="card-corner br"></div>
            
            <form method="POST" action="" id="luxuryForm">
                <div class="form-group">
                    <label class="luxury-label">
                        <i class="fas fa-user-crown"></i> DISTINGUISHED NAME
                    </label>
                    <input type="text" id="nama" name="nama" 
                           value="<?php echo isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : ''; ?>"
                           placeholder="Enter your esteemed name..."
                           class="luxury-input <?php echo !empty($field_errors['nama']) ? 'error-input' : ''; ?>">
                    <?php if (!empty($field_errors['nama'])): ?>
                        <div class="field-error">
                            <i class="fas fa-gem"></i> <?php echo htmlspecialchars($field_errors['nama']); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label class="luxury-label">
                        <i class="fas fa-feather-alt"></i> GRACIOUS MESSAGE
                    </label>
                    <textarea id="pesan" name="pesan" 
                              placeholder="Compose your elegant message for posterity..."
                              class="luxury-input <?php echo !empty($field_errors['pesan']) ? 'error-input' : ''; ?>"><?php echo isset($_POST['pesan']) ? htmlspecialchars($_POST['pesan']) : ''; ?></textarea>
                    <?php if (!empty($field_errors['pesan'])): ?>
                        <div class="field-error">
                            <i class="fas fa-gem"></i> <?php echo htmlspecialchars($field_errors['pesan']); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div style="text-align: center;">
                    <button type="submit" class="luxury-button">
                        <i class="fas fa-seal"></i> PRESERVE MESSAGE
                    </button>
                </div>
            </form>
        </div>

        <!-- Messages Section -->
        <div class="messages-section">
            <h2 class="section-title">PRESTIGIOUS ARCHIVES</h2>
            
            <div class="message-gallery">
                <?php
                // Baca dan tampilkan data dari file
                if (file_exists($file_buku_tamu)) {
                    $content = file_get_contents($file_buku_tamu);
                    
                    if (!empty($content)) {
                        // Pisahkan setiap entri pesan
                        $entries = explode("------------------------", $content);
                        
                        // Tampilkan dalam urutan terbalik (terbaru di atas)
                        $entries = array_reverse($entries);
                        $has_messages = false;
                        $message_count = 0;
                        
                        foreach ($entries as $entry) {
                            $entry = trim($entry);
                            if (!empty($entry) && strpos($entry, '=== PESAN TAMU ===') !== false) {
                                $has_messages = true;
                                $message_count++;
                                
                                // Parse data dari entry
                                $lines = explode("\n", $entry);
                                $waktu = '';
                                $nama = '';
                                $pesan = '';
                                
                                foreach ($lines as $line) {
                                    if (strpos($line, 'Waktu: ') === 0) {
                                        $waktu = substr($line, 7);
                                    } elseif (strpos($line, 'Nama: ') === 0) {
                                        $nama = substr($line, 6);
                                    } elseif (strpos($line, 'Pesan: ') === 0) {
                                        $pesan = substr($line, 7);
                                    }
                                }
                                
                                // Tampilkan pesan
                                echo '<div class="message-frame" style="animation-delay: ' . ($message_count * 0.1) . 's">';
                                echo '<div class="message-header">';
                                echo '<div class="message-name">';
                                echo '<i class="fas fa-crown"></i> ' . htmlspecialchars($nama);
                                echo '</div>';
                                echo '<div class="message-time">';
                                echo '<i class="fas fa-clock"></i> ' . htmlspecialchars($waktu);
                                echo '</div>';
                                echo '</div>';
                                echo '<div class="message-content">';
                                echo htmlspecialchars($pesan);
                                echo '</div>';
                                echo '</div>';
                            }
                        }
                        
                        if (!$has_messages) {
                            echo '<div class="empty-state">';
                            echo '<div class="empty-icon"><i class="fas fa-crown"></i></div>';
                            echo '<h3>ARCHIVES AWAIT YOUR ELEGANCE</h3>';
                            echo '<p>No distinguished messages have been recorded yet</p>';
                            echo '<p>Be the first to grace these hallowed archives with your presence</p>';
                            echo '</div>';
                        }
                    } else {
                        echo '<div class="empty-state">';
                        echo '<div class="empty-icon"><i class="fas fa-crown"></i></div>';
                        echo '<h3>ARCHIVES AWAIT YOUR ELEGANCE</h3>';
                        echo '<p>No distinguished messages have been recorded yet</p>';
                        echo '<p>Be the first to grace these hallowed archives with your presence</p>';
                        echo '</div>';
                    }
                } else {
                    echo '<div class="empty-state">';
                    echo '<div class="empty-icon"><i class="fas fa-crown"></i></div>';
                    echo '<h3>ARCHIVES AWAIT YOUR ELEGANCE</h3>';
                    echo '<p>No distinguished messages have been recorded yet</p>';
                    echo '<p>Be the first to grace these hallowed archives with your presence</p>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>

        <!-- Signature -->
        <div class="signature">
            "Elegance is the only beauty that never fades"
        </div>
    </div>

    <script>
        // Luxury animations and interactions
        document.addEventListener('DOMContentLoaded', function() {
            // Input focus effects
            const inputs = document.querySelectorAll('.luxury-input');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.style.transform = 'scale(1.02)';
                    this.parentElement.style.transform = 'translateX(10px)';
                });
                
                input.addEventListener('blur', function() {
                    this.style.transform = 'scale(1)';
                    this.parentElement.style.transform = 'translateX(0)';
                });
            });

            // Auto-remove success message with elegance
            const successMsg = document.querySelector('.luxury-success');
            if (successMsg) {
                setTimeout(() => {
                    successMsg.style.opacity = '0';
                    successMsg.style.transform = 'translateY(-30px)';
                    successMsg.style.transition = 'all 0.8s ease';
                    setTimeout(() => successMsg.remove(), 800);
                }, 6000);
            }

            // Add gold dust effect on button click
            const luxuryButton = document.querySelector('.luxury-button');
            if (luxuryButton) {
                luxuryButton.addEventListener('click', function(e) {
                    createGoldDust(e.clientX, e.clientY);
                });
            }
        });

        function createGoldDust(x, y) {
            for (let i = 0; i < 8; i++) {
                const dust = document.createElement('div');
                dust.style.cssText = `
                    position: fixed;
                    left: ${x}px;
                    top: ${y}px;
                    width: 6px;
                    height: 6px;
                    background: var(--gold-secondary);
                    border-radius: 50%;
                    pointer-events: none;
                    z-index: 1000;
                    animation: goldDustFloat 1.5s ease-out forwards;
                `;
                
                document.body.appendChild(dust);
                
                setTimeout(() => {
                    dust.remove();
                }, 1500);
            }
        }

        // Add gold dust animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes goldDustFloat {
                0% {
                    transform: translate(0, 0) scale(1) rotate(0deg);
                    opacity: 1;
                }
                100% {
                    transform: translate(${Math.random() * 100 - 50}px, ${Math.random() * 100 - 50}px) scale(0) rotate(360deg);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);

        function toggleAmbiance() {
            const body = document.body;
            const toggle = document.querySelector('.luxury-toggle');
            
            if (body.classList.contains('luxury-theme')) {
                body.classList.remove('luxury-theme');
                body.classList.add('premium-theme');
                toggle.innerHTML = '<i class="fas fa-moon"></i> DARK AMBIANCE';
                // Change to darker, more intimate theme
                document.documentElement.style.setProperty('--bg-velvet', '#0A0806');
                document.documentElement.style.setProperty('--bg-card', 'rgba(15, 10, 5, 0.9)');
            } else {
                body.classList.remove('premium-theme');
                body.classList.add('luxury-theme');
                toggle.innerHTML = '<i class="fas fa-sun"></i> GOLDEN AMBIANCE';
                // Restore original golden theme
                document.documentElement.style.setProperty('--bg-velvet', '#1A0F0F');
                document.documentElement.style.setProperty('--bg-card', 'rgba(20, 15, 10, 0.8)');
            }
        }

        // Add elegant page load animation
        window.addEventListener('load', function() {
            document.body.style.opacity = '0';
            document.body.style.transition = 'opacity 1.5s ease';
            
            setTimeout(() => {
                document.body.style.opacity = '1';
            }, 100);
        });
    </script>
</body>
</html>