export const initResourceFilter = () => {
  const selects = document.querySelectorAll(
    '.mdg-blog-index_filter--select_input',
  );
  const clear = document.getElementById('select_clear');
  const textInput = document.querySelectorAll(
    '.mdg-blog-index_filter--text_input',
  );

  if (!selects || !selects.length) {
    return;
  }

  const toggleSelect = (select) => {
    if (select.value === '') {
      select.classList.add('inactive');
    } else {
      select.classList.remove('inactive');
    }
  };
  selects.forEach((select) => {
    toggleSelect(select);
    select.addEventListener('change', () => {
      toggleSelect(select);
    });
  });

  // Clear inputs on click
  clear.addEventListener('click', () => {
    textInput.forEach(() => {
      textInput[0].value = '';
    });
  });
};
