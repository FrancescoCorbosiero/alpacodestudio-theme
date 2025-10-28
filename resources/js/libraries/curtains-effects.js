/**
 * Curtains.js - Custom Shaders & Effects Library
 *
 * This file contains all custom GLSL shaders and effect configurations
 * for creating stunning WebGL effects with Curtains.js
 */

/**
 * VERTEX SHADER - Basic with texture coordinates
 */
export const basicVertexShader = `
  precision mediump float;

  // default mandatory variables
  attribute vec3 aVertexPosition;
  attribute vec2 aTextureCoord;

  uniform mat4 uMVMatrix;
  uniform mat4 uPMatrix;

  // custom variables
  varying vec3 vVertexPosition;
  varying vec2 vTextureCoord;

  void main() {
    vec3 vertexPosition = aVertexPosition;

    gl_Position = uPMatrix * uMVMatrix * vec4(vertexPosition, 1.0);

    // varyings
    vTextureCoord = aTextureCoord;
    vVertexPosition = vertexPosition;
  }
`;

/**
 * DISPLACEMENT SHADER - Creates ripple/displacement effect on hover
 */
export const displacementFragmentShader = `
  precision mediump float;

  varying vec3 vVertexPosition;
  varying vec2 vTextureCoord;

  uniform sampler2D uRenderTexture;
  uniform float uTime;
  uniform vec2 uMouse;
  uniform float uMouseStrength;

  void main() {
    vec2 textureCoord = vTextureCoord;

    // Calculate distance from mouse
    float dist = distance(uMouse, textureCoord);

    // Create displacement based on mouse proximity
    float displacement = smoothstep(0.5, 0.0, dist) * uMouseStrength;

    // Apply wave effect
    vec2 direction = normalize(textureCoord - uMouse);
    textureCoord += direction * displacement * sin(uTime * 2.0);

    // Sample the texture
    vec4 color = texture2D(uRenderTexture, textureCoord);

    gl_FragColor = color;
  }
`;

/**
 * RGB SPLIT SHADER - Chromatic aberration effect
 */
export const rgbSplitFragmentShader = `
  precision mediump float;

  varying vec3 vVertexPosition;
  varying vec2 vTextureCoord;

  uniform sampler2D uRenderTexture;
  uniform float uTime;
  uniform vec2 uMouse;
  uniform float uStrength;

  void main() {
    vec2 textureCoord = vTextureCoord;

    // Calculate offset based on mouse position
    float dist = distance(uMouse, textureCoord);
    float offset = smoothstep(0.5, 0.0, dist) * uStrength * 0.05;

    // Sample RGB channels separately
    float r = texture2D(uRenderTexture, textureCoord + vec2(offset, 0.0)).r;
    float g = texture2D(uRenderTexture, textureCoord).g;
    float b = texture2D(uRenderTexture, textureCoord - vec2(offset, 0.0)).b;

    gl_FragColor = vec4(r, g, b, 1.0);
  }
`;

/**
 * WAVE DISTORTION SHADER - Scroll-based wave effect
 */
export const waveFragmentShader = `
  precision mediump float;

  varying vec3 vVertexPosition;
  varying vec2 vTextureCoord;

  uniform sampler2D uRenderTexture;
  uniform float uTime;
  uniform float uScrollEffect;

  void main() {
    vec2 textureCoord = vTextureCoord;

    // Create wave effect
    float wave = sin(textureCoord.y * 10.0 + uTime) * 0.01;
    textureCoord.x += wave * uScrollEffect;

    // Sample the texture
    vec4 color = texture2D(uRenderTexture, textureCoord);

    gl_FragColor = color;
  }
`;

/**
 * PARALLAX SHADER - Multi-layer parallax effect
 */
