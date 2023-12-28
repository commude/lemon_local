<search>
    <div class="admin_user_header">
        <p class="title_right_top">{{ $title }}</p>
        <a href="javascript:;" class="logout_btn" onclick="document.getElementById('logout').submit()"><img src="{{ asset('admin/images') }}/admin_user_logout.png" alt="ログアウト"></a>
        <form id="logout" method="POST" action="{{ route('admin.logout') }}" style="display: none;">@csrf</form>
    </div>
    {{ $slot }}
</search>
