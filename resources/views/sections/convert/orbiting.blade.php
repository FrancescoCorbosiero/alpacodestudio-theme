{{-- Alpacode Orbiting Hero Component --}}
<div id="about" class="orbiting-hero dark-background">
  <div class="container">
    
    {{-- Background Effects --}}

    {{-- Main Content --}}
    <div class="hero-content">
      <div class="text-content" data-aos="fade-down">
        <!--
        <span class="badge-accent mb-3 d-inline-block">
          <i class="bi bi-info-circle me-2"></i>Chi Siamo
        </span>
-->
        <h1 class="hero-title">
          Concentrati sulla tua attività,<br>
          <span class="text-accent">al resto ci pensiamo noi</span>
        </h1>
        <p class="hero-subtitle">
          Siti web professionali per freelance, creator e piccole attività.<br>
          Tutto quello che ti serve, in un unico ecosistema.
        </p>
        <div class="hero-actions">
          <a href="http://alpacode.studio/contatti/#modulo" class="btn btn-accent btn-lg">
            <i class="bi bi-rocket-takeoff me-2"></i>
            Inizia il tuo progetto
          </a>
          <a href="#servizi" class="btn btn-outline-light btn-lg">
            <i class="bi bi-compass me-2"></i>
            Esplora i servizi
          </a>
        </div>
      </div>

      {{-- Orbital Ecosystem --}}
      <div class="ecosystem-container" data-aos="fade-up" data-aos-delay="200">
        {{-- Center Core --}}
        <div class="center-core">
          <div class="core-inner">
            <div class="logo-container">
              <img src="http://alpacode.studio/wp-content/uploads/2025/05/hero-removebg.png" 
                   alt="Alpacode Studio" 
                   class="core-logo">
              <div class="core-glow"></div>
            </div>
            <!--
            <div class="pulse-ring"></div>
            <div class="pulse-ring pulse-delay-1"></div>
            <div class="pulse-ring pulse-delay-2"></div> -->
          </div>
        </div>

        {{-- Orbit 1 - Core Services --}}
        <div class="orbit orbit-1">
          <div class="orbit-item" data-service="web-design">
            <div class="item-content">
              <i class="bi bi-palette-fill icon"></i>
              <span class="text">Web Design</span>
            </div>
            <div class="item-tooltip">Design moderno e responsive</div>
          </div>
          <div class="orbit-item" data-service="development">
            <div class="item-content">
              <i class="bi bi-code-slash icon"></i>
              <span class="text">Sviluppo</span>
            </div>
            <div class="item-tooltip">Codice pulito e performante</div>
          </div>
          <div class="orbit-item" data-service="seo">
            <div class="item-content">
              <i class="bi bi-search icon"></i>
              <span class="text">SEO</span>
            </div>
            <div class="item-tooltip">Prima pagina su Google</div>
          </div>
          <div class="orbit-item" data-service="performance">
            <div class="item-content">
              <i class="bi bi-speedometer2 icon"></i>
              <span class="text">Performance</span>
            </div>
            <div class="item-tooltip">Siti velocissimi</div>
          </div>
        </div>

        {{-- Orbit 2 - Solutions --}}
        <div class="orbit orbit-2">
          <div class="orbit-item secondary" data-service="ecommerce">
            <div class="item-content">
              <i class="bi bi-cart-fill icon"></i>
              <span class="text">E-commerce</span>
            </div>
            <div class="item-tooltip">Vendi online facilmente</div>
          </div>
          <div class="orbit-item secondary" data-service="booking">
            <div class="item-content">
              <i class="bi bi-calendar-check-fill icon"></i>
              <span class="text">Booking</span>
            </div>
            <div class="item-tooltip">Prenotazioni automatiche</div>
          </div>
          <div class="orbit-item secondary" data-service="portfolio">
            <div class="item-content">
              <i class="bi bi-images icon"></i>
              <span class="text">Portfolio</span>
            </div>
            <div class="item-tooltip">Mostra i tuoi lavori</div>
          </div>
          <div class="orbit-item secondary" data-service="blog">
            <div class="item-content">
              <i class="bi bi-newspaper icon"></i>
              <span class="text">Blog</span>
            </div>
            <div class="item-tooltip">Condividi contenuti</div>
          </div>
          <div class="orbit-item secondary" data-service="membership">
            <div class="item-content">
              <i class="bi bi-person-badge-fill icon"></i>
              <span class="text">Membership</span>
            </div>
            <div class="item-tooltip">Area membri esclusiva</div>
          </div>
        </div>

        {{-- Orbit 3 - Features --}}
        <div class="orbit orbit-3">
          <div class="orbit-item tertiary" data-service="support">
            <div class="item-content">
              <i class="bi bi-headset icon"></i>
              <span class="text">Supporto 24/7</span>
            </div>
            <div class="item-tooltip">Sempre al tuo fianco</div>
          </div>
          <div class="orbit-item tertiary" data-service="hosting">
            <div class="item-content">
              <i class="bi bi-cloud-fill icon"></i>
              <span class="text">Hosting</span>
            </div>
            <div class="item-tooltip">Veloce e sicuro</div>
          </div>
          <div class="orbit-item tertiary" data-service="analytics">
            <div class="item-content">
              <i class="bi bi-graph-up icon"></i>
              <span class="text">Analytics</span>
            </div>
            <div class="item-tooltip">Monitora i risultati</div>
          </div>
        </div>

        {{-- Connection Lines --}}
        <svg class="orbit-connections" viewBox="0 0 600 600">
          <defs>
            <linearGradient id="lineGradient" x1="0%" y1="0%" x2="100%" y2="100%">
              <stop offset="0%" style="stop-color:var(--accent-color);stop-opacity:0.3" />
              <stop offset="100%" style="stop-color:var(--accent-color);stop-opacity:0" />
            </linearGradient>
          </defs>
        </svg>
      </div>
    </div>

    {{-- Floating Stats --}}
    <!--
    <div class="floating-stats">
      <div class="orbiting-stat-card" data-aos="zoom-in" data-aos-delay="400">
        <div class="stat-number">40+</div>
        <div class="stat-label">Progetti</div>
      </div>
      <div class="orbiting-stat-card" data-aos="zoom-in" data-aos-delay="500">
        <div class="stat-number">
          <i class="bi bi-star-fill"></i>
          <i class="bi bi-star-fill"></i>
          <i class="bi bi-star-fill"></i>
          <i class="bi bi-star-fill"></i>
          <i class="bi bi-star-fill"></i>
        </div>
        <div class="stat-label">Servizio di qualità</div>
      </div>
      <div class="orbiting-stat-card" data-aos="zoom-in" data-aos-delay="600">
        <div class="stat-label">Supporto</div>
        <div class="stat-number">24/7</div>
      </div>
    </div>
