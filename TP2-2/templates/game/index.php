<h1 class="text-5xl">Games </h1>
<a  href="/game/add" class="mb-10 px-4 py-2 inline-flex hover:bg-pink-500 bg-pink-600 text-white rounded-full justify-center items-center"><i class="fas fa-plus"></i>
</a>
<?php foreach ($games as $game): ?>

<div class="flex bg-white md:h-60 h-24	 dark:bg-gray-800 rounded-lg shadow mb-5">
    <div class="flex-none w-24 md:w-60  relative">
        <img src="<?= $game["image"]; ?>" class="absolute rounded-lg inset-0 w-full h-full object-cover"/>
    </div>
    <div class="flex-auto p-6">
        <div class="flex flex-wrap">
            <h1 class="flex-auto text-xl font-semibold dark:text-gray-50">
                <?= $game["name"]; ?>
            </h1>
            <div class="text-xl font-semibold text-gray-500 dark:text-gray-300">
                <a href="/game/show?id=<?= $game["id"]; ?>">
                    <i class="fas fa-eye"></i>
                </a>
                <a href="/game/edit?id=<?= $game["id"]; ?>">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="/game/delete?id=<?= $game["id"]; ?>"
                   onclick="return confirm('Are you sure you want to delete it?')">
                    <i class="fas fa-trash"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<?php endforeach;?>