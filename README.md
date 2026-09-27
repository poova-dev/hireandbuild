# Replica Construction - Turnkey House Construction Web Platform

A multi-page HTML web platform modeled after [hireandbuild.com](https://hireandbuild.com), built with **Tailwind CSS v3 CDN**, modern semantic HTML5, custom SVG branding, responsive layouts, and interactive calculation tools.

---

## 🌟 Key Features

- **Tailwind CSS CDN Architecture**: Pure multi-page static site with zero build dependencies, running on any browser or web server.
- **2026 Chennai Construction Cost Calculator**:
  - Dynamic 4-step wizard (Area → Floors → Package → Estimate)
  - Floor multipliers (G Only, G+1, G+2, G+3) & parking options
  - 9 customizable construction add-on toggles
  - Dynamic 10-phase milestone cash-flow schedule
  - 20-year EMI estimation at 7.1% interest
  - One-click print/PDF report styling
- **Construction Packages & Comparison Matrix**:
  - 4 pricing tiers: Basic (₹1,999/sq.ft), Standard (₹2,299/sq.ft), Premium (₹2,649/sq.ft), Luxury (₹2,999/sq.ft)
  - Interactive "Highlight Differences" toggle
  - 8-category 40+ item specification comparison
- **Turnkey Services Guide**:
  - Visual 12-stage construction process (Soil testing to Grihapravesam key handover)
  - Specialized breakdowns for Residential, Commercial, Architectural Design, Structural Engineering, and CMDA/DTCP Approvals
- **Interactive Projects Portfolio**:
  - Filter tabs (All, Completed, Ongoing Sites, Duplex & Villas, Commercial)
  - Specifications for built-up area, plot size, packages, and handover timelines
  - Founder-led Grihapravesam celebration gallery
- **Company Story & Pillars**:
  - Founder's personal handover guarantee
  - 6 execution pillars (Timelines, fixed BOQ, 350+ audits, daily WhatsApp logs, 15-year warranty, milestone billing)
- **Contact & Free Site Visit Booking**:
  - 4 contact channels (Direct call, WhatsApp, Email, Studio visit)
  - Interactive plot inspection booking form with client-side validation
  - 4-zone service coverage across Chennai

---

## 📂 Project Structure

```
├── index.html          # Homepage with hero lead capture, stats, video modal, and FAQs
├── packages.html       # Construction packages and 8-category comparison matrix
├── calculator.html     # Interactive 4-step house construction cost calculator
├── services.html       # Turnkey construction services & 12-stage process
├── projects.html       # Portfolio with filterable project cards & handover gallery
├── about.html          # Company story, 15-year warranty, and founder's promise
├── contact.html        # Contact channels, office details, and site visit booking
├── assets/
│   ├── css/
│   │   └── custom.css  # Continuous ticker, marquee, card lift, print styles
│   ├── js/
│   │   ├── main.js     # Navigation drawer, sticky header, accordions, modals, forms
│   │   └── calculator.js # Chennai rates calculator engine & milestone table generator
│   └── images/
│       ├── logo.svg    # Custom Replica Construction SVG brand mark
│       └── favicon.svg # Custom browser favicon
├── .gitignore          # Git ignore configuration
└── README.md           # Project documentation
```

---

## 🚀 Getting Started

No build steps, Node.js installations, or bundling required!

### Option 1: Direct File Opening
Double-click `index.html` to open it in any web browser.

### Option 2: Local Web Server
Run with Python:
```bash
python3 -m http.server 8080
```
Then navigate to `http://localhost:8080`.

---

## 📄 License
This project is for demonstration and replica prototyping purposes.
