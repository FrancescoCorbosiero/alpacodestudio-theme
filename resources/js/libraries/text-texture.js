/**
 * TextTexture - Render HTML text to WebGL textures
 *
 * This class takes text content from HTML elements and renders them
 * to 2D canvas, which is then used as a texture in Curtains.js planes.
 *
 * Based on Martin Laxenaire's TextTexture implementation
 */

export class TextTexture {
  /**
   * Create a TextTexture instance
   * @param {Object} options - Configuration options
   * @param {Plane} options.plane - Curtains plane instance
   * @param {HTMLElement} options.textElement - HTML element containing text
   * @param {string} options.sampler - Texture sampler name (default: 'uTexture')
   * @param {number} options.resolution - Canvas resolution multiplier (default: 1.5)
   * @param {boolean} options.skipFontLoading - Skip font loading check (default: false)
   */
  constructor(options = {}) {
    this.plane = options.plane;
    this.textElement = options.textElement;
    this.sampler = options.sampler || 'uTexture';
    this.resolution = options.resolution || 1.5;
    this.skipFontLoading = options.skipFontLoading || false;

    // Track initialization state
    this.isInitialized = false;
    this.updateCount = 0;

    if (!this.plane) {
      console.error('TextTexture: Plane is required');
      return;
    }

    if (!this.textElement) {
      console.error('TextTexture: Text element is required');
      return;
    }

    // Create canvas and context
    this.canvas = document.createElement('canvas');
    this.context = this.canvas.getContext('2d');

    // Initialize
    this.init();
  }

  /**
   * Initialize the text texture
   */
  async init() {
    // Wait for fonts to load if not skipped
    if (!this.skipFontLoading) {
      await document.fonts.ready;
    }

    // Set up canvas size based on element dimensions
    this.updateCanvasSize();

    // Render text to canvas
    this.renderTextToCanvas();

    // Create texture from canvas
    this.createTexture();

    // Mark as initialized AFTER first render
    this.isInitialized = true;

    // Set up resize observer (with debouncing)
    this.observeResize();
  }

  /**
   * Update canvas size based on element dimensions
   */
  updateCanvasSize() {
    const rect = this.textElement.getBoundingClientRect();
    const dpr = window.devicePixelRatio || 1;

    this.canvas.width = rect.width * dpr * this.resolution;
    this.canvas.height = rect.height * dpr * this.resolution;

    // Store dimensions
    this.width = rect.width;
    this.height = rect.height;

    console.log('📐 TextTexture canvas size:', {
      width: this.canvas.width,
      height: this.canvas.height,
      elementWidth: rect.width,
      elementHeight: rect.height,
      dpr,
      resolution: this.resolution
    });
  }

  /**
   * Render text content to canvas
   */
  renderTextToCanvas() {
    const ctx = this.context;
    const dpr = window.devicePixelRatio || 1;
    const scale = dpr * this.resolution;

    // Clear canvas
    ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);

    // Save context state
    ctx.save();

    // Scale for high DPI
    ctx.scale(scale, scale);

    // Get computed styles
    const computedStyle = window.getComputedStyle(this.textElement);

    // Set text styles
    ctx.font = `${computedStyle.fontStyle} ${computedStyle.fontWeight} ${computedStyle.fontSize} ${computedStyle.fontFamily}`;
    ctx.fillStyle = computedStyle.color;
    ctx.textAlign = computedStyle.textAlign || 'left';
    ctx.textBaseline = 'top';

    // Get text content
    const text = this.textElement.textContent || this.textElement.innerText;

    // Parse line height
    const lineHeight = parseFloat(computedStyle.lineHeight) || parseFloat(computedStyle.fontSize) * 1.2;

    // Handle multi-line text
    const lines = this.wrapText(ctx, text, this.width - 40); // 40px padding

    // Draw text with padding
    const padding = 20;
    let y = padding;

    console.log('✏️ Drawing text:', {
      lines: lines.length,
      font: ctx.font,
      fillStyle: ctx.fillStyle,
      textAlign: ctx.textAlign,
      lineHeight,
      firstLine: lines[0]?.substring(0, 50)
    });

