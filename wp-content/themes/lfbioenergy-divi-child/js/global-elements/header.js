export const initHeader = () => {
  const mobileMenuToggle =
    document.getElementsByClassName('mobile-menu-toggle');
  if (!mobileMenuToggle?.length) {
    return;
  }

  const mobileMenu = document.querySelectorAll('.mobile-menu');

  mobileMenuToggle[0].addEventListener('click', () => {
    mobileMenuToggle[0].classList.toggle('close');
    mobileMenu.forEach((element) => {
      element.classList.toggle('open');
    });
  });

  const subMenuToggle = document.querySelectorAll('.menu-item-has-children a');
  for (let i = 0; i < subMenuToggle.length; i++) {
    subMenuToggle[i].addEventListener('click', () => {
      const menu = subMenuToggle[i].parentNode.querySelector(':scope > ul');
      menu.classList.toggle('open-sub-menu');
      subMenuToggle[i].classList.toggle('active-menu');
    });
  }

  const mainNav = document.querySelector('#main-header');
  const nainNavFixed = document.querySelector('.et_fixed_nav #main-header');
  const bodyContent = document.querySelector('#et-main-area');
  const mainHeader = document.querySelector('#main-header');
  if (mainNav) {
    // Handle scroll event for removing the class
    window.onscroll = function () {
      if (window.scrollY > 1) {
        mainNav.classList.remove('et-fixed-header');
        nainNavFixed.classList.add('nav-scroll');
        bodyContent.classList.add('body-position');
        mainHeader.classList.add('nav-height');
      }
    };
  }

  const navSubMen = document.querySelectorAll(
    '#et-top-navigation .menu-item-has-children a',
  );
  for (let i = 0; i < navSubMen.length; i++) {
    navSubMen[i].classList.add('submenu-arrow');
  }
};
