export const initPageContent = () => {
  const mainContent = document.querySelector('#main-content');
  const homeHero = document.querySelector('.homepage-hero');

  if (!homeHero) {
    mainContent.classList.add('secondary-main-content');
  }
};
