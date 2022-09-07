<div class="modal fade" id="window">
   <div class="modal-dialog">
      <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add member</h3>
                <button class="btn btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form action="{{route('create.member')}}" method="post">
                    @csrf

                    <input type="text" class="form-control" name="name">

                    <input type="date" name="birthdate" class="form-control">

                    <input type="submit" value="Add member" class="btn btn-success">
                </form>
            </div>
      </div>
   </div>
</div>