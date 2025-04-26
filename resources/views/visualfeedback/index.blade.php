@extends('layout')
@section('css')

@endsection
@section('header')

@endsection
@section('content')
<form action="route('visualfeedback.store', ['sitemap' => $siteMap->key])}}" method="post">
  @csrf
{{--  {!! $feedbackImages !!}--}}
  <div class="container-fluid">

    <div id="vf-image-container" class="vf-image-container"></div>
    <a id="js-vf-add-btn" href="javascript:void(0)" class="vf-add-btn">+</a>

    <div id="js-vf-upload-modal" class="vf-upload-modal" data-is-visible="false">
      <div class="vf-upload-modal__inner">
        <a href="javascript:void(0)" id="js-vf-upload-modal__close" class="vf-upload-modal__close">×</a>
        <div class="vf-file-uploader">
          <input id="js-vf-file-uploader__input" class="vf-file-uploader__input" type="file" accept="image/*">
        </div><!-- /.vf-file-uploader -->
      </div><!-- /.vf-upload-modal__inner -->
    </div><!-- /.vf-upload-modal -->
  </div>
</form>

@endsection
@section('scripts')
  <style>
    .vf-image-container {
      width: 1000px;
    }
    .vf-add-btn {
      width: 50px;
      height: 50px;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: black;
      border-radius: 50%;
      font-size: 30px;
      font-weight: bold;
      color: white !important;
      text-decoration: none !important;
      transform: translateX(-50%);
      margin: 50px auto;
    }
    .vf-page {
      margin-bottom: 50px;
    }
    .vf-page__header {
      position: relative;
      text-align: center;
      padding: 10px 0;
    }
    .vf-page__header__ttl {
      font-size: 30px;
      font-weight: bold;
    }
    .vf-page__delete-btn {
      width: 35px;
      height: 35px;
      display: flex;
      justify-content: center;
      align-items: center;
      position: absolute;
      right: 0;
      top: 50%;
      background-color: black !important;
      font-size: 20px;
      color: white !important;
      text-decoration: none !important;
      cursor: pointer;
      border-radius: 50%;
      transform: translateY(-50%);
    }
    .vf-page__body {
      position: relative;
    }
    .vf-page__img {}

    .vf-page__comment-list {
      width: 100%;
      position: absolute;
      top: 0;
      left: 0;
      list-style-type: none;
      padding: 0;
      margin: 0;
    }

    .vf-page__comment-list__item {}

    .vf-comment-rect { }
    .vf-comment-rect::before {
      display: none;
    }

    .vf-comment-rect[data-comment-is-active="true"] {
      border-color: rgba(255, 0, 0, 0.5);
      background-color: rgba(255, 255, 0, 0.5);
      z-index: 11;
    }

    .vf-comment-rect__number {
      width: 1.5em;
      height: 1.5em;
      display: flex;
      justify-content: center;
      align-items: center;
      position: absolute;
      left: -1em;
      top: -1em;
      background: red;
      border-radius: 1.5em;
      font-size: 12px;
      color: #fff;
      line-height: 1;
    }

    .vf-comment-rect__link {
      display: block;
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
    }

    .vf-comment-rect__delete-btn {
      width: 1.5em;
      height: 1.5em;
      display: none;
      justify-content: center;
      align-items: center;
      position: absolute;
      top: -1em;
      right: -1em;
      background-color: black !important;
      font-size: 12px;
      color: white !important;
      line-height: 1;
      text-decoration: none !important;
      cursor: pointer;
      border-radius: 50%;
    }
    .vf-comment-rect[data-comment-is-active="true"] .vf-comment-rect__delete-btn {
      display: flex;
    }

    .vf-comment-popup {
      top: 20%;
      left: calc(100% + 10px);
    }

    .vf-comment-popup.__show {
      z-index: 9;
    }

    .vf-image-container[data-dragging="true"] .vf-comment-rect {
      pointer-events: none;
    }

    .vf-image-container[data-dragging="true"] .vf-comment-rect__number,
    .vf-image-container[data-dragging="true"] .vf-comment-rect__delete-btn,
    .vf-image-container[data-dragging="true"] .vf-comment-popup {
      display: none;
    }

    .vf-image-container[data-moving="true"] .vf-comment-rect__link {
      cursor: move;
    }

    .vf-upload-modal[data-is-visible="false"] {
      display: none;
    }
    .vf-upload-modal {
      display: flex;
      justify-content: center;
      align-items: center;
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(0, 0, 0, 0.3);
      z-index: 20;
    }
    .vf-upload-modal__inner {
      width: 700px;
      height: 350px;
      position: relative;
      background-color: white;
      box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.3);
      padding: 30px;
    }

    .vf-upload-modal__close {
      width: 30px;
      height: 30px;
      display: flex;
      justify-content: center;
      align-items: center;
      position: absolute;
      top: -15px;
      right: -15px;
      background-color: black;
      border-radius: 50%;
      font-size: 16px;
      font-weight: bold;
      color: white !important;
      text-decoration: none !important;
    }

    .vf-file-uploader { }
    .vf-file-uploader__input { }
    .vf-file-uploader__drop-box {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 400px;
      height: 200px;
      border: dotted 3px black;
      border-radius: 7px;
      background-color: rgba(0, 0, 0, 0.1);
      margin-top: 30px;
    }
    .vf-file-uploader__drop-box__txt {
      font-size: 20px;
      font-weight: bold;
    }
  </style>

  <script>