export const parallaxFragmentShader = `
  precision mediump float;

  varying vec3 vVertexPosition;
  varying vec2 vTextureCoord;

  uniform sampler2D uRenderTexture;
  uniform float uScrollEffect;
  uniform vec2 uMouse;
  uniform float uDepth;

  void main() {
    vec2 textureCoord = vTextureCoord;

    // Apply parallax based on scroll and mouse
    vec2 parallaxOffset = (uMouse - 0.5) * uDepth * 0.1;
    textureCoord += parallaxOffset;
    textureCoord.y += uScrollEffect * 0.1;

    // Sample the texture
    vec4 color = texture2D(uRenderTexture, textureCoord);

    gl_FragColor = color;
  }
`;

/**
 * ZOOM BLUR SHADER - Radial blur effect on hover
 */
export const zoomBlurFragmentShader = `
  precision mediump float;

  varying vec3 vVertexPosition;
  varying vec2 vTextureCoord;

  uniform sampler2D uRenderTexture;
  uniform vec2 uMouse;
  uniform float uStrength;

  void main() {
    vec2 textureCoord = vTextureCoord;

    // Calculate distance and direction from mouse
    vec2 direction = textureCoord - uMouse;
    float dist = length(direction);

    // Create radial blur
    vec4 color = vec4(0.0);
    float total = 0.0;

    for(float i = 0.0; i < 10.0; i++) {
      float scale = 1.0 + (i / 10.0) * uStrength * smoothstep(0.5, 0.0, dist);
      vec2 offset = (textureCoord - 0.5) * scale + 0.5;
      color += texture2D(uRenderTexture, offset);
      total += 1.0;
    }

    gl_FragColor = color / total;
  }
`;

/**
 * GRADIENT OVERLAY SHADER - Animated gradient overlay
 */
export const gradientOverlayFragmentShader = `
  precision mediump float;

  varying vec3 vVertexPosition;
  varying vec2 vTextureCoord;

  uniform sampler2D uRenderTexture;
  uniform float uTime;
  uniform vec3 uColor1;
  uniform vec3 uColor2;
  uniform float uOpacity;

  void main() {
    vec2 textureCoord = vTextureCoord;

    // Sample the texture
    vec4 texColor = texture2D(uRenderTexture, textureCoord);

    // Create animated gradient
    float gradient = sin(textureCoord.y * 3.14159 + uTime * 0.5) * 0.5 + 0.5;
    vec3 gradientColor = mix(uColor1, uColor2, gradient);

    // Mix with original texture
    vec3 finalColor = mix(texColor.rgb, gradientColor, uOpacity);

    gl_FragColor = vec4(finalColor, texColor.a);
  }
`;

/**
 * EFFECT CONFIGURATIONS
 * Pre-configured effect settings for easy use
 */
export const effectPresets = {
  displacement: {
    vertexShader: basicVertexShader,
    fragmentShader: displacementFragmentShader,
    uniforms: {
      time: { name: "uTime", type: "1f", value: 0 },
      mouse: { name: "uMouse", type: "2f", value: [0.5, 0.5] },
      mouseStrength: { name: "uMouseStrength", type: "1f", value: 0 }
    }
  },

  rgbSplit: {
    vertexShader: basicVertexShader,
    fragmentShader: rgbSplitFragmentShader,
    uniforms: {
      time: { name: "uTime", type: "1f", value: 0 },
      mouse: { name: "uMouse", type: "2f", value: [0.5, 0.5] },
      strength: { name: "uStrength", type: "1f", value: 0 }
    }
  },

  wave: {
    vertexShader: basicVertexShader,
    fragmentShader: waveFragmentShader,
    uniforms: {
      time: { name: "uTime", type: "1f", value: 0 },
      scrollEffect: { name: "uScrollEffect", type: "1f", value: 0 }
    }
  },

  parallax: {
    vertexShader: basicVertexShader,
    fragmentShader: parallaxFragmentShader,
    uniforms: {
      scrollEffect: { name: "uScrollEffect", type: "1f", value: 0 },
      mouse: { name: "uMouse", type: "2f", value: [0.5, 0.5] },
      depth: { name: "uDepth", type: "1f", value: 1.0 }
    }
  },

  zoomBlur: {
    vertexShader: basicVertexShader,
    fragmentShader: zoomBlurFragmentShader,
    uniforms: {
      mouse: { name: "uMouse", type: "2f", value: [0.5, 0.5] },
      strength: { name: "uStrength", type: "1f", value: 0 }
    }
  },

  gradientOverlay: {
    vertexShader: basicVertexShader,
    fragmentShader: gradientOverlayFragmentShader,
    uniforms: {
      time: { name: "uTime", type: "1f", value: 0 },
      color1: { name: "uColor1", type: "3f", value: [0.2, 0.4, 0.8] },
      color2: { name: "uColor2", type: "3f", value: [0.8, 0.2, 0.4] },
      opacity: { name: "uOpacity", type: "1f", value: 0.3 }
    }
  }
};

