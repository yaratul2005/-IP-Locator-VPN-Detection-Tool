# 🌐 IP Locator & VPN Detection Tool

A sleek PHP-based tool to locate a user's IP address, determine their geolocation, and detect VPN/proxy usage in real-time.

![Screenshot](https://ibb.co/MkS8RbKC) <!-- Replace with your own screenshot -->

---

## ✨ Features

- ✅ Detects real public IP address
- 🌍 Shows country, region, city, and coordinates
- 🛰 Displays ISP/organization info
- 🛡️ Detects VPN, Proxy, and Tor usage
- ⚠ Shows risk score (from IPQualityScore)
- 💡 Frontend in modern, minimal UI (Dark Theme)
- 📦 Built with pure PHP and JavaScript – no framework required!

---

## 📁 Project Structure

📦 ip-locator-vpn-tool/
├── backend/
│ ├── utils.php # Get real client IP address
│ ├── geoapi.php # Geolocation via ipinfo.io
│ └── vpncheck.php # VPN/Proxy detection via IPQualityScore
│ └── ip-checker.php # Main API that glues everything
├── index.php # Frontend UI
└── README.md # Documentation


---

## 🚀 How It Works

### 🔧 Backend

- Gets real IP with `utils.php`
- Uses [ipinfo.io](https://ipinfo.io/) for geolocation (accurate & fast)
- Uses [ipqualityscore.com](https://ipqualityscore.com/) to check for VPNs, proxies, and Tor usage

### 🖥️ Frontend

- Written in vanilla HTML/CSS/JS (inside `index.php`)
- Calls `backend/ip-checker.php` via AJAX
- Displays results in a styled, card-based UI

---

## 📦 Requirements

- PHP 7.4+
- Internet connection (for API calls)
- Optional: Replit, Localhost, or cPanel server

---

## 🛠️ Setup Instructions

### 1. 🔑 Get Free API Keys

- **ipinfo.io**
  - Sign up: https://ipinfo.io/signup
  - Paste your key into `backend/geoapi.php`:
    ```php
    const IPINFO_TOKEN = 'your_ipinfo_token';
    ```

- **ipqualityscore.com**
  - Sign up: https://www.ipqualityscore.com/create-account
  - Paste your key into `backend/vpncheck.php`:
    ```php
    const IPQS_API_KEY = 'your_ipqs_key';
    ```

---

### 2. 🛠 Deploy on Replit (or localhost)

#### 👉 On Replit

- Create new **PHP Repl**
- Upload files (`index.php`, `backend/` folder)
- Replace tokens in `geoapi.php` and `vpncheck.php`
- Click **Run** → Visit the preview window

#### 👉 On Localhost (XAMPP/Laragon)

- Place the folder in `htdocs` or `www`
- Visit: `http://localhost/ip-locator-vpn-tool`

#### 👉 On cPanel Shared Hosting

- Upload via File Manager or FTP
- Visit `yourdomain.com/ip-locator-vpn-tool`

---

## 🌈 Preview

IP Address: 8.8.8.8
Country: United States
Region: California
City: Mountain View
ISP: Google LLC
Latitude: 37.4056
Longitude: -122.0775
VPN Detected: No
Proxy Detected: No
Tor Usage: No
Risk Score: 9/100


---

## ⚠️ Notes

- API requests are limited per month (free tiers).
- Risk score is only shown if `ipqualityscore.com` returns it.
- Tor detection may not be 100% accurate for all nodes.
- Works best with real visitors (not VPNed or spoofed Replit sessions).

---

## 📜 License

MIT – free to use, modify, and distribute.

---

## 🙌 Credits

- [IPInfo.io](https://ipinfo.io/)
- [IPQualityScore](https://ipqualityscore.com/)
- Designed & Developed by: **Ratul** 🚀
