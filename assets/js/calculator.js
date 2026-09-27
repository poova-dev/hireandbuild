/**
 * [CLIENT NAME] - House Construction Cost Calculator Engine
 * Grounded in 2026 Chennai procurement rates & exact formulas
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
  headroom: { name: 'Headroom (150 sq ft)', price: 350000, desc: '150 sqft terrace headroom access' },
  wastewater: { name: 'Waste Water Recycling Tank', price: 85000, desc: 'Greywater separation & recycling unit' },
  oht: { name: 'Overhead Concrete Tank (2,000 L)', price: 36000, desc: 'Reinforced concrete overhead storage' },
  compound: { name: 'Compound Wall (120 rft)', price: 216000, desc: '5ft height brick perimeter wall' },
  sump: { name: 'Underground Sump (6,000 L)', price: 132000, desc: 'Waterproofed RCC underground water sump' },
  solar: { name: 'Solar Panels (1 kW system)', price: 75000, desc: 'Grid-connected rooftop solar installation' },
  gate: { name: 'Main Gate (Designer MS / Sliding)', price: 65000, desc: 'Heavy gauge steel entrance gate' },
  cctv: { name: 'CCTV & Security System (4 Cams)', price: 45000, desc: 'HD cameras with remote mobile app viewing' },
  automation: { name: 'Smart Home Automation Package', price: 120000, desc: 'Smart lighting, fan modules & digital door lock' },
  septic: { name: 'Conventional Septic Tank (4,000 L)', price: 64000, desc: 'Underground sanitary tank with soak pit' },
  lift: { name: 'Passenger Lift (4 Persons)', price: 450000, desc: 'Automatic passenger elevator with shaft framework' }
};

const PHASES = [
  { name: 'Foundation & Excavation', pct: 0.20 },
  { name: 'RCC Structure & Columns', pct: 0.13 },
  { name: 'Masonry & Block Work', pct: 0.12 },
  { name: 'Waterproofing & Terrace', pct: 0.06 },
  { name: 'Flooring & Tiling', pct: 0.10 },
  { name: 'Doors & Windows', pct: 0.08 },
  { name: 'Plumbing & Sanitary', pct: 0.07 },
  { name: 'Electrical & Wiring', pct: 0.07 },
  { name: 'Painting & Finishing', pct: 0.08 },
  { name: 'Miscellaneous & Overheads', pct: 0.09 }
];

let state = {
  step: 1,
  plotArea: 800,
  builtUpPerFloor: 800,
  parkingArea: 200,
  floors: 4, // 1: Ground only, 2: G+1, 3: G+2, 4: G+3
  package: 'premium',
  pkgSpecTab: 'structure', // structure, finishes, fittings
  selectedExtras: []
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
    case 2: return 12;
    case 3: return 15;
    case 4: return 18;
    default: return 12;
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
  setText('.disp-far', `Floor Area Ratio (FAR): ${far}`);
  setText('.disp-coverage', `Coverage: ${coverage}%`);

  const parkingCars = Math.round(state.parkingArea / 200);
  const parkingRate = 2350; // standard benchmark parking rate
  const parkingCost = state.parkingArea * parkingRate;
  setText('.disp-parking-rate', `CAR PARKING RATE: ₹${parkingRate.toLocaleString('en-IN')}/sqft (${RATES[state.package].name})`);
  setText('.disp-parking-calc', `${state.parkingArea} sqft = ~${parkingCars} car${parkingCars > 1 ? 's' : ''} = ${formatLakhs(parkingCost)}`);

  // 3. Step 2 Floor Cards Active States
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
  const totalBuiltUp = state.builtUpPerFloor * state.floors;
  const rate = activePkgObj.rate;
  const baseCost = totalBuiltUp * rate;

  let extrasTotal = 0;
  state.selectedExtras.forEach(key => {
    if (EXTRAS_CATALOG[key]) extrasTotal += EXTRAS_CATALOG[key].price;
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

  // 6. Report View Rendering
  setText('#report-grand-total', formatINR(grandTotal));
  setText('#report-base-rate', `₹${rate.toLocaleString('en-IN')}/sqft`);
  setText('#report-builtup-area', `${totalBuiltUp.toLocaleString('en-IN')} sqft`);
  setText('#report-plot-area', `${state.plotArea.toLocaleString('en-IN')} sqft`);
  setText('#report-config-name', getFloorConfigName(state.floors));
  setText('#report-duration-text', `${durationMonths} months`);
  setText('#report-pkg-specs', activePkgObj.specsSummary);

  // Extras text
  const extrasListStr = state.selectedExtras.length > 0 
    ? state.selectedExtras.map(k => EXTRAS_CATALOG[k].name).join(', ')
    : 'None';
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
  renderPhases(grandTotal);

  // Render All Packages Comparison Cards
  renderAllPackagesSideBySide(totalBuiltUp, durationMonths);
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

function renderPhases(grandTotal) {
  const tableBody = document.getElementById('report-phases-table');
  const barContainer = document.getElementById('report-phases-bar');

  if (tableBody) {
    tableBody.innerHTML = PHASES.map(p => {
      const amt = Math.round(grandTotal * p.pct);
      return `
        <tr class="border-b border-slate-100 hover:bg-slate-50 transition-colors">
          <td class="py-2.5 px-4 font-semibold text-slate-800 text-xs sm:text-sm">${p.name}</td>
          <td class="py-2.5 px-4 text-xs sm:text-sm text-slate-600 text-center">${(p.pct * 100).toFixed(0)}%</td>
          <td class="py-2.5 px-4 font-bold text-slate-900 text-xs sm:text-sm text-right">${formatINR(amt)}</td>
        </tr>
      `;
    }).join('');
  }

  if (barContainer) {
    const colors = [
      '#FF5E14', '#E85D04', '#F59E0B', '#10B981', '#06B6D4',
      '#3B82F6', '#6366F1', '#8B5CF6', '#EC4899', '#64748B'
    ];
    barContainer.innerHTML = PHASES.map((p, i) => `
      <div style="width: ${p.pct * 100}%; background-color: ${colors[i % colors.length]};" title="${p.name}: ${(p.pct * 100).toFixed(0)}%" class="h-4 transition-all"></div>
    `).join('');
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
      <div class="rounded-2xl p-5 border-2 transition-all flex flex-col justify-between ${isPick ? 'border-orange-500 bg-orange-50/40 ring-2 ring-orange-500/20 shadow-md relative' : 'border-slate-200 bg-white'}">
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
        <button type="button" class="btn-switch-pkg mt-4 w-full py-2 rounded-xl text-xs font-bold transition-colors ${isPick ? 'bg-orange-600 text-white' : 'bg-slate-100 text-slate-700 hover:bg-slate-200'}" data-pkg="${tKey}">
          ${isPick ? 'Selected Package' : 'Select Package'}
        </button>
      </div>
    `;
  }).join('');

  // Attach button events
  document.querySelectorAll('.btn-switch-pkg').forEach(btn => {
    btn.addEventListener('click', (e) => {
      state.package = btn.getAttribute('data-pkg');
      renderUI();
    });
  });
}

function setText(selector, val) {
  document.querySelectorAll(selector).forEach(el => {
    el.textContent = val;
  });
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

  // Step 4 Extras checkboxes
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
