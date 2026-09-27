/**
 * Replica Construction - House Construction Cost Calculator Engine
 * Grounded in 2026 Chennai procurement rates & milestone splits
 */

const RATES = {
  basic: { rate: 1999, name: 'Basic', tag: 'Entry Level', steel: 'Any ISI brand (Fe 550D)', cement: 'Any ISI brand', mix: 'M20 RCC', finish: '2x2 Tiles, ISI Emulsion' },
  standard: { rate: 2299, name: 'Standard', tag: 'Best Value', steel: 'ARS Steel (Fe 550D)', cement: 'Zuari / Chettinad', mix: 'M20 RCC', finish: '4x2 Tiles, Dr. Fixit, Asian Tractor' },
  premium: { rate: 2649, name: 'Premium', tag: 'Most Popular', steel: 'iSteel / Tiscon', cement: 'Ramco / Dalmia', mix: 'M20 RCC', finish: 'Granite Stairs, Legrand, Parryware' },
  luxury: { rate: 2999, name: 'Luxury', tag: 'Top Tier', steel: 'Tata Tiscon / JSW', cement: 'UltraTech / Ramco', mix: 'M25 RCC', finish: '6x4 Tiles, Jaquar, Royal Matt, SS Glass' }
};

const EXTRAS_PRICES = {
  sump: 120000,
  oht: 45000,
  compound: 185000,
  septic: 65000,
  solar: 55000,
  gate: 85000,
  cctv: 28000,
  smarthome: 35000,
  lift: 475000
};

const MILESTONES = [
  { no: '01', name: 'Soil Testing, Scheme & Plan Approval', pct: 0.03, time: 'Month 1', desc: 'Site borehole test, structural analysis, CMDA / DTCP sanction filing' },
  { no: '02', name: 'Excavation & Substructure Foundation', pct: 0.15, time: 'Month 1 - 2', desc: 'Earthwork, PCC, isolated/raft footings, plinth beam, anti-termite treatment' },
  { no: '03', name: 'Ground Floor Columns & Roof Slab', pct: 0.12, time: 'Month 2 - 3', desc: 'RCC column raising, shuttering, beam casting, slab curing with M20/M25 mix' },
  { no: '04', name: 'Upper Floors RCC Structure (if any)', pct: 0.15, time: 'Month 3 - 5', desc: 'Repetitive vertical frame construction, staircase RCC casting, lintel bands' },
  { no: '05', name: 'Brickwork & Perimeter Masonry', pct: 0.12, time: 'Month 5 - 6', desc: '9-inch exterior walls, 4.5-inch internal partition walls, window lintel openings' },
  { no: '06', name: 'Internal & External Plastering', pct: 0.08, time: 'Month 6 - 7', desc: 'Two-coat ceiling and wall plastering with chicken mesh corner reinforcement' },
  { no: '07', name: 'Concealed MEP (Plumbing & Electrical)', pct: 0.10, time: 'Month 7 - 8', desc: 'CPVC concealed pipes, electrical conduit routing, distribution board wiring' },
  { no: '08', name: 'Flooring, Bathroom & Kitchen Tiles', pct: 0.10, time: 'Month 8 - 9', desc: 'Vitrified living/dining tiles, anti-skid balcony tiles, granite kitchen countertop' },
  { no: '09', name: 'Interior & Exterior Painting, Fixtures', pct: 0.08, time: 'Month 9 - 10', desc: 'Putty coats, primer, 2 coats emulsion, CP sanitaryware & switch plate installation' },
  { no: '10', name: 'Snag Rectification, Deep Clean & Handover', pct: 0.07, time: 'Month 10 - 11', desc: 'Final engineer snag list audit, written 15-year warranty document, key ceremony' }
];

let calcState = {
  currentStep: 1,
  plotArea: 1200,
  builtUpArea: 1200,
  hasParking: true,
  floors: 2, // G+1 default
  package: 'premium',
  extras: ['sump', 'oht', 'compound']
};

function formatINR(val) {
  if (isNaN(val)) return '₹0';
  return '₹' + Math.round(val).toLocaleString('en-IN');
}

function formatLakhs(val) {
  const lakhs = val / 100000;
  if (lakhs >= 100) {
    const cr = val / 10000000;
    return `₹${cr.toFixed(2)} Cr`;
  }
  return `₹${lakhs.toFixed(2)} Lakhs`;
}

function calculateEMI(principal, annualRate = 7.1, tenureYears = 20) {
  const r = annualRate / 12 / 100;
  const n = tenureYears * 12;
  const emi = (principal * r * Math.pow(1 + r, n)) / (Math.pow(1 + r, n) - 1);
  return Math.round(emi);
}

