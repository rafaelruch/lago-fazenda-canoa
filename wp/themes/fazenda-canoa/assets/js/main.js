/* ============================================================
   FAZENDA CANOA — LP v0.4
   Animações polidas: Ken Burns do hero, scrollspy, ripple, progress bar
   ============================================================ */

(() => {
  'use strict';

  // ---------- Analytics: dispara eventos de Lead (Meta Pixel + Google Ads) ----------
  // Retorna uma Promise que resolve depois dos eventos serem enviados
  const fireLeadEvents = (data) => {
    return new Promise((resolve) => {
      const cfg = window.FC_ANALYTICS || {};
      const eventId = 'lead_' + Date.now() + '_' + Math.random().toString(36).slice(2, 9);
      let fired = 0, target = 0;
      const done = () => { fired++; if (fired >= target) resolve(eventId); };

      // Meta Pixel — Lead com event_id para deduplicação server-side
      if (cfg.metaPixelId && typeof window.fbq === 'function') {
        target++;
        try {
          window.fbq('track', 'Lead', {
            content_name: 'Formulario LP',
            content_category: data && data.interesse ? data.interesse : 'Informações gerais',
          }, { eventID: eventId });
        } catch (e) {}
        setTimeout(done, 50);
      }

      // Google Ads — conversion com transaction_id (deduplicação)
      if (cfg.googleAdsConv && typeof window.gtag === 'function') {
        target++;
        try {
          window.gtag('event', 'conversion', {
            send_to: cfg.googleAdsConv,
            transaction_id: eventId,
          });
        } catch (e) {}
        setTimeout(done, 50);
      }

      // Se nenhum dos dois disparou, resolve imediatamente
      if (target === 0) resolve(eventId);
      // Timeout de segurança: no máximo 600ms aguardando
      setTimeout(() => resolve(eventId), 600);
    });
  };
  window.fireLeadEvents = fireLeadEvents;

  const hdr = document.getElementById('hdr');
  const burger = document.querySelector('.hdr__burger');
  const mobileMenu = document.getElementById('mobile-menu');
  const form = document.getElementById('lead-form');
  const scrollProgress = document.getElementById('scroll-progress');
  const prm = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  // ---------- 1. Header scroll state + scroll progress bar ----------
  const onScroll = () => {
    const y = window.scrollY;
    hdr.classList.toggle('hdr--scrolled', y > 20);

    if (scrollProgress) {
      const h = document.documentElement.scrollHeight - window.innerHeight;
      const pct = h > 0 ? (y / h) * 100 : 0;
      scrollProgress.style.width = pct + '%';
    }
  };
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  // ---------- 2. Menu mobile ----------
  const toggleMobileMenu = (open) => {
    const next = typeof open === 'boolean' ? open : burger.getAttribute('aria-expanded') !== 'true';
    burger.setAttribute('aria-expanded', String(next));
    mobileMenu.setAttribute('aria-hidden', String(!next));
    document.body.style.overflow = next ? 'hidden' : '';
  };
  burger?.addEventListener('click', () => toggleMobileMenu());
  mobileMenu?.querySelectorAll('a').forEach(a => a.addEventListener('click', () => toggleMobileMenu(false)));
  document.addEventListener('keydown', (e) => { if (e.key === 'Escape') toggleMobileMenu(false); });

  // ---------- 3. Hero slideshow cinematográfico (Ken Burns + crossfade) ----------
  const heroBanner = document.querySelector('.hero__banner');
  const heroMainImg = document.querySelector('.hero__banner-img');
  const heroThumbs = Array.from(document.querySelectorAll('.hero__thumb'));

  if (heroMainImg && heroThumbs.length) {
    let heroIdx = 0;
    let heroTimer;
    const HERO_INTERVAL = 5000;

    // Helper: restart CSS animation (Ken Burns + thumb progress)
    const restartAnim = (el) => {
      el.style.animation = 'none';
      // force reflow
      void el.offsetWidth;
      el.style.animation = '';
    };

    const showHero = (n) => {
      const newIdx = (n + heroThumbs.length) % heroThumbs.length;
      if (newIdx === heroIdx && heroMainImg.src.endsWith(heroThumbs[newIdx].dataset.src.replace('../', ''))) return;
      heroIdx = newIdx;

      const src = heroThumbs[heroIdx].dataset.src;
      if (!src) return;

      // Crossfade: fade out, swap, fade in (with preload)
      heroMainImg.style.opacity = '0';
      heroMainImg.style.filter = 'blur(6px) brightness(0.95)';

      const next = new Image();
      next.onload = () => {
        heroMainImg.src = src;
        // restart Ken Burns (animation replays from 0%)
        restartAnim(heroMainImg);
        requestAnimationFrame(() => {
          heroMainImg.style.opacity = '1';
          heroMainImg.style.filter = 'blur(0) brightness(1)';
        });
      };
      next.onerror = () => { heroMainImg.src = src; heroMainImg.style.opacity = '1'; };
      next.src = src;

      // Ativa thumb correspondente + restarta a barra de progresso
      heroThumbs.forEach((x, i) => {
        x.classList.toggle('is-active', i === heroIdx);
      });
      // restart progress bar on the new active thumb (its ::after animation)
      const activeThumb = heroThumbs[heroIdx];
      restartAnim(activeThumb);
    };

    const resetHero = () => {
      clearInterval(heroTimer);
      heroTimer = setInterval(() => showHero(heroIdx + 1), HERO_INTERVAL);
    };

    heroThumbs.forEach((t, i) => {
      t.addEventListener('click', () => { showHero(i); resetHero(); });
    });

    // Pause on hover (desktop)
    heroBanner?.addEventListener('mouseenter', () => clearInterval(heroTimer));
    heroBanner?.addEventListener('mouseleave', resetHero);

    // Swipe no mobile
    let startX = 0;
    heroBanner?.addEventListener('touchstart', (e) => { startX = e.touches[0].clientX; }, { passive: true });
    heroBanner?.addEventListener('touchend', (e) => {
      const dx = e.changedTouches[0].clientX - startX;
      if (Math.abs(dx) > 40) { showHero(heroIdx + (dx < 0 ? 1 : -1)); resetHero(); }
    });

    if (!prm) resetHero();
  }

  // ---------- 4. Galeria do lazer (carrossel) ----------
  const gallery = document.getElementById('leisure-gallery');
  if (gallery) {
    const slides = Array.from(gallery.querySelectorAll('.gallery__slide'));
    const dotsWrap = gallery.querySelector('.gallery__dots');
    const prevBtn = gallery.querySelector('.gallery__nav--prev');
    const nextBtn = gallery.querySelector('.gallery__nav--next');
    let idx = 0;
    let auto;

    slides.forEach((_, i) => {
      const d = document.createElement('button');
      d.className = 'gallery__dot' + (i === 0 ? ' is-active' : '');
      d.setAttribute('aria-label', `Ir para foto ${i + 1}`);
      d.addEventListener('click', () => { go(i); reset(); });
      dotsWrap.appendChild(d);
    });
    const dots = dotsWrap.querySelectorAll('.gallery__dot');

    const go = (n) => {
      idx = (n + slides.length) % slides.length;
      slides.forEach((s, i) => s.classList.toggle('is-active', i === idx));
      dots.forEach((d, i) => d.classList.toggle('is-active', i === idx));
    };
    const reset = () => { clearInterval(auto); auto = setInterval(() => go(idx + 1), 5000); };

    prevBtn.addEventListener('click', () => { go(idx - 1); reset(); });
    nextBtn.addEventListener('click', () => { go(idx + 1); reset(); });

    if (!prm) reset();
    gallery.addEventListener('mouseenter', () => clearInterval(auto));
    gallery.addEventListener('mouseleave', reset);

    let gStartX = 0;
    gallery.addEventListener('touchstart', (e) => { gStartX = e.touches[0].clientX; }, { passive: true });
    gallery.addEventListener('touchend', (e) => {
      const dx = e.changedTouches[0].clientX - gStartX;
      if (Math.abs(dx) > 40) { go(idx + (dx < 0 ? 1 : -1)); reset(); }
    });
  }

  // ---------- 5. Smooth scroll focus a11y ----------
  document.querySelectorAll('a[href^="#"]').forEach((a) => {
    a.addEventListener('click', (e) => {
      const id = a.getAttribute('href').slice(1);
      if (!id) return;
      const target = document.getElementById(id);
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });

  // ---------- 6. Lead form (consultor section) ----------
  form?.addEventListener('submit', (e) => {
    e.preventDefault();
    const data = Object.fromEntries(new FormData(form));
    if (!data.nome || !data.telefone || !data.interesse) {
      alert('Preencha nome, WhatsApp e interesse para continuar.');
      return;
    }

    const record = { ...data, timestamp: new Date().toISOString(), source: 'consultor-form' };
    try {
      const leads = JSON.parse(localStorage.getItem('fcanoa_leads') || '[]');
      leads.push(record);
      localStorage.setItem('fcanoa_leads', JSON.stringify(leads));
    } catch (_) {}
    console.log('[LEAD CAPTURED]', record);

    const msg = `Olá! Meu nome é ${data.nome}. WhatsApp: ${data.telefone}. Interesse: ${data.interesse}. Vim pela página da Fazenda Canoa (formulário consultor).`;
    const waUrl = `https://wa.me/5562999593530?text=${encodeURIComponent(msg)}`;

    form.querySelector('.lead-form__success').hidden = false;
    form.querySelector('button[type="submit"]').disabled = true;
    // Dispara eventos de conversão ANTES do redirect (Meta Pixel Lead + Google Ads conversion + CAPI server-side)
    fireLeadEvents(data).then((eventId) => {
      // Atualiza chamada ao WP AJAX para incluir event_id (para CAPI deduplicação)
      if (window.FC_AJAX) {
        fetch(window.FC_AJAX.url, {
          method: 'POST',
          body: new URLSearchParams({ action: 'lfc_submit_lead', _nonce: window.FC_AJAX.nonce, ...data, event_id: eventId, source: 'consultor-form' }),
          credentials: 'same-origin',
          headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        }).catch(() => {});
      }
      setTimeout(() => window.open(waUrl, '_blank', 'noopener'), 200);
    });
  });

  // ---------- 7. Reveal on scroll ----------
  if ('IntersectionObserver' in window) {
    const io = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          io.unobserve(entry.target);
        }
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -60px 0px' });

    document.querySelectorAll('.sec-head, .offer__card, .type-card, .features__card, .leisure__gallery, .amenities, .loc__text, .loc__map, .dev__card, .consultor__text, .lead-form, .faq__item')
      .forEach((el) => io.observe(el));
  }

  // ---------- 8. Scrollspy — destaca menu item ativo ----------
  if ('IntersectionObserver' in window) {
    const sections = document.querySelectorAll('section[id]');
    const menuLinks = document.querySelectorAll('.hdr__menu a[href^="#"], .mobile-menu__nav a[href^="#"]');
    const spyIO = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          const id = entry.target.id;
          menuLinks.forEach(link => {
            link.classList.toggle('is-active', link.getAttribute('href') === `#${id}`);
          });
        }
      });
    }, { rootMargin: '-40% 0px -55% 0px', threshold: 0 });
    sections.forEach(s => spyIO.observe(s));
  }

  // ---------- 9. Ripple nos botões ----------
  if (!prm) {
    document.querySelectorAll('.btn').forEach((btn) => {
      btn.addEventListener('click', function (e) {
        const rect = this.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        const ripple = document.createElement('span');
        ripple.className = 'btn__ripple';
        ripple.style.left = x + 'px';
        ripple.style.top = y + 'px';
        const size = Math.max(rect.width, rect.height) * 0.6;
        ripple.style.width = ripple.style.height = size + 'px';
        this.appendChild(ripple);
        setTimeout(() => ripple.remove(), 650);
      });
    });
  }

  // ---------- 10. Modal de captação ----------
  const modal = document.getElementById('capture-modal');
  const modalForm = document.getElementById('capture-form');
  const modalContext = document.getElementById('modal-context');
  const modalInterest = document.getElementById('modal-interest');
  const modalTitle = document.getElementById('modal-title');
  const modalSubtitle = document.getElementById('modal-subtitle');

  const CAPTURE_CONTEXTS = {
    hero: {
      eyebrow: 'Fazenda Canoa · Consultor dedicado',
      title: 'Conheça a Fazenda Canoa',
      subtitle: 'Preencha seus dados e um consultor retorna em instantes com informações completas pelo WhatsApp.',
      interest: 'Informações gerais',
    },
    oferta: {
      eyebrow: 'Lançamento II · em comercialização',
      title: 'Condições exclusivas da fase atual',
      subtitle: 'Garanta sua posição no Lançamento II com parcelamento direto pela incorporadora FRSC.',
      interest: 'Informações gerais',
    },
    'lote-frente-lago': {
      eyebrow: 'Tipologia · Frente-Lago',
      title: 'Lote Frente-Lago',
      subtitle: 'Acesso privilegiado à orla de 2.000 m no Lago Corumbá IV. Vagas limitadas.',
      interest: 'Lote frente-lago',
    },
    'lote-vista-lago': {
      eyebrow: 'Tipologia · Vista-Lago',
      title: 'Lote Vista-Lago',
      subtitle: 'Panorama aberto do espelho d\'água em posição elevada, privacidade preservada.',
      interest: 'Lote vista-lago',
    },
    'lote-bosque': {
      eyebrow: 'Tipologia · Bosque',
      title: 'Lote Bosque',
      subtitle: 'Imerso em mata preservada e paisagismo natural integrado ao projeto.',
      interest: 'Lote bosque',
    },
    visita: {
      eyebrow: 'Visita presencial ou virtual',
      title: 'Agende sua visita',
      subtitle: 'Tour presencial em Silvânia ou virtual com consultor guiando pelo empreendimento.',
      interest: 'Agendamento de visita',
    },
    simulacao: {
      eyebrow: 'Simulação personalizada',
      title: 'Simule seu plano de pagamento',
      subtitle: 'Parcelamento direto pela FRSC. Receba um plano feito sob medida em minutos.',
      interest: 'Simulação de pagamento',
    },
    preco: {
      eyebrow: 'Alerta de preço',
      title: 'Avise-me sobre o preço',
      subtitle: 'Receba atualizações de valores, disponibilidade e novas fases.',
      interest: 'Alerta de preço',
    },
    consultor: {
      eyebrow: 'Atendimento especializado',
      title: 'Falar com um consultor',
      subtitle: 'Resposta garantida no mesmo dia útil. Seu consultor dedicado te atende no WhatsApp.',
      interest: 'Informações gerais',
    },
    book: {
      eyebrow: 'Material exclusivo',
      title: 'Receba o book completo por WhatsApp',
      subtitle: 'Plantas, diferenciais, infraestrutura e condições comerciais — enviado direto no seu WhatsApp em minutos.',
      interest: 'Book do empreendimento',
      mode: 'book',
      submitLabel: 'Receber book por WhatsApp',
    },
  };

  let lastFocused = null;

  const openModal = (contextKey) => {
    const ctx = CAPTURE_CONTEXTS[contextKey] || CAPTURE_CONTEXTS.consultor;
    if (modalContext) modalContext.value = contextKey || 'consultor';
    if (modalTitle) modalTitle.textContent = ctx.title;
    if (modalSubtitle) modalSubtitle.textContent = ctx.subtitle;
    const eyebrowEl = modal.querySelector('.modal__eyebrow');
    if (eyebrowEl) eyebrowEl.textContent = ctx.eyebrow;
    if (modalInterest) modalInterest.value = ctx.interest;

    // Alterna modo do modal (book = só nome + telefone)
    const panel = modal.querySelector('.modal__panel');
    const interestSelect = modal.querySelector('#modal-interest');
    if (ctx.mode === 'book') {
      panel.classList.add('modal--book');
      if (interestSelect) interestSelect.required = false;
    } else {
      panel.classList.remove('modal--book');
      if (interestSelect) interestSelect.required = true;
    }

    lastFocused = document.activeElement;
    modal.setAttribute('aria-hidden', 'false');
    document.body.classList.add('modal-open');

    // Reset success state
    const successEl = modal.querySelector('.modal__success');
    if (successEl) successEl.hidden = true;
    if (modalForm) {
      modalForm.hidden = false;
      const btn = modalForm.querySelector('.modal__submit');
      btn.disabled = false;
      // Troca o label do botão conforme o contexto
      const label = ctx.submitLabel || 'Enviar e conversar no WhatsApp';
      btn.innerHTML = label + ' <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M5 12h14M13 5l7 7-7 7"/></svg>';
    }

    // Focus name field after animation
    setTimeout(() => modal.querySelector('input[name="nome"]')?.focus(), 300);
  };

  const closeModal = () => {
    modal.setAttribute('aria-hidden', 'true');
    document.body.classList.remove('modal-open');
    if (modalForm) modalForm.reset();
    if (lastFocused && lastFocused.focus) lastFocused.focus();
  };

  // Triggers: qualquer elemento com data-capture abre o modal com o contexto
  document.querySelectorAll('[data-capture]').forEach((el) => {
    el.addEventListener('click', (e) => {
      e.preventDefault();
      openModal(el.dataset.capture);
    });
  });

  // Fechar modal
  modal?.querySelectorAll('[data-modal-close]').forEach((el) => el.addEventListener('click', closeModal));
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && modal?.getAttribute('aria-hidden') === 'false') closeModal();
  });

  // Submit do modal → persiste + abre WhatsApp
  modalForm?.addEventListener('submit', (e) => {
    e.preventDefault();
    const data = Object.fromEntries(new FormData(modalForm));
    const isBookMode = modal.querySelector('.modal__panel').classList.contains('modal--book');

    // Validação: book precisa só de nome + telefone; outros precisam também de interesse
    if (!data.nome || !data.telefone) {
      alert('Preencha seu nome e WhatsApp para continuar.');
      return;
    }
    if (!isBookMode && !data.interesse) {
      alert('Selecione seu interesse para continuar.');
      return;
    }

    // Se for book, força o interesse pra "Book do empreendimento"
    if (isBookMode) data.interesse = 'Book do empreendimento';

    const record = { ...data, timestamp: new Date().toISOString(), source: isBookMode ? 'book' : 'modal' };
    try {
      const leads = JSON.parse(localStorage.getItem('fcanoa_leads') || '[]');
      leads.push(record);
      localStorage.setItem('fcanoa_leads', JSON.stringify(leads));
    } catch (_) {}
    console.log('[LEAD CAPTURED]', record);

    // POST para WP em paralelo (não bloqueia WhatsApp)
    submitLeadToWP({ ...data, source: isBookMode ? 'book' : 'modal' });

    // Monta mensagem contextualizada (diferente se for book)
    let msg;
    if (isBookMode) {
      msg = `Olá! Meu nome é ${data.nome}. WhatsApp: ${data.telefone}. Gostaria de receber o *book completo* da Reserva Fazenda Canoa.`;
    } else {
      const emailPart = data.email ? ` E-mail: ${data.email}.` : '';
      msg = `Olá! Meu nome é ${data.nome}. WhatsApp: ${data.telefone}.${emailPart} Interesse: ${data.interesse}. Vim pela landing page da Fazenda Canoa (${data.contexto || 'geral'}).`;
    }
    const waUrl = `https://wa.me/5562999593530?text=${encodeURIComponent(msg)}`;

    // Mostra success state
    modalForm.hidden = true;
    const successEl = modal.querySelector('.modal__success');
    if (successEl) {
      successEl.hidden = false;
      const h3 = successEl.querySelector('h3');
      const p = successEl.querySelector('p');
      if (isBookMode) {
        if (h3) h3.textContent = 'Enviando seu book!';
        if (p) p.textContent = 'Estamos abrindo o WhatsApp para enviar o book completo...';
      } else {
        if (h3) h3.textContent = 'Recebemos seu contato!';
        if (p) p.textContent = 'Estamos te redirecionando para o WhatsApp do consultor...';
      }
    }

    // Dispara eventos de conversão antes do WhatsApp (Pixel + Google Ads + CAPI via WP)
    fireLeadEvents(data).then((eventId) => {
      if (window.FC_AJAX) {
        fetch(window.FC_AJAX.url, {
          method: 'POST',
          body: new URLSearchParams({ action: 'lfc_submit_lead', _nonce: window.FC_AJAX.nonce, ...data, event_id: eventId, source: isBookMode ? 'book' : 'modal' }),
          credentials: 'same-origin',
          headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        }).catch(() => {});
      }
      setTimeout(() => {
        window.open(waUrl, '_blank', 'noopener');
        setTimeout(closeModal, 1800);
      }, 500);
    });
  });

  // ---------- 11. Widget flutuante — toggle entre expandido e mini FAB ----------
  const floatBar = document.getElementById('float-bar');
  const floatClose = document.getElementById('float-bar-close');
  const floatMini = document.getElementById('float-mini');
  const FLOAT_STORAGE_KEY = 'fcanoa_float_collapsed';

  const collapseFloat = () => {
    floatBar?.classList.add('is-collapsed');
    floatMini?.classList.add('is-visible');
    try { localStorage.setItem(FLOAT_STORAGE_KEY, '1'); } catch (_) {}
  };
  const expandFloat = () => {
    floatBar?.classList.remove('is-collapsed');
    floatMini?.classList.remove('is-visible');
    try { localStorage.setItem(FLOAT_STORAGE_KEY, '0'); } catch (_) {}
  };

  floatClose?.addEventListener('click', collapseFloat);
  floatMini?.addEventListener('click', expandFloat);

  // Restaura estado salvo (sem animação no load inicial se estava minimizado)
  try {
    if (localStorage.getItem(FLOAT_STORAGE_KEY) === '1') {
      floatBar?.classList.add('is-collapsed');
      // Mostra mini após o initial paint para evitar flash
      requestAnimationFrame(() => floatMini?.classList.add('is-visible'));
    }
  } catch (_) {}

  // ---------- 12. Card tilt sutil no mousemove (só em ponteiros finos/desktop) ----------
  if (!prm && window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
    document.querySelectorAll('.type-card').forEach((card) => {
      card.addEventListener('mousemove', (e) => {
        const rect = card.getBoundingClientRect();
        const x = (e.clientX - rect.left) / rect.width - 0.5;
        const y = (e.clientY - rect.top) / rect.height - 0.5;
        card.style.transform = `translateY(-6px) perspective(1000px) rotateX(${y * -3}deg) rotateY(${x * 3}deg)`;
      });
      card.addEventListener('mouseleave', () => {
        card.style.transform = '';
      });
    });
  }
})();
