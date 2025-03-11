<x-layout>
    <x-slot name="title">Add Report</x-slot>
    <x-slot name="main">
        <div class="main" id="main">
            <table class="table table-bordered custom-border" id="tbl">
                <tbody id="Tbody">
                    <tr>
                        <td>
                            <h5>Part</h5>
                        </td>
                        <td>
                            <select id="part" name="part" required>
                                <option value="">Select Part</option>
                                <option value="0">New</option>
                                <option value="1">Repairing</option>
                            </select>
                        </td>
                        <td></td>
                        <td>
                            <h5>WORKER NAME</h5>
                        </td>
                        <td><input type="text" id="wn" name="wn"></td>
                    </tr>
                    <tr>
                        <td>
                            <h5>SR(FIBER)</h5>
                        </td>
                        <td><input type="text" id="srfiber" name="srfiber"></td>
                        <td></td>
                        <td>
                            <h5>M.J</h5>
                        </td>
                        <td><input type="text" id="mj" name="mj"></td>
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
                            <select id="type" name="type" required>
                                <option value="">Select Type</option>
                                <option value="15">15</option>
                                <option value="18">18</option>
                                <option value="21">21</option>
                                <option value="26">26</option>
                            </select>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <h5>CARD</h5>
                        </td>
                        <td><input type="text" id="srcard" name="srcard"></td>
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
                    <tr id="denis">
                        <td>
                            <h5>LED
                                <select required>
                                    <option value="">Select</option>
                                    <option value="12">12</option>
                                    <option value="15">15</option>
                                    <option value="30">30</option>
                                    <option value="45">45</option>
                                </select>
                            </h5>
                        </td>
                        <td><input type="text" id="srled120" name="srled120"></td>
                        <td><input type="text" id="ampled120" name="ampled120"></td>
                        <td><input type="text" id="voltled120" name="voltled120"></td>
                        <td><input type="text" id="wattled120" name="wattled120">
                            <button onclick="AddRow()" class="btn btn-dark">Add</i></button>
                        </td>
                    </tr>
                <tbody id="TBody"></tbody>
                <tr>
                    <td>
                        <h5>ISOLATOR</h5>
                    </td>
                    <td><input type="text" id="srisolator" name="srisolator"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <h5>AOM(QSWITCH)</h5>
                    </td>
                    <td><input type="text" id="sraomqswitch" name="sraomqswitch"></td>
                    <td><input type="text" id="ampaomqswitch" name="ampaomqswitch"></td>
                    <td><input type="text" id="voltaomqswitch" name="voltaomqswitch"></td>
                    <td><input type="text" id="wattaomqswitch" name="wattaomqswitch"></td>
                </tr>
                <tr>
                    <td>
                        <h5>CAVITY NANI</h5>
                    </td>
                    <td><input type="text" id="srcavitynani" name="srcavitynani"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <h5>CAVITY MOTI</h5>
                    </td>
                    <td><input type="text" id="srcavitymoti" name="srcavitymoti"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <h5>COMBINER(3*1)</h5>
                    </td>
                    <td><input type="text" id="srcombiner3" name="srcombiner3"></td>
                    <td><input type="text" id="ampcombiner3" name="ampcombiner3"></td>
                    <td><input type="text" id="voltcombiner3" name="voltcombiner3"></td>
                    <td><input type="text" id="wattcombiner3" name="wattcombiner3"></td>
                </tr>
                <tr>
                    <td>
                        <h5>COUPLAR(2*2)</h5>
                    </td>
                    <td><input type="text" id="srcouplar2" name="srcouplar2"></td>
                    <td><input type="text" id="ampcouplar2" name="ampcouplar2"></td>
                    <td><input type="text" id="voltcouplar2" name="voltcouplar2"></td>
                    <td><input type="text" id="wattcouplar2" name="wattcouplar2"></td>
                </tr>
                <tr>
                    <td>
                        <h5>HR</h5>
                    </td>
                    <td><input type="text" id="srhr" name="srhr"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <h5>FIBER NANO</h5>
                    </td>
                    <td><input type="text" id="srfibernano" name="srfibernano"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <h5>FIBER MOTO</h5>
                    </td>
                    <td><input type="text" id="srfibermoto" name="srfibermoto"></td>
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
                    <td><input type="text" id="ampoutputpower" name="ampoutputpower"></td>
                    <td><input type="text" id="voltoutputpower" name="voltoutputpower"></td>
                    <td><input type="text" id="wattoutputpower" name="wattoutputpower"></td>
                </tr>
                <tr>
                    <td>
                        <h5>CAVITY NANI</h5>
                    </td>
                    <td><input type="text" id="cavitynani" name="cavitynani"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>CAVITY FINAL </th>
                    <td><input type="text" id="cavityfinal" name="cavityfinal"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th rowspan="2">NOTE</th>
                    <td colspan="4"><textarea id="note1" name="note1"></textarea></td>
                </tr>
                <tr>
                    <td colspan="4"><textarea id="note2" name="note2"></textarea></td>
                </tr>
                </tbody>
            </table>
            <button class="btn btn-success">SUBMIT</button>
        </div>
    </x-slot>
</x-layout>