<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dog Maze</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-slate-100 min-h-screen flex flex-col items-center justify-center font-sans"
      x-data="mazeGame()">

    <h1 class="text-3xl font-bold text-slate-800 mb-4">
        Dog Maze
    </h1>

    <div class="mb-4 text-slate-500 text-sm">
        現在の位置: (<span x-text="dogX"></span>, <span x-text="dogY"></span>)
    </div>

    <div class="bg-white p-4 rounded-xl shadow-2xl border-4 border-slate-700">
        <table class="border-collapse">
            <template x-for="(row, y) in maze" :key="y">
                <tr>
                    <template x-for="(cell, x) in row" :key="x">
                        <td class="w-12 h-12 border border-slate-200 relative"
                            :class="cell === 1 ? 'bg-slate-700 shadow-inner' : 'bg-white'">

                            <template x-if="dogX === x && dogY === y">
                                <div class="flex items-center justify-center w-full h-full">
                                    <i class="fa-solid fa-dog text-2xl text-orange-600 drop-shadow-md transition-all duration-150"></i>
                                </div>
                            </template>

                        </td>
                    </template>
                </tr>
            </template>
        </table>
    </div>

    <div class="mt-8 grid grid-cols-3 gap-2 md:hidden">
        <div></div>
        <button @click="move(0, -1)" class="p-4 bg-white shadow rounded">↑</button>
        <div></div>
        <button @click="move(-1, 0)" class="p-4 bg-white shadow rounded">←</button>
        <button @click="move(0, 1)" class="p-4 bg-white shadow rounded">↓</button>
        <button @click="move(1, 0)" class="p-4 bg-white shadow rounded">→</button>
    </div>

    <p class="mt-6 text-slate-400 text-sm">PCなら矢印キーで動かせる🐶</p>

    <script>
        function mazeGame() {
            return {
                // 0: 道, 1: 壁
                maze: [
                    [0, 0, 1, 0, 0, 0, 0],
                    [1, 0, 1, 0, 1, 1, 0],
                    [0, 0, 0, 0, 0, 1, 0],
                    [0, 1, 1, 1, 0, 1, 0],
                    [0, 0, 0, 1, 0, 0, 0],
                    [0, 0, 0, 1, 0, 0, 0],
                    [1, 1, 0, 0, 0, 0, 0]
                ],
                dogX: 0,
                dogY: 0,

                // 初期化処理
                init() {
                    // キーボードイベントの監視
                    window.addEventListener('keydown', (e) => {
                        if (e.key === 'ArrowUp')    this.move(0, -1);
                        if (e.key === 'ArrowDown')  this.move(0, 1);
                        if (e.key === 'ArrowLeft')  this.move(-1, 0);
                        if (e.key === 'ArrowRight') this.move(1, 0);
                    });
                },

                // 移動ロジック
                move(dx, dy) {
                    const newX = this.dogX + dx;
                    const newY = this.dogY + dy;

                    // 迷路の範囲内かチェック
                    if (newY >= 0 && newY < this.maze.length &&
                        newX >= 0 && newX < this.maze[0].length) {

                        // 壁(1)じゃなければ移動！
                        if (this.maze[newY][newX] !== 1) {
                            this.dogX = newX;
                            this.dogY = newY;
                        }
                    }
                }
            }
        }
    </script>
</body>
</html>