class VFPageStore {
  state = {
    items: []
  }
  count = 0

  updateDOM() {
    const $container = document.querySelector('#vf-image-container')
    let html = this.state.items.map(item => {
      const { id, title, src } = item
      return `
        <section class="vf-page" data-page-id="${id}">
          <header class="vf-page__header">
            <h2 class="vf-page__header__ttl">${title}</h2>
            <a class="vf-page__delete-btn" data-page-id="${id}">×</a>
          </header>
          <div class="vf-page__body">
            <img src="${src}" alt="" class="vf-image" data-page-id="${id}">
            <ul class="vf-page__comment-list"></ul>
          </div>
        </section>
      `
    }).join('\n')
    $container.innerHTML = html
    const $imgs = document.querySelectorAll(`.vf-image`)
    $imgs.forEach($img => {
      setImgEventListener($img)
    })
    const $deleteBtns = document.querySelectorAll(`.vf-page__delete-btn`)
    $deleteBtns.forEach($deleteBtn => {
      setPageDeleteEventListener($deleteBtn)
    })
  }

  add(src, title, id)  {
    const { items } = this.state
    this.state.items = [
      ...items,
      {
        id: id === undefined ? this.count : id,
        title,
        src
      }
    ]
    this.updateDOM()
    this.count += 1
  }

  editTitle(id, title) {
    this.state.items = this.state.items.map(item => {
      if (item.id !== Number(id)) {
        item.title = title
      }
      return item
    })
    this.updateDOM()
  }

  remove(id) {
    this.state.items = this.state.items.filter(item => {
      return item.id !== Number(id)
    })
    this.updateDOM()
  }
}

class VFCommentStore {
  state = {
    items: [],
    shownId: null
  }
  count = 0

  updateDOM() {
    const $commentLists = document.querySelectorAll('.vf-page__comment-list')
    $commentLists.forEach(list => {
      list.innerHTML = ''
    })
    this.state.items.forEach((item, i) => {
      const { id, pageId, frame, comment } = item
      const { width, height, x, y } = frame
      const $targetList = document.querySelector(`.vf-page[data-page-id="${pageId}"] .vf-page__comment-list`)
      const html = `
        <li class="vf-page__comment-list__item" data-comment-id="${id}">
          <div
            class="vf-comment-rect"
            data-comment-id="${id}"
            data-comment-is-active="${this.state.shownId === id}"
            style="width: ${width}px; height: ${height}px; top: ${y}px; left: ${x}px;">
            <a class="vf-comment-rect__link" data-comment-id="${id}"></a>
            <span class="vf-comment-rect__number">${i + 1}</span>
            <a class="vf-comment-rect__delete-btn" data-comment-id="${id}">×</a>
            <input type="hidden" name="comment_rect[${id}]" value="">
            <div class="vf-comment-popup${this.state.shownId === id ? ' __show' : ''}" data-comment-id="${id}">
              <label for="vf-comment-${id}" class="vf-comment-popup-num">${i + 1}</label>
              <textarea id="vf-comment-${id}" name="comment[${id}]" data-comment-id="${id}" class="vf-comment__textarea vf-comment-popup-body">${comment}</textarea>
            </div>
          </div>
        </li>
      `
      $targetList.insertAdjacentHTML('beforeend', html)
    })
    const $rectLinks = document.querySelectorAll(`.vf-comment-rect__link`)
    const $comments = document.querySelectorAll(`.vf-comment__textarea`)
    const $deleteBtns = document.querySelectorAll(`.vf-comment-rect__delete-btn`)
    $rectLinks.forEach($link => {
      setRectEventListener($link)
    })
    $comments.forEach($comment => {
      setCommentEventListener($comment)
    })
    $deleteBtns.forEach($deleteBtn => {
      setCommentDeleteEventListener($deleteBtn)
    })
  }

