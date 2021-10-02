@if (auth()->check())
    <div id="mySidenav" class="sidenav">
        <span class="closebtn" onclick="closeNav()">&#9776;</span>
        @foreach ($menu as $item)
            <li class="nav-link">
                <a style="font-size: 15px" href="{{route($item['route'])}}" class="page-link alert-link @if ($item['active'])
                        text-info
@endif">{{$item['title']}}</a>

            </li>
        @endforeach

    </div>
    <div id="main">
        <div class="toggle">
            <div class="group-buttons"></div>
            <span class="toggle-button" onclick="openNav()">&#9776;</span>
        </div>
    </div>

@endif
