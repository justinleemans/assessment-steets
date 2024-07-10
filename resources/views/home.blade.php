<x-layout>
    <x-slot:title>Home</x-slot>
    {{-- <div x-data="{ message: 'Hello, Alpine!' }" class="text-center mt-4">
        <span x-text="message"></span>
    </div> --}}
    <div class="container d-flex flex-column align-items-center">
        <form class="w-50 my-3" x-data="yearForm()" @submit.prevent="submitForm">
            <div class="mb-3">
                <label for="year" class="form-label">Enter Year</label>
                <input type="number" class="form-control" id="year" value="2024" min="0" x-model="formData.year">
            </div>
            <button type="submit" class="btn btn-primary w-100" :disabled="formLoading" x-text="submitText"></button>
        </form>
        <table class="table table-striped w-75" x-show="responseData.length > 0" x-transition>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Year</th>
                    <th scope="col">Christmas Day</th>
                </tr>
            </thead>
            <tbody>
                <template x-for="(item, index) in responseData" :key="index">
                    <tr>
                        <th scope="row" x-text="index + 1"></th>
                        <td>Data 1</td>
                        <td>Data 2</td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>
    <script>
        const FORM_URL = "{{ route('home.store') }}";
        const CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        
        function yearForm()
        {
            return {
                formData: {},
                responseData: [],
                formLoading: false,
                submitText: "Submit",
                submitForm() {
                    this.formLoading = true;
                    this.submitText = "Submitting...";
                    fetch(FORM_URL, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": CSRF_TOKEN,
                            Accept: "application/json",
                        },
                        body: JSON.stringify(this.formData),
                    })
                    .then(response => response.json())
                    .then(result => {
                        responseData = result;
                        console.log(result);
                    })
                    .catch(error => console.error("Error", error))
                    .finally(() => {
                        this.formLoading = false;
                        this.submitText = "Submit";
                    });
                }
            }
        }
    </script>
</x-layout>