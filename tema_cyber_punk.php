<!DOCTYPE html>
<html lang="id" class="dark-theme">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neon Guestbook | Buku Tamu Modern</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700;900&family=Exo+2:wght@300;400;500;600;700&family=JetBrains+Mono:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --neon-primary: #00f3ff;
            --neon-secondary: #ff00ff;
            --neon-accent: #00ff88;
            --neon-warning: #ffaa00;
            --neon-error: #ff0033;
            
            --bg-dark: #0a0a0f;
            --bg-darker: #050508;
            --bg-card: rgba(15, 15, 25, 0.8);
            --bg-card-hover: rgba(25, 25, 40, 0.9);
            --bg-input: rgba(10, 10, 20, 0.6);
            
            --text-primary: #ffffff;
            --text-secondary: #b0b0ff;
            --text-muted: #8888cc;
            
            --border-glow: 0 0 20px rgba(0, 243, 255, 0.3);
            --neon-glow: 0 0 15px currentColor;
            --intense-glow: 0 0 30px currentColor;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Exo 2', sans-serif;
            background: var(--bg-dark);
            color: var(--text-primary);
            min-height: 100vh;
            overflow-x: hidden;
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(0, 243, 255, 0.05) 0%, transparent 20%),
                radial-gradient(circle at 90% 80%, rgba(255, 0, 255, 0.05) 0%, transparent 20%),
                radial-gradient(circle at 50% 50%, rgba(0, 255, 136, 0.03) 0%, transparent 50%);
            position: relative;
        }

        /* Animated Background Elements */
        .cyber-grid {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(rgba(0, 243, 255, 0.1) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 243, 255, 0.1) 1px, transparent 1px);
            background-size: 50px 50px;
            animation: gridMove 20s linear infinite;
            z-index: -2;
        }

        .floating-shapes {
            position: fixed;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .shape {
            position: absolute;
            border-radius: 50%;
            background: radial-gradient(circle, var(--neon-primary), transparent);
            opacity: 0.1;
            animation: floatShape 15s infinite ease-in-out;
        }

        .shape:nth-child(1) { width: 300px; height: 300px; top: 10%; left: 5%; animation-delay: 0s; }
        .shape:nth-child(2) { width: 200px; height: 200px; top: 60%; right: 10%; animation-delay: -5s; background: radial-gradient(circle, var(--neon-secondary), transparent); }
        .shape:nth-child(3) { width: 400px; height: 400px; bottom: 10%; left: 20%; animation-delay: -10s; background: radial-gradient(circle, var(--neon-accent), transparent); }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            position: relative;
            z-index: 1;
        }

        /* Header Styles */
        .cyber-header {
            text-align: center;
            margin-bottom: 60px;
            padding: 40px 0;
            position: relative;
        }

        .cyber-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 200px;
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--neon-primary), transparent);
            animation: scanLine 3s ease-in-out infinite;
        }

        .main-title {
            font-family: 'Orbitron', monospace;
            font-size: 4.5rem;
            font-weight: 900;
            background: linear-gradient(45deg, var(--neon-primary), var(--neon-secondary), var(--neon-accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: var(--border-glow);
            margin-bottom: 20px;
            animation: titleGlow 4s ease-in-out infinite alternate;
            letter-spacing: 3px;
        }

        .subtitle {
            font-size: 1.4rem;
            color: var(--text-secondary);
            font-weight: 300;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        /* Card Styles */
        .cyber-card {
            background: var(--bg-card);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(0, 243, 255, 0.2);
            border-radius: 16px;
            padding: 40px;
            margin-bottom: 40px;
            box-shadow: 
                var(--border-glow),
                inset 0 0 50px rgba(0, 243, 255, 0.1);
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            position: relative;
            overflow: hidden;
            animation: cardEntrance 0.8s ease-out;
        }

        .cyber-card::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, var(--neon-primary), var(--neon-secondary), var(--neon-accent), var(--neon-primary));
            border-radius: 18px;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .cyber-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 
                0 0 40px rgba(0, 243, 255, 0.4),
                inset 0 0 80px rgba(0, 243, 255, 0.15);
        }

        .cyber-card:hover::before {
            opacity: 1;
            animation: borderRotate 3s linear infinite;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 30px;
            position: relative;
        }

        .cyber-label {
            display: block;
            margin-bottom: 12px;
            font-weight: 600;
            color: var(--neon-primary);
            font-size: 1.1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-shadow: var(--neon-glow);
        }

        .cyber-input {
            width: 100%;
            padding: 18px 20px;
            background: var(--bg-input);
            border: 2px solid rgba(0, 243, 255, 0.3);
            border-radius: 12px;
            font-size: 16px;
            font-family: 'JetBrains Mono', monospace;
            color: var(--text-primary);
            transition: all 0.3s ease;
            position: relative;
        }

        .cyber-input:focus {
            outline: none;
            border-color: var(--neon-primary);
            box-shadow: 
                var(--neon-glow),
                inset 0 0 20px rgba(0, 243, 255, 0.1);
            background: rgba(10, 10, 20, 0.8);
        }

        .cyber-input.error-input {
            border-color: var(--neon-error);
            box-shadow: 
                0 0 15px var(--neon-error),
                inset 0 0 20px rgba(255, 0, 51, 0.1);
            animation: errorPulse 0.6s ease-in-out;
        }

        textarea.cyber-input {
            height: 140px;
            resize: vertical;
            min-height: 120px;
        }

        /* Button Styles */
        .cyber-button {
            background: linear-gradient(45deg, var(--neon-primary), var(--neon-accent));
            color: var(--bg-dark);
            padding: 18px 50px;
            border: none;
            border-radius: 12px;
            font-family: 'Orbitron', monospace;
            font-size: 1.2rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            position: relative;
            overflow: hidden;
            box-shadow: 
                0 0 25px rgba(0, 243, 255, 0.5),
                0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .cyber-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: left 0.6s;
        }

        .cyber-button:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 
                0 0 40px rgba(0, 243, 255, 0.8),
                0 8px 25px rgba(0, 0, 0, 0.4);
            letter-spacing: 3px;
        }

        .cyber-button:hover::before {
            left: 100%;
        }

        .cyber-button:active {
            transform: translateY(0) scale(1);
        }

        /* Message Styles */
        .messages-section {
            margin-top: 60px;
        }

        .section-title {
            font-family: 'Orbitron', monospace;
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 40px;
            color: var(--neon-primary);
            text-shadow: var(--intense-glow);
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--neon-primary), transparent);
        }

        .message-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }

        .message-card {
            background: var(--bg-card);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(0, 255, 136, 0.2);
            border-radius: 16px;
            padding: 25px;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            animation: messageAppear 0.6s ease-out;
        }

        .message-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(0, 255, 136, 0.05), transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .message-card:hover {
            transform: translateY(-8px) rotateX(5deg);
            border-color: var(--neon-accent);
            box-shadow: 
                0 10px 30px rgba(0, 255, 136, 0.2),
                inset 0 0 40px rgba(0, 255, 136, 0.05);
        }

        .message-card:hover::before {
            opacity: 1;
        }

        .message-header {
            display: flex;
            justify-content: between;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid rgba(0, 243, 255, 0.2);
        }

        .message-name {
            font-family: 'Orbitron', monospace;
            font-size: 1.3rem;
            color: var(--neon-accent);
            text-shadow: var(--neon-glow);
            font-weight: 600;
        }

        .message-time {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.9rem;
            color: var(--text-muted);
        }

        .message-content {
            color: var(--text-secondary);
            line-height: 1.6;
            font-size: 1.05rem;
            padding: 15px;
            background: rgba(0, 243, 255, 0.05);
            border-radius: 8px;
            border-left: 3px solid var(--neon-primary);
        }

        /* Status Messages */
        .cyber-success {
            background: rgba(0, 255, 136, 0.1);
            border: 1px solid var(--neon-accent);
            color: var(--neon-accent);
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 25px;
            text-shadow: var(--neon-glow);
            animation: successPulse 2s ease-in-out infinite;
            backdrop-filter: blur(10px);
        }

        .cyber-error {
            background: rgba(255, 0, 51, 0.1);
            border: 1px solid var(--neon-error);
            color: var(--neon-error);
            padding: 15px 20px;
            border-radius: 12px;
            margin-bottom: 25px;
            text-shadow: var(--neon-glow);
            animation: errorShake 0.5s ease-in-out;
            backdrop-filter: blur(10px);
        }

        .field-error {
            color: var(--neon-error);
            font-size: 0.9rem;
            margin-top: 8px;
            padding: 8px 12px;
            background: rgba(255, 0, 51, 0.1);
            border-radius: 6px;
            border-left: 3px solid var(--neon-error);
            animation: fadeInUp 0.3s ease-out;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 80px 40px;
            color: var(--text-muted);
            grid-column: 1 / -1;
        }

        .empty-icon {
            font-size: 4rem;
            margin-bottom: 20px;
            opacity: 0.5;
        }

        /* Animations */
        @keyframes gridMove {
            0% { transform: translate(0, 0); }
            100% { transform: translate(50px, 50px); }
        }

        @keyframes floatShape {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            33% { transform: translate(30px, -30px) rotate(120deg); }
            66% { transform: translate(-20px, 20px) rotate(240deg); }
        }

        @keyframes titleGlow {
            0% { text-shadow: 0 0 20px var(--neon-primary); }
            33% { text-shadow: 0 0 30px var(--neon-secondary); }
            66% { text-shadow: 0 0 25px var(--neon-accent); }
            100% { text-shadow: 0 0 20px var(--neon-primary); }
        }

        @keyframes scanLine {
            0%, 100% { opacity: 0; }
            50% { opacity: 1; }
        }

        @keyframes cardEntrance {
            from {
                opacity: 0;
                transform: translateY(50px) scale(0.9);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes borderRotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes messageAppear {
            from {
                opacity: 0;
                transform: translateX(-30px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateX(0) scale(1);
            }
        }

        @keyframes successPulse {
            0%, 100% { box-shadow: 0 0 20px rgba(0, 255, 136, 0.3); }
            50% { box-shadow: 0 0 40px rgba(0, 255, 136, 0.6); }
        }

        @keyframes errorShake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-10px); }
            75% { transform: translateX(10px); }
        }

        @keyframes errorPulse {
            0%, 100% { box-shadow: 0 0 15px var(--neon-error); }
            50% { box-shadow: 0 0 25px var(--neon-error); }
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
            .main-title { font-size: 2.5rem; }
            .message-grid { grid-template-columns: 1fr; }
            .cyber-card { padding: 25px; }
            .container { padding: 10px; }
        }

        /* Theme Toggle (Bonus) */
        .theme-toggle {
            position: fixed;
            top: 20px;
            right: 20px;
            background: var(--bg-card);
            border: 1px solid var(--neon-primary);
            color: var(--neon-primary);
            padding: 10px 15px;
            border-radius: 8px;
            cursor: pointer;
            z-index: 1000;
            transition: all 0.3s ease;
            font-family: 'Orbitron', monospace;
        }

        .theme-toggle:hover {
            background: var(--neon-primary);
            color: var(--bg-dark);
            box-shadow: var(--neon-glow);
        }
    </style>
