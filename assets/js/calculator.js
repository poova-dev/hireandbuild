/**
 * Replica Architects & Builders - House Construction Cost Calculator Engine
 * Grounded in 2026 Pattukkottai & Tamil Nadu procurement rates & exact formulas
 */

const RATES = {
  basic: {
    rate: 1999,
    name: 'Basic',
    tag: 'Budget-Friendly',
    steel: 'Any ISI Brand',
    cement: 'Zuari / Chettinad',
    mix: 'M20',
    depth: 'Upto 3 ft',
    ceiling: '9.5 ft',
    structuralDesign: false,
    soilTesting: false,
    antiTermite: false,
    tiles: '₹50/sqft',
    bedroomTiles: 'Ceramic basic',
    intPaint: 'Asian Tractor',
    extPaint: 'White Cement',
    waterproofing: false,
    design3D: false,
    mainDoor: 'Basic Flush',
    windows: 'MS Grills',
    staircase: 'MS basic',
    wiring: 'Orbit',
    switches: 'Anchor Roma',
    automation: false,
    cp: 'Basic chrome',
    sanitary: 'Parryware Basic',
    rainShower: false,
    specsSummary: 'Basic (₹1,999/sq ft): Any ISI steel & cement, M20 RCC, Ceramic tiles, Flush doors, Asian Tractor paint'
  },
  standard: {
    rate: 2299,
    name: 'Standard',
    tag: 'Standard',
    steel: 'ARS Steel',
    cement: 'Zuari / Chettinad',
    mix: 'M20',
    depth: 'Upto 3 ft',
    ceiling: '9.5 ft',
    structuralDesign: false,
    soilTesting: false,
    antiTermite: false,
    tiles: '₹50/sqft',
    bedroomTiles: 'Ceramic',
    intPaint: 'Asian Tractor',
    extPaint: 'Asian Ace',
    waterproofing: true,
    design3D: false,
    mainDoor: 'Malaysian Teak',
    windows: '2-track UPVC',
    staircase: 'MS painted',
    wiring: 'Orbit',
    switches: 'Anchor Roma',
    automation: false,
    cp: 'Hindware',
    sanitary: 'Parryware',
    rainShower: false,
    specsSummary: 'Standard (₹2,299/sq ft): ARS steel, M20 RCC, Waterproofing included, 2-track UPVC windows, Malaysian teak door'
  },
  premium: {
    rate: 2649,
    name: 'Premium',
    tag: 'Best Value / Your Pick',
    steel: 'iSteel',
    cement: 'Ramco / Dalmia',
    mix: 'M20',
    depth: 'Upto 4 ft',
    ceiling: '10 ft',
    structuralDesign: true,
    soilTesting: true,
    antiTermite: false,
    tiles: '₹90/sqft',
    bedroomTiles: 'Vitrified',
    intPaint: 'Asian Premium',
    extPaint: 'Apex Emulsion',
    waterproofing: true,
    design3D: '3D Elevation',
    mainDoor: 'First Quality Teak',
    windows: '3-track UPVC + Mesh',
    staircase: 'SS / MS design',
    wiring: 'Finolex',
    switches: 'Legrand',
    automation: false,
    cp: 'Parryware',
    sanitary: 'Parryware Prem.',
    rainShower: true,
    specsSummary: 'Premium (₹2,649/sq ft): ISI-certified steel & cement, M20 RCC, Dr. Fixit waterproofing, UPVC windows, Rainwater harvesting, 10 ft ceilings, Granite staircase, Soil testing included'
  },
  luxury: {
    rate: 2999,
    name: 'Luxury',
    tag: 'Top Tier',
    steel: 'TATA Tiscon',
    cement: 'UltraTech',
    mix: 'M25',
    depth: 'Upto 5 ft',
    ceiling: '10 ft',
    structuralDesign: true,
    soilTesting: true,
    antiTermite: true,
    tiles: '₹150/sqft',
    bedroomTiles: 'Premium Vitrified',
    intPaint: 'Nerolac Royale',
    extPaint: 'Premium Waterproof',
    waterproofing: true,
    design3D: 'Full Interior + 3D',
    mainDoor: 'Custom Teak Designer',
    windows: 'Aluminium + Mesh',
    staircase: 'SS premium design',
    wiring: 'Havells / KEI',
    switches: 'Schneider / Modular',
    automation: true,
    cp: 'Jaquar / Kohler',
    sanitary: 'Jaquar / Kohler',
    rainShower: true,
    specsSummary: 'Luxury (₹2,999/sq ft): TATA Tiscon steel, UltraTech cement, M25 RCC mix, 100% Teak doors, Jaquar/Kohler sanitary, Full 3D interior design, Anti-termite treatment'
  }
};

const EXTRAS_CATALOG = {
  headroom: { name: 'Headroom (200 sq ft)', isHeadroom: true, sqft: 200, desc: 'Adds 200 sq ft to total built-up area' },
  wastewater: { name: 'Waste Water Recycling Tank', price: 180000, desc: 'Alternative to septic tank' },
  oht: { name: 'Overhead Concrete Tank (per litre)', price: 36000, rateNote: '₹55/litre', desc: 'Overhead RCC tank (2,000L standard)' },
  compound: { name: 'Compound Wall (per rft)', price: 216000, rateNote: '₹2,750/rft', desc: '5ft height solid brick perimeter wall' },
  sump: { name: 'Underground Sump (per litre)', price: 132000, rateNote: '₹40/litre', desc: 'Waterproofed RCC underground water sump (6,000L standard)' },
  solar: { name: 'Solar Panels (3kW)', price: 150000, desc: '3kW grid-connected rooftop solar installation' },
  gate: { name: 'Main Gate (MS / Sliding)', price: 125000, desc: 'Heavy gauge steel entrance sliding gate' },
  cctv: { name: 'CCTV & Security System', price: 30000, desc: '8-channel HD cameras with remote mobile app' },
  automation: { name: 'Smart Home Automation', price: 20000, desc: 'Smart lighting, fan modules & digital door lock' },
  septic: { name: 'Conventional Septic Tank (per litre)', price: 66500, rateNote: '₹35/litre', desc: 'Underground sanitary tank with soak pit' },
  lift: { name: 'Lift (4 Passengers)', price: 300000, desc: 'Automatic passenger elevator with shaft framework' }
};

const PHASES = [
  { name: 'Foundation & Excavation', pct: 0.20, color: '#FF5E14' },
  { name: 'RCC Structure & Columns', pct: 0.13, color: '#E85D04' },
  { name: 'Masonry & Block Work', pct: 0.12, color: '#F59E0B' },
  { name: 'Waterproofing & Terrace', pct: 0.06, color: '#10B981' },
  { name: 'Flooring & Tiling', pct: 0.10, color: '#06B6D4' },
  { name: 'Doors & Windows', pct: 0.08, color: '#3B82F6' },
  { name: 'Plumbing & Sanitary', pct: 0.07, color: '#6366F1' },
  { name: 'Electrical & Wiring', pct: 0.07, color: '#8B5CF6' },
  { name: 'Painting & Finishing', pct: 0.08, color: '#EC4899' },
  { name: 'Miscellaneous & Overheads', pct: 0.09, color: '#64748B' }
];

