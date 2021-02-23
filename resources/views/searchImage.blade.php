@extends('layout')

@section('content')

<h1 class="my-4">Recherche d'image</h1>

<form>
    <div class="input-group mt-2">
        <input type="text" placeholder="Nom de l'image" name="name" class="form-control border-secondary">
        <div class="input-group-append">
            <select name="Type" class="form-select px-2">
                <option value="none" selected>-- Type d'image --</option>
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

    <div id="advancedFilters" style="display: none" class="mb-2">
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

<hr />

<!-- Gallery -->
<div>
    <div class="row photos d-flex justify-content-around">
        @foreach ($images as $image)
        <div class="card mb-3" style="width: 18rem;">
            <div class="d-flex justify-content-center overflow-hidden">
                <img class="card-img-top" src="https://chall48h-passionfroid.herokuapp.com{{ $image['url']['formats']['small']['url'] }}">
            </div>
            <div class="card-body">
                <p class="card-text">
                    {{ $image['name'] }}
                </p>
            </div>
        </div>


        <!-- <div class="col-sm-6 col-md-4 col-lg-3 item">
            <div data-lightbox="photos">
                <img class="img-fluid" src="https://chall48h-passionfroid.herokuapp.com{{ $image['url']['formats']['thumbnail']['url'] }}">
            </div>
        </div> -->
        @endforeach
    </div>
    <!-- Pagination -->
    <!-- <nav class="d-flex justify-content-center">
        <ul class="pagination">
            <li class="page-item disabled">
                <span class="page-link">Previous</span>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active">
                <span class="page-link">
                    2
                </span>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link">Next</a>
            </li>
        </ul>
    </nav> -->
</div>

<script>
    function toggler() {
        $('#advancedFilters').toggle()
        $('#chevron').toggleClass('crossRotate')
    }
</script>

@endsection