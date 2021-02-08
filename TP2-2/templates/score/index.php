<div class="grid grid-cols-3 gap-4">

    <table class="col-span-2 table p-4 bg-white shadow rounded-lg w-full ">
        <thead>
        <tr class="text-left">
            <th class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900">
                User
            </th>
            <th class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900">
                Game
            </th>
            <th class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900">
                Score
            </th>
            <th class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900">

            </th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($scores as $score): ?>
            <tr class="text-gray-700">
                <td class="border-b-2 p-4 dark:border-dark-5">
                    <?= $score["player"]["username"]; ?>
                </td>
                <td class="border-b-2 p-4 dark:border-dark-5">
                    <?= $score["game"]["name"]; ?>
                </td>
                <td class="border-b-2 p-4 dark:border-dark-5">
                    <?= $score["score"]; ?>
                </td>
                <td class="border-b-2 p-4 dark:border-dark-5">
                    <a href="/score/delete?id=<?= $score["id"]; ?>"
                       onclick="return confirm('Are you sure you want to delete it?')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <div>
        <form action="#"
              class="mb-6 flex flex-col w-full max-w-md px-4 py-8 bg-white rounded-lg shadow dark:bg-gray-800 sm:px-6 md:px-8 lg:px-10">
            <div class="self-center mb-6 text-xl font-light text-gray-600 sm:text-2xl dark:text-white">
                Add score
            </div>
            <div>
                <form action="#" autoComplete="off">
                    <div class="flex flex-col mb-2">
                        <div class="flex relative ">
                            <select class="block w-full text-gray-700 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                    id="game" name="game" required>
                                <option disabled selected>game</option>
                                <?php foreach ($games as $game): ?>
                                    <option value="<?= $game["id"]; ?>"><?= $game["name"]; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="flex flex-col mb-2">
                        <div class="flex relative ">

                            <select class="block w-full text-gray-700 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                    id="player" name="player" required>
                                <option disabled selected>player</option>
                                <?php foreach ($players as $player): ?>
                                    <option value="<?= $player["id"]; ?>"><?= $player["username"]; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="flex flex-col mb-6">
                        <div class="flex relative ">
                            <input class=" float-left w-1 flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                   type="number" class="form-control mr-sm-3 pull-right" name="score" id="score"
                                   placeholder="score" value="0">
                        </div>
                    </div>
                    <div class="flex w-full">
                        <button type="submit"
                                class="py-2 px-4  bg-purple-600 hover:bg-purple-700 focus:ring-purple-500 focus:ring-offset-purple-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                            Add Score
                        </button>
                    </div>
                </form>
            </div>
        </form>
    </div>
</div>