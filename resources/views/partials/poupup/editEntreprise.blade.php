<div class="modal fade" id="editEntreprise{{$entrepriseId}}" tabindex="-1" role="dialog" aria-labelledby="EntrepriseLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier Entreprise</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form method="POST" action="{{  route('updateEntreprise',$entrepriseId) }}">
                @csrf
                <div class="modal-body">
                   
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" placeholder="Nom" name="nomEntreprise" value="{{ $entreprise->nom }}">
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