let state = {
  step: 1,
  plotArea: 800,
  builtUpPerFloor: 800,
  parkingArea: 200,
  floors: 2, // 1: Ground only, 2: G+1, 3: G+2, 4: G+3
  package: 'premium',
  pkgSpecTab: 'structure', // structure, finishes, fittings
  selectedExtras: ['septic'] // Default matching PDF sample
};

// Utilities
function formatINR(val) {
  if (isNaN(val)) return '₹0';
  return '₹' + Math.round(val).toLocaleString('en-IN');
}

function formatLakhs(val) {
  if (isNaN(val)) return '₹0 L';
  const lakhs = val / 100000;
  if (lakhs >= 100) {
    const cr = val / 10000000;
    return `₹${cr.toFixed(2)} Cr`;
  }
  return `₹${lakhs.toFixed(2)} L`;
}

function calculateEMI(principal, annualRate = 7.1, tenureYears = 20) {
  const r = annualRate / 12 / 100;
  const n = tenureYears * 12;
  const emi = (principal * r * Math.pow(1 + r, n)) / (Math.pow(1 + r, n) - 1);
  return Math.round(emi);
}

function getDurationMonths(floors) {
  switch (floors) {
    case 1: return 8;
    case 2: return 10;
    case 3: return 14;
    case 4: return 18;
    default: return 10;
  }
}

function getFloorConfigName(floors) {
  switch (floors) {
    case 1: return 'Ground Floor Only (1 Floor)';
    case 2: return 'G+1 (2 Floors)';
    case 3: return 'G+2 (3 Floors)';
    case 4: return 'G+3 (4 Floors)';
    default: return `G+${floors-1} (${floors} Floors)`;
  }
}

function getExtraPrice(key, currentPkgRate) {
  const item = EXTRAS_CATALOG[key];
  if (!item) return 0;
  if (item.isHeadroom) {
    return item.sqft * currentPkgRate;
  }
  return item.price || 0;
}

function renderFloorVisual(floors) {
  const preview = document.getElementById('floor-visual-preview');
  const badge = document.getElementById('floor-visual-badge');
  const title = document.getElementById('floor-visual-title');
  const timeline = document.getElementById('floor-visual-timeline');

  if (!preview) return;

  const configs = {
    1: {
      badge: 'G',
      title: 'Ground Floor Only',
      timeline: '~7-8 months total',
      svg: `<svg viewBox="0 0 160 140" class="w-36 h-32" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M80 18L130 52H30L80 18Z" fill="#F97316"/>
        <rect x="42" y="52" width="76" height="54" rx="3" fill="#FFF7ED" stroke="#F97316" stroke-width="3"/>
        <rect x="70" y="74" width="20" height="32" rx="2" fill="#EA580C"/>
        <circle cx="85" cy="90" r="1.5" fill="#FFFFFF"/>
        <rect x="48" y="62" width="16" height="16" rx="2" fill="#FED7AA" stroke="#F97316" stroke-width="1.5"/>
        <rect x="96" y="62" width="16" height="16" rx="2" fill="#FED7AA" stroke="#F97316" stroke-width="1.5"/>
        <path d="M20 106H140" stroke="#CBD5E1" stroke-width="4" stroke-linecap="round"/>
      </svg>`
    },
    2: {
      badge: 'G+1',
      title: 'G+1 (2 Floors)',
      timeline: '~10 months total',
      svg: `<svg viewBox="0 0 160 140" class="w-36 h-32" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M80 12L130 40H30L80 12Z" fill="#F97316"/>
        <rect x="44" y="40" width="72" height="34" rx="2" fill="#FFEDD5" stroke="#F97316" stroke-width="2.5"/>
        <rect x="52" y="47" width="14" height="14" rx="2" fill="#FDBA74"/>
        <rect x="94" y="47" width="14" height="14" rx="2" fill="#FDBA74"/>
        <rect x="73" y="45" width="14" height="29" fill="#EA580C" opacity="0.8"/>
        <rect x="42" y="74" width="76" height="36" rx="2" fill="#FFF7ED" stroke="#F97316" stroke-width="3"/>
        <rect x="70" y="82" width="20" height="28" rx="2" fill="#EA580C"/>
        <rect x="48" y="82" width="16" height="16" rx="2" fill="#FED7AA" stroke="#F97316" stroke-width="1.5"/>
        <rect x="96" y="82" width="16" height="16" rx="2" fill="#FED7AA" stroke="#F97316" stroke-width="1.5"/>
        <path d="M20 110H140" stroke="#CBD5E1" stroke-width="4" stroke-linecap="round"/>
      </svg>`
    },
    3: {
      badge: 'G+2',
      title: 'G+2 (3 Floors)',
      timeline: '~12-14 months total',
      svg: `<svg viewBox="0 0 160 140" class="w-36 h-32" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M80 8L130 30H30L80 8Z" fill="#F97316"/>
        <rect x="44" y="30" width="72" height="26" rx="1.5" fill="#FED7AA" stroke="#F97316" stroke-width="2"/>
        <rect x="52" y="34" width="12" height="12" rx="1" fill="#FB923C"/>
        <rect x="96" y="34" width="12" height="12" rx="1" fill="#FB923C"/>
        <rect x="44" y="56" width="72" height="26" rx="1.5" fill="#FFEDD5" stroke="#F97316" stroke-width="2"/>
        <rect x="52" y="60" width="12" height="12" rx="1" fill="#FDBA74"/>
        <rect x="96" y="60" width="12" height="12" rx="1" fill="#FDBA74"/>
        <rect x="42" y="82" width="76" height="30" rx="2" fill="#FFF7ED" stroke="#F97316" stroke-width="2.5"/>
        <rect x="71" y="88" width="18" height="24" rx="2" fill="#EA580C"/>
        <rect x="48" y="88" width="14" height="14" rx="1.5" fill="#FED7AA" stroke="#F97316" stroke-width="1"/>
        <rect x="98" y="88" width="14" height="14" rx="1.5" fill="#FED7AA" stroke="#F97316" stroke-width="1"/>
        <path d="M20 112H140" stroke="#CBD5E1" stroke-width="4" stroke-linecap="round"/>
      </svg>`
    },
    4: {
      badge: 'G+3',
      title: 'G+3 (4 Floors)',
      timeline: '~16-18 months total',
      svg: `<svg viewBox="0 0 160 140" class="w-36 h-32" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M80 6L130 24H30L80 6Z" fill="#F97316"/>
        <rect x="46" y="24" width="68" height="22" rx="1" fill="#FDBA74" stroke="#F97316" stroke-width="1.8"/>
        <rect x="53" y="27" width="10" height="10" rx="1" fill="#EA580C"/>
        <rect x="97" y="27" width="10" height="10" rx="1" fill="#EA580C"/>
        <rect x="46" y="46" width="68" height="22" rx="1" fill="#FED7AA" stroke="#F97316" stroke-width="1.8"/>
        <rect x="53" y="49" width="10" height="10" rx="1" fill="#FB923C"/>
        <rect x="97" y="49" width="10" height="10" rx="1" fill="#FB923C"/>
        <rect x="46" y="68" width="68" height="22" rx="1" fill="#FFEDD5" stroke="#F97316" stroke-width="1.8"/>
        <rect x="53" y="71" width="10" height="10" rx="1" fill="#FDBA74"/>
        <rect x="97" y="71" width="10" height="10" rx="1" fill="#FDBA74"/>
        <rect x="42" y="90" width="76" height="26" rx="2" fill="#FFF7ED" stroke="#F97316" stroke-width="2.5"/>
        <rect x="71" y="95" width="18" height="21" rx="2" fill="#EA580C"/>
        <rect x="48" y="95" width="12" height="12" rx="1" fill="#FED7AA" stroke="#F97316" stroke-width="1"/>
        <rect x="100" y="95" width="12" height="12" rx="1" fill="#FED7AA" stroke="#F97316" stroke-width="1"/>
        <path d="M20 116H140" stroke="#CBD5E1" stroke-width="4" stroke-linecap="round"/>
      </svg>`
    }
  };

  const conf = configs[floors] || configs[2];
  preview.innerHTML = conf.svg;
  if (badge) badge.textContent = conf.badge;
  if (title) title.textContent = conf.title;
  if (timeline) timeline.textContent = conf.timeline;
}

