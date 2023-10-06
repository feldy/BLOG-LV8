<?php
/**
 * Created by PhpStorm.
 * User: feldy
 * Date: 16/07/2017
 * Time: 20:58
 */
?>

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
        <!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-1 -->
        <div class="c-layout-breadcrumbs-1 c-fonts-uppercase c-fonts-bold c-bordered c-bordered-both">
            <div class="container">
                <div class="c-page-title c-pull-left">
                    <h3 class="c-font-uppercase c-font-bold">{{ count($data_artikel) }} hasil ditemukan terkait: “{{ Input::get('search') }}” </h3>
                </div>
            </div>
        </div>
        <!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-1 -->
        <!-- BEGIN: PAGE CONTENT -->
        <div class="c-content-box c-size-md ">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        @foreach($data_artikel as $item)
                        <div class="c-content-blog-post-1-list">
                            <div class="c-content-blog-post-1" style="margin-bottom: 0px !important;">
                                <div class="c-title c-font-uppercase">
                                    <a href="{{ url('detail?id='.$item->id) }}">{{ $item->judul }}</a>
                                </div>
                                <div class="c-desc">
                                    {{ UtilController::trim_text(htmlspecialchars_decode($item->isi), 300) }}
                                </div>
                                <div class="c-panel">
                                    <div class="c-author">
                                        By <span class="c-font-uppercase"><i class="fa fa-user"></i> Admin Dispusip</span>
                                    </div>
                                    <div class="c-date">
                                        on <span class="c-font-uppercase">16/07/2017 03:14:40</span>
                                        | <span><i class="fa fa-eye"></i> Viewed 17</span>
                                    </div>
                                    <ul class="c-tags c-theme-ul-bg">
                                        <li>Ciliwung</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    {{--sidebar--}}
                    @include("templates.default_sidebar", ['data' => $data_sidebar])
                </div>
            </div>
        </div>
        <!-- END: PAGE CONTENT -->
    </div>
@endsection

