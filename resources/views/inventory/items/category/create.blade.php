<!-- Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="categoryModalLabel">New Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="category_form">
            <div class="modal-body">
                <div class="form-group">
                    {{-- <label for="categoryName" class="control-label">category Name</label> --}}
                    <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="category Name" required>
                    @error('categoryName')
                    <span class="text-danger error-text">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <select name="parentCategory" id="parentCategory" class="select2">
                        <option selected>Select parent category</option>
                        <option value="1">parent</option>
                    </select>
                    @error('parentCategory')
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