  add(payload) {
    const { pageId, frame, comment } = payload
    const { items } = this.state
    this.state.items = [
      ...items,
      {
        id: this.count,
        pageId,
        frame,
        comment
      }
    ]
    this.updateDOM()
    this.show(this.count)
    this.count += 1
  }

  editFrame(id, frame) {
    this.state.items = this.state.items.map(item => {
      if (item.id === Number(id)) {
        item = {
          ...item,
          frame
        }
      }
      return item
    })
    this.updateDOM()
  }

  editPosition(id, position) {
    const { x, y } = position
    this.state.items = this.state.items.map(item => {
      if (item.id === Number(id)) {
        item = {
          ...item,
          frame: {
            ...item.frame,
            x,
            y
          }
        }
      }
      return item
    })
    this.updateDOM()
  }

  editComment(id, comment) {
    this.state.items = this.state.items.map(item => {
      if (item.id === Number(id)) {
        item = {
          ...item,
          comment
        }
      }
      return item
    })
    this.updateDOM()
  }

  remove(id) {
    this.state.items = this.state.items.filter(item => {
      return item.id !== Number(id)
    })
    this.updateDOM()
  }

  show(id) {
    this.state.shownId = Number(id)
    this.updateDOM()
  }
}

const pageStore = new VFPageStore()
const commentStore = new VFCommentStore()

const setImgEventListener = ($target) => {
  const $container = document.querySelector('#vf-image-container')
  let $rect = null
  let frame = null
  let id = null
  let mouseDownFlag = false
  const handleMousedown = (e) => {
    e.preventDefault()
    const { pageId } = $target.dataset
    mouseDownFlag = true
    $container.dataset.dragging = 'true'
    frame = {
      width: 0,
      height: 0,
      x: e.offsetX,
      y: e.offsetY,
    }
    commentStore.add({
      pageId,
      frame,
      comment: ''
    })
    const { items } = commentStore.state
    id = items[items.length - 1].id
    $rect = document.querySelector(`.vf-comment-rect[data-comment-id="${id}"]`)
  }

  const handleMousemove = (e) => {
    e.preventDefault()
    if (!mouseDownFlag) return;
    const { offsetX, offsetY } = e
    const { x, y } = frame
    const width = offsetX - x
    const height = offsetY - y
    $rect.style.width = `${Math.abs(width)}px`
    $rect.style.height = `${Math.abs(height)}px`
    if (width < 0) {
      $rect.style.left = `${offsetX}px`
    }
    if (height < 0) {
      $rect.style.top = `${offsetY}px`
    }
  }

  const handleMouseup = (e) => {
    e.preventDefault();
    if (!mouseDownFlag) return;
    mouseDownFlag = false
    $container.dataset.dragging = false

    const { offsetX, offsetY } = e
    const { x, y } = frame
    const width = offsetX - x
    const height = offsetY - y

    if(Math.abs(width) <= 8 &&
      Math.abs(height) <= 8) {
      commentStore.remove(id)
    } else {
      commentStore.editFrame(
        id,
        {
          width: Math.abs(width),
          height: Math.abs(height),
          x: width < 0 ? offsetX : x,
          y: height < 0 ? offsetY : y
        })
    }
  }

  $target.addEventListener('mousedown', handleMousedown)
  $target.addEventListener('mousemove', handleMousemove, true);
  $target.addEventListener('mouseup', handleMouseup)
  $target.addEventListener('mouseleave', handleMouseup)
}

