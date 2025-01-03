<x-layout>
    <x-slot name="title">Show Report</x-slot>
    <x-slot name="main">
        <div class="main" id="main">
            
            <table class="table table-bordered custom-border datatable-remove" id="tbl">
                <tbody id="Tbody">
                    <tr>
                        <td>
                            <h5>Part</h5>
                        </td>
                        <td>
                            <span> @if($report->part == 0)
                                New
                                @elseif($report->part == 1)
                                Repair
                                @else
                                Unknown
                                @endif</span>
                        </td>
                        <td>
                            <span> @if($report->r_status == 0)
                                No warranty
                                @elseif($report->r_status == 1)
                                In Warranty
                                @else
                                Unknown
                                @endif</span>
                        </td>
                        <td>
                            <h5>WORKER NAME</h5>
                        </td>
                        <td>
                            <span>{{ $report->worker_name }}</span>
                        </td>
                    </tr>
                    @if(auth()->user()->type === 'account' || auth()->user()->type === 'electric' || auth()->user()->type === 'admin' || auth()->user()->type === 'user') 
                    <tr>
                        <td>
                            @if(auth()->user()->type === 'account' ||auth()->user()->type == 'admin' || auth()->user()->type === 'user' )
                            <h5>SR(FIBER)</h5>
                            @endif
                        </td>
                        <td>
                            @if(auth()->user()->type === 'account' || auth()->user()->type == 'admin' || auth()->user()->type === 'user' )
                            
                            <span>{{ $report->sr_no_fiber }}</span>
                                                 @endif</td>
                        <td>
                            @if(auth()->user()->type == 'admin'  || auth()->user()->type == 'electric')
                            <span>{{ $report->temp }}</span>
                            @endif
                        </td>
                        <td>
                            @if(auth()->user()->type === 'account' || auth()->user()->type == 'admin'|| auth()->user()->type === 'user')
                            <h5>M.J</h5>
                            @endif
                        </td>
                        <td>
                            @if( auth()->user()->type === 'account' || auth()->user()->type == 'admin' || auth()->user()->type === 'user')
                            
                            <span>{{ $report->m_j }}</span>
                            @endif
                        </td>
                    </tr>
                    @endif
                    <tr>
                        <td>
                            <h5>ITEM</h5>
                        </td>
                        <td>
                            <h5>SR</h5>
                        </td>
                        <td>
                            <h5>Type</h5>
                        </td>
                        <td>
                            <span>{{ $report->type }}</span>
                        </td>
                        <td></td>
                    </tr>
                    @foreach($report->tbl_cards as $index => $card)
                    <tr>
                        <td>
                            <h5>Card</h5>
                            {{-- {{dd($card->tbl_sub_category->sub_category_name);}} --}}
                            <span><strong>Card Name :- {{ $card->tbl_sub_category->sub_category_name }} </strong></span>
                        </td>
                        <td>
                            <span>{{ $card->sr_card }}</span>
                        </td>
                        <td>
                            <span>{{ $card->amp_card }}</span>
                        </td>
                        <td>
                            <span>{{ $card->volt_card }}</span>
                        </td>
                        <td>
                            <span>{{ $card->watt_card }}</span>
                        </td>
                    </tr>
                    @endforeach

                    </tr>
                <tbody id="TBody"></tbody>
                @foreach($report->tbl_leds as $index => $led)
                <tr>
                    <td>
                        <h5>LED</h5>
                        <span><strong>Sub Category Name :- {{ $led->tbl_sub_category->sub_category_name }}
                            </strong></span>
                    </td>
                    <td>
                        <span>{{ $led->sr_led }}</span>
                    </td>
                    <td>
                        <span>{{ $led->amp_led }}</span>
                    </td>
                    <td>
                        <span>{{ $led->volt_led }}</span>
                    </td>
                    <td>
                        <span>{{ $led->watt_led }}</span>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td>
                        <h5>ISOLATOR</h5>
                    </td>
                    <td>
                        <span>{{ $report->sr_isolator }}</span>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>
                        <h5>AOM(QSWITCH)</h5>
                    </td>
                    <td>
                        <span>{{ $report->sr_aom_qswitch }}</span>
                    </td>
                    <td>
                        <span>{{ $report->amp_aom_qswitch }}</span>
                    </td>
                    <td>
                        <span>{{ $report->volt_aom_qswitch }}</span>
                    </td>
                    <td>
                        <span>{{ $report->watt_aom_qswitch }}</span>
                    </td>
                </tr>

                <tr>
                    <td>
                        <h5>CAVITY NANI</h5>
                    </td>
                    <td>
                        <span>{{ $report->sr_cavity_nani }}</span>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>
                        <h5>CAVITY MOTI</h5>
                    </td>
                    <td>
                        <span>{{ $report->sr_cavity_moti }}</span>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>
                        <h5>COMBINER(3*1)</h5>
                    </td>
                    <td>
                        <span>{{ $report->sr_combiner_3_1 }}</span>
                    </td>
                    <td>
                        <span>{{ $report->amp_combiner_3_1 }}</span>
                    </td>
                    <td>
                        <span>{{ $report->volt_combiner_3_1 }}</span>
                    </td>
                    <td>
                        <span>{{ $report->watt_combiner_3_1 }}</span>
                    </td>
                </tr>

                <tr>
                    <td>
                        <h5>COUPLAR(2*2)</h5>
                    </td>
                    <td>
                        <span>{{ $report->sr_couplar_2_2 }}</span>
                    </td>
                    <td>
                        <span>{{ $report->amp_couplar_2_2 }}</span>
                    </td>
                    <td>
                        <span>{{ $report->volt_couplar_2_2 }}</span>
                    </td>
                    <td>
                        <span>{{ $report->watt_couplar_2_2 }}</span>
                    </td>
                </tr>

                <tr>
                    <td>
                        <h5>HR</h5>
                    </td>
                    <td>
                        <span>{{ $report->sr_hr }}</span>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>
                        <h5>FIBER NANO</h5>
                    </td>
                    <td>
                        <span>{{ $report->sr_fiber_nano }}</span>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <h5>FIBER MOTO</h5>
                    </td>
                    <td>
                        <span>{{ $report->sr_fiber_moto }}</span>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td><b>
                            <h5>TEST</h5>
                        </b></td>
                    <td>
                        <h5>OUTPUT POWER</h5>
                    </td>
                    <td>
                        <span>{{ $report->output_amp }}</span>
                    </td>
                    <td>
                        <span>{{ $report->output_volt }}</span>
                    </td>
                    <td>
                        <span>{{ $report->output_watt }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h5>CAVITY NANI</h5>
                    </td>
                    <td>
                        <span>{{ $report->nani_cavity }}</span>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>CAVITY FINAL</th>
                    <td>
                        <span>{{ $report->final_cavity }}</span>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th rowspan="2">NOTE</th>
                    <td colspan="4">
                        <span>{{ $report->note1 }}</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <span>{{ $report->note2 }}</span>
                    </td>
                </tr>
                @if(auth()->user()->type == 'account' )
                <form action="{{ route('report.update', $report->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <tr>
                        <td></td>
                        <td colspan="4">

                            <button class="btn btn-success" name="status" value="1">Verify </button>
                            <button class="btn btn-danger" name="status" value="2"> Reject</button>

                        </td>
                    </tr>
                    <tr>
                        <th rowspan="2">Remark</th>
                        <td colspan="4">
                            <textarea id="remark" name="remark"
                                class="form-control">{{ old('remark', $report->remark) }}</textarea>
                        </td>
                    </tr>
                </form>
                @endif
                </tbody>
            </table>
        </div>
    </x-slot>
</x-layout>