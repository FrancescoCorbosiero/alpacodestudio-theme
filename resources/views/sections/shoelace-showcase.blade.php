{{--
  Shoelace Web Components Showcase

  Demonstrates:
  - Buttons and button groups
  - Alerts and badges
  - Inputs and forms
  - Cards and dialogs
  - Icons
--}}

<section class="shoelace-showcase section-padding" id="shoelace">
  <div class="container">
    {{-- Section Header --}}
    <header class="section-header" data-aos="fade-up">
      <span class="section-tag">Shoelace v2.x</span>
      <h2 class="section-title text-gradient">Web Components</h2>
      <p class="section-description">
        Modern, accessible UI components built with web standards
      </p>
    </header>

    {{-- Buttons Showcase --}}
    <div class="component-group" data-aos="fade-up">
      <h3 class="component-group__title">Buttons</h3>
      <div class="component-demo">
        <div class="demo-section">
          <h4>Variants</h4>
          <div class="button-row">
            <sl-button variant="default">Default</sl-button>
            <sl-button variant="primary">Primary</sl-button>
            <sl-button variant="success">Success</sl-button>
            <sl-button variant="neutral">Neutral</sl-button>
            <sl-button variant="warning">Warning</sl-button>
            <sl-button variant="danger">Danger</sl-button>
          </div>
        </div>

        <div class="demo-section">
          <h4>Sizes</h4>
          <div class="button-row">
            <sl-button size="small">Small</sl-button>
            <sl-button size="medium">Medium</sl-button>
            <sl-button size="large">Large</sl-button>
          </div>
        </div>

        <div class="demo-section">
          <h4>With Icons</h4>
          <div class="button-row">
            <sl-button variant="primary">
              <sl-icon slot="prefix" name="heart"></sl-icon>
              Like
            </sl-button>
            <sl-button variant="success">
              Download
              <sl-icon slot="suffix" name="download"></sl-icon>
            </sl-button>
            <sl-button variant="danger">
              <sl-icon slot="prefix" name="trash"></sl-icon>
              Delete
            </sl-button>
          </div>
        </div>
      </div>
    </div>

    {{-- Alerts Showcase --}}
    <div class="component-group" data-aos="fade-up">
      <h3 class="component-group__title">Alerts</h3>
      <div class="component-demo">
        <sl-alert variant="primary" open>
          <sl-icon slot="icon" name="info-circle"></sl-icon>
          <strong>Info:</strong> This is how you inform users about something.
        </sl-alert>

        <sl-alert variant="success" open>
          <sl-icon slot="icon" name="check-circle"></sl-icon>
          <strong>Success:</strong> Your changes have been saved!
        </sl-alert>

        <sl-alert variant="warning" open>
          <sl-icon slot="icon" name="exclamation-triangle"></sl-icon>
          <strong>Warning:</strong> Please review your input.
        </sl-alert>

        <sl-alert variant="danger" open>
          <sl-icon slot="icon" name="x-circle"></sl-icon>
          <strong>Error:</strong> Something went wrong.
        </sl-alert>
      </div>
    </div>

    {{-- Inputs Showcase --}}
    <div class="component-group" data-aos="fade-up">
      <h3 class="component-group__title">Form Inputs</h3>
      <div class="component-demo">
        <div class="form-grid">
          <div class="form-field">
            <sl-input label="Name" placeholder="Enter your name" help-text="What should we call you?"></sl-input>
          </div>

          <div class="form-field">
            <sl-input type="email" label="Email" placeholder="you@example.com"></sl-input>
          </div>

          <div class="form-field">
            <sl-select label="Country" placeholder="Select a country">
              <sl-option value="us">United States</sl-option>
              <sl-option value="uk">United Kingdom</sl-option>
              <sl-option value="ca">Canada</sl-option>
              <sl-option value="au">Australia</sl-option>
            </sl-select>
          </div>

          <div class="form-field">
            <sl-textarea label="Message" placeholder="Tell us what you think" rows="3"></sl-textarea>
          </div>

          <div class="form-field">
            <sl-checkbox>I agree to the terms and conditions</sl-checkbox>
          </div>

          <div class="form-field">
            <sl-switch>Enable notifications</sl-switch>
          </div>
        </div>
      </div>
    </div>

    {{-- Badges & Tags --}}
    <div class="component-group" data-aos="fade-up">
      <h3 class="component-group__title">Badges & Tags</h3>
      <div class="component-demo">
        <div class="demo-section">
          <h4>Badges</h4>
          <div class="badge-row">
            <sl-badge variant="primary">Primary</sl-badge>
            <sl-badge variant="success">Success</sl-badge>
            <sl-badge variant="neutral">Neutral</sl-badge>
            <sl-badge variant="warning">Warning</sl-badge>
            <sl-badge variant="danger">Danger</sl-badge>
          </div>
        </div>

        <div class="demo-section">
          <h4>Pill Badges</h4>
          <div class="badge-row">
            <sl-badge variant="primary" pill>12</sl-badge>
            <sl-badge variant="success" pill>New</sl-badge>
            <sl-badge variant="warning" pill>!</sl-badge>
            <sl-badge variant="danger" pill>99+</sl-badge>
          </div>
        </div>
      </div>
    </div>

    {{-- Cards --}}
    <div class="component-group" data-aos="fade-up">
      <h3 class="component-group__title">Cards</h3>
      <div class="cards-grid">
        <sl-card>
          <div slot="header">
            <strong>Card Title</strong>
          </div>
          <p>
            This is a basic card with header, content, and footer sections.
            Shoelace cards are versatile and can contain any content.
          </p>
          <div slot="footer">
            <sl-button variant="primary">Action</sl-button>
          </div>
        </sl-card>

        <sl-card>
          <img
            slot="image"
            src="https://picsum.photos/400/200?random=20"
            alt="Card image"
          />
          <strong>Image Card</strong>
          <p>Cards can include images at the top for visual appeal.</p>
          <div slot="footer">
            <sl-button variant="primary" outline>Learn More</sl-button>
          </div>
        </sl-card>

        <sl-card>
          <div slot="header">
            <strong>Statistics</strong>
          </div>
          <div class="card-stats">
            <div class="stat-item">
              <div class="stat-value">1,234</div>
              <div class="stat-label">Users</div>
            </div>
            <div class="stat-item">
              <div class="stat-value">567</div>
              <div class="stat-label">Projects</div>
            </div>
            <div class="stat-item">
              <div class="stat-value">89%</div>
              <div class="stat-label">Success</div>
            </div>
          </div>
        </sl-card>
      </div>
    </div>

    {{-- Icons Grid --}}
    <div class="component-group" data-aos="fade-up">
      <h3 class="component-group__title">Icon Library</h3>
      <div class="icons-grid">
        <div class="icon-item">
          <sl-icon name="house"></sl-icon>
          <span>house</span>
        </div>
        <div class="icon-item">
          <sl-icon name="gear"></sl-icon>
          <span>gear</span>
        </div>
        <div class="icon-item">
          <sl-icon name="heart"></sl-icon>
          <span>heart</span>
        </div>
        <div class="icon-item">
          <sl-icon name="star"></sl-icon>
          <span>star</span>
        </div>
        <div class="icon-item">
          <sl-icon name="lightning"></sl-icon>
          <span>lightning</span>
        </div>
        <div class="icon-item">
          <sl-icon name="search"></sl-icon>
          <span>search</span>
        </div>
        <div class="icon-item">
          <sl-icon name="bell"></sl-icon>
          <span>bell</span>
        </div>
        <div class="icon-item">
          <sl-icon name="envelope"></sl-icon>
          <span>envelope</span>
        </div>
      </div>
    </div>

    {{-- Code Example --}}
    <div class="code-showcase" data-aos="fade-up">
      <h3 class="code-showcase__title">How to Use</h3>
      <pre class="code-block"><code class="language-html">&lt;!-- Buttons --&gt;
