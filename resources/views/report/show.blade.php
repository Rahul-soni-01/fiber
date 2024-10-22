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
                        <td></td>
                        <td>
                            <h5>WORKER NAME</h5>
                        </td>
                        <td>
                            <span>{{ $report->worker_name }}</span>
                        </td>
                    </tr>
                 
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
                    
                    <tr>
                        <td>
                            <h5>CARD</h5>
                        </td>
                        <td>    <span>{{ $report->sr_card }}</span>
                        </td>
                        <td>
                            <h5>AMP.</h5>
                        </td>
                        <td>
                            <h5>VOLT</h5>
                        </td>
                        <td>
                            <h5>WATT</h5>
                        </td>
                    </tr>
                    <tr>
                       
                    </tr>
                <tbody id="TBody"></tbody>
                @foreach($report->tbl_leds as $index => $led)
                <tr>
                    <td>
                        <h5>LED</h5>
                        <span><strong>Sub Category Name :- {{ $led->tbl_sub_category->sub_category_name }} </strong></span>
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
                </tbody>
            </table>
        </div>
    </x-slot>
</x-layout>