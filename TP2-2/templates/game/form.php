<form class="flex flex-col w-full px-4 py-8 bg-white rounded-lg shadow dark:bg-gray-800 sm:px-6 md:px-8 lg:px-10" method="POST" action="#">
    <div class="flex flex-col mb-2">
        <div class=" relative ">
            <input type="string"
                   class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                   id="name" aria-describedby="name" placeholder="Name" value="<?= $game["name"]; ?>">
        </div>
    </div>
    <div class="flex flex-col mb-2">
        <div class=" relative ">
            <input type="string"
                   class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"

                   id="image" aria-describedby="image" placeholder="URL"
                   value="<?= $game["image"]; ?>">
        </div>
    </div>

    <button type="submit"  class="py-2 px-4  bg-gray-600 hover:bg-gray-700 focus:ring-gray-500 focus:ring-offset-gray-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">Save</button>


</form>