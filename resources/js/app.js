import 'bootstrap';   // Loads Bootstrap JS (needs Popper for dropdowns/tooltips)
import './theme.js';  // Your custom JS

import Alpine from 'alpinejs';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

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