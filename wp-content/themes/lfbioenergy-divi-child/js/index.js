// Shortcodes
// import { initResourceFilter } from './shortcodes/resource-filter';

// Global Elements
import { initHeader } from './global-elements/header';
// import { initFooterSubscribe } from './global-elements/footer-subscribe';

// Modules
import { initRemoveFooterCta } from './modules/footer-cta';

// -----------------------------------------------------------------------------

const init = () => {
  // Shortcodes
  // Global Elements
  initHeader();
  // initFooterSubscribe();

  // Modules
  initRemoveFooterCta();
};
init();
