<div x-data="alpine()"
     class="min-h-screen bg-pink-100 rounded-xl text-slate-500 p-4"
>
    <div class="flex flex-col items-center justify-center gap-4">

        {{-- Home --}}
        <a href="{{ route('home') }}">
            <i class="fa-solid fa-dog text-red-500 text-5xl"></i>
        </a>

        {{-- x-text --}}
        <div class="flex items-center gap-2 p-4">
            <i class="fa-solid fa-dog"></i>
            <h1 x-data="{ title: 'Alpine Dog' }" x-text="title"></h1>
            <i class="fa-solid fa-dog"></i>
        </div>

        <div class="flex items-center gap-10">
            {{-- x-on --}}
            <div x-data="{ count: 0 }">
                <button x-on:click="count++"
                        class="border bg-white rounded-xl py-1 px-2 cursor-pointer"
                >
                    Increment Dog+
                </button>
                <i class="fa-solid fa-dog"></i>
                <span x-text="count"></span>
            </div>

            {{-- x-show --}}
            <div x-data="{ open: false }" class="flex items-center gap-1">
                <button @click="open = ! open"
                        class="border bg-white rounded-xl py-1 px-2 cursor-pointer"
                >
                    Toggle Dog
                </button>
                <div x-show="open" @click.outside="open = false">
                    <i class="fa-solid fa-dog"></i>
                    <i class="fa-solid fa-dog"></i>
                    <i class="fa-solid fa-dog"></i>
                </div>
            </div>
        </div>

        {{-- x-model / x-for --}}
        <div x-data="{
                search: '',
                items: ['dog', 'dag', 'rabbit'],
                get filteredItems() {
                    return this.items.filter(
                        i => i.startsWith(this.search)
                    )
                }
            }"
            class="border border-yellow-500 rounded-xl p-4"
        >
            <input x-model="search" placeholder="Serarch dog..." class="border border-black py-1 px-2">
            <ul>
                <template x-for="item in filteredItems" :key="item">
                    <li x-text="item"></li>
                </template>
            </ul>
        </div>

        <div class="flex gap-2">
            {{-- @mouseenter / @mouseleave --}}
            <div x-data="{ hover: false }"
                 @mouseenter="hover = true"
                 @mouseleave="hover = false"
                 class="flex items-center justify-center w-24 h-24 rounded-full border border-black"
                 :class="hover ? 'text-pink-500 text-4xl' : 'text-gray-500 text-xl'"
            >
                <i class="fa-solid fa-dog transition-all duration-300"></i>
            </div>
            {{-- x-transition --}}
            <div x-data="{ hover: false }"
                 @mouseenter="hover = true"
                 @mouseleave="hover = false"
                 class="flex items-center justify-center w-24 h-24 rounded-full border border-black"
            >
                <div x-show="hover"
                     x-transition.duration.300ms
                >
                    <i class="fa-solid fa-dog text-rose-500 text-4xl"></i>
                </div>
            </div>
        </div>

        {{-- Move --}}
        <div x-data="{
                dog: { x: 10, y: 10 },
                isLeft: false,

                up() {
                    this.dog.y -= 10;
                },

                down() {
                    this.dog.y += 10;
                },

                right() {
                    this.isLeft = false;
                    this.dog.x += 10;
                },

                left() {
                    this.isLeft = true;
                    this.dog.x -= 10;
                },

             }"
             @keydown.arrow-up.window="up()"
             @keydown.arrow-down.window="down()"
             @keydown.arrow-right.window="right()"
             @keydown.arrow-left.window="left()"
             class="relative w-96 h-48 border-2 border-orange-500 rounded-2xl"
        >
            <div class="absolute transition-all duration.200"
                 :style="{
                    left: dog.x + 'px',
                    top: dog.y + 'px'
                 }"
                 :class="isLeft ? '-scale-x-100' : 'scale-x-100'"
            >
                <i class="fa-solid fa-dog text-sky-300 text-3xl"></i>
            </div>
        </div>

    </div>
</div>

<script>
    function alpine() {

            return {
                dog: true,
            }
        }
</script>
