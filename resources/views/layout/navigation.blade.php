<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link @if(request()->is('/') || request()->is('category*')) active @endif" href="{{ route('home') }}">Play</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if(request()->is('contribute')) active @endif" href="{{ route('contribute') }}">Contribute</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if(request()->is('questions*')) active @endif" href="{{ route('questions') }}">Your Questions</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}">Log Out</a>
    </li>
</ul>