function renderUI() {
  // 1. Step Navigation Tabs & Panels
  document.querySelectorAll('.calc-wizard-step').forEach(panel => {
    const s = parseInt(panel.getAttribute('data-step'));
    if (s === state.step) {
      panel.classList.remove('hidden');
    } else {
      panel.classList.add('hidden');
    }
  });

  // Breadcrumbs
  document.querySelectorAll('.wizard-node').forEach(node => {
    const s = parseInt(node.getAttribute('data-node'));
    const circle = node.querySelector('.node-circle');
    const label = node.querySelector('.node-label');

    if (s === state.step) {
      circle.className = 'node-circle w-9 h-9 rounded-full bg-orange-600 text-white font-black text-sm flex items-center justify-center ring-4 ring-orange-100 shadow-md';
      circle.textContent = s;
      if (label) label.className = 'node-label text-xs font-bold text-orange-600 mt-1.5 uppercase';
    } else if (s < state.step) {
      circle.className = 'node-circle w-9 h-9 rounded-full bg-emerald-600 text-white font-bold text-sm flex items-center justify-center';
      circle.innerHTML = '&#10003;';
      if (label) label.className = 'node-label text-xs font-semibold text-slate-700 mt-1.5 uppercase';
    } else {
      circle.className = 'node-circle w-9 h-9 rounded-full bg-slate-100 text-slate-400 font-semibold text-sm border-2 border-slate-200 flex items-center justify-center';
      circle.textContent = s;
      if (label) label.className = 'node-label text-xs font-medium text-slate-400 mt-1.5 uppercase';
    }
  });

  // 2. Step 1 Metric Conversions
  const plotGaj = (state.plotArea / 9).toFixed(1);
  const plotCents = (state.plotArea / 435.6).toFixed(3);
  const builtUpGaj = (state.builtUpPerFloor / 9).toFixed(1);
  const builtUpCents = (state.builtUpPerFloor / 435.6).toFixed(3);
  const far = state.plotArea > 0 ? (state.builtUpPerFloor / state.plotArea).toFixed(2) : '1.00';
  const coverage = state.plotArea > 0 ? Math.round((state.builtUpPerFloor / state.plotArea) * 100) : 100;

  const elPlotArea = document.getElementById('input-plot-area');
  if (elPlotArea && parseInt(elPlotArea.value) !== state.plotArea) elPlotArea.value = state.plotArea;

  const elBuiltUp = document.getElementById('input-builtup-floor');
  if (elBuiltUp && parseInt(elBuiltUp.value) !== state.builtUpPerFloor) elBuiltUp.value = state.builtUpPerFloor;

  const elParking = document.getElementById('input-parking-area');
  if (elParking && parseInt(elParking.value) !== state.parkingArea) elParking.value = state.parkingArea;

  // Set unit text displays
  setText('.disp-plot-sqft', `${state.plotArea} sqft`);
  setText('.disp-plot-gaj', `${plotGaj} gaj`);
  setText('.disp-plot-cents', `${plotCents} cents`);

  setText('.disp-builtup-sqft', `${state.builtUpPerFloor} sqft`);
  setText('.disp-builtup-gaj', `${builtUpGaj} gaj`);
  setText('.disp-builtup-cents', `${builtUpCents} cents`);
  setText('.disp-far', `Floor Area Ratio (FAR) ${far} Coverage ${coverage}%`);
  setText('.disp-coverage', `Coverage: ${coverage}%`);

  const parkingCars = state.parkingArea === 0 ? 0 : Math.max(1, Math.round(state.parkingArea / 175));
  const parkingRate = 2350; // benchmark parking rate
  const parkingCost = state.parkingArea * parkingRate;
  setText('.disp-parking-rate', `+ ₹1,500/sqft (Premium)`);
  setText('.disp-parking-sqft', `${state.parkingArea} sqft`);
  setText('.disp-parking-spaces', state.parkingArea === 0 ? '0 cars' : `~${parkingCars} car${parkingCars > 1 ? 's' : ''}`);
  setText('.disp-parking-cost', state.parkingArea === 0 ? '₹0' : formatLakhs(parkingCost));
  setText('.disp-parking-calc', `${state.parkingArea} sqft = ~${parkingCars} car${parkingCars > 1 ? 's' : ''} = ${formatLakhs(parkingCost)}`);

  // Active states for Plot & Builtup & Parking Preset Buttons
  document.querySelectorAll('.plot-preset-btn').forEach(btn => {
    if (parseInt(btn.getAttribute('data-val')) === state.plotArea) {
      btn.className = 'plot-preset-btn px-3 py-1.5 rounded-lg border border-orange-500 bg-orange-50 text-xs font-bold text-orange-600 transition-all';
    } else {
      btn.className = 'plot-preset-btn px-3 py-1.5 rounded-lg border border-slate-200 bg-slate-50 text-xs font-bold text-slate-700 hover:border-orange-500 hover:text-orange-600 transition-all';
    }
  });

  document.querySelectorAll('.builtup-preset-btn').forEach(btn => {
    if (parseInt(btn.getAttribute('data-val')) === state.builtUpPerFloor) {
      btn.className = 'builtup-preset-btn px-3 py-1.5 rounded-lg border border-orange-500 bg-orange-50 text-xs font-bold text-orange-600 transition-all';
    } else {
      btn.className = 'builtup-preset-btn px-3 py-1.5 rounded-lg border border-slate-200 bg-slate-50 text-xs font-bold text-slate-700 hover:border-orange-500 hover:text-orange-600 transition-all';
    }
  });

  document.querySelectorAll('.parking-preset-btn').forEach(btn => {
    if (parseInt(btn.getAttribute('data-val')) === state.parkingArea) {
      btn.className = 'parking-preset-btn px-3 py-1.5 rounded-lg border border-orange-500 bg-orange-50 text-xs font-bold text-orange-600 transition-all';
    } else {
      btn.className = 'parking-preset-btn px-3 py-1.5 rounded-lg border border-slate-200 bg-slate-50 text-xs font-bold text-slate-700 hover:border-orange-500 hover:text-orange-600 transition-all';
    }
  });

  // 3. Step 2 Floor Cards Active States & Visual Illustration
  renderFloorVisual(state.floors);

  document.querySelectorAll('.floor-card-opt').forEach(card => {
    const f = parseInt(card.getAttribute('data-floor'));
    if (f === state.floors) {
      card.classList.add('border-orange-500', 'bg-orange-50/60', 'ring-2', 'ring-orange-500/20');
      card.classList.remove('border-slate-200', 'bg-white');
    } else {
      card.classList.remove('border-orange-500', 'bg-orange-50/60', 'ring-2', 'ring-orange-500/20');
      card.classList.add('border-slate-200', 'bg-white');
    }
  });

  // 4. Step 3 Package Cards & Interactive Tabs
  document.querySelectorAll('.pkg-tier-opt').forEach(card => {
    const pkg = card.getAttribute('data-pkg');
    if (pkg === state.package) {
      card.classList.add('border-orange-500', 'bg-orange-50/50', 'ring-2', 'ring-orange-500/20');
      card.classList.remove('border-slate-200', 'bg-white');
    } else {
      card.classList.remove('border-orange-500', 'bg-orange-50/50', 'ring-2', 'ring-orange-500/20');
      card.classList.add('border-slate-200', 'bg-white');
    }
  });

  // Update Package Interactive Detail Box
  const activePkgObj = RATES[state.package];
  setText('#active-pkg-title', activePkgObj.name);
  setText('#active-pkg-price', `₹${activePkgObj.rate.toLocaleString('en-IN')}`);
  renderPackageSpecs(activePkgObj);

  // 5. Calculations
  const rate = activePkgObj.rate;
  const totalBuiltUp = state.builtUpPerFloor * state.floors;
  const baseCost = totalBuiltUp * rate;

  // Step 4: Dynamic Headroom calculation & Card active highlights
  const elHeadroomDisp = document.getElementById('extra-disp-headroom');
  if (elHeadroomDisp) {
    const headroomCost = 200 * rate;
    elHeadroomDisp.innerHTML = `200 sq ft &times; ₹${rate.toLocaleString('en-IN')}/sqft = ${formatINR(headroomCost)}`;
  }

  document.querySelectorAll('.extra-card-label').forEach(label => {
    const key = label.getAttribute('data-extra-key');
    const isSelected = state.selectedExtras.includes(key);
    const cb = label.querySelector('.extra-cb-opt');
    if (cb) cb.checked = isSelected;
    if (isSelected) {
      label.classList.add('border-orange-500', 'bg-orange-50/40', 'ring-2', 'ring-orange-500/20', 'shadow-sm');
      label.classList.remove('border-slate-200', 'bg-white');
    } else {
      label.classList.remove('border-orange-500', 'bg-orange-50/40', 'ring-2', 'ring-orange-500/20', 'shadow-sm');
      label.classList.add('border-slate-200', 'bg-white');
    }
  });

  let extrasTotal = 0;
  state.selectedExtras.forEach(key => {
    extrasTotal += getExtraPrice(key, rate);
  });

  const grandTotal = baseCost + extrasTotal;
  const durationMonths = getDurationMonths(state.floors);
  const monthlyOutflow = Math.round(grandTotal / durationMonths);
  const emiVal = calculateEMI(grandTotal, 7.1, 20);

  // Material calculations (for totalBuiltUp)
  const cementMin = Math.round(totalBuiltUp * 0.40);
  const cementMax = Math.round(totalBuiltUp * 0.45);
  const steelMin = Math.round(totalBuiltUp * 3.5);
  const steelMax = Math.round(totalBuiltUp * 4.0);
  const msandMin = Math.round(totalBuiltUp * 1.8);
  const msandMax = Math.round(totalBuiltUp * 2.0);
  const aggMin = Math.round(totalBuiltUp * 1.2);
  const aggMax = Math.round(totalBuiltUp * 1.4);
  const bricksMin = Math.round(totalBuiltUp * 18);
  const bricksMax = Math.round(totalBuiltUp * 20);

  // Floor-wise distribution:
  // Foundation is 20% of base cost, allocated to Ground floor
  const foundationCost = baseCost * 0.20;
  const superstructureCost = baseCost * 0.80;
  const perFloorSuperstructure = superstructureCost / state.floors;
  const groundFloorTotal = foundationCost + perFloorSuperstructure;

  // 6. Report View Rendering - Page 1
  setText('#report-grand-total', formatINR(grandTotal));
  setText('#report-base-rate', `₹${rate.toLocaleString('en-IN')}/sqft`);
  setText('#report-builtup-area', `${totalBuiltUp.toLocaleString('en-IN')} sqft`);
  setText('#report-plot-area', `${state.plotArea.toLocaleString('en-IN')} sqft`);
  setText('#report-config-name', getFloorConfigName(state.floors));
  setText('#report-duration-text', `${durationMonths} months`);
  setText('#report-pkg-specs', activePkgObj.specsSummary);

  // Timeline bar milestone pin
  const pin = document.getElementById('report-duration-pin');
  if (pin) {
    const pct = Math.min(95, Math.max(5, (durationMonths / 24) * 100));
    pin.style.left = `${pct}%`;
  }

  // Dynamic Date in Report Header
  const dateEl = document.getElementById('report-date-edition');
  if (dateEl) {
    const now = new Date();
    const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    const dateStr = `${now.getDate()} ${months[now.getMonth()]} ${now.getFullYear()}`;
    dateEl.textContent = `${dateStr} • 2026 Estimate Edition`;
  }

  // Extras text
  const extrasListStr = state.selectedExtras.length > 0 
    ? state.selectedExtras.map(k => {
        const item = EXTRAS_CATALOG[k];
        const p = getExtraPrice(k, rate);
        return `${item.name} (${formatINR(p)})`;
      }).join(' • ')
    : 'None selected';
  setText('#report-extras-summary', extrasListStr);

  // Financial Cards
  setText('#rep-base-cost', formatLakhs(baseCost));
  setText('#rep-addons-cost', formatINR(extrasTotal));
  setText('#rep-emi-cost', `₹${emiVal.toLocaleString('en-IN')}/mo`);
  setText('#rep-outflow-cost', `${formatLakhs(monthlyOutflow)}/mo`);
  setText('#rep-outflow-sub', `over ${durationMonths} months`);

  // Floor-wise Text
  let floorWiseHtml = `Ground floor: <strong>${formatLakhs(groundFloorTotal)}</strong> &mdash; Includes the foundation and plinth share (20% of the package)`;
  for (let fl = 1; fl < state.floors; fl++) {
    const floorLabel = fl === 1 ? 'First floor' : fl === 2 ? 'Second floor' : 'Third floor';
    floorWiseHtml += ` | ${floorLabel}: <strong>${formatLakhs(perFloorSuperstructure)}</strong> &mdash; Same package rate, without the foundation share`;
  }
  const elFloorWise = document.getElementById('report-floorwise-text');
  if (elFloorWise) elFloorWise.innerHTML = floorWiseHtml;

  // Material text
  const materialHtml = `For ${totalBuiltUp.toLocaleString('en-IN')} sq ft: Cement ${cementMin.toLocaleString()}-${cementMax.toLocaleString()} bags; Steel ${steelMin.toLocaleString()}-${steelMax.toLocaleString()} kg; M-sand ${msandMin.toLocaleString()}-${msandMax.toLocaleString()} cft; Aggregate ${aggMin.toLocaleString()}-${aggMax.toLocaleString()} cft; Bricks (or AAC equivalent) ${bricksMin.toLocaleString()}-${bricksMax.toLocaleString()} nos`;
  setText('#report-material-text', materialHtml);

  // Render Cost Distribution Table & Bars
  renderPhases(baseCost, grandTotal, rate);

  // Render All Packages Comparison Cards & Pricing Table on Page 2
  renderAllPackagesSideBySide(totalBuiltUp, durationMonths);
  renderPackagesPricingTable(totalBuiltUp, durationMonths);

  // Render Page 3 Specification Matrix Table
  renderSpecMatrixTable();
}

