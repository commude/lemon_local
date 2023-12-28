<left>
    <img src="{{ asset('admin/images') }}/ad_logo.jpg" width="240" height="80" alt="こだわり酒場のレモンサワー管理画面"/>
    <ul>

        <x-admin.side-link route="{{ route('admin.index') }}" link-image="{{ asset('admin/images') }}/sidebar_user{{ $type == 'index' ? '_mo' : '' }}.jpg" />

        @hasanyrole(\App\Enums\AdminType::SUPER_LEVEL."|".\App\Enums\AdminType::TOP_LEVEL."|".\App\Enums\AdminType::MID_LEVEL)
        <x-admin.side-link route="{{ route('admin.download.index') }}" link-image="{{ asset('admin/images') }}/sidebar_dl{{ $type == 'download' ? '_mo' : '' }}.jpg" />
        @endhasanyrole

        @hasanyrole(\App\Enums\AdminType::SUPER_LEVEL."|".\App\Enums\AdminType::TOP_LEVEL)
        <x-admin.side-link route="{{ route('admin.rateChange.create') }}" link-image="{{ asset('admin/images') }}/sidebar_percentage{{ $type == 'percentage' ? '_mo' : '' }}.jpg" />
        @endhasanyrole

        @hasrole(\App\Enums\AdminType::SUPER_LEVEL)
        <x-admin.side-link route="{{ route('admin.lotteryChange.index') }}" link-image="{{ asset('admin/images') }}/sidebar_limit{{ $type == 'limit' ? '_mo' : '' }}.jpg" />
        @endhasrole
    </ul>
</left>
