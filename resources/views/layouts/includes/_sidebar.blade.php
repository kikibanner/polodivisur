<div class="sidebar" data-active-color="purple" data-background-color="white" >

    <div class="logo">
        <a href="" class="simple-text">
            Polo Divisur
        </a>
    </div>
    <div class="logo logo-mini">
        <a href="" class="simple-text">
            PD
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="@yield('activedashboard')">
                <a href="/dashboard">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="@yield('activetes')">
                <a href="/tesmandiri/{{auth()->user()->id}}/mulai">
                    <i class="material-icons">dashboard</i>
                    <p>Tes Mandiri</p>
                </a>
            </li>

            @if(auth()->user()->role=='admin')

            @endif
            @if(auth()->user()->role=='rs')
            <li class="@yield('activesuspect')">
                <a href="dashboard.html">
                    <i class="material-icons">dashboard</i>
                    <p>Daftar Suspect</p>
                </a>
            </li>
            @endif
        </ul>
    </div>
</div>
