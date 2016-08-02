@extends('layouts.app')
@section('title')
{{ trans('title.login')}}
@stop
@section('content')
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
            <div class="col-sm-10 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>{{ trans('auth/auth.log_title')}}</h2>
                    <form action="{{ url('auth/login') }}" method="post">
                        {!! csrf_field() !!}
                        <input required="required" type="email" placeholder="{{ trans('auth/auth.email_address')}}" name="email" value="{{ old('email') }}" />
                        <input required="required" type="password" placeholder="{{ trans('auth/auth.password')}}" name="password" />
                        <span>
                            <input type="checkbox" class="checkbox" name="remember"> 
                            {{ trans('auth/auth.keep_singed_in')}}
                        </span>
                        <button type="submit" class="btn btn-default">{{ trans('auth/auth.login')}}</button>
                    </form>
                </div><!--/login form-->
            </div>
        </div>
    </div>
</section><!--/form-->s
@stop