function renderPackageSpecs(pkg) {
  const container = document.getElementById('pkg-specs-content');
  if (!container) return;

  if (state.pkgSpecTab === 'structure') {
    container.innerHTML = `
      <ul class="space-y-2 text-xs text-slate-700">
        <li class="flex items-center gap-2"><strong class="text-slate-900 w-32">Steel Brand:</strong> ${pkg.steel}</li>
        <li class="flex items-center gap-2"><strong class="text-slate-900 w-32">Cement Brand:</strong> ${pkg.cement}</li>
        <li class="flex items-center gap-2"><strong class="text-slate-900 w-32">RCC Mix Grade:</strong> ${pkg.mix}</li>
        <li class="flex items-center gap-2"><strong class="text-slate-900 w-32">Basement Depth:</strong> ${pkg.depth}</li>
        <li class="flex items-center gap-2"><strong class="text-slate-900 w-32">Ceiling Height:</strong> ${pkg.ceiling}</li>
        <li class="flex items-center gap-2"><strong class="text-slate-900 w-32">Soil Testing:</strong> ${pkg.soilTesting ? 'Included (Laboratory test)' : 'Optional'}</li>
      </ul>
    `;
  } else if (state.pkgSpecTab === 'finishes') {
    container.innerHTML = `
      <ul class="space-y-2 text-xs text-slate-700">
        <li class="flex items-center gap-2"><strong class="text-slate-900 w-32">Living/Dining:</strong> Vitrified (${pkg.tiles})</li>
        <li class="flex items-center gap-2"><strong class="text-slate-900 w-32">Bedroom Flooring:</strong> ${pkg.bedroomTiles}</li>
        <li class="flex items-center gap-2"><strong class="text-slate-900 w-32">Interior Wall Paint:</strong> ${pkg.intPaint} (2 coats putty + primer)</li>
        <li class="flex items-center gap-2"><strong class="text-slate-900 w-32">Exterior Wall Paint:</strong> ${pkg.extPaint}</li>
        <li class="flex items-center gap-2"><strong class="text-slate-900 w-32">Waterproofing:</strong> ${pkg.waterproofing ? 'Dr. Fixit 2-Coat System' : 'Standard Cement Slurry'}</li>
      </ul>
    `;
  } else {
    container.innerHTML = `
      <ul class="space-y-2 text-xs text-slate-700">
        <li class="flex items-center gap-2"><strong class="text-slate-900 w-32">Main Entrance:</strong> ${pkg.mainDoor}</li>
        <li class="flex items-center gap-2"><strong class="text-slate-900 w-32">Windows:</strong> ${pkg.windows}</li>
        <li class="flex items-center gap-2"><strong class="text-slate-900 w-32">Electrical Wiring:</strong> ${pkg.wiring} (Fire Retardant)</li>
        <li class="flex items-center gap-2"><strong class="text-slate-900 w-32">Modular Switches:</strong> ${pkg.switches}</li>
        <li class="flex items-center gap-2"><strong class="text-slate-900 w-32">Sanitary & CP:</strong> ${pkg.sanitary} / ${pkg.cp}</li>
      </ul>
    `;
  }
}

