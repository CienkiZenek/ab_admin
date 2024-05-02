<div class="row mt-3 border border-1 p-2 bg-light">
    <label for="" class="form-label">Podpisy pod obrazkami:</label>

    <div class="mt-1 row">
        <div class="col-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Obrazek 1:</span>
                </div>
                <input type="text" class="form-control" name="zdjecie1_podpis" id="zdjecie1_podpis" value="{{$tresc->zdjecie1_podpis}}">
            </div>
        </div>
        <div class="col-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Obrazek 2:</span>
                </div>
                <input type="text" class="form-control" name="zdjecie2_podpis" id="zdjecie2_podpis" value="{{$tresc->zdjecie2_podpis}}">
            </div>
        </div>
    </div>

</div>
