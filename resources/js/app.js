import 'bootstrap';   // Loads Bootstrap JS (needs Popper for dropdowns/tooltips)
import './theme.js';  // Your custom JS

import Alpine from 'alpinejs';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import TomSelect from 'tom-select';
import 'tom-select/dist/css/tom-select.bootstrap5.css';

if (!window.Alpine) {
    window.Alpine = Alpine;
    Alpine.start();
}



/* WYSWYG FORM */

function initEditors() {
    document.querySelectorAll("[data-editor]").forEach((el) => {
        if (!el.ckeditorInstance) {
            ClassicEditor
                .create(el)
                .then(editor => {
                    el.ckeditorInstance = editor;
                
                    // Keep Livewire updated
                    editor.model.document.on('change:data', () => {
                        el.value = editor.getData();
                        el.dispatchEvent(new Event('input', { bubbles: true }));
                    });
                })
                .catch(error => {
                    console.error(error);
                });
        }
    });
}

// Run once on page load
document.addEventListener("DOMContentLoaded", initEditors);

// Re-run after every Livewire update
document.addEventListener("livewire:navigated", initEditors); // for Livewire v3 navigation
document.addEventListener("livewire:load", initEditors);       // initial Livewire load
document.addEventListener("livewire:update", initEditors);     // when Livewire refreshes DOM


/* Tom Select */
document.addEventListener("DOMContentLoaded", initTomSelect);

function initTomSelect() {
    document.querySelectorAll("select[data-tom-select]").forEach((el) => {
        if (!el.tomselect) { // only initialize if not already initialized
            el.tomselect = new TomSelect(el, { plugins: ["remove_button"] });
        }
    });
}

document.addEventListener("livewire:load", () => {
    initTomSelect(); // run on initial page load
});

document.addEventListener("livewire:update", () => {
    initTomSelect(); // run after Livewire replaces DOM
});

