/* ==========================================================
   Pronet | Hero section
   1) Globo flutuando quando não há interação
   2) Globo acompanha o mouse / toque do usuário
   3) Fundo espacial (estrelas + rede de pontos) em canvas
   ========================================================== */

(() => {
  'use strict';

  const hero   = document.getElementById('hero');
  const globe  = document.getElementById('globe');
  const canvas = document.getElementById('space');
  const ctx    = canvas.getContext('2d');

  const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* ---------- Configuração ---------- */
  const IDLE_DELAY   = 2200;   // ms sem interação até voltar a flutuar
  const FOLLOW_SPEED = 0.075;  // suavidade do movimento (0 a 1)
  const IDLE_BLEND   = 0.03;   // velocidade da transição interação <-> flutuação

  /* ---------- Estado ---------- */
  const input = { x: 0, y: 0, last: -Infinity, down: false }; // x,y em -1..1
  const cur   = { x: 0, y: 0 };                                // posição suavizada
  let idleMix = 1;                                             // 1 = flutuando, 0 = seguindo o usuário

  /* ==========================================================
     Entrada do usuário (mouse, caneta e toque)
     ========================================================== */
  function updateInput(e) {
    const r = hero.getBoundingClientRect();
    input.x = ((e.clientX - r.left) / r.width)  * 2 - 1;
    input.y = ((e.clientY - r.top)  / r.height) * 2 - 1;
    input.last = performance.now();
  }

  hero.addEventListener('pointermove', updateInput, { passive: true });

  hero.addEventListener('pointerdown', (e) => {
    input.down = true;
    globe.style.cursor = 'grabbing';
    updateInput(e);
  }, { passive: true });

  const release = () => {
    input.down = false;
    globe.style.cursor = '';
    input.last = performance.now();
  };
  hero.addEventListener('pointerup', release);
  hero.addEventListener('pointercancel', release);

  /* ==========================================================
     Fundo: estrelas + rede de pontos
     ========================================================== */
  let W = 0, H = 0, dpr = 1;
  let stars = [];
  let nodes = [];

  const rand = (a, b) => a + Math.random() * (b - a);

  function resizeCanvas() {
    dpr = Math.min(window.devicePixelRatio || 1, 2);
    W = hero.clientWidth;
    H = hero.clientHeight;
    canvas.width  = W * dpr;
    canvas.height = H * dpr;
    ctx.setTransform(dpr, 0, 0, dpr, 0, 0);

    const area = W * H;

    stars = Array.from({ length: Math.round(area / 4500) }, () => ({
      x: Math.random() * W,
      y: Math.random() * H,
      r: rand(0.3, 1.4),
      depth: rand(0.2, 1),          // profundidade para o paralaxe
      phase: rand(0, Math.PI * 2),
      speed: rand(0.4, 1.4)
    }));

    nodes = Array.from({ length: Math.min(55, Math.round(area / 30000)) }, () => ({
      x: Math.random() * W,
      y: Math.random() * H,
      vx: rand(-0.12, 0.12),
      vy: rand(-0.12, 0.12),
      depth: rand(0.4, 1)
    }));
  }

  function drawSpace(t) {
    ctx.clearRect(0, 0, W, H);

    const ox = cur.x * 18;
    const oy = cur.y * 14;

    // Estrelas com brilho pulsante
    for (const s of stars) {
      const tw = reduceMotion ? 0.7 : 0.55 + 0.45 * Math.sin(t * s.speed + s.phase);
      ctx.globalAlpha = tw;
      ctx.fillStyle = s.depth > 0.7 ? '#cfd6ff' : '#ffffff';
      ctx.beginPath();
      ctx.arc(s.x - ox * s.depth, s.y - oy * s.depth, s.r, 0, Math.PI * 2);
      ctx.fill();
    }

    // Rede de pontos conectados (visual tecnológico)
    const LINK = 140;
    for (const n of nodes) {
      if (!reduceMotion) {
        n.x += n.vx;
        n.y += n.vy;
        if (n.x < -20) n.x = W + 20; else if (n.x > W + 20) n.x = -20;
        if (n.y < -20) n.y = H + 20; else if (n.y > H + 20) n.y = -20;
      }
    }

    ctx.lineWidth = 1;
    for (let i = 0; i < nodes.length; i++) {
      const a  = nodes[i];
      const ax = a.x - ox * a.depth;
      const ay = a.y - oy * a.depth;

      for (let j = i + 1; j < nodes.length; j++) {
        const b  = nodes[j];
        const bx = b.x - ox * b.depth;
        const by = b.y - oy * b.depth;
        const d  = Math.hypot(ax - bx, ay - by);

        if (d < LINK) {
          ctx.globalAlpha = (1 - d / LINK) * 0.28;
          ctx.strokeStyle = '#7f8bff';
          ctx.beginPath();
          ctx.moveTo(ax, ay);
          ctx.lineTo(bx, by);
          ctx.stroke();
        }
      }

      ctx.globalAlpha = 0.8;
      ctx.fillStyle = '#8f7bff';
      ctx.beginPath();
      ctx.arc(ax, ay, 1.6, 0, Math.PI * 2);
      ctx.fill();
    }

    ctx.globalAlpha = 1;
  }

  /* ==========================================================
     Loop principal
     ========================================================== */
  function frame(now) {
    const t = now / 1000;

    // Alvo "flutuando": movimento orgânico com várias ondas somadas
    const idle = {
      x: Math.sin(t * 0.55) * 0.42 + Math.sin(t * 0.21 + 1.3) * 0.18,
      y: Math.cos(t * 0.42) * 0.38 + Math.sin(t * 0.17 + 0.6) * 0.16
    };

    // Depois de um tempo sem interação, volta a flutuar suavemente
    const idleNow = !input.down && (now - input.last > IDLE_DELAY);
    idleMix += ((idleNow ? 1 : 0) - idleMix) * IDLE_BLEND;

    // Mistura entre posição do usuário e flutuação
    const targetX = input.x * (1 - idleMix) + idle.x * idleMix;
    const targetY = input.y * (1 - idleMix) + idle.y * idleMix;

    cur.x += (targetX - cur.x) * FOLLOW_SPEED;
    cur.y += (targetY - cur.y) * FOLLOW_SPEED;

    // Globo: translação + inclinação 3D + leve respiração
    const size = globe.offsetWidth;
    const bob  = Math.sin(t * 1.1) * 7 * idleMix;             // sobe e desce suave
    const tx   = cur.x * size * 0.11;
    const ty   = cur.y * size * 0.09 + bob;
    const ry   = cur.x * 16;
    const rx   = -cur.y * 13;
    const rz   = cur.x * 3 + Math.sin(t * 0.35) * 2.2 * idleMix;
    const s    = 1 + Math.sin(t * 0.8) * 0.012 * idleMix + (input.down ? 0.035 : 0);

    globe.style.setProperty('--tx', tx.toFixed(2) + 'px');
    globe.style.setProperty('--ty', ty.toFixed(2) + 'px');
    globe.style.setProperty('--rx', rx.toFixed(2) + 'deg');
    globe.style.setProperty('--ry', ry.toFixed(2) + 'deg');
    globe.style.setProperty('--rz', rz.toFixed(2) + 'deg');
    globe.style.setProperty('--s',  s.toFixed(4));

    // Paralaxe dos brilhos de fundo
    hero.style.setProperty('--px', cur.x.toFixed(3));
    hero.style.setProperty('--py', cur.y.toFixed(3));

    drawSpace(t);
    requestAnimationFrame(frame);
  }

  /* ---------- Início ---------- */
  resizeCanvas();
  window.addEventListener('resize', resizeCanvas);

  if (reduceMotion) {
    // Sem movimento: apenas um quadro estático do fundo
    drawSpace(0);
  } else {
    requestAnimationFrame(frame);
  }
})();