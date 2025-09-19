import 'bootstrap';   // Loads Bootstrap JS (needs Popper for dropdowns/tooltips)
import './theme.js';  // Your custom JS

import Alpine from 'alpinejs';


if (!window.Alpine) {
    window.Alpine = Alpine;
    Alpine.start();
}
