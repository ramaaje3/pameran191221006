<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center mb-3" href="{{ route('home') }}">
    <div class="sidebar-brand-icon "> <!-- rotate-n-15 -->
        <i class="fas fa-users-cog"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Owner</div>
</a>

<hr class="sidebar-divider my-0">


<!-- Nav Item - Dashboard -->
<li class="nav-item {{ Nav::isRoute('home') }}">
    <a class="nav-link" href="{{ route('home') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>{{ __('Dashboard') }}</span>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Data User -->
<li class="nav-item {{ Nav::isRoute('basic.index') }}">
    <a class="nav-link" href="{{ route('basic.index') }}">
        <i class="fas fa-fw fa-plus"></i>
        <span>{{ __(' Data User') }}</span>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Data Pending -->
<li class="nav-item {{ Nav::isRoute('loan.indexOwner') }}">
    <a class="nav-link" href="{{ route('loan.indexOwner') }}">
        <i class="fas fa-fw fa-plus"></i>
        <span>{{ __(' Data Pending') }}</span>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Approved Loan -->
<li class="nav-item {{ Nav::isRoute('loan.index') }}">
    <a class="nav-link" href="{{ route('loan.index') }}">
        <i class="fas fa-fw fa-calendar"></i>
        <span>{{ __('Pesanan Disetujui') }}</span>
    </a>
</li>

<!-- Nav Item - Rejected Loan -->
<li class="nav-item {{ Nav::isRoute('loan.rejectedLoan') }}">
    <a class="nav-link" href="{{ route('loan.rejectedLoan') }}">
        <i class="fas fa-fw fa-calendar"></i>
        <span>{{ __('Pesanan Ditolak') }}</span>
    </a>
</li>
