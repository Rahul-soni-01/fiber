<x-layout>
    <x-slot name="title">Add Party</x-slot>
    <x-slot name="main">
        <div class="main1" id="main1">
            
            <form action="{{ route('party.add') }}" method="post">
                @csrf
                <div class="container">
                    <div class="row justify-content-center"> <!-- Centering the form on larger screens -->
                        <div class="col-12 col-lg-6"> <!-- Full width on mobile, 50% on larger screens -->
                            <div class="mb-3">
                                <label for="party_name">Party Name</label>
                                <input type="text" name="party_name" class="form-control"
                                    placeholder="Enter Party Name">
                            </div>
                            <div class="mb-3">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control"
                                    placeholder="Enter Party Address">
                            </div>
                            <div class="mb-3">
                                <label for="tele_no">Telephone No.</label>
                                <input type="number" name="tele_no" class="form-control" placeholder="Enter Ph/No">
                            </div>
                            <div class="mb-3">
                                <label for="contact_person_name">Contact Person Name</label>
                                <input type="text" name="contact_person_name" class="form-control"
                                    placeholder="Enter Person Name">
                            </div>
                            <div class="text-center"> <!-- Centering the button -->
                                <button class="btn btn-dark">Add Party</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </x-slot>
</x-layout>