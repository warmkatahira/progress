<x-app-layout>
    <div class="py-5 mx-5">
        <div class="grid grid-cols-12 gap-4">
            <p class="col-span-6 xl:col-span-2 text-center text-base xl:text-2xl bg-pink-200 rounded-lg py-3">進捗一覧</p>
        </div>
        <!-- 抽出条件 -->
        <div class="grid grid-cols-12 gap-4 mt-5">
            <p class="col-span-12 border-l-4 border-green-600 pl-2 text-base xl:text-xl">抽出条件</p>
            <form method="GET" action="{{ route('post_list.search') }}" class="m-0 col-span-12 xl:col-span-8 grid grid-cols-12 gap-4">
                <select name="search_base" class="col-span-9 xl:col-span-4 rounded-lg">
                    @foreach($base_info as $base_id => $base_name)
                        <option value="{{ $base_id }}" {{ $base_id == session('search_base') ? 'selected' : '' }}>{{ $base_name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="col-start-11 xl:col-start-5 col-span-4 xl:col-span-2 rounded-lg text-center bg-green-200"><i class="las la-search la-lg"></i></button>
            </form>
            <!-- ビュー切り替えボタン -->
            <div class="col-span-12 xl:col-span-4 grid grid-cols-12">
                <form method="GET" action="{{ route('post_list.view_change') }}" class="m-0 col-span-12 grid grid-cols-12">
                    <button type="submit" name="view_update" class="col-span-6 text-sm text-center border-black border {{ session('view_type') == 'update' ? 'bg-blue-200' : 'bg-gray-200' }}">更新順</button>
                    <button type="submit" name="view_base" class="col-span-6 text-sm text-center border-black border-y border-r {{ session('view_type') == 'base' ? 'bg-blue-200' : 'bg-gray-200' }}">拠点順</button>
                </form>
            </div>
        </div>
        <!-- 進捗一覧 -->
        <div class="grid grid-cols-12 gap-4 mt-5">
            @foreach($posts as $post)
                <div class="col-span-12 xl:col-span-4 grid grid-cols-12">
                    <p class="col-span-12 text-right pr-5 text-sm">{{ '最終更新:'.\Carbon\Carbon::parse($post->updated_at)->isoFormat('YYYY年MM月DD日(ddd) HH時mm分ss秒') }}</p>
                    <p class="col-span-12 bg-black text-white text-center rounded-t-lg py-3">{{ $post->customer->customer_name }}</p>
                    <p class="col-span-5 bg-gray-300 text-center py-3 border-b-2 border-black border-dashed">{{ is_null($post->info_1_label) ? '-' : $post->info_1_label }}</p>
                    <p class="col-span-7 bg-gray-300 text-center py-3 border-b-2 border-black border-dashed">{{ is_null($post->info_1_text) ? '-' : number_format($post->info_1_text) }}</p>
                    <p class="col-span-5 bg-gray-300 text-center py-3 border-b-2 border-black border-dashed">{{ is_null($post->info_2_label) ? '-' : $post->info_2_label }}</p>
                    <p class="col-span-7 bg-gray-300 text-center py-3 border-b-2 border-black border-dashed">{{ is_null($post->info_2_text) ? '-' : number_format($post->info_2_text) }}</p>
                    <p class="col-span-5 bg-gray-300 text-center py-3">{{ is_null($post->info_3_label) ? '-' : $post->info_3_label }}</p>
                    <p class="col-span-7 bg-gray-300 text-center py-3">{{ is_null($post->info_3_text) ? '-' : number_format($post->info_3_text) }}</p>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
