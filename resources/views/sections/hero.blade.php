{{--
  Hero Section - Premium First Impression

  A stunning, full-viewport hero section with:
  - Animated gradient background
  - Staggered content animations
  - Trust indicators
  - Scroll indicator
  - Floating shapes (optional)
--}}

<section class="responsive-box-tight hero" role="banner" aria-label="Hero principale">

  <div class="hero-grid">
    <div class="responsive-box-tight col-1 border-primary">
      <h3 class="text-gradient badge">Digital Transformation Made in Italy 🇮🇹</h3>
      <hr>
      <div class="heading-wrapper" style="background-image: url('{{ Vite::asset('resources/images/b2b.png') }}');">
        <h1 class="display-3">IL WEB IN CONTINUO CAMBIAMENTO.</h1>
      </div>
      <div class="slider-container border-primary">
          <span class="slider-text-rtl"> ✦ INNOVAZIONE ✦ CREATIVITÀ ✦ ECCELLENZA ✦ PASSIONE ✦ RISULTATI ✦ CRESCITA ✦ </span>
      </div>
      <h2>Non farti trovare impreparato. Sappiamo dare la giusta direzione.</h2>
      
      <div class="slider-container border-primary">
          <span class="slider-text"> ✦ WEB DESIGN ✦ BRANDING ✦ E-COMMERCE ✦ SEO ✦ DIGITAL MARKETING ✦ WORDPRESS ✦ STRUMENTI PER LA CRESCITA ✦ </span>
      </div>
      
    </div>

    <div class="responsive-box-wide col-2 border-secondary">
      <p>Ci occupiamo della tua presenza professionale sul web con soluzioni digitali su misura.</p>
      <a href="#pricing" class="button button--tertiary">Piani</a>
      <!--<p>Costruiamo ecosistemi digitali in grado di crescere con la tua attività.</p>-->
      <p></p>
      <p>La prima consulenza è gratuita e senza impegno.</p>
      <div class="contact-mini border-primary">
        <form id="consult-form" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post" class="form form--compact" novalidate>
          <input type="hidden" name="action" value="alpacode_consult">
          <?php wp_nonce_field('alpacode_consult','alpacode_consult_nonce'); ?>

          <div class="visually-hidden" aria-hidden="true">
            <label for="hp-field">Lascia questo campo vuoto</label>
            <input id="hp-field" name="company" type="text" tabindex="-1" autocomplete="off">
          </div>

          <div class="form-row">
            <label for="cf-name">Nome</label>
            <input id="cf-name" name="name" type="text" placeholder="Il tuo nome" required autocomplete="name">
          </div>

          <div class="form-row">
            <label for="cf-email">Email</label>
            <input id="cf-email" name="email" type="email" placeholder="tuo@email.it" required autocomplete="email" inputmode="email">
          </div>

          <div class="form-row">
            <label for="cf-msg">Obiettivo (opzionale)</label>
            <input id="cf-msg" name="message" type="text" placeholder="1 riga: come possiamo aiutarti?" maxlength="180" autocomplete="off">
          </div>

          <button type="submit" class="button button--primary">Invia richiesta</button>
          <div class="form-status" aria-live="polite"></div>
        </form>
      </div>
      <a href="#features" class="button button--secondary">Richiedi una consulenza</a>
  

      <! --Costruiamo ecosistemi digitali in grado di crescere con la tua attività. -->
    </div>  
  </div>

</section>
