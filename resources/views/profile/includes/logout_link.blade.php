<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
    Logout
</a>    
<form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>