function updateCalculatorDOM() {
  const plotInput = document.getElementById('calc-plot-area');
  const builtUpInput = document.getElementById('calc-builtup-area');
  const parkingCb = document.getElementById('calc-parking-cb');

  if (plotInput && parseInt(plotInput.value) !== calcState.plotArea) {
    plotInput.value = calcState.plotArea;
  }
  if (builtUpInput && parseInt(builtUpInput.value) !== calcState.builtUpArea) {
    builtUpInput.value = calcState.builtUpArea;
  }

  // Update Floor buttons active state
  document.querySelectorAll('.floor-selector-btn').forEach(btn => {
    const f = parseInt(btn.getAttribute('data-floors'));
    if (f === calcState.floors) {
      btn.classList.add('border-orange-500', 'bg-orange-50/50', 'text-orange-600', 'ring-2', 'ring-orange-500/20');
      btn.classList.remove('border-slate-200', 'bg-white', 'text-slate-700');
    } else {
      btn.classList.remove('border-orange-500', 'bg-orange-50/50', 'text-orange-600', 'ring-2', 'ring-orange-500/20');
      btn.classList.add('border-slate-200', 'bg-white', 'text-slate-700');
    }
  });

  // Update Package cards
  document.querySelectorAll('.calc-pkg-card').forEach(card => {
    const pkg = card.getAttribute('data-pkg');
    if (pkg === calcState.package) {
      card.classList.add('border-orange-500', 'ring-4', 'ring-orange-500/20', 'shadow-lg');
      card.classList.remove('border-slate-200', 'shadow-sm');
      const badge = card.querySelector('.selected-check');
      if (badge) badge.classList.remove('hidden');
    } else {
      card.classList.remove('border-orange-500', 'ring-4', 'ring-orange-500/20', 'shadow-lg');
      card.classList.add('border-slate-200', 'shadow-sm');
      const badge = card.querySelector('.selected-check');
      if (badge) badge.classList.add('hidden');
    }
  });

  // Calculate totals
  const parkingArea = calcState.hasParking ? 200 : 0;
  const totalBuiltUp = (calcState.builtUpArea * calcState.floors) + parkingArea;
  const pkgRate = RATES[calcState.package].rate;
  const baseCost = totalBuiltUp * pkgRate;
  
  let extrasCost = 0;
  calcState.extras.forEach(ext => {
    if (EXTRAS_PRICES[ext]) extrasCost += EXTRAS_PRICES[ext];
  });

  const grandTotal = baseCost + extrasCost;

  // Timeline & Duration
  const durationMap = { 1: '6 - 8 Months', 2: '9 - 11 Months', 3: '12 - 14 Months', 4: '15 - 17 Months' };
  const durationStr = durationMap[calcState.floors] || '10 - 12 Months';

  // Home loan: 80% funding
  const loanPrincipal = grandTotal * 0.8;
  const monthlyEMI = calculateEMI(loanPrincipal, 7.1, 20);

  // Update live stat displays
  const els = {
    totalCost: document.querySelectorAll('.stat-total-cost'),
    totalCostFormatted: document.querySelectorAll('.stat-total-cost-inr'),
    totalBuiltUp: document.querySelectorAll('.stat-builtup-sqft'),
    duration: document.querySelectorAll('.stat-duration'),
    emi: document.querySelectorAll('.stat-emi'),
    pkgName: document.querySelectorAll('.stat-pkg-name'),
    pkgRate: document.querySelectorAll('.stat-pkg-rate'),
    extrasTotal: document.querySelectorAll('.stat-extras-cost'),
    baseCost: document.querySelectorAll('.stat-base-cost')
  };

  els.totalCost.forEach(el => el.textContent = formatLakhs(grandTotal));
  els.totalCostFormatted.forEach(el => el.textContent = formatINR(grandTotal));
  els.totalBuiltUp.forEach(el => el.textContent = totalBuiltUp.toLocaleString('en-IN') + ' sq.ft');
  els.duration.forEach(el => el.textContent = durationStr);
  els.emi.forEach(el => el.textContent = formatINR(monthlyEMI) + ' / mo');
  els.pkgName.forEach(el => el.textContent = RATES[calcState.package].name);
  els.pkgRate.forEach(el => el.textContent = '₹' + pkgRate.toLocaleString('en-IN') + ' / sqft');
  els.extrasTotal.forEach(el => el.textContent = formatINR(extrasCost));
  els.baseCost.forEach(el => el.textContent = formatINR(baseCost));

  // Render Milestones Table & Progress
  const milestoneTable = document.getElementById('milestone-table-body');
  if (milestoneTable) {
    milestoneTable.innerHTML = MILESTONES.map((m, idx) => {
      const stageAmount = Math.round(grandTotal * m.pct);
      return `
        <tr class="border-b border-slate-100 hover:bg-slate-50 transition-colors">
          <td class="py-3 px-4 font-semibold text-slate-800 text-xs sm:text-sm">
            <span class="inline-block w-6 h-6 rounded-full bg-orange-100 text-orange-600 text-center leading-6 text-xs font-bold mr-2">${m.no}</span>
            ${m.name}
            <div class="text-[11px] font-normal text-slate-500 mt-0.5">${m.desc}</div>
          </td>
          <td class="py-3 px-4 text-xs sm:text-sm text-slate-600 text-right whitespace-nowrap">
            <span class="inline-block px-2 py-0.5 rounded bg-slate-100 font-medium text-slate-700 text-xs">${m.time}</span>
          </td>
          <td class="py-3 px-4 text-xs sm:text-sm text-slate-600 text-right whitespace-nowrap font-medium">
            ${(m.pct * 100).toFixed(0)}%
          </td>
          <td class="py-3 px-4 text-xs sm:text-sm font-bold text-slate-900 text-right whitespace-nowrap">
            ${formatINR(stageAmount)}
          </td>
        </tr>
      `;
    }).join('');
  }

  // Update step visual indicator
  document.querySelectorAll('.step-indicator-item').forEach(ind => {
    const s = parseInt(ind.getAttribute('data-step'));
    const circle = ind.querySelector('.step-circle');
    const label = ind.querySelector('.step-label');

    if (s === calcState.currentStep) {
      circle.className = 'step-circle w-9 h-9 rounded-full bg-orange-500 text-white font-bold flex items-center justify-center shadow-lg shadow-orange-500/30 ring-4 ring-orange-100 transition-all';
      if (label) label.className = 'step-label text-xs font-bold text-orange-600 mt-2 tracking-wide uppercase';
    } else if (s < calcState.currentStep) {
      circle.className = 'step-circle w-9 h-9 rounded-full bg-emerald-500 text-white font-bold flex items-center justify-center transition-all';
      circle.innerHTML = `<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>`;
      if (label) label.className = 'step-label text-xs font-semibold text-slate-700 mt-2 tracking-wide uppercase';
    } else {
      circle.className = 'step-circle w-9 h-9 rounded-full bg-slate-100 text-slate-400 font-semibold border-2 border-slate-200 flex items-center justify-center transition-all';
      circle.textContent = s;
      if (label) label.className = 'step-label text-xs font-medium text-slate-400 mt-2 tracking-wide uppercase';
    }
  });

  // Switch visible panels
  document.querySelectorAll('.calc-step-panel').forEach(panel => {
    const pStep = parseInt(panel.getAttribute('data-step-panel'));
    if (pStep === calcState.currentStep) {
      panel.classList.remove('hidden');
    } else {
      panel.classList.add('hidden');
    }
  });
}

