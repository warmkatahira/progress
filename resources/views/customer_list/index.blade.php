<x-app-layout>
    <div class="py-5 mx-5">
        <div class="grid grid-cols-12 gap-4">
            <p class="col-span-6 xl:col-span-2 text-center text-base xl:text-2xl bg-pink-200 rounded-lg py-3">荷主一覧</p>
            <a href="{{ route('customer.register_index') }}" class="col-start-10 xl:col-start-12 col-span-3 xl:col-span-1 bg-black text-white rounded-lg text-center text-base xl:text-2xl py-3">登録</a>
        </div>
        <!-- 抽出条件 -->
        <div class="grid grid-cols-12 gap-4 mt-5">
            <p class="col-span-12 border-l-4 border-green-600 pl-2 text-base xl:text-xl">抽出条件</p>
            <form method="GET" action="{{ route('customer_list.search') }}" class="m-0 col-span-12 grid grid-cols-12 gap-4">
                <select name="search_base" class="col-span-9 xl:col-span-3 rounded-lg">
                    @foreach($base_info as $base_id => $base_name)
                        <option value="{{ $base_id }}" {{ $base_id == session('search_base') ? 'selected' : '' }}>{{ $base_name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="col-start-11 xl:col-start-4 col-span-4 xl:col-span-1 rounded-lg text-center bg-green-200">抽出</button>
            </form>
        </div>
        <!-- 荷主一覧 -->
        <div class="grid grid-cols-12 gap-4 mt-5">
            @foreach($customers as $customer)
                <a href="{{ route('customer.modify_index', ['customer_code' => $customer->customer_code]) }}" class="col-span-12 xl:col-span-4 grid grid-cols-12">
                    <p class="col-span-12 bg-black text-white text-center rounded-t-lg py-3">{{ $customer->customer_name }}</p>
                    <p class="col-span-5 bg-gray-300 text-center py-3 border-b-2 border-black border-dashed">荷主コード</p>
                    <p class="col-span-7 bg-gray-300 text-center py-3 border-b-2 border-black border-dashed">{{ $customer->customer_code }}</p>
                    <p class="col-span-5 bg-gray-300 text-center py-3 border-b-2">拠点</p>
                    <p class="col-span-7 bg-gray-300 text-center py-3 border-b-2">{{ $customer->base->base_name }}</p>
                </a>
            @endforeach
        </div>
    </div>
</x-app-layout>
