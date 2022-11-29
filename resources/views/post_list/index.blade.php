<x-app-layout>
    <div class="py-5 mx-5">
        <div class="grid grid-cols-12 gap-4">
            <p class="col-span-6 xl:col-span-2 text-center text-base xl:text-2xl bg-pink-200 rounded-lg py-3">進捗一覧</p>
        </div>
        <div class="grid grid-cols-12 gap-4 mt-5">
            @foreach($posts as $post)
                <div class="col-span-12 xl:col-span-4 grid grid-cols-12">
                    <p class="col-span-12 text-right pr-5 text-sm">{{ '最終更新時間:'.\Carbon\Carbon::parse($post->updated_at)->isoFormat('YYYY年MM月DD日(ddd) HH時mm分ss秒') }}</p>
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
