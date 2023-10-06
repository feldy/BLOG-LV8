<?php
/**
 * Created by PhpStorm.
 * User: feldy
 * Date: 17/07/2017
 * Time: 21:07
 */
?>

@extends('templates.default_admin_page')
@section('content')
    <div class="c-layout-page">
        <!-- BEGIN: PAGE CONTENT -->
        <div class="c-content-box c-size-md c-bg-white" style="padding-top: 10px;">
            <div class="container">
                <div class="c-content-panel">
                    <div class="c-label">
                        @if(isset($dataEdit))
                            Edit User
                        @else
                            Create User
                        @endif
                    </div>
                    <div class="c-body">
                        <div class="row">
                            <form class="form-horizontal" method="POST" action="{{ route('admin.reguser') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Nama</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control c-square c-theme" name="name" value="{{ old('name', (isset($dataEdit))? $dataEdit->name: "") }}" required autofocus>
                                        <input type="hidden" name="idUser" value="{{ old('idUser', (isset($dataEdit))? $dataEdit->id: "") }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">E-mail</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control c-square c-theme" name="email" value="{{ old('email', (isset($dataEdit))? $dataEdit->email : "" ) }}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control c-square c-theme" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control c-square c-theme" name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn c-theme-btn c-btn-uppercase c-btn-bold"><i class="fa fa-floppy-o"></i> Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="c-content-panel">
                    <div class="c-label">
                        Daftar User
                    </div>
                    <div class="c-body">
                        <div class="row">
                            <div class="col-md-4 col-md-offset-8">
                                <form action="{{ route('admin.daftar') }}" method="get">
                                    <div class="input-group">
                                        <input type="text" name="search" value="{{Input::get('search')}}" class="form-control c-square c-theme-border" placeholder="Pencarian...">
                                        <span class="input-group-btn">
							                <button class="btn c-theme-btn c-theme-border c-btn-square" type="submit">Go!</button>
							            </span>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-12">
                                <table class="table">
                                    <caption><i class="fa fa-user"></i> Data User</caption>
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th width="200px">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $idx = 1;
                                    ?>
                                    @foreach($data as $item)
                                        <tr>
                                            <th scope="row">
                                                {{ $idx }}
                                                <?php $idx++; ?>
                                            </th>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>
                                                <a href="{{ url('daftar?edit='.$item->id) }}" class="btn btn-info btn-xs c-btn-uppercase c-btn-bold"><i class="fa fa-pencil-square-o"></i> Edit</a>
                                                <a href="{{ url('hapus?id='.$item->id) }}" class="btn btn-danger btn-xs c-btn-uppercase c-btn-bold"><i class="fa fa-trash-o"></i> Hapus</a>
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
