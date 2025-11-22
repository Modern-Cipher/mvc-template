<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>

    <header class="main-header">
        <div class="header-content">
            <a href="/" class="header-brand">
                <img src="/assets/images/moderncipher/mc.png" alt="MC Logo" class="header-logo">
                <h2 class="header-title">MODERN CIPHER</h2>
            </a>
        </div>
    </header>

    <div class="main-wrapper">
        <div class="container">
            <h1 class="main-title">WELCOME</h1>
            <p class="sub-title">Your Custom MVC Framework is running smoothly.</p>

            <div class="status-box">
                <div class="status-item">
                    <span class="status-label">ACTIVE TIMEZONE</span>
                    <span class="status-value"><?= date_default_timezone_get(); ?></span>
                </div>
                
                <div class="status-divider"></div>

                <div class="status-item">
                    <span class="status-label">SERVER TIME</span>
                    <span id="live-clock" class="status-value time-display">
                        <?= date('F j, Y - g:i:s A'); ?>
                    </span>
                </div>
                
                <p class="status-note">Synced with Database Time</p>
            </div>
        </div>
    </div>

    <footer class="branding-footer">
        <span class="footer-text">DEVELOPED BY MODERN CIPHER</span>
        <img src="/assets/images/moderncipher/mc.png" alt="Modern Cipher Logo" class="footer-logo">
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var serverTime = <?= time() * 1000 ?>; 
            function updateClock() {
                serverTime += 1000;
                var date = new Date(serverTime);
                var options = { 
                    year: 'numeric', month: 'long', day: 'numeric',
                    hour: 'numeric', minute: '2-digit', second: '2-digit', 
                    hour12: true 
                };
                document.getElementById('live-clock').innerHTML = date.toLocaleString('en-US', options).replace(' at', ' -');
            }
            setInterval(updateClock, 1000);
        });
    </script>

</body>
</html>