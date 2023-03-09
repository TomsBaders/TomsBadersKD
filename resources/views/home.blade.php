@extends('layouts.app')

@section('content')
<div class="container">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1 style="text-align: center">Laipni lūgti!</h1>
</div>
@endsection
