@if($isPassed)
  <div class="alert alert-success" role="alert">エラーはありません</div>
@endif
<div class="table--pages-wrapper">

  <table class="table table--pages table-fixed" id="table-pages">
    <thead>
    <tr>
      <th rowspan="2"></th>
      <th rowspan="2">ページタイトル</th>
      <th rowspan="2">パス</th>
      <th colspan="9">meta</th>
    </tr>
    <tr>
      <th>title</th>
      <th>keywords</th>
      <th>description</th>
      <th>og:title</th>
      <th>og:url</th>
      <th>og:image</th>
      <th>og:description</th>
      <th>favicon</th>
      <th>charset</th>
    </tr>
    </thead>
    <tbody id="table_body">
    @foreach($pages as $idx => $page)
      <tr>
        <td class="cell-status">
          @if(count($page->errors))
            <div class="alert alert-danger text-center">NG</div>
          @endif
        </td>
        <td>
          <input type="hidden" name="pages[{{$idx}}][id]" value="{{$page->id}}">
          <input type="text" name="pages[{{$idx}}][name]" value="{{$page->name}}" class="form-control" required>
        </td>
        <td class="cell-path">
          <input type="text" name="pages[{{$idx}}][path]" value="{{$page->path}}" class="form-control">
        </td>
        <td>
          <input type="checkbox" name="pages[{{$idx}}][title_use_common]" value="1" class="use-common-checkbox edit-mode" @if($page->title_use_common) checked @endif>
          <input type="text" name="pages[{{$idx}}][title]" value="{{$page->title}}" class="form-control custom-form-inline" data-common-selector="#title">
          @if(isset($page->errors['title']))
            <ul class="alert alert-danger" role="alert">
              @foreach($page->errors['title'] as $historyDetail)
                <li>{{$historyDetail->message}}</li>
              @endforeach
            </ul>
          @endif
        </td>
        <td>
          <input type="checkbox" name="pages[{{$idx}}][keywords_use_common]" value="1" class="use-common-checkbox edit-mode" @if($page->keywords_use_common) checked @endif>
          <input type="text" name="pages[{{$idx}}][keywords]" value="{{$page->keywords}}" class="form-control custom-form-inline" data-common-selector="#keywords">
          @if(isset($page->errors['keywords']))
            <ul class="alert alert-danger" role="alert">
              @foreach($page->errors['keywords'] as $historyDetail)
                <li>{{$historyDetail->message}}</li>
              @endforeach
            </ul>
          @endif
        </td>
        <td>
          <input type="checkbox" name="pages[{{$idx}}][description_use_common]" value="1" class="use-common-checkbox edit-mode" @if($page->description_use_common) checked @endif>
          <input type="text" name="pages[{{$idx}}][description]" value="{{$page->description}}" class="form-control custom-form-inline" data-common-selector="#description">
          @if(isset($page->errors['description']))
            <ul class="alert alert-danger" role="alert">
              @foreach($page->errors['description'] as $historyDetail)
                <li>{{$historyDetail->message}}</li>
              @endforeach
            </ul>
          @endif
        </td>
        <td>
          <input type="checkbox" name="pages[{{$idx}}][og_title_use_common]" value="1" class="use-common-checkbox edit-mode" @if($page->og_title_use_common) checked @endif>
          <input type="text" name="pages[{{$idx}}][og_title]" value="{{$page->og_title}}" class="form-control custom-form-inline" data-common-selector="#og_title">
          @if(isset($page->errors['og:title']))
            <ul class="alert alert-danger" role="alert">
              @foreach($page->errors['og:title'] as $historyDetail)
                <li>{{$historyDetail->message}}</li>
              @endforeach
            </ul>
          @endif
        </td>
        <td>
          <input type="checkbox" name="pages[{{$idx}}][og_url_use_common]" value="1" class="use-common-checkbox edit-mode" @if($page->og_url_use_common) checked @endif>
          <input type="text" name="pages[{{$idx}}][og_url]" value="{{$page->og_url}}" class="form-control custom-form-inline" data-common-selector="#og_url">
          @if(isset($page->errors['og:url']))
            <ul class="alert alert-danger" role="alert">
              @foreach($page->errors['og:url'] as $historyDetail)
                <li>{{$historyDetail->message}}</li>
              @endforeach
            </ul>
          @endif
        </td>
        <td>
          <input type="checkbox" name="pages[{{$idx}}][og_image_use_common]" value="1" class="use-common-checkbox edit-mode" @if($page->og_image_use_common) checked @endif>
          <input type="text" name="pages[{{$idx}}][og_image]" value="{{$page->og_image}}" class="form-control custom-form-inline" data-common-selector="#og_image">
          @if(isset($page->errors['og:image']))
            <ul class="alert alert-danger" role="alert">
              @foreach($page->errors['og:image'] as $historyDetail)
                <li>{{$historyDetail->message}}</li>
              @endforeach
            </ul>
          @endif
        </td>
        <td>
          <input type="checkbox" name="pages[{{$idx}}][og_description_use_common]" value="1" class="use-common-checkbox edit-mode" @if($page->og_description_use_common) checked @endif>
          <input type="text" name="pages[{{$idx}}][og_description]" value="{{$page->og_description}}" class="form-control custom-form-inline" data-common-selector="#og_description">
          @if(isset($page->errors['og:description']))
            <ul class="alert alert-danger" role="alert">
              @foreach($page->errors['og:description'] as $historyDetail)
                <li>{{$historyDetail->message}}</li>
              @endforeach
            </ul>
          @endif
        </td>
        <td>
          <input type="checkbox" name="pages[{{$idx}}][favicon_use_common]" value="1" class="use-common-checkbox edit-mode" @if($page->favicon_use_common) checked @endif>
          <input type="text" name="pages[{{$idx}}][favicon]" value="{{$page->favicon}}" class="form-control custom-form-inline" data-common-selector="#favicon">
          @if(isset($page->errors['favicon']))
            <ul class="alert alert-danger" role="alert">
              @foreach($page->errors['favicon'] as $historyDetail)
                <li>{{$historyDetail->message}}</li>
              @endforeach
            </ul>
          @endif
        </td>
        <td>
          <input type="checkbox" name="pages[{{$idx}}][charset_use_common]" value="1" class="use-common-checkbox edit-mode" @if($page->charset_use_common) checked @endif>
          <input type="text" name="pages[{{$idx}}][charset]" value="{{$page->charset}}" class="form-control custom-form-inline" data-common-selector="#charset">
          @if(isset($page->errors['charset']))
            <ul class="alert alert-danger" role="alert">
              @foreach($page->errors['charset'] as $historyDetail)
                <li>{{$historyDetail->message}}</li>
              @endforeach
            </ul>
          @endif
        </td>
      </tr>
      <tr>
        <td></td>
        <td colspan="100">
          @if(isset($page->errors['html']))
            <div class="p-2">
              <h6>W3C HTML Validation</h6>
              <ul class="alert alert-danger" role="alert">
                @foreach($page->errors['html'] as $historyDetail)
                  <li>{{$historyDetail->message}}</li>
                @endforeach
              </ul>
            </div>
          @endif
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>
<div class="text-center">
  <button type="button" class="btn btn-dark" id="edit_page">編集</button>
  <button type="button" class="btn btn-secondary edit-mode" id="add_row">ページ追加</button>
  <button type="button" class="btn btn-secondary exec-check-page">ページチェックを実行</button>
