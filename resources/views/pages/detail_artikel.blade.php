<?php
/**
 * Created by PhpStorm.
 * User: feldy
 * Date: 16/07/2017
 * Time: 07:43
 */
?>
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
    <div class="c-layout-page">
        <!-- BEGIN: PAGE CONTENT -->
        <!-- BEGIN: BLOG LISTING -->
        <div class="c-content-box c-size-md">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="c-content-blog-post-1-view">
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
                                        <a href="#">{{ $item->judul }}</a>
                                    </div>
                                    <div class="c-panel c-margin-b-30">
                                        <div class="c-author">
                                            <a href="#">By <span class="c-font-uppercase">Admin</span></a>
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
                                    <div class="c-desc">
                                        {!! html_entity_decode($item->isi)  !!}
{{--                                        {{ $item->isi }}--}}
                                        <br>
                                        Sumber: {{ $item->sumber }}
                                    </div>
                                    <div class="c-panel c-margin-b-30">
                                        Commented:
                                        <div>
                                            <form class="form-horizontal" action="{{route('page.comment')}}" method="POST" enctype="multipart/form-data" onsubmit="return postForm()">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <!-- <label for="" class="col-md-3 control-label">Name</label> -->
                                                    <div class="col-md-9">
                                                        <input type="hidden" name="idArtikel" class="form-control c-square c-theme" id="idArtikel" value="{{ isset($item) ? $item->id : ''  }}">
                                                        <input type="text" name="name" class="form-control c-square c-theme" id="" placeholder="Name">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <!-- <label for="" class="col-md-3 control-label">Comment</label> -->
                                                    <div class="col-md-9">
                                                        <textarea type="text" name="comment" class="form-control c-square c-theme" id="" placeholder="Comment" rows="10"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <!-- <label for="" class="col-md-3 control-label"></label> -->
                                                    <div class="col-md-9    ">
                                                        <button type="submit" class="btn btn-info c-btn-uppercase c-btn-bold"><i class="fa fa-floppy-o"></i> Comment</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        @foreach($item->list_comment as $itemComment)
                                        <div class="c-desc">
                                            {{ $itemComment->name }} says: <br> {{ $itemComment->comment }} 
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{--sidebar--}}
                    @include("templates.default_sidebar", ['data' => $data_sidebar]);
                </div>
            </div>
        </div>
        <!-- END: BLOG LISTING  -->
        <!-- END: PAGE CONTENT -->
    </div>
@endsection
