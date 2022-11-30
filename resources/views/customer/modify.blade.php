<x-app-layout>
    <div class="py-5 mx-5">
        <!-- ヘッダー -->
        <div class="grid grid-cols-12 gap-4">
            <a href="{{ session('back_url_1') }}" class="col-span-3 xl:col-span-1 bg-black text-white rounded-lg text-center text-base xl:text-2xl py-3">戻る</a>
            <p class="col-start-4 xl:col-start-2 col-span-6 xl:col-span-2 text-center text-base xl:text-2xl bg-pink-200 rounded-lg py-3">荷主情報変更</p>
            <a href="{{ route('customer.delete', ['customer_code' => $customer->customer_code]) }}" class="col-start-10 xl:col-start-12 col-span-3 xl:col-span-1 bg-red-600 text-white rounded-lg text-center text-base xl:text-2xl py-3">削除</a>
        </div>
        <!-- アラート -->
        <x-alert/>
        <!-- 変更フォーム -->
        <form method="POST" action="{{ route('customer.modify') }}" class="m-0 grid grid-cols-12">
            @csrf
            <div class="col-span-12 grid grid-cols-12 mt-5 gap-y-2">
                <label for="customer_code" class="col-start-1 xl:col-start-1 col-span-4 xl:col-span-1 bg-black text-white text-center py-2">荷主コード</label>
                <input id="customer_code" name="customer_code" class="col-span-8 xl:col-span-2 border border-black pl-3 bg-gray-200" value="{{ old('customer_code', $customer->customer_code) }}" readonly>
                <label for="base" class="col-start-1 xl:col-start-1 col-span-4 xl:col-span-1 bg-black text-white text-center py-2">拠点</label>
                <select name="base" class="col-span-8 xl:col-span-2">
                    @foreach($base_info as $base_id => $base_name)
                        <option value="{{ $base_id }}" {{ $customer->base_id == $base_id ? 'selected' : '' }}>{{ $base_name }}</option>
                    @endforeach
                </select>
                <label for="customer_name" class="col-start-1 xl:col-start-1 col-span-4 xl:col-span-1 bg-black text-white text-center py-2">荷主名</label>
                <input type="text" id="customer_name" name="customer_name" class="col-span-8 xl:col-span-2" value="{{ old('customer_name', $customer->customer_name) }}" required autocomplete="off">
                <button type="submit" class="col-start-1 xl:col-start-1 col-span-12 xl:col-span-3 text-center bg-black text-white rounded-lg py-3">変更実行</button>
            </div>
        </form>
    </div>
</x-app-layout>
