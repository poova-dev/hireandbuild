# Replica Architects & Builders - Turnkey House Construction Web Platform

A production-grade web platform and interactive Construction Cost Calculator modeled after modern residential builders, branded for **Replica Architects & Builders** in Pattukkottai, Tamil Nadu.

---

## 🌟 Tech Stack Specification

| Component | Technology | Description |
|---|---|---|
| **Frontend Project (Root)** | HTML5 + Tailwind CSS + JavaScript | Modern responsive design with Tailwind CDN, video hero, and PDF-cloned interactive calculator |
| **Backend Project (`hireandbuildphp/`)** | PHP + MySQL + Tailwind | Full standalone modular PHP web app ready for Apache / XAMPP / Hostinger |
| **Database** | MySQL | Complete schema for leads, estimates, site visits, and admin panel |
| **Server** | Apache / XAMPP → Hostinger | Standard LAMP/Hostinger stack with `.htaccess` and routing |
| **Forms** | PHP + AJAX | Asynchronous submission with toast notifications and MySQL persistence |
| **Admin Panel** | PHP + MySQL + Tailwind | Secure dashboard to track inquiries, estimates, and project requests |
| **SEO** | Server-side rendered HTML + Schema | Complete OpenGraph, Twitter Cards, and JSON-LD structured data |
| **Images/Media** | Cloudinary + Local SVG/Media | Architectural video hero background + modern vector icons |

---

## 📂 Project Structure

This repository contains **two complete projects**:

### 1. Root Directory: Pure Static HTML5 / CSS / JS Frontend
```
├── index.html                      # Homepage with Cloudinary video hero, live stats, FAQs
├── packages.html                   # Construction packages & 40+ item comparison matrix
├── calculator.html                 # 4-Step interactive cost calculator (cloned from PDF) & printable report
├── services.html                   # Turnkey services & 12-stage construction process
├── projects.html                   # Portfolio with filterable Pattukkottai project cards
├── about.html                      # Company story, 15-year warranty, Er. Vikash Quaid & Ar. Sanjana
├── contact.html                    # Contact channels & free site visit booking
└── assets/                         # Shared CSS, JS & vector images
    ├── css/custom.css
    ├── js/main.js & calculator.js
    └── images/
```

### 2. `hireandbuildphp/`: Standalone PHP + MySQL Application
```
hireandbuildphp/
├── index.php / packages.php / calculator.php / services.php / projects.php / about.php / contact.php
├── includes/                       # Modular PHP Components (header, footer, config, db, schema)
├── api/                            # AJAX Form Handlers (contact.php, estimate.php, site-visit.php)
├── admin/                          # Administrative Dashboard (index.php, leads.php, estimates.php)
├── database/schema.sql             # Complete MySQL schema & seed data (Pattukkottai localized)
└── assets/                         # Local asset bundle
```

---

## 🚀 Getting Started

### Local Static Preview
```bash
python3 -m http.server 8088
```
Navigate to `http://localhost:8088`.

### Apache / XAMPP / Hostinger Deployment
1. Import `database/schema.sql` into MySQL / phpMyAdmin.
2. Update database credentials in `includes/config.php`.
3. Point your virtual host or Hostinger document root to this directory.
4. Access Admin Panel at `/admin/` (Default: `admin@replica.com` / `Admin@2026`).
