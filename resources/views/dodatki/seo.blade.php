
<div class="row mt-3 border border-1 p-2 bg-light">
    <label for="" class="form-label">SEO</label>
    <div class="col-12 mb-2">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Title:</span>
            </div>
            <input type="text" class="form-control" name="title" id="title" value="{{$tresc->title}}">
        </div>
    </div>
    <div class="col-12 mb-2">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Keywords:</span>
            </div>
            <input type="text" class="form-control" name="keywords" id="keywords" value="{{$tresc->keywords}}">
        </div>
    </div>
    <div class="col-12 mb-2">
        Bobola, Andrzej Bobola, św. Andrzej Bobola, kult świętych, hagiografia, żywoty świętych, relikwie
    </div>
    <div class="col-12">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Description:</span>
            </div>
            <textarea class="form-control" name="description" id="description" rows="3">{{$tresc->description}}</textarea>
        </div>
    </div>

</div>
