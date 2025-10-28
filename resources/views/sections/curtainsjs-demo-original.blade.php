{{--
  ORIGINAL Curtains.js Demo from CodePen
  https://codepen.io/martinlaxenaire/pen/QWdoRrJ

  This uses CDN imports to test if the original works
--}}

<div id="canvas"></div>
<div id="content">
    <h1>
        <span class="text-plane">Alpacode Studio</span>
    </h1>

    <h2>
        <span class="text-plane">
            Rendering text<br />
            to WebGL
        </span>
    </h2>

    <div id="process" class="text-block">
        <p>
            <span class="text-plane">
                This is an example of how we can render whole blocks of text to WebGL thanks to curtains.js and the TextTexture class.
            </span>
        </p>
        <p>
            <span class="text-plane">
                A WebGL plane is created for all elements that have a "text-plane" class and their text contents are drawn inside a 2D canvas, which is then used as a WebGL texture.
            </span>
        </p>
    </div>

    <div id="scroll" class="text-block">
        <p>
            <span class="text-plane">
                We're using an additional shader pass to add a cool effect on scroll that makes you feel like the content is actually dragged.
            </span>
        </p>
        <p>
            <span class="text-plane">
                Try to scroll down to see what happens!
            </span>
        </p>
    </div>

    <div id="lipsum" class="text-block">
        <p>
            <span class="text-plane">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque a dolor posuere nisi tempus rhoncus.
            </span>
        </p>
    </div>
</div>

@push('styles')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Merriweather+Sans:wght@300;400;700&display=swap" rel="stylesheet">

<style>
body {
    margin: 0;
    width: 100%;
    min-height: 100vh;
    font-family: 'Merriweather Sans', sans-serif;
    line-height: 1.2;
    color: #0505AF;
    font-size: 2vw;
}

#canvas {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    z-index: 1;
}

.text-plane {
    display: inline-block;
    margin: -1em;
    padding: 1em;
    opacity: 0;
}

#content {
    width: 100%;
    padding: 2.5vw;
    box-sizing: border-box;
    position: relative;
    z-index: 2;
}

#content h1 {
    text-align: center;
    margin: 25vh 0;
    font-size: 6vw;
    text-transform: uppercase;
    font-family: 'Archivo Black', sans-serif;
    font-weight: 400;
    line-height: 1;
}

#content h2 {
    width: 50%;
    margin: 15vh 0 15vh 50%;
    font-size: 4vw;
    text-transform: uppercase;
    font-family: 'Archivo Black', sans-serif;
    font-weight: 400;
    line-height: 1;
}

.text-block {
    width: 50%;
    margin: 15vh 0;
}

#scroll {
    margin-left: 25%;
}

#lipsum {
    margin-left: 50%;
}
</style>
@endpush

@push('scripts')
<script type="module">
import {Curtains, Plane, ShaderPass} from 'https://cdn.jsdelivr.net/npm/curtainsjs@8.1.2/src/index.mjs';
import {TextTexture} from 'https://gistcdn.githack.com/martinlaxenaire/549b3b01ff4bd9d29ce957edd8b56f16/raw/2f111abf99c8dc63499e894af080c198755d1b7a/TextTexture.js';

const scrollFs = `
    #ifdef GL_FRAGMENT_PRECISION_HIGH
    precision highp float;
    #else
    precision mediump float;
    #endif

    varying vec3 vVertexPosition;
    varying vec2 vTextureCoord;

    uniform sampler2D uRenderTexture;
    uniform float uScrollEffect;
    uniform float uScrollStrength;

    void main() {
        vec2 scrollTextCoords = vTextureCoord;
        float horizontalStretch;

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

const vs = `
    #ifdef GL_FRAGMENT_PRECISION_HIGH
    precision highp float;
    #else
    precision mediump float;
    #endif

    attribute vec3 aVertexPosition;
    attribute vec2 aTextureCoord;

    uniform mat4 uMVMatrix;
    uniform mat4 uPMatrix;

    varying vec3 vVertexPosition;
    varying vec2 vTextureCoord;

    void main() {
        gl_Position = uPMatrix * uMVMatrix * vec4(aVertexPosition, 1.0);
        vVertexPosition = aVertexPosition;
        vTextureCoord = aTextureCoord;
    }
`;

const fs = `
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

window.addEventListener('load', () => {
    console.log('🚀 Starting ORIGINAL Curtains.js demo');

    const curtains = new Curtains({
        container: "canvas",
        pixelRatio: Math.min(1.5, window.devicePixelRatio)
    });

    const scroll = {
        value: 0,
        lastValue: 0,
        effect: 0,
    };

    curtains.onError(() => {
        console.error('❌ Curtains error');
    });

    curtains.onSuccess(() => {
        console.log('✅ Curtains initialized');

        const fonts = {
            list: [
                'normal 400 1em "Archivo Black", sans-serif',
                'normal 300 1em "Merriweather Sans", sans-serif',
            ],
            loaded: 0
        };

        fonts.list.forEach(font => {
            document.fonts.load(font).then(() => {
                fonts.loaded++;

                if(fonts.loaded === fonts.list.length) {
                    console.log('✅ Fonts loaded');

                    const scrollPass = new ShaderPass(curtains, {
                        fragmentShader: scrollFs,
                        depth: false,
                        uniforms: {
                            scrollEffect: {
                                name: "uScrollEffect",
                                type: "1f",
                                value: scroll.effect,
                            },
                            scrollStrength: {
                                name: "uScrollStrength",
                                type: "1f",
                                value: 2.5,
                            },
                        }
                    });

                    scrollPass.onRender(() => {
                        scroll.lastValue = scroll.value;
                        scroll.value = curtains.getScrollValues().y;
                        scroll.delta = Math.max(-30, Math.min(30, scroll.lastValue - scroll.value));
                        scroll.effect = curtains.lerp(scroll.effect, scroll.delta, 0.05);
                        scrollPass.uniforms.scrollEffect.value = scroll.effect;
                    });

                    const textEls = document.querySelectorAll('.text-plane');
                    console.log(`📝 Found ${textEls.length} text elements`);

                    textEls.forEach((textEl, i) => {
                        const textPlane = new Plane(curtains, textEl, {
                            vertexShader: vs,
                            fragmentShader: fs
                        });

                        const textTexture = new TextTexture({
                            plane: textPlane,
                            textElement: textPlane.htmlElement,
                            sampler: "uTexture",
                            resolution: 1.5,
                            skipFontLoading: true,
                        });

                        console.log(`✅ Text plane ${i+1} created`);
                    });

                    console.log('✅ All planes created - demo ready!');
                }
            });
        });
    });
});
</script>
@endpush
