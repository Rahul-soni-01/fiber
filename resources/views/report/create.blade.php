<x-layout>
    <x-slot name="title">Add Report</x-slot>
    <x-slot name="main">
        <div class="main" id="main">
           
          
            <form action="{{route('report.store')}}" method="post">
                @csrf

                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
                <table class="table table-bordered custom-border datatable-remove" id="tbl">
                    <tbody id="Tbody">
                        @if(auth()->user()->type === 'electric' || auth()->user()->type === 'admin'  || auth()->user()->type === 'user') 
                        <tr>
                            <td>
                                <h5>Part</h5>
                            </td>
                            <td>
                                <select id="part" name="part" required class="form-control">
                                    <option value="" selected disabled>Select Part</option>
                                    <option value="0">New</option>
                                    <option value="1">Repairing</option>
                                </select>
                            </td>
                            <td> 
                                <h5>Temp no.</h5>
                            </td>
               
                            <td>
                                <h5>WORKER NAME</h5>
                            </td>
                            <td><input type="text" id="wn" name="worker_name" class="form-control"></td>
                          
                        </tr>
                        @endif
                        @if( auth()->user()->type === 'admin'  || auth()->user()->type === 'user') 
                        <tr>
                            <td>
                                <h5>SR(FIBER)</h5>
                            </td>
                            <td><input type="text" id="srfiber" name="sr_no_fiber" class="form-control"></td>
                            <td>
                                <input type="text" id="temp" name="temp" class="form-control"></td>
                            <td>
                                <h5>M.J</h5>
                            </td>
                            <td><input type="text" id="mj" name="m_j" class="form-control"></td>
                        </tr>
                        @endif
                        @if( auth()->user()->type === 'admin'  || auth()->user()->type === 'user') 
                        <tr>
                           
                            <td><h5>Warranty</h5></td>
                            <td><select id="warranty" name="warranty" required class="form-control">
                                <option value="" selected disabled>Warranty Staus</option>
                                <option value="0">No Warranty</option>
                                <option value="1">Warranty</option>
                            </select></td>
                            <td></td>
                            <td>
                                <h5>Type</h5>
                            </td>
                            <td>
                                <select id="type" name="type" required class="form-control">
                                    <option value="">Select Type</option>
                                    <option value="15">15</option>
                                    <option value="18">18</option>
                                    <option value="21">21</option>
                                    <option value="26">26</option>
                                </select>
                            </td>
                        </tr>
                        @endif
                        @if( auth()->user()->type === 'admin'  || auth()->user()->type === 'user') 
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
                        @if( auth()->user()->type === 'electric' || auth()->user()->type === 'admin'  || auth()->user()->type === 'user' ) 
                        <tr>
                            <td class="d-flex">
                                <h5>CARD</h5>

                                <select required onchange="tbl_card(0);" id="card_0" class="tbl_sub ml-2 form-control" name="card[]">
                                    <option value="">Select</option>
                                    @foreach($cards as $card)
                                    <option value="{{ $card->id }}">{{ $card->sub_category_name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="sr_card[]" list="srcard_0" placeholder="Select or enter a new sr no, Small Alpha Plz" required>
                                <datalist id="srcard_0">
                                
                                </datalist>
                            </td>
                            <td><input type="text" id="ampled" name="sr_cardamp[]"  class="form-control"></td>
                            <td><input type="text" id="voltled" name="sr_cardvolt[]"  class="form-control"></td>
                            <td class="d-flex"><input type="text" id="wattled" name="sr_cardwatt[]" class="form-control">
                                <button type="button" onclick="Add_Cards({{ json_encode($cards)}})" class="btn btn-dark margin-btn">Add</i></button>
                            </td>
                        </tr>
                        @endif
                        @if(auth()->user()->type === 'electric' || auth()->user()->type === 'admin'  || auth()->user()->type === 'user') 
                        <tbody id="TCards"></tbody>
                        <tr>
                            <td class="d-flex ">
                                <h5>LED</h5>
                                    <select required onchange="tbl_stock(0);" id="subcategory_0" class="tbl_sub ml-2 form-control" name="sub_category[]">
                                        <option value="">Select</option>
                                        @foreach($sub_categories as $sub_category)
                                        <option value="{{ $sub_category->id }}">{{ $sub_category->sub_category_name }}</option>
                                        @endforeach
                                    </select>
                                
                            </td>
                            <td>
                                <input type="text" class="form-control" name="srled[]" list="srled_0" placeholder="Select or enter a new sr no, Small Alpha Plz" required>
    
                                  <datalist id="srled_0">
                                    
                                  </datalist>
                            </td>
                            <td><input type="text" id="ampled[]" class="form-control" name="ampled[]"></td>
                            <td><input type="text" id="voltled[]" class="form-control" name="voltled[]"></td>
                            <td class="d-flex"><input type="text" id="wattled[]" class="form-control" name="wattled[]">
                                <button type="button" onclick="AddRow({{ json_encode($sub_categories)}})" class="btn btn-dark margin-btn">Add</i></button>
                            </td>
                        </tr>
                        @endif
                        @if( auth()->user()->type === 'admin'  || auth()->user()->type === 'user') 
                    <tbody id="TBody"></tbody>
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
                        @if( auth()->user()->type === 'electric' || auth()->user()->type === 'admin'  || auth()->user()->type === 'user') 
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
                        @if( auth()->user()->type === 'cavity' || auth()->user()->type === 'admin'  || auth()->user()->type === 'user') 
                        <tr>
                            <td>
                                <h5>CAVITY NANI</h5>
                            </td>
                            <td><input type="text" id="srcavitynani" name="sr_cavity_nani" class="form-control"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @endif
                        @if(auth()->user()->type === 'cavity' || auth()->user()->type === 'admin'  || auth()->user()->type === 'user') 
                        <tr>
                            <td>
                                <h5>CAVITY MOTI</h5>
                            </td>
                            <td><input type="text" id="srcavitymoti" name="sr_cavity_moti" class="form-control"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @endif
                        @if(auth()->user()->type === 'cavity' || auth()->user()->type === 'admin'  || auth()->user()->type === 'user') 
                        <tr>
                            <td>
                                <h5>COMBINER(3*1)</h5>
                            </td>
                            <td><input type="text" id="srcombiner3" name="sr_combiner_3_1" class="form-control"></td>
                            <td><input type="text" id="ampcombiner3" name="amp_combiner_3_1" class="form-control"></td>
                            <td><input type="text" id="voltcombiner3" name="volt_combiner_3_1" class="form-control"></td>
                            <td><input type="text" id="wattcombiner3" name="watt_combiner_3_1" class="form-control"></td>
                        </tr>
                        @endif
                        @if( auth()->user()->type === 'cavity' || auth()->user()->type === 'admin'  || auth()->user()->type === 'user') 
                        <tr>
                            <td>
                                <h5>COUPLAR(2*2)</h5>
                            </td>
                            <td><input type="text" id="srcouplar2" name="sr_couplar_2_2" class="form-control"></td>
                            <td><input type="text" id="ampcouplar2" name="amp_couplar_2_2" class="form-control"></td>
                            <td><input type="text" id="voltcouplar2" name="volt_couplar_2_2" class="form-control"></td>
                            <td><input type="text" id="wattcouplar2" name="watt_couplar_2_2" class="form-control"></td>
                        </tr>
                        @endif
                        @if(auth()->user()->type === 'cavity' || auth()->user()->type === 'admin'  || auth()->user()->type === 'user') 
                        <tr>
                            <td>
                                <h5>HR</h5>
                            </td>
                            <td><input type="text" id="srhr" name="sr_hr" class="form-control"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @endif
                        @if( auth()->user()->type === 'admin'  || auth()->user()->type === 'user') 
                        <tr>
                            <td>
                                <h5>FIBER NANO</h5>
                            </td>
                            <td><input type="number" step="0.01" id="srfibernano" name="sr_fiber_nano" class="form-control"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @endif
                        @if( auth()->user()->type === 'admin'  || auth()->user()->type === 'user') 
                        <tr>
                            <td>
                                <h5>FIBER MOTO</h5>
                            </td>
                            <td><input type="number" id="srfibermoto"  step="0.01" name="sr_fiber_moto" class="form-control"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @endif
                        @if( auth()->user()->type === 'admin'  || auth()->user()->type === 'user') 
                        <tr>
                            <td><b>
                                    <h5>TEST</h5>
                                </b></td>
                            <td>
                                <h5>OUTPUT POWER</h5>
                            </td>
                            <td><input type="text" id="ampoutputpower" name="output_amp" class="form-control"></td>
                            <td><input type="text" id="voltoutputpower" name="output_volt" class="form-control"></td>
                            <td><input type="text" id="wattoutputpower" name="output_volt" class="form-control"></td>
                        </tr>
                        @endif
                        @if( auth()->user()->type === 'admin'  || auth()->user()->type === 'user') 
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
                        @if( auth()->user()->type === 'admin'  || auth()->user()->type === 'user') 
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
                            <td colspan="4"><textarea id="note1" name="note1" class="form-control"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="4"><textarea id="note2" name="note2"  class="form-control"></textarea></td>

                        </tr>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-success">SUBMIT</button>
            </form>
        </div>
    </x-slot>
</x-layout>