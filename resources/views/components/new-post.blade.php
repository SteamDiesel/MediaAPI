<div class="card ">

            <form action="{{route('post.store')}}" method="post">
                @csrf
                <h5 class="card-header">Add New Post</h5>
                <div class="card-body">
                    <input class="form-control form-control-lg mb-2" name="title" id="title" type="text" placeholder="Title">
                    <input class="form-control form-control-lg mb-2" name="author" id="author" type="text" placeholder="Author">
                    <textarea class="form-control mb-2" name="body" id="body" rows="4" placeholder="Tell a story or share your thoughts on these pictures."></textarea>
                    <p>You can add images in the "edit" screen.</p>
                    <button type="submit" value="upload" class="btn btn-primary">Save</button>
            </form>

</div>