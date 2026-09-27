# Replica Architects & Builders - Turnkey House Construction Web Platform

A production-grade web platform and interactive Construction Cost Calculator modeled after modern residential builders, branded for **Replica Architects & Builders** in Chennai.

---

## 🌟 Tech Stack Specification

| Component | Technology | Description |
|---|---|---|
| **Frontend** | HTML5 + Tailwind CSS + JavaScript | Modern responsive design with Tailwind CDN (no build tools) |
| **Backend** | PHP | Modular architecture ready for Apache / XAMPP / Hostinger |
| **Database** | MySQL | Complete schema for leads, estimates, site visits, and admin panel |
| **Server** | Apache / XAMPP → Hostinger | Standard LAMP/Hostinger stack with `.htaccess` and routing |
| **Forms** | PHP + AJAX | Asynchronous submission with toast notifications and MySQL persistence |
| **Admin Panel** | PHP + MySQL + Tailwind | Secure dashboard to track inquiries, estimates, and project requests |
| **SEO** | Server-side rendered HTML + Schema | Complete OpenGraph, Twitter Cards, and JSON-LD structured data |
| **Images** | Local storage / Cloudinary | Structured asset directories with Cloudinary-ready configuration |

---

## 📂 Project Structure

```
├── index.html / index.php          # Homepage with hero, packages, live stats, FAQs
├── packages.html / packages.php    # Construction packages & 40+ item comparison matrix
├── calculator.html / calculator.php # 5-Step Chennai cost calculator & 3-page PDF estimate
├── services.html / services.php    # Turnkey services & 12-stage construction process
├── projects.html / projects.php    # Portfolio with filterable project cards
├── about.html / about.php          # Company story, 15-year warranty, milestones
├── contact.html / contact.php      # Contact channels & free site visit booking
│
├── includes/                       # Modular PHP Components
│   ├── config.php                  # Database & environment configuration
│   ├── db.php                      # PDO MySQL database connection
│   ├── header.php                  # Reusable SSR header & navigation
│   ├── footer.php                  # Reusable SSR footer & CTAs
│   └── schema.php                  # Dynamic JSON-LD structured schema generator
│
├── api/                            # AJAX Form Handlers
│   ├── contact.php                 # Handle contact form submissions
│   ├── estimate.php                # Save calculator estimates
│   └── site-visit.php              # Handle free site inspection bookings
│
├── admin/                          # Administrative Dashboard
│   ├── index.php                   # Secure login & dashboard overview
│   ├── leads.php                   # Lead management & status updater
│   ├── estimates.php               # Calculator estimates viewer
│   ├── logout.php                  # Session logout
│   └── auth.php                    # Authentication helpers
│
├── database/
│   └── schema.sql                  # Complete MySQL schema & seed data
│
├── assets/
│   ├── css/
│   │   └── custom.css              # Custom styling, print styles, animations
│   ├── js/
│   │   ├── main.js                 # Drawer, accordions, AJAX form handler
│   │   └── calculator.js           # 5-step Chennai cost calculation engine
│   └── images/
│       ├── logo.svg                # Replica Architects & Builders brand mark placeholder
│       └── favicon.svg             # Replica Architects & Builders favicon
│
└── README.md
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
