
<div style="background-color: #ace5cc; display: flex; justify-content: center; align-items: center">
    <h1>Amazing E-Grocery</h1>
    @if (Auth::user() == null)
        <a class="nav-item" style="background-color: #f6e06c;padding: 5px" href="/register">Register</a>
        <a class="nav-item" style="background-color: #f6e06c;padding: 5px" href="/login">Login</a>
    @else
        <a class="nav-item" style="background-color: #f6e06c;padding: 5px" href="/dologout">Logout</a>
    @endif
</div>
@if (Auth::user() != null)
    <nav class="nav" style="background-color: #fadf54; display: flex; justify-content: center">
        <a class="nav-item {{ Request::is('Home*') ? '  active' : null  }}" href="/home">Home</a>
        <a class="nav-item {{ Request::is('Cart*') ? '  active' : null  }}" href="/cart">Cart</a>
        <a class="nav-item {{ Request::is('Profile*') ? '  active' : null  }}" href="/profile">Profile</a>
        @if (Auth::user()->role_id == 1)
            <a class="nav-item {{ Request::is('Accounts*') ? '  active' : null  }}" href="/accounts">Account Maintenance</a>
        @endif
    </nav>
@endif
