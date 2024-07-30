<div class="col-md-8">
    <form action="{{ route('crop.store') }}" method="POST">
        @csrf
        <div class="form-group row">
            <label class="col-sm-6 col-form-label text-white" for="name">Crop Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter crop name" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-4 col-form-label text-white" for="type">Crop Type</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="type" name="type" placeholder="Enter crop type" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-4 col-form-label text-white" for="planting_date">Planting Date</label>
            <div class="col-sm-8">
                <input type="date" class="form-control" id="planting_date" name="planting_date" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-4 col-form-label text-white" for="harvest_date">Harvest Date</label>
            <div class="col-sm-8">
                <input type="date" class="form-control" id="harvest_date" name="harvest_date">
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-4 col-form-label text-white" for="quantity">Quantity</label>
            <div class="col-sm-8">
                <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-4 col-form-label text-white" for="location">Location</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="location" name="location" placeholder="Enter location" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-4 col-form-label text-white" for="notes">Notes</label>
            <div class="col-sm-8">
                <textarea class="form-control" id="notes" name="notes" rows="2" placeholder="Additional notes"></textarea>
            </div>
        </div>
        
        <br>

        <button type="submit" class="btn" style="background:#4B6F44; color:white">Submit</button>
    </form>
</div>