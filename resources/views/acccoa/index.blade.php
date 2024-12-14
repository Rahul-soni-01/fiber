<x-layout>
    <x-slot name="title">Show Acc Coa</x-slot>
    <x-slot name="main">
        <div class="main" id="main" style="">
            
            <a href="{{ route('acccoa.create') }}" class="btn btn-primary mb-2">Add Acc Coa</a>
            
            <div class="container">
                <h2 class="text-center mb-4">Chart of Accounts</h2>
                <div class="row">
                    <div class="col-12">
                        @php
                            // Group the accounts by HeadLevel
                            $groupedAccounts = $accounts->groupBy('HeadLevel');
                        @endphp
            
                        @if(isset($groupedAccounts[1]))
                            @foreach ($groupedAccounts[1] as $topLevel)
                                <!-- Display top-level account -->
                                <div class="row">
                                    <div class="col-12">
                                        <strong>{{ $topLevel->HeadCode }}. {{ $topLevel->HeadName }}</strong>
                                    </div>
                                    
                                    <!-- Display child accounts (Level 2) -->
                                    @if (isset($groupedAccounts[2]))
                                        @foreach ($groupedAccounts[2] as $childLevel2)
                                            @if ($childLevel2->PHeadCode == $topLevel->HeadCode)
                                                <div class="col-12 offset-sm-2">
                                                    |- {{ $childLevel2->HeadName }}
                                                </div>
                                                
                                                <!-- Display child accounts (Level 3) -->
                                                @if (isset($groupedAccounts[3]))
                                                    @foreach ($groupedAccounts[3] as $childLevel3)
                                                        @if ($childLevel3->PHeadCode == $childLevel2->HeadCode)
                                                            <div class="col-12 offset-sm-4">
                                                                |- {{ $childLevel3->HeadName }} {{ $childLevel3->HeadName }}
                                                            </div>
                                                            
                                                            <!-- Display child accounts (Level 4) -->
                                                            @if (isset($groupedAccounts[4]))
                                                                @foreach ($groupedAccounts[4] as $childLevel4)
                                                                    @if ($childLevel4->PHeadCode == $childLevel3->HeadCode)
                                                                        <div class="col-12 offset-sm-6">
                                                                            |- {{ $childLevel4->HeadName }}
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            @endforeach
                        @else
                            <p>No accounts found.</p>
                        @endif
                    </div>
                </div>
            </div>
            
            
        </div>
    </x-slot>
</x-layout>