{{-- resources/views/components/search-bar.blade.php --}}
{{-- Usage: @include('components.search-bar') ou <x-search-bar /> --}}

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;1,400&family=Cormorant+Garamond:wght@300;400;500&display=swap" rel="stylesheet">

<style>
  .andalocy-search-section {
    position: relative;
    width: 100%;
    max-width: 520px;
    margin: 0 auto;
    z-index: 100;
    font-family: 'Cormorant Garamond', serif;
  }

  .andalocy-search-label {
    display: block;
    font-size: 0.75rem;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: #8a7a6a;
    margin-bottom: 10px;
    text-align: center;
  }

  .andalocy-ornament {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 12px;
    justify-content: center;
  }
  .andalocy-ornament-line {
    height: 1px; width: 60px;
    background: linear-gradient(90deg, transparent, #c8b8a4);
  }
  .andalocy-ornament-line.right {
    background: linear-gradient(90deg, #c8b8a4, transparent);
  }
  .andalocy-ornament-diamond {
    width: 6px; height: 6px;
    background: #c1535a;
    transform: rotate(45deg);
  }

  .andalocy-search-wrapper {
    position: relative;
  }

  .andalocy-search-input {
    width: 100%;
    padding: 14px 48px 14px 20px;
    background: rgba(255,255,255,0.88);
    border: 1.5px solid #c8b8a4;
    border-radius: 2px;
    font-family: 'Cormorant Garamond', serif;
    font-size: 1.05rem;
    color: #3a2e26;
    outline: none;
    transition: all 0.3s ease;
    letter-spacing: 0.04em;
  }

  .andalocy-search-input::placeholder {
    color: #b0a090;
    font-style: italic;
  }

  .andalocy-search-input:focus {
    border-color: #c1535a;
    background: #fff;
    box-shadow: 0 4px 24px rgba(193,83,90,0.12);
  }

  .andalocy-search-input.open {
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
    border-bottom-color: transparent;
  }

  .andalocy-search-icon {
    position: absolute;
    right: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: #c1535a;
    pointer-events: none;
  }

  .andalocy-clear-btn {
    position: absolute;
    right: 14px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    cursor: pointer;
    color: #a09080;
    font-size: 14px;
    line-height: 1;
    display: none;
    padding: 2px 4px;
  }
  .andalocy-clear-btn:hover { color: #c1535a; }

  .andalocy-dropdown {
    display: none;
    position: absolute;
    top: 100%;
    left: 0; right: 0;
    background: rgba(255,255,255,0.98);
    border: 1.5px solid #c8b8a4;
    border-top: none;
    border-bottom-left-radius: 2px;
    border-bottom-right-radius: 2px;
    box-shadow: 0 16px 40px rgba(80,50,30,0.14);
    z-index: 200;
    animation: andalocy-drop 0.2s ease;
    max-height: 360px;
    overflow-y: auto;
  }

  @keyframes andalocy-drop {
    from { opacity: 0; transform: translateY(-6px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  .andalocy-dropdown-header {
    padding: 9px 18px;
    border-bottom: 1px solid #ede5db;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .andalocy-dropdown-count {
    font-size: 0.72rem;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    color: #9a8a78;
  }

  .andalocy-dropdown-deco {
    width: 20px; height: 1px;
    background: #c1535a;
  }

  .andalocy-result-item {
    padding: 12px 18px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    cursor: pointer;
    border-bottom: 1px solid #f0e8de;
    transition: background 0.15s;
    gap: 10px;
  }
  .andalocy-result-item:last-child { border-bottom: none; }
  .andalocy-result-item:hover { background: rgba(193,83,90,0.05); }
  .andalocy-result-item:hover .andalocy-result-name { color: #c1535a; }

  .andalocy-result-left {
    display: flex;
    align-items: center;
    gap: 10px;
    flex: 1;
    min-width: 0;
  }

  .andalocy-result-ico {
    width: 30px; height: 30px;
    background: linear-gradient(135deg, #f5ede6, #ead9cc);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
    flex-shrink: 0;
  }

  .andalocy-result-name {
    font-family: 'Playfair Display', serif;
    font-size: 0.93rem;
    color: #3a2e26;
    transition: color 0.15s;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }

  .andalocy-result-cat {
    font-size: 0.7rem;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: #9a8a78;
    margin-top: 2px;
  }

  .andalocy-result-price {
    font-size: 0.9rem;
    color: #c1535a;
    font-weight: 500;
    flex-shrink: 0;
    letter-spacing: 0.04em;
  }

  .andalocy-highlight { color: #c1535a; font-weight: 600; }

  .andalocy-no-results {
    padding: 22px 18px;
    text-align: center;
  }
  .andalocy-no-results p {
    font-family: 'Playfair Display', serif;
    font-size: 0.93rem;
    color: #9a8a78;
    font-style: italic;
  }
  .andalocy-no-results span {
    font-size: 0.72rem;
    color: #b0a090;
    letter-spacing: 0.08em;
    display: block;
    margin-top: 3px;
  }

  .andalocy-hint {
    text-align: center;
    margin-top: 14px;
    font-size: 0.75rem;
    letter-spacing: 0.1em;
    color: #9a8a78;
    font-style: italic;
  }
</style>

<div class="andalocy-search-section" id="andalocy-search-section">
  <label class="andalocy-search-label">Rechercher un parfum</label>

  <div class="andalocy-ornament">
    <div class="andalocy-ornament-line"></div>
    <div class="andalocy-ornament-diamond"></div>
    <div class="andalocy-ornament-line right"></div>
  </div>

  <div class="andalocy-search-wrapper">
    <input
      type="text"
      id="andalocy-input"
      class="andalocy-search-input"
      placeholder="Rose, Oud, Jasmin…"
      autocomplete="off"
    />

    <span class="andalocy-search-icon" id="andalocy-icon">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
           stroke="currentColor" stroke-width="1.8">
        <circle cx="11" cy="11" r="8"/>
        <line x1="21" y1="21" x2="16.65" y2="16.65"/>
      </svg>
    </span>

    <button class="andalocy-clear-btn" id="andalocy-clear" type="button">✕</button>

    <div class="andalocy-dropdown" id="andalocy-dropdown">
      <div class="andalocy-dropdown-header">
        <span class="andalocy-dropdown-count" id="andalocy-count">0 résultats</span>
        <div class="andalocy-dropdown-deco"></div>
      </div>
      <div id="andalocy-results-list"></div>
    </div>
  </div>

  <p class="andalocy-hint">Tapez "rose", "oud", "jasmin"…</p>
</div>

<script>
(function () {
  // ============================================================
  // DONNÉES — Remplace par tes vrais produits ou via API Laravel
  // ============================================================
//   const products = @json($products ?? [
//     ["name" => "Rose de Damas",     "category" => "Eau de Parfum",   "price" => "320 MAD"],
//     ["name" => "Oud Marocain",      "category" => "Huile Parfumée",  "price" => "480 MAD"],
//     ["name" => "Jasmin Andalou",    "category" => "Eau de Toilette", "price" => "260 MAD"],
//     ["name" => "Ambre Oriental",    "category" => "Eau de Parfum",   "price" => "395 MAD"],
//     ["name" => "Musc Blanc",        "category" => "Huile Parfumée",  "price" => "310 MAD"],
//     ["name" => "Fleur d'Oranger",   "category" => "Eau de Cologne",  "price" => "220 MAD"],
//     ["name" => "Bois de Cèdre",     "category" => "Eau de Parfum",   "price" => "345 MAD"],
//     ["name" => "Safran Royal",      "category" => "Huile Parfumée",  "price" => "520 MAD"],
//     ["name" => "Néroli Impérial",   "category" => "Eau de Toilette", "price" => "285 MAD"],
//     ["name" => "Vétiver Noir",      "category" => "Eau de Parfum",   "price" => "365 MAD"],
//   ]);

  // ============================================================
  const input    = document.getElementById('andalocy-input');
  const dropdown = document.getElementById('andalocy-dropdown');
  const list     = document.getElementById('andalocy-results-list');
  const count    = document.getElementById('andalocy-count');
  const icon     = document.getElementById('andalocy-icon');
  const clearBtn = document.getElementById('andalocy-clear');

  function highlight(text, query) {
    if (!query) return escHtml(text);
    const idx = text.toLowerCase().indexOf(query.toLowerCase());
    if (idx === -1) return escHtml(text);
    return escHtml(text.slice(0, idx))
      + '<span class="andalocy-highlight">' + escHtml(text.slice(idx, idx + query.length)) + '</span>'
      + escHtml(text.slice(idx + query.length));
  }

  function escHtml(str) {
    return str.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;');
  }

  function renderResults(query) {
    const q = query.trim();

    if (!q) { closeDropdown(); return; }

    const filtered = products.filter(p =>
      p.name.toLowerCase().includes(q.toLowerCase()) ||
      p.category.toLowerCase().includes(q.toLowerCase())
    );

    count.textContent = filtered.length + ' résultat' + (filtered.length !== 1 ? 's' : '');

    if (filtered.length === 0) {
      list.innerHTML = `
        <div class="andalocy-no-results">
          <p>Aucun résultat trouvé</p>
          <span>Essayez un autre terme</span>
        </div>`;
    } else {
      list.innerHTML = filtered.map(p => `
        <div class="andalocy-result-item" data-name="${escHtml(p.name)}">
          <div class="andalocy-result-left">
            <div class="andalocy-result-ico">🌸</div>
            <div>
              <div class="andalocy-result-name">${highlight(p.name, q)}</div>
              <div class="andalocy-result-cat">${escHtml(p.category)}</div>
            </div>
          </div>
          <div class="andalocy-result-price">${escHtml(p.price)}</div>
        </div>
      `).join('');

      // Click sur un résultat
      list.querySelectorAll('.andalocy-result-item').forEach(item => {
        item.addEventListener('click', function () {
          input.value = this.dataset.name;
          closeDropdown();
          // Optionnel : rediriger vers la page produit
          // window.location.href = '/produits?search=' + encodeURIComponent(this.dataset.name);
        });
      });
    }

    openDropdown();
  }

  function openDropdown() {
    dropdown.style.display = 'block';
    input.classList.add('open');
  }

  function closeDropdown() {
    dropdown.style.display = 'none';
    input.classList.remove('open');
  }

  // Events
  input.addEventListener('input', function () {
    const val = this.value;
    icon.style.display    = val ? 'none' : 'block';
    clearBtn.style.display = val ? 'block' : 'none';
    renderResults(val);
  });

  clearBtn.addEventListener('click', function () {
    input.value = '';
    icon.style.display    = 'block';
    clearBtn.style.display = 'none';
    closeDropdown();
    input.focus();
  });

  // Fermer en cliquant dehors
  document.addEventListener('click', function (e) {
    if (!document.getElementById('andalocy-search-section').contains(e.target)) {
      closeDropdown();
    }
  });

  // Navigation clavier (flèches + Entrée + Escape)
  input.addEventListener('keydown', function (e) {
    const items = list.querySelectorAll('.andalocy-result-item');
    const active = list.querySelector('.andalocy-result-item.active');
    let idx = Array.from(items).indexOf(active);

    if (e.key === 'ArrowDown') {
      e.preventDefault();
      if (active) active.classList.remove('active');
      const next = items[idx + 1] || items[0];
      if (next) { next.classList.add('active'); next.scrollIntoView({ block: 'nearest' }); }
    } else if (e.key === 'ArrowUp') {
      e.preventDefault();
      if (active) active.classList.remove('active');
      const prev = items[idx - 1] || items[items.length - 1];
      if (prev) { prev.classList.add('active'); prev.scrollIntoView({ block: 'nearest' }); }
    } else if (e.key === 'Enter' && active) {
      input.value = active.dataset.name;
      closeDropdown();
    } else if (e.key === 'Escape') {
      closeDropdown();
    }
  });
})();
</script>

<style>
  .andalocy-result-item.active {
    background: rgba(193,83,90,0.07);
  }
  .andalocy-result-item.active .andalocy-result-name {
    color: #c1535a;
  }
</style>