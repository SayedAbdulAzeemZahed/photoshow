<div class="top-bar">
  <div class="row">
    <div class="top-bar-left">
      <ul class="menu">
    
    
      @guest
                  <li class = "top-bar-right"><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                  @if (Route::has('register'))
                  <li class = "top-bar-right"><a href="{{ route('register') }}">{{ __('Register') }}</a>
                                
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
         @endguest
         
        <li class="menu-text">PhotoShow</li>
        <li><a href="/">Home</a></li>
        <li><a href="/albums/create">Create Album</a></li>
               
     
      </ul>
     
    </div>
  </div>
</div>
