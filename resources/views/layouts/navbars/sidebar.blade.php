<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ _('OS') }}</a>
            <a href="{{ route('home') }}" class="simple-text logo-normal">{{ _('Optical Store') }}</a>
        </div>
        <ul class="nav">
            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="tim-icons icon-components"></i>
                    <span class="nav-link-text">{{ __('Dashboard') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'files') class="active " @endif>
                            <a href="{{ route('files.index') }}">
                                <i class=" tim-icons icon-paper"></i>
                                <p>{{ _('Files') }}</p>
                            </a>
                        </li>
                        @can('user-list')
                            <li @if ($pageSlug == 'Users') class="active " @endif>
                                <a href="{{ route('users.index') }}">
                                    <i class=" tim-icons icon-single-02"></i>
                                    <p>{{ _('Users') }}</p>
                                </a>
                            </li>
                        @endcan
                        @can('role-list')
                            <li @if ($pageSlug == 'Roles') class="active " @endif>
                                <a href="{{ route('roles.index') }}">
                                    <i class=" tim-icons icon-badge"></i>
                                    <p>{{ _('Roles') }}</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
