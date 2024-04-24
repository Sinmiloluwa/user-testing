<div class="flex justify-start">
    <h3 class="text-lg py-4 font-bold">New Project</h3>
</div>
   <form method="POST" action="{{ route('review') }}">
    @csrf
        <div class="flex flex-col">
            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">How did you feel while using the product?</label>
                <input type="text" id="first_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="John" name="feeling" required />
            </div>
            <div class="py-2">
                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Did the features you used work as expected?</label>
                <input type="text" id="last_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Doe" name="feature" required />
            </div>
            <div>
                <label for="country"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">How easy was it to find the features you were looking for?</label>
                    <input type="text" id="website"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            name="search" required />
                   
            </div>
            <div>
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Did the product guide you through the process effectively?</label>
                <input type="text" id="link"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="https://xyz.com" name="guidance" required />
            </div>
            <div>
                <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">What was your first impression of the product?</label>
                <input type="text" id="website"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            name="impression" required />
            </div>

            <div class="py-3">
                <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">The question is not listed above provide your feedback</label>
                <textarea id="website"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            name="feedback" required> </textarea>
            </div>
            <div class="py-3">
                <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">The question is not listed above provide your feedback</label>
                <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="projectId" id="projectIdInput" value="3">
            </div>
            
        </div>
        <button class="bg-black text-white p-3 text-sm rounded-md mr-2 font-light">Submit</button>
    </form>
