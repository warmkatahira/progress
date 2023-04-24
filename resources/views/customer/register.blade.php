<x-app-layout>
    <div class="py-5 mx-5">
        <!-- ヘッダー -->
        <div class="grid grid-cols-12 gap-4">
            <a href="{{ session('back_url_1') }}" class="col-span-3 xl:col-span-1 bg-black text-white rounded-lg text-center text-base xl:text-2xl py-3">戻る</a>
            <p class="col-start-4 xl:col-start-2 col-span-6 xl:col-span-2 text-center text-base xl:text-2xl bg-pink-200 rounded-lg py-3">荷主登録</p>
        </div>
        <!-- アラート -->
        <x-alert/>
        <!-- 登録フォーム -->
        <form method="POST" action="{{ route('customer.register') }}" class="m-0 grid grid-cols-12">
            @csrf
            <div class="col-span-12 grid grid-cols-12 mt-5 gap-y-2">
                <label for="customer_code" class="col-start-1 xl:col-start-1 col-span-4 xl:col-span-1 bg-black text-white text-center py-2">荷主コード</label>
                <input type="text" id="customer_code" name="customer_code" class="col-span-8 xl:col-span-2" required autocomplete="off">
                <label for="base" class="col-start-1 xl:col-start-1 col-span-4 xl:col-span-1 bg-black text-white text-center py-2">拠点</label>
                <select name="base" class="col-span-8 xl:col-span-2">
                    @foreach($base_info as $base_id => $base_name)
                        <option value="{{ $base_id }}">{{ $base_name }}</option>
                    @endforeach
                </select>
                <label for="customer_name" class="col-start-1 xl:col-start-1 col-span-4 xl:col-span-1 bg-black text-white text-center py-2">荷主名</label>
                <input type="text" id="customer_name" name="customer_name" class="col-span-8 xl:col-span-2" required autocomplete="off">
                <label for="is_detail_available" class="col-start-1 xl:col-start-1 col-span-4 xl:col-span-1 bg-black text-white text-center py-2">詳細表示</label>
                <select name="is_detail_available" class="col-span-8 xl:col-span-2">
                    <option value="0">無効</option>
                    <option value="1">有効</option>
                </select>
                <button type="submit" class="col-start-1 xl:col-start-1 col-span-12 xl:col-span-3 text-center bg-black text-white rounded-lg py-3">登録実行</button>
            </div>
        </form>
    </div>
</x-app-layout>
