<script src="{{ asset('js/post_detail.js') }}" defer></script>
<link rel="stylesheet" href="{{ asset('css/post_detail.css') }}">

<x-app-layout>
    <div class="py-5 mx-5">
        <!-- ヘッダー -->
        <div class="grid grid-cols-12 gap-4">
            <a href="{{ route('post_list.index') }}" class="col-span-3 xl:col-span-1 bg-black text-white rounded-lg text-center text-base xl:text-2xl py-3">戻る</a>
            <p class="col-start-4 xl:col-start-2 col-span-9 xl:col-span-11 text-center text-base xl:text-2xl bg-pink-200 rounded-lg py-3">{{ $post->customer->customer_name }}</p>
        </div>
        <div class="flex flex-col xl:flex-row justify-center mt-2">
            <canvas id="progress_chart" class="progress_chart mr-0 xl:mr-10"></canvas>
            <div class="flex flex-col mt-5 w-full">
                <div class="flex flex-col w-full">
                    <p class="text-3xl text-center large_disp bg-gray-600 py-2 text-white">進捗率</p>
                    <p id="progress" class="text-center large_disp border border-gray-600 py-2"></p>
                </div>
                <div class="flex flex-col xl:flex-row mt-0 xl:mt-2">
                    <div class="flex flex-col w-full">
                        <p class="text-3xl text-center small_disp bg-gray-600 py-2 text-white">{{ $post->info_1_label }}</p>
                        <p class="text-3xl text-center small_disp border border-gray-600 py-2">{{ number_format($post->info_1_text) }}</p>
                    </div>
                    @if(!is_null($post->info_2_label))
                        <div class="flex flex-col w-full ml-0 xl:ml-3">
                            <p class="text-3xl text-center small_disp bg-gray-600 py-2 text-white">{{ $post->info_2_label }}</p>
                            <p class="text-3xl text-center small_disp border border-gray-600 py-2">{{ number_format($post->info_2_text) }}</p>
                        </div>
                    @endif
                </div>
                <div class="flex flex-col xl:flex-row mt-0 xl:mt-2">
                    @if(!is_null($post->info_3_label))
                        <div class="flex flex-col w-full">
                            <p class="text-3xl text-center small_disp bg-gray-600 py-2 text-white">{{ $post->info_3_label }}</p>
                            <p class="text-3xl text-center small_disp border border-gray-600 py-2">{{ number_format($post->info_3_text) }}</p>
                        </div>
                    @endif
                    @if(!is_null($post->info_4_label))
                        <div class="flex flex-col w-full ml-0 xl:ml-3">
                            <p class="text-3xl text-center small_disp bg-gray-600 py-2 text-white">{{ $post->info_4_label }}</p>
                            <p class="text-3xl text-center small_disp border border-gray-600 py-2">{{ number_format($post->info_4_text) }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <input type="hidden" id="customer_code" value="{{ $post->customer_code }}">
    </div>
</x-app-layout>
