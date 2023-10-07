@extends('templates.default_main_page')
@section('stylesheets')
    <style type="text/css">
        .styLinkHoverLike {
            color: blue; 
            text-decoration: underline; 
            cursor: pointer
        }
        .styLinkHoverDislike {
            color: red; 
            text-decoration: underline; 
            cursor: pointer
        }
    </style>
@endsection
@section('customjs')
    <script type="text/javascript">
        function likeAction(idArtikel, dom) {
            $(document).ready(function() {
                $.ajax({
                    url: '{{ route('page.like') }}',
                    data: {id: idArtikel},
                    type: 'GET',
                    dataType: 'json', // added data type
                    success: function(res) {
                        // console.log(res);
                        dom.innerHTML = '<i class="fa fa-thumbs-up"></i> Like ' + res.lastLike;
                    }
                });
            });
        }
        function dislikeAction(idArtikel, dom) {
            // console.log(">>> dislikeAction", idArtikel);
             $(document).ready(function() {
                $.ajax({
                    url: '{{ route('page.dislike') }}',
                    data: {id: idArtikel},
                    type: 'GET',
                    dataType: 'json', // added data type
                    success: function(res) {
                        // console.log(res);
                        dom.innerHTML = '<i class="fa fa-thumbs-down"></i> Dislike ' + res.lastDislike;
                    }
                });
            });
        }
    </script>
@endsection

@section('content')
    <!-- BEGIN: PAGE CONTAINER -->
    <div class="c-layout-page">
        <!-- BEGIN: PAGE CONTENT -->
        <!-- BEGIN: BLOG LISTING -->
        <div class="c-content-box c-size-md">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="c-content-blog-post-1-list">
                            @foreach($data_artikel as $item)
                                <div class="c-content-blog-post-1">
                                    <div class="c-media">
                                        @if ($item->cover != "")
                                            <div class="c-content-media-2" style="background-image: url({{ asset('resources/uploads/cover/'.$item->cover) }}); min-height: 460px;"></div>
                                        @else
                                            <div class="c-content-media-2" style="background-image: url({{ asset('assets/base/img/default/no_images.png') }}); min-height: 460px; background-repeat: repeat; background-size: auto;"></div>
                                        @endif
                                    </div>
                                    <div class="c-title c-font-bold c-font-uppercase">
                                        <a href="{{ url('detail?id='.$item->id) }}">{{ $item->judul }}</a>
                                    </div>
                                    <div class="c-desc">
                                        {{ UtilController::trim_text(htmlspecialchars_decode($item->isi), 500) }}
                                    </div>
                                    <div class="c-panel">
                                        <div class="c-author">
                                            By <span class="c-font-uppercase"><i class="fa fa-user"></i> Admin</span>
                                        </div>
                                        <div class="c-date">
                                            on <span class="c-font-uppercase">{{ date_format($item->created_at, 'd/m/Y H:i:s') }}</span>
                                            | <span><i class="fa fa-eye"></i> Viewed {{ number_format($item->viewed) }}</span>
                                            | <span class="styLinkHoverLike" onclick="likeAction('{{ $item->id }}', this)"><i class="fa fa-thumbs-up"></i> Like {{ number_format($item->like) }}</span>
                                              <span class="styLinkHoverDislike" onclick="dislikeAction('{{ $item->id }}', this)"><i class="fa fa-thumbs-down"></i> Dislike {{ number_format($item->dislike) }}</span>
                                        </div>
                                        <ul class="c-tags c-theme-ul-bg">
                                            @if ($item->category != "")
                                                <li>{{ $item->category }}</li>
                                            @endif
                                            @if ($item->sub_category != "" && $item->sub_category != $item->category)
                                                <li>{{ $item->sub_category }} </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                            {{--<div class="c-pagination">--}}
                                {{--<ul class="c-content-pagination c-theme">--}}
                                    {{--<li class="c-prev">--}}
                                        {{--<a href="#"><i class="fa fa-angle-left"></i></a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="#">1</a>--}}
                                    {{--</li>--}}
                                    {{--<li class="c-active">--}}
                                        {{--<a href="#">2</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="#">3</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="#">4</a>--}}
                                    {{--</li>--}}
                                    {{--<li class="c-next">--}}
                                        {{--<a href="#"><i class="fa fa-angle-right"></i></a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                    {{--sidebar--}}
                    @include("templates.default_sidebar", ['data' => $data_sidebar])
                </div>
            </div>
        </div>
        <!-- END: BLOG LISTING  -->
        <!-- END: PAGE CONTENT -->
    </div>
    <!-- END: PAGE CONTAINER -->
@endsection