@extends('layouts.app')

@section('content')
<div class="container">
               @auth
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1 style="text-align: center">Jūsu veiktie pirkumi!</h1>
                    <br>
                        <button class="btn btn-success" onclick="showPopupBox()">Pievienojiet Pirkumu</button>
                        <div id="popup-box">
                            <form method="POST" action="{{route('pirkums')}}">
                            @csrf
                            <br>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="nosaukums" id="nosaukums" placeholder="Maksātā lieta">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="cena" id="cena" placeholder="Produkta Cena">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="sveramais" id="sveramais" placeholder="Skaits/Svars">
                                <div class="text-center">
                                   <button type="submit" class="btn btn-success">
                                        {{ __('Pievienot') }}
                                   </button>
                                </div>
                            </form>
                            <br>
                            <div class="text-center">
                            <button class="btn btn-danger" onclick="hidePopupBox()">Atcelt</button>
                            </div>
                        </div>
                        <br>

               @else
                  @guest
                  <div class="container">
                      <h1>Jūs neesiet piesēdizies.</h1>
                      <a href="{{ route('login') }}" class="btn btn-primary">Pieslēgšanās</a>
                  </div>
                  @endguest
               @endauth
</div>
@endsection
