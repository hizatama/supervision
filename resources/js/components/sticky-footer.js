(function () {
  let $wrapper;
  let $inner;
  let isAttached = false;

  function registerEventListeners() {
    window.addEventListener('scroll', scrollHandler, {passive: true})
    window.addEventListener('resize', scrollHandler, {passive: true})
  }

  function scrollHandler() {
    const wRect = $wrapper.getBoundingClientRect();
    if (wRect.bottom <= window.innerHeight) {
      if (!isAttached) {
        setAttach(true)
      }
    } else if (isAttached) {
      setAttach(false)
    }
  }

  function setAttach(val) {
    if (isAttached !== val) {
      if(isAttached) {
        $wrapper.classList.remove('is-attached');
      } else {
        $wrapper.classList.add('is-attached');
      }
    }
    isAttached = val;
  }

  document.addEventListener('DOMContentLoaded', function(){
    $wrapper = document.querySelector('.sticky-footer');
    $inner = document.querySelector('.sticky-footer__inner');
    registerEventListeners();
  })
})();