</head>
<body>
    <!-- Animated Background -->
    <div class="cyber-grid"></div>
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <!-- Theme Toggle -->
    <button class="theme-toggle" onclick="toggleTheme()">
        <i class="fas fa-palette"></i> THEME
    </button>

    <div class="container">
        <!-- Header -->
        <div class="cyber-header">
            <h1 class="main-title">NEON GUESTBOOK</h1>
            <p class="subtitle">Leave Your Digital Footprint in Cyberspace</p>
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
                $field_errors['nama'] = "🚫 Nama tidak boleh kosong!";
                $errors[] = "Nama tidak boleh kosong!";
            }

            if (empty($pesan)) {
                $field_errors['pesan'] = "🚫 Pesan tidak boleh kosong!";
                $errors[] = "Pesan tidak boleh kosong!";
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
                    $success = "⚡ PESAN TERKIRIM! • Digital footprint recorded in the matrix • Thank you for your contribution!";
                    // Reset form values setelah sukses
                    $nama = '';
                    $pesan = '';
                } else {
                    $errors[] = "💥 SYSTEM ERROR • Failed to establish connection with database • Please try again";
                }
            }
        }

        // Tampilkan pesan success
        if (!empty($success)) {
            echo '<div class="cyber-success">';
            echo '<i class="fas fa-bolt"></i> ' . htmlspecialchars($success);
            echo '</div>';
        }

        // Tampilkan pesan error global
        $global_errors = array_filter($errors, function($error) {
            return $error !== "Nama tidak boleh kosong!" && $error !== "Pesan tidak boleh kosong!";
        });
        
        if (!empty($global_errors)) {
            echo '<div class="cyber-error">';
            foreach ($global_errors as $error) {
                echo '<i class="fas fa-exclamation-triangle"></i> ' . htmlspecialchars($error) . '<br>';
            }
            echo '</div>';
        }
        ?>

        <!-- Form Input -->
        <div class="cyber-card">
            <form method="POST" action="" id="cyberForm">
                <div class="form-group">
                    <label class="cyber-label">
                        <i class="fas fa-user-astronaut"></i> IDENTIFICATION
                    </label>
                    <input type="text" id="nama" name="nama" 
                           value="<?php echo isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : ''; ?>"
                           placeholder="ENTER YOUR DESIGNATION..."
                           class="cyber-input <?php echo !empty($field_errors['nama']) ? 'error-input' : ''; ?>">
                    <?php if (!empty($field_errors['nama'])): ?>
                        <div class="field-error">
                            <i class="fas fa-exclamation-circle"></i> <?php echo htmlspecialchars($field_errors['nama']); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label class="cyber-label">
                        <i class="fas fa-comment-dots"></i> TRANSMISSION DATA
                    </label>
                    <textarea id="pesan" name="pesan" 
                              placeholder="INPUT YOUR MESSAGE FOR THE DIGITAL REALM..."
                              class="cyber-input <?php echo !empty($field_errors['pesan']) ? 'error-input' : ''; ?>"><?php echo isset($_POST['pesan']) ? htmlspecialchars($_POST['pesan']) : ''; ?></textarea>
                    <?php if (!empty($field_errors['pesan'])): ?>
                        <div class="field-error">
                            <i class="fas fa-exclamation-circle"></i> <?php echo htmlspecialchars($field_errors['pesan']); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <button type="submit" class="cyber-button">
                    <i class="fas fa-paper-plane"></i> INITIATE TRANSMISSION
                </button>
            </form>
        </div>

        <!-- Messages Section -->
        <div class="messages-section">
            <h2 class="section-title">DIGITAL ARCHIVES</h2>
            
            <div class="message-grid">
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
                                echo '<div class="message-card" style="animation-delay: ' . ($message_count * 0.1) . 's">';
                                echo '<div class="message-header">';
                                echo '<div class="message-name">';
                                echo '<i class="fas fa-user"></i> ' . htmlspecialchars($nama);
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
                            echo '<div class="empty-icon"><i class="fas fa-ghost"></i></div>';
                            echo '<h3>DATABASE EMPTY</h3>';
                            echo '<p>No digital footprints detected</p>';
                            echo '<p>Be the first to leave your mark in cyberspace</p>';
                            echo '</div>';
                        }
                    } else {
                        echo '<div class="empty-state">';
                        echo '<div class="empty-icon"><i class="fas fa-ghost"></i></div>';
                        echo '<h3>DATABASE EMPTY</h3>';
                        echo '<p>No digital footprints detected</p>';
                        echo '<p>Be the first to leave your mark in cyberspace</p>';
                        echo '</div>';
                    }
                } else {
                    echo '<div class="empty-state">';
                    echo '<div class="empty-icon"><i class="fas fa-ghost"></i></div>';
                    echo '<h3>DATABASE EMPTY</h3>';
                    echo '<p>No digital footprints detected</p>';
                    echo '<p>Be the first to leave your mark in cyberspace</p>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>

    <script>
        // Enhanced animations and interactions
        document.addEventListener('DOMContentLoaded', function() {
            // Input focus effects
            const inputs = document.querySelectorAll('.cyber-input');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'scale(1.02)';
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'scale(1)';
                });
            });

            // Auto-remove success message
            const successMsg = document.querySelector('.cyber-success');
            if (successMsg) {
                setTimeout(() => {
                    successMsg.style.opacity = '0';
                    successMsg.style.transform = 'translateY(-20px)';
                    setTimeout(() => successMsg.remove(), 500);
                }, 5000);
            }

            // Typing effect for placeholders
            const namaInput = document.getElementById('nama');
            const pesanInput = document.getElementById('pesan');
            
            if (namaInput && !namaInput.value) {
                simulateTyping(namaInput, 'ENTER YOUR DESIGNATION...');
            }
            
            if (pesanInput && !pesanInput.value) {
                simulateTyping(pesanInput, 'INPUT YOUR MESSAGE FOR THE DIGITAL REALM...');
            }
        });

        function simulateTyping(element, text) {
            let i = 0;
            const originalPlaceholder = element.getAttribute('placeholder');
            
            element.setAttribute('placeholder', '');
            
            function type() {
                if (i < text.length) {
                    element.setAttribute('placeholder', originalPlaceholder.substring(0, i + 1));
                    i++;
                    setTimeout(type, 50);
                }
            }
            
            setTimeout(type, 1000);
        }

        function toggleTheme() {
            document.body.classList.toggle('dark-theme');
            const toggle = document.querySelector('.theme-toggle');
            if (document.body.classList.contains('dark-theme')) {
                toggle.innerHTML = '<i class="fas fa-sun"></i> LIGHT MODE';
            } else {
                toggle.innerHTML = '<i class="fas fa-moon"></i> DARK MODE';
            }
        }

        // Particle effect on click
        document.addEventListener('click', function(e) {
            createParticle(e.clientX, e.clientY);
        });

        function createParticle(x, y) {
            const particle = document.createElement('div');
            particle.style.cssText = `
                position: fixed;
                left: ${x}px;
                top: ${y}px;
                width: 4px;
                height: 4px;
                background: var(--neon-primary);
                border-radius: 50%;
                pointer-events: none;
                z-index: 1000;
                animation: particleFloat 1s ease-out forwards;
            `;
            
            document.body.appendChild(particle);
            
            setTimeout(() => {
                particle.remove();
            }, 1000);
        }

        // Add particle animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes particleFloat {
                0% {
                    transform: translate(0, 0) scale(1);
                    opacity: 1;
                }
                100% {
                    transform: translate(${Math.random() * 100 - 50}px, ${Math.random() * 100 - 50}px) scale(0);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>