-->
    
  </div>
</div>

<style>
/* Enhanced Orbiting Hero Styles */
.orbiting-hero {
  position: relative;
  min-height: 80vh;
  display: flex;
  align-items: center;
  overflow: hidden;
  background: var(--background-color);
}

/* Background Effects */
.hero-background {
  position: absolute;
  inset: 0;
  pointer-events: none;
}

.gradient-orb {
  position: absolute;
  border-radius: 50%;
  filter: blur(80px);
  opacity: 0.3;
  animation: orb-float 20s ease-in-out infinite;
}

.orb-1 {
  width: 600px;
  height: 600px;
  background: radial-gradient(circle, rgba(229, 157, 2, 0.4) 0%, transparent 70%);
  top: -200px;
  right: -200px;
}

.orb-2 {
  width: 400px;
  height: 400px;
  background: radial-gradient(circle, rgba(229, 157, 2, 0.3) 0%, transparent 70%);
  bottom: -100px;
  left: -100px;
  animation-delay: 7s;
}

.orb-3 {
  width: 300px;
  height: 300px;
  background: radial-gradient(circle, rgba(102, 126, 234, 0.3) 0%, transparent 70%);
  top: 50%;
  left: 20%;
  animation-delay: 14s;
}

.grid-pattern {
  position: absolute;
  inset: 0;
  background-image: 
    linear-gradient(rgba(255, 255, 255, 0.02) 1px, transparent 1px),
    linear-gradient(90deg, rgba(255, 255, 255, 0.02) 1px, transparent 1px);
  background-size: 50px 50px;
  opacity: 0.5;
}

/* Hero Content Layout */
.hero-content {
  display: grid;
  grid-template-columns: 1fr 1.2fr;
  gap: 4rem;
  align-items: center;
  position: relative;
  z-index: 1;
}

/* Text Content */
.text-content {
  max-width: 600px;
}

.hero-title {
  font-size: clamp(2.5rem, 5vw, 3.5rem);
  font-weight: 800;
  line-height: 1.1;
  margin-bottom: 1.5rem;
  color: var(--heading-color);
}

.hero-subtitle {
  font-size: 1.25rem;
  line-height: 1.6;
  opacity: 0.9;
  margin-bottom: 2rem;
}

.hero-actions {
  display: flex;
  gap: 1rem;
  flex-wrap: wrap;
}

/* Enhanced Ecosystem Container */
.ecosystem-container {
  position: relative;
  width: 600px;
  height: 600px;
  margin: 0 auto;
}

/* Enhanced Center Core */
.center-core {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 10;
}

