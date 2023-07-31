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
                        {{-- <li @if ($pageSlug == 'invoice') class="active " @endif>
                            <a href="{{ route('invoices.index') }}">
                                <i class="tim-icons icon-money-coins"></i>
                                <p>{{ _('Invoices') }}</p>
                            </a>
                        </li> --}}
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