function renderPhases(baseCost, grandTotal, currentRate) {
  const tableBody = document.getElementById('report-phases-table');
  const barContainer = document.getElementById('report-phases-bar');
  const summaryGrid = document.getElementById('report-phases-summary-grid');

  // Multi-color distribution bar on Page 1
  if (barContainer) {
    barContainer.innerHTML = PHASES.map(p => `
      <div style="width: ${p.pct * 100}%; background-color: ${p.color};" title="${p.name}: ${(p.pct * 100).toFixed(0)}%" class="h-4 transition-all"></div>
    `).join('');
  }

  // Summary preview pills under bar on Page 1
  if (summaryGrid) {
    summaryGrid.innerHTML = PHASES.map(p => {
      const amt = Math.round(baseCost * p.pct);
      return `
        <div class="p-2 rounded-xl bg-slate-50 border border-slate-200/80">
          <div class="flex items-center gap-1.5">
            <span class="w-2 h-2 rounded-full" style="background-color: ${p.color};"></span>
            <span class="text-[10px] font-bold text-slate-500">${(p.pct * 100).toFixed(0)}%</span>
          </div>
          <div class="text-[11px] font-bold text-slate-800 truncate mt-0.5" title="${p.name}">${p.name}</div>
          <div class="text-[10px] text-slate-500 font-semibold">${formatLakhs(amt)}</div>
        </div>
      `;
    }).join('');
  }

  // Complete Itemized Table on Page 2 (Matching PDF Page 2)
  if (tableBody) {
    let rowsHtml = '';

    // 10 Construction Phases
    PHASES.forEach(p => {
      const amt = Math.round(baseCost * p.pct);
      rowsHtml += `
        <tr class="border-b border-slate-100 hover:bg-slate-50/80 transition-colors">
          <td class="py-2.5 px-4 font-semibold text-slate-800 text-xs sm:text-sm flex items-center gap-2">
            <span class="w-2.5 h-2.5 rounded-full shrink-0" style="background-color: ${p.color};"></span>
            <span>${p.name}</span>
          </td>
          <td class="py-2.5 px-4 text-xs sm:text-sm text-slate-600 text-center font-bold">${(p.pct * 100).toFixed(0)}%</td>
          <td class="py-2.5 px-4 font-bold text-slate-900 text-xs sm:text-sm text-right">${formatINR(amt)}</td>
        </tr>
      `;
    });

    // Optional Car Parking Row (if set)
    if (state.parkingArea > 0) {
      const parkingCost = state.parkingArea * 2350;
      rowsHtml += `
        <tr class="border-b border-slate-100 bg-slate-50/50 hover:bg-slate-50 transition-colors">
          <td class="py-2.5 px-4 font-semibold text-slate-800 text-xs sm:text-sm flex items-center gap-2">
            <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 shrink-0"></span>
            <span>Car Parking &mdash; Ground Floor (${state.parkingArea} sqft @ ₹2,350/sqft)</span>
          </td>
          <td class="py-2.5 px-4 text-xs sm:text-sm text-slate-500 text-center italic">incl.</td>
          <td class="py-2.5 px-4 font-bold text-slate-900 text-xs sm:text-sm text-right">${formatINR(parkingCost)}</td>
        </tr>
      `;
    }

    // Selected Optional Extras Rows
    state.selectedExtras.forEach(k => {
      const item = EXTRAS_CATALOG[k];
      if (item) {
        const itemPrice = getExtraPrice(k, currentRate);
        rowsHtml += `
          <tr class="border-b border-slate-100 bg-orange-50/30 hover:bg-orange-50/50 transition-colors">
            <td class="py-2.5 px-4 font-semibold text-slate-800 text-xs sm:text-sm flex items-center gap-2">
              <span class="w-2.5 h-2.5 rounded-full bg-orange-500 shrink-0"></span>
              <span>${item.name} <span class="text-[10px] text-slate-400 font-normal">(${item.desc})</span></span>
            </td>
            <td class="py-2.5 px-4 text-xs sm:text-sm text-orange-600 text-center font-bold">Extra</td>
            <td class="py-2.5 px-4 font-bold text-orange-600 text-xs sm:text-sm text-right">${formatINR(itemPrice)}</td>
          </tr>
        `;
      }
    });

    // Grand Total Row
    rowsHtml += `
      <tr class="bg-orange-50 border-t-2 border-orange-500 font-black text-slate-900 text-sm sm:text-base">
        <td class="py-3 px-4 text-orange-700 font-black uppercase tracking-wider">Grand Total</td>
        <td class="py-3 px-4 text-center text-orange-700 font-black">100%</td>
        <td class="py-3 px-4 text-right text-orange-600 font-black text-base sm:text-lg">${formatINR(grandTotal)}</td>
      </tr>
    `;

    tableBody.innerHTML = rowsHtml;
  }
}

