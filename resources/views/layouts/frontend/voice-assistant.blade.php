<!-- ═══════════════════════════════════════════════════════════════
     PLD VOICE ASSISTANT (HEADLESS / BACKGROUND ENGINE)
     Fitur membaca otomatis teks saat di-hover atau dipilih (blok teks)
     di seluruh halaman frontend tanpa menampilkan tombol melayang (hidden UI).
═══════════════════════════════════════════════════════════════ -->
<style>
  /* Sembunyikan semua tombol / widget visual di frontend sesuai permintaan */
  #pldVoiceAssistant,
  .pld-voice-wrapper,
  .pld-speaking-bubble {
    display: none !important;
  }

  /* Sorotan visual lembut saat elemen sedang dibacakan suaranya */
  .pld-voice-reading-active {
    outline: 2px solid #79a8e2 !important;
    outline-offset: 3px !important;
    border-radius: 4px !important;
    background-color: rgba(121, 168, 226, 0.12) !important;
    transition: outline 0.15s ease, background-color 0.15s ease !important;
    box-shadow: 0 0 10px rgba(121, 168, 226, 0.35) !important;
  }
</style>

<script>
  (function () {
    'use strict';

    // Pastikan browser mendukung Web Speech API
    if (!('speechSynthesis' in window)) {
      return;
    }

    const state = {
      enabled: true,       // Selalu aktif otomatis di background
      hoverEnabled: true,  // Membaca saat di-hover
      selectEnabled: true, // Membaca saat teks dipilih/diblok
      focusEnabled: true,  // Membaca saat navigasi tab keyboard
      rate: 1.0,           // Kecepatan normal
      currentActiveEl: null,
      indonesianVoice: null
    };

    let hoverTimeout = null;
    let isMouseSelecting = false;

    // Deteksi suara Bahasa Indonesia (id-ID)
    function pickIndonesianVoice() {
      const voices = window.speechSynthesis.getVoices();
      if (!voices || voices.length === 0) return null;

      const idVoice = voices.find(v => v.lang && (v.lang.startsWith('id') || v.lang.startsWith('in') || /indonesia/i.test(v.name)));
      if (idVoice) return idVoice;

      const defVoice = voices.find(v => v.default);
      return defVoice || voices[0];
    }

    function initVoices() {
      state.indonesianVoice = pickIndonesianVoice();
    }
    initVoices();
    if (speechSynthesis.onvoiceschanged !== undefined) {
      speechSynthesis.onvoiceschanged = initVoices;
    }

    // Hapus efek sorotan aktif
    function clearHighlight() {
      if (state.currentActiveEl) {
        state.currentActiveEl.classList.remove('pld-voice-reading-active');
        state.currentActiveEl = null;
      }
    }

    // Hentikan suara seketika
    function stopSpeaking() {
      if (hoverTimeout) {
        clearTimeout(hoverTimeout);
        hoverTimeout = null;
      }
      window.speechSynthesis.cancel();
      clearHighlight();
    }

    // Eksekusi pembacaan teks via Web Speech API
    function speakText(text, targetElement = null) {
      if (!state.enabled || !text) return;
      const cleanText = text.trim();
      if (cleanText.length === 0) return;

      // Hentikan pembacaan sebelumnya
      stopSpeaking();

      // Tambahkan efek visual highlight pada elemen yang dibaca
      if (targetElement && targetElement.nodeType === 1 && !targetElement.classList.contains('no-voice')) {
        state.currentActiveEl = targetElement;
        state.currentActiveEl.classList.add('pld-voice-reading-active');
      }

      const utterance = new SpeechSynthesisUtterance(cleanText);
      if (state.indonesianVoice) {
        utterance.voice = state.indonesianVoice;
      }
      utterance.lang = 'id-ID';
      utterance.rate = state.rate;
      utterance.pitch = 1.0;
      utterance.volume = 1.0;

      utterance.onend = function () {
        clearHighlight();
      };

      utterance.onerror = function () {
        clearHighlight();
      };

      window.speechSynthesis.speak(utterance);
    }

    // Ekstraksi teks yang bermakna dari elemen
    function extractElementText(el) {
      if (!el || el.nodeType !== 1) return '';
      if (el.closest('.no-voice')) return '';

      // Prioritaskan aria-label
      const ariaLabel = el.getAttribute('aria-label');
      if (ariaLabel && ariaLabel.trim()) return ariaLabel.trim();

      // Gambar dengan atribut alt
      if (el.tagName === 'IMG') {
        const alt = el.getAttribute('alt');
        return alt ? 'Gambar: ' + alt.trim() : '';
      }

      // Input form
      if (el.tagName === 'INPUT' || el.tagName === 'TEXTAREA') {
        const ph = el.getAttribute('placeholder');
        const val = el.value;
        if (ph) return 'Kolom: ' + ph;
        if (val) return val;
        return '';
      }

      // Abaikan container besar agar tidak membaca satu halaman penuh sekaligus
      const tag = el.tagName.toLowerCase();
      if (['body', 'html', 'main', 'section', 'header', 'footer', 'nav', 'form'].includes(tag)) {
        return '';
      }
      if (el.classList.contains('container') || el.classList.contains('row') || el.classList.contains('col')) {
        return '';
      }

      let text = '';
      if (['h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p', 'span', 'li', 'a', 'button', 'td', 'th', 'label', 'b', 'strong', 'em', 'small', 'blockquote'].includes(tag)) {
        text = el.innerText || el.textContent || '';
      } else if (el.children.length === 0) {
        text = el.innerText || el.textContent || '';
      }

      text = text.replace(/\s+/g, ' ').trim();
      if (!text || text.length === 0) return '';
      // Abaikan bila hanya simbol/ikon font
      if (/^[^\w\s\d]+$/.test(text)) return '';

      return text;
    }

    // 1. MEMBACA SAAT TEKS DIPILIH / DIBLOK (SELECTION)
    function handleSelection() {
      if (!state.selectEnabled) return;
      const selection = window.getSelection();
      const selectedText = selection ? selection.toString().trim() : '';
      if (selectedText.length > 0) {
        speakText(selectedText, null);
      }
    }

    document.addEventListener('mousedown', function () {
      isMouseSelecting = true;
    });

    document.addEventListener('mouseup', function () {
      isMouseSelecting = false;
      setTimeout(handleSelection, 60);
    });

    // 2. MEMBACA SAAT KURSOR DIARAHKAN (HOVER)
    let lastHoveredTarget = null;

    document.addEventListener('mouseover', function (e) {
      if (!state.hoverEnabled || isMouseSelecting) return;

      // Jika pengguna sedang menyeleksi teks, jangan ganggu dengan hover
      const currentSelection = window.getSelection() ? window.getSelection().toString().trim() : '';
      if (currentSelection.length > 0) return;

      const target = e.target;
      if (!target || target === lastHoveredTarget) return;
      if (target.closest('.no-voice')) return;

      // Cari elemen teks yang relevan
      const readableTarget = target.closest('h1, h2, h3, h4, h5, h6, p, a, button, li, label, th, td, blockquote, .card-title, .badge') || target;
      const textToRead = extractElementText(readableTarget);
      if (!textToRead) return;

      lastHoveredTarget = target;

      if (hoverTimeout) clearTimeout(hoverTimeout);
      hoverTimeout = setTimeout(function () {
        speakText(textToRead, readableTarget);
      }, 250); // Debounce 250ms agar pergerakan mouse cepat tidak bersuara tumpang-tindih
    });

    document.addEventListener('mouseout', function () {
      if (hoverTimeout) {
        clearTimeout(hoverTimeout);
        hoverTimeout = null;
      }
    });

    // 3. MEMBACA SAAT FOKUS TAB KEYBOARD
    document.addEventListener('focusin', function (e) {
      if (!state.focusEnabled) return;
      const target = e.target;
      if (!target || target.closest('.no-voice')) return;

      const text = extractElementText(target);
      if (text) {
        speakText(text, target);
      }
    });

    // 4. SHORTCUT TOMBOL ESC UNTUK MENDIAMKAN SUARA
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' || e.code === 'Escape') {
        stopSpeaking();
      }
    });

  })();
</script>
