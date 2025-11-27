<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Daftar</title>
    <style>
        :root {
            --casino-red: #C00;
            --casino-black: #000;
            --casino-gold: #FFD700;
            --casino-green: #006400;
            --casino-felt: #0A5C36;
            --casino-chips: #8B0000;
            --casino-light: #FFF;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial Black', 'Arial', sans-serif;
            background: 
                radial-gradient(circle at 20% 80%, var(--casino-felt) 0%, var(--casino-black) 100%),
                repeating-linear-gradient(45deg, transparent, transparent 10px, rgba(0,0,0,0.1) 10px, rgba(0,0,0,0.1) 20px);
            color: var(--casino-light);
            min-height: 100vh;
            padding: 20px;
            overflow-x: hidden;
        }

        /* Casino Table Effect */
        .casino-table {
            max-width: 900px;
            margin: 0 auto;
            background: var(--casino-felt);
            border: 15px solid var(--casino-gold);
            border-radius: 20px;
            padding: 30px;
            position: relative;
            box-shadow: 
                0 0 50px rgba(0,0,0,0.8),
                inset 0 0 100px rgba(0,0,0,0.3);
        }

        .casino-table::before {
            content: '';
            position: absolute;
            top: -10px;
            left: -10px;
            right: -10px;
            bottom: -10px;
            border: 5px solid var(--casino-red);
            border-radius: 30px;
            pointer-events: none;
        }

        /* Casino Chips Decor */
        .poker-chips {
            position: absolute;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            border: 3px solid white;
            box-shadow: 0 4px 8px rgba(0,0,0,0.5);
        }

        .chip-red { 
            background: radial-gradient(circle at 30% 30%, var(--casino-red), #800); 
            top: 20px; 
            left: 20px; 
        }
        .chip-blue { 
            background: radial-gradient(circle at 30% 30%, #0000FF, #000080); 
            top: 20px; 
            right: 20px; 
        }
        .chip-green { 
            background: radial-gradient(circle at 30% 30%, var(--casino-green), #004d00); 
            bottom: 20px; 
            left: 20px; 
        }
        .chip-black { 
            background: radial-gradient(circle at 30% 30%, #333, #000); 
            bottom: 20px; 
            right: 20px; 
        }

        /* Header Styles */
        .casino-header {
            text-align: center;
            margin-bottom: 40px;
            padding: 30px;
            background: linear-gradient(45deg, var(--casino-black), var(--casino-red));
            border: 5px solid var(--casino-gold);
            border-radius: 15px;
            position: relative;
        }

        .casino-header::before {
            content: '♠ ♥ ♣ ♦';
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--casino-felt);
            color: var(--casino-gold);
            padding: 5px 30px;
            font-size: 2rem;
            border: 3px solid var(--casino-gold);
            border-radius: 25px;
        }

        .main-title {
            color: var(--casino-gold);
            font-size: 3.5rem;
            margin-bottom: 15px;
            text-shadow: 
                3px 3px 0 var(--casino-black),
                -1px -1px 0 var(--casino-black),
                1px -1px 0 var(--casino-black),
                -1px 1px 0 var(--casino-black);
            letter-spacing: 3px;
        }

        .subtitle {
            color: var(--casino-light);
            font-size: 1.3rem;
            font-weight: bold;
        }

        /* Playing Card Style Form */
        .playing-card {
            background: white;
            border: 8px solid var(--casino-black);
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            position: relative;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }

        .playing-card::before {
            content: '♠';
            position: absolute;
            top: 10px;
            left: 15px;
            color: var(--casino-black);
            font-size: 2rem;
        }

        .playing-card::after {
            content: '♠';
            position: absolute;
            bottom: 10px;
            right: 15px;
            color: var(--casino-black);
            font-size: 2rem;
            transform: rotate(180deg);
        }

        .card-title {
            color: var(--casino-black);
            font-size: 1.8rem;
            text-align: center;
            margin-bottom: 25px;
            border-bottom: 3px solid var(--casino-red);
            padding-bottom: 10px;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 25px;
        }

        .casino-label {
            display: block;
            margin-bottom: 10px;
            color: var(--casino-black);
            font-weight: bold;
            font-size: 1.1rem;
        }

        .casino-input {
            width: 100%;
            padding: 15px;
            background: rgba(255,255,255,0.9);
            border: 3px solid var(--casino-black);
            border-radius: 8px;
            color: var(--casino-black);
            font-size: 16px;
            font-weight: bold;
        }

        .casino-input:focus {
            outline: none;
            border-color: var(--casino-red);
            background: white;
            box-shadow: 0 0 10px var(--casino-red);
        }

        .casino-input.error {
            border-color: #FF0000;
            background: #FFE6E6;
            animation: shake 0.5s ease-in-out;
        }

        textarea.casino-input {
            height: 120px;
            resize: vertical;
        }

        /* Button Styles */
        .bet-button {
            background: linear-gradient(45deg, var(--casino-red), #A00);
            color: var(--casino-gold);
            padding: 20px 40px;
            border: 4px solid var(--casino-gold);
            border-radius: 10px;
            font-size: 1.3rem;
            font-weight: bold;
            cursor: pointer;
            width: 100%;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }

        .bet-button:hover {
            background: linear-gradient(45deg, #A00, var(--casino-red));
            transform: translateY(-3px);
            box-shadow: 
                0 5px 15px rgba(255,0,0,0.4),
                0 0 20px var(--casino-gold);
        }

        .bet-button:active {
            transform: translateY(1px);
        }

        /* Messages Section */
        .messages-section {
            margin-top: 40px;
        }

        .roulette-table {
            background: var(--casino-black);
            border: 8px solid var(--casino-gold);
            border-radius: 15px;
            padding: 25px;
            position: relative;
        }

        .roulette-table::before {
            content: '';
            position: absolute;
            top: 10px;
            left: 10px;
            right: 10px;
            bottom: 10px;
            border: 2px solid var(--casino-red);
            border-radius: 10px;
            pointer-events: none;
        }

        .section-title {
            color: var(--casino-gold);
            font-size: 2rem;
            text-align: center;
            margin-bottom: 25px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }

        .message-slot {
            background: linear-gradient(45deg, #1a1a1a, #333);
            border: 2px solid var(--casino-gold);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 15px;
            position: relative;
            animation: slotMachine 0.6s ease-out;
        }

        .message-slot::before {
            content: '🎰';
            position: absolute;
            left: -15px;
            top: 50%;
            transform: translateY(-50%);
            background: var(--casino-black);
            padding: 8px;
            border: 2px solid var(--casino-gold);
            border-radius: 50%;
        }

        .message-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            padding-bottom: 8px;
            border-bottom: 1px solid var(--casino-gold);
        }

        .player-name {
            color: var(--casino-gold);
            font-weight: bold;
            font-size: 1.2rem;
        }

        .bet-time {
            color: var(--casino-light);
            font-size: 0.9rem;
        }

        .player-message {
            color: var(--casino-light);
            line-height: 1.5;
            padding: 10px;
            background: rgba(255,255,255,0.1);
            border-radius: 5px;
            border-left: 4px solid var(--casino-red);
        }

        /* Status Messages */
        .jackpot-message {
            background: linear-gradient(45deg, var(--casino-green), #008000);
            border: 3px solid var(--casino-gold);
            color: var(--casino-gold);
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 25px;
            text-align: center;
            font-weight: bold;
            font-size: 1.2rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            animation: jackpotFlash 2s ease-in-out infinite;
        }

        .bust-message {
            background: linear-gradient(45deg, var(--casino-red), #800);
            border: 3px solid var(--casino-black);
            color: white;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 25px;
            text-align: center;
            font-weight: bold;
            animation: bustShake 0.5s ease-in-out;
        }

        .field-error {
            color: #FF0000;
            font-size: 0.9rem;
            margin-top: 8px;
            padding: 8px;
            background: rgba(255,0,0,0.1);
            border-radius: 5px;
            border-left: 4px solid #FF0000;
            font-weight: bold;
        }

        /* Empty State */
        .empty-table {
            text-align: center;
            padding: 60px 40px;
            color: var(--casino-light);
            background: rgba(0,0,0,0.5);
            border-radius: 10px;
            border: 3px dashed var(--casino-gold);
        }

        /* Animations */
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-10px); }
            75% { transform: translateX(10px); }
        }

        @keyframes slotMachine {
            from {
                opacity: 0;
                transform: translateY(30px) rotateX(90deg);
            }
            to {
                opacity: 1;
                transform: translateY(0) rotateX(0);
            }
        }

        @keyframes jackpotFlash {
            0%, 100% { 
                box-shadow: 0 0 20px var(--casino-gold);
                transform: scale(1);
            }
            50% { 
                box-shadow: 0 0 40px var(--casino-gold);
                transform: scale(1.05);
            }
        }

        @keyframes bustShake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-15px); }
            75% { transform: translateX(15px); }
        }

        @keyframes chipSpin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .casino-table {
                padding: 20px;
                margin: 10px;
            }
            
            .main-title {
                font-size: 2.5rem;
            }
            
            .playing-card {
                padding: 20px;
            }
            
            .poker-chips {
                display: none;
            }
        }

        /* Neon Lights */
        .neon-text {
            text-shadow: 
                0 0 5px #fff,
                0 0 10px #fff,
                0 0 20px var(--casino-red),
                0 0 30px var(--casino-red),
                0 0 40px var(--casino-red);
        }
    </style>