.logo-container {
  width: 180px;
  height: 180px;
  opacity: 0.8;
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  background: var(--surface-color);
  border-radius: 50%;
  border: 3px solid rgba(229, 157, 2, 0.3);
  overflow: hidden;
  cursor: pointer;
  transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.logo-container:hover {
  transform: scale(1.1);
  border-color: var(--accent-color);
}

.core-logo {
  width: 80%;
  height: 80%;
  object-fit: contain;
  position: relative;
  z-index: 2;
}

.core-glow {
  position: absolute;
  inset: -20px;
  background: radial-gradient(circle, rgba(229, 157, 2, 0.4) 0%, transparent 70%);
  filter: blur(20px);
  animation: pulse 3s ease-in-out infinite;
}

/* Pulse Rings */
.pulse-ring {
  position: absolute;
  top: -10%;
  left: -10%;
  transform: translate(-50%, -50%);
  width: 200px;
  height: 200px;
  border: 1px solid rgba(229, 157, 2, 0.3);
  border-radius: 50%;
  opacity: 0;
  animation: pulse 4s ease-out infinite;
}

.pulse-delay-1 { animation-delay: 1.3s; }
.pulse-delay-2 { animation-delay: 2.6s; }

@keyframes pulse {
  0% {
    transform: translate(-50%, -50%) scale(0.5);
    opacity: 1;
  }
  100% {
    transform: translate(-50%, -50%) scale(2);
    opacity: 0;
  }
}

/* Enhanced Orbits */
.orbit {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 100%;
  height: 100%;
  transform: translate(-50%, -50%);
  border-radius: 50%;
  border: 1px dashed rgba(255, 255, 255, 0.1);
}

.orbit-1 {
  width: 400px;
  height: 400px;
  animation: rotateOrbit 40s linear infinite;
}

.orbit-2 {
  width: 500px;
  height: 500px;
  animation: rotateOrbitReverse 60s linear infinite;
}

.orbit-3 {
  width: 300px;
  height: 300px;
  animation: rotateOrbit 30s linear infinite;
}

/* Enhanced Orbit Items */
.orbit-item {
  position: absolute;
  cursor: pointer;
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.item-content {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.75rem 1.25rem;
  background: var(--surface-color);
  border: 1px solid rgba(255, 255, 255, 0.1);
  border-radius: 50px;
  backdrop-filter: blur(10px);
  transition: all 0.3s ease;
  white-space: nowrap;
}

.orbit-item:hover .item-content {
  transform: scale(1.1);
  border-color: var(--accent-color);
  background: rgba(229, 157, 2, 0.1);
}

.orbit-item .icon {
  font-size: 1.25rem;
  color: var(--accent-color);
}

.orbit-item .text {
  font-size: 0.875rem;
  font-weight: 600;
  color: var(--heading-color);
}

/* Item Positioning */
.orbit-1 .orbit-item:nth-child(1) { top: -25px; left: 50%; transform: translateX(-50%); }
.orbit-1 .orbit-item:nth-child(2) { top: 50%; right: -25px; transform: translateY(-50%); }
.orbit-1 .orbit-item:nth-child(3) { bottom: -25px; left: 50%; transform: translateX(-50%); }
.orbit-1 .orbit-item:nth-child(4) { top: 50%; left: -25px; transform: translateY(-50%); }

.orbit-2 .orbit-item:nth-child(1) { top: 10%; left: 10%; }
.orbit-2 .orbit-item:nth-child(2) { top: 10%; right: 10%; }
.orbit-2 .orbit-item:nth-child(3) { bottom: 10%; right: 10%; }
.orbit-2 .orbit-item:nth-child(4) { bottom: 10%; left: 10%; }
.orbit-2 .orbit-item:nth-child(5) { top: 50%; left: -25px; transform: translateY(-50%); }

.orbit-3 .orbit-item:nth-child(1) { top: -25px; left: 50%; transform: translateX(-50%); }
.orbit-3 .orbit-item:nth-child(2) { bottom: 20%; right: 5%; }
.orbit-3 .orbit-item:nth-child(3) { bottom: 20%; left: 5%; }

/* Counter rotation to keep text readable */
.orbit-1 .orbit-item { animation: counterRotate 40s linear infinite; }
.orbit-2 .orbit-item { animation: counterRotateReverse 60s linear infinite; }
.orbit-3 .orbit-item { animation: counterRotate 30s linear infinite; }

/* Tooltips */
.item-tooltip {
  position: absolute;
  bottom: -35px;
  left: 50%;
  transform: translateX(-50%) scale(0.8);
  background: var(--background-color);
  color: var(--default-color);
  padding: 0.5rem 1rem;
  border-radius: 8px;
  font-size: 0.75rem;
  white-space: nowrap;
  opacity: 0;
  pointer-events: none;
  transition: all 0.3s ease;
  border: 1px solid rgba(229, 157, 2, 0.3);
}

.orbit-item:hover .item-tooltip {
  opacity: 1;
  transform: translateX(-50%) scale(1);
}

/* Floating Stats */
.floating-stats {
  position: absolute;
  bottom: 2rem;
  left: 50%;
  transform: translateX(-50%);
  display: flex;
  gap: 2rem;
}

.orbiting-stat-card {
  background: var(--surface-color);
  border: 1px solid rgba(255, 255, 255, 0.1);
  border-radius: 16px;
  padding: 1rem 1.5rem;
  text-align: center;
  backdrop-filter: blur(10px);
}

.stat-number {
  font-size: 1.75rem;
  font-weight: 800;
  color: var(--accent-color);
}

.stat-label {
  font-size: 0.875rem;
  opacity: 0.7;
}

/* Animations */
@keyframes rotateOrbit {
  from { transform: translate(-50%, -50%) rotate(0deg); }
  to { transform: translate(-50%, -50%) rotate(360deg); }
}

@keyframes rotateOrbitReverse {
  from { transform: translate(-50%, -50%) rotate(360deg); }
  to { transform: translate(-50%, -50%) rotate(0deg); }
}

@keyframes counterRotate {
  from { transform: rotate(0deg); }
  to { transform: rotate(-360deg); }
}

@keyframes counterRotateReverse {
  from { transform: rotate(-360deg); }
  to { transform: rotate(0deg); }
}

@keyframes orb-float {
  0%, 100% { transform: translate(0, 0); }
  33% { transform: translate(30px, -30px); }
  66% { transform: translate(-20px, 20px); }
}

/* Responsive Design */
@media (max-width: 1200px) {
  .hero-content {
    grid-template-columns: 1fr;
    text-align: center;
  }
  
  .text-content {
    margin-bottom: 3rem;
  }
  
  .hero-actions {
    justify-content: center;
  }
}

@media (max-width: 768px) {
  .ecosystem-container {
    width: 400px;
    height: 400px;
  }
  
  .orbit-1 { width: 300px; height: 300px; }
  .orbit-2 { width: 380px; height: 380px; }
  .orbit-3 { width: 220px; height: 220px; }
  
  .orbit-item .text {
    display: none;
  }
  
  .item-content {
    padding: 0.75rem;
  }
  
  .floating-stats {
    gap: 1rem;
  }
  
  .orbiting-stat-card {
    padding: 0.75rem 1rem;
  }
}

@media (max-width: 480px) {
  .ecosystem-container {
    width: 320px;
    height: 320px;
  }
  
  .orbit-1 { width: 240px; height: 240px; }
  .orbit-2 { width: 300px; height: 300px; }
  .orbit-3 { width: 180px; height: 180px; }
  
  .hero-title {
    font-size: 2rem;
  }
  
  .hero-actions {
    flex-direction: column;
    width: 100%;
  }
  
  .btn {
    width: 100%;
  }
  
  .floating-stats {
    position: relative;
    bottom: auto;
    margin-top: 3rem;
  }
}

/* Connection Lines (Optional Enhancement) */
.orbit-connections {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  pointer-events: none;
  opacity: 0.3;
}

.connection-line {
  stroke: url(#lineGradient);
  stroke-width: 1;
  fill: none;
  stroke-dasharray: 5, 5;
  animation: dash 20s linear infinite;
}

@keyframes dash {
  to {
    stroke-dashoffset: -100;
  }
}

/* Hover Effects for Orbit Items */
.orbit-item[data-service]:hover {
  z-index: 100;
}

.orbit-item[data-service="web-design"]:hover .icon { color: #667eea; }
.orbit-item[data-service="development"]:hover .icon { color: #48bb78; }
.orbit-item[data-service="seo"]:hover .icon { color: #ed8936; }
.orbit-item[data-service="performance"]:hover .icon { color: #38b2ac; }
</style>

{{-- Optional JavaScript for Interactive Connections --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
  const orbitItems = document.querySelectorAll('.orbit-item');
  const svg = document.querySelector('.orbit-connections');
  
  // Create connection lines on hover
  orbitItems.forEach(item => {
    item.addEventListener('mouseenter', function() {
      const rect = this.getBoundingClientRect();
      const containerRect = svg.getBoundingClientRect();
      const centerX = containerRect.width / 2;
      const centerY = containerRect.height / 2;
      const itemX = rect.left + rect.width / 2 - containerRect.left;
      const itemY = rect.top + rect.height / 2 - containerRect.top;
      
      const line = document.createElementNS('http://www.w3.org/2000/svg', 'path');
      line.setAttribute('class', 'connection-line');
      line.setAttribute('d', `M ${centerX} ${centerY} Q ${(centerX + itemX) / 2} ${(centerY + itemY) / 2 - 50} ${itemX} ${itemY}`);
      svg.appendChild(line);
      
      setTimeout(() => line.remove(), 2000);
    });
  });
});
</script>