<div x-data="puppy()"
     class="relative min-h-screen bg-pink-100 rounded-xl text-slate-500 p-4 flex flex-col items-center justify-center"
>
    <div class="relative w-48 h-48 bg-green-100 border-2 rounded-2xl flex items-center justify-center">
        <div>
            <i class="fa-solid fa-dog text-pink-400 text-4xl"></i>
        </div>
        <div class="absolute z-10 top-2 left-2">
            <i class="fa-solid fa-dog text-pink-400 text-4xl"></i>
        </div>
    </div>

</div>

<script>
    function puppy() {

            return {
                dogState: {
                    happy: 50,
                    hunger: 50,
                    mood: 'good',
                },
            }
        }
</script>
