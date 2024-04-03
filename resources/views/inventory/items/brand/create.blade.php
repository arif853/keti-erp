<!-- Modal -->
<div class="modal fade" id="brandModal" tabindex="-1" aria-labelledby="brandModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="brandModalLabel">New Brand</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form enctype="multipart/form-data" id="brand_form">
            <div class="modal-body">
                <div class="form-group">
                    {{-- <label for="brandName" class="control-label">Brand Name</label> --}}
                    <input type="text" class="form-control" id="brandName" name="brandName" placeholder="Brand Name" required>
                    @error('brandName')
                    <span class="text-danger error-text">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {{-- <label for="brandName" class="control-label">Brand Name</label> --}}
                    <input type="file" class="form-control" id="image" name="image" placeholder="Image">
                    @error('image')
                    <span class="text-danger error-text">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>bnhbnhbnh5 --}}
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
      </div>
    </div>
</div>
