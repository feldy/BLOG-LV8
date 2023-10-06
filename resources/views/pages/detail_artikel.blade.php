<?php
/**
 * Created by PhpStorm.
 * User: feldy
 * Date: 16/07/2017
 * Time: 07:43
 */
?>
@extends('templates.default_main_page')
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
                                            <a href="#">By <span class="c-font-uppercase">Admin Dispusip</span></a>
                                        </div>
                                        <div class="c-date">
                                            on <span class="c-font-uppercase">{{ date_format($item->created_at, 'd/m/Y H:i:s') }}</span>
                                            | <span><i class="fa fa-eye"></i> Viewed {{ number_format($item->viewed) }}</span>
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