&lt;sl-button variant="primary"&gt;Click Me&lt;/sl-button&gt;

&lt;!-- Alerts --&gt;
&lt;sl-alert variant="success" open&gt;
  &lt;sl-icon slot="icon" name="check-circle"&gt;&lt;/sl-icon&gt;
  Success message
&lt;/sl-alert&gt;

&lt;!-- Form inputs --&gt;
&lt;sl-input label="Name" placeholder="Your name"&gt;&lt;/sl-input&gt;
&lt;sl-select label="Choose"&gt;
  &lt;sl-option value="1"&gt;Option 1&lt;/sl-option&gt;
&lt;/sl-select&gt;

&lt;!-- Cards --&gt;
&lt;sl-card&gt;
  &lt;div slot="header"&gt;Card Title&lt;/div&gt;
  Content goes here
&lt;/sl-card&gt;</code></pre>
    </div>
  </div>
</section>

<style>
.shoelace-showcase {
  background: var(--color-surface-base);
}

.component-group {
  margin-bottom: var(--space-3xl);
}

.component-group__title {
  font-size: var(--font-size-2xl);
  font-weight: var(--font-weight-bold);
  margin-bottom: var(--space-xl);
  color: var(--color-brand-primary);
  padding-bottom: var(--space-md);
  border-bottom: 2px solid var(--color-brand-primary);
}

