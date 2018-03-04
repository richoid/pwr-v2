<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
    <button class="btn btn-sm btn-info">
        Logout&nbsp;&nbsp;
        <i class="fa fa-sign-out align-middle"></i>
    </button>
</a>    
<form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>