</head>
<body>
    <div class="casino-table">
        <!-- Poker Chips -->
        <div class="poker-chips chip-red"></div>
        <div class="poker-chips chip-blue"></div>
        <div class="poker-chips chip-green"></div>
        <div class="poker-chips chip-black"></div>

        <!-- Header -->
        <div class="casino-header">
            <h1 class="main-title neon-text">🎰 Team Rivrrr 🎲</h1>
            <p class="subtitle">Reme • Cane • Blackjack </p>
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
                $field_errors['nama'] = "🚫 PLEASE ENTER YOUR PLAYER NAME";
                $errors[] = "Player name required";
            }

            if (empty($pesan)) {
                $field_errors['pesan'] = "🚫 PLACE YOUR BET - WRITE A MESSAGE";
                $errors[] = "Message required";
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
                    $success = "🎰 JACKPOT! YOUR MESSAGE HIT THE BIG WIN! 💰";
                    // Reset form values setelah sukses
                    $nama = '';
                    $pesan = '';
                } else {
                    $errors[] = "💥 BUSTED! SYSTEM ERROR - TRY AGAIN";
                }
            }
        }

        // Tampilkan pesan success
        if (!empty($success)) {
            echo '<div class="jackpot-message">';
            echo '🎊 ' . htmlspecialchars($success) . ' 🎊';
            echo '</div>';
        }

        // Tampilkan pesan error global
        $global_errors = array_filter($errors, function($error) {
            return $error !== "Player name required" && $error !== "Message required";
        });
        
        if (!empty($global_errors)) {
            echo '<div class="bust-message">';
            foreach ($global_errors as $error) {
                echo '❌ ' . htmlspecialchars($error) . '<br>';
            }
            echo '</div>';
        }
        ?>

        <!-- Form Input -->
        <div class="playing-card">
            <div class="card-title"> REGIST TABLE - PLACE YOUR MESSAGE</div>
            <form method="POST" action="">
                <div class="form-group">
                    <label class="casino-label">👤 PLAYER NAME:</label>
                    <input type="text" name="nama" 
                           value="<?php echo isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : ''; ?>"
                           placeholder="ENTER YOUR CASINO NAME..."
                           class="casino-input <?php echo !empty($field_errors['nama']) ? 'error' : ''; ?>">
                    <?php if (!empty($field_errors['nama'])): ?>
                        <div class="field-error">🎲 <?php echo htmlspecialchars($field_errors['nama']); ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label class="casino-label">📝 YOUR MESSAGE BET:</label>
                    <textarea name="pesan" 
                              placeholder="PLACE YOUR BET - WRITE YOUR MESSAGE HERE..."
                              class="casino-input <?php echo !empty($field_errors['pesan']) ? 'error' : ''; ?>"><?php echo isset($_POST['pesan']) ? htmlspecialchars($_POST['pesan']) : ''; ?></textarea>
                    <?php if (!empty($field_errors['pesan'])): ?>
                        <div class="field-error">🎯 <?php echo htmlspecialchars($field_errors['pesan']); ?></div>
                    <?php endif; ?>
                </div>

                <button type="submit" class="bet-button">
                    🎯 PLACE BET & SUBMIT
                </button>
            </form>
        </div>

        <!-- Messages Section -->
        <div class="messages-section">
            <div class="roulette-table">
                <div class="section-title">🎲 MESSAGE ROULETTE 🎲</div>
                
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
                        
                        foreach ($entries as $index => $entry) {
                            $entry = trim($entry);
                            if (!empty($entry) && strpos($entry, '=== PESAN TAMU ===') !== false) {
                                $has_messages = true;
                                
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
                                ?>
                                <div class="message-slot" style="animation-delay: <?php echo $index * 0.1; ?>s">
                                    <div class="message-header">
                                        <div class="player-name">♠ <?php echo htmlspecialchars($nama); ?> ♠</div>
                                        <div class="bet-time">⏰ <?php echo htmlspecialchars($waktu); ?></div>
                                    </div>
                                    <div class="player-message">
                                        <?php echo htmlspecialchars($pesan); ?>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        
                        if (!$has_messages) {
                            echo '<div class="empty-table">';
                            echo '<div style="font-size: 4rem; margin-bottom: 20px;">🎴</div>';
                            echo '<h3>NO BETS PLACED YET</h3>';
                            echo '<p>The table is empty - be the first to place your bet!</p>';
                            echo '</div>';
                        }
                    } else {
                        echo '<div class="empty-table">';
                        echo '<div style="font-size: 4rem; margin-bottom: 20px;">🎴</div>';
                        echo '<h3>NO BETS PLACED YET</h3>';
                        echo '<p>The table is empty - be the first to place your bet!</p>';
                        echo '</div>';
                    }
                } else {
                    echo '<div class="empty-table">';
                    echo '<div style="font-size: 4rem; margin-bottom: 20px;">🎴</div>';
                    echo '<h3>NO BETS PLACED YET</h3>';
                    echo '<p>The table is empty - be the first to place your bet!</p>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>

    <script>
        // Casino sound effects and interactions
        document.addEventListener('DOMContentLoaded', function() {
            // Add chip spinning animation
            const chips = document.querySelectorAll('.poker-chips');
            chips.forEach((chip, index) => {
                chip.style.animation = `chipSpin ${3 + index}s linear infinite`;
            });

            // Button click effects
            const betButton = document.querySelector('.bet-button');
            if (betButton) {
                betButton.addEventListener('click', function(e) {
                    // Visual feedback
                    this.style.animation = 'jackpotFlash 0.3s ease-in-out';
                    setTimeout(() => {
                        this.style.animation = '';
                    }, 300);
                    
                    // Casino sound simulation
                    console.log('🎰 *rolling sounds* 🎲');
                });
            }

            // Input focus with casino flair
            const inputs = document.querySelectorAll('.casino-input');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'scale(1.02)';
                    this.style.background = 'white';
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'scale(1)';
                    if (!this.classList.contains('error')) {
                        this.style.background = 'rgba(255,255,255,0.9)';
                    }
                });
            });

            // Auto-remove success message with casino style
            const successMsg = document.querySelector('.jackpot-message');
            if (successMsg) {
                setTimeout(() => {
                    successMsg.style.opacity = '0';
                    successMsg.style.transform = 'translateY(-20px)';
                    successMsg.style.transition = 'all 0.5s ease';
                    setTimeout(() => successMsg.remove(), 500);
                }, 5000);
            }

            // Roulette effect for new messages
            const messageSlots = document.querySelectorAll('.message-slot');
            messageSlots.forEach((slot, index) => {
                slot.addEventListener('mouseenter', function() {
                    this.style.transform = 'scale(1.05) rotate(1deg)';
                    this.style.boxShadow = '0 0 20px var(--casino-gold)';
                });
                
                slot.addEventListener('mouseleave', function() {
                    this.style.transform = 'scale(1) rotate(0deg)';
                    this.style.boxShadow = 'none';
                });
            });
        });

        // Dice roll effect on page load
        window.addEventListener('load', function() {
            const diceRoll = ['⚀', '⚁', '⚂', '⚃', '⚄', '⚅'];
            const randomDice = diceRoll[Math.floor(Math.random() * diceRoll.length)];
            console.log(`🎲 Welcome to Casino Guestbook! Dice roll: ${randomDice} 🎲`);
        });

        // Add some casino ambiance
        function casinoAmbiance() {
            const sounds = ['*slot machine sounds*', '*chip stacking*', '*dealer voice*', '*roulette wheel*'];
            const randomSound = sounds[Math.floor(Math.random() * sounds.length)];
            console.log(`🎰 Casino Ambiance: ${randomSound} 🎭`);
        }

        // Run ambiance every 30 seconds
        setInterval(casinoAmbiance, 30000);
        casinoAmbiance(); // Run immediately
    </script>
</body>
</html>