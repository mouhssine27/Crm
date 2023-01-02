<div class="modal fade" id="addEmployeur" tabindex="-1" role="dialog" aria-labelledby="EntrepriseLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter Employeur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form method="POST" action="{{ Route('mailEmployeur') }}">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" placeholder="Nom" name="nomEmployeur">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" placeholder="email de l'employeur"
                            name="emailEmployeur">
                    </div>
                    <div class="form-group">
                        <label for="ville">Nom d'entreprise</label>
                        <select class="col form-control" id="entreprise" name="entreprise">
                            @foreach ($entreprises as $entreprise )
                            <option value="{{ $entreprise->id }}">{{ $entreprise->nom }}</option>
                            @endforeach
                        </select>
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