function renderAllPackagesSideBySide(totalBuiltUp, durationMonths) {
  const container = document.getElementById('report-packages-compare');
  if (!container) return;

  const tiers = ['basic', 'standard', 'premium', 'luxury'];
  container.innerHTML = tiers.map(tKey => {
    const obj = RATES[tKey];
    const tCost = totalBuiltUp * obj.rate;
    const tEmi = calculateEMI(tCost, 7.1, 20);
    const isPick = tKey === state.package;

    return `
      <div class="rounded-2xl p-5 border-2 transition-all flex flex-col justify-between ${isPick ? 'border-orange-500 bg-orange-50/40 ring-2 ring-orange-500/20 shadow-md relative' : 'border-slate-200 bg-white hover:border-slate-300'}">
        ${isPick ? '<div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-orange-600 text-white text-[10px] font-black uppercase px-2.5 py-0.5 rounded-full shadow">YOUR PICK</div>' : ''}
        <div class="space-y-3">
          <div>
            <div class="text-[10px] uppercase font-bold text-slate-400 tracking-wider">${obj.tag}</div>
            <div class="text-xl font-black text-slate-900">${obj.name}</div>
            <div class="text-xs font-bold text-orange-600 mt-0.5">₹${obj.rate.toLocaleString('en-IN')} / sqft</div>
          </div>
          <div class="p-3 rounded-xl bg-white border border-slate-100 shadow-sm space-y-1">
            <div class="text-[11px] text-slate-500">Estimated Total</div>
            <div class="text-lg font-black text-slate-900">${formatLakhs(tCost)}</div>
            <div class="text-[10px] text-slate-500">EMI: ~₹${tEmi.toLocaleString('en-IN')}/mo</div>
          </div>
          <ul class="text-[11px] text-slate-600 space-y-1.5 pt-2">
            <li>&bull; Steel: ${obj.steel}</li>
            <li>&bull; Cement: ${obj.cement}</li>
            <li>&bull; RCC Mix: ${obj.mix}</li>
            <li>&bull; Flooring: ${obj.tiles}</li>
            <li>&bull; Timeline: ~${durationMonths} months</li>
          </ul>
        </div>
        <button type="button" class="btn-switch-pkg mt-4 w-full py-2 rounded-xl text-xs font-bold transition-colors ${isPick ? 'bg-orange-600 text-white shadow' : 'bg-slate-100 text-slate-700 hover:bg-slate-200'}" data-pkg="${tKey}">
          ${isPick ? 'Selected Package' : 'Select Package'}
        </button>
      </div>
    `;
  }).join('');

  // Attach button events
  document.querySelectorAll('.btn-switch-pkg').forEach(btn => {
    btn.addEventListener('click', () => {
      state.package = btn.getAttribute('data-pkg');
      renderUI();
    });
  });
}

function renderPackagesPricingTable(totalBuiltUp, durationMonths) {
  const table = document.getElementById('report-packages-table');
  if (!table) return;

  const basicCost = totalBuiltUp * RATES.basic.rate;
  const standardCost = totalBuiltUp * RATES.standard.rate;
  const premiumCost = totalBuiltUp * RATES.premium.rate;
  const luxuryCost = totalBuiltUp * RATES.luxury.rate;

  table.innerHTML = `
    <tr class="hover:bg-slate-50 transition-colors">
      <td class="py-2.5 px-4 font-bold text-slate-900">Rate / sqft</td>
      <td class="py-2.5 px-4 text-center">₹1,999</td>
      <td class="py-2.5 px-4 text-center">₹2,299</td>
      <td class="py-2.5 px-4 text-center bg-orange-50 font-black text-orange-600">₹2,649</td>
      <td class="py-2.5 px-4 text-center">₹2,999</td>
    </tr>
    <tr class="hover:bg-slate-50 transition-colors">
      <td class="py-2.5 px-4 font-bold text-slate-900">Est. Total Cost</td>
      <td class="py-2.5 px-4 text-center">${formatLakhs(basicCost)}</td>
      <td class="py-2.5 px-4 text-center">${formatLakhs(standardCost)}</td>
      <td class="py-2.5 px-4 text-center bg-orange-50 font-black text-orange-600">${formatLakhs(premiumCost)}</td>
      <td class="py-2.5 px-4 text-center">${formatLakhs(luxuryCost)}</td>
    </tr>
    <tr class="hover:bg-slate-50 transition-colors">
      <td class="py-2.5 px-4 font-bold text-slate-900">Monthly EMI (20yr)</td>
      <td class="py-2.5 px-4 text-center">₹${calculateEMI(basicCost, 7.1, 20).toLocaleString('en-IN')}</td>
      <td class="py-2.5 px-4 text-center">₹${calculateEMI(standardCost, 7.1, 20).toLocaleString('en-IN')}</td>
      <td class="py-2.5 px-4 text-center bg-orange-50 font-black text-orange-600">₹${calculateEMI(premiumCost, 7.1, 20).toLocaleString('en-IN')}</td>
      <td class="py-2.5 px-4 text-center">₹${calculateEMI(luxuryCost, 7.1, 20).toLocaleString('en-IN')}</td>
    </tr>
    <tr class="hover:bg-slate-50 transition-colors">
      <td class="py-2.5 px-4 font-bold text-slate-900">Duration</td>
      <td class="py-2.5 px-4 text-center">~${durationMonths} months</td>
      <td class="py-2.5 px-4 text-center">~${durationMonths} months</td>
      <td class="py-2.5 px-4 text-center bg-orange-50 font-black text-orange-600">~${durationMonths} months</td>
      <td class="py-2.5 px-4 text-center">~${durationMonths} months</td>
    </tr>
  `;
}