    lines.forEach(line => {
      let x = padding;

      // Adjust x based on text alignment
      if (ctx.textAlign === 'center') {
        x = this.width / 2;
      } else if (ctx.textAlign === 'right') {
        x = this.width - padding;
      }

      ctx.fillText(line, x, y);
      y += lineHeight;
    });

    // Restore context state
    ctx.restore();

    // Track update count
    this.updateCount++;

    // Debug: Save canvas to window for inspection (ONLY on first render)
    if (!this.isInitialized) {
      if (!window.textCanvases) window.textCanvases = [];
      window.textCanvases.push(this.canvas);
      console.log('🖼️ Canvas saved to window.textCanvases[' + (window.textCanvases.length - 1) + '] - FIRST RENDER');
    } else {
      console.log(`♻️ Canvas updated (update #${this.updateCount})`);
    }
  }

  /**
   * Wrap text to fit within specified width
   * @param {CanvasRenderingContext2D} ctx - Canvas context
   * @param {string} text - Text to wrap
   * @param {number} maxWidth - Maximum width
   * @returns {Array<string>} Array of text lines
   */
  wrapText(ctx, text, maxWidth) {
    // Handle existing line breaks
    const paragraphs = text.split('\n');
    const lines = [];

    paragraphs.forEach(paragraph => {
      const words = paragraph.trim().split(' ');
      let currentLine = '';

      words.forEach(word => {
        const testLine = currentLine + (currentLine ? ' ' : '') + word;
        const metrics = ctx.measureText(testLine);

        if (metrics.width > maxWidth && currentLine !== '') {
          lines.push(currentLine);
          currentLine = word;
        } else {
          currentLine = testLine;
        }
      });

      if (currentLine) {
        lines.push(currentLine);
      }
    });

    return lines;
  }

  /**
   * Create Curtains texture from canvas
   */
  createTexture() {
    if (!this.plane) {
      console.error('❌ No plane available for texture creation');
      return;
    }

    console.log('🎨 Creating texture with:', {
      sampler: this.sampler,
      canvasWidth: this.canvas.width,
      canvasHeight: this.canvas.height,
      hasCanvasData: this.canvas.width > 0 && this.canvas.height > 0
    });

    // Create texture using Curtains
    this.texture = this.plane.createTexture({
      sampler: this.sampler,
      fromTexture: this.canvas,
    });

    console.log('📦 Texture created:', this.texture);

    // Initial texture update
    if (this.texture) {
      this.texture.needUpdate();
      console.log('✅ Texture update triggered');
    } else {
      console.error('❌ Texture creation failed');
    }
  }

  /**
   * Update texture with new content
   */
  update() {
    if (!this.isInitialized) {
      console.warn('⚠️ Attempted to update before initialization complete');
      return;
    }

    console.log('🔄 Updating TextTexture...');

    this.updateCanvasSize();
    this.renderTextToCanvas();

    if (this.texture) {
      this.texture.needUpdate();
      console.log('✅ Texture updated');
    }
  }

  /**
   * Observe element size changes (with debouncing)
   */
  observeResize() {
    // DISABLED: ResizeObserver causing infinite loop
    // Text elements in this demo have fixed layouts, don't need resize updates

    console.log('ℹ️ ResizeObserver disabled (fixed layout)');
    return;

    /* ORIGINAL CODE - CAUSES INFINITE LOOP:
    if (!window.ResizeObserver) return;

    let resizeTimeout;

    this.resizeObserver = new ResizeObserver(() => {
      // Debounce resize events - only update after 250ms of no resizing
      clearTimeout(resizeTimeout);
      resizeTimeout = setTimeout(() => {
        console.log('📏 ResizeObserver triggered - updating texture');
        this.update();
      }, 250);
    });

    this.resizeObserver.observe(this.textElement);
    */
  }

  /**
   * Destroy the texture and clean up
   */
  destroy() {
    if (this.resizeObserver) {
      this.resizeObserver.disconnect();
    }

    if (this.texture) {
      this.texture.remove();
    }

    this.canvas = null;
    this.context = null;
  }
}

export default TextTexture;
