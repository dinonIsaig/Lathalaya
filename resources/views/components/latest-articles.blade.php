<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-10">
    @foreach (range(1, 4) as $index)
        <div class="flex flex-wrap">
            <div class="bg-white rounded-lg shadow-md overflow-hidden top-4 max-w-md">
                <img src="{{ asset('assets/images/articleImg.png') }}" alt="Article Image"
                    class="object-cover h-35 w-full">

                <div class="pl-4 py-5 pr-30">

                    <div class="flex items-center gap-3 mb-3">
                        <span class="bg-tags-bg text-primary text-xs font-semibold px-2 py-1 rounded">Health</span>
                        <span class="text-gray-400 text-xs">January 10, 2026</span>
                    </div>

                    <h1 class="text-gray-900 text-lg font-bold leading-tight mb-4">
                        Revolutionary Medical Treatment Shows Promise in Clinical Trials</h1>

                    <p class="text-gray-500 text-sm">By John Writer</p>
                </div>

            </div>
        </div>
    @endforeach
</div>
