@extends('layouts.app')

@section('titulo', 'Santa Gemita')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card5">
                <div class="card-header text-white">{{ __('Verifique su correo') }}</div>

                <div class="card-body text-white">
                    @if (session('resent'))
                        <div class="alert alert-success text-white" role="alert">
                            {{ __('Un nuevo enlace de verificación ha sido enviado a su correo.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('Antes de seguir, por favor revise el enlace de verificación en su correo') }}
                    {{ __('Si ud. no recibe el correo') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('presione aquí') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
