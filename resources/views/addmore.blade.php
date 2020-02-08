<div class="form-group">    


            <div class="alert alert-danger print-error-msg" style="display:none">

            <ul></ul>

            </div>


            <div class="alert alert-success print-success-msg" style="display:none">

            <ul></ul>

            </div>


            <div class="table-responsive mt-4">  
                <span><b>Jadwal Kegiatan</b></span>
                <!-- <table class="table" id="dynamic_field">  
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>  

                        <td><input type="text" name="name[]" placeholder="Kegiatan" class="form-control name_list" /></td>  
                        <td><input type="number" name="number[]" class="form-control" placeholder="1-6"></td>
                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  

                    </tr>  
                  
                </table>   -->
                <table class="table" id="dynamic_field">
                    <tr>
                        <th colspan="2" rowspan="2">Jenis Kegiatan</th>
                        <th colspan="6">Bulan</th>
                    </tr>
                    <tr>
                        <td class="text-center">1</td>
                        <td class="text-center">2</td>
                        <td class="text-center">3</td>
                        <td class="text-center">4</td>
                        <td class="text-center">5</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="text" name="name[]" placeholder="Kegiatan" class="form-control name_list" /></td>  
                        <td><input type="checkbox" name="number1[]" class="form-control"  value=1></td>
                        <td><input type="checkbox" name="number2[]" class="form-control" value=2></td>
                        <td><input type="checkbox" name="number3[]" class="form-control" value=3></td>
                        <td><input type="checkbox" name="number4[]" class="form-control" value=4></td>
                        <td><input type="checkbox" name="number5[]" class="form-control" value=5></td>
                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td> 
                    </tr>
                    </table>

            </div>

    </div> 