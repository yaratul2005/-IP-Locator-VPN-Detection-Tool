<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>IP & VPN Detector</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      font-family: "Segoe UI", sans-serif;
      background-color: #0f111a;
      color: #fff;
      margin: 0;
      padding: 40px 20px;
      text-align: center;
    }
    h1 {
      color: #4f90ff;
    }
    .card {
      background-color: #1a1c2c;
      border-radius: 12px;
      padding: 30px;
      max-width: 500px;
      margin: 40px auto;
      box-shadow: 0 0 20px rgba(79, 144, 255, 0.2);
    }
    .info {
      margin: 15px 0;
      font-size: 16px;
    }
    .status-true {
      color: #ff5c5c;
      font-weight: bold;
    }
    .status-false {
      color: #7fff7f;
      font-weight: bold;
    }
    .footer {
      margin-top: 60px;
      font-size: 12px;
      color: #666;
    }
  </style>
</head>
<body>

  <h1>🔍 IP & VPN Detection Tool</h1>
  <div class="card" id="result">
    <p>Loading...</p>
  </div>

  <div class="footer">Made with 💻 in PHP</div>

  <script>
    fetch('backend/ip-checker.php')
      .then(res => res.json())
      .then(data => {
        const { ip, location, vpn_info } = data;

        const html = `
          <div class="info"><strong>IP Address:</strong> ${ip}</div>
          <div class="info"><strong>Country:</strong> ${location.country}</div>
          <div class="info"><strong>Region:</strong> ${location.region}</div>
          <div class="info"><strong>City:</strong> ${location.city}</div>
          <div class="info"><strong>ISP:</strong> ${location.org || vpn_info.organization}</div>
          <div class="info"><strong>Latitude:</strong> ${location.latitude}</div>
          <div class="info"><strong>Longitude:</strong> ${location.longitude}</div>
          <hr>
          <div class="info"><strong>VPN Detected:</strong> <span class="status-${vpn_info.vpn}">${vpn_info.vpn ? 'Yes' : 'No'}</span></div>
          <div class="info"><strong>Proxy Detected:</strong> <span class="status-${vpn_info.proxy}">${vpn_info.proxy ? 'Yes' : 'No'}</span></div>
          <div class="info"><strong>Tor Usage:</strong> <span class="status-${vpn_info.tor}">${vpn_info.tor ? 'Yes' : 'No'}</span></div>
          <div class="info"><strong>Risk Score:</strong> ${vpn_info.risk_score}/100</div>
        `;

        document.getElementById('result').innerHTML = html;
      })
      .catch(() => {
        document.getElementById('result').innerHTML = "<p style='color:red;'>Failed to load data.</p>";
      });
  </script>

</body>
</html>
