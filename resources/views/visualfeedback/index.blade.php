@extends('layout')
@section('css')

@endsection
@section('header')

@endsection
@section('content')
  {{Form::open(['route'=>'visualfeedback.store', 'method' => 'post'])}}
  <div class="container-fluid">
    <div id="vf-image-container" class="vf-image-container">
      <img src="img/design.png" alt="" class="vf-image">

      <a class="vf-comment-rect" data-comment-id="1" style="width: 3.21%; height: 4.2%; left: 50%; top: 23.5%"></a>
      <div class="vf-comment-popup" data-comment-id="1">
        <label for="vf-comment-1" class="vf-comment-popup-num">1</label>
        <textarea id="vf-comment-1" class="vf-comment-popup-body">ここをあれしてください</textarea>
      </div>

    </div>
  </div>
  {{Form::close()}}

  <template id="vf-comment-rect-template">
    <a class="vf-comment-rect" data-comment-id="%id%">
      <input type="hidden" name="comment_rect[%id%]" value="">
    </a>
  </template>
  <template id="vf-comment-popup-template">
    <div class="vf-comment-popup" data-comment-id="%id%">
      <label for="vf-comment-%id%" class="vf-comment-popup-num">%id%</label>
      <textarea id="vf-comment-%id%" name="comment[%id%]" class="vf-comment-popup-body"></textarea>
    </div>
  </template>
@endsection
@section('scripts')
  <script>
    const ACTIVE_CLASS = '__show';

    let $container = document.querySelector('#vf-image-container');
    let $image = document.querySelector('.vf-image');
    let $comments = document.querySelectorAll('.vf-comment-rect');

    let counter = $comments.length;

    let mouseDownFlag = false;
    let $newRect, $newPopup, newId, startPosition;
    let $templateRect = document.getElementById('vf-comment-rect-template');
    let $templatePopup = document.getElementById('vf-comment-popup-template');
    let imageTop = $image.offsetTop,
      imageLeft = $image.offsetLeft,
      imageWidth = $image.width,
      imageHeight = $image.height,
      scale = $container.clientWidth / imageWidth;

    window.addEventListener('resize', function(){
      imageTop = $image.offsetTop;
      imageLeft = $image.offsetLeft;
      imageWidth = $image.width;
      imageHeight = $image.height;
      scale = $container.clientWidth / imageWidth;
      scale = $container.clientWidth / imageWidth;
    });

    function getLeftFromAbsolute(x) {
      return (x - imageLeft) / imageWidth * 100.0 * scale;
    }

    function getTopFromAbsolute(y) {
      return (y - imageTop) / imageHeight * 100.0 * scale;
    }

    function getWidthFromAbsolute(width) {
      return width / imageWidth * 100.0 * scale;
    }

    function getHeightFromAbsolute(height) {
      return height / imageHeight * 100.0 * scale;
    }

    $container.addEventListener('mousedown', function (e) {
      if (e.target !== $image) return;

      document.querySelectorAll('.vf-comment-popup').forEach(($popup)=>{
        $popup.classList.remove(ACTIVE_CLASS);
      });

      mouseDownFlag = true;
      counter++;
      let clone = document.importNode($templateRect.content, true);
      $newRect = clone.firstElementChild;
      $newRect.innerHTML = $newRect.innerHTML.replace(/%id%/g, counter);
      $newRect.setAttribute('data-comment-id', counter);
      $newRect.classList.add('__dragging');
      $newRect.style.top = getTopFromAbsolute(e.offsetY) + '%';
      $newRect.style.left = getLeftFromAbsolute(e.offsetX) + '%';
      $newRect.style.width = '0%';
      $newRect.style.height = '0%';
      $container.appendChild(clone);

      startPosition = {x: e.offsetX, y: e.offsetY};
      e.preventDefault();
    });
    $container.addEventListener('mousemove', function (e) {
      // if (e.target !== $image) return;
      if (!mouseDownFlag) return;

      let x1 = startPosition.x,
        x2 = e.offsetX,
        y1 = startPosition.y,
        y2 = e.offsetY;

      $newRect.style.left = getLeftFromAbsolute(Math.min(x1, x2)) + '%';
      $newRect.style.top = getTopFromAbsolute(Math.min(y1, y2)) + '%';
      $newRect.style.width = getWidthFromAbsolute(Math.abs(x1 - x2)) + '%';
      $newRect.style.height = getHeightFromAbsolute(Math.abs(y1 - y2)) + '%';

      e.preventDefault();
    }, true);
    $container.addEventListener('mouseup', function (e) {
      if(!mouseDownFlag) return;
      mouseDownFlag = false;
      e.preventDefault();


      let x1 = startPosition.x,
        x2 = e.offsetX,
        y1 = startPosition.y,
        y2 = e.offsetY;
      if(Math.abs(e.offsetX - startPosition.x) <= 8 &&
        Math.abs(e.offsetY - startPosition.y) <= 8) {
        counter--;
        $newRect.remove();
        return;
      }

      $newRect.classList.remove('__dragging');
      $newRect.classList.add('__editing');

      // make New Popup
      let clone = document.importNode($templatePopup.content, true);
      $newPopup = clone.firstElementChild;
      $newPopup.classList.add(ACTIVE_CLASS);
      $newPopup.setAttribute('data-comment-id', counter);
      $newPopup.innerHTML = $newPopup.innerHTML.replace(/%id%/g, counter);
      setPopupPosition($newPopup, $newRect);
      $container.appendChild(clone);
      $newPopup.querySelector('textarea').focus();
    });

    function setPopupPosition($popup, $rect) {
      $popup.style.top = parseFloat($rect.style.top) + parseFloat($rect.style.height) / 2 + '%';
      $popup.style.left = parseFloat($rect.style.left) + parseFloat($rect.style.width) + '%';
    }

    $container.addEventListener('click', function (e) {
      if (!e.target.classList.contains('vf-comment-rect')) return;

      let $el = e.target;
      let id = $el.getAttribute('data-comment-id');
      let $popup = document.querySelector('[data-comment-id="' + id + '"].vf-comment-popup');

      $popup.classList.toggle(ACTIVE_CLASS);
      setPopupPosition($popup, $el);
      e.preventDefault();
    });
  </script>
@endsection
