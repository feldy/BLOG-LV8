<?php
/**
 * Created by PhpStorm.
 * User: feldy
 * Date: 15/07/2017
 * Time: 11:16
 */
?>
@extends('templates.default_admin_page')
@section('stylesheets')
    <link href="{{ asset('assets/plugins/summernote/summernote.css') }} " rel="stylesheet">
    <style type="text/css">
        .tt-query {
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        }

        .tt-hint {
            color: #999;
        }

        .tt-menu {    /* used to be tt-dropdown-menu in older versions */
            width: 422px;
            margin-top: 4px;
            padding: 4px 0;
            background-color: #fff;
            border: 1px solid #ccc;
            border: 1px solid rgba(0, 0, 0, 0.2);
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
            -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
            box-shadow: 0 5px 10px rgba(0,0,0,.2);
        }

        .tt-suggestion {
            padding: 3px 20px;
            line-height: 24px;
        }

        .tt-suggestion.tt-cursor,.tt-suggestion:hover {
            color: #fff;
            background-color: #0097cf;

        }

        .tt-suggestion p {
            margin: 0;
        }
    </style>
@endsection
@section('content')
    <div class="c-layout-page">
        <!-- BEGIN: PAGE CONTENT -->
        <div class="c-content-box c-size-md c-bg-white" style="padding-top: 10px;">
            <div class="container">
                <div class="c-content-panel">
                    <div class="c-label">
                        @if(isset($artikel))
                            Edit Artikel
                        @else
                            Create Artikel
                        @endif
                    </div>
                    <div class="c-body">
                        <div class="c-content-title-1 c-title-md c-margin-b-20 clearfix">
                            <h3 class="c-center c-font-uppercase c-font-bold">
                                @if(isset($artikel))
                                    Edit Artikel
                                @else
                                    Buat Artikel Baru
                                @endif
                            </h3>
                            <div class="c-line-center c-theme-bg">
                            </div>
                        </div>
                        <form class="form-horizontal" action="{{route('admin.create')}}" method="POST" enctype="multipart/form-data" onsubmit="return postForm()">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="" class="col-md-3 control-label">Judul</label>
                                <div class="col-md-9">
                                    <input type="hidden" name="idArtikel" class="form-control c-square c-theme" id="idArtikel" value="{{ isset($artikel) ? $artikel->id : ''  }}">
                                    <input type="text" autofocus name="judul" value="{{ isset($artikel) ? $artikel->judul : "" }}" class="form-control c-square c-theme" id="" placeholder="Judul">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-3 control-label">Kategori</label>
                                <div class="col-md-9">
                                    <input type="text" name="category" value="{{ isset($artikel) ? $artikel->category : "" }}" class="typeahead form-control c-square c-theme" placeholder="Kategori">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-3 control-label">Sub Kategori</label>
                                <div class="col-md-9">
                                    <input type="text" name="sub_category" value="{{ isset($artikel) ? $artikel->sub_category : "" }}" class="typeahead form-control c-square c-theme" id="" placeholder="Sub Kategori">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-3 control-label">Sumber</label>
                                <div class="col-md-9">
                                    <input type="text" name="sumber" value="{{ isset($artikel) ? $artikel->sumber : "" }}" class="form-control c-square c-theme" id="" placeholder="Sumber">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-3 control-label">Cover</label>
                                <div class="col-md-9">
                                    @if(isset($artikel))
                                        {{ HTML::image(asset('resources/uploads/cover/'.$artikel->cover), 'image', array('class' => 'c-overlay-object img-responsive', 'width' => '300px')) }}
                                    @endif
                                    <br>
                                    <input type="file" name="cover" class="form-control c-square c-theme" id="" placeholder="Cover">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <textarea class="isiArtikel" name="isi" id="isi">
                                        {{ isset($artikel) ? $artikel->isi : "" }}
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-info c-btn-uppercase c-btn-bold"><i class="fa fa-floppy-o"></i> Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: PAGE CONTENT -->
    </div>
@endsection
@section('customjs')
    <script type="text/javascript" src="{{ asset('assets/plugins/summernote/summernote.js') }} "></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#isi').summernote({
                height: 500,	// set editor height
                minHeight: 500,	// set minimum height of editor
                maxHeight: null,	// set maximum height of editor
                focus: true,	// set focus to editable area after initializing summernote
                callbacks: {
                    onImageUpload: function(files) {
                        for(var i = 0; i < files.length; i++) {
                            sendFile(files[i]);
                        }
                    }
                }
            });
        });

        function sendFile(file) {
            if(file.type.includes('image')) {
                var name = file.name.split(".");name = name[0];

                var data = new FormData();
                data.append('image', file);
                data.append('id', $("#idArtikel").val());
                data.append('_token', $('input[name="_token"]').val());

                $.ajax({
                    url: '{{ route('admin.uploader') }}',
                    type: 'POST',
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: 'JSON',
                    data: data,
                    success: function (response) {
                        if (response.url) {
                            {{--var url = '{{ asset('') }}'+response.url;--}}
                            var url = response.url;
                            $('#isi').summernote('insertImage', url, function(image) {
                                image.addClass('img-responsive');
                            });
                        }
                    }
                })
                .fail(function(e) {
                    console.log(e);
                });
            } else {
                console.log("Jenis File Bukan file gambar !");
            }
        };

        var postForm = function() {
            var content = $('textarea[name="isi"]').html($('#isi').code());
        }

        var category = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            remote: {
                url: 'hint?search=%QUERY',
                wildcard: '%QUERY'
            }
        });

        $('.typeahead').typeahead(null, {
            source: category
        });


    </script>
@endsection
