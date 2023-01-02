<div class="modal fade" id="addAdmin" tabindex="-1" role="dialog" aria-labelledby="EntrepriseLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un Administrateur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form method="POST" action="{{ route('storeAdmin') }}">
                @csrf
                <div class="modal-body">
                   
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" placeholder="Nom" name="nomAdmin">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="emailAdmin">
                        </div>
                        <div class="form-group">
                            <label for="nom">Password</label>
                            <input type="password" class="form-control" placeholder="Mot de passe" name="passwordAdmin">
                        </div>
                      

                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>