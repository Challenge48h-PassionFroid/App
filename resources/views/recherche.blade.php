@extends('layout')

@section('content')

<h1 class="my-4">Recherche d'image</h1>

<form>
    <div class="input-group mt-2 mb-2">
        <input type="text" placeholder="Nom de l'image" name="name" class="form-control border-secondary">
        <div class="input-group-append">
            <select name="Type" class="form-select px-2">
                <option value="default" selected>--Type d'image--</option>
                <option value="passionfroid">Photo PassionFroid</option>
                <option value="fournisseur">Photo Fournisseur</option>
                <option value="logo">Logo</option>
            </select>
            <button class="btn btn-outline-secondary border-left-0" type="button">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>

    <button type="button" class="btn text-secondary mb-2" onclick="toggler()">Filtres avancés <i id="chevron" class="fas fa-chevron-down" style="transition: transform 0.3s"></i></button>

    <div id="advancedFilters" style="display: none">
        <div>
            <div class="d-flex justify-content-between">
                <div class="custom-control custom-switch">
                    <input type="checkbox" id="withProduct" name="withProduct" class="custom-control-input">
                    <label class="custom-control-label" for="withProduct">Produit visible</label>
                </div>

                <div class="custom-control custom-switch">
                    <input type="checkbox" id="withHuman" name="withHuman" class="custom-control-input">
                    <label class="custom-control-label" for="withHuman">Humain visible</label>
                </div>

                <div class="custom-control custom-switch">
                    <input type="checkbox" id="isInstitutional" name="isInstitutional" class="custom-control-input">
                    <label class="custom-control-label" for="isInstitutional">Photo institutionnelle</label>
                </div>

                <div class="custom-control custom-switch">
                    <input type="checkbox" id="isVertical" name="isVertical" class="custom-control-input">
                    <label class="custom-control-label" for="isVertical">Image verticale</label>
                </div>
            </div>
        </div>

        <div class="my-3">
            <input type="text" name="credits" placeholder="Crédits" class="form-control" />
        </div>

        <div class="my-3">
            <input type="text" name="tags" placeholder="Tags (séparés par des virgules)" class="form-control" />
        </div>
    </div>
</form>

<script>
    function toggler() {
        $('#advancedFilters').toggle()
        $('#chevron').toggleClass('crossRotate')
    }
</script>

@endsection