function initCalculator() {
  // Input bindings
  const plotInput = document.getElementById('calc-plot-area');
  const builtUpInput = document.getElementById('calc-builtup-area');
  const parkingCb = document.getElementById('calc-parking-cb');

  if (plotInput) {
    plotInput.addEventListener('input', (e) => {
      const v = parseInt(e.target.value) || 0;
      calcState.plotArea = v;
      // Auto-adjust builtUpArea if needed
      if (calcState.builtUpArea > v && v > 0) {
        calcState.builtUpArea = v;
      }
      updateCalculatorDOM();
    });
  }

  if (builtUpInput) {
    builtUpInput.addEventListener('input', (e) => {
      calcState.builtUpArea = parseInt(e.target.value) || 0;
      updateCalculatorDOM();
    });
  }

  if (parkingCb) {
    parkingCb.addEventListener('change', (e) => {
      calcState.hasParking = e.target.checked;
      updateCalculatorDOM();
    });
  }

  // Quick Chips
  document.querySelectorAll('.plot-chip-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      const area = parseInt(btn.getAttribute('data-area'));
      calcState.plotArea = area;
      calcState.builtUpArea = area;
      updateCalculatorDOM();
    });
  });

  // Floors buttons
  document.querySelectorAll('.floor-selector-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      calcState.floors = parseInt(btn.getAttribute('data-floors'));
      updateCalculatorDOM();
    });
  });

  // Package Cards
  document.querySelectorAll('.calc-pkg-card').forEach(card => {
    card.addEventListener('click', () => {
      calcState.package = card.getAttribute('data-pkg');
      updateCalculatorDOM();
    });
  });

  // Extras checkboxes
  document.querySelectorAll('.calc-extra-cb').forEach(cb => {
    cb.addEventListener('change', () => {
      const key = cb.value;
      if (cb.checked) {
        if (!calcState.extras.includes(key)) calcState.extras.push(key);
      } else {
        calcState.extras = calcState.extras.filter(k => k !== key);
      }
      updateCalculatorDOM();
    });
  });

  // Next / Prev step buttons
  document.querySelectorAll('.calc-next-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      if (calcState.currentStep < 4) {
        calcState.currentStep++;
        updateCalculatorDOM();
        const topEl = document.getElementById('calculator-root');
        if (topEl) topEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });

  document.querySelectorAll('.calc-prev-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      if (calcState.currentStep > 1) {
        calcState.currentStep--;
        updateCalculatorDOM();
        const topEl = document.getElementById('calculator-root');
        if (topEl) topEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });

  // Direct Step Node Navigation
  document.querySelectorAll('.step-indicator-item').forEach(ind => {
    ind.addEventListener('click', () => {
      const targetStep = parseInt(ind.getAttribute('data-step'));
      calcState.currentStep = targetStep;
      updateCalculatorDOM();
    });
  });

  // Print Report action
  const printBtn = document.getElementById('calc-print-btn');
  if (printBtn) {
    printBtn.addEventListener('click', () => {
      window.print();
    });
  }

  // Initial render
  updateCalculatorDOM();
}

document.addEventListener('DOMContentLoaded', initCalculator);
