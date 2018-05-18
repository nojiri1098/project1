<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{ isActiveUrl('dashboard') }}">
                <a href="/dashboard"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
            </li>
            <li class="{{ isActiveUrl('data') }}">
                <a href="/data"><i class="fa fa-table"></i><span>Data</span></a>
            </li>
            <li class="{{ isActiveUrl('analytics') }}">
                <a href="/analytics"><i class="fa fa-table"></i><span>Analytics</span></a>
            </li>
        </ul>
    </section>
</aside>