export const initRemoveFooterCta = () => {
  const contactForm = document.querySelector('.contact .contact-form');
  const footerCta = document.querySelector('.footer-cta');
  const footer = document.querySelector('.footer');

  if (contactForm) {
    footerCta.style.display = 'none';
    footer.classList.add('footer-height');
  }
};
