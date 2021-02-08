<h1 class="text-5xl">Player </h1>
<a href="/player/add"
   class="mb-10 px-4 py-2 inline-flex hover:bg-pink-500 bg-pink-600 text-white rounded-full justify-center items-center"><i
            class="fas fa-plus"></i>
</a>

<div class="grid grid-cols-5 gap-4">
    <?php foreach ($players as $player): ?>
        <div class="shadow-lg rounded float-left bg-white dark:bg-gray-800 p-4">
            <div class="flex-row gap-4 flex justify-center items-center">
                <div class="flex-shrink-0">

                </div>
                <div class=" flex flex-col">
                    <span class="text-gray-600 dark:text-white text-lg font-medium">
        <?= $player["username"]; ?>
                    </span>
                    <span class="text-gray-400 text-xs">
                        <?= $player["email"]; ?>
                    </span>
                    <span class="text-gray-400 text-xs">

                        <a class="hover:text-gray-600" href="/player/show?id=<?= $player["id"]; ?>">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a class="hover:text-gray-600" href="/player/edit?id=<?= $player["id"]; ?>">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="hover:text-gray-600" href="/player/delete?id=<?= $player["id"]; ?>"
                           onclick="return confirm('Are you sure you want to delete it?')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </span>

                </div>
            </div>
        </div>

    <?php endforeach; ?>
</div>

