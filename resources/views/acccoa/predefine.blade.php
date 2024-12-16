<x-layout>
    <x-slot name="title">Show Predefine Account</x-slot>
    <x-slot name="main">
        <div class="main" id="main">
            <h3>Edit Account</h3>
            <a href="{{ route('acccoa.index') }}" class="btn btn-primary">Back to Account</a>
            <form action="{{ route('predefine.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                <div class="col-md-3 mt-3">
                    <label for="cashCode" class="form-label">Cash Code</label>
                    <select id="cashCode" name="cashCode" class="form-control select2" placeholder="Enter Party Name">
                        <option value="" disabled selected>Choose a Parent Cash Code</option>
                        @foreach($accounts as $account)
                            <option value="{{ $account->HeadCode }}" @if($account->HeadCode == $predefineaccount->cashCode) selected @endif>
                                {{ $account->HeadCode }} - {{ $account->HeadName }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3 mt-3">
                    <label for="bankCode" class="form-label">Bank Code</label>
                    <select id="bankCode" name="bankCode" class="form-control select2" placeholder="Enter Bank Code">
                        <option value="" disabled selected>Choose a Bank Code</option>
                        @foreach($accounts as $account)
                            <option value="{{ $account->HeadCode }}" @if($account->HeadCode === $predefineaccount->bankCode) selected @endif>
                                {{ $account->HeadCode }} - {{ $account->HeadName }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3 mt-3">
                    <label for="advance" class="form-label">Advance</label>
                    <select id="advance" name="advance" class="form-control select2" placeholder="Enter Advance">
                        <option value="" disabled selected>Choose an Advance</option>
                        @foreach($accounts as $account)
                            <option value="{{ $account->HeadCode }}" @if($account->HeadCode === $predefineaccount->advance) selected @endif>
                                {{ $account->HeadCode }} - {{ $account->HeadName }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3 mt-3">
                    <label for="fixedAsset" class="form-label">Fixed Asset</label>
                    <select id="fixedAsset" name="fixedAsset" class="form-control select2" placeholder="Enter Fixed Asset">
                        <option value="" disabled selected>Choose a Fixed Asset</option>
                        @foreach($accounts as $account)
                            <option value="{{ $account->HeadCode }}" @if($account->HeadCode === $predefineaccount->fixedAsset) selected @endif>
                                {{ $account->HeadCode }} - {{ $account->HeadName }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3 mt-3">
                    <label for="purchaseCode" class="form-label">Purchase Code</label>
                    <select id="purchaseCode" name="purchaseCode" class="form-control select2" placeholder="Enter Purchase Code">
                        <option value="" disabled selected>Choose a Purchase Code</option>
                        @foreach($accounts as $account)
                            <option value="{{ $account->HeadCode }}" @if($account->HeadCode === $predefineaccount->purchaseCode) selected @endif>
                                {{ $account->HeadCode }} - {{ $account->HeadName }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3 mt-3">
                    <label for="salesCode" class="form-label">Sales Code</label>
                    <select id="salesCode" name="salesCode" class="form-control select2" placeholder="Enter Sales Code">
                        <option value="" disabled selected>Choose a Sales Code</option>
                        @foreach($accounts as $account)
                            <option value="{{ $account->HeadCode }}" @if($account->HeadCode === $predefineaccount->salesCode) selected @endif>
                                {{ $account->HeadCode }} - {{ $account->HeadName }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3 mt-3">
                    <label for="serviceCode" class="form-label">Service Code</label>
                    <select id="serviceCode" name="serviceCode" class="form-control select2" placeholder="Enter Service Code">
                        <option value="" disabled selected>Choose a Service Code</option>
                        @foreach($accounts as $account)
                            <option value="{{ $account->HeadCode }}" @if($account->HeadCode === $predefineaccount->serviceCode) selected @endif>
                                {{ $account->HeadCode }} - {{ $account->HeadName }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3 mt-3">
                    <label for="customerCode" class="form-label">Customer Code</label>
                    <select id="customerCode" name="customerCode" class="form-control select2" placeholder="Enter Customer Code">
                        <option value="" disabled selected>Choose a Customer Code</option>
                        @foreach($accounts as $account)
                            <option value="{{ $account->HeadCode }}" @if($account->HeadCode === $predefineaccount->customerCode) selected @endif>
                                {{ $account->HeadCode }} - {{ $account->HeadName }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3 mt-3">
                    <label for="supplierCode" class="form-label">Supplier Code</label>
                    <select id="supplierCode" name="supplierCode" class="form-control select2" placeholder="Enter Supplier Code">
                        <option value="" disabled selected>Choose a Supplier Code</option>
                        @foreach($accounts as $account)
                            <option value="{{ $account->HeadCode }}" @if($account->HeadCode === $predefineaccount->supplierCode) selected @endif>
                                {{ $account->HeadCode }} - {{ $account->HeadName }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3 mt-3">
                    <label for="costs_of_good_solds" class="form-label">Costs of Good Solds</label>
                    <select id="costs_of_good_solds" name="costs_of_good_solds" class="form-control select2" placeholder="Enter Costs of Good Solds">
                        <option value="" disabled selected>Choose Costs of Good Solds</option>
                        @foreach($accounts as $account)
                            <option value="{{ $account->HeadCode }}" @if($account->HeadCode === $predefineaccount->costs_of_good_solds) selected @endif>
                                {{ $account->HeadCode }} - {{ $account->HeadName }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3 mt-3">
                    <label for="vat" class="form-label">VAT</label>
                    <select id="vat" name="vat" class="form-control select2" placeholder="Enter VAT">
                        <option value="" disabled selected>Choose VAT</option>
                        @foreach($accounts as $account)
                            <option value="{{ $account->HeadCode }}" @if($account->HeadCode === $predefineaccount->vat) selected @endif>
                                {{ $account->HeadCode }} - {{ $account->HeadName }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3 mt-3">
                    <label for="tax" class="form-label">Tax</label>
                    <select id="tax" name="tax" class="form-control select2" placeholder="Enter Tax">
                        <option value="" disabled selected>Choose Tax</option>
                        @foreach($accounts as $account)
                            <option value="{{ $account->HeadCode }}" @if($account->HeadCode === $predefineaccount->tax) selected @endif>
                                {{ $account->HeadCode }} - {{ $account->HeadName }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
            </div>
                <button type="submit" class="btn btn-success mt-4">Update</button>
            </form>
        </div>
    </x-slot>
</x-layout>