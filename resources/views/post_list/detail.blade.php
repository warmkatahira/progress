<script src="{{ asset('js/post_detail.js') }}" defer></script>
<link rel="stylesheet" href="{{ asset('css/post_detail.css') }}">

<x-app-layout>
    <div class="py-5 mx-5">
        <!-- ヘッダー -->
        <div class="grid grid-cols-12 gap-4">
            <a href="{{ route('post_list.index') }}" class="col-span-3 xl:col-span-1 bg-black text-white rounded-lg text-center text-base xl:text-2xl py-3">戻る</a>
            <p class="col-start-4 xl:col-start-2 col-span-9 xl:col-span-11 text-center text-base xl:text-2xl bg-pink-200 rounded-lg py-3">{{ $post->customer->customer_name }}</p>
        </div>
        <div class="flex justify-center mt-5">
            <canvas id="progress_chart" class="progress_chart"></canvas>
            <div class="flex flex-col ml-10 mt-5">
                <div class="flex flex-col">
                    <p class="text-3xl text-center large_disp bg-gray-600 py-2 text-white">進捗率</p>
                    <p id="progress" class="text-center large_disp border border-gray-600 py-5"></p>
                </div>
                <div class="flex flex-row mt-10">
                    <div class="flex flex-col">
                        <p class="text-3xl text-center small_disp bg-gray-600 py-2 text-white">{{ $post->info_1_label }}</p>
                        <p class="text-3xl text-center small_disp border border-gray-600 py-5">{{ $post->info_1_text }}</p>
                    </div>
                    <div class="flex flex-col ml-3">
                        <p class="text-3xl text-center small_disp bg-gray-600 py-2 text-white">{{ $post->info_2_label }}</p>
                        <p class="text-3xl text-center small_disp border border-gray-600 py-5">{{ $post->info_2_text }}</p>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="customer_code" value="{{ $post->customer_code }}">
    </div>
</x-app-layout>