function renderSpecMatrixTable() {
  const table = document.getElementById('report-spec-matrix-table');
  if (!table) return;

  const checkSvg = `<span class="inline-flex items-center justify-center w-5 h-5 rounded-full bg-emerald-100 text-emerald-600 font-bold text-xs" title="Included">&#10003;</span>`;
  const crossSvg = `<span class="inline-flex items-center justify-center w-5 h-5 rounded-full bg-slate-100 text-slate-400 font-bold text-xs" title="Not Included">&#10005;</span>`;

  const b = RATES.basic;
  const s = RATES.standard;
  const p = RATES.premium;
  const l = RATES.luxury;

  const matrixData = [
    {
      category: 'STRUCTURE',
      rows: [
        { label: 'Steel Brand', b: b.steel, s: s.steel, p: p.steel, l: l.steel },
        { label: 'Cement Brand', b: b.cement, s: s.cement, p: p.cement, l: l.cement },
        { label: 'RCC Mix Grade', b: b.mix, s: s.mix, p: p.mix, l: l.mix },
        { label: 'Basement Depth', b: b.depth, s: s.depth, p: p.depth, l: l.depth },
        { label: 'Ceiling Height', b: b.ceiling, s: s.ceiling, p: p.ceiling, l: l.ceiling },
        { label: 'Structural Design', b: crossSvg, s: crossSvg, p: checkSvg, l: checkSvg },
        { label: 'Soil Testing', b: crossSvg, s: crossSvg, p: checkSvg, l: checkSvg },
        { label: 'Anti-Termite Treatment', b: crossSvg, s: crossSvg, p: crossSvg, l: checkSvg }
      ]
    },
    {
      category: 'FINISHES',
      rows: [
        { label: 'Living/Dining Tiles', b: b.tiles, s: s.tiles, p: p.tiles, l: l.tiles },
        { label: 'Bedroom Tiles', b: b.bedroomTiles, s: s.bedroomTiles, p: p.bedroomTiles, l: l.bedroomTiles },
        { label: 'Interior Paint', b: b.intPaint, s: s.intPaint, p: p.intPaint, l: l.intPaint },
        { label: 'Exterior Paint', b: b.extPaint, s: s.extPaint, p: p.extPaint, l: l.extPaint },
        { label: 'Waterproofing', b: crossSvg, s: checkSvg, p: checkSvg, l: checkSvg },
        { label: '3D Design', b: crossSvg, s: crossSvg, p: '3D Elevation', l: 'Full Interior + 3D' }
      ]
    },
    {
      category: 'DOORS & WINDOWS',
      rows: [
        { label: 'Main Door', b: b.mainDoor, s: s.mainDoor, p: p.mainDoor, l: l.mainDoor },
        { label: 'Windows', b: b.windows, s: s.windows, p: p.windows, l: l.windows },
        { label: 'Staircase Railing', b: b.staircase, s: s.staircase, p: p.staircase, l: l.staircase }
      ]
    },
    {
      category: 'ELECTRICAL',
      rows: [
        { label: 'Wiring Brand', b: b.wiring, s: s.wiring, p: p.wiring, l: l.wiring },
        { label: 'Switches Brand', b: b.switches, s: s.switches, p: p.switches, l: l.switches },
        { label: 'Home Automation', b: crossSvg, s: crossSvg, p: crossSvg, l: 'Full Automation' }
      ]
    },
    {
      category: 'PLUMBING & SANITARY',
      rows: [
        { label: 'CP Fittings', b: b.cp, s: s.cp, p: p.cp, l: l.cp },
        { label: 'Sanitary Ware', b: b.sanitary, s: s.sanitary, p: p.sanitary, l: l.sanitary },
        { label: 'Rain Shower', b: crossSvg, s: crossSvg, p: checkSvg, l: checkSvg }
      ]
    }
  ];

  let html = '';
  matrixData.forEach(cat => {
    html += `
      <tr class="bg-slate-100 font-extrabold text-slate-800 text-[11px] uppercase tracking-wider">
        <td colspan="5" class="py-2.5 px-4">${cat.category}</td>
      </tr>
    `;
    cat.rows.forEach(r => {
      html += `
        <tr class="hover:bg-slate-50/70 border-b border-slate-100 transition-colors">
          <td class="py-2 px-4 font-semibold text-slate-800 text-xs">${r.label}</td>
          <td class="py-2 px-4 text-center text-xs text-slate-600">${r.b}</td>
          <td class="py-2 px-4 text-center text-xs text-slate-600">${r.s}</td>
          <td class="py-2 px-4 text-center text-xs bg-orange-50/50 font-bold text-orange-700">${r.p}</td>
          <td class="py-2 px-4 text-center text-xs text-slate-600">${r.l}</td>
        </tr>
      `;
    });
  });

  table.innerHTML = html;
}

function setText(selector, val) {
  document.querySelectorAll(selector).forEach(el => {
    el.textContent = val;
  });
}

function showToast(msg, duration = 3000) {
  let toast = document.getElementById('calc-toast-msg');
  if (!toast) {
    toast = document.createElement('div');
    toast.id = 'calc-toast-msg';
    toast.className = 'fixed bottom-24 left-1/2 -translate-x-1/2 bg-slate-900 text-white font-bold text-xs sm:text-sm px-6 py-3 rounded-full shadow-2xl z-50 transition-all opacity-0 pointer-events-none transform translate-y-2 border border-slate-700';
    document.body.appendChild(toast);
  }
  toast.textContent = msg;
  toast.classList.remove('opacity-0', 'pointer-events-none', 'translate-y-2');
  toast.classList.add('opacity-100', 'translate-y-0');
  setTimeout(() => {
    toast.classList.remove('opacity-100', 'translate-y-0');
    toast.classList.add('opacity-0', 'pointer-events-none', 'translate-y-2');
  }, duration);
}

