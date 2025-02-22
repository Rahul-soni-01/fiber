<x-layout>
    <x-slot name="title">Chart of Accounts
    </x-slot>
    <x-slot name="main">
        <div class="main" id="main">
            
            <a href="{{ route('acccoa.create') }}" class="btn btn-primary mb-2">Add Acc Coa</a>
            <a href="?edit" class="btn btn-info mb-2">Edit Acc Coa</a>
            @if(request()->has('edit'))
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Head Code</th>
                            <th>Account name</th>
                            <th>Parents Account </th>
                            <th>Parents Account HeadCode</th>
                            <th>Account Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($accounts as $index => $account)
                            <tr>
                                <td>{{++$index}}</td>
                                <td>{{$account->HeadCode}}</td>
                                <td>{{$account->HeadName}}</td>
                                <td>{{$account->PHeadName}}</td>
                                <td>{{$account->PHeadCode}}</td>
                                <td>{{$account->HeadLevel}}</td>

                                <td><a href="{{ route('acccoa.edit', ['acccoa_id' => $account->id]) }}"><i class="ri-eye-fill"></i></a>  <form action="{{ route('acccoa.destroy', $account->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE') <!-- Specify the method as DELETE -->
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this account?');" class="btn "> <i class="ri-delete-bin-fill"></i></button>
                                </form> </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else            

            <div class="container">
                <h2 class="text-center mb-4">Chart of Accounts</h2>
                <div class="row">
                    <div class="col-12">
                        @php
                            // Group the accounts by HeadLevel
                            $groupedAccounts = $accounts->groupBy('HeadLevel');
                        @endphp
                        <table class="table table-bordered datatable-remove">
                            <thead class="table-bordered">
                                <tr>
                                    <th width="10%" bgcolor="#E7E0EE" align="center"></th>
                                    <th width="10%" bgcolor="#E7E0EE" align="center"></th>
                                    <th width="10%" bgcolor="#E7E0EE" align="center">Particulars</th>
                                    <th width="10%" bgcolor="#E7E0EE" align="center"></th>
                                    <th width="10%" bgcolor="#E7E0EE" align="center">Debit</th>
                                    <th width="10%" bgcolor="#E7E0EE" align="center">Credit</th>
                                    <th width="10%" bgcolor="#E7E0EE" align="center">Debit</th>
                                    <th width="10%" bgcolor="#E7E0EE" align="center">Credit</th>
                                    <th width="10%" bgcolor="#E7E0EE" align="center">Debit</th>
                                    <th width="10%" bgcolor="#E7E0EE" align="center">Credit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($groupedAccounts[1]))
                                @foreach ($groupedAccounts[1] as $topLevel)
                                <tr>
                                    <td colspan="4">{{ $topLevel->HeadCode }}. {{ $topLevel->HeadName }}</td>
                                    
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @if (isset($groupedAccounts[2]))
                                @foreach ($groupedAccounts[2] as $childLevel2)
                                @if($childLevel2->PHeadCode == $topLevel->HeadCode)
                                <tr>
                                    <td></td>
                                    <td colspan="3">{{ $childLevel2->HeadCode }} {{ $childLevel2->HeadName }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @if (isset($groupedAccounts[3]))
                                @foreach ($groupedAccounts[3] as $childLevel3)
                                @if($childLevel3->PHeadCode == $childLevel2->HeadCode)
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td colspan="2">{{ $childLevel3->HeadCode }} {{ $childLevel3->HeadName }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @if (isset($groupedAccounts[4]))
                                @foreach ($groupedAccounts[4] as $childLevel4)
                                @if($childLevel4->PHeadCode == $childLevel3->HeadCode)
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>{{ $childLevel4->HeadCode }} {{ $childLevel4->HeadName }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @endif
                                @endforeach
                                @endif
                                @endif
                                @endforeach
                                @endif
                                @endif
                                @endforeach
                                @endif
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        
                        @if(isset($groupedAccounts[1]))
                            @foreach ($groupedAccounts[1] as $topLevel)
                                <!-- Display top-level account -->
                                <div class="row" style="background-color: #ececec;">
                                    <div class="col-12 p-2 bg-dark text-white">
                                        <strong>{{ $topLevel->HeadCode }}. {{ $topLevel->HeadName }}</strong>
                                    </div>
                                    
                                    <!-- Display child accounts (Level 2) -->
                                    @if (isset($groupedAccounts[2]))
                                        @foreach ($groupedAccounts[2] as $childLevel2)
                                            @if ($childLevel2->PHeadCode == $topLevel->HeadCode)
                                                <div class="col-10 offset-sm-2 p-2">
                                                    |-{{ $childLevel2->HeadCode }}  {{ $childLevel2->HeadName }}
                                                </div>
                                                
                                                <!-- Display child accounts (Level 3) -->
                                                @if (isset($groupedAccounts[3]))
                                                    @foreach ($groupedAccounts[3] as $childLevel3)
                                                        @if ($childLevel3->PHeadCode == $childLevel2->HeadCode)
                                                            <div class="col-8 offset-sm-4 p-2">
                                                                |-{{ $childLevel3->HeadCode }} {{ $childLevel3->HeadName }}
                                                            </div>
                                                            
                                                            <!-- Display child accounts (Level 4) -->
                                                            @if (isset($groupedAccounts[4]))
                                                                @foreach ($groupedAccounts[4] as $childLevel4)
                                                                    @if ($childLevel4->PHeadCode == $childLevel3->HeadCode)
                                                                        <div class="col-6 offset-sm-6">
                                                                            |-{{ $childLevel4->HeadCode }} {{ $childLevel4->HeadName }}
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
            @endif
        </div>
    </x-slot>
</x-layout>