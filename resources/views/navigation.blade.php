<!-- Navigation -->
<a href="{{ action('FrontendController@addSong') }}" class="btn btn-default main-add"><i class="fa fa-plus"></i> Dodaj piosenkę</a>
<a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i></a>
<nav id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
        <li class="sidebar-brand">
            <a href="{{ url()->to('/') }}" onclick='$ ( "#menu-close").click();'><i class="fa fa-search"></i> Wyszukaj</a>
        </li>
        <li>
            <a href="{{ action('FrontendController@allSongs') }}" onclick='$ ( "#menu-close").click();'><i class="fa fa-list"></i> Lista piosenek</a>
        </li>
        <li>
            <a href="{{ action('FrontendController@addSong') }}" onclick='$ ( "#menu-close").click();'><i class="fa fa-plus"></i> Dodaj piosenkę</a>
        </li>
        <li>
            <a href="{{ action('FrontendController@manageTags') }}" onclick='$ ( "#menu-close").click();'><i class="fa fa-tag"></i> Zarządzaj tagami</a>
        </li>
    </ul>
</nav>