</div>

<script>
  let lastIndex = parseInt('{{count($pages)}}', 10);

  const $settings = document.getElementById('settings');
  const $addRow = document.getElementById('add_row');
  const $tableBody = document.getElementById('table_body');
  const template = `
  <td class="cell-status"><div class="alert alert-info text-center">New</div></td>
  <td>
    <input type="hidden" name="pages[?][id]" value="new">
    <input type="text" name="pages[?][name]" value="" class="form-control" required>
  </td>
  <td class="cell-path">
    <input type="text" name="pages[?][path]" value="" class="form-control">
  </td>
  <td>
    <input type="checkbox" name="pages[?][title_use_common]" value="1" class="use-common-checkbox edit-mode">
    <input type="text" name="pages[?][title]" value="" class="form-control custom-form-inline" data-common-selector="#title">
  </td>
  <td>
    <input type="checkbox" name="pages[?][keywords_use_common]" value="1" class="use-common-checkbox edit-mode">
    <input type="text" name="pages[?][keywords]" value="" class="form-control custom-form-inline" data-common-selector="#keywords">
  </td>
  <td>
    <input type="checkbox" name="pages[?][description_use_common]" value="1" class="use-common-checkbox edit-mode">
    <input type="text" name="pages[?][description]" value="" class="form-control custom-form-inline" data-common-selector="#description">
  </td>
  <td>
    <input type="checkbox" name="pages[?][og_title_use_common]" value="1" class="use-common-checkbox edit-mode">
    <input type="text" name="pages[?][og_title]" value="" class="form-control custom-form-inline" data-common-selector="#og_title">
  </td>
  <td>
    <input type="checkbox" name="pages[?][og_url_use_common]" value="1" class="use-common-checkbox edit-mode">
    <input type="text" name="pages[?][og_url]" value="" class="form-control custom-form-inline" data-common-selector="#og_url">
  </td>
  <td>
    <input type="checkbox" name="pages[?][og_image_use_common]" value="1" class="use-common-checkbox edit-mode">
    <input type="text" name="pages[?][og_image]" value="" class="form-control custom-form-inline" data-common-selector="#og_image">
  </td>
  <td>
    <input type="checkbox" name="pages[?][og_description_use_common]" value="1" class="use-common-checkbox edit-mode">
    <input type="text" name="pages[?][og_description]" value="" class="form-control custom-form-inline" data-common-selector="#og_description">
  </td>
  <td>
    <input type="checkbox" name="pages[?][favicon_use_common]" value="1" class="use-common-checkbox edit-mode">
    <input type="text" name="pages[?][favicon]" value="" class="form-control custom-form-inline" data-common-selector="#favicon">
  </td>
  <td>
    <input type="checkbox" name="pages[?][charset_use_common]" value="1" class="use-common-checkbox edit-mode">
    <input type="text" name="pages[?][charset]" value="" class="form-control custom-form-inline" data-common-selector="#charset">
  </td>
`;

  function addRow() {
    const $newRow = document.createElement('tr');
    $newRow.innerHTML = template.replace(/\?/g, lastIndex);
    $tableBody.appendChild($newRow);
    lastIndex++;

    $newRow.querySelectorAll('.use-common-checkbox').forEach((el) => {
      if (el.checked) {
        applyCheckbox(el);
      }
    });

    const ne = new Event('resize');
    window.dispatchEvent(ne);

    return $newRow;
  }

  function applyCheckbox(check) {
    const el = check.nextElementSibling;

    if (check.checked) {
      // 共通設定を使用する場合
      el.setAttribute('data-org-value', el.value);
      const commonElement = document.querySelector(el.getAttribute('data-common-selector'));
      el.value = commonElement ? commonElement.value : '共通設定を使用';

      el.disabled = true;
    } else {
      // 共通設定を使用しない場合
      el.value = el.getAttribute('data-org-value') || '';
      el.disabled = false;
    }
  }

  function getLeftInput(el) {
    let nextInput = el.parentNode.previousElementSibling;
    if (nextInput) {
      nextInput = nextInput.querySelector('input[type="text"]');
      if (nextInput)
        return nextInput.disabled ? nextInput.previousElementSibling : nextInput;
    }
    return null;
  }

  function getRightInput(el) {
    let nextInput = el.parentNode.nextElementSibling;
    if (nextInput) {
      nextInput = nextInput.querySelector('input[type="text"]');
      if (nextInput)
        return nextInput.disabled ? nextInput.previousElementSibling : nextInput;
    }
    return null;
  }

  function getTopInput(currentIndex, currentKey) {
    if (currentIndex < 0) return null;
    const currentInput = document.querySelector('[name="pages[' + (Math.max(0, currentIndex)) + '][' + currentKey + ']"]');
    const nextInput = document.querySelector('[name="pages[' + (Math.max(0, currentIndex - 1)) + '][' + currentKey + ']"]');
    if (nextInput) {
      return nextInput.disabled ? nextInput.previousElementSibling : nextInput;
    }
    return null;
  }

  function getBottomInput(currentIndex, currentKey) {
    const currentInput = document.querySelector('[name="pages[' + (Math.min(lastIndex, currentIndex)) + '][' + currentKey + ']"]');
    const nextInput = document.querySelector('[name="pages[' + (Math.min(lastIndex, currentIndex + 1)) + '][' + currentKey + ']"]');
    if (nextInput) {
      return nextInput.disabled ? nextInput.previousElementSibling : nextInput;
    }
    return null;
  }

  function isEmptyRow(row) {
    const rowInputs = row.querySelectorAll('input[type="text"]');
    let isEmptyRow = true;
    rowInputs.forEach((el) => {
      if (!el.disabled && el.value.length > 0) {
        isEmptyRow = false;
      }
    });
    return isEmptyRow;
  }

  document.querySelectorAll('.use-common-checkbox').forEach((el) => {
    if (el.checked) {
      applyCheckbox(el);
    }
  });

  // ページ追加ボタン
  $addRow.addEventListener('click', function (e) {
    e.preventDefault();
    $addedRow = addRow();
    $addedRow.querySelector('input[type="text"]').focus();
  });

  $tableBody.addEventListener('change', function (e) {
    if (!e.target.classList.contains('use-common-checkbox')
      || e.target.type !== 'checkbox') return;
    applyCheckbox(e.target);
  });

  $settings.addEventListener('change', function (e) {
    document.querySelectorAll('.use-common-checkbox').forEach((el) => {
      if (el.checked) {
        applyCheckbox(el);
      }
    });
  });

  $tableBody.addEventListener('keydown', function (e) {
    if (e.target.tagName !== 'INPUT') return;
    const matches = /^pages\[(\d+)]\[(\w+)]$/.exec(e.target.name);
    if (matches) {
      const currentIndex = parseInt(matches[1], 10);
      const currentKey = matches[2];
      let nextInput;
      if (e.key === 'ArrowUp') {
        nextInput = getTopInput(currentIndex, currentKey);

        // 最後の行から移動した時、空行なら削除する
        const lastRow = $tableBody.querySelector('tr:last-child');
        const currentRow = e.target.parentElement.parentElement;
        if (lastRow === currentRow) {
          if (isEmptyRow(currentRow)) {
            currentRow.remove();
            lastIndex--;
          }
        }
      } else if (e.key === 'ArrowDown') {
        nextInput = getBottomInput(currentIndex, currentKey);
        if (!nextInput) {
          addRow();
          nextInput = getBottomInput(currentIndex, currentKey);
        }
      } else if (e.key === 'ArrowLeft' &&
        (e.target.type === 'checkbox' ||
          (e.target.type === 'text' && e.target.selectionStart === 0 && e.target.selectionEnd === 0))) {
        nextInput = getLeftInput(e.target);
        if (nextInput && nextInput.type === 'text') {
          setTimeout(() => {
            nextInput.setSelectionRange(-1, -1);
          }, 10);
        }
      } else if (e.key === 'ArrowRight' &&
        (e.target.type === 'checkbox' ||
          (e.target.type === 'text' && e.target.selectionStart === e.target.value.length && e.target.selectionEnd === e.target.value.length))) {
        nextInput = getRightInput(e.target);
        if (nextInput && nextInput.type === 'text') {
          setTimeout(() => {
            nextInput.setSelectionRange(0, 0);
          }, 10);
        }
      }
      if (nextInput) {
        e.preventDefault();
        nextInput.focus();
      }
    }
  });

  document.addEventListener('DOMContentLoaded', function () {
    $('#table-pages').floatThead({
      position: 'fixed',
      responsiveContainer: function ($table) {
        return $table.closest('.table--pages-wrapper');
      }
    });
  });

  document.querySelector('.exec-check-page').addEventListener('click', function (e) {
    e.preventDefault();
    if (confirm('入力されたデータは保存されません。\nページチェック実行前に保存してください。')) {
      document.getElementById('check_page_form').submit();
    }
  });


  var _edit_page = document.getElementById('edit_page'),
    editingClass = '__editing';
  var updateEditMode = function () {
    var isEditing = _edit_page.classList.contains(editingClass);

    var _elems = document.querySelectorAll('.edit-mode'),
      _inputs = [];

    _edit_page.innerText = isEditing ? '編集を終わる' : '編集';

    _inputs = _inputs.concat(_inputs, [...document.querySelectorAll('#table-pages input[type="text"]')]);
    _inputs = _inputs.concat(_inputs, [...document.querySelectorAll('#table-pages input[type="textarea"]')]);
    _inputs = _inputs.concat(_inputs, [...document.querySelectorAll('#table-pages input[type="checkbox"]')]);

    Array.prototype.slice.call(_elems, 0).forEach(function (el) {
      if (isEditing) {
        el.classList.add(editingClass);
      } else {
        el.classList.remove(editingClass);
      }
    });

    Array.prototype.slice.call(_inputs, 0).forEach(function (el) {
      el.readOnly = !isEditing;
    });
  };

  _edit_page.addEventListener('click', function () {
    _edit_page.classList.toggle(editingClass);
    updateEditMode()
  });
  updateEditMode();

</script>
