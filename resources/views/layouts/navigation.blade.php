<header class="nav-header py-2">
    <div class="grid grid-cols-12">
        <div class="col-span-2">
            <input type="checkbox" class="menu-btn" id="menu-btn">
            <label for="menu-btn" class="menu-icon"><span class="navicon"></span></label>
            <ul class="menu">
                <li><a href="{{ route('post_list.index') }}">進捗一覧</a></li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">ログアウト</a></li>
                </form>
            </ul>
        </div>
        <p class="col-start-3 col-span-5 text-2xl xl:text-5xl text-left xl:text-center text-blue-500 mt-2 xl:mt-0">進捗掲示板</p>
        <p class="col-start-9 col-span-4 text-right text-sm xl:text-xl mr-3 mt-4 xl:mt-3">{{ Auth::user()->name }}</p>
    </div>
</header>