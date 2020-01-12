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
                <td>{{Form::hidden('pages['.$idx.'][id]', $page->id)}}{{Form::text('pages['.$idx.'][name]', $page->name, ['class' => 'form-control', 'required' => 'required'])}}</td>
                <td class="cell-path">{{Form::text('pages['.$idx.'][path]', $page->path, ['class' => 'form-control'])}}</td>
                <td>
                    {{Form::checkbox('pages['.$idx.'][title_use_common]', 1, $page->title_use_common, ['class' => 'use-common-checkbox'])}}
                    {{Form::text('pages['.$idx.'][title]', $page->title, ['class' => 'form-control custom-form-inline', 'data-common-selector' => '#title'])}}
                    @if(isset($page->errors['title']))
                        <ul class="alert alert-danger" role="alert">
                            @foreach($page->errors['title'] as $historyDetail)
                                <li>{{$historyDetail->message}}</li>
                            @endforeach
                        </ul>
                    @endif
                </td>
                <td>
                    {{Form::checkbox('pages['.$idx.'][keywords_use_common]', 1, $page->keywords_use_common, ['class' => 'use-common-checkbox'])}}
                    {{Form::text('pages['.$idx.'][keywords]', $page->keywords, ['class' => 'form-control custom-form-inline', 'data-common-selector' => '#keywords'])}}
                    @if(isset($page->errors['keywords']))
                        <ul class="alert alert-danger" role="alert">
                            @foreach($page->errors['keywords'] as $historyDetail)
                                <li>{{$historyDetail->message}}</li>
                            @endforeach
                        </ul>
                    @endif
                </td>
                <td>
                    {{Form::checkbox('pages['.$idx.'][description_use_common]', 1, $page->description_use_common, ['class' => 'use-common-checkbox'])}}
                    {{Form::text('pages['.$idx.'][description]', $page->description, ['class' => 'form-control custom-form-inline', 'data-common-selector' => '#description'])}}
                    @if(isset($page->errors['description']))
                        <ul class="alert alert-danger" role="alert">
                            @foreach($page->errors['description'] as $historyDetail)
                                <li>{{$historyDetail->message}}</li>
                            @endforeach
                        </ul>
                    @endif
                </td>
                <td>
                    {{Form::checkbox('pages['.$idx.'][og_title_use_common]', 1, $page->og_title_use_common, ['class' => 'use-common-checkbox'])}}
                    {{Form::text('pages['.$idx.'][og_title]', $page->og_title, ['class' => 'form-control custom-form-inline', 'data-common-selector' => '#og_title'])}}
                    @if(isset($page->errors['og:title']))
                        <ul class="alert alert-danger" role="alert">
                            @foreach($page->errors['og:title'] as $historyDetail)
                                <li>{{$historyDetail->message}}</li>
                            @endforeach
                        </ul>
                    @endif
                </td>
                <td>
                    {{Form::checkbox('pages['.$idx.'][og_url_use_common]', 1, $page->og_url_use_common, ['class' => 'use-common-checkbox'])}}
                    {{Form::text('pages['.$idx.'][og_url]', $page->og_url, ['class' => 'form-control custom-form-inline', 'data-common-selector' => '#og_url'])}}
                    @if(isset($page->errors['og:url']))
                        <ul class="alert alert-danger" role="alert">
                            @foreach($page->errors['og:url'] as $historyDetail)
                                <li>{{$historyDetail->message}}</li>
                            @endforeach
                        </ul>
                    @endif
                </td>
                <td>
                    {{Form::checkbox('pages['.$idx.'][og_image_use_common]', 1, $page->og_image_use_common, ['class' => 'use-common-checkbox'])}}
                    {{Form::text('pages['.$idx.'][og_image]', $page->og_image, ['class' => 'form-control custom-form-inline', 'data-common-selector' => '#og_image'])}}
                    @if(isset($page->errors['og:image']))
                        <ul class="alert alert-danger" role="alert">
                            @foreach($page->errors['og:image'] as $historyDetail)
                                <li>{{$historyDetail->message}}</li>
                            @endforeach
                        </ul>
                    @endif
                </td>
                <td>
                    {{Form::checkbox('pages['.$idx.'][og_description_use_common]', 1, $page->og_description_use_common, ['class' => 'use-common-checkbox'])}}
                    {{Form::text('pages['.$idx.'][og_description]', $page->og_description, ['class' => 'form-control custom-form-inline', 'data-common-selector' => '#og_description'])}}
                    @if(isset($page->errors['og:description']))
                        <ul class="alert alert-danger" role="alert">
                            @foreach($page->errors['og:description'] as $historyDetail)
                                <li>{{$historyDetail->message}}</li>
                            @endforeach
                        </ul>
                    @endif
                </td>
                <td>
                    {{Form::checkbox('pages['.$idx.'][favicon_use_common]', 1, $page->favicon_use_common, ['class' => 'use-common-checkbox'])}}
                    {{Form::text('pages['.$idx.'][favicon]', $page->favicon, ['class' => 'form-control custom-form-inline', 'data-common-selector' => '#favicon'])}}
                    @if(isset($page->errors['favicon']))
                        <ul class="alert alert-danger" role="alert">
                            @foreach($page->errors['favicon'] as $historyDetail)
                                <li>{{$historyDetail->message}}</li>
                            @endforeach
                        </ul>
                    @endif
                </td>
                <td>
                    {{Form::checkbox('pages['.$idx.'][charset_use_common]', 1, $page->charset_use_common, ['class' => 'use-common-checkbox'])}}
                    {{Form::text('pages['.$idx.'][charset]', $page->charset, ['class' => 'form-control custom-form-inline', 'data-common-selector' => '#charset'])}}
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
    <button type="button" id="add_row" class="btn btn-secondary">ページ追加</button>
</div>
