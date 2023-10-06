@extends('templates.default_admin_page')
@section('content')
    <div class="c-layout-page">
        <!-- BEGIN: PAGE CONTENT -->
        <div class="c-content-box c-size-md c-bg-white" style="padding-top: 10px;">
            <div class="container">
                <div class="c-content-panel">
                    <div class="c-label">
                        Daftar Artikel
                    </div>
                    <div class="c-body">
                        <div class="row">
                            <div class="col-md-8">
                                <a href="{{route('admin.create')}}" class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold">Create Artikel</a>
                            </div>
                            <div class="col-md-4">
                                <form action="{{ route('admin.index') }}" method="get">
                                    <div class="input-group">
                                        <input type="text" name="search" value="{{Input::get('search')}}" class="form-control c-square c-theme-border" placeholder="Pencarian...">
                                        <span class="input-group-btn">
							                <button class="btn c-theme-btn c-theme-border c-btn-square" type="submit">Go!</button>
							            </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-hover">
                                    <tbody>
                                    @foreach($data as $item)
                                        <tr>
                                            <td width="85px">
                                                <span class="label label-info c-font-slim c-font-uppercase">{{ $item->category }}</span> <br>
                                                <small>{{ date_format($item->created_at, "d/m/Y") }}</small>
                                            </td>
                                            <td width="0px">
                                                <span class="c-font-bold c-font-uppercase">{{ $item->judul }}</span><br>
                                                <small>
                                                    {{ UtilController::trim_text(htmlspecialchars_decode($item->isi), 170) }}
                                                </small>
                                            </td>
                                            <td width="200px">
                                                {{-- <div class="row"> --}}
                                                    @if($item->is_publish)
                                                        {{-- <div class="col-md-3"> --}}
                                                            <a href="{{ url('detail?id='.$item->id) }}" target="_blank" class="btn btn-success btn-xs c-btn-uppercase c-btn-bold"><i class="fa fa-desktop"></i> View</a>
                                                        {{-- </div> --}}
                                                    @endif
                                                        {{-- <div class="col-md-3"> --}}
                                                            <a href="{{ url('edit?id='.$item->id) }}" class="btn btn-info btn-xs c-btn-uppercase c-btn-bold"><i class="fa fa-pencil-square-o"></i> Edit</a>
                                                        {{-- </div> --}}

                                                        <br /><br />
                                                    @if($item->is_publish)
                                                        {{-- <div class="col-md-3"> --}}
                                                            <a href="{{ url('delete?id='.$item->id) }}" class="btn btn-default btn-xs c-btn-uppercase c-btn-bold"><i class="fa fa-trash-o"></i> Hide</a>
                                                        {{-- </div> --}}
                                                    @else
                                                        {{-- <div class="col-md-3"> --}}
                                                            <a href="{{ url('update?id='.$item->id) }}" class="btn btn-warning btn-xs c-btn-uppercase c-btn-bold"><i class="fa fa-check-circle"></i> Show</a>
                                                        {{-- </div> --}}
                                                    @endif
                                                        {{-- <div class="col-md-3"> --}}
                                                            <a href="{{ url('delete?id='.$item->id) }}" class="btn btn-danger btn-xs c-btn-uppercase c-btn-bold"><i class="fa fa-close"></i> Hapus</a>
                                                        {{-- </div> --}}
                                                {{-- </div> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: PAGE CONTENT -->
    </div>
@endsection