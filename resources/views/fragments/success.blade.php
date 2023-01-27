<div class="fixed bg-slate-900 w-screen h-screen bg-opacity-50 z-[999999]" id="alert">
    <div class="absolute top-[50%] left-[50%] -translate-x-[50%] -translate-y-[50%] bg-white border-4 border-teal-700 rounded-lg text-teal-700 px-10
     py-10 shadow-md"
        role="alert">
        <div class="flex">
            <div class="py-1 px-1"><svg class="fill-current h-5 w-5 text-teal-700 mr-2" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <path
                        d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                </svg></div>
            <div>
                <h2 class="font-bold text-teal-700">Success!</h2>
                <p class="text-sm">{!! session()->get('success') !!}</p>
            </div>
        </div>
        <div class="flex justify-end pt-5">
            <button onclick="btn_close()" class="bg-teal-700 rounded-md p-3 py-1 text-sm text-white">Close</button>
        </div>
    </div>
</div>

<script>
    function btn_close() {
        document.getElementById("alert").style.display = "none";
    }
</script>
