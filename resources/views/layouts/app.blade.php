<x-admin-header />
<div class="main-wrapper">

    <x-admin-sidebar />
    @props(['PageTitle'])
    <div class="page-wrapper pagehead">
        <div class="content">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">{{ $PageTitle }}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            @if ($PageTitle != 'Dashboard')
                                <li class="breadcrumb-item active">{{ $PageTitle }}</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
<x-admin-footer />