const setRectEventListener = ($target) => {
  const $container = document.querySelector('#vf-image-container')
  const $rectContainer = $target.parentElement
  const { commentId } = $target.dataset
  let rectPosition = {
    x: Number($rectContainer.style.left.replace('px', '')),
    y: Number($rectContainer.style.top.replace('px', ''))
  }
  let basePosition = null
  let mouseDownFlag = false

  const handleMousedown = (e) => {
    e.preventDefault()
    mouseDownFlag = true
    $container.dataset.moving = 'true'
    basePosition = {
      x: e.screenX,
      y: e.screenY,
    }
  }

  const handleMousemove = (e) => {
    e.preventDefault()
    if (!mouseDownFlag) return;
    const { screenX, screenY } = e
    const { x, y } = basePosition
    $rectContainer.style.left = `${rectPosition.x + screenX - x}px`
    $rectContainer.style.top = `${rectPosition.y + screenY - y}px`
  }

  const handleMouseup = (e) => {
    e.preventDefault();
    if (!mouseDownFlag) return;
    mouseDownFlag = false
    $container.dataset.moving = false
    const { screenX, screenY } = e
    const { x, y } = basePosition
    commentStore.editPosition(
      commentId,
      {
        x: rectPosition.x + screenX - x,
        y: rectPosition.y + screenY - y
      })
    commentStore.show(commentId)
  }

  $target.addEventListener('mousedown', handleMousedown)
  $target.addEventListener('mousemove', handleMousemove, true);
  $target.addEventListener('mouseup', handleMouseup)
  $target.addEventListener('mouseleave', handleMouseup)
}

const setCommentEventListener = ($target) => {
  const handleChange = (e) => {
    e.preventDefault()
    const { commentId } = $target.dataset
    commentStore.editComment(commentId, e.target.value)
  }
  $target.addEventListener('change', handleChange)
}

const setPageDeleteEventListener = ($target) => {
  const handleClick = (e) => {
    e.preventDefault()
    const { pageId } = $target.dataset
    pageStore.remove(pageId)
  }
  $target.addEventListener('click', handleClick)
}

const setCommentDeleteEventListener = ($target) => {
  const handleClick = (e) => {
    e.preventDefault()
    const { commentId } = $target.dataset
    commentStore.remove(commentId)
  }
  $target.addEventListener('click', handleClick)
}

{
  /* Modal */
  const $addBtn = document.querySelector('#js-vf-add-btn')
  const $uploadModal = document.querySelector('#js-vf-upload-modal')
  const $closeBtn = document.querySelector('#js-vf-upload-modal__close')
  $addBtn.addEventListener('click', () => {
    $uploadModal.dataset.isVisible = true
  })
  $closeBtn.addEventListener('click', () => {
    $uploadModal.dataset.isVisible = false
  })
}

{
  /* File Upload */
  const $input = document.querySelector('#js-vf-file-uploader__input')
  const reader = new FileReader()
  reader.addEventListener('load', (e) => {
    const src = e.target.result
    const title = `PAGE ${pageStore.state.items.length + 1}`
    pageStore.add(src, title)
    commentStore.updateDOM()
    $input.value = ''
  })
  $input.addEventListener('change', (e) => {
    reader.readAsDataURL(e.target.files[0])
  })
}

{
  /* File Upload Drop */
  // const $dropBox = document.querySelector('#js-vf-file-uploader__drop-box')
  // $dropBox.addEventListener('drop', function(e) {
  //   debugger
  // }, false)
}

{
  /* load Data */
  const initialData = {!! $feedbackImages !!};
  initialData.feedback_image.forEach((image) => {
    pageStore.add('/feedback/' + initialData.key + '/' + image.filename, image.title, image.id)
    image.feedback_comment.forEach((comment)=>{
      commentStore.add({
          pageId: image.id,
          comment: comment.comment,
          frame: {
              width: comment.width,
              height: comment.height,
              x: comment.x,
              y: comment.y,
          }
      })
      // commentStore.show(comment.id)
    })
  })
  commentStore.updateDOM()
  pageStore.updateDOM()
}

  </script>
@endsection
