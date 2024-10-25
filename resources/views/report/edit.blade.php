<x-layout>
    <x-slot name="title">Edit {{auth()->user()->type}} Report</x-slot>
    <x-slot name="main">
        <div class="main" id="main">
            <form action="{{ route('report.update', $report->id) }}" method="POST">
                @csrf
                @method('PUT')

                @if ($errors->any())
                <div style="color: red;">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <table class="table table-bordered custom-border datatable-remove" id="tbl">
                    <tbody id="Tbody">
                        @if(auth()->user()->type === 'electric' || auth()->user()->type === 'admin' || auth()->user()->type === 'cavity')
                        <tr>
                            <td>
                                @if(auth()->user()->type == 'admin' || auth()->user()->type == 'electric' )
                                <h5>Part</h5>
                                @endif
                            </td>
                            <td>
                                @if(auth()->user()->type == 'admin' || auth()->user()->type == 'electric' )

                                <select id="part" name="part" class="form-control">
                                    <option value="" disabled {{ old('part', $report->part ?? '') === '' ? 'selected' :
                                        '' }}>Select Part</option>
                                    <option value="0" {{ old('part', $report->part ?? '') == '0' ? 'selected' : ''
                                        }}>New</option>
                                    <option value="1" {{ old('part', $report->part ?? '') == '1' ? 'selected' : ''
                                        }}>Repairing</option>
                                </select>
                                @endif

                            </td>
                            <td>
                                @if(auth()->user()->type == 'admin'  || auth()->user()->type == 'electric' )
                                <h5>Temp no.</h5>
                                @endif
                            </td>
                            <td>
                                @if(auth()->user()->type == 'admin' || auth()->user()->type == 'cavity' )
                                <h5>WORKER NAME</h5>
                                @endif
                            </td>
                            <td>
                                @if( auth()->user()->type == 'admin' || auth()->user()->type == 'cavity')
                                <input type="text" id="wn" name="worker_name" class="form-control"
                                    value="{{ old('worker_name', $report->worker_name) }}">
                                @endif
                            </td>

                        </tr>
                        @endif
                        @if(auth()->user()->type === 'electric' || auth()->user()->type === 'admin' || auth()->user()->type === 'user') 
                        <tr>
                            <td>
                                @if(auth()->user()->type == 'admin' || auth()->user()->type === 'user' )
                                <h5>SR(FIBER)</h5>
                                @endif
                            </td>
                            <td>
                                @if(auth()->user()->type == 'admin' || auth()->user()->type === 'user' )
                                <input type="text" id="srfiber" name="sr_no_fiber" class="form-control"
                                    value="{{ old('sr_no_fiber', $report->sr_no_fiber) }}">
                                @endif
                            </td>
                            <td>
                                @if(auth()->user()->type == 'admin'  || auth()->user()->type == 'electric')

                                <input type="text" id="temp" name="temp" class="form-control"
                                    value="{{ old('temp', $report->temp) }}">
                                @endif
                                </td>
                            <td>
                                @if(auth()->user()->type == 'admin'|| auth()->user()->type === 'user')
                                <h5>M.J</h5>
                                @endif
                            </td>
                            <td>
                                @if(auth()->user()->type == 'admin'|| auth()->user()->type === 'user')
                                <input type="text" id="mj" name="m_j" class="form-control"
                                    value="{{ old('m_j', $report->m_j) }}">
                                @endif
                            </td>
                        </tr>
                        @endif
                        @if( auth()->user()->type === 'admin' || auth()->user()->type === 'user')
                        <tr>

                            <td>
                                @if(auth()->user()->type == 'admin' )
                                <h5>Warranty</h5>
                                @endif
                            </td>
                            <td>
                                @if(auth()->user()->type == 'admin')
                                <select id="warranty" name="warranty" required class="form-control">
                                    <option value="" disabled>Select Warranty Status</option>
                                    <option value="0" {{ $report->f_status == '0' ? 'selected' : '' }}>No Warranty
                                    </option>
                                    <option value="1" {{ $report->f_status == '1' ? 'selected' : '' }}>Warranty</option>
                                </select>
                                @endif
                            </td>

                            <td></td>
                            <td>
                                @if(auth()->user()->type == 'admin' || auth()->user()->type == 'user' )
                                <h5>Type</h5>
                                @endif
                            </td>
                            <td>
                                @if(auth()->user()->type == 'admin' || auth()->user()->type == 'user' )

                                <select id="type" name="type" required class="form-control">
                                    <option value="">Select Type</option>
                                    <option value="15">15</option>
                                    <option value="18">18</option>
                                    <option value="21">21</option>
                                    <option value="26">26</option>
                                </select>
                                @endif
                            </td>
                        </tr>
                        @endif
                        @if( auth()->user()->type === 'admin')
                        <tr>
                            <td>
                                <h5>ITEM</h5>
                            </td>
                            <td>
                                <h5>SR</h5>
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
                        @endif
                        @if( auth()->user()->type === 'electric' || auth()->user()->type === 'admin' )
                        <tr>
                            <td class="d-flex">
                                <h5>CARD</h5>

                                <select required onchange="tbl_card(0);" id="card_0" class="tbl_sub ml-2 form-control"
                                    name="card[]">
                                    <option value="">Select</option>
                                    @foreach($cards as $card)
                                    <option value="{{ $card->id }}">{{ $card->sub_category_name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="sr_card[]" list="srcard_0"
                                    placeholder="Select or enter a new sr no, Small Alpha Plz" required>
                                <datalist id="srcard_0">

                                </datalist>
                            </td>
                            <td><input type="text" id="ampled" name="sr_cardamp[]" class="form-control"></td>
                            <td><input type="text" id="voltled" name="sr_cardvolt[]" class="form-control"></td>
                            <td class="d-flex"><input type="text" id="wattled" name="sr_cardwatt[]"
                                    class="form-control">
                                <button type="button" onclick="Add_Cards({{ json_encode($cards)}})"
                                    class="btn btn-dark margin-btn">Add</i></button>
                            </td>
                        </tr>
                        @endif
                        @if(auth()->user()->type === 'electric' || auth()->user()->type === 'admin')
                        <tbody id="TCards"></tbody>
                            <tr>
                                <td class="d-flex ">
                                    <h5>LED</h5>
                                    <select required onchange="tbl_stock(0);" id="subcategory_0"
                                        class="tbl_sub ml-2 form-control" name="sub_category[]">
                                        <option value="">Select</option>
                                        @foreach($sub_categories as $sub_category)
                                        <option value="{{ $sub_category->id }}">{{ $sub_category->sub_category_name }}</option>
                                        @endforeach
                                    </select>

                                </td>
                                <td>
                                    <input type="text" class="form-control" name="srled[]" list="srled_0"
                                        placeholder="Select or enter a new sr no, Small Alpha Plz" required>

                                    <datalist id="srled_0">

                                    </datalist>
                                </td>
                                <td><input type="text" id="ampled[]" class="form-control" name="ampled[]"></td>
                                <td><input type="text" id="voltled[]" class="form-control" name="voltled[]"></td>
                                <td class="d-flex"><input type="text" id="wattled[]" class="form-control" name="wattled[]">
                                    <button type="button" onclick="AddRow({{ json_encode($sub_categories)}})"
                                        class="btn btn-dark margin-btn">Add</i></button>
                                </td>
                            </tr>
                        <tbody id="TBody"></tbody>
                        @endif
                        @if( auth()->user()->type === 'admin' || auth()->user()->type === 'user')
                        <tr>
                            <td>
                                <h5>ISOLATOR</h5>
                            </td>
                            <td><input type="text" id="srisolator" name="sr_isolator" class="form-control"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @endif
                        @if( auth()->user()->type === 'electric' || auth()->user()->type === 'admin')
                        <tr>
                            <td>
                                <h5>AOM(QSWITCH)</h5>
                            </td>
                            <td><input type="text" id="sraomqswitch" name="sr_aom_qswitch" class="form-control"></td>
                            <td><input type="text" id="ampaomqswitch" name="amp_aom_qswitch" class="form-control"></td>
                            <td><input type="text" id="voltaomqswitch" name="volt_aom_qswitch" class="form-control"></td>
                            <td><input type="text" id="wattaomqswitch" name="watt_aom_qswitch" class="form-control"></td>
                        </tr>
                        @endif
                        @if( auth()->user()->type === 'cavity' || auth()->user()->type === 'admin')
                        <tr>
                            <td>
                                <h5>CAVITY NANI</h5>
                            </td>
                            <td><input type="text" id="srcavitynani" name="sr_cavity_nani" class="form-control"
                                    value="{{ old('sr_cavity_nani', $report->sr_cavity_nani) }}">
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @endif
                        @if(auth()->user()->type === 'cavity' || auth()->user()->type === 'admin' )
                        <tr>
                            <td>
                                <h5>CAVITY MOTI</h5>
                            </td>
                            <td><input type="text" id="srcavitymoti" name="sr_cavity_moti" class="form-control"
                                    value="{{ old('sr_cavity_moti', $report->sr_cavity_moti) }}">
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @endif
                        @if(auth()->user()->type === 'cavity' || auth()->user()->type === 'admin')
                        <tr>
                            <td>
                                <h5>COMBINER(3*1)</h5>
                            </td>
                            <td><input type="text" id="srcombiner3" name="sr_combiner_3_1" class="form-control"
                                    value="{{ old('sr_combiner_3_1', $report->sr_combiner_3_1) }}"></td>
                            <td><input type="text" id="ampcombiner3" name="amp_combiner_3_1" class="form-control"
                                    value="{{ old('amp_combiner_3_1', $report->amp_combiner_3_1) }}"></td>
                            <td><input type="text" id="voltcombiner3" name="volt_combiner_3_1" class="form-control"
                                    value="{{ old('volt_combiner_3_1', $report->volt_combiner_3_1) }}"></td>
                            <td><input type="text" id="wattcombiner3" name="watt_combiner_3_1" class="form-control"
                                    value="{{ old('watt_combiner_3_1', $report->watt_combiner_3_1) }}"></td>

                        </tr>
                        @endif
                        @if( auth()->user()->type === 'cavity' || auth()->user()->type === 'admin')
                        <tr>
                            <td>
                                <h5>COUPLAR(2*2)</h5>
                            </td>
                            <td><input type="text" id="srcouplar2" name="sr_couplar_2_2" class="form-control"
                                    value="{{ old('sr_couplar_2_2', $report->sr_couplar_2_2) }}"></td>
                            <td><input type="text" id="ampcouplar2" name="amp_couplar_2_2" class="form-control"
                                    value="{{ old('amp_couplar_2_2', $report->amp_couplar_2_2) }}"></td>
                            <td><input type="text" id="voltcouplar2" name="volt_couplar_2_2" class="form-control"
                                    value="{{ old('volt_couplar_2_2', $report->volt_couplar_2_2) }}"></td>
                            <td><input type="text" id="wattcouplar2" name="watt_couplar_2_2" class="form-control"
                                    value="{{ old('watt_couplar_2_2', $report->watt_couplar_2_2) }}"></td>

                        </tr>
                        @endif
                        @if(auth()->user()->type === 'cavity' || auth()->user()->type === 'admin' )
                        <tr>
                            <td>
                                <h5>HR</h5>
                            </td>
                            <td><input type="text" id="srhr" name="sr_hr" class="form-control" value="{{ old('sr_hr', $report->sr_hr) }}"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @endif
                        @if( auth()->user()->type === 'admin' || auth()->user()->type === 'user')
                        <tr>
                            <td>
                                <h5>FIBER NANO</h5>
                            </td>
                            <td><input type="number" step="0.01" id="srfibernano" name="sr_fiber_nano" class="form-control">
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @endif
                        @if( auth()->user()->type === 'admin' || auth()->user()->type === 'user')
                        <tr>
                            <td>
                                <h5>FIBER MOTO</h5>
                            </td>
                            <td><input type="number" id="srfibermoto" step="0.01" name="sr_fiber_moto" class="form-control">
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @endif
                        @if( auth()->user()->type === 'admin' || auth()->user()->type === 'user')
                        <tr>
                            <td>
                                <h5>TEST</h5>
                                </td>
                            <td>
                                <h5>OUTPUT POWER</h5>
                            </td>
                            <td><input type="text" id="ampoutputpower" name="output_amp" class="form-control"></td>
                            <td><input type="text" id="voltoutputpower" name="output_volt" class="form-control"></td>
                            <td><input type="text" id="wattoutputpower" name="output_volt" class="form-control"></td>
                        </tr>
                        @endif
                        @if( auth()->user()->type === 'admin' || auth()->user()->type === 'user')
                        <tr>
                            <td>
                                <h5>CAVITY NANI</h5>
                            </td>
                            <td><input type="text" id="cavitynani" name="nani_cavity" class="form-control"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @endif
                        @if( auth()->user()->type === 'admin' || auth()->user()->type === 'user')
                        <tr>
                            <th>CAVITY FINAL </th>
                            <td><input type="text" id="cavityfinal" name="final_cavity" class="form-control"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @endif
                        <tr>
                            <th rowspan="2">NOTE</th>
                            <td colspan="4">
                                <textarea id="note1" name="note1" class="form-control">{{ old('note1', $report->note1) }}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <textarea id="note2" name="note2" class="form-control">{{ old('note2', $report->note2) }}</textarea>
                            </td>
                        </tr>
                        
                        </tbody>
                </table>
                <button type="submit" class="btn btn-success">SUBMIT</button>
        </div>
    </x-slot>
</x-layout>