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
                        <div class="c-content-blog-post-card-1-grid">
                            <div class="row">
                                @foreach($data_artikel as $item)
                                <div class="col-md-6">
                                    <div class="c-content-blog-post-card-1 c-option-2 c-bordered">
                                        <div class="c-media">
                                            @if ($item->cover != "")
                                                {{ HTML::image(asset('resources/uploads/cover/'.$item->cover), 'image', array('class' => 'c-overlay-object img-responsive')) }}
                                            @else
                                                {{ HTML::image(asset('assets/base/img/default/no_images.png'), 'image', array('class' => 'c-overlay-object img-responsive')) }}
                                            @endif
                                        </div>
                                        <div class="c-body">
                                            <div class="c-title c-font-bold c-font-uppercase">
                                                <a href="{{ url('detail?id='.$item->id) }}">{{ $item->judul }}</a>
                                            </div>
                                            <div class="c-author">
                                                By <span class="c-font-uppercase">Admin Dispusip</span>
                                                on <span class="c-font-uppercase">{{ date_format($item->created_at, 'd/m/Y H:i:s') }}</span>
                                            </div>
                                            <div class="c-panel">
                                                <ul class="c-tags c-theme-ul-bg">
                                                    <li><span><i class="fa fa-eye"></i> Viewed {{ number_format($item->viewed) }}</span></li>
                                                    @if ($item->category != "")
                                                        <li>{{ $item->category }}</li>
                                                    @endif
                                                    @if ($item->sub_category != "" && $item->sub_category != $item->category)
                                                        <li>{{ $item->sub_category }} </li>
                                                    @endif
                                                </ul>
                                            </div>
                                            <p>
                                                {{ UtilController::trim_text(htmlspecialchars_decode($item->isi), 300) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
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
@endsection