function downloadPDFReport() {
  const reportEl = document.getElementById('printable-estimate-report');
  if (!reportEl) return;

  const btnTop = document.getElementById('btn-download-pdf-top');
  const btnBottom = document.getElementById('btn-download-pdf-bottom');
  const originalTopHtml = btnTop ? btnTop.innerHTML : '';
  const originalBottomHtml = btnBottom ? btnBottom.innerHTML : '';

  const loadingHtml = `
    <svg class="animate-spin w-4 h-4 text-white" fill="none" viewBox="0 0 24 24">
      <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
      <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
    </svg>
    <span>Generating PDF...</span>
  `;

  if (btnTop) btnTop.innerHTML = loadingHtml;
  if (btnBottom) btnBottom.innerHTML = loadingHtml;

  showToast('Generating 4-page detailed estimate PDF...', 2500);

  if (typeof html2pdf !== 'undefined') {
    const opt = {
      margin: [8, 8, 8, 8],
      filename: `House-Construction-Cost-Estimate-${state.package.toUpperCase()}-2026.pdf`,
      image: { type: 'jpeg', quality: 0.98 },
      html2canvas: { scale: 2, useCORS: true, letterRendering: true, logging: false },
      jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' },
      pagebreak: { mode: ['css', 'legacy'] }
    };

    html2pdf().set(opt).from(reportEl).save().then(() => {
      if (btnTop) btnTop.innerHTML = originalTopHtml;
      if (btnBottom) btnBottom.innerHTML = originalBottomHtml;
      showToast('Estimate PDF downloaded successfully!', 4000);
    }).catch(err => {
      console.warn('html2pdf generation error, falling back to print:', err);
      if (btnTop) btnTop.innerHTML = originalTopHtml;
      if (btnBottom) btnBottom.innerHTML = originalBottomHtml;
      window.print();
    });
  } else {
    if (btnTop) btnTop.innerHTML = originalTopHtml;
    if (btnBottom) btnBottom.innerHTML = originalBottomHtml;
    window.print();
  }
}

function shareEstimate() {
  const grandTotalText = document.getElementById('report-grand-total')?.textContent || '';
  const shareTitle = 'House Construction Cost Estimate 2026 - Replica Architects & Builders';
  const shareText = `Check out my house construction cost estimate: ${grandTotalText} for Pattukkottai / Tamil Nadu.`;
  const shareUrl = window.location.href;

  if (navigator.share) {
    navigator.share({
      title: shareTitle,
      text: shareText,
      url: shareUrl
    }).catch(() => {});
  } else {
    navigator.clipboard.writeText(shareUrl).then(() => {
      showToast('Estimate link copied to clipboard!');
    }).catch(() => {
      showToast('Estimate URL ready to copy: ' + shareUrl);
    });
  }
}

function resetToStep1() {
  state.step = 1;
  renderUI();
  const topEl = document.getElementById('calc-container-top');
  if (topEl) {
    topEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
  }
  const elPlot = document.getElementById('input-plot-area');
  if (elPlot) elPlot.focus();
}

function initCalculator() {
  // Inputs
  const elPlot = document.getElementById('input-plot-area');
  if (elPlot) {
    elPlot.addEventListener('input', (e) => {
      state.plotArea = parseInt(e.target.value) || 0;
      renderUI();
    });
  }

  const elBuiltUp = document.getElementById('input-builtup-floor');
  if (elBuiltUp) {
    elBuiltUp.addEventListener('input', (e) => {
      state.builtUpPerFloor = parseInt(e.target.value) || 0;
      renderUI();
    });
  }

  const elParking = document.getElementById('input-parking-area');
  if (elParking) {
    elParking.addEventListener('input', (e) => {
      state.parkingArea = parseInt(e.target.value) || 0;
      renderUI();
    });
  }

  // Presets in Step 1
  document.querySelectorAll('.plot-preset-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      state.plotArea = parseInt(btn.getAttribute('data-val'));
      renderUI();
    });
  });

  document.querySelectorAll('.builtup-preset-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      state.builtUpPerFloor = parseInt(btn.getAttribute('data-val'));
      renderUI();
    });
  });

  document.querySelectorAll('.parking-preset-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      state.parkingArea = parseInt(btn.getAttribute('data-val'));
      renderUI();
    });
  });

  // Step 2 Floor Cards
  document.querySelectorAll('.floor-card-opt').forEach(card => {
    card.addEventListener('click', () => {
      state.floors = parseInt(card.getAttribute('data-floor'));
      renderUI();
    });
  });

  // Step 3 Package Cards
  document.querySelectorAll('.pkg-tier-opt').forEach(card => {
    card.addEventListener('click', () => {
      state.package = card.getAttribute('data-pkg');
      renderUI();
    });
  });

  // Step 3 Sub-tabs
  document.querySelectorAll('.pkg-spec-tab-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      document.querySelectorAll('.pkg-spec-tab-btn').forEach(b => {
        b.classList.remove('bg-orange-600', 'text-white');
        b.classList.add('bg-slate-100', 'text-slate-600');
      });
      btn.classList.remove('bg-slate-100', 'text-slate-600');
      btn.classList.add('bg-orange-600', 'text-white');
      state.pkgSpecTab = btn.getAttribute('data-tab');
      renderPackageSpecs(RATES[state.package]);
    });
  });

  // Step 4 Extras Checkbox and Card Toggles
  document.querySelectorAll('.extra-cb-opt').forEach(cb => {
    cb.addEventListener('change', () => {
      const key = cb.value;
      if (cb.checked) {
        if (!state.selectedExtras.includes(key)) state.selectedExtras.push(key);
      } else {
        state.selectedExtras = state.selectedExtras.filter(k => k !== key);
      }
      renderUI();
    });
  });

  // Step Navigations
  document.querySelectorAll('.btn-goto-step').forEach(btn => {
    btn.addEventListener('click', () => {
      const targetStep = parseInt(btn.getAttribute('data-target-step'));
      state.step = targetStep;
      renderUI();
      const topEl = document.getElementById('calc-container-top');
      if (topEl) topEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
    });
  });

  document.querySelectorAll('.wizard-node').forEach(node => {
    node.addEventListener('click', () => {
      state.step = parseInt(node.getAttribute('data-node'));
      renderUI();
      const topEl = document.getElementById('calc-container-top');
      if (topEl) topEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
    });
  });

  // Top Actions
  const btnRecalcTop = document.getElementById('btn-recalculate-top');
  if (btnRecalcTop) {
    btnRecalcTop.addEventListener('click', resetToStep1);
  }

  const btnShareTop = document.getElementById('btn-share-top');
  if (btnShareTop) {
    btnShareTop.addEventListener('click', shareEstimate);
  }

  const btnDownloadPdfTop = document.getElementById('btn-download-pdf-top');
  if (btnDownloadPdfTop) {
    btnDownloadPdfTop.addEventListener('click', downloadPDFReport);
  }

  const btnDownloadPdfBottom = document.getElementById('btn-download-pdf-bottom');
  if (btnDownloadPdfBottom) {
    btnDownloadPdfBottom.addEventListener('click', downloadPDFReport);
  }

  // Print button
  const printBtn = document.getElementById('btn-print-report');
  if (printBtn) {
    printBtn.addEventListener('click', () => {
      window.print();
    });
  }

  // Support deep-linking to step via URL query or hash
  const urlParams = new URLSearchParams(window.location.search);
  const stepParam = parseInt(urlParams.get('step'));
  if (stepParam >= 1 && stepParam <= 5) {
    state.step = stepParam;
  } else if (window.location.hash === '#report') {
    state.step = 5;
  }

  // Initial call
  renderUI();
}

document.addEventListener('DOMContentLoaded', initCalculator);
