@foreach($menu as $me)
    @if(!isset($me['role']) || in_array($user['level'], explode('|',$me['role'])))
    @if(count($me['sub']) == 0)
    {{-- <a class="dropdown-item @if(request()->is($me['url'].'*')) active @endif" href="{{ url($me['url']) }}" >
        {!! $me['icon'] !!} {{ $me['name'] }}
    </a> --}}
    <div class="menu-item">
        <a class="menu-link py-3 @if(request()->is($me['url'].'*')) active @endif" href=""{{ url($me['url']) }}">
            <span class="menu-bullet">
                <span class="bullet bullet-dot"></span>
            </span>
            <span class="menu-title">{{ $me['name'] }}</span>
        </a>
    </div>

    @else

    <div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item @if (request()->is($me['url'] . '*')) here show @endif menu-lg-down-accordion me-lg-1">
        <span class="menu-link py-3">
            <span class="menu-bullet">
                <span class="bullet bullet-dot"></span>
            </span>
            {{-- <span class="menu-icon">
                <!--begin::Svg Icon | path: icons/duotone/Code/Compiling.svg-->
                <span class="svg-icon svg-icon-2">
                    {!! $me['icon'] !!}
                </span>
                <!--end::Svg Icon-->
            </span> --}}
            <span class="menu-title">{{ $me['name'] }}</span>
            <span class="menu-arrow"></span>
        </span>

        <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown py-lg-4 w-lg-225px @if(request()->is($me['url'].'*')) show menu-active-bg @endif">
            @include('layouts._sub_menu', ['menu' => $me['sub']])
        </div>
    </div>

    @endif
    @endif
@endforeach