.component-demo {
  background: var(--color-surface-raised);
  padding: var(--space-2xl);
  border-radius: var(--radius-lg);
}

.demo-section {
  margin-bottom: var(--space-xl);
}

.demo-section:last-child {
  margin-bottom: 0;
}

.demo-section h4 {
  font-size: var(--font-size-lg);
  font-weight: var(--font-weight-semibold);
  margin-bottom: var(--space-md);
  color: var(--color-text-secondary);
}

.button-row {
  display: flex;
  flex-wrap: wrap;
  gap: var(--space-md);
}

.badge-row {
  display: flex;
  flex-wrap: wrap;
  gap: var(--space-sm);
  align-items: center;
}

.form-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: var(--space-lg);
}

.form-field {
  min-width: 0; /* Prevent overflow */
}

sl-alert {
  margin-bottom: var(--space-md);
}

.cards-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: var(--space-xl);
}

.card-stats {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-md);
  text-align: center;
}

.stat-item {
  padding: var(--space-md);
}

.stat-value {
  font-size: var(--font-size-3xl);
  font-weight: var(--font-weight-bold);
  color: var(--color-brand-primary);
  line-height: 1;
  margin-bottom: var(--space-xs);
}

.stat-label {
  font-size: var(--font-size-sm);
  color: var(--color-text-secondary);
  text-transform: uppercase;
  letter-spacing: var(--letter-spacing-wide);
}

.icons-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
  gap: var(--space-lg);
  background: var(--color-surface-raised);
  padding: var(--space-2xl);
  border-radius: var(--radius-lg);
}

.icon-item {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: var(--space-sm);
  padding: var(--space-md);
  border-radius: var(--radius-md);
  transition: background-color var(--duration-base);
}

.icon-item:hover {
  background: var(--color-surface-overlay);
}

.icon-item sl-icon {
  font-size: 2rem;
  color: var(--color-brand-primary);
}

.icon-item span {
  font-size: var(--font-size-xs);
  color: var(--color-text-secondary);
  font-family: var(--font-family-mono);
}

@media (max-width: 768px) {
  .button-row {
    flex-direction: column;
  }

  .form-grid {
    grid-template-columns: 1fr;
  }

  .cards-grid {
    grid-template-columns: 1fr;
  }

  .card-stats {
    grid-template-columns: 1fr;
  }

  .icons-grid {
    grid-template-columns: repeat(auto-fill, minmax(80px, 1fr));
  }
}
</style>
