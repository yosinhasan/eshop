@extends('layouts.app')
@section('title')
{{ trans('title.signup')}}
@stop
@section('content')
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-10">
                <div class="signup-form"><!--sign up form-->
                    <h2>{{ trans('auth/auth.signup_title')}}</h2>
                    @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach
                    <form action="{{ url('auth/register') }}" method="post">
                        {!! csrf_field() !!}
                        <input required="required" type="text" placeholder="{{ trans('auth/auth.name')}}" name="name" value="{{ old('name') }}" />
                        <input required="required" type="email" placeholder="{{ trans('auth/auth.email_address')}}" name="email" value="{{ old('email') }}"/>
                        <input required="required" type="password" placeholder="{{ trans('auth/auth.password')}}" name="password"/>
                        <input required="required" type="password" placeholder="{{ trans('auth/auth.repeatPassword')}}" name="password_confirmation"/>
                        <button type="submit" class="btn btn-default">{{ trans('auth/auth.signup')}}</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->s
@stop


