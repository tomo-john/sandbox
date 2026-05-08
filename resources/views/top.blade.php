<x-layouts.app>
    <div class="max-w-5xl mx-auto bg-white rounded-xl p-4 flex flex-col items-center gap-4">
        <div class="flex text-slate-500 items-center gap-3">
            Top Page
            <i class="fa-solid fa-dog"></i>
        </div>

        <div class="flex gap-4">
            <a href="{{ route('maze') }}">
                <i class="fa-solid fa-dog text-pink-100"></i>
            </a>
            <a href="{{ route('alpine') }}">
                <i class="fa-solid fa-dog text-pink-200"></i>
            </a>
            <a href="{{ route('puppy') }}">
                <i class="fa-solid fa-dog text-pink-300"></i>
            </a>
        </div>
    </div>
</x-layouts.app>
