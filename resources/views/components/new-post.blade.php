<div class="card">

            <form action="{{route('post.store')}}" method="post">
                @csrf
                <h5 class="card-header">Add New Post</h5>
                <div class="card-body">
                    <input class="form-control form-control-lg mb-2" name="title" id="title" type="text" placeholder="Title">
                    <input class="form-control form-control-lg mb-2" name="author" id="author" type="text" placeholder="Author">
                    <!-- <div class="custom-file mb-2">
                        <input type="file" name="files" multiple class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose files</label>
                    </div> -->
                    <textarea class="form-control mb-2" name="body" id="body" rows="4" placeholder="Tell a story or share your thoughts on these pictures."></textarea>
                    <button type="submit" value="upload" class="btn btn-primary">Save</button>

            </form>

            <!-- <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a> -->
        
</div>