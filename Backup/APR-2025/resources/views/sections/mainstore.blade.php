@extends('demo')
@section('title', 'Main Store')
@section('content')
<h1>Main Store</h1>
        <div class="text-white">
            @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            
            @if ($reports->isEmpty())
            <p>No reports found.</p>
            @else
            <div id="div1" class="table-responsive mt-4">
                <table class="table text-white">
                    <thead>
                        <tr class="bg-dark text-white">
                            <th>Part</th>
                            <th>W/N.W.</th>
                            <th>Date</th>
                            @if(auth()->user()->type === 'admin')
                            <th>Serial No.</th>
                            <th>Type</th>
                            {{-- <th>Worker Name</th> --}}                            
                            {{-- <th>Final Amount</th> --}}
                            <th>Sale</th>
                            @if(isset($ready) && $ready == 1)
                            <th>Stock</th>
                            @endif
                            <th>Action</th>
                            @endif

                            @if(auth()->user()->type === 'electric')
                            
                            <th>SR(FIBER) / Temp No</th>
                            <th>Note</th>
                            <th>Action</th>
                            @endif
                            @if(auth()->user()->type === 'cavity')
                            
                            <th>SR(FIBER) / Temp No</th>
                            <th>Note</th>
                            <th>Action</th>
                            @endif

                            @if(auth()->user()->type === 'user')
                            
                            <th>SR(FIBER) / Temp No</th>
                            <th>M.J</th>
                            <th>Type</th>
                            <th>Action</th>
                            @endif
                            
                            @if(auth()->user()->type === 'account')
                            
                            <th>SR(FIBER) / Temp No.</th>
                            <th>Type</th>
                            <th>Action</th>
                            @endif
                    </thead>
                    <tbody>
                        @foreach ($reports as $index => $report)
                        {{-- {{dd($reports);}} --}}
                        @php
                        $type = auth()->user()->type;
                        $temp = $report->temp;
                        $status = $report->status;
                        $sale_status = $report->sale_status;
                        $part = $report->part;
                        if (in_array($type, ['electric', 'cavity', 'user']) && $status == '1') {
                         //    continue;
                        }
                        if ($status != 0 && $sale_status != 1 && $type == 'account') {
                         //    continue;
                        }
                        @endphp
                        <tr class="{{ $report->part == 0 ? 'new-part' : ($report->part == 1 ? 'repair-part' : 'unknown-part') }}">
                            <td>{{ $report->part === 0 ? 'New' : ($report->part == 1 ? 'Repair' : 'Unknown') }}</td>
                            <td>{{ $report->f_status === 0 ? 'No warranty' : ($report->f_status == 1 ? 'Warranty' : 'Unknown') }}</td>

                            <td>{{ $report->created_at->format('d-m-Y') }}</td>
                            @if ($type === 'electric')
                            <td>{{ $report->sr_no_fiber ?? $report->temp }}</td>
                            <td>{{ $report->note1 }}</td>
                            <td> @if ($type === 'electric')
                                <a href="{{ route('report.edit', $report->id) }}" class="btn btn-info">Edit</a>
                                @endif
                            </td>
                            @endif
                            @if ($type === 'cavity')
                            <td>{{ $report->sr_no_fiber ?? $report->temp }}</td>
                            <td>{{ $report->note1 }}</td>
                            <td>
                                <a href="{{ route('report.edit', $report->id) }}" class="btn btn-info">Edit</a>
                            </td>
                            @endif
                            @if($type === 'user')
                           
                            <td>{{ $report->sr_no_fiber ?? $report->temp }}</td>
                            <td>{{ $report->m_j }}</td>
                            <td>{{ $report->tbl_type->name ?? null}}</td>
                            <td><a href="{{ route('report.edit', $report->id) }}" class="btn btn-info">Edit</a>
                            </td>
                            @endif
                            @if ($type === 'admin' )
                            <td>{{ $report->sr_no_fiber ?? $report->temp }}</td>
                            <td>{{ $report->tbl_type->name ?? 0 }}</td>
                            {{-- <td>{{ $report->worker_name }}</td> --}}
                            {{-- <td>{{ $report->final_amount }}</td> --}}
                            <td>
                                @if ($report->sale_status == 0)
                                No sale
                                @elseif ($report->sale_status == 1)
                                Sale 
                                @if ($report->stock_status == 1)
                                - Repairing
                                @endif
                                @else
                                Unknown
                                @endif
                            </td>
                            @if(isset($ready) && $ready == 1)
                            <td>
                                <label class="switch">
                                    <input type="checkbox" {{ $report->stock_status == 1 ? 'checked' : '' }}
                                    id="ReadyStock" data-id="{{ $report->id}}">
                                    <span class="slider round"></span>
                                </label>
                                <div class="row-spinner spinner-border" role="status" style="display: none;">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </td>
                            @endif
                            <td>
                                <a href="{{ route('report.show', $report->id) }}" class="btn btn-sm btn-primary"><i class="ri-eye-fill"></i></a>
                                <a href="{{ route('report.edit', $report->id) }}" class="btn btn-sm btn-warning"> <i class="ri-pencil-fill"></i> </a>
                            </td>
                            @endif
                            @if(auth()->user()->type === 'account')
                           
                            <td>{{ $report->sr_no_fiber ?? $report->temp }}</td>
                            <td>{{ $report->tbl_type->name ?? 'N/A' }}</td>
                            <td> <a href="{{ route('report.show', $report->id) }}" class="btn btn-primary"> <i class="ri-eye-fill"></i></a>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>

@endsection