/**
 * TEXT RENDERING SHADER - Basic text plane vertex shader
 */
export const textVertexShader = `
  #ifdef GL_FRAGMENT_PRECISION_HIGH
  precision highp float;
  #else
  precision mediump float;
  #endif

  // default mandatory variables
  attribute vec3 aVertexPosition;
  attribute vec2 aTextureCoord;

  uniform mat4 uMVMatrix;
  uniform mat4 uPMatrix;

  // custom variables
  varying vec3 vVertexPosition;
  varying vec2 vTextureCoord;

  void main() {
    gl_Position = uPMatrix * uMVMatrix * vec4(aVertexPosition, 1.0);

    // varyings
    vVertexPosition = aVertexPosition;
    vTextureCoord = aTextureCoord;
  }
`;

/**
 * TEXT RENDERING SHADER - Basic text plane fragment shader
 */
export const textFragmentShader = `
  #ifdef GL_FRAGMENT_PRECISION_HIGH
  precision highp float;
  #else
  precision mediump float;
  #endif

  varying vec3 vVertexPosition;
  varying vec2 vTextureCoord;

  uniform sampler2D uTexture;

  void main() {
    gl_FragColor = texture2D(uTexture, vTextureCoord);
  }
`;

/**
 * SCROLL TEXT EFFECT SHADER - Text scroll distortion fragment shader
 */
export const scrollTextFragmentShader = `
  #ifdef GL_FRAGMENT_PRECISION_HIGH
  precision highp float;
  #else
  precision mediump float;
  #endif

  varying vec3 vVertexPosition;
  varying vec2 vTextureCoord;

  uniform sampler2D uRenderTexture;

  // lerped scroll deltas
  // negative when scrolling down, positive when scrolling up
  uniform float uScrollEffect;

  // default to 2.5
  uniform float uScrollStrength;

  void main() {
    vec2 scrollTextCoords = vTextureCoord;
    float horizontalStretch;

    // branching on an uniform is ok
    if(uScrollEffect >= 0.0) {
      scrollTextCoords.y *= 1.0 + -uScrollEffect * 0.00625 * uScrollStrength;
      horizontalStretch = sin(scrollTextCoords.y);
    }
    else if(uScrollEffect < 0.0) {
      scrollTextCoords.y += (scrollTextCoords.y - 1.0) * uScrollEffect * 0.00625 * uScrollStrength;
      horizontalStretch = sin(-1.0 * (1.0 - scrollTextCoords.y));
    }

    scrollTextCoords.x = scrollTextCoords.x * 2.0 - 1.0;
    scrollTextCoords.x *= 1.0 + uScrollEffect * 0.0035 * horizontalStretch * uScrollStrength;
    scrollTextCoords.x = (scrollTextCoords.x + 1.0) * 0.5;

    gl_FragColor = texture2D(uRenderTexture, scrollTextCoords);
  }
`;

/**
 * Get effect configuration by name
 * @param {string} effectName - Name of the effect preset
 * @returns {object} Effect configuration
 */
export function getEffectPreset(effectName) {
  return effectPresets[effectName] || effectPresets.displacement;
}
