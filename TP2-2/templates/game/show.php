<div class="flex bg-white md:h-60 h-24	 dark:bg-gray-800 rounded-lg shadow mb-5">
    <div class="flex-none w-24 md:w-60  relative">
        <img src="<?= $game["image"]; ?>" class="absolute rounded-lg inset-0 w-full h-full object-cover"/>
    </div>
    <div class="flex-auto p-6">
        <div class="flex flex-wrap">
            <h1 class="flex-auto text-xl font-semibold dark:text-gray-50">
                <?= $game["name"]; ?>
            </h1>
        </div>
    </div>
</div>