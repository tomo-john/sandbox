<div x-data="dogMaze()"
     class="flex flex-col justify-center items-center gap-4"
>
    {{-- Home --}}
    <div class="text-pink-400">
        <a href="{{ route('home') }}">
            <i class="fa-solid fa-dog text-3xl"></i>
        </a>
    </div>

    {{-- Field --}}
    <div class="border-2 border-yellow-500 bg-green-100 rounded-lg overflow-hidden relative"
         :style="{
            width: (field.cols * field.gridSize) + 'px',
            height: (field.rows * field.gridSize) + 'px'
         }"
         x-ref="field"
    >
        {{-- Dog --}}
        <div class="absolute z-20 flex items-center justify-center"
             :style="{
                width: field.gridSize + 'px',
                height: field.gridSize + 'px',
                left: (dog.x * field.gridSize) + 'px',
                top: (dog.y * field.gridSize) + 'px'
             }"
        >
            <i class="fa-solid fa-dog text-pink-400 text-4xl"></i>
        </div>

        {{-- Wall --}}
        <template x-for="wall in walls">
            <div class="absolute z-10 flex items-center justify-center bg-gray-300"
                 :style="{
                    width: field.gridSize + 'px',
                    height: field.gridSize + 'px',
                    left: (wall.x * field.gridSize) + 'px',
                    top: (wall.y * field.gridSize) + 'px'
                 }"
            >
            </div>
        </template>

        {{-- Tree --}}
        <template x-for="tree in trees">
            <div class="absolute z-10 flex items-center justify-center"
                 :style="{
                    width: field.gridSize + 'px',
                    height: field.gridSize + 'px',
                    left: (tree.x * field.gridSize) + 'px',
                    top: (tree.y * field.gridSize) + 'px'
                 }"
            >
                <i class="fa-solid fa-tree text-green-500 text-5xl"></i>
            </div>
        </template>
    </div>

</div>

<script>
    function dogMaze() {

        return {
            field: {
                gridSize: 50,
                cols: 20,
                rows: 8,
            },

            dog: {
                x: 0,
                y: 0,
            },

            walls: [
                { x: 1, y: 1 }, {x: 2, y: 1 }, { x: 3, y: 3 }, { x: 3, y: 4},
            ],

            trees: [
                { x: 4, y: 4 }, { x: 4, y: 5 },
                { x: 5, y: 4 }, { x: 5, y: 5 },
            ],
        }

    }
</script>
