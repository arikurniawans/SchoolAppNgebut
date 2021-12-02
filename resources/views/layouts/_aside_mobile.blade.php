<div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch"
    id="#kt_header_menu" data-kt-menu="true">

    @foreach (config('menu.header') as $mn)
    @if (!isset($mn['role']) || in_array($user['level'], explode('|', $mn['role'])))
        @if(count($mn['sub']) == 0)

            <div class="menu-item me-lg-1">
                <a class="menu-link @if (request()->is($mn['url'] . '*')) active @endif py-3" href="{{ $mn['url'] }}">
                    <span class="menu-title">{{ $mn['name'] }}</span>
                </a>
            </div>

        @else


            <div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="menu-item @if (request()->is($mn['url'] . '*')) here show @endif menu-lg-down-accordion me-lg-1">
                <span class="menu-link py-3">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotone/Code/Compiling.svg-->
                        <span class="svg-icon svg-icon-2">
                            {!! $mn['icon'] !!}
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">{{ $mn['name'] }}</span>
                    <span class="menu-arrow d-lg-none"></span>
                </span>

                <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px @if (request()->is($mn['url'] . '*')) show menu-active-bg @endif">
                    @include('layouts._sub_menu_mobile', ['menu' => $mn['sub']])
                </div>
            </div>

        @endif
    @endif
@endforeach
</div>
